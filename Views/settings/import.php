<?php

/**
 * fileName:  استيراد قاعدة بيانات
 */
?>

<div class="container col-xs-12 col-md-8 m-auto">
    <div class="card  rounded-0 z-depth-0 border">
        <div class="card-header unique-color-dark text-white text-center p-1   rounded-0"> <?= $op->lang("database import"); ?></div>
        <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="myform" id="myform" enctype="multipart/form-data">
                <div class="form-group text-center">
                    <label for="uploadFile" class="col-12  text-center m-auto p-5  border alert alert-info">
                        <i class="fa fa-upload" style="font-size:3.5em;"></i>
                        <br>
                        <?= $op->lang("click here to select file"); ?>
                    </label>
                    <input type="file" name="uploadFile" id="uploadFile" accept=".sql" style="display: none">
                </div>
                <button type="submit" name="import" class="btn danger-color-dark text-white px-3 py-1 float-left"> <?= $op->lang("upload"); ?> </button>

            </form>
        </div>
    </div>

</div>