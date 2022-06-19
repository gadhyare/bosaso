<?php class exams extends Controller
{
    protected function index()
    {
        $viewmodel = new examsModel();
        $this->returnView($viewmodel->index(), true);
    }

    protected function add()
    {
        $viewmodel = new examsModel();
        $this->returnView($viewmodel->add(), true);
    }
    protected function newexam()
    {
        $viewmodel = new examsModel();
        $this->returnView($viewmodel->newexam(), true);
    }
    protected function stufullGpapdf()
    {
        $viewmodel = new examsModel();
        $this->returnView($viewmodel->stufullGpapdf(), false);
    }

    protected function searchresult()
    {
        $viewmodel = new examsModel();
        $this->returnView($viewmodel->searchresult(), true);
    }
    protected function stdelexam()
    {
        $viewmodel = new examsModel();
        $this->returnView($viewmodel->stdelexam(), true);
    }

    protected function stupexam()
    {
        $viewmodel = new examsModel();
        $this->returnView($viewmodel->stupexam(), true);
    }
    protected function showStuRecord()
    {
        $viewmodel = new examsModel();
        $this->returnView($viewmodel->showStuRecord(), true);
    }

    protected function examselPro()
    {
        $viewmodel = new examsModel();
        $this->returnView($viewmodel->examselPro(), true);
    }


    protected function updatestuexam()
    {
        $viewmodel = new examsModel();
        $this->returnView($viewmodel->updatestuexam(), true);
    }

    protected function examsstuadd()
    {
        $viewmodel = new examsModel();
        $this->returnView($viewmodel->examsstuadd(), true);
    }

    protected function examsstu()
    {
        $viewmodel = new examsModel();
        $this->returnView($viewmodel->examsstu(), true);
    }

    protected function stuGpa()
    {
        $viewmodel = new examsModel();
        $this->returnView($viewmodel->stuGpa(), true);
    }


    protected function searchresultprint()
    {
        $viewmodel = new examsModel();
        $this->returnView($viewmodel->searchresultprint(), false);
    }


    protected function stuGpaprint()
    {
        $viewmodel = new examsModel();
        $this->returnView($viewmodel->stuGpaprint(), false);
    }

    protected function stufullGpaprint()
    {
        $viewmodel = new examsModel();
        $this->returnView($viewmodel->stufullGpaprint(), false);
    }

    protected function updateexam(){
        $viewmodel = new examsModel();
        $this->returnView($viewmodel->updateexam(), true);        
    }

     protected function getstuacamicid(){
        $viewmodel = new examsModel();
        $this->returnView($viewmodel->getstuacamicid(), false);        
    }   

    
}
