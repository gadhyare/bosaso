  <?php
    /**
     * fileName: ملفات خاصة بالموظف
     */
    ?>
  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
      <?php $id = (isset($_GET['id'])) ? $_GET['id'] : ''; ?>
      <a href="<?php echo ROOT_URL; ?>/employees/empfilesadd/<?php echo $id; ?>" class="btn danger-color-dark text-white px-3 py-2 float-left"> <?=$op->lang("add");?> ملف جديد </a>
      <div class="clearfix"></div>

      <div class="container-fluid  m-auto bg-white text-right z-depth-0"> 
              <div class="py-2 px-1 text-center "> <?=$op->lang("employee files");?> </div> 
                  <table class="table  striped-table border-0">
                      <thead>
                          <th scope="col" class="bg-light"> <?=$op->lang("Serial");?> </th>
                          <th scope="col" class="bg-light"> <?=$op->lang("title");?> </th>
                          <th scope="col" class="bg-light"> <?=$op->lang("type");?> </th>
                          <th scope="col" class="bg-light"> <?=$op->lang("upload date");?> </th>
                          <th scope="col" class="bg-light"> <?=$op->lang("link");?> </th>
                          <th scope="col" class="bg-light"> <?=$op->lang("operation");?> </th>
                      </thead>
                      <?php $op = new Khas(); ?>
                      <?php $getData = $op->empfile($id); ?>
                      <?php $i = 1; ?>
                      <tbody>
                          <?php foreach ((array)$getData as $items) : ?>
                              <tr>
                                  <td> <?php echo $i++; ?> </td>
                                  <td> <?php echo $items['emp_file_title']; ?> </td>
                                  <td> <?php echo $items['emp_file_type']; ?> </td>
                                  <td> <?php echo $items['emp_file_date']; ?> </td>
                                  <td> <a href="<?php echo ROOT_URL; ?>/uplouds/<?php echo    $items['emp_file_link']; ?>"> <?=$op->lang("open file");?> </a> </td>
                                  <td>
                                      <a href="<?php echo ROOT_URL; ?>/employees/empfilesupdate/<?php echo $items['emp_file_id']; ?>?emp_id=<?php echo $items['emp_id']; ?>" class="btn success-color-dark text-white px-2 py-1" style="font-size:70% !important;"> <i class="fa fa-send"></i> </a>
                                      <a href="<?php echo ROOT_URL; ?>/employees/empfilesdelete/<?php echo $items['emp_file_id']; ?>?emp_id=<?php echo $items['emp_id']; ?>" class="btn danger-color-dark text-white px-2 py-1" style="font-size:70% !important;"> <i class="fa fa-trash-o"></i> </a>
                                  </td>
                              </tr>
                          <?php endforeach; ?>
                      </tbody>
                  </table> 
      </div>
  </form>