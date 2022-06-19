  <?php
    /**
     * fileName: خبرات سابقة للموظف
     */
    ?>
 <?php $op = new Khas(); ?>
 <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
      <?php $id = (isset($_GET['id'])) ? $_GET['id'] : ''; ?>
   <a href="<?php echo ROOT_URL; ?>/employees/empexpeadd/<?php echo $id; ?>" class="btn danger-color-dark text-white px-3 py-2 float-left"> <?=$op->lang("add");?>  </a>
            
      <div class="container-fluid ">  
     
              <br>
                  <br>
              <div class="text-center m-auto my-3" style="font-size: 22px !important;"> <?=$op->lang("the employee's previous experiences");?> </div>
                  <br>
                  <br>
                  <br>
                 
              <table class="table " id="myTable">
                      <thead>
                          <th scope="col" class="bg-light"><?=$op->lang("Serial");?> </th>
                          <th scope="col" class="bg-light"><?=$op->lang("employer");?></th>
                          <th scope="col" class="bg-light"><?=$op->lang("register date");?></th>
                          <th scope="col" class="bg-light"><?=$op->lang("job title");?></th>
                          <th scope="col" class="bg-light"><?=$op->lang("career grades");?></th>
                          <th scope="col" class="bg-light"><?=$op->lang("date of leaving work");?></th>
                          <th scope="col" class="bg-light"><?=$op->lang("notes on previous work");?></th>
                          <th scope="col" class="bg-light"><?=$op->lang("operation");?></th>
                      </thead>
                      <?php $op = new Khas(); ?>
                      <?php $getData = $op->empexpe($id); ?>
                      <?php $i = 1; ?>
                      <tbody>
                          <?php foreach ((array)$getData as $items) : ?>
                              <tr>
                                  <td> <?php echo $i++; ?> </td>
                                  <td> <?php echo $items['empexpe_est']; ?> </td>
                                  <td> <?php echo $items['empexpe_strdate']; ?> </td>
                                  <td> <?php echo $items['empexpe_title']; ?> </td>
                                  <td> <?php echo $items['empexpe_degree']; ?> </td>
                                  <td> <?php echo $items['empexpe_levdate']; ?></td>
                                  <td> <?php echo $items['empexpe_note']; ?></td>
                                  <td>
                                      <a href="<?php echo ROOT_URL; ?>/employees/empexpeupdate/<?php echo $items['empexpe_id']; ?>?emp_id=<?php echo $items['emp_id']; ?>" class="btn success-color-dark text-white px-2 py-1" style="font-size:70% !important;"> <i class="fa fa-send"></i> </a>
                                      <a href="<?php echo ROOT_URL; ?>/employees/empexpedelete/<?php echo $items['empexpe_id']; ?>?emp_id=<?php echo $items['emp_id']; ?>" class="btn danger-color-dark text-white px-2 py-1" style="font-size:70% !important;"> <i class="fa fa-trash-o"></i> </a>
                                  </td>
                              </tr>
                          <?php endforeach; ?>
                      </tbody>
                  </table>  
      </div> 
 </form>