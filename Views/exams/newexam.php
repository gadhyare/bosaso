    <?php
    /**
     * fileName:  اضافة اختبار
     */
    ?>
    <?php $op = new Khas()  ?>
    <?php $dep_id = (isset($_POST['dep_id'])) ? $_POST['dep_id'] : ''; ?>
    <?php $sec_id = (isset($_POST['sec_id'])) ? $_POST['sec_id'] : ''; ?>
    <?php $lev_id = (isset($_POST['lev_id'])) ? $_POST['lev_id'] : ''; ?>
    <?php $grp_id = (isset($_POST['grp_id'])) ? $_POST['grp_id'] : ''; ?>
    <?php if (isset($_GET['id'])) : ?>

        <div class="container col-xs-12 col-sm-12 col-md-6 m-auto  ">
            <div class="card  z-depth-0 border mt-2">
                <div class="card-header  text-white  unique-color-dark font-weight-bold text-center p-1 rounded-0 ">  <?=$op->lang("upload exam");?>   </div>
                <div class="card-body">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post" role="form">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <label> <?=$op->lang("shift");?> </label>
                                <div class="form-group">
                                    <select class="form-control rounded-0 p-1" style="font-size:90%;" name="dep_id" id="dep_id">
                                        <?php $op->getSelDepartment($_POST['dep_id']); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <label> <?=$op->lang("section");?> </label>
                                <div class="form-group">
                                    <select class="form-control rounded-0 p-1" style="font-size:90%;" name="sec_id" id="sec_id">
                                        <?php $op->getSelesection($_POST['sec_id']); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <label> <?=$op->lang("level");?> </label>
                                <div class="form-group">
                                    <select class="form-control rounded-0 p-1" style="font-size:90%;" name="lev_id" id="lev_id">
                                        <?php echo  $op->GetSellevels($_POST['lev_id']); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <label> <?=$op->lang("group");?> </label>
                                <div class="form-group">
                                    <select class="form-control rounded-0 p-1" style="font-size:90%;" name="grp_id" id="grp_id">
                                        <?php echo $op->GetSelgroups($_POST['grp_id']); ?>
                                    </select>
                                </div> 
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <label> <?=$op->lang("code");?></label>
                                <div class="form-group">
                                    <input type="number" name="ex_code" id="ex_code" class="form-control rounded-0 p-1" style="font-size:90%;" value="<?php echo $_POST['ex_code'] ?? ""; ?>">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <label> <?=$op->lang("hours");?> </label>
                                <div class="form-group">
                                    <input type="number" name="ex_crid" id="ex_crid" class="form-control rounded-0 p-1" value="<?php echo $_POST['ex_crid'] ?? ""; ?>" style="font-size:90%;">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label> <?=$op->lang("subject");?> </label>
                                <div class="form-group">
                                    <select class="form-control rounded-0 p-1 select2" style="font-size:70% !important;" name="sub_id" id="sub_id">
                                        <?php $op->getprog_id($_GET['id']); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 pt-2">
                                <br>
                                <label for="examfileup" class="w-100 btn info-color-dark text-white py-2  m-auto"> <?=$op->lang("select");?> <i class="fa fa-upload"></i> </label>
                                <div class="form-group">
                                    <input type="file" name="examfileup" class="rounded-0  " id="examfileup" style="display: none">
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="files_dir" value="<?php echo $fledir; ?>">
                        <button type="submit" name="upload_ex" class="btn success-color-dark p-2  text-white col-8 m-auto float-right"> <i class="fa fa-check ml-1"></i>   <?=$op->lang("upload file");?> </button>
                        <a href="<?php echo ROOT_URL; ?>/exams/examselPro" class="btn danger-color-dark p-2  col-3 m-auto  text-white float-left"> <i class="fa fa-arrow-left"> </i> <?=$op->lang("go back");?> </a>

                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <script>
        $('.select2').select2();
    </script>