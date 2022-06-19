<?php class faculty extends Controller{
	protected function index(){
        $viewmodel = new facultyModel();
        $this->returnView($viewmodel->index(), true);
    }
    
    protected function add(){
        $viewmodel = new facultyModel();
        $this->returnView($viewmodel->add(), true);
    }

 

    protected function update(){
        $viewmodel = new facultyModel();
        $this->returnView($viewmodel->update(), false);
    }


    protected function delete(){
        $viewmodel = new facultyModel();
        $this->returnView($viewmodel->delete(), true);
    }

  
    protected function trash(){
        $viewmodel = new facultyModel();
        $this->returnView($viewmodel->trash(), true);
    }   
}
