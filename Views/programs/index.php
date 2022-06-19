<?php

/**
 * fileName: رئيسية البرامج الدراسية
 */
?>
<a href="<?php echo ROOT_URL; ?>/downloads/subjects_list.xlsx" target="_blank" class="btn  danger-color-dark text-white mt-2 float-right rounded-0 mb-2 py-1 px-3"> <i class="fa fa-plus" aria-hidden="true"></i> <?= $op->lang("Download the Lists of Materials form"); ?> </a>
<button type="button" class="btn primary-color-dark mt-2 float-left rounded-0 mb-2 py-1 px-3 text-white" data-toggle="modal" data-target="#dd" onclick="showDetails('<?php echo ROOT_URL; ?>/programs/add/', 'AddModalLbl')">
  <i class="fa fa-plus" aria-hidden="true"></i> <?= $op->lang("add"); ?> <?= $op->lang("study program"); ?>
</button>
<?php $op = new Khas(); ?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
  <table class="table  table-striped table-bordered  " id="myTable">
    <thead>
      <th class="p-1 bg-dark" style="font-size:75% !important"> <?= $op->lang("Serial"); ?></th>
      <th class="p-1 bg-dark" style="font-size:75%!important"> <?= $op->lang("academic"); ?></th>
      <th class="p-1 bg-dark" style="font-size:75% !important"> <?= $op->lang("college"); ?></th>
      <th class="p-1 bg-dark" style="font-size:75% !important"> <?= $op->lang("academic Division"); ?></th>
      <th class="p-1 bg-dark" style="font-size:75% !important"> <?= $op->lang("academic Code"); ?></th>
      <th class="p-1 bg-dark" style="font-size:75% !important"> <?= $op->lang("status"); ?></th>
      <th class="p-1 bg-dark" style="font-size:75% !important"> <?= $op->lang("operation"); ?></th>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      <?php foreach ($op->FullProgInfolisttxt() as $item) : ?>
        <?php $status = ($op->pro_field($item['active']) == 1) ? $op->lang("active") : $op->lang("non active"); ?>
        <tr>
          <td class="py-0 px-1 " style="font-size:75% !important "><?php echo $i++; ?></td>
          <td class="py-0 px-1 " style="font-size:75% !important ">
            <?php echo $op->GetSeleduleveltxt($item['edulev_id']); ?>
          </td>
          <td class="py-0 px-1 " style="font-size:75% !important ">
            <?php echo  $op->GetSelfacultytxt($item['fac_id']); ?>
          </td>
          <td class="py-0 px-1 " style="font-size:75% !important ">
            <?php echo $op->GetSelacademicstxt($item['academics_id']); ?>
          </td>
          <td class="py-0 px-1 text-left" style="font-size:75% !important ">
            <?php echo $op->GetSeledulevelInfotxt($item['edulev_id'], 'code') .
              $op->GetSelfacultyinfotxt($item['fac_id'], 'code') .
              $op->GetSelacademicsInfotxt($item['academics_id'], 'code'); ?>

          </td>
          <td class="py-0 px-1 " style="font-size:75% !important "><?php echo $status; ?> </td>
          <td class="py-0 px-1 " style="font-size:75% !important ">
            <?php if ($op->chk_prog_Permition($_SESSION['log_id'], $item['prog_id'])) : ?>
              <!-- Button trigger modal -->
              <button type="button" class="btn success-color-dark    text-white rounded-0 py-1 px-3 my-0" style="font-size:75%" data-toggle="modal" data-target="#exampleModal" onclick="showAllDetails('<?php echo ROOT_URL; ?>/programs/update/<?php echo $item['prog_id']; ?>', 'yui');getId('<?php echo $item['prog_id']; ?>')">
                <i class="fa fa-pencil"></i>
              </button>

              <a href="<?php echo ROOT_URL; ?>/subject/ordersubByfacl?edulev_id=<?php echo $item['edulev_id']; ?>&pro_id=<?php echo $item['prog_id']; ?> " class="btn pink darken-3 text-white rounded-0 py-1 px-3 my-0" style="font-size:75%"> Program Material</a>
              <a href="<?php echo ROOT_URL; ?>/programs/delete/<?php echo $item['prog_id']; ?>" class="btn danger-color-dark text-white rounded-0 py-1 px-3 my-0" style="font-size:75%"> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
              <button type="button" class="btn unique-color-dark mt-2 rounded-0 mb-2 py-1 px-3 text-white" style="font-size:75%" data-toggle=" modal" data-target="#prosub" onclick="showDetails('<?php echo ROOT_URL; ?>/programs/prosub/?prog_id=<?php echo $item['prog_id']; ?>', 'Addprosub ');getIdv('<?php echo $item['prog_id']; ?>')">
                <?= $op->lang("add"); ?> item
              </button>
              <a href="<?php echo ROOT_URL; ?>/subject/ordersubByfacl?edulev_id=<?php echo $item['edulev_id']; ?>&pro_id=<?php echo $item['prog_id']; ?> " class="btn pink darken-3 text-white rounded-0 py-1 px-3 my-0" style="font-size:75%"> Program Material</a>
              <a href="<?php echo ROOT_URL; ?>/subject/uploadsujectlist?edulev_id=<?php echo $item['edulev_id']; ?>&pro_id=<?php echo $item['prog_id']; ?> " class="btn brown darken-4 text-white rounded-0 py-1 px-3 my-0" style="font-size:75%"> upload program material</a>
              <?php if (!$op->get_report_type($item['prog_id'])) : ?>
                <a href="<?php echo ROOT_URL; ?>/programs/setprogreport?selprog_id=<?php echo $item['prog_id']; ?>" class="btn primary-color-dark text-white rounded-0 py-1 px-3 my-0" style="font-size:75%"> set custom report</a>
              <?php else : ?>

                <a href="<?php echo ROOT_URL; ?>/programs/setprogreport?upselprog_id=<?php echo $item['prog_id']; ?>" class="btn danger-color-dark text-white rounded-0 py-1 px-2 my-0" style="font-size:75%"> <?= $op->lang("cancel"); ?> Custom Report</a>
              <?php endif; ?>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>

    </tbody>
  </table>
</form>

<!-- Modal edit ==============================================================================================================-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div id="id" style="display:none;"></div>
      <div class="modal-body" id='yui'>

      </div>
      <div class="modal-footer">
        <button type="button" onclick="updateRec('<?php echo ROOT_URL; ?>/programs/update?updateRec=yes&ids='+ document.getElementById('id').innerHTML)" class="btn success-color-dark text-white py-1 px-3 rounded "> <?= $op->lang("update"); ?> </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal add ==============================================================================================================-->
<div class="modal fade" id="prosub" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div id="ids" style="display:none;"></div>
      <div class="modal-body" id="Addprosub">

      </div>
      <div class="modal-footer">
        <button type="button" onclick="addRec('<?php echo ROOT_URL; ?>/programs/prosub/?prog_id='+ document.getElementById('ids').innerHTML +'&addRec=yes')" class="btn success-color-dark text-white py-1 px-3 rounded "> <?= $op->lang("save"); ?> </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal add ==============================================================================================================-->
<div class="modal fade" id="dd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body" id="AddModalLbl">

      </div>
      <div class="modal-footer">
        <button type="button" onclick="addRec('<?php echo ROOT_URL; ?>/programs/add?addRec=yes')" class="btn success-color-dark text-white py-1 px-3 rounded "> <?= $op->lang("save"); ?> </button>
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