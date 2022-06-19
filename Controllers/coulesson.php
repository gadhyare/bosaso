<?php class coulesson extends Controller{
	protected function index(){
        $viewmodel = new coulessonModel();
        $this->returnView($viewmodel->index(), true);
    }

  
    
    protected function add(){
        $viewmodel = new coulessonModel();
        $this->returnView($viewmodel->add(), true);
    }

 

    protected function update(){
        $viewmodel = new coulessonModel();
        $this->returnView($viewmodel->update(), true);
    }


    protected function delete(){
        $viewmodel = new coulessonModel();
        $this->returnView($viewmodel->delete(), true);
    }

    protected function show(){
        $viewmodel = new coulessonModel();
        $this->returnView($viewmodel->show(), true);
    }
    
}