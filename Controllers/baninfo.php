<?php class baninfo extends Controller{
	protected function index(){
        $viewmodel = new baninfoModel();
        $this->returnView($viewmodel->index(), true);
    }
    
 

    protected function delete(){
        $viewmodel = new baninfoModel();
        $this->returnView($viewmodel->delete(), false);
    }

    protected function update()
    {
        $viewmodel = new baninfoModel();
        $this->returnView($viewmodel->update(), false);
    }
}
