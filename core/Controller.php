<?php class Controller
{
    protected $request;
    protected $action;

    public function __construct($action, $request)
    {
        $this->action = $action;
        $this->request = $request;
    }

    public function executeAction()
    {
        return $this->{$this->action}();
    }

    protected function ReturnView($viewmodel, $fullview)
    {
        $view = 'Views/' . get_class($this) . '/' . $this->action . '.php';
        if($fullview) {
            try{
                require('Views/main.php');
            }catch(Exception $e){
                $_SESSION['err_page'] = "ss";
            }
            
        } else {
            require('Views/secmain.php');
        }
    }
}
   
// error_reporting(0);      
