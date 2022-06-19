<?php class section extends Controller{
	protected function index(){
        $viewmodel = new sectionModel();
        $this->returnView($viewmodel->index(), true);
    }
    
    protected function add(){
        $viewmodel = new sectionModel();
        $this->returnView($viewmodel->add(), true);
    }
 

    protected function update(){
        $viewmodel = new sectionModel();
        $this->returnView($viewmodel->update(), false);
    }

    protected function trash()
    {
        $viewmodel = new sectionModel();
        $this->returnView($viewmodel->trash(), true);
    }
    protected function delete(){
        $viewmodel = new sectionModel();
        $this->returnView($viewmodel->delete(), true);
    }
}