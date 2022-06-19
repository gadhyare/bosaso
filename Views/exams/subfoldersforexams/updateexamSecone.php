    <?php
    /**
     * fileName: تعديل  ساعات اختبار
     */
    ?>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post" role="form3" class="m-auto border ">
        <?php $op = new Khas(); ?>
        <div class="form-group   p-2">
            <label> <?=$op->lang("course code");?> </label>
            <br>
            <input type="text" name="ex_code" id="ex_code" value="<?php echo $op->setPosts('ex_code'); ?>" class="form-control rounded-0 p-1 col-9 float-right m-auto">
            <button type="submit" name="sectionOneedite" id="sectionOneedite" class="btn danger-color-dark p-2  text-white col-2 float-left  m-auto"> <?=$op->lang("update");?> </button>
            <br>
        </div>
    </form>
    <br>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post" role="form4" class="m-auto border ">
        <div class="form-group   p-2">
            <label> <?=$op->lang("credit hours");?> </label>
            <br>
            <input type="number" name="ex_crid" id="ex_crid" value="<?php echo $ex_crid; ?>" class="form-control rounded-0 p-1 col-9 float-right m-auto">
            <button type="submit" name="sectionTwoedit" id="sectionTwoedit" class="btn danger-color-dark p-2  text-white col-2 float-left  m-auto"> <?=$op->lang("update");?> </button>
            <br>
        </div>
    </form>