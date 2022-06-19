<?php

/**
 * fileName: <?=$op->lang("add");?> مادة لبرنامج دارسي
 */
?>
<?php $op = new Khas(); ?>
<?php $op->chkSelProgtxt($_GET['prog_id']); ?>
<div class="card-header col-12 m-auto py-1 pink darken-3 text-center text-white "> <?php echo $op->FulltextProgInfo($_GET['prog_id']); ?> </div>
<div class="card  border p-3 z-depth-0  ">
    <div class="card-header  text-dark font-weight-bold text-center p-1"> <?=$op->lang("add");?> مادة جديدة </div>
    <div class="card-body">
        <div class="d-none alert alert-danger p-1" id="lblAlert"> <i> أقل عدد للأحرف هو 3 </i> </div>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <div class="form-group">

                        <label> اسم المادة</label>
                        <input type="text" name="subject_name" id="subject_name" value="<?php echo $op->setPosts("subject_name"); ?>" class="form-control p-1  rounded-0" placeholder="أدخل هنا اسم المادة الجديدة">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <div class="form-group">
                        <label> كود المادة</label>
                        <input type="text" name="subject_code" id="subject_code" value="<?php echo $op->setPosts("subject_code"); ?>" class="form-control p-1  rounded-0" placeholder="أدخل هنا كود المادة الجديدة">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <div class="form-group">
                        <label> حالة المادة</label>
                        <select name="active" id="active" class="form-control p-1  rounded-0">
                            <?php $op->is_active($_POST['active']); ?>
                        </select>
                    </div>
                </div>
        </form>
        </form>
    </div>
</div>