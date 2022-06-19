<?php class subject extends Controller
{
    protected function index()
    {
        $viewmodel = new subjectModel();
        $this->returnView($viewmodel->index(), true);
    }

    protected function add()
    {
        $viewmodel = new subjectModel();
        $this->returnView($viewmodel->add(), false);
    }


  

    protected function update()
    {
        $viewmodel = new subjectModel();
        $this->returnView($viewmodel->update(), false);
    }


    protected function delete()
    {
        $viewmodel = new subjectModel();
        $this->returnView($viewmodel->delete(), true);
    }

    protected function subjectlevel()
    {
        $viewmodel = new subjectModel();
        $this->returnView($viewmodel->subjectlevel(), true);
    }

    protected function ordersubByfacl()
    {
        $viewmodel = new subjectModel();
        $this->returnView($viewmodel->ordersubByfacl(), true);
    }


    protected function ordersubByfaclprint()
    {
        $viewmodel = new subjectModel();
        $this->returnView($viewmodel->ordersubByfaclprint(), false);
    }


    protected function uploadsujectlist()
    {
        $viewmodel = new subjectModel();
        $this->returnView($viewmodel->uploadsujectlist(), true);
    }

    protected function ordersubByfacldel()
    {
        $viewmodel = new subjectModel();
        $this->returnView($viewmodel->ordersubByfacldel(), true);
    }


       protected function trash()
    {
        $viewmodel = new subjectModel();
        $this->returnView($viewmodel->trash(), true);
    }
 

    
}
