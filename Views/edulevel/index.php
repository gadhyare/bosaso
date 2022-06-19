<?php

/**
 * fileName: رئيسية المراجل الدراسية
 */
?>
<div class="container mt-5">
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-3">
      <?php $op = new khas(); ?>
      <div class="card  ">
        <div class="card-header  text-dark font-weight-bold text-center p-1"> <?= $op->lang("add"); ?> <?=$op->lang("educational level");?> </div>
        <div class="card-body">

          <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
              <label><?= $op->lang("educational level"); ?></label>
              <input type="text" name="edulev_name" class="form-control p-1  rounded-0" value="<?php echo $op->setPosts('edulev_name'); ?>" placeholder="<?= $op->lang("educational level"); ?>">
            </div>
            <div class="form-group">
              <label><?= $op->lang("code"); ?></label>
              <input type="text" name="code" class="form-control p-1  rounded-0" value="<?php echo $op->setPosts('code'); ?>">
            </div>
            <div class="form-group">
              <label><?= $op->lang("status"); ?></label>
              <select name="active" id="" class="form-control p-1  rounded-0">
                <option value="1"><?= $op->lang("active"); ?></option>
                <option value="2"><?= $op->lang("non active"); ?></option>
              </select>
            </div>
            <input type="submit" name="submitAdd" value="<?= $op->lang("add"); ?>" class="btn primary-color-dark text-white px-3 py-2">
            <a href="<?php echo ROOT_URL; ?>/edulevel" class="btn danger-color-dark text-white p-2"><?= $op->lang("cancel"); ?></a>
          </form>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-9">
      <a href="<?php echo ROOT_URL; ?>/edulevel/trash" class="btn primary-color-dark mt-2 float-left rounded-0 mb-2 py-1 px-3 text-white clreafix"><i class="fa fa-trash" aria-hidden="true"></i> </a>

      <table class="table  table-bordered table-striped">
        <thead>
          <tr>
            <th class="py-0 px-1 bg-dark"> <?= $op->lang("Serial"); ?></th>
            <th class="py-0 px-1 bg-dark"> <?= $op->lang("educational level"); ?></th>
            <th class="py-0 px-1 bg-dark"> <?= $op->lang("code"); ?> </th>
            <th class="py-0 px-1 bg-dark"> <?= $op->lang("status"); ?></th>
            <th class="py-0 px-1 bg-dark" colspan="2"><?= $op->lang("operation"); ?></th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($viewmodel as $item) : ?>
            <?php $status = ($op->pro_field($item['active']) == 1) ? $op->lang("active") : $op->lang("non active"); ?>
            <tr>
              <td class="py-0 px-1" style="font-size:80%"><?php echo $i++; ?></td>
              <td class="py-0 px-1" style="font-size:80%"><?php echo $item['edulev_name'];  ?></td>
              <td class="py-0 px-1" style="font-size:80%"><?php echo $item['code'];  ?></td>
              <td class="py-0 px-1" style="font-size:80%"><?php echo $status; ?> </td>
              <input type="hidden" name="edit_id" value="<?php echo $item['edulev_id']; ?>">
              <td class="py-0 px-1" style="font-size:80%">
                <button type="button" class="btn primary-color-dark text-white rounded-0 p-1" data-toggle="modal" data-target="#exampleModal" onclick="showAllDetails('<?php echo ROOT_URL; ?>/edulevel/update/<?php echo $item['edulev_id']; ?>', 'yui');getId('<?php echo $item['edulev_id']; ?>')">
                  <i class="fa fa-pencil"></i>
                </button>
                <a href="<?php echo ROOT_URL; ?>/edulevel/delete/<?php echo $item['edulev_id']; ?>" class="btn danger-color-dark text-white rounded-0 p-1 "> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Modal edit ==============================================================================================================-->
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog bg-dark " role="document">
    <div class="modal-content">
      <div id="id" style='display:none'></div>
      <div class="modal-body" id='yui'>

      </div>
      <div class="modal-footer">
        <button type="button" onclick="updateRec('<?php echo ROOT_URL; ?>/edulevel/update?updateRec=yes&ids='+ document.getElementById('id').innerHTML)" class="btn success-color-dark text-white py-1 px-3 rounded "> <?=   $op->lang("update"); ?> </button>
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