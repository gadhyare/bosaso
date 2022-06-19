<?php class home extends Controller{
	protected function index(){
        $viewmodel = new homeModel();
        $this->returnView($viewmodel->index(), true);
    }
    


    protected function  versioninfo(){
        $this->returnView( '', false);
    }
 
}