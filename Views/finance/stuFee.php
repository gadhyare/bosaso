<?php

/**
 * fileName: رسوم الطلبة  
 */
?>
<div class="container mt-5 p-3">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mt-2 a-tail ">
            <a href="<?php echo ROOT_URL; ?>/student/info">
                <div class="card p-0 bg-dark text-white rounded-0 p-2 tail"> <?=$op->lang("Student fees");?>   </div>
            </a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mt-2 a-tail ">
            <a href="<?php echo ROOT_URL; ?>/finance/PaymentRes">
                <div class="card p-0 bg-dark text-white rounded-0 p-2 tail"> <?=$op->lang("fee type");?> </div>
            </a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mt-2 a-tail ">
            <a href="<?php echo ROOT_URL; ?>/finance/feeinfo">
                <div class="card p-0 bg-dark text-white rounded-0 p-2 tail"> <?=$op->lang("Amount of fee");?></div>
            </a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mt-2 a-tail ">
            <a href="<?php echo ROOT_URL; ?>/finance/feeclasstran">
                <div class="card p-0 bg-dark text-white rounded-0 p-2 tail"> <?=$op->lang("Raise fee");?></div>
            </a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mt-2 a-tail ">
            <a href="<?php echo ROOT_URL; ?>/finance/feepaid">
                <div class="card p-0 bg-dark text-white rounded-0 p-2 tail"><?=$op->lang("Pay fee");?></div>
            </a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mt-2 a-tail ">
            <a href="<?php echo ROOT_URL; ?>/finance/stufeereport">
                <div class="card p-0 bg-dark text-white rounded-0 p-2 tail"> <?=$op->lang("Fee Report");?></div>
            </a>
        </div>
    </div>
</div>