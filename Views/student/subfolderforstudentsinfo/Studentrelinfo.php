<a href="<?php echo ROOT_URL; ?>/student/Studentrel/<?php echo $_GET['id']; ?>" target="_blank" class="btn success-color-dark text-white mt-2 float-left rounded-0 mb-2 p-2">
  <i class="fa fa-plus" aria-hidden="true"></i> <?=$op->lang("Add a relative to the student");?></a>
<table class="table tables  ">
  <?php $ops = new Khas(); ?>
  <thead>
    <tr>
      <th class="p-1 bg-dark text-white"> <?= $op->lang("Serial"); ?></th>
      <th class="p-1 bg-dark text-white"> <?= $op->lang("name"); ?></th>
      <th class="p-1 bg-dark text-white"><?= $op->lang("relative relation"); ?> </th>
      <th class="p-1 bg-dark text-white"> <?= $op->lang("Degree of relationship"); ?></th>
      <th class="p-1 bg-dark text-white"><?= $op->lang("address"); ?></th>
      <th class="p-1 bg-dark text-white"> <?= $op->lang("email"); ?> </th>  
      <th class="p-1 bg-dark text-white" colspan="2"><?= $op->lang("phones"); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    <?php $rt = $ops->getStuRelInfo(); ?>
    <?php foreach ((array) $rt as $relInfo) : ?>
      <tr>
        <td class="p-1"><?php echo $i; ?></td>
        <td class="p-1" style="font-size:90%;"><?php echo $relInfo['rel_name'];  ?></td>
        <td class="p-1">

          <?php echo $relInfo['rel_type'];; ?> </td>
        <td class="p-1"><?php echo $relInfo['rel_lev'];; ?> </td>
        <td class="p-1"><?php echo $relInfo['rel_Address'];; ?> </td>
        <td class="p-1"><?php echo $relInfo['rel_email'];; ?> </td>
        <td class="p-1"><?php echo $relInfo['rel_phones'];; ?> </td>
        <td class="p-1 text-left">
          <a href="<?php echo ROOT_URL; ?>/student/Studentrelupdate/<?php echo $relInfo['Rel_id']; ?>" target="_blanck" class="px-2 success-color-dark text-white ml-1"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>
          <a href="<?php echo ROOT_URL; ?>/student/Studentreldel/<?php echo $relInfo['Rel_id']; ?>" target="_blanck" class="px-2 danger-color-dark text-white ml-1"> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
        </td>
      </tr>
    <?php
      $i++;
    endforeach; ?>
  </tbody>
</table>