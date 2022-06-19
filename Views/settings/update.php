<?php

/**
 * fileName: تحديث بيانات البرنامج
 */
?>
<div class="container col-xs-12 col-sm-12 col-md-8 m-auto bg-white">
    <div class="card p-0">

        <div class="card-header p-1 unique-color-dark text-white text-center"><?=$op->lang("Update basic settings");?></div>
        <div class="card-body">
            <?php foreach ($viewmodel as $edit_items) : ?>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="row">
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="siteName"><?= $op->lang("organization Name"); ?></label>
                            <input type="text" name="siteName" id="siteName" class="form-control rounded-0 col-12" value="<?php echo $edit_items['siteName']; ?>">
                        </div>
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="siteDisc"> <?= $op->lang("description"); ?> </label>
                            <input type="text" name="siteDisc" id="siteDisc" class="form-control rounded-0 col-12" value="<?php echo $edit_items['siteDisc']; ?>">
                        </div>
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="siteAddr"><?= $op->lang("Address"); ?></label>
                            <input type="text" name="siteAddr" id="siteAddr" class="form-control rounded-0 col-12" value="<?php echo $edit_items['siteAddr']; ?>">
                        </div>

                        <div class="form-group col-xs-12 col-md-6">
                            <label for="siteEmail"><?= $op->lang("phones"); ?> </label>
                            <input type="text" name="sitePhones" id="sitePhones" class="form-control rounded-0 col-12" value="<?php echo $edit_items['sitePhones']; ?>">
                        </div>

                        <div class="form-group col-xs-12 col-md-6">
                            <label for="siteEmail"><?= $op->lang("email"); ?> </label>
                            <input type="email" name="siteEmail" id="siteEmail" class="form-control rounded-0 col-12" value="<?php echo $edit_items['siteEmail']; ?>">
                        </div>

                        <div class="form-group col-xs-12 col-md-6">
                            <label for="siteUrl"><?= $op->lang("url"); ?> </label>
                            <input type="text" name="siteUrl" id="siteUrl" class="form-control rounded-0 col-12" value="<?php echo $edit_items['siteUrl']; ?>">
                        </div>
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="siteTags"><?= $op->lang("tags"); ?> </label>
                            <input type="text" name="siteTags" id="siteTags" class="form-control rounded-0 col-12" value="<?php echo $edit_items['siteTags']; ?>">
                        </div>
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="siteStatus"><?= $op->lang("status"); ?> </label>
                            <select name="siteStatus" id="siteStatus" class="form-control rounded-0 col-12">
                                <?php echo ($edit_items['siteStatus'] == 1) ? '<option value="1">Enabled</option><option value="2">Closed</option>' : '<option value="2">Closed</option><option value="1" >Enabled</option>'; ?>
                            </select>
                        </div>

                        <div class="form-group col-12">
                            <label for="siteColsemsg"><?= $op->lang("closing message"); ?> </label>
                            <textarea name="siteColsemsg" id="siteColsemsg" cols="30" rows="3" class="form-control rounded-0 col-12"><?php echo $edit_items['siteColsemsg']; ?></textarea>
                        </div>
                    </div>
                    <button type="submit" id="updateSiteInfo" name="updateSiteInfo" class="btn success-color-dark text-white float-right rounded-0 px-3 py-1"><?= $op->lang("update"); ?> </button>
                    <a href="<?php echo ROOT_URL; ?>" class="btn danger-color-dark text-white float-left rounded-0 px-3 py-1"> <?= $op->lang("home"); ?> </a>
        </div>
    <?php endforeach; ?>
    </form>
    </div>
</div>
</div>