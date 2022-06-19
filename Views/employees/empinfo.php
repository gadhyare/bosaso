  <?php
  /**
   * fileName: معلومات الموظفين
   */
  ?>
  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <div class="container-fluid ">
      <a href="<?php echo ROOT_URL; ?>/employees/empinfoadd" class="btn primary-color-dark text-white  px-3 py-1   "> <i class="fa fa-plus" aria-hidden="true"></i> <?=$op->lang("new employee") ;?></a>
      <button type="submit" name="multiDel" id="multiDel" class="btn danger-color-dark text-white px-3 py-1"> <?=$op->lang("multi delete") ;?> </button>
    
        <br>
        <?php $i = 1; ?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col" class="bg-light"> <?=$op->lang("Serial");?> </th>
              <th scope="col" class="bg-light"> <?=$op->lang("select");?> </th>
              <th scope="col" class="bg-light"> <?=$op->lang("image");?>    </th>
              <th scope="col" class="bg-light"> <?=$op->lang("name");?> </th>
              <th scope="col" class="bg-light"> <?=$op->lang("gender");?>  </th>
              <th scope="col" class="bg-light"> <?=$op->lang("phones");?>  </th>
              <th scope="col" class="bg-light"> <?=$op->lang("register date");?>  </th>
              <th scope="col" class="bg-light"> <?=$op->lang("status");?> </th>
              <th scope="col" class="bg-light"> <?=$op->lang("operation");?> </th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php $op = new Khas(); ?>
            <?php foreach ((array) $viewmodel as $item) : ?>
              <tr>
                <td > <?php echo $i++; ?></td>
                <td > <input type="checkbox" name="chk[]" id="chk" value="<?php echo $item['emp_id']; ?>"> </td>
                <td class="p-1 text-center">
                  <img src="<?php echo ROOT_URL; ?>/uplouds/<?php echo ($item['emp_pic'] != "") ? $item['emp_pic'] : $op->siteSetting('siteLogo'); ?>"   style="height:50px; width:50px;" alt="">
                </td>
                <td > <?php echo $item['emp_name']; ?></td>
                <td > <?php echo ($item['emp_gender'] == 1) ? $op->lang("male")  :   $op->lang("female")  ; ?></td>
                <td > <?php echo  $item['emp_phones']; ?> </td>
                <td > <?php echo  $item['emp_regDate']; ?> </td>
                <td > <?php echo ($item['emp_stustatus'] == 1) ? $op->lang("active")  : $op->lang("non active") ; ?></td>
                <td >
                  <a href="<?php echo ROOT_URL; ?>/employees/empinfoupdate/<?php echo $item['emp_id']; ?>" class="btn success-color-dark py-2 text-white"><i class="fa fa-pencil"></i></a>
                  <a href="<?php echo ROOT_URL; ?>/employees/empinfodelete/<?php echo $item['emp_id']; ?>" class="btn danger-color-dark py-2 text-white"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div> 
  </form>