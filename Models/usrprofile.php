<?php class usrprofileModel extends Model{
     

     public function index(){
         $op  = new Khas();
         if(isset($_POST['edit_usr_info'])){
            if($_POST['user_name_edit'] == '' || empty($_POST['user_name_edit']) || is_null($_POST['user_name_edit'])){
                $_SESSION['msg'] =  ERR_EMPTY;
            }
            elseif(is_numeric($_POST['user_name_edit'])){
                $_SESSION['msg'] =  ERR_NUMBER;
            }elseif(! $op->is_email($_POST['user_email_edit'])){
                $_SESSION['msg'] = NOT_EMAIL;
            }else{
                $this->query("UPDATE users SET user_name=:user_name,email=:email WHERE usrid=:id");
                $this->bind(":user_name" ,  $_POST['user_name_edit']);
                $this->bind(":email" ,$_POST['user_email_edit']  );
                $this->bind(":id" , $_SESSION['log_id'] );
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
            }
         } 
         if(isset($_POST['edit_usr_pass'])){
            if($_POST['user_password_edit'] == '' || empty($_POST['user_password_edit']) || is_null($_POST['user_password_edit'])){
                $_SESSION['msg'] =  ERR_EMPTY;
            } elseif (password_verify($_POST['user_password_edit'], $_POST['user_password_confirm'])) { 
                $_SESSION['msg'] = ERR_CONFIRM;
            }else{
                $password = password_hash($_POST['user_password_edit'], PASSWORD_BCRYPT);
                $this->query("UPDATE users SET user_password=:user_password WHERE usrid=:id");
                $this->bind(":user_password" ,  $password);
                $this->bind(":id" , $_SESSION['log_id'] );
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
            }
         } 

        $this->query('SELECT * FROM users WHERE usrid=:id');
        $this->bind(':id' ,  $_SESSION['log_id']);
        $rom = $this->resultSet();;
        return $rom;

     }


     public function logout(){
        unset($_SESSION['loged_in']);
        unset($_SESSION['log_id']);
        unset($_SESSION['log_user']);
        session_destroy();
        header ("refresh:10;url=" . ROOT_URL . '/user/login');
     }
}

 