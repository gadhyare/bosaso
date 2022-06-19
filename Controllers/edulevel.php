<?php class edulevel extends Controller{
	protected function index(){
        $viewmodel = new edulevelModel();
        $this->returnView($viewmodel->index(), true);
    }
    
    protected function add(){
        $viewmodel = new edulevelModel();
        $this->returnView($viewmodel->add(), true);
    }


    protected function trash(){
        $viewmodel = new edulevelModel();
        $this->returnView($viewmodel->trash(), true);
    }

    protected function update(){
        $viewmodel = new edulevelModel();
        $this->returnView($viewmodel->update(), false);
    }


    protected function delete(){
        $viewmodel = new edulevelModel();
        $this->returnView($viewmodel->delete(), true);
    }

     
}
