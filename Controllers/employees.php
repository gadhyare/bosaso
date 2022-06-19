<?php class employees extends Controller
{
    protected function index()
    {
        $viewmodel = new employeesModel();
        $this->returnView($viewmodel->index(), true);
    }

    protected function add()
    {
        $viewmodel = new employeesModel();
        $this->returnView($viewmodel->add(), true);
    }




    protected function update()
    {
        $viewmodel = new employeesModel();
        $this->returnView($viewmodel->update(), true);
    }

    protected function emsections()
    {
        $viewmodel = new employeesModel();
        $this->returnView($viewmodel->emsections(), true);
    }

    protected function emsectionsupdate()
    {
        $viewmodel = new employeesModel();
        $this->returnView($viewmodel->emsectionsupdate(), false);
    }
    protected function emsectionsdelete()
    {
        $viewmodel = new employeesModel();
        $this->returnView($viewmodel->emsectionsdelete(), true);
    }


    protected function emlev()
    {
        $viewmodel = new employeesModel();
        $this->returnView($viewmodel->emlev(), true);
    }

    protected function emlevupdate()
    {
        $viewmodel = new employeesModel();
        $this->returnView($viewmodel->emlevupdate(), false);
    }
    protected function emlevdelete()
    {
        $viewmodel = new employeesModel();
        $this->returnView($viewmodel->emlevdelete(), true);
    }


    /****************************** empinfo */

    protected function empinfo()
    {
        $viewmodel = new employeesModel();
        $this->returnView($viewmodel->empinfo(), true);
    }

    protected function empinfoadd()
    {
        $viewmodel = new employeesModel();
        $this->returnView($viewmodel->empinfoadd(), true);
    }


    protected function empinfodelete()
    {
        $viewmodel = new employeesModel();
        $this->returnView($viewmodel->empinfodelete(), true);
    }

    protected function empinfoupdate()
    {
        $viewmodel = new employeesModel();
        $this->returnView($viewmodel->empinfoupdate(), true);
    }


    protected function empinfoprint()
    {
        $viewmodel = new employeesModel();
        $this->returnView($viewmodel->empinfoprint(), false);
    }


    protected function empqualadd()
    {
        $viewmodel = new employeesModel();
        $this->returnView($viewmodel->empqualadd(), true);
    }


    protected function empqualupdate()
    {
        $viewmodel = new employeesModel();
        $this->returnView($viewmodel->empqualupdate(), true);
    }

    protected function empqualdelete()
    {
        $viewmodel = new employeesModel();
        $this->returnView($viewmodel->empqualdelete(), true);
    }


    protected function empexpeadd()
    {
        $viewmodel = new employeesModel();
        $this->returnView($viewmodel->empexpeadd(), true);
    }

    protected function empexpeupdate()
    {
        $viewmodel = new employeesModel();
        $this->returnView($viewmodel->empexpeupdate(), true);
    }

    protected function empexpedelete()
    {
        $viewmodel = new employeesModel();
        $this->returnView($viewmodel->empexpedelete(), true);
    }


    protected function emptracou()
    {
        $viewmodel = new employeesModel();
        $this->returnView($viewmodel->emptracou(), true);
    }

    protected function emptracouadd()
    {
        $viewmodel = new employeesModel();
        $this->returnView($viewmodel->emptracouadd(), true);
    }

    protected function emptracouupdate()
    {
        $viewmodel = new employeesModel();
        $this->returnView($viewmodel->emptracouupdate(), true);
    }

    protected function emptracoudelete()
    {
        $viewmodel = new employeesModel();
        $this->returnView($viewmodel->emptracoudelete(), true);
    }


    protected function empjobsadd()
    {
        $viewmodel = new employeesModel();
        $this->returnView($viewmodel->empjobsadd(), true);
    }

    protected function empjobsupdate()
    {
        $viewmodel = new employeesModel();
        $this->returnView($viewmodel->empjobsupdate(), true);
    }

    protected function empjobsdelete()
    {
        $viewmodel = new employeesModel();
        $this->returnView($viewmodel->empjobsdelete(), true);
    }


    /**************************** EMPLOYEE FILES  */
    protected function empfilesadd()
    {
        $viewmodel = new employeesModel();
        $this->returnView($viewmodel->empfilesadd(), true);
    }

    protected function empfilesupdate()
    {
        $viewmodel = new employeesModel();
        $this->returnView($viewmodel->empfilesupdate(), true);
    }

    protected function empfilesdelete()
    {
        $viewmodel = new employeesModel();
        $this->returnView($viewmodel->empfilesdelete(), true);
    }

    protected function empdistribution()
    {
        $viewmodel = new employeesModel();
        $this->returnView($viewmodel->empdistribution(), true);
    }

    protected function empdistributiondel()
    {
        $viewmodel = new employeesModel();
        $this->returnView(/**$viewmodel->empdistributiondel()**/ '', false);
    }
    

}
