<?php

/**
 * fileName: تعديل مجموعة
 */
?>
<?php $op = new khas(); ?>
<div class="card  z-depth-0 border p-3">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <?php foreach ($viewmodel as $edit_items) : ?>
            <div class="form-group">
                <label><?= $op->lang("group name"); ?></label>
                <input type="text" name="group_name_edit" value="<?php echo $edit_items['group_name'] ?>" class="form-control p-1  rounded-0" placeholder="<?= $op->lang("group name"); ?>">
            </div>
            <div class="form-group">
                <label><?= $op->lang("sttuse"); ?></label>
                <select name="selected_value" id="selected_value" class="form-control p-1  rounded-0">
                    <?php $op->is_active($edit_items['active']); ?>
                </select>
            </div>
        <?php endforeach; ?>
    </form>
</div>