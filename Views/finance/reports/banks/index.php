<?php $op = new Khas(); ?>
<div class="container">
    <div class="card z-depth-0 border-0 col-xs-12 col-md-8 m-auto">
        <div class="card-header danger-color-dark text-white text-center p-1 mt-1 tounded-0"> تقرير حسابات الموظفين </div>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="border py-1 px-3" enctype="multipart/form-data" id="form1">
            <div class="form-group">
                <div class="form-group">
                    <label for="Ban_id"> اختر رقم الحساب البنكي </label>
                    <select name="Ban_id" id="Ban_id" class="form-control  rounded-0 ">
                        <?php $op->getBankDataList(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="bandateFrom"> تاريخ البداية</label>
                    <input type="date" name="bandateFrom" id="bandateFrom" class="form-control  rounded-0 ">
                    <label for="bandateTo"> تاريخ النهاية </label>
                    <input type="date" name="bandateTo" id="bandateTo" class="form-control  rounded-0 ml-1">
                </div>

                <button type="submit" name="searchdbankDataBydate" id="searchdbankDataBydate" class="btn danger-color-dark col-12 py-2 text-white  m-auto"> البحث بين تاريخ <i class="fa fa-search"></i> </button>
            </div>
        </form>
    </div>
</div>