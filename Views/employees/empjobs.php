  <?php
    /**
     * fileName:   معلومات  وظيفة الموظف  
     */
    ?>
  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
      <?php $id = (isset($_GET['id'])) ? $_GET['id'] : ''; ?>
      <a href="<?php echo ROOT_URL; ?>/employees/empjobsadd/<?php echo $id; ?>" class="btn danger-color-dark text-white px-3 py-2 float-left"> <i class="fa fa-plus"></i> <?=$op->lang("add");?>   </a>
      <div class="clearfix"></div>

      <div class="container-fluid"> 
                  <table class="table myTable" id="myTable1">
                      <thead>
                          <th scope="col" class=" bg-light"> <?=$op->lang("Serial");?> </th>
                          <th scope="col" class=" bg-light"> <?=$op->lang("job title");?> </th>
                          <th scope="col" class=" bg-light"> <?=$op->lang("career section");?> </th>
                          <th scope="col" class=" bg-light"> <?=$op->lang("career grades");?> </th>
                          <th scope="col" class=" bg-light"> <?=$op->lang("register date");?> </th>
                          <th scope="col" class=" bg-light"> <?=$op->lang("salary");?> </th>
                          <th scope="col" class=" bg-light"> <?=$op->lang("date of leaving employment");?></th>
                          <th scope="col" class=" bg-light"> <?=$op->lang("notes about functionality");?> </th>
                          <th scope="col" class=" bg-light"> <?=$op->lang("operation");?> </th>
                      </thead>
                      <?php $op = new Khas(); ?>
                      <?php $getData = $op->empjobs($id); ?>
                      <?php $i = 1; ?>
                      <tbody>
                          <?php foreach ((array)$getData as $items) : ?>
                              <tr>
                                  <td> <?php echo $i++; ?> </td>
                                  <td> <?php echo $items['empjob_title']; ?> </td>
                                  <td> <?php echo $op->getSelEmpSecByIdTxt($items['em_sec_id']); ?> </td>
                                  <td> <?php echo $op->getSelEmpLevByIdTxt($items['em_lev_id']); ?> </td>
                                  <td> <?php echo $items['empjob_strdate']; ?> </td>
                                  <td> <?php echo $items['empjob_sellary']; ?> </td>
                                  <td> <?php echo $items['empjob_levdate']; ?></td>
                                  <td> <?php echo $items['empjob_note']; ?></td>
                                  <td>
                                      <a href="<?php echo ROOT_URL; ?>/employees/empjobsupdate/<?php echo $items['empjob_id']; ?>?emp_id=<?php echo $items['emp_id']; ?>" class="btn success-color-dark text-white px-2 py-1" style="font-size:70% !important;"> <i class="fa fa-send"></i> </ a>
                                      <a href="<?php echo ROOT_URL; ?>/employees/empjobsdelete/<?php echo $items['empjob_id']; ?>?emp_id=<?php echo $items['emp_id']; ?>" class="btn danger-color-dark text-white px-2 py-1" style="font-size:70% !important;"> <i class="fa fa-trash-o"></i> </a>
                                  </td>
                              </tr>
                          <?php endforeach; ?>
                      </tbody>
                  </table> 
      </div>
  </form>