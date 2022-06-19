<?php

/**
 * fileName:تعديل   معلومات رسوم
 */
?>
<?php $op = new KHas(); ?>
<?php $Pay_Res_id = isset($_POST['PaymentRes']) ? $_POST['PaymentRes'] : ''; ?>
<?php $item = json_decode($viewmodel); ?>

<?php if (count((array) $item) > 0) : ?>
    <?php foreach ($item as $items => $val) : ?>
        <?php $op->chkSelProgtxt($val->prog_id); ?>
        <div class="container col-6 m-auto">
            <div class="card z-depth-2">
                <div class="card-header text-center unique-color text-white"> <?=$op->lang("update");?>  <?=$op->lang("fee type amount");?></div>
                <div class="card-body">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="form-group">
                            <label for="PaymentRes"><?=$op->lang("fee type");?></label>
                            <select name="PaymentRes" id="PaymentRes" class="form-control"><?php $op->getSelpaymentres($val->Pay_Res_id) ?></select>
                        </div>
                        <div class="form-group">
                            <label for="prog_id"> <?=$op->lang("program");?> </label>
                            <select name="prog_id" id="prog_id" class="form-control p-0"><?php $op->FullSelProgInfo($val->prog_id); ?></select>
                        </div>
                        <div class="form-group">
                            <label for="fee_amount"><?=$op->lang("amount");?></label>
                            <input type="number" name="fee_amount" id="fee_amount" value="<?php echo $val->fee_amount; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="active"> <?=$op->lang("status");?> </label>
                            <select name="active" id="active" class="form-control p-0">
                                
                            <?php $op->is_active($op->pro_field($val->active )); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="updateRec" class="btn success-color-dark  z-depth-2  p-2 text-white float-right"> <i class="fa fa-paper-plane"></i> <?=$op->lang("update");?> </button>
                            <a href="<?php echo ROOT_URL; ?>/finance/feeinfo" class="btn z-depth-2 text-white danger-color-dark p-2 float-left "> <i class="fa fa-cancel"> </i> <?=$op->lang("go back");?> </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <?php echo $_SESSION['msg'] = Data_Not_Founded; ?>
<?php endif; ?>