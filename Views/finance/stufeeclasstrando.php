<?php

/**
 * fileName:  تفعيل رفع رسوم فصل
 */
?>
<?php foreach ((array) $viewmodel as $item) : ?>
    <div class="container col-xs-12 col-md-6 m-auto">
        <div class="card p-0 rounded-0 border-0 z-depth-1">
            <?php $op = new Khas(); ?>
            <div class="card-header text-center text-white danger-color-dark p-1">
                <?=$op->lang("reaise fee");?>
            </div>
            <div class="card-body">
                <div class="container"> 
                    <div class="row">
                        <div class="col-12">
                        <?=$op->lang("name");?> :
                            <?php echo $op->getStuNameById($_GET['id']); ?>
                            <hr class="p-1 mt-0 mb-0">
                        </div>
                        <div class="col-12">
                        <?=$op->lang("program");?>
                            <hr class="p-1 mt-0 mb-0">
                            <select name="s" id="ss" class="form-control p-0 rounded-0  border-0    bg-white h-select " disabled="disabled" style="font-size:80%">
                                <?php echo $op->FullSelProgInfo($_GET['prog_id']); ?>
                            </select>
                        </div>
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
                        <?=$op->lang("group");?>
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
                <?php $op = new Khas(); ?>
                <div class="card-header text-center text-white unique-color-dark p-1">
                <?=$op->lang("fee information");?>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                            <?=$op->lang("payment reasone");?>
                                <hr class="p-1 mt-0 mb-0">
                                <select name="PyRes" id="PyRes" class="form-control p-0 rounded-0       bg-white  ">
                                    <?php $op->getSelPayReso($item['Pay_Res_id']); ?>
                                </select>
                            </div>
                            <div class="col-xs-12 col-md-6">
                            <?=$op->lang("active discount");?>
                                <hr class="p-1 mt-0 mb-0">
                                <select name="activeDisc" id="activeDisc" class="form-control p-0 rounded-0       bg-white">
                                    <option value="1"> <?=$op->lang("active");?> </option>
                                    <option value="2"> <?=$op->lang("non active");?>  </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button type="submit" name="upLoadfee" class="btn success-color-dark text-white px-3 py-2"> <?=$op->lang("fee reaosne");?> </button>
                    <a href="<?php echo ROOT_URL; ?>/finance/feeclasstrando" class="btn danger-color-dark text-white float-left px-3 py-2"> <?=$op->lang("cancel");?> </a>
                </div>
            </form>
        </div>
    </div>
<?php endforeach; ?>