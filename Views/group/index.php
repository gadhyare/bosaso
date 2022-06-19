<?php

/**
 * fileName: رئيسية المجموعات
 */
?>
<div class="container mt-3">

  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4">
      <div class="card  ">
        <div class="card-header  text-dark font-weight-bold text-center p-1"> <?= $op->lang("add"); ?> <?= $op->lang("groups"); ?></div>
        <div class="card-body">

          <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
              <label> <?= $op->lang("group name"); ?> </label>
              <input type="text" name="group_name" class="form-control p-1  rounded-0" placeholder="<?= $op->lang("group name"); ?>">
            </div>

            <div class="form-group">
              <label><?= $op->lang("sttuse"); ?></label>
              <select name="active" id="" class="form-control p-1  rounded-0">
                <option value="1"><?= $op->lang("active"); ?></option>
                <option value="2"><?= $op->lang("non active"); ?></option>
              </select>
            </div>
            <?php if ($op->adAction('add')) : ?>
              <input type="submit" name="submit" value="<?= $op->lang("add"); ?>" class="btn primary-color-dark text-white px-3 py-2">
            <?php endif; ?>
            <a href="<?php echo ROOT_URL; ?>/group" class="btn danger-color-dark text-white p-2"><?= $op->lang("cancel"); ?></a>
          </form>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-8">
      <a href="<?php echo ROOT_URL; ?>/group/trash" class="btn primary-color-dark mt-2 float-left rounded-0 mb-2 py-1 px-3 text-white clreafix"><i class="fa fa-trash" aria-hidden="true"></i> </a>

      <table class="table table-bordered table-striped" id="myTable">
        <thead>
          <th class="p-1 bg-dark text-center"> <?= $op->lang("Serial"); ?></th>
          <th class="p-1 bg-dark text-center"> <?= $op->lang("group name"); ?></th>
          <th class="p-1 bg-dark text-center"> <?= $op->lang("status"); ?></th>
          <th class="p-1 bg-dark text-center"><?= $op->lang("operation"); ?></th>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php $items = json_decode($viewmodel); ?>
          <?php foreach ($items as $item) : ?>
            <?php $status = ($op->pro_field($item->active) == 1) ? $op->lang("active") : $op->lang("non active"); ?>
            <tr>
              <td class="p-1" style="font-size:80%"><?php echo $i++; ?></td>
              <td class="p-1" style="font-size:80%"><?php echo $item->group_name;  ?></td>
              <td class="p-1" style="font-size:80%"><?php echo $status; ?> </td>
              <input type="hidden" name="edit_id" value="<?php echo $item->grp_id; ?>">
              <td class="p-1" style="font-size:80%">
                <!-- Button trigger modal -->
                <button type="button" class="btn success-color-dark text-white rounded-0 py-1 px-2 px-3" data-toggle="modal" data-target="#exampleModal" onclick="showAllDetails('<?php echo ROOT_URL; ?>/group/update/<?php echo $item->grp_id; ?>', 'yui');getId('<?php echo $item->grp_id; ?>')">
                  <i class="fa fa-pencil"></i>
                </button>
                <?php if ($op->adAction('delete')) : ?>
                  <a href="<?php echo ROOT_URL; ?>/group/delete/<?php echo $item->grp_id; ?>" class="btn danger-color-dark text-white rounded-0 py-1 px-2 px-3"> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
                <?php endif; ?>
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
      <?php if ($op->adAction('update')) : ?>
        <div class="modal-footer">
          <button type="button" onclick="updateRec('<?php echo ROOT_URL; ?>/group/update?updateRec=yes&ids='+ document.getElementById('id').innerHTML)" class="btn success-color-dark text-white py-1 px-3 rounded "> <?= $op->lang("update"); ?> </button>
        </div>
      <?php endif; ?>
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