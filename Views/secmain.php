<?php
$op = new Khas();
if (!isset($_SESSION["loged_in"]) || !isset($_SESSION['log_user']) ) { ?>
    <?php require_once('tmp/header.php'); ?>
        <?php echo $_SESSION['err_page'];?>
    <?php require('Views/user/login.php'); ?>
<?php } else { ?>
    <?php require_once('tmp/nofram/header.php'); ?>
    <?php $op->open_page();?>
    <?php require($view); ?>
    <?php require_once('tmp/nofram/footer.php'); ?>
<?php }
