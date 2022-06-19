<?php

/**
 * fileName: تعديل قسم دراسي
 */
?>
<div class="card  z-depth-0 border p-3">
    <div class="card-body">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <?php foreach ($viewmodel as $edit_items) : ?>
                <div class="form-group">
                    <label> <?= $op->lang("section name"); ?></label>
                    <input type="text" name="section_name_edit" value="<?php echo $edit_items['section_name'] ?>" class="form-control p-1  rounded-0" placeholder="<?= $op->lang("section name"); ?>">
                </div>
                <div class="form-group">
                    <label> <?= $op->lang("status"); ?></label>
                    <select name="selected_value" id="selected_value" class="form-control p-1  rounded-0">
                        <?php $op->is_active($edit_items['active']); ?>
                    </select>
                </div>
            <?php endforeach; ?>
        </form>
    </div>
</div>