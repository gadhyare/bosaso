<?php

/**
 * fileName: تعديل فترة
 */
?>
<?php $op = new khas(); ?>
<div class="card  z-depth-0 rounded-0 p-0 border ">
    <div class="card-header  py-1 border-0 rounded-0 text-white " style="background-color:<?php echo $op->getThemeColor(); ?>"> <i class="fa fa-refresh"></i> <?= $op->lang("update"); ?> </div>
    <div class="card-body p-1">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <?php foreach ($viewmodel as $edit_items) : ?>
                <div class="form-group">
                    <label><?= $op->lang("shift name"); ?> </label>
                    <input type="text" name="department_name_edit" value="<?php echo $op->pro_field($edit_items['department_name']) ?>" class="form-control p-1  rounded-0" placeholder="<?= $op->lang("shift name"); ?>">
                </div>
                <div class="form-group">
                    <label><?= $op->lang("status"); ?> </label>
                    <select name="selected_value" id="" class="form-control p-1  rounded-0">
                        <?php $op->is_active($op->pro_field($edit_items['active'])); ?>
                    </select>
                </div>
            <?php endforeach; ?>
        </form>
    </div>
</div>