<?php

/**
 * fileName:  رئيسية المؤهلات العلمية للطلبة
 */
?>
<a href="<?php echo ROOT_URL; ?>/student/Studentacademic/<?php echo $_GET['id']; ?>?stu_id=<?php echo $_GET['id']; ?>" target="_blank" class="btn success-color-dark text-white mt-2 float-left rounded-0 mb-2 p-2">
  <i class="fa fa-plus" aria-hidden="true"></i> <?=$op->lang("Add a new qualification");?>  </a>
<table class="table tables  ">
  <?php $ops = new Khas(); ?>
  <thead>
    <tr>
      <th class="p-1 bg-dark text-white"> <?=$op->lang("Serial")?></th>
      <th class="p-1 bg-dark text-white"> <?=$op->lang("Qualification" )?></th>
      <th class="p-1 bg-dark text-white"> <?=$op->lang("Eligibility date" )?></th>
      <th class="p-1 bg-dark text-white"> <?=$op->lang("Qualifier" )?></th>
      <th class="p-1 bg-dark text-white"> <?=$op->lang("Qualification language" )?></th>
      <th class="p-1 bg-dark text-white"> <?=$op->lang("operation" )?></th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    <?php $rt = $ops->getStuRelIquali(); ?>
    <?php foreach ((array) $rt as $edu_eql_ifo) : ?>
      <tr>
        <td class="p-1"><?php echo $i; ?></td>
        <td class="p-1" style="font-size:90%;"><?php echo $edu_eql_ifo['Edu_quali'];  ?></td>
        <td class="p-1"> <?php echo $edu_eql_ifo['Edu_year']; ?> </td>
        <td class="p-1"><?php echo $edu_eql_ifo['Edu_lang']; ?> </td>
        <td class="p-1"><?php echo $edu_eql_ifo['Edu_Issuer']; ?> </td>
        <td class="p-1 text-center">
          <a href="<?php echo ROOT_URL; ?>/student/Studentacademicupdate/<?php echo $edu_eql_ifo['Edu_id']; ?>?stu_id=<?php echo $_GET['id']; ?>" target="_blanck" class="px-2 success-color-dark text-white ml-1"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>
          <a href="<?php echo ROOT_URL; ?>/student/Studentacademicdel/<?php echo $edu_eql_ifo['Edu_id']; ?>?stu_id=<?php echo $_GET['id']; ?>" target="_blanck" class="px-2 danger-color-dark text-white ml-1"> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
        </td>
      </tr>
    <?php
      $i++;
    endforeach; ?>
  </tbody>
</table>