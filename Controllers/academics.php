<?php class academics extends Controller{
	protected function index(){
        $viewmodel = new academicsModel();
        $this->returnView($viewmodel->index(), true);
    }
    
    protected function add(){
        $viewmodel = new academicsModel();
        $this->returnView($viewmodel->add(), true);
    }
 

    protected function update(){
        $viewmodel = new academicsModel();
        $this->returnView($viewmodel->update(), false);
    }


    protected function delete(){
        $viewmodel = new academicsModel();
        $this->returnView($viewmodel->delete(), true);
    }


     protected function trash(){
        $viewmodel = new academicsModel();
        $this->returnView($viewmodel->trash(), true);
    }   

     
}