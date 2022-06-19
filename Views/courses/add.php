<?php

/**
 * fileName: اضافة دورة
 */
?>
<div class="container mt-5 col-xs-12 col-sm-10 col-md-6">


    <div class="card  ">
        <div class="card-header  text-dark font-weight-bold text-center p-1"> اضافة دورة جديدة </div>
        <div class="card-body">

            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                    <label> عنوان الدورة </label>
                    <input type="text" name="cou_title" class="form-control p-1  rounded-0" placeholder="أدخل هنا اسم المجموعة الجديدة">
                </div>

                <div class="form-group">
                    <label> تاريخ البداية </label>
                    <input type="date" name="cou_startdate" class="form-control p-1  rounded-0" placeholder="أدخل هنا اسم المجموعة الجديدة">
                </div>

                <div class="form-group">
                    <label> تاريخ النهاية</label>
                    <input type="date" name="cou_enddate" class="form-control p-1  rounded-0" placeholder="أدخل هنا اسم المجموعة الجديدة">
                </div>


                <div class="form-group">
                    <label> حالة الدورة</label>
                    <select name="cou_status" id="" class="form-control p-1  rounded-0">
                        <option value="1">مفعل</option>
                        <option value="2">غير مفعل</option>
                    </select>
                </div>

                <input type="submit" name="add_rec" value="اضافة" class="btn primary-color-dark text-white px-3 py-2">
                <a href="<?php echo ROOT_URL; ?>/courses" class="btn danger-color-dark text-white p-2">إلغاء</a>
            </form>
        </div>
    </div>


</div>