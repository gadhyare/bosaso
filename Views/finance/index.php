<?php

/**
 * fileName: رئيسية المالية
 */
?>
<div class="container mt-5 p-3">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mt-2 ">
            <a href="<?php echo ROOT_URL; ?>/finance/stufee">
                <div class="card p-0 text-white rounded-0 p-2 tail " style="background-color:<?php echo $op->getThemeColor();?>"> <?=$op->lang("student finance");?> </div>
            </a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mt-2 ">
            <a href="<?php echo ROOT_URL; ?>/finance/empfinance">
                <div class="card p-0 text-white rounded-0 p-2 tail " style="background-color:<?php echo $op->getThemeColor();?>"> <?=$op->lang("staff finance");?> </div>
            </a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mt-2 ">
            <a href="<?php echo ROOT_URL; ?>/finance/expenses">
                <div class="card p-0 text-white rounded-0 p-2 tail " style="background-color:<?php echo $op->getThemeColor();?>"> <?=$op->lang("expenses");?> </div>
            </a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mt-2 ">
            <a href="<?php echo ROOT_URL; ?>/finance/expensetype">
                <div class="card p-0 text-white rounded-0 p-2 tail " style="background-color:<?php echo $op->getThemeColor();?>"> <?=$op->lang("type of expenses");?> </div>
            </a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mt-2 ">
            <a href="<?php echo ROOT_URL; ?>/finance/reports">
                <div class="card p-0 text-white rounded-0 p-2 tail " style="background-color:<?php echo $op->getThemeColor();?>"> <?=$op->lang("financial reports");?> </div>
            </a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mt-2 ">
            <a href="<?php echo ROOT_URL; ?>/finance/allowancetype">
                <div class="card p-0 text-white rounded-0 p-2 tail " style="background-color:<?php echo $op->getThemeColor();?>"> <?=$op->lang("types of bonuses");?> </div>
            </a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mt-2 ">
            <a href="<?php echo ROOT_URL; ?>/finance/deductiontype">
                <div class="card p-0 text-white rounded-0 p-2 tail " style="background-color:<?php echo $op->getThemeColor();?>"> <?=$op->lang("types of financial liabilities");?> </div>
            </a>
        </div>
    </div>
</div>