<?php

/**
 * fileName:  تعديل برنامج دارسي
 */
?>
<?php $op = new Khas(); ?>
<?php $op->chkSelProgtxt($_GET['id']); ?>
<?php if ($op->chk_prog_rols($op->stringify($_SESSION['log_id']), $_GET['id'])) : ?>
    <?php $fac_id = (isset($_POST['fac_id'])) ? $_POST['fac_id'] : ''; ?>
    <?php $academics_id = (isset($_POST['academics_id'])) ? $_POST['academics_id'] : ''; ?>
    <?php foreach ($viewmodel as $edit_items) : ?>
        <div class="card border-0 z-depth-0 p-3 ">
            <div class="card-header  text-white primary-color-dark font-weight-bold text-center p-1"> <?= $op->lang("update"); ?> <?= $op->lang("study program"); ?> </div>
            <div class="card-body border">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <label> <?= $op->lang("faculty"); ?> </label>
                                <select name="fac_id" id="fac_id" class="form-control p-1  rounded-0">
                                    <?php $op->GetSelfaculty($edit_items['fac_id']); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <label> <?= $op->lang("educational level"); ?> </label>
                                <select name="edulev_id" id="edulev_id" class="form-control p-1  rounded-0">
                                    <?php $op->GetSeledulevel($edit_items['edulev_id']); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <label> <?= $op->lang("academics"); ?></label>
                                <select name="academics_id" id="academics_id" class="form-control p-1  rounded-0">
                                    <?php $op->GetSelacademics($edit_items['academics_id']); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <label><?= $op->lang("status"); ?></label>
                                <select name="active" id="active" class="form-control p-1  rounded-0">
                                    <?php $op->is_active($edit_items['active']); ?>
                                </select>
                            </div>
                        </div>
                </form>
            </div>
        </div>

    <?php endforeach; ?>
<?php endif; ?>