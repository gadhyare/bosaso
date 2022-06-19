<?php class filemanager extends Controller
{
    protected function index()
    {
        $viewmodel = new filemanagerModel();
        $this->returnView($viewmodel->index(), true);
    }

       protected function delfile()
    {
        $viewmodel = new filemanagerModel();
        $this->returnView($viewmodel->delfile(), true);
    }

       protected function upload()
    {
        $viewmodel = new filemanagerModel();
        $this->returnView($viewmodel->upload(), true);
    }
    
}
