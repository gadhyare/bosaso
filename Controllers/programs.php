<?php class programs extends Controller{
	protected function index(){
        $viewmodel = new programsModel();
        $this->returnView($viewmodel->index(), true);
    }
    
    protected function add(){
        $viewmodel = new programsModel();
        $this->returnView($viewmodel->add(), false);
    }


  

    protected function update(){
        $viewmodel = new programsModel();
        $this->returnView($viewmodel->update(), false);
    }


    protected function delete(){
        $viewmodel = new programsModel();
        $this->returnView($viewmodel->delete(), true);
    }


    
    protected function prosub(){
        $viewmodel = new programsModel();
        $this->returnView($viewmodel->prosub(), false);
    }


    
    protected function setprogreport(){
        $viewmodel = new programsModel();
        $this->returnView($viewmodel->setprogreport(), false);
    }     
}