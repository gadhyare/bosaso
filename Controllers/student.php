<?php class student extends Controller
{
    protected function index()
    {
        $viewmodel = new studentModel();
        $this->returnView($viewmodel->index(), true);
    }
    protected function info()
    {
        $data = new studentModel();
        $viewmodel[0] = $data->info();
        $viewmodel[1] = $data->countStudent();
        $this->returnView($viewmodel , true);
    }

     protected function getinfo()
    {
        $data = new studentModel();
        $viewmodel  = $data->getinfo(); 
        $this->returnView($viewmodel , false);
    }    
    

    public function register()
    {
        $viewmodel = new studentModel();
        $this->returnView($viewmodel->register(), true);
    }

 


    public function update()
    {
        $viewmodel = new studentModel();

        if(isset($_GET['show']) && $_GET['show'] == 'yes'){
            $this->returnView($viewmodel->update(), false);
        }else{
            $this->returnView($viewmodel->update(), true);
        }
    }

    public function studentinfoprint()
    {
        $viewmodel = new studentModel();
        $this->returnView($viewmodel->studentinfoprint(), true);
    }

    public function delete()
    {
        $viewmodel = new studentModel();
        $this->returnView($viewmodel->delete(), true);
    }
    
 
    public function multidel()
    {
        $viewmodel = new studentModel();
        $this->returnView($viewmodel->multidel(), true);
    }

    
    public function getdepartment()
    {

        $viewmodel = new studentModel();
        $this->returnView($viewmodel->getdepartment(), false);
    }
    public function Studentrel()
    {
        $viewmodel = new studentModel();
        $this->returnView($viewmodel->Studentrel(), true);
    }
    public function Studentacademic()
    {
        $viewmodel = new studentModel();
        $this->returnView($viewmodel->Studentacademic(), true);
    }
    public function StudentShow()
    {
        $viewmodel = new studentModel();
        $this->returnView($viewmodel->StudentShow(), true);
    }
    public function Studinfo()
    {
        $viewmodel = new studentModel();
        $this->returnView($viewmodel->Studinfo(), true);
    }
    public function studentfullreg()
    {
        $viewmodel = new studentModel();
        $this->returnView($viewmodel->studentfullreg(), true);
    }
    public function uploadfile()
    {
        $viewmodel = new studentModel();
        $this->returnView($viewmodel->uploadfile(), true);
    }
    public function exporttoexcel()
    {
        $viewmodel = new studentModel();
        $this->returnView($viewmodel->exporttoexcel(), true);
    }

    public function addsturel()
    {
        $viewmodel = new studentModel();
        $this->ReturnView($viewmodel->addsturel(), true);
    }

    public function Studentrelinfo()
    {
        $viewmodel = new studentModel();
        $this->ReturnView($viewmodel->Studentrelinfo(), true);
    }

    public function Studentreldel()
    {
        $viewmodel = new studentModel();
        $this->ReturnView($viewmodel->Studentreldel(), true);
    }


    public function Studentrelupdate()
    {
        $viewmodel = new studentModel();
        $this->ReturnView($viewmodel->Studentrelupdate(), true);
    }

    public function Studentacademicinfo()
    {
        $viewmodel = new studentModel();
        $this->ReturnView($viewmodel->Studentacademicinfo(), true);
    }


    public function Studentacademicdel()
    {
        $viewmodel = new studentModel();
        $this->ReturnView($viewmodel->Studentacademicdel(), true);
    }

    public function Studentacademicupdate()
    {
        $viewmodel = new studentModel();
        $this->ReturnView($viewmodel->Studentacademicupdate(), true);
    }

    public function StudentacademicPro()
    {
        $viewmodel = new studentModel();
        $this->ReturnView($viewmodel->StudentacademicPro(), true);
    }


    public function StudentacademicProdel()
    {
        $viewmodel = new studentModel();
        $this->ReturnView($viewmodel->StudentacademicProdel(), true);
    }

    public function StudentacademicProadd()
    {
        $viewmodel = new studentModel();
        $this->ReturnView($viewmodel->StudentacademicProadd(), true);
    }

    public function StudentacademicProupdate()
    {
        $viewmodel = new studentModel();
        $this->ReturnView($viewmodel->StudentacademicProupdate(), true);
    }

    public function stuinfoprint()
    {
        $viewmodel = new studentModel();
        $this->ReturnView($viewmodel->stuinfoprint(), false);
    }


    public function stuinfolist()
    {
        $viewmodel = new studentModel();
        $this->ReturnView($viewmodel->stuinfolist(), true);
    }


    public function stuinfolistprint()
    {
        $viewmodel = new studentModel();
        $this->ReturnView($viewmodel->stuinfolistprint(), false);
    }


    public function stuinfolistpdf()
    {
        $viewmodel = new studentModel();
        $this->ReturnView($viewmodel->stuinfolistpdf(), false);
    }

    public function upgradecls()
    {
        $viewmodel = new studentModel();
        $this->ReturnView($viewmodel->upgradecls(), true);
    }

    public function stulistupload()
    {
        $viewmodel = new studentModel();
        $this->ReturnView($viewmodel->stulistupload(), true);
    }


    public function searchstuinfo()
    {
        $viewmodel = new studentModel();
        $this->ReturnView($viewmodel->searchstuinfo(), true);
    }

    
}
