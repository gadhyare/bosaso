  <?php
    /**
     * fileName:    مؤهلات الموظف  
     */
    ?>
  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
      <?php $id = (isset($_GET['id'])) ? $_GET['id'] : ''; ?>
      <a href="<?php echo ROOT_URL; ?>/employees/empqualadd/<?php echo $id; ?>" class="btn danger-color-dark text-white px-3 py-2 float-left"> <?=$op->lang("add");?>  <i class="fa fa-plus"></i> </a>
   
      <div class="container-fluid "> 
      <br>
                  <br>
              <div class="text-center m-auto my-3" style="font-size: 22px !important;"> <?=$op->lang("employee Qualifications");?> </div>
                  <br>
                  <br>
                  <br>
                  <table class="table " id="myTable">
                      <thead>
                        <th scope="col" class="bg-light"> <?=$op->lang("Serial");?></th>
                        <th scope="col" class="bg-light"> <?=$op->lang("qualifier type");?></th>
                        <th scope="col" class="bg-light"> <?=$op->lang("qualification score");?></th>
                        <th scope="col" class="bg-light"> <?=$op->lang("eligible date");?></th>
                        <th scope="col" class="bg-light"> <?=$op->lang("qualifier side");?></th>
                        <th scope="col" class="bg-light"> <?=$op->lang("qualifier language");?></th>
                        <th scope="col" class="bg-light"> <?=$op->lang("notes about the qualifier");?></th>
                        <th scope="col" class="bg-light"> <?=$op->lang("operation");?></th>
                      </thead>
                      <?php $op = new Khas(); ?>
                      <?php $getData = $op->emp_qual($id); ?>
                      <?php $i = 1; ?>
                      <tbody>
                          <?php foreach ((array)$getData as $items) : ?>
                              <tr>
                                  <td> <?php echo $i++; ?> </td>
                                  <td> <?php echo $items['emp_qual_type']; ?> </td>
                                  <td> <?php echo $items['emp_qual_degree']; ?> </td>
                                  <td> <?php echo $items['emp_qual_year']; ?> </td>
                                  <td> <?php echo $items['emp_qual_hand']; ?> </td>
                                  <td> <?php echo $items['emp_qual_lang']; ?></td>
                                  <td> <?php echo $items['emp_qual_note']; ?></td>
                                  <td>
                                      <a href="<?php echo ROOT_URL; ?>/employees/empqualupdate/<?php echo $items['emp_qual_id']; ?>" class="btn success-color-dark text-white px-2 py-1" style="font-size:70% !important;"> <i class="fa fa-send"></i> </a>
                                      <a href="<?php echo ROOT_URL; ?>/employees/empqualdelete/<?php echo $items['emp_qual_id']; ?>?emp_id=<?php echo $items['emp_id']; ?>" class="btn danger-color-dark text-white px-2 py-1" style="font-size:70% !important;"> <i class="fa fa-trash-o"></i> </a>
                                  </td>
                              </tr>
                          <?php endforeach; ?>
                      </tbody>
                  </table> 
      </div>
  </form>