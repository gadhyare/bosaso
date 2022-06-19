<?php class courses extends Controller{
	protected function index(){
        $viewmodel = new coursesModel();
        $this->returnView($viewmodel->index(), true);
    }

  
    
    protected function add(){
        $viewmodel = new coursesModel();
        $this->returnView($viewmodel->add(), true);
    }

 

    protected function update(){
        $viewmodel = new coursesModel();
        $this->returnView($viewmodel->update(), true);
    }


    protected function delete(){
        $viewmodel = new coursesModel();
        $this->returnView($viewmodel->delete(), true);
    }
}