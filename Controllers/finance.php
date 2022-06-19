<?php class finance  extends Controller
{
    protected function index()
    {
        $viewmodel = new financeModel();
        $this->returnView($viewmodel->index(), true);
    }

    protected function stuFee()
    {
        $viewmodel = new financeModel();
        $this->returnView($viewmodel->stuFee(), true);
    }

    protected function getEmpoinf()
    {
        $viewmodel = new financeModel();
        $this->returnView($viewmodel->getEmpoinf(), false);
    }
    protected function deploma()
    {
        $viewmodel = new financeModel();
        $this->returnView($viewmodel->deploma(), true);
    }

    protected function PaymentRes()
    {
        $viewmodel = new financeModel();
        $this->returnView($viewmodel->PaymentRes(), true);
    }


    protected function PaymentResedel()
    {
        $viewmodel = new financeModel();
        $this->returnView($viewmodel->PaymentResedel(), true);
    }

    protected function PaymentReseadd()
    {
        $viewmodel = new financeModel();
        $this->returnView($viewmodel->PaymentReseadd(), false);
    }

    protected function PaymentResedite()
    {
        $viewmodel = new financeModel();
        $this->returnView($viewmodel->PaymentResedite(), false);
    }

    protected function PaymentResetrash()
    {
        $viewmodel = new financeModel();
        $this->returnView($viewmodel->PaymentResetrash(), true);
    }
    
    protected function feeinfo()
    {
        $viewmodel = new financeModel();
        $this->returnView($viewmodel->feeinfo(), true);
    }

    protected function feeinfoadd()
    {
        $viewmodel = new financeModel();
        $this->returnView($viewmodel->feeinfoadd(), true);
    }

    protected function feeinfoedit()
    {
        $viewmodel = new financeModel();
        $this->returnView($viewmodel->feeinfoedit(), true);
    }

    protected function feeinfodel()
    {
        $viewmodel = new financeModel();
        $this->returnView($viewmodel->feeinfodel(), true);
    }

    protected function feeclasstran()
    {
        $viewmodel = new financeModel();
        $this->returnView($viewmodel->feeclasstran(), true);
    }

    protected function feeclasstrando()
    {
        $viewmodel = new financeModel();
        $this->returnView($viewmodel->feeclasstrando(), true);
    }

    protected function stufeeclasstrando()
    {
        $viewmodel = new financeModel();
        $this->returnView($viewmodel->stufeeclasstrando(), true);
    }

    protected function feepaid()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->feepaid(), true);
    }

    protected function updatestuFee()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->updatestuFee(), true);
    }

    protected function deletestuFee()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->deletestuFee(), true);
    }

    protected function paidstufee()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->paidstufee(), true);
    }

    protected function updatetransfee()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->updatetransfee(), true);
    }


    protected function updatetransfeedo()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->updatetransfeedo(), true);
    }


    protected function deletetransfeedo()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->deletetransfeedo(), true);
    }

    protected function delpaidstufee()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->delpaidstufee(), true);
    }


    protected function updatepaidstufee()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->updatepaidstufee(), true);
    }


    protected function paidstufeePrint()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->paidstufeePrint(), false);
    }

    protected function stufeereport()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->stufeereport(), true);
    }

    protected function stufeereportprint()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->stufeereportprint(), false);
    }

    protected function singlestufeereportprint()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->singlestufeereportprint(), false);
    }

    protected function stufeeindex()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->stufeeindex(), true);
    }



    protected function employeefinc()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->employeefinc(), true);
    }

    protected function expenssfnc()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->expenssfnc(), true);
    }

    protected function expensetype()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->expensetype(), true);
    }

    protected function expensetypeadd()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->expensetypeadd(), false);
    }

    protected function expensetypeupdate()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->expensetypeupdate(), false);
    }


    protected function expensetypetrash()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->expensetypetrash(), true);
    }
    protected function expensetypedelete()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->expensetypedelete(), true);
    }

    //*========================================================= */
    //**=============================empfinance  */
    //*========================================================= */

    protected function empfinance()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->empfinance(), true);
    }



    //*========================================================= */
    //**=============================allowancetype  */
    //*========================================================= */

    protected function allowancetype()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->allowancetype(), true);
    }

    protected function deductiontype()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->deductiontype(), true);
    }




    //** ========================================================= */
    //** ===================== expensess   ======================= */
    //** ========================================================= */


    protected function expenses()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->expenses(), true);
    }



    //** ========================================================= */
    //** ===================== reports   ======================= */
    //** ========================================================= */


    protected function reports()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->reports(), true);
    }




    //** ========================================================= */
    //** ===================== getEmpSellay   ======================= */
    //** ========================================================= */


    protected function getempSellay()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->getempSellay(), false);
    }


    //** ========================================================= */
    //** ===================== empsellarypaid   ======================= */
    //** ========================================================= */


    protected function empsellarypaid()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->empsellarypaid(), true);
    }




    protected function empsellarypaidprint()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->empsellarypaidprint(), false);
    }

   protected function empcurrentsellarypaidprint()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->empcurrentsellarypaidprint(), false);
    }
    


    protected function empdeductionprint()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->empdeductionprint(), false);
    }

    protected function emprepdebtprint()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->emprepdebtprint(), false);
    }

    protected function emprepallowanceprint()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->emprepallowanceprint(), false);
    }

    protected function bankaccountreportprint()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->bankaccountreportprint(), false);
    }


       protected function searchexpensebydate()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->searchexpensebydate(), false);
    }

       protected function febtntdates()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->febtntdates(), false);
    }


       protected function getstudentfinalreport()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->getstudentfinalreport(), true);
    }

    protected function kan()
    {
        $viewmodel = new financeModel();
        $this->ReturnView($viewmodel->feepaid(), false);
    }
 
}
