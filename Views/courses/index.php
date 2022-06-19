<?php

/**
 * fileName: رئيسية الدورات
 */
?>

<div class="container   m-auto z-depth-2 text-right">
  <a href="<?php echo ROOT_URL; ?>/courses/add" class="btn primary-color-dark mt-2 float-left rounded-0 mb-2 py-1 px-3 text-white">
    <i class="fa fa-plus" aria-hidden="true"></i> اضافة دورة جديدة </a>
  <table class="table table-bordered table-striped" id="myTable">
    <thead>
      <th class="primary-color-dark  text-center"> المسلسل</th>
      <th class="primary-color-dark  text-center"> عنوان الدورة </th>
      <th class="primary-color-dark  text-center"> البداية </th>
      <th class="primary-color-dark  text-center"> النهاية </th>
      <th class="primary-color-dark  text-center"> الحالة</th>
      <th class="primary-color-dark  text-center">العمليات</th>
    </thead>
    <tbody>
      <?php if ($viewmodel) : ?>
        <?php $i = 1; ?>
        <?php $items = json_decode($viewmodel); ?>
        <?php foreach ($items as $item) : ?>
          <?php $status = ($item->cou_status == 1) ? 'مفعل' : 'غير مفعل'; ?>
          <tr>
            <td class="p-1" style="font-size:80%"><?php echo $i++; ?></td>
            <td class="p-1" style="font-size:80%"><?php echo $item->cou_title;  ?></td>
            <td class="p-1" style="font-size:80%"><?php echo $item->cou_startdate;  ?></td>
            <td class="p-1" style="font-size:80%"><?php echo $item->cou_enddate;  ?></td>
            <td class="p-1" style="font-size:80%"><?php echo $status; ?> </td>

            <td class="p-1" style="font-size:80%">
              <a href="<?php echo ROOT_URL; ?>/courses/update/<?php echo $item->cou_id; ?>" class="btn primary-color-dark text-white rounded-0 p-2 " style="font-size:80%"> <i class="fa fa-pencil p-0" aria-hidden="true"></i> </a>
              <a href="<?php echo ROOT_URL; ?>/courses/delete/<?php echo $item->cou_id; ?>" class="btn danger-color-dark text-white rounded-0 p-2 " style="font-size:80%"> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
              <a href="<?php echo ROOT_URL; ?>/coulesson/index/<?php echo $item->cou_id; ?>" class="btn success-color-dark text-white rounded-0 p-2 " style="font-size:80%"> <i class="fa fa-eye" aria-hidden="true"></i> </a>
            </td>
          </tr>
        <?php endforeach; ?>

      <?php endif; ?>
    </tbody>
  </table>
</div>