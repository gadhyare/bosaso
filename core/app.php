<?php class App
{
    private $controller;
    private $action;
    private $request;
    public function __construct($request)
    {
        
        $this->request = $request;
        if ($this->request['controller'] == "") {
            $this->controller = 'home';
        } else {
            $this->controller = $this->request['controller'];
        }
        if ($this->request['action'] == "") {
            $this->action = 'index';
        }  
        else{
            $this->action = $this->request['action'];
        }
    }
    public function createController()
    {
        $error_page =  'Views/404.php';
        $ts = new Abillity;
        if (class_exists($this->controller)) {
             if($ts->chkLink($this->controller)){
                $parents = class_parents($this->controller);
            if (in_array("Controller", $parents)) {
                if (method_exists($this->controller, $this->action)) {
                    return new $this->controller($this->action, $this->request);
                } else {
                    require($error_page);
                }
            } else {
                require($error_page);
            }
             }else{
                require($error_page);
             }
         
        } else {
            require($error_page);
        }
    }
}
