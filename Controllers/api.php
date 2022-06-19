<?php class api extends Controller
{
    protected function index()
    {
        $viewmodel = new apiModel();
        $this->returnView($viewmodel->index(), true);
    }

 
}
