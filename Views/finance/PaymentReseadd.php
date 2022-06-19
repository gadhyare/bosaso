<?php

/**
 * fileName: <?=$op->lang("add");?> جهة دفع
 */
?>
    <div class="card border z-depth-0 p-3">
        <div class="card-header"> <?=$op->lang("add");?> <?=$op->lang("add");?>  <?=$op->lang("fee type");?> </div>
        <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                    <label for=""><?=$op->lang("fee type");?></label>
                    <input type="text" name="PaymentRes" id="PaymentRes" class="form-control">
                </div>
                <div class="form-group">
                    <label for=""><?=$op->lang("status");?></label>
                    <select name="active" id="active" class="form-control p-0">
                        <option value="1"><?=$op->lang("active");?></option>
                        <option value="2"><?=$op->lang("non active");?></option>
                    </select>
                </div> 
            </form>
        </div>
    </div>
