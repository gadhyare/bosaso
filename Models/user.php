<?php
require  getcwd() . '/lib/PHPMailer/src/Exception.php';
require  getcwd() . '/lib/PHPMailer/src/PHPMailer.php';
require  getcwd() . '/lib/PHPMailer/src/SMTP.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



class userModel extends Model
{

    public function register()
    {

        $op = new khas();
        if (isset($_POST['submit'])) {
            $pass = md5($_POST['password']);
            if (empty($op->pro_field($_POST['user_name'])) || empty( $_POST['email'])  || empty($op->pro_field($pass))) {
                $_SESSION['msg'] =  ERR_EMPTY;
            } elseif (password_verify($_POST['password'], $_POST['confirm_password'])) {
                $_SESSION['msg'] =  ERR_CONFIRM;
            } else {
                date_default_timezone_set('Asia/Kuwait');
                $reg_date = date('Y-m-d');
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $this->query("INSERT INTO users(user_name, email, user_password, reg_date, role , active) VALUES (:user_name, :email, :user_password, :reg_date, :role, :active)");
                $this->bind(':user_name', $op->pro_field($_POST['user_name']));
                $this->bind(':email',  $_POST['email']) ;
                $this->bind(':user_password', $password);
                $this->bind(':reg_date', $reg_date);
                $this->bind(':role', $op->pro_field($_POST['role']));
                $this->bind(':active', $op->pro_field($_POST['active']));
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
                header("refresh:1;url=" . ROOT_URL . '/user');
            }
        }
    }

    public function index()
    {
        $this->query('SELECT * FROM users');
        $rows = $this->resultSet();
        return $rows;
    }




    public function update()
    {
        $op = new Khas();
        // update users passwords 
        if (isset($_POST['edit_usr_info'])) {
            if ($op->pro_field($_POST['user_name_edit']) == '' || empty($op->pro_field($_POST['user_name_edit'])) || is_null($op->pro_field($_POST['user_name_edit']))) {
                $_SESSION['msg'] =  ERR_EMPTY;
            } elseif ($op->pro_field(is_numeric($_POST['user_name_edit']))) {
                $_SESSION['msg'] =  ERR_NUMBER;
            } elseif (! $_POST['user_email_edit'])  {
                $_SESSION['msg'] = NOT_EMAIL;
            } else {
                $this->query("UPDATE users SET user_name=:user_name,email=:email WHERE usrid=:id");
                $this->bind(":user_name",  $op->pro_field($_POST['user_name_edit']));
                $this->bind(":email", $_POST['user_email_edit']);
                $this->bind(":id", $op->pro_field($_GET['id']));
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
            }
        }
        // update users levels  
        if (isset($_POST['edit_usr_lev'])) {
            $this->query("UPDATE users SET role=:role,active=:active WHERE usrid=:id");
            $this->bind(":role",  $op->pro_field($_POST['role']));
            $this->bind(":active", $op->pro_field($_POST['active']));
            $this->bind(":id", $op->pro_field($_GET['id']));
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
        }
        // update users password  

        if (isset($_POST['edit_usr_pass'])) {
            if ($_POST['user_password_edit'] == '' || empty($_POST['user_password_edit']) || is_null($_POST['user_password_edit'])) {
                $_SESSION['msg'] =  ERR_EMPTY;
            } elseif (password_verify($_POST['user_password_edit'], $_POST['user_password_confirm'])) {
                $_SESSION['msg'] =  ERR_CONFIRM;
            } else {
                $password = password_hash($_POST['user_password_edit'], PASSWORD_BCRYPT);
                $this->query("UPDATE users SET  user_password=:user_password WHERE usrid=:id");
                $this->bind(":user_password", $password);
                $this->bind(":id", $op->pro_field($_GET['id']));
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
            }
        }
        $this->query('SELECT * FROM users WHERE usrid=:id');
        $this->bind(':id',  $_GET['id']);
        $rom = $this->resultSet();;
        return $rom;
    }

