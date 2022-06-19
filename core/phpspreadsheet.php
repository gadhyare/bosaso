<?php
use PhpOffice\PhpSpreadsheet\Calculation\Exception;

class spreedExcel{

    public  $fileName  ;
    public  $fileType  ;
    public  $fileSize  ;
    public  $tmp_name  ;



    public function __construct()
    {
        
        require_once ( 'lib/phpspreadsheet/vendor/autoload.php'); 
        
    }

    public function getSingleFileInfo($uploadFile)
    {
        $allowFiles = ['application/vnd.ms-excel', 'text/xls', 'text/xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
        if (in_array($uploadFile['type'], $allowFiles)) {
            $this->fileName = $uploadFile['name'];
            $this->fileType = $uploadFile['type'];
            $this->fileSize = $uploadFile['size'];
            $this->tmp_name = $uploadFile['tmp_name'];
            if ($this->fileSize > 0) {
                if($this->UploadNewFile($this->tmp_name, $this->fileName)){
                      echo  $this->getRows($this->fileName);
                }
            } else {
                $_SESSION['msg'] = SMALL_FILE_SIZE;
            }
        }
    }
    
    
    public function UploadNewFile($tmp_name, $fileName)
    {
        try {
            $this->tempnam = $tmp_name;
            $this->fileName  = $fileName;
            if (@move_uploaded_file($this->tmp_name, getcwd() . "/filesdir/$this->fileName")) {
                $_SESSION['msg'] = SUCCESS;
            } else {
                $_SESSION['msg'] = FILE_NOT_UPLOADED_CORRCET;
            }
        } catch (Exception $e) {
            $_SESSION['msg'] = $e->getMessage();
        }
    }


    public function getRows($fileName){

        $this->fileName  = $fileName;
        if(file_exists(getcwd() . "/filesdir/$this->fileName")){
             $file = fopen(getcwd() . "/filesdir/$this->fileName"  , "r");
             while(($emapData = fgetcsv($file, 10000 , ","))){

             }
        }
    }
    
    
}

 






