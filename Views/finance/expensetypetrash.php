<?php

/**
 * fileName: سلة المهملات  للمستويات
 */
?>
<div class="container mt-3">
    <a href="<?php echo ROOT_URL; ?>/finance/expensetype" class="btn primary-color-dark mt-2 float-left rounded-0 mb-2 py-1 px-3 text-white"><i class="fa fa-home" aria-hidden="true"></i> <?=$op->lang("home");?>  <?=$op->lang("expense");?> </a>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th class="text-center bg-light"> <?=$op->lang("no");?></th>
                    <th class="text-center bg-light"> <?=$op->lang("expense type");?>   </th>
                    <th class="text-center bg-light"><?=$op->lang("operation");?></th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($viewmodel as $item) : ?>
                    <tr>
                        <td>
                            <?php echo $i++; ?>
                            <input type="checkbox" name="chid[]" id="chid" value="<?php echo $item['exptypeid']; ?>">
                        </td>
                        <td><?php echo $item['exptype'];  ?></td>
                        <td>
                            <a href="<?php echo ROOT_URL; ?>/finance/expensetypetrash?replace=yes&ids=<?php echo $item['exptypeid']; ?>" class="btn primary-color-dark text-white rounded-0 py-1 px-2 px-3 "> <i class="fa fa-undo" aria-hidden="true"></i> </a>
                            <a href="<?php echo ROOT_URL; ?>/finance/expensetypetrash?remove=yes&ids=<?php echo $item['exptypeid']; ?>" class="btn danger-color-dark text-white rounded-0 py-1 px-2 px-3 "> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>
</div>