    public function delete()
    {
        $op = new khas();
        if (isset($_POST['delete_items'])) {
            $this->query('UPDATE users SET active = 2 WHERE usrid=:id');
            $this->bind(':id',  $op->pro_field($_GET['id']));
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header('refresh:1;url= ' . ROOT_URL . '/user');
        }
        $this->query('SELECT * FROM users WHERE usrid=:id');
        $this->bind(':id',  $op->pro_field($_GET['id']));
        $select_to_delete = $this->resultSet();;
        return $select_to_delete;
    }




    public function login()
    {

        $op = new khas();
        if (isset($_POST['login_submit'])) {
            $password =  $_POST['password'];
            if (!empty($op->pro_field($_POST['user_name']) || !empty($_POST['password']))) {
                $this->query('SELECT * FROM users WHERE user_name = :user_name  and active= 1');
                $this->bind(':user_name',  $op->pro_field($_POST['user_name']));
                $rows = $this->single();
                if ($rows) {
                    if (password_verify($password, $rows['user_password'])) {
                        $_SESSION['loged_in'] = true;
                        $_SESSION['log_id'] = $rows['usrid'];
                        $_SESSION['log_user'] = $rows['user_name'];
                        $_SESSION['log_role'] = $rows['role'];
                        $_SESSION['msg'] =  SUCCESS_LOGIN;
                        header("refresh:0.5;url=" . ROOT_URL . "/home");
                        exit;
                    } else {
                        $_SESSION['msg'] = ERR_LOGIN;
                        return;
                    }
                } else {
                    $_SESSION['msg'] = ERR_LOGIN;
                    return;
                }
            } else {
                $_SESSION['msg'] = ERR_EMPTY;
                return;
            }
        }

        if (isset($_POST['edit_usr_pass'])) {
            $this->newpass();
        }  

        if (isset($_POST['resetPass'])) {
            $this->resetpass();
        }

        
        
    }

    public function logout()
    {
        unset($_SESSION['loged_in']);
        unset($_SESSION['log_id']);
        unset($_SESSION['log_user']);
        session_destroy();
        header("refresh:1;url=" . ROOT_URL . '/user/login');
    }

    public function upload_image()
    {
        $avatar_name = $_FILES['avatar']['name'];
        $avatar_tmpname = $_FILES['avatar']['tmp_name'];
        $avatar_size = $_FILES['avatar']['size'] . "<br/>";
        $avatar_type = $_FILES['avatar']['type'] . "<br/>";
        $avatar_ext = pathinfo($avatar_name, PATHINFO_EXTENSION);
        if (!empty($avatar_name)) {
            if ($avatar_size <= 1000000) {
                echo " عفواً لكن حجم الصورة كبير جداً ";
            } else {
                if ($avatar_ext == 'jpg' || $avatar_ext == 'jpeg' || $avatar_ext == 'png') {
                    $final_file = ROOT_URL . "/" . "upload/";
                    $upload = move_uploaded_file($avatar_tmpname, $final_file);
                    if ($upload) echo "تم تحميل الصورة بنجاح";
                } else {
                    echo  " الصورة المحملة يجب أن تكون بتنسيق  jpg,jpeg,png";
                }
            }
        } else {
            echo "فضلاً اختر الصورة المراد رفعها";
        }
    }


