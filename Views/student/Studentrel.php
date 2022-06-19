<?php

/**
 * fileName: رئيسية أقارب الطلبة
 */
?>
<?php $op = new Khas();   ?>
<?php if ($_GET['id'] != "") : ?>
    <br>
    <div class="container col-xs-12 col-sm-12 col-md-10 m-auto ">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="container text-left">
                <input type="submit" name="add_rel" value="<?= $op->lang("add"); ?> " id="submit" class="btn danger-color-dark   rounded-0 text-white    mb-3  py-2 px-3">

            </div>

            <div id="accordion" role="tablist" aria-multiselectable="true">
                <div class="card mb-1  rounded-0">
                    <div class="card-header accord-header unique-color-dark text-center    rounded-0" role="tab" id="headingOne">
                        <h5 class="mb-0 ">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <?= $op->lang("student's relative information"); ?>
                            </a>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                        <div class="card-block p-1 ">
                            <table class="table table-bordered">
                                <tr>
                                    <td>
                                        <div class="form-group input-group-sm p-1 m-0">
                                            <label><?= $op->lang("name"); ?> </label>
                                            <input type="text" required="required" name="rel_name" value="<?php echo $op->setPosts("rel_name"); ?>" id="rel_name" class="form-control  p-1  rounded-0" placeholder="<?= $op->lang("name"); ?> ">
                                        </div>
                                        <div class="form-group input-group-sm p-1 m-0">
                                            <label> <?= $op->lang("relative relation"); ?> </label>
                                            <select name="rel_type" id="rel_type" class="form-control  p-1  rounded-0">
                                                <option value="1"> <?= $op->lang("father"); ?> </option>
                                                <option value="2"> <?= $op->lang("Mother"); ?> </option>
                                                <option value="3"> <?= $op->lang("brother"); ?> </option>
                                                <option value="4"> <?= $op->lang("sister"); ?> </option>
                                                <option value="5"> <?= $op->lang("paternal uncle"); ?> </option>
                                                <option value="6"> <?= $op->lang("Aunt"); ?> </option>
                                                <option value="7"> <?= $op->lang("maternal uncle"); ?> </option>
                                                <option value="8"> <?= $op->lang("maternal aunt"); ?> </option>
                                                <option value="9"> <?= $op->lang("grandfather"); ?> </option>
                                                <option value="10"> <?= $op->lang("grandmother"); ?> </option>
                                                <option value="11"> <?= $op->lang("Other"); ?> </option>
                                            </select>
                                        </div> 
                                        <div class="form-group input-group-sm p-1 m-0">
                                            <label> <?= $op->lang("Degree of relationship"); ?> </label>
                                            <select name="rel_digree" id="rel_digree" class="form-control  p-1  rounded-0">
                                                <option value="1"> <?= $op->lang("first"); ?> </option>
                                                <option value="2"> <?= $op->lang("second"); ?> </option>
                                                <option value="3"> <?= $op->lang("third"); ?> </option>
                                                <option value="4"> <?= $op->lang("Other"); ?> </option>
                                            </select> 
                                        </div> 
                                    </td>
                                    <td> 
                                        <div class="form-group input-group-sm p-1 m-0">
                                            <label> <?= $op->lang("address"); ?> </label>
                                            <input type="text" required="required" name="rel_Address" value="<?php echo $op->setPosts("rel_Address"); ?>" id="rel_Address" class="form-control  p-1  rounded-0" placeholder=" <?= $op->lang("address"); ?>  ">
                                        </div> 
                                        <div class="form-group input-group-sm p-1 m-0">
                                            <label> <?= $op->lang("email"); ?> </label>
                                            <input type="text" required="required" name="rel_email" value="<?php echo $op->setPosts("rel_email"); ?>" id="rel_email" class="form-control  p-1  rounded-0" placeholder=" <?= $op->lang("email"); ?>  ">
                                        </div> 
                                        <div class="form-group input-group-sm p-1 m-0">
                                            <label> <?= $op->lang("phones"); ?> </label>
                                            <input type="text" required="required" name="rel_phones" value="<?php echo $op->setPosts("rel_phones"); ?>" id="rel_phones" class="form-control  p-1  rounded-0" placeholder=" <?= $op->lang("phones"); ?>  ">
                                        </div>
                                    </td> 
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </div>
<?php else : ?>
    <?php echo sprintf(Data_Not_Founded,  "الطالب"); ?>
<?php endif; ?>