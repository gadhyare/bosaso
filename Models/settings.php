<?php class settingsModel extends Model
{
    public  $rowss;
    public function index()
    {
        if(isset($_GET['bakupexit']) && $_GET['bakupexit'] == 'yes'):
            unset($_SESSION['bkUp']);
            $_SESSION['msg'] = SUCCESS;
            header('refresh:0;url=' . ROOT_URL . '/settings');
        endif; 
    }


    public function setemail()
    {
        $op =  new khas();
        if (isset($_POST['updateBtn'])) {
            if (!empty($op->pro_field($_POST['em_Host'])) && !empty($op->pro_field($_POST['em_userName'])) && !empty($op->pro_field($_POST['em_userPass'])) && !empty($op->pro_field($_POST['em_SmtpSecure'])) && !empty($op->pro_field($_POST['em_Port'])) && !empty($op->pro_field($_POST['em_site']))) {
                $this->query("UPDATE emailset SET em_Host=:em_Host,em_userName=:em_userName,em_userPass=:em_userPass,em_SmtpSecure=:em_SmtpSecure,em_Port=:em_Port,em_site=:em_site");
                $this->bind(":em_Host", $op->pro_field($_POST['em_Host']));
                $this->bind(":em_userName", $op->pro_field($_POST['em_userName']));
                $this->bind(":em_userPass", $op->pro_field($_POST['em_userPass']));
                $this->bind(":em_SmtpSecure", $op->pro_field($_POST['em_SmtpSecure']));
                $this->bind(":em_Port", $op->pro_field($_POST['em_Port']));
                $this->bind(":em_site", $op->pro_field($_POST['em_site']));
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
            } else {
                $_SESSION['msg'] = ERR_EMPTY;
            }
        }
        $this->query("SELECT * FROM emailset");
        $row = $this->resultSet();
        return $row;
    }


    public function update()
    {
        $op = new khas();
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($_POST['updateSiteInfo'])) {

            $this->query('UPDATE settings SET  siteName= :siteName,siteDisc=:siteDisc,siteAddr=:siteAddr,sitePhones=:sitePhones,siteEmail= :siteEmail ,siteUrl= :siteUrl ,siteTags= :siteTags,siteStatus= :siteStatus,siteColsemsg= :siteColsemsg ');
            $this->bind(':siteName',  $op->pro_field($post['siteName']));
            $this->bind(':siteDisc',  $op->pro_field($post['siteDisc']));
            $this->bind(':siteAddr',  $op->pro_field($post['siteAddr']));
            $this->bind(':sitePhones',  $op->pro_field($post['sitePhones']));
            $this->bind(':siteEmail',  $op->pro_field($post['siteEmail']));
            $this->bind(':siteUrl',  $op->pro_field($post['siteUrl']));
            $this->bind(':siteTags',  $op->pro_field($post['siteTags']));
            $this->bind(':siteStatus',  $op->pro_field($post['siteStatus']));
            $this->bind(':siteColsemsg',  $op->pro_field($post['siteColsemsg']));
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
        }
        $this->query('SELECT * FROM settings');
        $rows = $this->resultSet();
        return $rows;
    }


    public function export()
    {
      
        if (isset($_POST["export"])) {
            $connection = mysqli_connect(GDB_HOST, GDB_USER, GDB_PASS, GDB_NAME);
            $tables = array();
            $result = mysqli_query($connection, "SHOW TABLES");
            while ($row = mysqli_fetch_row($result)) {
                $tables[] = $row[0];
            }

            $return = '';
            foreach ($tables as $table) {
                $result = mysqli_query($connection, "SELECT * FROM " . $table);
                $num_fields = mysqli_num_fields($result);

                $return .= 'DROP TABLE IF EXISTS ' . $table . ';';
                $row2 = mysqli_fetch_row(mysqli_query($connection, "SHOW CREATE TABLE " . $table));
                $return .= "\n\n" . $row2[1] . ";\n\n";

                for ($i = 0; $i < $num_fields; $i++) {
                    while ($row = mysqli_fetch_row($result)) {
                        $return .= "INSERT INTO " . $table . " VALUES(";
                        for ($j = 0; $j < $num_fields; $j++) {
                            $row[$j] = addslashes($row[$j]);
                            if (isset($row[$j])) {
                                $return .= '"' . $row[$j] . '"';
                            } else {
                                $return .= '""';
                            }
                            if ($j < $num_fields - 1) {
                                $return .= ',';
                            }
                        }
                        $return .= ");\n";
                    }
                }
                $return .= "\n\n\n";
            }

            //save file

            $NowDate = date("y_m_d_h_i_sa");

            $currentFileName =  getcwd() . "/filesdir/backup_$NowDate.sql";

            $handle = fopen($currentFileName, "w+");
            fwrite($handle, $return);

            $op = new Khas();

            setcookie("currentSqlFile", "", time() - 3600);

            setcookie("currentSqlFile", "filesdir/backup-$NowDate.sql", time() + 500);


            $_SESSION['msg']  = SUCCESS_EXPORT_DATABASE;
        }
    }


    public function delexportfile()
    {
        if (isset($_POST['DelFiles'])) {
            array_map('unlink', glob(getcwd() . "/filesdir/*.sql"));
            $_SESSION['msg'] = SUCCESS;
        }
    }

    public function socialmedia()
    {

        $this->query("SELECT * FROM socialmedia");
        $rows = $this->resultSet();

        return $rows;
    }


    public function socialmediadd()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $op = new khas();

        if (isset($_POST['socialmediadd'])) {
            if (!empty($op->pro_field($post['socialmedia_name'])) || !empty($op->pro_field($post['socialmedia_link'])) || !empty($op->pro_field($post['socialmedia_logo']))) {
                $this->query("INSERT INTO socialmedia(socialmedia_name, socialmedia_link,socialmedia_logo, active) VALUES (:socialmedia_name, :socialmedia_link ,:socialmedia_logo , :active)");
                $this->bind(":socialmedia_name", $op->pro_field($post['socialmedia_name']));
                $this->bind(":socialmedia_link", $op->pro_field($post['socialmedia_link']));
                $this->bind(":socialmedia_logo", $op->pro_field($post['socialmedia_logo']));
                $this->bind(":active", $op->pro_field($post['active']));
                $this->execute();
                if ($this->lastInsertId()) {
                    $_SESSION['msg'] = SUCCESS;
                }
            } else {
                $_SESSION['msg'] = ERR_EMPTY;
            }
        }
    }


    public function socialmediadel()
    {

        if (isset($_POST['delete_items'])) {
            $this->query('DELETE FROM socialmedia WHERE socialmedia_id=:id');
            $this->bind(':id',  $_GET['id']);
            $this->execute();
            header('refresh:0.1;url=' . ROOT_URL . '/settings/socialmedia');
        }
        $this->query('SELECT * FROM socialmedia WHERE socialmedia_id=:id');
        $this->bind(':id',  $_GET['id']);
        $select_to_delete = $this->resultSet();;
        return $select_to_delete;
    }






    public function socialmediaedit()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $op = new khas();
        if (isset($_POST['socialmediaedite'])) {
            if (!empty($op->pro_field($post['socialmedia_name'])) || !empty($op->pro_field($post['socialmedia_link'])) || !empty($op->pro_field($post['socialmedia_logo']))) {
                $this->query("UPDATE socialmedia SET socialmedia_name = :socialmedia_name, socialmedia_link=:socialmedia_link,socialmedia_logo=:socialmedia_logo, active=:active   WHERE socialmedia_id=:id");
                $this->bind(":socialmedia_name", $op->pro_field($post['socialmedia_name']));
                $this->bind(":socialmedia_link", $op->pro_field($post['socialmedia_link']));
                $this->bind(":socialmedia_logo", $op->pro_field($post['socialmedia_logo']));
                $this->bind(":active", $op->pro_field($post['active']));
                $this->bind(':id',  $op->pro_field($_GET['id']));
                $do_edit = $this->execute();
                $_SESSION['msg'] = SUCCESS;
                header("refresh:1;url=" . ROOT_URL . '/settings/socialmedia');
            } else {
                $_SESSION['msg'] = ERR_EMPTY;
            }
        }
        $this->query('SELECT * FROM socialmedia WHERE socialmedia_id=:id');
        $this->bind(':id',  $_GET['id']);
        $rom = $this->resultSet();;
        return $rom;
    }
    /**
     * her we can manage all files 
     */
    public function filemanager()
    {
    }





    public function import()
    {
        $op = new khas();
        if (isset($_POST['import'])) :
            $files = $_FILES['uploadFile'];
            $f_name    = $files['name'];
            $f_tmp     = $files['tmp_name'];
            $f_size    = $files['size'];
            $f_error   = $files['error'];
            $file_type = pathinfo($f_name, PATHINFO_EXTENSION);
            $f_allow   = array("sql");
            if (in_array($file_type, $f_allow)) {
                if ($f_error === 0) {
                    if ($f_size > 0) {
                        $f_upload_dir =   getcwd() . "/uplouds/";
                        $newfileName = $op->random_string(20);
                        $upFileName = $f_upload_dir . $newfileName . "." . $file_type;
                        if (move_uploaded_file($f_tmp, $upFileName)) {
                            $this->crtDb() ;
                                try {
                                    //$sql = file_get_contents($upFileName);
                                    $conn = new   PDO("mysql:host=" . GDB_HOST . ";dbname=newminun", GDB_USER, GDB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"));
                                    // set the PDO error mode to exception
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    /* execute multi query */
                                    
                                $filename = $upFileName; //How to Create SQL File Step : url:http://localhost/phpmyadmin->detabase select->table select->Export(In Upper Toolbar)->Go:DOWNLOAD .SQL FILE
                                $op_data = '';
                                $lines = file($filename);
                                foreach ($lines as $line) {
                                    if (substr($line, 0, 2) == '--' || $line == '') //This IF Remove Comment Inside SQL FILE
                                    {
                                        continue;
                                    }
                                    $op_data .= $line;
                                    if (substr(trim($line), -1, 1) == ';'
                                    ) //Breack Line Upto ';' NEW QUERY
                                    {
                                        $conn->query($op_data);
                                        $op_data = '';
                                        $_SESSION['bkUp']= 'yes';
                                    }
                                } 
                                } catch (PDOException $e) {
                                   $_SESSION['msg'] =  $e->getMessage();
                                }
                                $conn = null;
                            
                            unlink($f_upload_dir . $newfileName . "." . $file_type);
                        }
                    } else {
                        $_SESSION['msg']  = FILE_SIZE_ERR;
                    }
                } else {
                    $_SESSION['msg'] = ERR_UPLOADS;
                }
            } else {
                $_SESSION['msg']  = FILE_TYPE_ERR;
            }
        endif;
    }


    public function crtDb()
    {
        // Create connection
 
        try {
            $conn =  new PDO("mysql:host=" . GDB_HOST . ";dbname=" . GDB_NAME, GDB_USER, GDB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"));
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE DATABASE newminun";
            // use exec() because no results are returned
            $conn->exec($sql);
        } catch (PDOException $e) {
            //$_SESSION['msg'] =  $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }


    public function upgrade()
    {
        if(isset($_POST['upgrade'])){
            $op = new khas();
            if(isset($_SESSION['update']) && $_SESSION['update'] > $op->getVersion('version')){ 
                $zip_url   = "http://gushari.xyz/upgrades/Idaarati.zip";
                $destination_path =  getcwd() . "/Idaarati.zip";
                file_put_contents($destination_path, fopen($zip_url, 'r'));
                if (file_exists($destination_path)) {
                    $zip = new ZipArchive;
                    $res = $zip->open($destination_path);
                    if ($res === TRUE
                    ) {
                        $zip->extractTo(getcwd());
                        $zip->close();
                        $_SESSION['msg'] = SUCCESS_UPGRADE;
                        unlink($destination_path);
                    } else {
                        $_SESSION['msg'] = ERR_UPGRADE;
                    }
                }
            }
        }
    }
}