    public function profile()
    {
        $op  = new Khas();
        if (isset($_POST['edit_usr_info'])) {
            if ($_POST['user_name_edit'] == '' || empty($_POST['user_name_edit']) || is_null($_POST['user_name_edit'])) {
                $_SESSION['msg'] =  ERR_EMPTY;
            } elseif (is_numeric($_POST['user_name_edit'])) {
                $_SESSION['msg'] =  ERR_NUMBER;
            } elseif (!$op->is_email($_POST['user_email_edit'])) {
                $_SESSION['msg'] = NOT_EMAIL;
            } else {
                $this->query("UPDATE users SET user_name=:user_name,email=:email WHERE usrid=:id");
                $this->bind(":user_name",  $_POST['user_name_edit']);
                $this->bind(":email", $_POST['user_email_edit']);
                $this->bind(":id", $_SESSION['log_id']);
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
            }
        }
        if (isset($_POST['edit_usr_pass'])) {
            if ($_POST['user_name_edit'] == '' || empty($_POST['user_name_edit']) || is_null($_POST['user_name_edit'])) {
                $_SESSION['msg'] =  ERR_EMPTY;
            } elseif (is_numeric($_POST['user_name_edit'])) {
                $_SESSION['msg'] =  ERR_NUMBER;
            } elseif (!$op->is_email($_POST['user_email_edit'])) {
                $_SESSION['msg'] = NOT_EMAIL;
            } else {
                $this->query("UPDATE users SET user_name=:user_name,email=:email WHERE usrid=:id");
                $this->bind(":user_name",  $_POST['user_name_edit']);
                $this->bind(":email", $_POST['user_email_edit']);
                $this->bind(":id", $_SESSION['log_id']);
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
            }
        }
        $this->query('SELECT * FROM users WHERE usrid=:id');
        $this->bind(':id',  $_GET['id']);
        $rom = $this->resultSet();;
        return $rom;
    }



    public function profileupdate()
    {

        $op = new khas();
        if ($_POST['user_name_edit'] == '' || empty($_POST['user_name_edit']) || is_null($_POST['user_name_edit'])) {
            $_SESSION['msg'] =  ERR_EMPTY;
        } elseif (is_numeric($_POST['user_name_edit'])) {
            $_SESSION['msg'] =  ERR_NUMBER;
        } else {
            $this->query('UPDATE users SET  user_name= :user_name_edit,user_code= :user_code_edit,active= :active_edit WHERE usrid=:id');
            $this->bind(':user_name_edit',  $op->pro_field($_POST['user_name_edit']));
            $this->bind(':user_code_edit',  $op->pro_field($_POST['user_code_edit']));
            $this->bind(':active_edit',  $op->pro_field($_POST['selected_value']));
            $this->bind(':id',  $op->pro_field($_GET['id']));
            $do_edit = $this->execute();
            $_SESSION['msg'] =  SUCCESS;
            header("refresh:1;url=" . ROOT_URL . '/user');
            // header( "refresh:1;url=".path  );
        }

        $this->query('SELECT * FROM users WHERE usrid=:id');
        $this->bind(':id',  $op->pro_field($_GET['id']));
        $rom = $this->resultSet();;
        return $rom;
    }


    public function usrRole()
    {

        $op = new khas();
        if (isset($_POST['submit'])) {
            if (empty($_POST['usrRol'])) {
                $_SESSION['msg'] =  ERR_EMPTY;
            } else {
                date_default_timezone_set('Asia/Kuwait');
                $reg_date = date('Y-m-d');
                $this->query("INSERT INTO usr_rol(role, home, student, department, section, group, level, subject, exams, finance, todolist, user, myaccount) VALUES (:role,:home, :student, :department, :section, :group, :level, :subject, :exams, :finance, :todolist, :user, :myaccount)");
                $this->bind(':role', $op->pro_field($_POST['role']));
                $this->bind(':home', $op->pro_field($_POST['home']));
                $this->bind(':student', $op->pro_field($_POST['student']));
                $this->bind(':department', $op->pro_field($_POST['department']));
                $this->bind(':section', $op->pro_field($_POST['section']));
                $this->bind(':group', $op->pro_field($_POST['group']));
                $this->bind(':level', $op->pro_field($_POST['level']));
                $this->bind(':subject', $op->pro_field($_POST['subject']));
                $this->bind(':exams', $op->pro_field($_POST['exams']));
                $this->bind(':finance', $op->pro_field($_POST['finance']));
                $this->bind(':todolist', $op->pro_field($_POST['todolist']));
                $this->bind(':user', $op->pro_field($_POST['user']));
                $this->bind(':myaccount', $op->pro_field($_POST['myaccount']));
                $this->execute();
                $_SESSION['msg'] = SUCCESS; 
                header("refresh:1;url=" . ROOT_URL . '/user');
            }
        }
    }

