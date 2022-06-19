<?php

/**
 * fileName: وسائل  التواصل الإجتماعي
 */
?>
<div class="container col-xs-12 col-sm-12 col-md-6 m-auto">
    <div class="card">
        <div class="card-header">
            <?= $op->lang("add"); ?> <?= $op->lang("social media"); ?>
        </div>
        <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                    <label for="socialmedia_name"> <?= $op->lang("site"); ?> </label>
                    <input type="text" name="socialmedia_name" id="socialmedia_name" class="form-control" value="<?php echo $op->setPosts("socialmedia_name"); ?>">
                </div>
                <div class="form-group">
                    <label for="socialmedia_link"> <?= $op->lang("link"); ?> </label>
                    <input type="text" name="socialmedia_link" id="socialmedia_link" class="form-control" value="<?php echo $op->setPosts("socialmedia_link"); ?>">
                </div>
                <div class="form-group">
                    <label for="socialmedia_logo"> <?= $op->lang("logo"); ?> </label>
                    <input type="text" name="socialmedia_logo" id="socialmedia_logo" class="form-control" value="<?php echo $op->setPosts("socialmedia_logo"); ?>">
                </div>
                <div class="form-group">
                    <label for="active"> <?= $op->lang("add"); ?> </label>
                    <select name="active" id="active" class="form-control">
                        <option value="1"><?= $op->lang("active"); ?></option>
                        <option value="2"><?= $op->lang("non active"); ?></option>
                    </select>
                </div>
                <button type="submit" name="socialmediadd" class="btn success-color-dark text-white float-right"> <?= $op->lang("add"); ?> </button>
                <a href="<?= ROOT_URL; ?>/settings/socialmedia" class="btn danger-color-dark text-white float-left"> <?= $op->lang("go back"); ?> </a>
            </form>
        </div>


    </div>
</div>