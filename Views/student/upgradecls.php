<?php

/**
 * fileName: تصعيد طلبة
 */
?>
<?php $op = new Khas()  ?>
<?php $dep_id = (isset($_POST['dep_id'])) ? $_POST['dep_id'] : ''; ?>
<?php $sec_id = (isset($_POST['sec_id'])) ? $_POST['sec_id'] : ''; ?>
<?php $lev_id = (isset($_POST['lev_id'])) ? $_POST['lev_id'] : ''; ?>
<?php $grp_id = (isset($_POST['grp_id'])) ? $_POST['grp_id'] : ''; ?>
<?php $ex_code = (isset($_POST['ex_code'])) ? $_POST['ex_code'] : 0; ?>
<?php $ex_crid = (isset($_POST['ex_crid'])) ? $_POST['ex_crid'] : 0; ?>
<?php $sub_id = (isset($_POST['sub_id'])) ? $_POST['sub_id'] : 0; ?>
<?php $stu_id = (isset($_POST['stu_id'])) ? $_POST['stu_id'] : 0; ?>

<?php if (isset($_GET['id'])) : ?>

    <div class="container  s m-auto  ">
        <div class="card  z-depth-0 border mt-2">
            <div class="card-header  text-white  unique-color-dark font-weight-bold text-center p-1"> <?=$op->lang("upgrade class");?> </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-5 border">
                            <form action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post" role="form1" class="border mt-1">
                                <div class="form-group   p-2">
                                    <label> <?=$op->lang("program");?> </label>
                                    <select class="form-control  p-1 rounded-0 " id="FullPro" name="FullPro" style="font-size: 85%">
                                        <?php $op->FullProgInfo(); ?>
                                    </select>
                                    <br>
                                    <button type="submit" name="setData" id="setData" class="btn brown darken-3 p-2  text-white col-12    m-auto"> <?=$op->lang("select");?></button>

                                </div>
                            </form>
                            <?php if (isset($_GET['ids'])) : ?>
                                <form action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post" role="form2">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label> <?=$op->lang("shift");?> </label>
                                                <select class="form-control rounded-0 p-1" style="font-size:90%;" name="dep_id" id="dep_id">
                                                    <?php $op->getSelDepartment($dep_id); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <label> <?=$op->lang("section");?> </label>
                                            <div class="form-group">
                                                <select class="form-control rounded-0 p-1" style="font-size:90%;" name="sec_id" id="sec_id">
                                                    <?php $op->getSelesection($sec_id); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <label> <?=$op->lang("level");?> </label>
                                            <div class="form-group">
                                                <select class="form-control rounded-0 p-1" style="font-size:90%;" name="lev_id" id="lev_id">
                                                    <?php echo  $op->GetSellevels($lev_id); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <label> <?=$op->lang("group");?> </label>
                                            <div class="form-group">
                                                <select class="form-control rounded-0 p-1" style="font-size:90%;" name="grp_id" id="grp_id">
                                                    <?php echo $op->GetSelgroups($grp_id); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="getData" id="getData" class="btn success-color-dark p-2  text-white  float-right"> <i class="fa fa-paper-plane"></i> <?=$op->lang("select");?></button>
                                    <button type="submit" name="delData" id="delData" class="btn danger-color-dark p-2  text-white  float-left"> <i class="fa fa-paper-plane"></i> <?=$op->lang("delete");?> </button>
                                </form>

                            <?php endif; ?>
                        </div>
                        <div class="col-xs-12 col-md-7">

                            <?php if ($op->cheIdsdata()) : ?>
                                <form action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post" role="form3">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label> <?=$op->lang("shift");?> </label>
                                                <select class="form-control rounded-0 p-1" style="font-size:90%;" name="neWdep_id" id="neWdep_id">
                                                    <?php $op->getSelDepartment($_POST['neWdep_id']); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <label> <?=$op->lang("section");?> </label>
                                            <div class="form-group">
                                                <select class="form-control rounded-0 p-1" style="font-size:90%;" name="neWsec_id" id="neWsec_id">
                                                    <?php $op->getSelesection($_POST['neWsec_id']); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <label> <?=$op->lang("level");?> </label>
                                            <div class="form-group">
                                                <select class="form-control rounded-0 p-1" style="font-size:90%;" name="neWlev_id" id="neWlev_id">
                                                    <?php echo  $op->GetSellevels($_POST['neWlev_id']); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <label> <?=$op->lang("group");?> </label>
                                            <div class="form-group">
                                                <select class="form-control rounded-0 p-1" style="font-size:90%;" name="neWgrp_id" id="neWgrp_id">
                                                    <?php echo $op->GetSelgroups($_POST['neWgrp_id']); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="setGetata" id="setGetata" class="btn success-color-dark p-2  text-white  float-right"> <i class="fa fa-paper-plane"></i> <?=$op->lang("update");?> </button>

                                </form>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>