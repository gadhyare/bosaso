<?php 
class filemanagerModel extends Model
{
    public function index()
    {
        
    }

    public function delfile()
    {
        if(isset($_GET['file'])){
            $file_name = getcwd() . '/uplouds/'.$_GET['file'];
            if(file_exists($file_name)){
                if(unlink($file_name)){
                    header("refresh:0;url=".ROOT_URL .'/filemanager');
                    $_SESSION['msg'] = SUCCESS;

                }
            }
        }  
    
    
    }

    public function upload()
    {
        if (isset($_POST['FileUp'])) {
            $op = new Khas();
            $allowed_files = array("jpeg", "jpg", "png",  "gif");
            $file_exe = pathinfo($_FILES['uploadFile']['name'], PATHINFO_EXTENSION);
            if(in_array($file_exe , $allowed_files)){
                $op->uploadFiles($_FILES['uploadFile'] , $file_exe, 2000000);
            }else{
                $_SESSION['msg'] = ERR_UPLOADS;
            }
        }
    }
    
}