<?php

/**
 * fileName: <?=$op->lang("add");?> برنامج دارسي
 */
?>

<?php $op = new Khas(); ?>
<?php $fac_id = (isset($_POST['fac_id'])) ? $_POST['fac_id'] : ''; ?>
<?php $edulev_id = (isset($_POST['edulev_id'])) ? $_POST['edulev_id'] : ''; ?>
<?php $academics_id = (isset($_POST['academics_id'])) ? $_POST['academics_id'] : ''; ?>
<div class="card  z-depth-0 border p-3">
    <div class="card-header  text-white indigo darken-4 font-weight-bold text-center p-1"> <?= $op->lang("add"); ?> <?= $op->lang("study program"); ?></div>
    <div class="card-body">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <label> <?= $op->lang("faculty"); ?> </label>
                        <select name="fac_id" id="fac_id" class="form-control p-1  rounded-0">
                            <?php $op->GetSelfaculty($fac_id); ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <label> <?= $op->lang("educational level"); ?> </label>
                        <select name="edulev_id" id="edulev_id" class="form-control p-1  rounded-0">
                            <?php $op->Getedulevel($edulev_id); ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <label> <?= $op->lang("academics"); ?></label>
                        <select name="academics_id" id="academics_id" class="form-control p-1  rounded-0">
                            <?php $op->GetSelacademics($academics_id); ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <label><?= $op->lang("status"); ?></label>
                        <select name="active" id="active" class="form-control p-1  rounded-0">
                            <?php $op->is_active($_POST['active']); ?>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>