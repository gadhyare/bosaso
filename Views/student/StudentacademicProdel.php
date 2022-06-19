<?php

/**
 * fileName: حذف البرامج العلمية للطالب
 */
?>
<?php if ($_GET['pro_id'] != "") : ?>
    <?php $op = new khas(); ?>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <?php foreach ($viewmodel as $delete_items) : ?>
            <div class="container p-2 mt-2 alert alert-danger text-dark text-center font-weight-bold col-xs-12 col-sm-10 col-md-8  m-auto">
                <p class="lead p-2 mt-2   text-center">
                    هل أنت متأكد من حذف السجل ؟
                    <br>
                    [ <?php echo $delete_items['stu_ac_pro']; ?> -- <?php echo $op->getStuInfoById($delete_items['stu_id'], "StuName"); ?> -- <?php echo $op->getStuInfoById($delete_items['stu_id'], "stu_num"); ?> ]
                </p>
                <input name="delete_items" type="submit" class="btn btn-success text-white px-3 py-2  a-light py-2 text-weight-bold" value="<?=$op->lang("delete");?>">
                <a href="<?php echo ROOT_URL; ?>/student/update/<?php echo $delete_items['stu_id']; ?>" class="btn danger-color-dark   py-2 text-weight-bold"><?=$op->lang("cancel");?></a>
            </div>
            <input type="hidden" name="stu_id" value="<?php echo $delete_items['stu_id']; ?>">
        <?php endforeach; ?>
    </form>
<?php else : ?>
    <?php printf(SELECT_ID, "رقم الطالب"); ?>
<?php endif; ?>