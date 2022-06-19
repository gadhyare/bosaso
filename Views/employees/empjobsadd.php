<?php

/**
 * fileName:   <?=$op->lang("add");?>  وظيفة  موظف
 */
?><?php $id = (isset($_GET['id'])) ? $_GET['id'] : ''; ?>
<?php if ($id) : ?>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <?php $op = new Khas(); ?>
        <div class="container col-xs-12 col-md-6  m-auto bg-white text-right z-depth-0">
            <div class="card  z-depth-0 border  rounded-0 ">
                <div class="card-header py-2 px-1 text-center border-0 rounded-0 p-1 unique-color-dark text-white "> <?=$op->lang("add");?>  <?=$op->lang("employee job");?>   </div>
                <div class="card-body px-2 border  rounded-0 ">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="empjob_title"> <?=$op->lang("job title");?>   </label>
                            <input type="text" name="empjob_title" id="empjob_title" class="form-control p-0 rounded-0 alert alert-info">
                        </div>
                        <div class="form-group">
                            <label for="em_sec_id"> <?=$op->lang("career section");?> </label>
                            <select name="em_sec_id" id="em_sec_id" class="form-control p-0 rounded-0 alert alert-info">
                                <?php $op->getEmpSec(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="em_lev_id"> <?=$op->lang("career grades");?> </label>
                            <select name="em_lev_id" id="em_lev_id" class="form-control p-0 rounded-0 alert alert-info">
                                <?php echo $op->getEmpLev(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="empjob_strdate">  <?=$op->lang("register date");?></label>
                            <input type="date" name="empjob_strdate" id="empjob_strdate" class="form-control p-0 rounded-0 alert alert-info" required>
                        </div>
                        <div class="form-group">
                            <label for="empjob_sellary">  <?=$op->lang("net salary");?></label>
                            <input type="number" name="empjob_sellary" id="empjob_sellary" class="form-control p-0 rounded-0 alert alert-info" required>
                        </div>
                        <div class="form-group">
                            <label for="empjob_levdate">  <?=$op->lang("date of leaving the job");?>  </label>
                            <input type="date" name="empjob_levdate" id="empjob_levdate" class="form-control p-0 rounded-0 alert alert-info">
                        </div>

                        <div class="form-group">
                            <label for="empjob_note"><?=$op->lang("note about job");?> </label>
                            <textarea name="empjob_note" id="empjob_note" cols="30" rows="3" class="form-control p-0 rounded-0 alert alert-info"></textarea>
                        </div>
                        <button type="submit" name="addRec" class="btn success-color-dark text-white px-3 py-1"> <?=$op->lang("save");?>   </button>
                        <a href="<?php echo ROOT_URL; ?>/employees/empinfoupdate/<?php echo $_GET['id']; ?>" class="btn danger-color-dark text-white px-3 py-1  float-left"> <?=$op->lang("go back");?> </a>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>