<?php

/**
 * fileName: التقارير  
 */
?>
<div class="container ">
    <br>
    <div class="row">
        <div class="col-xs-12 col-md-2">
            <a href="<?php echo ROOT_URL; ?>/finance/reports?op=empreports" class="btn pink darken-3  text-white col-12 m-0 border rounded z-depth-0 ppy-1 px-3" style="font-size:75% !important">حسابات الموظفين</a>
            <a href="<?php echo ROOT_URL; ?>/finance/reports?op=expense" class="btn pink darken-3  text-white col-12 m-0 border rounded z-depth-0 ppy-1 px-3" style="font-size:75% !important"> المصروفات</a>
            <a href="<?php echo ROOT_URL; ?>/finance/reports?op=banks" class="btn pink darken-3  text-white col-12 m-0 border rounded z-depth-0 ppy-1 px-3" style="font-size:75% !important"> الحسابات البنكية </a>
            <a href="<?php echo ROOT_URL; ?>/finance/reports?op=students" class="btn pink darken-3  text-white col-12 m-0 border rounded z-depth-0 ppy-1 px-3" style="font-size:75% !important"> حسابات الطلبة </a>
            <a href="<?php echo ROOT_URL; ?>/finance/reports?op=accclose" class="btn pink darken-3  text-white col-12 m-0 border rounded z-depth-0 ppy-1 px-3" style="font-size:75% !important"> إغلاق الحسابات </a>
        </div>
        <div class="col-xs-12 col-md-10 border  ">
            <?php if (isset($_GET['op'])) {
                require 'reports/' . $_GET['op'] . '/index.php';
            }
            ?>
        </div>
    </div>
</div>