    /**
     * here we can get folder name from usr_rol session  
     * @param string $fun 
     *  
     */

    public function userrols()
    {
        $op = new Khas();
        if (isset($_GET['info']) && isset($_GET['userid'])) {
            $arr = $_POST;
            unset($arr['btn-']);
            $b = array_keys($arr);
            $values = implode(",", $b);
            if (strlen($values) > 0) {
                if (!$op->chk_if_user_rol_pages_in($_GET['userid'], $_GET['info'])) {
                    $this->query("INSERT INTO auth_pages (main_pages,sub_pages,usrid) VALUES (:main_pages,:sub_pages,:usrid) ");
                    $this->bind(":main_pages",  $_GET['info']);
                    $this->bind(":sub_pages", $values);
                    $this->bind(":usrid", $_GET['userid']);
                    $this->execute();
                    $_SESSION['msg'] = SUCCESS;
                } else {
                    $this->query("UPDATE auth_pages SET  sub_pages=:sub_pages  WHERE main_pages=:main_pages AND usrid=:usrid");
                    $this->bind(":sub_pages", $values);
                    $this->bind(":main_pages",  $_GET['info']);
                    $this->bind(":usrid", $_GET['userid']);
                    $this->execute();
                    $_SESSION['msg'] = SUCCESS;
                }
            }
        }

        if (isset($_GET['info']) && isset($_GET['userid']) && isset($_GET['act']) && $_GET['act'] == 'reset') {
            $this->query("DELETE FROM  auth_pages   WHERE main_pages=:main_pages AND usrid=:usrid");
            $this->bind(":main_pages",  $_GET['info']);
            $this->bind(":usrid", $_GET['userid']);
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
        }
    }

    public function usrsectanddep()
    {

        if (isset($_POST['seledulev_id'])) {
            header("refresh:0;url=" . ROOT_URL . "/user/usrsectanddep?userid=" . $_GET['userid'] . "&edulev_id=" . $_POST['edulev_id']);
        }

        if (isset($_POST['add_roles'])) {
            $ar = explode(",", $_REQUEST['services']);
            foreach ($ar as $item) {
                if ($this->chk_usr_role_before_insert($_GET['userid'],    $item)) {
                    continue;
                } else {
                    $this->query("INSERT INTO  auth_roles (   usrid ,     prog_id ) VALUES (:usrid   ,:prog_id)");
                    $this->bind(":usrid", $_GET['userid']);
                    $this->bind(":prog_id", $item);
                    $this->execute();
                }
            }
        }

        if (isset($_GET['edulev_id'])) :
            $this->query("SELECT * FROM programs edulev_id=:id");
            $this->bind(":id", $_GET['edulev_id']);
            $row = $this->resultSet();
            return $row;

        endif;
    }


    public function chk_usr_role_before_insert(int $usrid, int  $prog_id)
    {
        $op = new Khas();
        $ar = $op->chk_if_user_rol_in($usrid,   $prog_id);
        if ($ar) {
            return true;
        }
    }


    public function getUsrsList()
    {
        $this->query('SELECT * FROM users WHERE active=1');
        $rows = $this->resultSet();
        return $rows;
    }



