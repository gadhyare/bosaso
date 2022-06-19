<?php

/**
 * fileName: تقارير الرسوم
 */
?>
<div class="container  m-auto">
    <div class="card p-0 rounded-0 border-0  ">
        <?php $op = new Khas(); ?>
        <?php $prog = (isset($_GET['prog'])) ? $_GET['prog'] : ''; ?>
        <?php $dep = (isset($_GET['dep'])) ? $_GET['dep'] : ''; ?>
        <?php $sec = (isset($_GET['sec'])) ? $_GET['sec'] : ''; ?>
        <?php $lev = (isset($_GET['lev'])) ? $_GET['lev'] : ''; ?>
        <?php $grp = (isset($_GET['grp'])) ? $_GET['grp'] : ''; ?>
        <?php $Pay_Res_id = (isset($_GET['Pay_Res_id'])) ? $_GET['Pay_Res_id'] : ''; ?>
        <?php $stu_prog = (isset($_GET['stu_prog'])) ? $_GET['stu_prog'] : ''; ?>
        <?php $stu_id = (isset($_GET['stu_id'])) ? $_GET['stu_id'] : ''; ?>
        <?php $stu_Pay_Res_id = (isset($_GET['stu_Pay_Res_id'])) ? $_GET['stu_Pay_Res_id'] : ''; ?>
        <div class="row">
            <div class="col-xs-12 col-md-6 ">
                <div class="card p-2  mt-1">
                    <div class="card-header text-center text-white danger-color-dark p-1">
                    <?=$op->lang("search fee for selected class");?>
                    </div>
                    <div class="card-body">
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" id="frm1">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <?=$op->lang("program");?>
                                        <hr class="p-1 mt-0 mb-0">
                                        <select name="prog" id="prog" class="form-control p-0 rounded-0  border    bg-white h-select" style="font-size:80%">
                                            <?php echo $op->FullSelProgInfo($prog); ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                    <?=$op->lang("peyment reson");?>
                                        <hr class="p-1 mt-0 mb-0">
                                        <select name="Pay_Res_id" id="Pay_Res_id" class="form-control p-0 rounded-0  border    bg-white h-select" style="font-size:80%">
                                            <?php echo $op->getSelPayReso($Pay_Res_id); ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                    <?=$op->lang("status");?>
                                        <hr class="p-1 mt-0 mb-0">
                                        <select name="Pay_status" id="Pay_status" class="form-control p-0 rounded-0  border    bg-white h-select" style="font-size:80%">
                                            <option value="1"><?=$op->lang("active");?>  </option>
                                            <option value="2"> <?=$op->lang("non active");?> </option>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-md-3">
                                    <?=$op->lang("shift");?>
                                        <hr class="p-1 mt-0 mb-0">
                                        <select name="dep" id="dep" class="form-control p-0 rounded-0  border    bg-white h-select" style="font-size:80%">
                                            <?php echo $op->getSelDepartment($dep); ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-md-3">
                                    <?=$op->lang("section");?>
                                        <hr class="p-1 mt-0 mb-0">
                                        <select name="sec" id="sec" class="form-control p-0 rounded-0  border    bg-white h-select" style="font-size:80%">
                                            <?php echo $op->getSelesection($sec); ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-md-3">
                                    <?=$op->lang("level");?>
                                        <hr class="p-1 mt-0 mb-0">
                                        <select name="lev" id="lev" class="form-control p-0 rounded-0  border    bg-white h-select" style="font-size:80%">
                                            <?php echo $op->GetSellevels($lev); ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-md-3">
                                    <?=$op->lang("group");?>
                                        <hr class="p-1 mt-0 mb-0">
                                        <select name="grp" id="grp" class="form-control p-0 rounded-0  border    bg-white h-select" style="font-size:80%">
                                            <?php echo $op->GetSelgroups($grp); ?>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" name="btngenirateGetdata" class="btn success-color-dark text-white px-3 py-2 "><i class="fa fa-confg"></i>   <?=$op->lang("set report");?> </button>
                                <?php if (isset($_GET['prog']) && isset($_GET['dep']) && isset($_GET['sec']) && isset($_GET['lev']) && isset($_GET['grp']) && isset($_GET['Pay_Res_id'])) : ?>
                                    <a href="<?php echo ROOT_URL . '/finance/stufeereportprint?prog=' . $_GET['prog'] . '&dep=' . $_GET['dep'] . '&sec=' . $_GET['sec'] . '&lev=' . $_GET['lev'] . '&grp=' . $_GET['grp'] . '&Pay_Res_id=' . $_GET['Pay_Res_id']; ?>" target="_blank" class="btn primary-color-dark text-white px-3 py-2 "><i class="fa fa-search"></i>   <?=$op->lang("open report");?> </a>
                                <?php endif; ?>
                                <a href="<?php echo ROOT_URL; ?>/finance/feeclasstran" class="btn danger-color-dark  text-white px-3 py-2  float-left "><i class="fa fa-send"></i> <?=$op->lang("go back");?> </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="card p-2 mt-1">
                    <div class="card-header text-center text-white unique-color-dark p-1">
                    <?=$op->lang("search current student fee");?>
                    </div>
                    <div class="card-body">
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" id="frm2">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                    <?=$op->lang("program");?>
                                        <hr class="p-1 mt-0 mb-0">
                                        <select name="stu_prog" id="stu_prog" class="form-control p-0 rounded-0  border    bg-white h-select" style="font-size:80%">
                                            <?php echo $op->FullSelProgInfo($stu_prog); ?>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                    <?=$op->lang("payment reson");?>
                                        <hr class="p-1 mt-0 mb-0">
                                        <select name="stu_Pay_Res_id" id="stu_Pay_Res_id" class="form-control p-0 rounded-0  border    bg-white h-select" style="font-size:80%">
                                            <?php echo $op->getSelPayReso($stu_Pay_Res_id); ?>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                    <?=$op->lang("id number");?>
                                        <hr class="p-1 mt-0 mb-0">
                                        <input type="text" name="stu_id" id="stu_id" value="<?php echo (isset($_GET['id'])) ? $_GET['id'] : ''; ?>" class="form-control p-0 rounded-0  border    bg-white h-select" style="font-size:80%">
                                    </div>
                                </div>
                                <br>
                                <button type="submit" name="btngenirateGetStudata" class="btn primary-color-dark text-white px-3 py-2 "><i class="fa fa-confg"></i>   <?=$op->lang("set report");?> </button>
                                <?php if (isset($_GET['stu_prog'])   && isset($_GET['id']) && isset($_GET['stu_Pay_Res_id'])) : ?>
                                    <a href="<?php echo ROOT_URL . '/finance/singlestufeereportprint/' . $_GET['id'] . '?stu_prog=' . $_GET['stu_prog'] .    '&stu_Pay_Res_id=' . $_GET['stu_Pay_Res_id']; ?>" target="_blank" class="btn primary-color-dark text-white px-3 py-2 "><i class="fa fa-search"></i>   <?=$op->lang("open report");?> </a>
                                <?php endif; ?>
                                <a href="<?php echo ROOT_URL; ?>/finance/feeclasstran" class="btn danger-color-dark  text-white px-3 py-2  float-left "><i class="fa fa-send"></i> <?=$op->lang("go back");?> </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="card p-2 mt-1">
                    <div class="card-header text-center text-white brown darkin-4 p-1">
                    <?=$op->lang("search fee between two date");?>
                    </div>
                    <div class="card-body">
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" id="frm3">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="txtFrm"><?=$op->lang("from");?>  </label>
                                        <input type="date" name="txtFrm" id="txtFrm" class="form-control xol-12 rounded-0" value="<?php echo date("Y-m-d") ;?>">

                                    </div>
                                    <div class="col-12">
                                        <label for="txtTo"><?=$op->lang("to");?>   </label>
                                        <input type="date" name="txtTo" id="txtTo" class="form-control xol-12 rounded-0" value="<?php echo date("Y-m-d");;?>">
                                    </div>
                                    <div class="col-12">
                                    <?=$op->lang("payment reson");?>
                                        <hr class="p-1 mt-0 mb-0">
                                        <select name="Pay_Res_id" id="Pay_Res_id" class="form-control p-0 rounded-0  border    bg-white h-select" style="font-size:80%">
                                            <?php echo $op->getSelPayReso($Pay_Res_id); ?>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" name="btnGenirateFeePaimentTwoDate" class="btn primary-color-dark text-white px-3 py-2 "><i class="fa fa-date"></i>   <?=$op->lang("set report");?> </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>