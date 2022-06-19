<?php $op = new Khas(); ?>
<?php 
    if(isset($_GET['rep'])){
        if($_GET['rep'] == "debt"){
            $title = "تقرير مديونيات الموظفين";
        }elseif($_GET['rep'] == "allowance"){
            $title = "تقرير علاوات الموظفين";
        }elseif($_GET['rep'] == "deduction"){
            $title = "تقرير خصوم مالية الموظفين";
        } elseif($_GET['rep'] == "sellary"){
            $title = "تقرير مرتبات الموظفين";
        } else{
            $title = "" ;
        }
    }
?>
<div class="container">
    <a href="<?php echo ROOT_URL; ?>/finance/reports?op=empreports&rep=debt" class="btn blue-grey darken-3  text-white  m-0 border rounded z-depth-0 m-auto py-1 "> تقارير الديون </a>
    <a href="<?php echo ROOT_URL; ?>/finance/reports?op=empreports&rep=allowance" class="btn blue-grey darken-3  text-white  m-0 border rounded z-depth-0 m-auto py-1 "> تقارير العلاوات </a>
    <a href="<?php echo ROOT_URL; ?>/finance/reports?op=empreports&rep=deduction" class="btn blue-grey darken-3  text-white  m-0 border rounded z-depth-0 m-auto py-1 "> تقارير الخصم </a>
    <a href="<?php echo ROOT_URL; ?>/finance/reports?op=empreports&rep=sellary" class="btn blue-grey darken-3  text-white  m-0 border rounded z-depth-0 m-auto py-1 "> تقارير المرتبات </a>
</div>
<?php $p = new Khas(); ?>
<div class="container border py-3">
    <div class="float-left  success-color-dark rounded text-white px-2 py-1"> <?php echo (isset($title)) ? $title : '' ;?> </div>
    <div class="clearfix"></div>
    <?php if (isset($_GET['rep'])) {
        require   $_GET['rep'] . '.php';
    }
    ?>
</div>




