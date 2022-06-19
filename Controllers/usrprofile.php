<?php class usrprofile extends Controller{
    
    protected function index(){
        $viewmodel = new usrprofileModel();
        $this->returnView($viewmodel->index(), true);
    }


    protected function logout(){
        $viewmodel = new usrprofileModel();
        $this->returnView($viewmodel->logout(), false);
    }  
    
}