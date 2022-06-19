<?php

/**
 * fileName: تعديل مستوى
 */
?>
<div class="card z-depth-0 border p-3 ">
    <div class="card-body">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <?php foreach ($viewmodel as $edit_items) : ?>
                <div class="form-group">
                    <label><?= $op->lang("level name"); ?></label>
                    <input type="text" name="level_name_edit" value="<?php echo $edit_items['level_name'] ?>" class="form-control p-1  rounded-0" placeholder="<?= $op->lang("level name"); ?>">
                </div>
                <div class="form-group">
                    <label><?= $op->lang("status"); ?></label>
                    <select name="selected_value" id="selected_value" class="form-control p-1  rounded-0" onclick="showhidden()">
                        <?php $op->is_active($edit_items['active']); ?>
                    </select>
                </div>
            <?php endforeach; ?>
        </form>
    </div>
</div>


</div>