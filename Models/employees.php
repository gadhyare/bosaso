<?php class employeesModel extends Model
{
    public  $rowss;
    public function Index()
    {
        $this->query('SELECT * FROM section ORDER BY sec_id ASC');
        $rows = $this->resultSet();
        return $rows;
    }
    public function update()
    {
    }


    public function add()
    {
    }
    public function emsections()
    {
        $op = new khas();
        if (isset($_POST['btn_submit'])) {
            if (empty($op->pro_field($_POST['em_sec_name']))) {
                $_SESSION['msg'] = ERR_EMPTY;
            } elseif (is_numeric($op->pro_field($_POST['em_sec_name']))) {
                $_SESSION['msg'] = ERR_NUMBER;
            } else {
                $this->query("INSERT INTO em_sections(em_sec_name, active) VALUES (:em_sec_name, :active)");
                $this->bind(":em_sec_name", $op->pro_field($_POST['em_sec_name']));
                $this->bind(":active", $op->pro_field($_POST['active']));
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
            }
        }
        $this->query('SELECT * FROM em_sections ORDER BY em_sec_id ASC');
        $rows = $this->resultSet();
        if ($rows) {
            return $this->resultSet();
        } else {
            $_SESSION['msg'] = Data_Not_Founded;
        }
    }


    public function emsectionsupdate()
    {

        $op = new khas();
        if (isset($_GET['updateRec']) && $op->pro_field($_GET['updateRec']) == 'yes') {
            $this->query("UPDATE em_sections SET em_sec_name=:em_sec_name,active=:active WHERE em_sec_id=:id");
            $this->bind(":em_sec_name", $op->pro_field($_POST['em_sec_name']));
            $this->bind(":active", $op->pro_field($_POST['active']));
            $this->bind(":id", $op->pro_field($_GET['ids']));
            $this->execute();
            $_SESSION['msg'] =  SUCCESS; 
        }

        $this->query('SELECT * FROM em_sections WHERE em_sec_id=:id');
        $this->bind(":id", $op->pro_field($_GET['id']));
        $rows = $this->resultSet();
        if ($rows) {
            return $this->resultSet();
        } else {
            $_SESSION['msg'] = Data_Not_Founded;
        }
    }

    public function emsectionsdelete()
    {

        $op = new khas();
        if (isset($_POST['delete_items'])) {
            $this->query("DELETE FROM  em_sections WHERE em_sec_id=:id");
            $this->bind(":id", $op->pro_field($_GET['id']));
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header("refresh:2;url=" . ROOT_URL . "/employees/emsections");
        }

        $this->query('SELECT * FROM em_sections WHERE em_sec_id=:id');
        $this->bind(":id", $op->pro_field($_GET['id']));
        $rows = $this->resultSet();
        if ($rows) {
            return $this->resultSet();
        } else {
            $_SESSION['msg'] = Data_Not_Founded;
        }
    }

    public function emlev()
    {
        $op = new khas();
        if (isset($_POST['btn_submit'])) {
            if (empty($op->pro_field($_POST['em_lev_name']))) {
                $_SESSION['msg'] = ERR_EMPTY;
            } elseif (is_numeric($_POST['em_lev_name'])) {
                $_SESSION['msg'] = ERR_NUMBER;
            } else {
                $this->query("INSERT INTO em_lev(em_lev_name, active) VALUES (:em_lev_name, :active)");
                $this->bind(":em_lev_name", $op->pro_field($_POST['em_lev_name']));
                $this->bind(":active", $op->pro_field($_POST['active']));
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
            }
        }
        $this->query('SELECT * FROM em_lev ORDER BY em_lev_id ASC');
        $rows = $this->resultSet();
        if ($rows) {
            return $this->resultSet();
        } else {
            $_SESSION['msg'] = Data_Not_Founded;
        }
    }


    public function emlevupdate()
    {
        $op = new khas();
        if (isset($_GET['updateRec']) && $op->pro_field($_GET['updateRec']) == 'yes') {
            $this->query("UPDATE em_lev SET em_lev_name=:em_lev_name,active=:active WHERE em_lev_id=:id");
            $this->bind(":em_lev_name", $op->pro_field($_POST['em_lev_name']));
            $this->bind(":active", $op->pro_field($_POST['active']));
            $this->bind(":id", $op->pro_field($_GET['ids']));
            $this->execute();
            $_SESSION['msg'] =  SUCCESS;
            header("refresh:0;url=" . ROOT_URL . "/employees/emlev");
        }

        $this->query('SELECT * FROM em_lev WHERE em_lev_id=:id');
        $this->bind(":id", $_GET['id']);
        $rows = $this->resultSet();
        if ($rows) {
            return $this->resultSet();
        } else {
            $_SESSION['msg'] = Data_Not_Founded;
        }
    }

    public function emlevdelete()
    {

        $op = new khas();
        if (isset($_POST['delete_items'])) {
            $this->query("DELETE FROM  em_lev WHERE em_lev_id=:id");
            $this->bind(":id", $op->pro_field($_GET['id']));
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header("refresh:2;url=" . ROOT_URL . "/employees/emlev");
        }

        $this->query('SELECT * FROM em_lev WHERE em_lev_id=:id');
        $this->bind(":id", $_GET['id']);
        $rows = $this->resultSet();
        if ($rows) {
            return $this->resultSet();
        } else {
            $_SESSION['msg'] = Data_Not_Founded;
        }
    }


    public function empinfo()
    {
        if(isset($_POST['multiDel'])){
            $chk = $_REQUEST['chk'];
            $a = implode(", " , $chk);

            $this->query("DELETE FROM empinfo WHERE emp_id in($a)");
            $this->execute();
            $_SESSION['msg'] = SUCCESS;

        }
        
        $this->query("SELECT * FROM empinfo");
        $row = $this->resultSet();
        if ($row) {
            return $this->resultSet();
        }  
    }


    public function empinfoadd()
    {
        $op =  new Khas();
        if (isset($_POST['add_empInfo'])) {
            if (is_numeric($op->pro_field($_POST['emp_name'])) || is_numeric($op->pro_field($_POST['emp_POB'])) || is_numeric($op->pro_field($_POST['emp_nationality']))) {
                $_SESSION['msg'] = ERR_NUMBER;
            } elseif (empty($op->pro_field($_POST['emp_name'])) || empty($op->pro_field($_POST['emp_POB'])) || empty($op->pro_field($_POST['emp_nationality']))) {
                $_SESSION['msg'] = ERR_EMPTY;
            } else {


                $this->query("INSERT INTO empinfo(emp_name, emp_gender, emp_DOB, emp_POB,   emp_nationality, emp_address, emp_phones, emp_email, emp_regDate, emp_pic, emp_note, emp_stustatus) 
             VALUES (:emp_name, :emp_gender, :emp_DOB, :emp_POB,  :emp_nationality, :emp_address, :emp_phones, :emp_email, :emp_regDate, :emp_pic, :emp_note, :emp_stustatus)");
                $this->bind(":emp_name", $op->pro_field($_POST['emp_name']));
                $this->bind(":emp_gender", $op->pro_field($_POST['emp_gender']));
                $this->bind(":emp_DOB", $op->pro_field($_POST['emp_DOB']));
                $this->bind(":emp_POB", $op->pro_field($_POST['emp_POB']));
                $this->bind(":emp_nationality", $op->pro_field($_POST['emp_nationality']));
                $this->bind(":emp_address", $op->pro_field($_POST['emp_address']));
                $this->bind(":emp_phones", $op->pro_field($_POST['emp_phones']));
                $this->bind(":emp_email", $op->pro_field($_POST['emp_email']));
                $this->bind(":emp_regDate", $op->pro_field($_POST['emp_regDate']));
                $this->bind(":emp_pic", $op->pro_field($_FILES['emp_pic']['name']));
                $this->bind(":emp_note", $op->pro_field($_POST['emp_note']));
                $this->bind(":emp_stustatus", $op->pro_field($_POST['emp_stustatus']));
                $this->execute();
                $op->uploadPic($_FILES['emp_pic'],  2000000);
                $_SESSION['msg']  = SUCCESS; 
                header("refresh:0;url=" . ROOT_URL . "/employees/empinfoupdate/".$this->lastInsertId()); 
            }
        }
    }


    public function empinfodelete()
    {
        $op = new khas();
        $id = $op->pro_field($_GET['id']);
        
        if ($id) {
            if (isset($_POST['delete_items'])) {
                $this->query("DELETE FROM empinfo WHERE  emp_id=:id");
                $this->bind(":id",  $id);
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
                header("refresh:0;url=" . ROOT_URL . "/employees/empinfo");
            }
            if ($_SESSION['log_role'] ==  "manager" || $_SESSION['log_role'] == "admin") :
                $this->query("SELECT * FROM empinfo WHERE emp_id=:id");
                $this->bind(":id",  $id);
            else :
            $this->query("SELECT DISTINCT * FROM empinfo RIGHT JOIN empdistribution ON empinfo.emp_id = empdistribution.emp_id left JOIN auth_roles ON empdistribution.emp_id = auth_roles.prog_id WHERE empinfo.emp_id=:id AND auth_roles.usrid =:usrid ");
            $this->bind(":id",  $id);
            $this->bind(":usrid", $_SESSION['log_role']);
            endif;
            $row = $this->resultSet();
            if ($row) {
                return $this->resultSet();
            } else {
                $_SESSION['msg'] = Data_Not_Founded;
            }
        }
    }

    public function empinfoupdate()
    {
        $op = new khas();
        $id = $op->pro_field($_GET['id']);
        if ($id) {
            $op = new Khas();
            if (isset($_POST['update_empInfo'])) {
                $this->query("UPDATE empinfo SET emp_name=:emp_name,emp_gender=:emp_gender,emp_DOB=:emp_DOB,emp_POB=:emp_POB,
                emp_nationality=:emp_nationality,emp_address=:emp_address,emp_phones=:emp_phones,emp_email=:emp_email,
                emp_regDate=:emp_regDate,emp_pic=:emp_pic, emp_note=:emp_note,emp_stustatus=:emp_stustatus WHERE emp_id=:id");
                $this->bind(":id",  $op->pro_field($id));
                $this->bind(":emp_name", $op->pro_field($_POST['emp_name']));
                $this->bind(":emp_gender", $op->pro_field($_POST['emp_gender']));
                $this->bind(":emp_DOB", $op->pro_field($_POST['emp_DOB']));
                $this->bind(":emp_POB", $op->pro_field($_POST['emp_POB']));
                $this->bind(":emp_nationality", $op->pro_field($_POST['emp_nationality']));
                $this->bind(":emp_address", $op->pro_field($_POST['emp_address']));
                $this->bind(":emp_phones", $op->pro_field($_POST['emp_phones']));
                $this->bind(":emp_email", $op->pro_field($_POST['emp_email']));
                $this->bind(":emp_regDate", $op->pro_field($_POST['emp_regDate']));
                $this->bind(":emp_pic", $op->pro_field($_FILES['emp_pic']['name']));
                //his->bind(":empsellary", $op->pro_field($_POST['empsellary']));
                $this->bind(":emp_note", $op->pro_field($_POST['emp_note']));
                $this->bind(":emp_stustatus", $op->pro_field($_POST['emp_stustatus']));
                $this->execute();
                $op->uploadPic($_FILES['emp_pic'],  2000000);
                $_SESSION['msg']  = SUCCESS;
            }


            if ($_SESSION['log_role'] ==  "manager" || $_SESSION['log_role'] == "admin") :
                $this->query("SELECT * FROM empinfo WHERE emp_id=:id");
                $this->bind(":id",  $id);
            else :
                $this->query("SELECT DISTINCT * FROM empinfo RIGHT JOIN empdistribution ON empinfo.emp_id = empdistribution.emp_id left JOIN auth_roles ON empdistribution.emp_id = auth_roles.prog_id WHERE empinfo.emp_id=:id AND auth_roles.usrid =:usrid ");
                $this->bind(":id",  $id);
                $this->bind(":usrid", $_SESSION['log_role']);
            endif;
            $row = $this->resultSet();
            if ($row) {
                return $this->resultSet();
            } else {
                $_SESSION['msg'] = Data_Not_Founded;
            }
        }
    }


    public function empinfoprint()
    {
        $op = new khas();
        $id = $op->pro_field($_GET['id']);
        if ($id) {
            if ($_SESSION['log_role'] ==  "manager" || $_SESSION['log_role'] == "admin") :
                $this->query("SELECT * FROM empinfo WHERE emp_id=:id");
                $this->bind(":id",  $id);
            else :
                $this->query("SELECT DISTINCT * FROM empinfo RIGHT JOIN empdistribution ON empinfo.emp_id = empdistribution.emp_id left JOIN auth_roles ON empdistribution.emp_id = auth_roles.prog_id WHERE empinfo.emp_id=:id AND auth_roles.usrid =:usrid ");
                $this->bind(":id",  $id);
                $this->bind(":usrid", $_SESSION['log_role']);
            endif;
            $row = $this->resultSet();
            if ($row) {
                return $this->resultSet();
            } else {
                $_SESSION['msg'] = Data_Not_Founded;
            }
        }
    }


    /******======================================== */

    public   function empqualadd()
    {
        $op = new khas();
        $id = $op->pro_field($_GET['id']);
        if ($id) {
            if (isset($_POST['addRec'])) {
                if (empty($op->pro_field($_POST['emp_qual_type'])) || empty($op->pro_field($_POST['emp_qual_degree']))) {
                    $_SESSION['msg'] = ERR_EMPTY;
                } else {
                    $this->query("SELECT * FROM  empinfo  WHERE emp_id=:id");
                    $this->bind(":id", $id);
                    $row = $this->resultSet();
                    if ($row) {
                        $this->query("INSERT INTO emp_qual( emp_id, emp_qual_type, emp_qual_degree, emp_qual_year, emp_qual_hand, emp_qual_lang, emp_qual_note) 
                    VALUES (:emp_id, :emp_qual_type, :emp_qual_degree, :emp_qual_year, :emp_qual_hand, :emp_qual_lang, :emp_qual_note)");
                        $this->bind(":emp_id", $id);
                        $this->bind(":emp_qual_type",$op->pro_field( $_POST['emp_qual_type']));
                        $this->bind(":emp_qual_degree",$op->pro_field( $_POST['emp_qual_degree']));
                        $this->bind(":emp_qual_year",$op->pro_field( $_POST['emp_qual_year']));
                        $this->bind(":emp_qual_hand",$op->pro_field( $_POST['emp_qual_hand']));
                        $this->bind(":emp_qual_lang",$op->pro_field( $_POST['emp_qual_lang']));
                        $this->bind(":emp_qual_note",$op->pro_field( $_POST['emp_qual_note']));
                        $this->execute();
                        $_SESSION['msg'] = SUCCESS;
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                }
            }
        } else {
            $_SESSION['msg'] = Data_Not_Founded;
        }
    }


    public function empqualupdate()
    {
        $op = new khas();
        $id = $op->pro_field($_GET['id']);
        if ($id) {
            if (isset($_POST['updateRec'])) {
                if (empty($op->pro_field($_POST['emp_qual_type'])) || empty($op->pro_field($_POST['emp_qual_degree']))) {
                    $_SESSION['msg'] = ERR_EMPTY;
                } else {
                    $this->query("UPDATE  emp_qual SET  emp_qual_type=:emp_qual_type, emp_qual_degree=:emp_qual_degree, emp_qual_year=:emp_qual_year,
                       emp_qual_hand=:emp_qual_hand, emp_qual_lang=:emp_qual_lang, emp_qual_note=:emp_qual_note WHERE emp_qual_id=:emp_qual_id");
                    $this->bind(":emp_qual_type", $op->pro_field($_POST['emp_qual_type']));
                    $this->bind(":emp_qual_degree", $op->pro_field($_POST['emp_qual_degree']));
                    $this->bind(":emp_qual_year", $op->pro_field($_POST['emp_qual_year']));
                    $this->bind(":emp_qual_hand", $op->pro_field($_POST['emp_qual_hand']));
                    $this->bind(":emp_qual_lang", $op->pro_field($_POST['emp_qual_lang']));
                    $this->bind(":emp_qual_note", $op->pro_field($_POST['emp_qual_note']));
                    $this->bind(":emp_qual_id", $id);
                    $this->execute();
                    $_SESSION['msg'] = SUCCESS;
                }
            }
            $this->query("SELECT * FROM emp_qual WHERE emp_qual_id=:id");
            $this->bind(":id", $id);
            $row = $this->resultSet();
            if ($row) {
                return $this->resultSet();
            }
        } else {
            $_SESSION['msg'] = Data_Not_Founded;
        }
    }

    public function empqualdelete()
    {
        $op = new khas();
        $id = $op->pro_field($_GET['id']);
        if ($id) {
            if (isset($_POST['delete_items'])) {
                $this->query("DELETE FROM emp_qual WHERE emp_qual_id=:id");
                $this->bind(":id", $id);
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
                header("refresh:0.25;url=" . ROOT_URL . "/employees/empinfoupdate/" . $_GET['emp_id']);
            }
            $this->query("SELECT * FROM emp_qual WHERE emp_qual_id=:id");
            $this->bind(":id", $id);
            $row = $this->resultSet();
            if ($row) {
                return $this->resultSet();
            }
        } else {
            $_SESSION['msg'] = Data_Not_Founded;
        }
    }



    public function empexpeadd()
    {
        $op = new khas();
        $id = $op->pro_field($_GET['id']);
        if ($id) {
            if (isset($_POST['addRec'])) {
                if (empty($op->pro_field($_POST['empexpe_est'])) || empty($op->pro_field($_POST['empexpe_title'])) || empty($op->pro_field($_POST['empexpe_degree']))) {
                     $_SESSION['msg'] = ERR_EMPTY;
                } else {
                    $this->query("SELECT * FROM  empinfo  WHERE emp_id=:id");
                    $this->bind(":id", $id);
                    $row = $this->resultSet();
                    if ($row) {
                        $this->query("INSERT INTO empexpe(emp_id, empexpe_est, empexpe_strdate, empexpe_title, empexpe_degree, empexpe_levdate, empexpe_note) 
                        VALUES (:emp_id, :empexpe_est, :empexpe_strdate, :empexpe_title, :empexpe_degree, :empexpe_levdate, :empexpe_note)");
                        $this->bind(":emp_id", $id);
                        $this->bind(":empexpe_est", $op->pro_field($_POST['empexpe_est']));
                        $this->bind(":empexpe_strdate", $op->pro_field($_POST['empexpe_strdate']));
                        $this->bind(":empexpe_title", $op->pro_field($_POST['empexpe_title']));
                        $this->bind(":empexpe_degree", $op->pro_field($_POST['empexpe_degree']));
                        $this->bind(":empexpe_levdate", $op->pro_field($_POST['empexpe_levdate']));
                        $this->bind(":empexpe_note", $op->pro_field($_POST['empexpe_note']));
                        $this->execute();
                        $_SESSION['msg'] = SUCCESS;
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                }
            }
        } else {
            $_SESSION['msg'] = Data_Not_Founded;
        }
    }


    public function empexpeupdate()
    {
        $op = new khas();
        $id = $op->pro_field($_GET['id']);
        if ($id) {
            if (isset($_POST['updateRec'])) {
                if (empty($op->pro_field($_POST['empexpe_est'])) || empty($op->pro_field($_POST['empexpe_title'])) || empty($op->pro_field($_POST['empexpe_degree']))) {
                    $_SESSION['msg'] = ERR_EMPTY;
                } else {
                    $this->query("SELECT * FROM  empexpe  WHERE empexpe_id=:id");
                    $this->bind(":id", $id);
                    $row = $this->resultSet();
                    if ($row) {
                        $this->query("UPDATE empexpe SET  empexpe_est=:empexpe_est, empexpe_strdate=:empexpe_strdate, empexpe_title=:empexpe_title, empexpe_degree=:empexpe_degree, 
                    empexpe_levdate=:empexpe_levdate, empexpe_note=:empexpe_note  WHERE empexpe_id=:empexpe_id");
                        $this->bind(":empexpe_est", $op->pro_field($_POST['empexpe_est']));
                        $this->bind(":empexpe_strdate", $op->pro_field($_POST['empexpe_strdate']));
                        $this->bind(":empexpe_title", $op->pro_field($_POST['empexpe_title']));
                        $this->bind(":empexpe_degree", $op->pro_field($_POST['empexpe_degree']));
                        $this->bind(":empexpe_levdate", $op->pro_field($_POST['empexpe_levdate']));
                        $this->bind(":empexpe_note", $op->pro_field($_POST['empexpe_note']));
                        $this->bind(":empexpe_id", $id);
                        $this->execute();
                        $_SESSION['msg'] = SUCCESS;
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                }
            }
            $this->query("SELECT * FROM empexpe WHERE empexpe_id=:id");
            $this->bind(":id", $id);
            $row = $this->resultSet();
            if ($row) {
                return $this->resultSet();
            }
        } else {
            $_SESSION['msg'] = Data_Not_Founded;
        }
    }





    public function empexpedelete()
    {
        $op = new khas();
        $id = $op->pro_field($_GET['id']);
        if ($id) {
            if (isset($_POST['delete_items'])) {
                $this->query("DELETE FROM empexpe WHERE empexpe_id=:id");
                $this->bind(":id", $id);
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
                header("refresh:0.25;url=" . ROOT_URL . "/employees/empinfoupdate/" . $_GET['emp_id']);
            }
            $this->query("SELECT * FROM empexpe WHERE empexpe_id=:id");
            $this->bind(":id", $id);
            $row = $this->resultSet();
            if ($row) {
                return $this->resultSet();
            }
        } else {
            $_SESSION['msg'] = Data_Not_Founded;
        }
    }




    //****** ================== employee training courses */

    public function emptracou()
    {
    }

    public function emptracouadd()
    {
        $op = new khas();
        $id = $op->pro_field($_GET['id']);
        if ($id) {
            if (isset($_POST['addRec'])) {
                if (empty($op->pro_field($_POST['tra_cou_title'])) || empty($op->pro_field($_POST['tra_cou_est']))) {
                    $_SESSION['msg']  = ERR_EMPTY;
                } else {
                    $this->query("SELECT * FROM  empinfo  WHERE emp_id=:id");
                    $this->bind(":id", $id);
                    $row = $this->resultSet();
                    if ($row) {
                        $this->query("INSERT INTO  tra_cou( emp_id, tra_cou_title, tra_cou_date, tra_cou_est, tra_cou_due) 
                    VALUES (:emp_id, :tra_cou_title, :tra_cou_date, :tra_cou_est, :tra_cou_due)");
                        $this->bind(":emp_id", $id);
                        $this->bind(":tra_cou_title", $op->pro_field($_POST['tra_cou_title']));
                        $this->bind(":tra_cou_date", $op->pro_field($_POST['tra_cou_date']));
                        $this->bind(":tra_cou_est", $op->pro_field($_POST['tra_cou_est']));
                        $this->bind(":tra_cou_due", $op->pro_field($_POST['tra_cou_due']));
                        $this->execute();
                        $_SESSION['msg'] = SUCCESS;
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                }
            }
        } else {
            $_SESSION['msg'] = Data_Not_Founded;
        }
    }

    public function emptracouupdate()
    {
        $op = new khas();
        $id = $op->pro_field($_GET['id']);
        if ($id) {
            if (isset($_POST['updateRec'])) {
                $this->query("UPDATE  tra_cou SET emp_id=:emp_id, tra_cou_title=:tra_cou_title, tra_cou_date=:tra_cou_date, 
                tra_cou_est=:tra_cou_est, tra_cou_due=:tra_cou_due WHERE tra_cou_id=:id");
                $this->bind(":emp_id", $id);
                $this->bind(":tra_cou_title", $op->pro_field($_POST['tra_cou_title']));
                $this->bind(":tra_cou_date", $op->pro_field($_POST['tra_cou_date']));
                $this->bind(":tra_cou_est", $op->pro_field($_POST['tra_cou_est']));
                $this->bind(":tra_cou_due", $op->pro_field($_POST['tra_cou_due']));
                $this->bind(":id", $id);
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
            }
            $this->query("SELECT * FROM  tra_cou  WHERE tra_cou_id=:id");
            $this->bind(":id", $id);
            $row = $this->resultSet();
            if ($row) {
                return $this->resultSet();
            } else {
                $_SESSION['msg'] = Data_Not_Founded;
            }
        } else {
            $_SESSION['msg'] = Data_Not_Founded;
        }
    }

    public function emptracoudelete()
    {
        $op = new khas();
        $id = $op->pro_field($_GET['id']);
        if ($id) {
            if (isset($_POST['delete_items'])) {
                $this->query("DELETE FROM   tra_cou  WHERE tra_cou_id=:id");
                $this->bind(":id", $id);
                $this->execute();
                header("refresh:0.25;url=" . ROOT_URL . "/employees/empinfoupdate/" . $_GET['emp_id']);
                $_SESSION['msg'] = SUCCESS;
            }
            $this->query("SELECT * FROM  tra_cou  WHERE tra_cou_id=:id");
            $this->bind(":id", $id);
            $row = $this->resultSet();
            if ($row) {
                return $this->resultSet();
            } else {
                $_SESSION['msg'] = Data_Not_Founded;
            }
        } else {
            $_SESSION['msg'] = Data_Not_Founded;
        }
    }
    public function empjobsadd()
    {
        $op = new khas();
        $id = $op->pro_field($_GET['id']);
        if ($id) {
            if (isset($_POST['addRec'])) {
                if (empty($_POST['empjob_title'])) {
                    $_SESSION['msg'] = ERR_EMPTY;
                } else {
                    $this->query("SELECT * FROM  empinfo  WHERE emp_id=:id");
                    $this->bind(":id", $id);
                    $row = $this->resultSet();
                    if ($row) {
                        $this->query("INSERT INTO empjobs(emp_id, empjob_title, em_sec_id, em_lev_id, empjob_strdate, empjob_sellary, empjob_levdate, empjob_note) 
                                    VALUES (:emp_id, :empjob_title, :em_sec_id, :em_lev_id, :empjob_strdate, :empjob_sellary, :empjob_levdate, :empjob_note)");
                        $this->bind(":emp_id", $id);
                        $this->bind(":empjob_title", $op->pro_field($_POST['empjob_title']));
                        $this->bind(":em_sec_id", $op->pro_field($_POST['em_sec_id']));
                        $this->bind(":em_lev_id", $op->pro_field($_POST['em_lev_id']));
                        $this->bind(":empjob_strdate", $op->pro_field($_POST['empjob_strdate']));
                        $this->bind(":empjob_sellary", $op->pro_field($_POST['empjob_sellary']));
                        $this->bind(":empjob_levdate", $op->pro_field($_POST['empjob_levdate']));
                        $this->bind(":empjob_note", $op->pro_field($_POST['empjob_note']));
                        $this->execute();
                        $_SESSION['msg'] = SUCCESS;
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                }
            }
        } else {
            $_SESSION['msg'] = Data_Not_Founded;
        }
    }


    public function empjobsupdate()
    {
        $op = new khas();
        $id = $op->pro_field($_GET['id']);
        if ($id) {
            if (isset($_POST['updateRec'])) {
                if (empty($_POST['empjob_title'])) {
                    $_SESSION['msg'] = ERR_EMPTY;
                } else {
                    $this->query("SELECT * FROM  empjobs  WHERE empjob_id=:id");
                    $this->bind(":id", $id);
                    $row = $this->resultSet();
                    if ($row) {
                        $this->query("UPDATE empjobs SET   empjob_title=:empjob_title, em_sec_id=:em_sec_id, em_lev_id=:em_lev_id, empjob_strdate=:empjob_strdate,
                    empjob_sellary=:empjob_sellary, empjob_levdate=:empjob_levdate, empjob_note=:empjob_note  WHERE empjob_id=:empjob_id");
                        $this->bind(":empjob_title", $op->pro_field($_POST['empjob_title']));
                        $this->bind(":em_sec_id", $op->pro_field($_POST['em_sec_id']));
                        $this->bind(":em_lev_id", $op->pro_field($_POST['em_lev_id']));
                        $this->bind(":empjob_strdate", $op->pro_field($_POST['empjob_strdate']));
                        $this->bind(":empjob_sellary", $op->pro_field($_POST['empjob_sellary']));
                        $this->bind(":empjob_levdate", $op->pro_field($_POST['empjob_levdate']));
                        $this->bind(":empjob_note", $op->pro_field($_POST['empjob_note']));
                        $this->bind(":empjob_id", $id);
                        $this->execute();
                        $_SESSION['msg'] = SUCCESS;
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                }
            }
            $this->query("SELECT * FROM empjobs WHERE empjob_id=:id");
            $this->bind(":id", $id);
            $row = $this->resultSet();
            if ($row) {
                return $this->resultSet();
            }
        } else {
            $_SESSION['msg'] = Data_Not_Founded;
        }
    }





    public function empjobsdelete()
    {
        $op = new khas();
        $id = $op->pro_field($_GET['id']);
        if ($id) {
            if (isset($_POST['delete_items'])) {
                $this->query("DELETE FROM empjobs WHERE empjob_id=:id");
                $this->bind(":id", $id);
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
                header("refresh:0.25;url=" . ROOT_URL . "/employees/empinfoupdate/" . $_GET['emp_id']);
            }
            $this->query("SELECT * FROM empjobs WHERE empjob_id=:id");
            $this->bind(":id", $id);
            $row = $this->resultSet();
            if ($row) {
                return $this->resultSet();
            }
        } else {
            $_SESSION['msg'] = Data_Not_Founded;
        }
    }


    public function empfilesadd()
    {

        $op = new Khas();
        $id = $_GET['id'];
        if ($id) {
            if (isset($_POST['addRec'])) {
                if (empty($op->pro_field($_POST['emp_file_title'])) || empty($op->pro_field($_FILES['emp_file_link']['name']))) {
                    $_SESSION['msg'] = ERR_EMPTY;
                } elseif (is_numeric($op->pro_field($_POST['emp_file_title']))) {
                    $_SESSION['msg'] = ERR_NUMBER;
                } else {
                    $this->query("INSERT INTO emp_file( emp_id, emp_file_title, emp_file_type, emp_file_link, emp_file_date) 
                VALUES ( :emp_id, :emp_file_title, :emp_file_type, :emp_file_link, :emp_file_date)");
                    $this->bind(":emp_id", $id);
                    $this->bind(":emp_file_title", $op->pro_field($_POST['emp_file_title']));
                    $this->bind(":emp_file_type", $op->pro_field($_POST['emp_file_type']));
                    $this->bind(":emp_file_link", $op->pro_field($_FILES['emp_file_link']['name']));
                    $this->bind(":emp_file_date", date("Y-m-d"));
                    $this->execute();
                    if ($this->lastInsertId()) {
                        if ($_POST['emp_file_type'] == "Image") {
                            $op->uploadPic($_FILES['emp_file_link'],  2000000);
                        } else {
                            $op->uploadDoc($_FILES['emp_file_link'],  2000000);
                        }
                        $_SESSION['msg'] = SUCCESS;
                    }
                }
            }
        } else {
            $_SESSION['msg'] = Data_Not_Founded;
        }
    }

    public function empfilesupdate()
    {
        $op = new Khas();
        $id = $_GET['id'];
        if ($id) {

            if (isset($_POST['updateRec'])) {
                if (empty($op->pro_field($_POST['emp_file_title'])) || empty($op->pro_field($_FILES['emp_file_link']['name']))) {
                    $_SESSION['msg'] = ERR_EMPTY;
                } elseif (is_numeric($op->pro_field($_POST['emp_file_title']))) {
                    $_SESSION['msg'] = ERR_NUMBER;
                } else {
                if (!empty($_POST['emp_file_link'])) {
                    $filePath = getcwd() . "/uplouds/" . $op->pro_field($_POST['emp_file_link']);
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
                $this->query("UPDATE emp_file SET  emp_file_title=:emp_file_title,emp_file_type=:emp_file_type,
                emp_file_link=:emp_file_link,emp_file_date=:emp_file_date WHERE emp_file_id=:id");
                $this->bind(":emp_file_title", $op->pro_field($_POST['emp_file_title']));
                $this->bind(":emp_file_type",  $op->pro_field($_POST['emp_file_type']));
                $this->bind(":emp_file_link",  $op->pro_field($_FILES['emp_file_link']['name']));
                $this->bind(":emp_file_date", date("Y-m-d"));
                $this->bind(":id", $id);
                $this->execute();
             
                    if ($_POST['emp_file_type'] == "Image") {
                        $op->uploadPic($_FILES['emp_file_link'],  2000000);
                    } else {
                        $op->uploadDoc($_FILES['emp_file_link'],  2000000);
                    }
                    $_SESSION['msg'] = SUCCESS;
                

            }
        }

            $this->query("SELECT * FROM  emp_file  WHERE emp_file_id=:id");
            $this->bind(":id", $id);
            $row = $this->resultSet();
            if ($row) {
                return $this->resultSet();
            } else {
                $_SESSION['msg'] = Data_Not_Founded;
            }
        }
    }

    public function empfilesdelete()
    {

        $op = new khas();
        $id = $op->pro_field($_GET['id']);
        if ($id) {

            if (isset($_POST['delete_items'])) {
                $this->query("DELETE FROM emp_file  WHERE emp_file_id=:id");
                $this->bind(":id", $id);
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
                header("refresh:0;url=" . ROOT_URL . "/employees/empinfoupdate/" . $_GET['emp_id']);
            }

            $this->query("SELECT * FROM  emp_file  WHERE emp_file_id=:id");
            $this->bind(":id", $id);
            $row = $this->resultSet();
            if ($row) {
                return $this->resultSet();
            } else {
                $_SESSION['msg'] = Data_Not_Founded;
            }
        }
    }



    public function empdistribution()
    {
        $op = new khas();
        if (isset( $_POST['seledulev_id']) ) {
            header("refresh:0;url=" . ROOT_URL . "/employees/empdistribution?edulev_id=" . $op->pro_field($_POST['edulev_id']));
        }
        if (isset( $_POST['pro_id']))  {
            header("refresh:0;url=" . ROOT_URL . "/employees/empdistribution?edulev_id=" . $op->pro_field($_GET['edulev_id']) . "&pro_id=" . $op->pro_field($_POST['pro_id']));
        }

        if(isset( $_GET['pro_id'])  && isset( $_GET['edulev_id'])  && isset( $_GET['emp_name']  )){
            $ex = explode(",", $op->pro_field($_GET['emp_name']));
            $op = new Khas();
            foreach($ex as $item){
                if($op->chek_empdistribution($item , $op->pro_field($_GET['pro_id']))){
                    continue;
                }
                $this->query("INSERT INTO  empdistribution ( emp_id , prog_id ) VALUES ( :emp_id ,  :prog_id )");
                $this->bind(":emp_id" , $item);
                $this->bind(":prog_id", $_GET['pro_id']);
                $this->execute();
            }
            if($this->lastInsertId()){
                $_SESSION['msg'] = SUCCESS;
            }
        }

        if (isset($_GET['pro_id']) && isset( $_GET['edulev_id'])  && isset( $_GET['emp_id'])  && isset(  $_GET['del'])  && $op->pro_field($_GET['del']) ==  'true') {
            $this->query("DELETE FROM  empdistribution  WHERE emp_id=:emp_id AND  prog_id=:prog_id  ");
            $this->bind(":emp_id", $op->pro_field($_GET['emp_id']));
            $this->bind(":prog_id", $op->pro_field($_GET['pro_id']));
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
        }


        if (isset($_GET['pro_id'])) {
            $this->query('SELECT * FROM empinfo');
            $rows = $this->resultSet();
            return json_encode($rows);
        }
    }

 
    
}
