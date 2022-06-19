<?php class todolist extends Controller{
	protected function index(){
        $viewmodel = new todolistModel();
        $this->returnView($viewmodel->index(), true);
    }
    
    protected function add(){
        $data1 = new todolistModel();
        $data2 = new userModel();
        $viewmodel['add'] = $data1->add();
        $viewmodel['user'] = $data2->getUsrsList();
        $this->returnView($viewmodel , false);
    }
    protected function update(){
        $viewmodel = new todolistModel();
        $this->returnView($viewmodel->update() , false);
    }
    protected function show(){
        $viewmodel = new todolistModel();
        $this->returnView($viewmodel->show() , false);
    }

    protected function endtodolist(){
        $viewmodel = new todolistModel();
        $this->returnView($viewmodel->endtodolist()  , true);
    }
    
}