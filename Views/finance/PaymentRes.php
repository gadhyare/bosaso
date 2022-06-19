<?php

/**
 * fileName: جهات الدفع
 */
?>
<div class="container col-8 m-auto">
    <button type="button" class="btn danger-color-dark mt-2 float-left rounded-0 mb-2 py-1 px-3 text-white" data-toggle="modal" data-target="#dd" onclick="showDetails('<?php echo ROOT_URL; ?>/finance/PaymentReseadd', 'AddModalLbl')">
        <i class="fa fa-plus" aria-hidden="true"></i> <?=$op->lang("add");?> <?=$op->lang("add") ." " . $op->lang("fee type");?>
    </button>
    <a href="<?php echo ROOT_URL; ?>/finance/PaymentResetrash" class="btn primary-color-dark mt-2 float-left rounded-0 mb-2 py-1 px-3 text-white clreafix"><i class="fa fa-trash" aria-hidden="true"></i> </a>
    <br>
    <hr>
    <?php $item = json_decode($viewmodel); ?>
    <table class="table table-striped" id="myTable">
        <thead>
            <th class="bg-light text-center"> # </th>
            <th class="bg-light text-center"> <?=$op->lang("fee type");?> </th>
            <th class="bg-light text-center">  <?=$op->lang("status");?> </th>
            <th class="bg-light text-center">  <?=$op->lang("operation");?> </th>
        </thead>
        <tbody>
            <?php if (count((array) $item)) : ?>
                <?php $i = 1; ?>
                <?php foreach ($item as $key => $val) : ?>
                    <tr>
                        <td> <?php echo $i; ?> </td>
                        <td> <?php echo $val->PaymentRes; ?> </td>
                        <td> <?php echo ($val->active == 1) ? $op->lang("active") : $op->lang("non active"); ?> </td>
                        <td class="text-center">
                            <button type="button" class="btn success-color-dark text-white p-1" data-toggle="modal" data-target="#exampleModal" onclick="showAllDetails('<?php echo ROOT_URL; ?>/finance/PaymentResedite/<?php echo $val->Pay_Res_id; ?>', 'yui');getId('<?php echo $val->Pay_Res_id; ?>')">
                                <i class="fa fa-edit  p-1"></i>
                            </button>
                            <a href="<?php echo ROOT_URL; ?>/finance/PaymentResedel/<?php echo $val->Pay_Res_id; ?>" class="btn danger-color-dark text-white p-1"> <i class="fa fa-trash p-1"></i> </a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="4">
                        <?php echo $_SESSION['msg'] = Data_Not_Founded; ?>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>


<!-- Modal edit ==============================================================================================================-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="id" style="display:none;"></div>
            <div class="modal-body" id='yui'>

            </div>
            <div class="modal-footer">
                <button type="button" onclick="updateRec('<?php echo ROOT_URL; ?>/finance/PaymentResedite?updateRec=yes&ids='+ document.getElementById('id').innerHTML)" 
                class="btn success-color-dark text-white py-1 px-3 rounded "> <?=$op->lang("update");?> </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal add ==============================================================================================================-->
<div class="modal fade" id="dd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="AddModalLbl">

            </div>
            <div class="modal-footer">
                <button type="button" onclick="addRec('<?php echo ROOT_URL; ?>/finance/PaymentReseadd?addRec=yes')" class="btn success-color-dark text-white py-1 px-3 rounded "> <?=$op->lang("save");?> </button>
            </div>
        </div>
    </div>
</div>
<script>
    function getId(id) {
        document.getElementById("id").innerHTML = id;
    }

    function getIdv(val) {
        document.getElementById("ids").innerHTML = val;
    }
</script>