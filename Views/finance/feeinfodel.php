<?php

/**
 * fileName: حذف   معلومات رسوم
 */
?>
<?php $op = new KHas(); ?>
<?php $op->chkSelProgtxt($_GET['id']); ?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <?php foreach ($viewmodel as $delete_items) : ?>
        <div class="container p-2 mt-2 alert alert-danger text-white text-center font-weight-bold col-xs-12 col-sm-10 col-md-6">
            <p class="lead p-2 mt-2 text-center text-dark">
                <?=$op->lang("Are you sure to delete the record");?> [ <?php echo $delete_items['feeinfo_id']; ?> ]  
            </p>
            <input name="delete_items" type="submit" class="btn primary-color-dark text-white px-3 py-2  a-light py-2 text-weight-bold" value="<?=$op->lang("delete");?>">
            <a href="<?php echo ROOT_URL; ?>/finance/feeinfo" class="btn danger-color-dark py-2 text-weight-bold text-white"><?=$op->lang("cancel");?></a>
        </div>
    <?php endforeach; ?>
</form>