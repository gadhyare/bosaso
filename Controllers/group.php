<?php class group extends Controller{
	protected function index(){
        $viewmodel = new groupModel();
        $this->returnView($viewmodel->index(), true);
    }

    
    
    protected function add(){
        $viewmodel = new groupModel();
        $this->returnView($viewmodel->add(), true);
    }


    protected function update(){
        $viewmodel = new groupModel();
        $this->returnView($viewmodel->update(), false);
    }


    protected function trash(){
        $viewmodel = new groupModel();
        $this->returnView($viewmodel->trash(), true);
    }

    protected function delete(){
        $viewmodel = new groupModel();
        $this->returnView($viewmodel->delete(), true);
    }




    protected function itus(){
        $viewmodel = new groupModel();
        $this->returnView($viewmodel->index(), false);
    }
    
}