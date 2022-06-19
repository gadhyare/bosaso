<?php

/**
 * fileName: ريئيسية حساب بنكي
 */
?>
<div class="container-fluid py-3">
    <?php $op = new Khas(); ?>
    <div class="row">
        <div class="col-xs-12 col-md-4 ">
            <div class="card">

                <div class="card-header pink darken-3 text-white text-center p-1 rounded-0 border-0"> <?= $op->lang("add"); ?> <?=$op->lang("bank account");?> </div>
                <div class="card-body">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="form-group">
                            <label><?= $op->lang("account Name"); ?></label>
                            <input type="text" name="Ban_name" id="Ban_name" class="form-control p-1 rounded-0">
                            <input type="hidden" name="token" value="<?php echo $op->csrf(); ?>" class="form-control p-1 rounded-0">
                        </div>
                        <div class="form-group">
                            <label><?= $op->lang("account No"); ?></label>
                            <input type="text" name="Ban_num" id="Ban_num" class="form-control p-1 rounded-0">
                        </div>
                        <div class="form-group">
                            <label><?= $op->lang("date added"); ?></label>
                            <input type="date" name="Ban_date" id="Ban_date" class="form-control p-1 rounded-0">
                        </div>
                        <div class="form-group">
                            <label><?= $op->lang("opening Account"); ?></label>
                            <input type="number" name="Ban_op_acc" id="Ban_op_acc" class="form-control p-1 rounded-0">
                        </div>
                        <div class="form-group">
                            <label><?= $op->lang("status"); ?></label>
                            <select name="Ban_active" id="Ban_active" class="form-control p-1 rounded-0">
                                <option value="1"><?= $op->lang("active"); ?></option>
                                <option value="2"><?= $op->lang("non active"); ?></option>
                            </select>
                        </div>
                        <input type="submit" name="addRec" value="<?= $op->lang("add"); ?>" class="btn primary-color-dark text-white px-3 py-2">
                        <a href=" <?php echo ROOT_URL; ?>/academics" class="btn danger-color-dark text-white p-2"><?= $op->lang("cancel"); ?></a>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-8 border z-depth-1 ">

            <table class="table table-bordered table-striped border-dark " id="myTable">
                <thead>
                    <th class="p-1 text-center unique-color-dark"> #</th>
                    <th class="p-1 text-center unique-color-dark"> <?= $op->lang("account Name"); ?> </th>
                    <th class="p-1 text-center unique-color-dark"> <?= $op->lang("account No"); ?> </th>
                    <th class="p-1 text-center unique-color-dark"><?= $op->lang("date added"); ?></th>
                    <th class="p-1 text-center unique-color-dark"><?= $op->lang("status"); ?></th>
                </thead>
                <tbody>
                    <?php $nu = 1; ?>
                    <?php foreach ((array) $viewmodel as $item) : ?>
                        <tr>
                            <td class="p-1 "><?php echo $nu++; ?> </td>
                            <td class="p-1 "> <?php echo $op->pro_field($item['Ban_name']); ?> </td>
                            <td class="p-1 "> <?php echo $op->pro_field($item['Ban_num']); ?> </td>
                            <td class="p-1 "> <?php echo $op->pro_field($item['Ban_date']); ?></td>
                            <td class="p-1  text-center">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn success-color-dark p-1 text-white" data-toggle="modal" data-target="#exampleModal" onclick="showAllDetails('<?php echo ROOT_URL; ?>/baninfo/update/<?php echo $op->pro_field($item['Ban_id']); ?>', 'yui');getId('<?php echo $op->pro_field($item['Ban_id']); ?>')">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <a href="<?php echo ROOT_URL; ?>/baninfo/delete/<?php echo $op->pro_field($item['Ban_id']); ?>" class="btn danger-color-dark p-1 text-white"> <i class="fa fa-trash-o"></i> </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal edit ==============================================================================================================-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="id" style="display:none;"></div>
            <div class="modal-body" id='yui'>

            </div>
            <div class="modal-footer">
                <button type="button" id="launch-modal" onclick="updateRec('<?php echo ROOT_URL; ?>/baninfo/update?updateRec=yes&ids='+ document.getElementById('id').innerHTML)" class="btn success-color-dark text-white py-1 px-3 rounded "> <?= $op->lang("update"); ?> </button>
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


    $(document).ready(function() {
        $('.launch-modal').click(function() {
            $('#myModal').modal({
                backdrop: 'static'
            });
        });
    });
</script>