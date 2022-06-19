<?php

/**
 * fileName: رئيسية المستويات
 */
?>
<div class="container mt-3">

  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-3">
      <div class="card  ">
        <div class="card-header  text-dark font-weight-bold text-center p-1"> <?= $op->lang("add"); ?> <?= $op->lang("levels"); ?> </div>
        <div class="card-body">
          <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
              <label><?= $op->lang("level name"); ?></label>
              <input type="text" name="level_name" class="form-control p-1  rounded-0" placeholder="<?= $op->lang("level name"); ?>">
            </div>
            <div class="form-group">
              <label><?= $op->lang("status"); ?></label>
              <select name="active" id="" class="form-control p-1  rounded-0">
                <option value="1"><?= $op->lang("active"); ?></option>
                <option value="2"><?= $op->lang("non active"); ?></option>
              </select>
            </div>
            <input type="submit" name="submit" value="<?= $op->lang("add"); ?>" class="btn primary-color-dark text-white px-3 py-2">
            <a href="<?php echo ROOT_URL; ?>/level" class="btn danger-color-dark text-white p-2"><?= $op->lang("cancel"); ?></a>
          </form>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-9">
      <table class="table table-bordered table-striped ">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
          <button type="submit" name="btns" class="btn danger-color-dark text-white px-3 py-1"> <?= $op->lang("multi delete"); ?> </button>
          <a href="<?php echo ROOT_URL; ?>/level/trash" class="btn primary-color-dark mt-2 float-left rounded-0 mb-2 py-1 px-3 text-white clreafix"><i class="fa fa-trash" aria-hidden="true"></i> </a>
          <br>
          <table class="table table-bordered" id="myTable">
            <thead>
              <tr>
                <th class="p-1 bg-dark text-center"> <?= $op->lang("Serial"); ?></th>
                <th class="p-1 bg-dark text-center"> <?= $op->lang("level name"); ?></th>
                <th class="p-1 bg-dark text-center"> <?= $op->lang("status"); ?></th>
                <th class="p-1 bg-dark text-center"><?= $op->lang("operation"); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($viewmodel as $item) : ?>
                <?php $status = ($op->pro_field($item['active']) == 1) ? $op->lang("active") : $op->lang("non active"); ?>
                <tr>
                  <td class="p-1">
                    <?php echo $i++; ?>
                    <input type="checkbox" name="chid[]" id="chid" value="<?php echo $item['lev_id']; ?>">
                  </td>
                  <td class="p-1"><?php echo $item['level_name'];  ?></td>
                  <td class="p-1"><?php echo $status; ?> </td>
                  <td class="p-1">
                    <button type="button" class="btn primary-color-dark text-white rounded-0 py-1 px-2 px-3 " data-toggle="modal" data-target="#exampleModal" onclick="showAllDetails('<?php echo ROOT_URL; ?>/level/update/<?php echo $item['lev_id']; ?>', 'yui');getId('<?php echo $item['lev_id']; ?>')">
                      <i class="fa fa-pencil"></i>
                    </button>
                    <a href="<?php echo ROOT_URL; ?>/level/delete/<?php echo $item['lev_id']; ?>" class="btn danger-color-dark text-white rounded-0 py-1 px-2 px-3 "> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
                  </td>
                </tr>
              <?php endforeach; ?>

            </tbody>
          </table>
    </div>
    </form>


    <!-- Modal edit ==============================================================================================================-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div id="id" style="display:none;"></div>
          <div class="modal-body" id='yui'>

          </div>
          <div class="modal-footer">
            <button type="button" onclick="updateRec('<?php echo ROOT_URL; ?>/level/update?updateRec=yes&ids='+ document.getElementById('id').innerHTML)" class="btn success-color-dark text-white py-1 px-3 rounded "> <?= $op->lang("update"); ?> </button>
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