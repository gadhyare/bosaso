    <?php
    /**
     * fileName: رئيسية الأعضاء
     */
    ?>
    <a href="<?php echo ROOT_URL; ?>/user/register" class="btn primary-color-dark mt-2 float-left rounded-0 mb-2 py-1 px-3 text-white"> <i class="fa fa-plus" aria-hidden="true"></i> <?= $op->lang("add"); ?> عضو جديد </a>

    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
      <table class="table tables ">
        <thead>
          <tr>
            <th class="p-1 bg-dark"><?= $op->lang("Serial"); ?></th>
            <th class="p-1 bg-dark"> <?= $op->lang("image"); ?></th>
            <th class="p-1 bg-dark"> <?= $op->lang("use name"); ?></th>
            <th class="p-1 bg-dark"> <?= $op->lang("user level"); ?></th>
            <th class="p-1 bg-dark"> <?= $op->lang("email"); ?></th>
            <th class="p-1 bg-dark"><?= $op->lang("register date"); ?></th>
            <th class="p-1 bg-dark"> <?= $op->lang("status"); ?> </th>
            <th class="p-1 bg-dark" colspan="2"><?= $op->lang("operation"); ?></th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($viewmodel as $item) : ?>
            <?php $status = ($op->pro_field($item['active']) == 1) ? $op->lang("active") : $op->lang("non active"); ?>
            <tr>
              <td class="p-1"><?php echo $i++; ?></td>
              <td class="p-1"> <img src="<?php echo $op->get_gravatar($item['email']); ?>" class="rounded-circle" style="height: 50px;" alt=""> </td>
              <td class="p-1"><?php echo $item['user_name'];  ?></td>
              <td class="p-1"><?php echo  $op->tran_user_role($op->get_user_info($item['usrid'], 'role'));   ?></td>

              <td class="p-1"><?php echo $item['email'];  ?></td>
              <td class="p-1"><?php echo $item['reg_date'];  ?></td>
              <td class="p-1"><?php echo $status; ?> </td>
              <input type="hidden" name="edit_id" value="<?php echo $item['usrid']; ?>">
              <td class="p-1">
                <a href="<?php echo ROOT_URL; ?>/user/update/<?php echo $item['usrid']; ?>" class="btn  primary-color-dark text-white rounded-0 py-1 px-2 px-3 "> <i class="fa fa-pencil p-0" aria-hidden="true"></i> </a>
                <a href="<?php echo ROOT_URL; ?>/user/delete/<?php echo $item['usrid']; ?>" class="btn  danger-color-dark text-white rounded-0 py-1 px-2 px-3 "> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
                <a href="<?php echo ROOT_URL; ?>/user/userrols?userid=<?php echo $item['usrid']; ?>" class="btn  success-color-dark text-white rounded-0 py-1 px-2 px-3 "> <i class="fa fa-user p-0" aria-hidden="true"></i> </a>
                <a href="<?php echo ROOT_URL; ?>/user/usrsectanddep?userid=<?php echo $item['usrid']; ?>" class="btn  bg-dark text-white rounded-0 py-1 px-2 px-3 "> <i class="fa fa-eye p-0" aria-hidden="true"></i> </a>
              </td>
            </tr>
          <?php endforeach; ?>

        </tbody>
      </table>
    </form>