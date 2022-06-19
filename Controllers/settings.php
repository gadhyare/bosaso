<?php class settings extends Controller
{
    protected function index()
    {
        $viewmodel = new settingsModel();
        $this->returnView($viewmodel->index(), true);
    }

    protected function export()
    {
        $viewmodel = new settingsModel();
        $this->returnView($viewmodel->export(), true);
    }

    protected function import()
    {
        $viewmodel = new settingsModel();
        $this->returnView($viewmodel->import(), true);
    }
    protected function delexportfile()
    {
        $viewmodel = new settingsModel();
        $this->returnView($viewmodel->delexportfile(), true);
    }

    protected function update()
    {
        $viewmodel = new settingsModel();
        $this->returnView($viewmodel->update(), true);
    }


    protected function socialmedia()
    {
        $viewmodel = new settingsModel();
        $this->returnView($viewmodel->socialmedia(), true);
    }


    protected function socialmediadd()
    {
        $viewmodel = new settingsModel();
        $this->returnView($viewmodel->socialmediadd(), true);
    }


    protected function socialmediadel()
    {
        $viewmodel = new settingsModel();
        $this->returnView($viewmodel->socialmediadel(), true);
    }

    protected function socialmediaedit()
    {
        $viewmodel = new settingsModel();
        $this->returnView($viewmodel->socialmediaedit(), true);
    }


    protected function setemail()
    {
        $viewmodel = new settingsModel();
        $this->returnView($viewmodel->setemail(), true);
    }


    protected function filemanager()
    {
        $viewmodel = new settingsModel();
        $this->returnView($viewmodel->filemanager(), true);
    }


        protected function upgrade()
    {
        $viewmodel = new settingsModel();
        $this->returnView($viewmodel->upgrade(), true);
    }

    
}
