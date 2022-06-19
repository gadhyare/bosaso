<?php

/**
 * fileName: مهمة جديدة
 */
?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="form-group">
        <label> <?= $op->lang("title"); ?> </label>
        <input type="text" name="title" id="title" class="form-control rounded-0">
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label><?= $op->lang("status"); ?></label>
                <select name="active" class="form-control rounded-0">
                    <option class="p-0" value="1"> <?= $op->lang("working on"); ?></option>
                    <option class="p-0" value="3"> <?= $op->lang("postponed"); ?> </option>
                    <option class="p-0" value="4"> <?= $op->lang("canceled"); ?></option>
                    <option class="p-0" value="5"> <?= $op->lang("converted"); ?></option>
                </select>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label> <?= $op->lang("degree of Work"); ?> </label>
                <select name="status" class="form-control rounded-0">
                    <option class="p-0" value="1"> <?= $op->lang("normal"); ?> </option>
                    <option class="p-0" value="2"> <?= $op->lang("urgent"); ?></option>
                    <option class="p-0" value="3"> <?= $op->lang("very urgent"); ?></option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label> <?= $op->lang("for"); ?> </label>
        <br>
        <?php foreach ($viewmodel['user'] as $usr) : ?>
            <input type="checkbox" id="usr<?php echo $usr['usrid']; ?>" name="usr[]" value="<?php echo $usr['usrid']; ?>">
            <label for="usr<?php echo $usr['usrid']; ?>"><?php echo $usr['user_name']; ?></label>
        <?php endforeach; ?>
    </div>

    <div class="form-group">
        <label> <?= $op->lang("topic"); ?> </label>
        <textarea name="topic" id="" class="form-control rounded-0" cols="30" rows="3"></textarea>
    </div>
</form>