    public function newpass()
    {

         
            if (time() >  $_POST['PwdRestExpirs']) {
                 "Time is expired";
            } else {
                $id = $_GET['actionid'];
                $key = $_GET['tokenid'];
                $user_password_edit = password_hash($_POST['user_password_edit'], PASSWORD_DEFAULT);
                if (empty($_POST['user_password_edit'])) {
                    $_SESSION['msg'] =  ERR_EMPTY;
                } elseif ($_POST['user_password_edit'] == $_POST['user_password_confirm']) {
                    $this->query("SELECT * FROM  pwdrest  WHERE PwdRestKey=:keys LIMIT 1");
                    $this->bind(":keys", $key);
                    $ckhRow = $this->resultSet();
                    if($ckhRow){
                        if( time() >   $ckhRow[0]['PwdRestExpirs']){  
                            echo "<div class='alert alert-danger text-center'> عفوا ولكن الوقت المسموح لك لاعادة تعيين كلمة المرور غير صالح </div>";
                        }else{
                        $this->query("UPDATE users SET user_password=:user_password  WHERE 	usrid=:id");
                        $this->bind(":user_password",  $user_password_edit);
                        $this->bind(":id",   $id);
                        $this->execute();
                        $_SESSION['msg'] = SUCCESS;
                        header("refresh:0.5;url=" . ROOT_URL . "/user/login");                              
                        }
                      
                    }
                } else {
                    $_SESSION['msg'] = ERR_CONFIRM;
                }
            } 
    }




    /**
     * here we can reset password for user whene it's losts
     * @param $id
     * @return redirect to newpass
     */
    public function resetpass()
    {
        $op = new Khas();
        $email = $_POST['user_email'];
        if (empty($email)) {
            $_SESSION['msg'] = ERR_EMPTY;
        } else {
            $this->query("SELECT * FROM users WHERE email=:email AND active=1");
            $this->bind(":email", $email);
            $row = $this->resultSet();
            if ($row) {
                $this->query("SELECT * FROM pwdrest WHERE  PwdRestEmail=:email");
                $this->bind(":email", $_POST['user_email']);
                $rows = $this->resultSet();
                if ($rows) :
                    $this->query("DELETE FROM pwdrest WHERE  PwdRestEmail=:email");
                    $this->bind(":email", $_POST['user_email']);
                    $this->execute();   
                endif;
                foreach($row as $item){
                    $max_time = 60*1;
                    $PwdRestExpirs = time() + $max_time ;  
                    $Key = bin2hex(random_bytes(8));
                    $this->query("INSERT INTO pwdrest(PwdRestEmail, PwdRestKey, PwdRestExpirs  ) 
                              VALUES (:PwdRestEmail, :PwdRestKey, :PwdRestExpirs )");
                    $this->bind(":PwdRestEmail", $_POST['user_email']);
                    $this->bind(":PwdRestKey", $Key);
                    $this->bind(":PwdRestExpirs", $PwdRestExpirs); 
                    $this->execute();
                    try {
                        $body = "<div class='card z-depth-2 bg-white text-center'> " . $op->lang("your request to change your password has been registered") . $item['user_name'] . "</div> <br>";
                        $body         .= "<p> " . $op->lang("please go through this link") . "</p>  ";
                        $body         .= ROOT_URL . "/user/login?newpass=true&tokenid=$Key&actionid=" . $item['usrid'] ; //newpass/63e11ba7dff4281f
                        $address =  $_POST['user_email'];
                        $to = $_POST['user_email'];
                        $subject = 'اعادة تعيين كلمة المرور الضائعة';
                        $from =  $op->siteSetting('siteName') ; 
                        // Create email headers
                        
                        $message =   $body  ;
                        // Sending email
                        if (mail($to, $subject, $message )) {
                            echo '<div class="alert alert-success text-center ">Your mail has been sent successfully </div>';
                        } else {
                            echo '<div class="alert alert-danger text-center ">Unable to send email. Please try again.</div>';
                        }
                    } catch (Exception $e) {
                        echo   EMAIL_NOT_SEND;
                    }
                 }
            } else {
                $_SESSION['msg'] = NOT_EMAIL;
            }
        }
        
    }
}
