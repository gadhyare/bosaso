<?php class department extends Controller{
	protected function index(){
        $viewmodel = new departmentModel();
        $this->returnView($viewmodel->index(), true);
    }
    
    protected function add(){
        $viewmodel = new departmentModel();
        $this->returnView($viewmodel->add(), true);
    }

 
    protected function update(){
        $viewmodel = new departmentModel();
        $this->returnView($viewmodel->update(), false);
    }


    protected function delete(){
        $viewmodel = new departmentModel();
        $this->returnView($viewmodel->delete(), true);
    }

    
    protected function trash(){
        $viewmodel = new departmentModel();
        $this->returnView($viewmodel->trash(), true);
    }

   

}