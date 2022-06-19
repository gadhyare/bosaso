<?php

/**
 * fileName: المهام المنتهية
 */
?>
<div class="container py-3 border-0 ">
    <a href="<?php echo ROOT_URL; ?>/todolist" class="btn  primary-color-dark text-white mt-2   rounded-0 mb-2 py-1 px-3"> <i class="fa fa-plus" aria-hidden="true"></i>  <?= $op->lang("home"); ?> </a>

    <div class="row">
        <?php foreach ($viewmodel as $doit) { ?>
            <?php $ch = ($doit['status'] == 1) ?  $op->lang("normalk")   : (($doit['status'] == 2) ? $op->lang("urgent") : $op->lang("too urgent")); ?>
            <?php $bg = ($doit['status'] == 1) ? 'primary-color-dark text-white' : (($doit['status'] == 2) ? 'bg-warning text-white' : 'danger-color-dark text-white'); ?>
            <div class="col-xs-12 col-sm-6   col-md-3 ">
                <div class="card alert alert-<?php echo $op->getBgColor($doit['status']); ?> rounded-0 z-depth-0 border-0" data-toggle="modal" data-target="#exampleModal" onclick="showAllDetails('<?php echo ROOT_URL; ?>/todolist/show/<?php echo $doit['id']; ?>', 'yui');getId('<?php echo $doit['id']; ?>')">
                    <?php echo $doit['title']; ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<!-- Modal edit ==============================================================================================================-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div id="id" style="display:none;"></div>
            <div class="modal-body" id='yui'>

            </div>
            <div class="modal-footer">
                <button type="button" onclick="updateRec('<?php echo ROOT_URL; ?>/todolist/show?updateRec=yes&ids='+ document.getElementById('id').innerHTML)" class="btn success-color-dark text-white py-1 px-3 rounded "> <?= $op->lang("update"); ?> </button>
            </div>
        </div>
    </div>
</div>


<script>
    function getId(id) {
        document.getElementById("id").innerHTML = id;
    }

    function getIdv(val) {
        document.getElementById(val).innerHTML = id;
    }
</script>