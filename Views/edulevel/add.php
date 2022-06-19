<?php

/**
 * fileName: <?=$op->lang("add");?> مرحلة دراسية
 */
?>
<div class="container mt-5 col-xs-12 col-sm-10 col-md-6">
    <?php $op = new khas(); ?>
    <div class="card  ">
        <div class="card-header  text-dark font-weight-bold text-center p-1"> <?= $op->lang("add"); ?> <?= $op->lang("educational level"); ?> </div>
        <div class="card-body">

            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                    <label><?= $op->lang("educational level"); ?></label>
                    <input type="text" name="edulev_name" class="form-control p-1  rounded-0" value="<?php echo $op->setPosts('edulev_name'); ?>" placeholder="<?= $op->lang("educational level"); ?>">
                </div>
                <div class="form-group">
                    <label> <?= $op->lang("code"); ?> </label>
                    <input type="text" name="code" class="form-control p-1  rounded-0" value="<?php echo $op->setPosts('code'); ?>">
                </div>
                <div class="form-group">
                    <label><?= $op->lang("status"); ?></label>
                    <select name="active" id="" class="form-control p-1  rounded-0">
                        <option value="1"><?= $op->lang("active"); ?></option>
                        <option value="2"><?= $op->lang("non active"); ?></option>
                    </select>
                </div>

                <input type="submit" name="submitAdd" value="<?= $op->lang("add"); ?>" class="btn primary-color-dark text-white px-3 py-2">
                <a href="<?php echo ROOT_URL; ?>/edulevel" class="btn danger-color-dark text-white p-2"><?= $op->lang("cancel"); ?></a>
            </form>
        </div>
    </div>
</div>