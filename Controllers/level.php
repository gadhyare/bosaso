<?php class level extends Controller{
	protected function index(){
        $viewmodel = new levelModel();
        $this->returnView($viewmodel->index(), true);
    }
    
    protected function add(){
        $viewmodel = new levelModel();
        $this->returnView($viewmodel->add(), true);
    }



    protected function update(){
        $viewmodel = new levelModel();
        $this->returnView($viewmodel->update(), false);
    }


    protected function delete(){
        $viewmodel = new levelModel();
        $this->returnView($viewmodel->delete(), true);
    }

        protected function trash(){
        $viewmodel = new levelModel();
        $this->returnView($viewmodel->trash(), true);
    } 
}