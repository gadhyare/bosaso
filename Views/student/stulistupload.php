<?php

/**
 * fileName: رفع قائمة طلبة جدد
 */
?>
<div class="container">
    <div class="card col-xs-12 col-md-8 m-auto p-0">
        <div class="card-header unique-color-dark text-white text-center p-1"> <?=$op->lang("upload class list");?></div>
        <div class="card-body">
            <?php $op = new Khas(); ?>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post" role="form">
                <div class="form-group">
                    <div class="row">
                        <div class="group-form col-12">
                            <label> <?=$op->lang("program");?> </label>
                            <div class="form-group">
                                <select class="form-control rounded-0 p-0 text-center" name="prog_id" id="prog_id">
                                    <?php $op->FullSelProgInfo($_POST['prog_id']); ?>
                                </select>
                            </div>
                        </div>
                        <div class="group-form col-xs-12 col-md-6">
                            <label> <?=$op->lang("shift");?> </label>
                            <div class="form-group">
                                <select class="form-control rounded-0 p-0 text-center" name="dep_id" id="dep_id">
                                    <?php $op->getSelDepartment($_POST['dep_id']); ?>
                                </select>
                            </div>
                        </div>
                        <div class="group-form col-xs-12 col-md-6">
                            <label> <?=$op->lang("section");?> </label>
                            <div class="form-group">
                                <select class="form-control rounded-0 p-0 text-center" name="sec_id" id="sec_id">
                                    <?php $op->getSelesection($_POST['sec_id']); ?>
                                </select>
                            </div>
                        </div>
                        <div class="group-form col-xs-12 col-md-6">
                            <label> <?=$op->lang("level");?> </label>
                            <div class="form-group">
                                <select class="form-control rounded-0 p-0 text-center" name="lev_id" id="lev_id">
                                    <?php $op->GetSellevels($_POST['lev_id']); ?>
                                </select>
                            </div>
                        </div>
                        <div class="group-form col-xs-12 col-md-6">
                            <label> <?=$op->lang("group");?> </label>
                            <div class="form-group">
                                <select class="form-control rounded-0 p-0 text-center" name="grp_id" id="grp_id">
                                    <?php $op->GetSelgroups($_POST['grp_id']); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fileUploads" class="col-12 py-2 text-center unique-color-dark text-white"> <?=$op->lang("select file");?> </label>
                        <input type="file" name="fileUploads" id="fileUploads" class="form-control py-1" style="display:none;">
                    </div>
                    <button type="submit" name="upFile" class="btn col-12  m-auto danger-color-dark text-white px-3 py-2 "> <i class="fa fa-upload"></i> <?=$op->lang("upload file");?> </button>
            </form>
        </div>
    </div>
</div>
<script>
    $('#prog_id').select2();
</script>