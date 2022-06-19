<?php

/**
 * fileName: سلة المهملات  لجهات الدفع
 */
?>
<div class="container mt-3">
    <a href="<?php echo ROOT_URL; ?>/finance/PaymentRes" class="btn primary-color-dark mt-2 float-left rounded-0 mb-2 py-1 px-3 text-white"><i class="fa fa-home" aria-hidden="true"></i> <?=$op->lang("home");?>  <?=$op->lang("fee type");?> </a>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <table class="table  " id="myTable">
            <thead>
                <tr>
                    <th class="bg-light text-center"> <?=$op->lang("no");?></th>
                    <th class="bg-light text-center"> <?=$op->lang("fee type");?></th>
                    <th class="bg-light text-center"><?=$op->lang("operation");?></th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($viewmodel as $item) : ?>
                     
                    <tr>
                        <td class="p-1">
                            <?php echo $i++; ?>
                            <input type="checkbox" name="chid[]" id="chid" value="<?php echo $item['Pay_Res_id']; ?>">
                        </td>
                        <td class="p-1"><?php echo $item['PaymentRes'];  ?></td>
                        <td class="p-1">
                            <a href="<?php echo ROOT_URL; ?>/finance/PaymentResetrash?replace=yes&ids=<?php echo $item['Pay_Res_id']; ?>" class="btn primary-color-dark text-white rounded-0 py-1 px-2 px-3 "> <i class="fa fa-undo" aria-hidden="true"></i> </a>
                            <a href="<?php echo ROOT_URL; ?>/finance/PaymentResetrash?remove=yes&ids=<?php echo $item['Pay_Res_id']; ?>" class="btn danger-color-dark text-white rounded-0 py-1 px-2 px-3 "> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>
</div>