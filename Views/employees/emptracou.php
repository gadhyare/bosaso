  <?php
    /**
     * fileName:    دورات الموظف  
     */
    ?>
   
  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
      
      <a href="<?php echo ROOT_URL; ?>/employees/emptracouadd/<?php echo $id; ?>" class="btn danger-color-dark text-white px-3 py-2 float-left"> <?=$op->lang("add");?>    </a>
      <br>
  
      <div class="container-fluid "> 
      <br>
                  <br>
              <div class="text-center m-auto my-3" style="font-size: 22px !important;"> <?=$op->lang("employee courses");?> </div>
                  <br>
                  <br>
                  <br>
                  <table class="table  " id="myTable">
                      <thead>
                          <th scope="col" class="bg-light">  <?=$op->lang("Serial");?> </th>
                          <th scope="col" class="bg-light"> <?=$op->lang("course title");?></th>
                          <th scope="col" class="bg-light"> <?=$op->lang("course date");?> </th>
                          <th scope="col" class="bg-light"> <?=$op->lang("organisers");?> </th>
                          <th scope="col" class="bg-light"> <?=$op->lang("duration of the course");?></th>
                          <th scope="col" class="bg-light"> <?=$op->lang("operation");?> </th>
                      </thead>
                      <?php $op = new Khas(); ?>
                      <?php $getData = $op->emptracou($id); ?>
                      <?php $i = 1; ?>
                      <tbody>
                          <?php foreach ((array)$getData as $items) : ?>
                              <tr>
                                  <td class="text-dark "> <?php echo $i++; ?> </td>
                                  <td class="text-dark "> <?php echo $items['tra_cou_title']; ?> </td>
                                  <td class="text-dark "> <?php echo $items['tra_cou_date']; ?> </td>
                                  <td class="text-dark "> <?php echo $items['tra_cou_est']; ?> </td>
                                  <td class="text-dark "> <?php echo $items['tra_cou_due']; ?> </td>
                                  <td class="text-dark ">
                                      <a href="<?php echo ROOT_URL; ?>/employees/emptracouupdate/<?php echo $items['tra_cou_id']; ?>?emp_id=<?php echo $items['emp_id']; ?>" class="btn success-color-dark text-white px-2 py-1" style="font-size:70% !important;"> <i class="fa fa-send"></i> </a>
                                      <a href="<?php echo ROOT_URL; ?>/employees/emptracoudelete/<?php echo $items['tra_cou_id']; ?>?emp_id=<?php echo $items['emp_id']; ?>" class="btn danger-color-dark text-white px-2 py-1" style="font-size:70% !important;"> <i class="fa fa-trash-o"></i> </a>
                                  </td>
                              </tr>
                          <?php endforeach; ?>
                      </tbody>
                  </table>  
    </div>
       
  </form>