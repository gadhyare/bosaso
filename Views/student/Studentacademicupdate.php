<?php

/**
 * fileName: تعديل المؤهلات العلمية للطالب
 */
?>
<?php foreach ($viewmodel as $item) { ?>
    <br>
    <div class="container col-xs-12 col-sm-12 col-md-10 m-auto ">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="container text-left">
                <input type="submit" name="add_quali" value="<?= $op->lang("add"); ?>" id="add_quali" class="btn success-color-dark   rounded-0 text-white    mb-3  py-2 px-3 ml-1">
                <a href="<?php echo ROOT_URL; ?>/student/update/<?php echo $_GET['stu_id']; ?>" class="btn danger-color-dark   rounded-0 text-white    mb-3  py-2 px-3 ml-1"> <?= $op->lang("go back"); ?> </a>
            </div>

            <div class="card mb-1  rounded-0">
                <div class="card-header accord-header unique-color-dark text-center text-white    rounded-0 p-1">

                    <?= $op->lang("Student's academic qualifications"); ?>

                </div>
                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                    <div class="card-block p-1 ">
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    <div class="form-group input-group-sm p-1 m-0">
                                        <label> <?= $op->lang("Qualification"); ?> </label>
                                        <select name="Edu_quali" id="Edu_quali" class="form-control input-sm p-1  rounded-0">
                                            <option value="<?php echo $item['Edu_quali']; ?>" selected> <?php echo $item['Edu_quali']; ?> </option>
                                            <option value="<?= $op->lang("Scientific high school"); ?>" selected> <?= $op->lang("Scientific high school"); ?> </option>
                                            <option value="<?= $op->lang("Literary minor"); ?>"> <?= $op->lang("Literary minor"); ?></option>
                                            <option value="<?= $op->lang("sharia secondary"); ?>"><?= $op->lang("sharia secondary"); ?></option>
                                            <option value="<?= $op->lang("sharia secondary"); ?>"><?= $op->lang("sharia secondary"); ?></option>
                                            <option value="<?= $op->lang("Other"); ?>"><?= $op->lang("Other"); ?></option>
                                        </select>
                                    </div>
                                    <div class="form-group input-group-sm p-1 m-0">
                                        <label> <?= $op->lang("Eligibility date"); ?></label>
                                        <input type="date" required="required" name="Edu_year" id="Edu_year" value="<?php echo $item['Edu_year']; ?>" class="form-control input-sm p-1  rounded-0" placeholder="<?= $op->lang("Eligibility date"); ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group input-group-sm p-1 m-0">
                                        <label> <?= $op->lang("Qualifier"); ?> </label>
                                        <input type="text" required="required" name="Edu_Issuer" id="Edu_Issuer" value="<?php echo $item['Edu_Issuer']; ?>" class="form-control input-sm p-1  rounded-0" placeholder="<?= $op->lang("Qualifier"); ?>">
                                    </div>
                                    <div class="form-group input-group-sm p-1 m-0">
                                        <label> <?= $op->lang("Qualification language"); ?> </label>
                                        <select name="Edu_lang" id="Edu_lang" class="form-control input-sm p-1  rounded-0">
                                            <option value="<?= $op->lang("arabic"); ?>"> <?= $op->lang("arabic"); ?> </option>
                                            <option value="<?= $op->lang("somali"); ?>"> <?= $op->lang("somali"); ?> </option>
                                            <option value="<?= $op->lang("english"); ?>"> <?= $op->lang("english"); ?> </option>
                                            <option value="<?= $op->lang("Other"); ?>"> <?= $op->lang("Other"); ?> </option>
                                        </select>
                                    </div>
                                </td>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php }; ?>