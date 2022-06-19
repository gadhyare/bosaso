dasd<div class="container p-0">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="card">
            <div class="card-header p-1 unique-color-dark text-white text-center"> إغلاق الحسابات الجارية </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group   text-center">
                            <label for="dateFrom"> من تاريخ </label>
                            <input type="date" name="dateFrom" id="dateFrom" class="form-control reounded-0 border  rounded-0  ">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">

                        <div class="form-group   text-center">
                            <label for="dateTo"> إلى تاريخ </label>
                            <input type="date" name="dateTo" id="dateTo" class="form-control reounded-0 border  rounded-0  ">
                        </div>
                        <button type="submit" name="getfinalreport" id="ClosAcc" class="btn success-color-dark text-white py-2 col-12 m-auto"> <i class="fa fa-spinner"></i> انهاء العملية </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>