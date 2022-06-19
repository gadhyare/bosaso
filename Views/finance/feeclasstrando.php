<?php

/**
 * fileName: تفعيل رفع الرسوم
 */
?>
<?php $op = new Khas(); ?>
<?php $op->chkSelProgtxt($_GET['prog_id']); ?>
<?php foreach ((array) $viewmodel as $item) : ?>

    <div class="container col-xs-12 col-md-8 col-12 m-auto">
        <div class="card p-0 rounded-0 border-0 z-depth-1">
            <?php $op = new Khas(); ?>
            <div class="card-header text-center text-white danger-color-dark p-1">
                <?=$op->lang("raise fee");?>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-12 border">
                            <?=$op->lang("program");?>
                            <?php echo $op->FulltextProgInfo($_GET['prog_id']); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-3">
                        <?=$op->lang("shift");?>
                            <hr class="p-1 mt-0 mb-0">
                            <?php echo $op->getSelDepartmentTxt($_GET['dep_id']); ?>
                        </div>
                        <div class="col-xs-12 col-md-3">
                        <?=$op->lang("section");?>
                            <hr class="p-1 mt-0 mb-0">
                            <?php echo $op->getSelesectionTxt($_GET['sec_id']); ?>
                        </div>
                        <div class="col-xs-12 col-md-3">
                        <?=$op->lang("level");?>
                            <hr class="p-1 mt-0 mb-0">
                            <?php echo $op->GetSellevelsTxt($_GET['lev_id']); ?>
                        </div>
                        <div class="col-xs-12 col-md-3">
                        <?=$op->lang("grpup");?>
                            <hr class="p-1 mt-0 mb-0">
                            <?php echo $op->GetSelgroupsTxt($_GET['grp_id']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card p-0 rounded-0 border-0 z-depth-1">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">

                <div class="card-header text-center text-white unique-color-dark p-1">
                <?=$op->lang("fee information");?>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                            <?=$op->lang("payment resone");?>
                                <hr class="p-1 mt-0 mb-0">
                                <select name="PyRes" id="PyRes" class="form-control p-0 rounded-0       bg-white  ">
                                    <?php $op->getPayReso(); ?>
                                </select>
                            </div>
                            <div class="col-xs-12 col-md-6">
                            <?=$op->lang("active discount");?>
                                <hr class="p-1 mt-0 mb-0">
                                <select name="activeDisc" id="activeDisc" class="form-control p-0 rounded-0       bg-white">
                                    <option value="1"> <?=$op->lang("active");?> </option>
                                    <option value="2"> <?=$op->lang("non active");?> </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button type="submit" name="upLoadfee" class="btn success-color-dark text-white px-3 py-2"> <?=$op->lang("raise");?> </button>
                    <a href="<?php echo ROOT_URL; ?>/finance/feeclasstrando" class="btn danger-color-dark text-white float-left px-3 py-2"> <?=$op->lang("cancel");?> </a>
                </div>
            </form>
        </div>
    </div>
<?php endforeach; ?>