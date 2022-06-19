    <?php
    /**
     * fileName: رئيسية الإختبارات
     */
    ?>
    <?php require_once('core/khas.php'); ?>
    <div class="container home-cards">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-xl-3">
                <div class="card p-0 rounded-5 mt-2">
                    <a href="<?php echo ROOT_URL; ?>/exams/searchresult" class="text-white p-0 ">
                        <div class=" card-body purple darken-4 p-5 p-3 text-white font-weight-bold text-center ">
                            <li class="fa fa-graduation-cap "></li> <?= $op->lang("reports"); ?>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-xl-3">
                <div class="card p-0 rounded-5 mt-2">
                    <a href="<?php echo ROOT_URL; ?>/exams/examselPro" class="text-white p-0 ">
                        <div class=" card-body purple darken-4 p-5 p-3 text-white font-weight-bold text-center ">
                            <li class="fa fa-list"></li> <?= $op->lang("add"); ?><?= $op->lang("exam"); ?>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-xl-3">
                <div class="card p-0 rounded-5 mt-2">
                    <a href="<?php echo ROOT_URL; ?>/exams/updateexam" class="text-white p-0 ">
                        <div class=" card-body purple darken-4 p-5 p-3 text-white font-weight-bold text-center ">
                            <li class="fa fa-object-group"></li> <?= $op->lang("update"); ?><?= $op->lang("exam"); ?>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-xl-3">
                <div class="card p-0 rounded-5 mt-2">
                    <a href="<?php echo ROOT_URL; ?>/exams/stuGpa" class="text-white p-0 ">
                        <div class=" card-body purple darken-4 p-5 p-3 text-white font-weight-bold text-center ">
                            <li class="fa fa-building"></li> <?= $op->lang("student"); ?><?= $op->lang("report"); ?>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <?php if (isset($_GET['title'])) {
            echo $_GET['title'];
        }
        ?>