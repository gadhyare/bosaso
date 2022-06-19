<?php

/**
 * fileName:  رئيسية الإعدادات  
 */
?>
<div class="container">
    <div class="row text-center border-0 text-white">
        <a href="<?php echo ROOT_URL; ?>/settings/update" class="text-white col-5 col-xs-12 col-md-2 mx-1 my-1 z-depth-2 text-center p-4 danger-color-dark border-0 z-depth-2 " style=" font-size:90%;">
            <div class="fa fa-info"></div> <?=$op->lang("basic information");?>
        </a>
        <a href="<?php echo ROOT_URL; ?>/settings/setemail" class="col-5 col-xs-12 col-md-2 mx-1 my-1 z-depth-2 text-center p-4 danger-color-dark border-0 z-depth-2 text-white" style="font-size:90%;">
            <div class="fa fa-at"></div> <?=$op->lang("email");?>
        </a>
        <a href="<?php echo ROOT_URL; ?>/settings/export" class="col-5 col-xs-12 col-md-2 mx-1 my-1 z-depth-2 text-center p-4 danger-color-dark border-0 z-depth-2 text-white" style="font-size:90%;">
            <div class="fa fa-copy"></div> <?=$op->lang("copy data");?>
        </a>
        <a href="<?php echo ROOT_URL; ?>/settings/import" class="col-5 col-xs-12 col-md-2 mx-1 my-1 z-depth-2 text-center p-4 danger-color-dark border-0 z-depth-2 text-white" style="font-size:90%;">
            <div class="fa fa-upload"></div> <?=$op->lang("import data");?>
        </a>
        <a href="<?php echo ROOT_URL; ?>/settings/delexportfile" class="col-5 col-xs-12 col-md-2 mx-1 my-1 z-depth-2 text-center p-4 danger-color-dark border-0 z-depth-2 text-white" style="font-size:90%;">
            <div class="fa fa-trash"></div> <?=$op->lang("erase files");?>
        </a>
        <a href="<?php echo ROOT_URL; ?>/settings/socialmedia" class="col-5 col-xs-12 col-md-2 mx-1 my-1 z-depth-2 text-center p-4 danger-color-dark border-0 z-depth-2 text-white" style="font-size:90%;">
            <div class="fa fa-user"></div>
                    <?=$op->lang("social media");?>
        </a>
        <a href="<?php echo ROOT_URL; ?>/settings/filemanager" class="col-5 col-xs-12 col-md-2 mx-1 my-1 z-depth-2 text-center p-4 danger-color-dark border-0 z-depth-2 text-white" style="font-size:90%;">
            <div class="fa fa-cog"></div>
                    <?=$op->lang("files manager");?>
        </a>
    </div>
</div>