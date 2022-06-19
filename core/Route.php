<?php 

class Route
{



    public function __construct()
    {
        
    }

    public static function Route($file)
    { 

        if(! empty($file)){
            require_once "$file.php";
        }else{
            $_SESSION['msg'] = File_Not_Founded;
            return false;
        }
        
    }


}
