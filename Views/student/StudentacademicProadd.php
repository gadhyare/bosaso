<?php

/**
 * fileName: <?=$op->lang("add");?> البرامج العلمية للطالب
 */
?>
<div class="container mt-5 col-xs-12 col-sm-10 col-md-6">
    <div class="card  ">
        <div class="card-header  blue-grey darken-4 text-white font-weight-bold text-center p-1"><?=$op->lang("Add a study program for the student");?> </div>
        <div class="card-body teal lighten-5">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="row">
                    <?php $op = new Khas(); ?>

                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label> <?= $op->lang("register date"); ?></label>
                            <input type="date" name="reg_date" value="<?php echo $op->setPosts('reg_date'); ?>" class="form-control p-1  rounded-0" placeholder="<?= $op->lang("register date"); ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label> <?= $op->lang("Program"); ?> </label>
                            <select name="prog_id" id="prog_id" class="form-control p-1  rounded-0">
                                <?php echo $op->FullProgInfo(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>   <?= $op->lang("level name"); ?> </label>
                            <select name="lev_id" id="lev_id" class="form-control p-1  rounded-0">
                                <?php echo $op->get_level(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label> <?= $op->lang("group name"); ?></label>
                            <select name="grp_id" id="grp_id" class="form-control p-1  rounded-0">
                                <?php echo $op->get_group(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label> <?= $op->lang("shift name"); ?></label>
                            <select name="dep_id" id="dep_id" class="form-control p-1  rounded-0">
                                <?php echo $op->get_department(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label> <?= $op->lang("section name"); ?></label>
                            <select name="sec_id" id="sec_id" class="form-control p-1  rounded-0">
                                <?php echo $op->get_section(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label> <?= $op->lang("status"); ?></label>
                            <select name="statues" id="statues" class="form-control p-1  rounded-0">
                                <option value="1"><?=$op->lang("Continuous");?></option>
                                <option value="2"><?=$op->lang("Record Entry");?></option>
                                <option value="3"><?=$op->lang("Student has been withdrawn");?></option>
                                <option value="4"><?=$op->lang("Transfer to another university");?></option>
                                <option value="5"><?=$op->lang("Expulsion from university");?></option>
                                <option value="6"><?=$op->lang("Graduated");?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label> <?= $op->lang("discount"); ?></label>
                            <input type="number" name="Prog_Discount" value="<?php echo $op->setPosts('Prog_Discount'); ?>" class="form-control p-1  rounded-0" value="0">
                        </div>
                    </div>
                </div>
                <input type="submit" name="add_stu_prog" value="<?= $op->lang("add"); ?>" class="btn primary-color-dark text-white px-3 py-2">
                <a href="<?php echo ROOT_URL; ?>/subject" class="btn danger-color-dark text-white p-2"> <?= $op->lang("cencel"); ?></a>
            </form>
        </div>
    </div>
</div>