<?php

/**
 * fileName: رئيسية دروس الدورات
 */
?>
<div class="container   m-auto z-depth-2 text-right">
  <br>
  <?php $op = new Khas(); ?>
  <?php if (isset($_GET['id']) && $_GET['id'] != "") : ?> <div class="alert alert-info py-2 rounded-0  text-center"> <?php echo $op->get_courses_info_txt($_GET['id'],  'cou_title'); ?> </div>
    <a href="<?php echo ROOT_URL; ?>/coulesson/add/<?php echo $_GET['id']; ?>" class="btn success-color-dark mt-2 float-left rounded-0 mb-2 py-1 px-3 text-white">
      <i class="fa fa-plus" aria-hidden="true"></i> اضافة دروس جديدة </a>

  <?php endif; ?>
  <table class="table table-bordered table-striped" id="myTable">
    <thead>
      <th class="success-color-dark  text-center"> المسلسل</th>
      <th class="success-color-dark  text-center"> الدرس </th>
      <th class="success-color-dark  text-center"> العمليات </th>
    </thead>
    <tbody>
      <?php if ($viewmodel) : ?>
        <?php $i = 1; ?>
        <?php $items = json_decode($viewmodel); ?>
        <?php foreach ($items as $item) : ?>
          <tr>
            <td class="p-1" style="font-size:80%"><?php echo $i++; ?></td>
            <td class="p-1" style="font-size:80%"><?php echo $item->les_link;  ?></td>
            <td class="p-1" style="font-size:80%">
              <form action="<?php echo ROOT_URL; ?>/coulesson/delete/<?php echo $item->les_id; ?>" method="post" enctype="multipart/form-data" onSubmit="return confirm('هل أنت متأكد من القيام بالعملية التالية؟');">
                <button name="delete_items" type="submit" class="btn danger-color-dark text-white rounded-0 p-0"> <i class="fa fa-trash-o p-2 " aria-hidden="true"></i> </button>
                <a href="<?php echo ROOT_URL; ?>/coulesson/update/<?php echo $item->les_id; ?>" class="btn primary-color-dark text-white rounded-0 p-2 " style="font-size:80%"> <i class="fa fa-pencil p-0" aria-hidden="true"></i> </a>
                <a href="<?php echo ROOT_URL; ?>/coulesson/show/<?php echo $item->les_id; ?>" class="btn success-color-dark text-white rounded-0 p-2 " style="font-size:80%"> <i class="fa fa-eye " aria-hidden="true"></i> </a>

              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>
 