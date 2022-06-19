<div class="container p-0">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="card">
            <div class="card-header p-1 unique-color-dark text-white text-center"> إغلاق الحسابات الجارية </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-xs-12 col-md-5">
                        <div class="form-group   text-center">
                            <label for="ClosdateFrom"> من تاريخ </label>
                            <input type="date" name="ClosdateFrom" id="ClosdateFrom" class="form-control reounded-0 border  rounded-0  ">
                        </div>
                        <div class="form-group   text-center">
                            <label for="ClosdateTo"> إلى تاريخ </label>
                            <input type="date" name="ClosdateTo" id="ClosdateTo" class="form-control reounded-0 border  rounded-0  ">
                        </div>
                        <button type="submit" name="ClosAcc" id="ClosAcc"  class="btn success-color-dark text-white py-2 col-12 m-auto" > <i class="fa fa-spinner"></i> انهاء العملية  </button>
                    </div>
                    <div class="col-xs-12 col-md-7">
                            <div class="alert alert-danger text-right">
                                ملاحظة:
                                <br>
                                <li class="group-list-item"> الرجاء التأكد قبل قبل إغلاق الحسابات </li>
                                <li class="group-list-item"> في حالة إغلاق الحسابات لامكن ال<?=$op->lang("go back");?> عنه  </li>
                                <li class="group-list-item"> لا يمكنك تعديل أي من الحسابات التي تم اغلاقها  </li>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>