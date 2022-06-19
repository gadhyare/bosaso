<?php
$op = new Khas();
if (!isset($_SESSION["loged_in"]) || !isset($_SESSION['log_user'])) { ?>
    <?php if ($_GET['action'] != 'login') : ?>
        <?php header("refresh:0;url=" . ROOT_URL . "/user/login/"); ?>
    <?php endif; ?>
    <?php require_once('tmp/nofram/header.php'); ?>
    <?php require('Views/user/login.php'); ?>
    <?php require_once('tmp/nofram/footer.php'); ?>
<?php } else { ?>
    <?php if ($op->get_site_status() == 2) : ?>
        <?php require_once('tmp/nofram/header.php'); ?>
        <?php echo ($op->get_close_msg());  ?>
        <?php require_once('tmp/nofram/footer.php'); ?>
    <?php else : ?>
        <?php require_once('tmp/header.php'); ?>
        <div class="container-fluid">
            <div class="row  ">
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 mh-100 d-none shadow px-0   d-xl-block " style="height:100vh;background-color: <?php echo $op->getThemeColor(); ?> !important;">
                    <?php require_once('tmp/sidebar.php'); ?>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 bg-white p-0  ">
                    <?php if (isset($_SESSION["loged_in"])) { ?>
                        <nav class="navbar navbar-expand-lg     d-md-none d-xl-none" style="background-color: <?php echo $op->getThemeColor(); ?> !important">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon ">
                                    <i class="fa fa-list text-white"></i>
                                </span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <div class="row">
                                    <?php require_once('tmp/topmenu.php'); ?>
                                </div>
                            </div>
                        </nav>
                    <?php } ?>
                    <div class="p-2   blue-grey lighten-5 col-12 m-auto "><?php echo $_SESSION['link']; ?></div>
                    <?php Messages::display(); ?>
                    <?php if (isset($_SESSION['bkUp']) && $_SESSION['bkUp'] == 'yes') : ?>
                        <?php echo BACKUP_IS_ACTIVE; ?>
                    <?php endif; ?>
                    <?php
                    $op->open_page();
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                    } ?>
                    <div class="container-fluid">
                        <?php require($view); ?>
                    </div>
                </div>
            </div>
            <?php require_once('tmp/footer.php'); ?>
        <?php endif; ?>

    <?php }
