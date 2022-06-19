<?php

/**
 * fileName: رئيسية المهام
 */
?>
<div class="container py-3 border-0">
    <button type="button" class="btn danger-color-dark mt-2 float-right rounded-0 mb-2 py-1 px-3 text-white" data-toggle="modal" data-target="#dd" onclick="showDetails('<?php echo ROOT_URL; ?>/todolist/add/', 'AddModalLbl')">
        <i class="fa fa-plus" aria-hidden="true"></i> <?= $op->lang("new task"); ?>
    </button>
    <a href="<?php echo ROOT_URL; ?>/todolist/endtodolist" class="btn  primary-color-dark text-white mt-2 float-left rounded-0 mb-2 py-1 px-3"> <i class="fa fa-plus" aria-hidden="true"></i> <?= $op->lang("finished tasks"); ?> </a>
    <br>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class='mt-2 pt-5    border-0'>
        <?php foreach ($viewmodel as $doit) { ?>
            <?php $ch = ($doit['status'] == 1) ?  $op->lang("normalk")   : (($doit['status'] == 2) ? $op->lang("urgent") : $op->lang("too urgent")); ?>
            <?php $bg = ($doit['status'] == 1) ? 'primary-color-dark text-white' : (($doit['status'] == 2) ? 'bg-warning text-white' : 'danger-color-dark text-white'); ?>
            <div class="card border-0 rounded-0 col-3 alert alert-<?php echo $op->getBgColor($doit['status']); ?>" data-toggle="modal" data-target="#exampleModal" onclick="showAllDetails('<?php echo ROOT_URL; ?>/todolist/show/<?php echo $doit['id']; ?>', 'yui');getId('<?php echo $doit['id']; ?>')">
                <?php echo $doit['title']; ?>
            </div>

        <?php } ?>
    </form>

</div>
<!-- Modal add ==============================================================================================================-->
<div class="modal fade" id="dd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body" id="AddModalLbl">

            </div>
            <div class="modal-footer">
                <button type="button" onclick="addRec('<?php echo ROOT_URL; ?>/todolist/add?addRec=yes')" class="btn success-color-dark text-white py-1 px-3 rounded "> <?= $op->lang("save"); ?> </button>
            </div>
        </div>
    </div>
</div>


<!-- Modal edit ==============================================================================================================-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
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