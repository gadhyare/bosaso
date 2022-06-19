<?php

/**
 * fileName: معلومات جهات الدفع وفدرها
 */
?>
<div class="container  m-auto">
    <a href="<?php echo ROOT_URL; ?>/finance/feeinfoadd" class="btn danger-color-dark text-white p-1 float-left"> 
    <i class="fa fa-pluse p-0"></i> <?=$op->lang("add");?>   </a>
    
    <br>
    <?php $op = new Khas(); ?>
    <hr>
    <?php $item = json_decode($viewmodel); ?>
    <table class="table " id="myTable">
        <thead>
            <th class="bg-light text-center"> <?=$op->lang("no");?> </th>
            <th class="bg-light text-center"> <?=$op->lang("program");?> </th>
            <th class="bg-light text-center"> <?=$op->lang("fee type");?> </th>
            <th class="bg-light text-center"> <?=$op->lang("amount");?> </th>
            <th class="bg-light text-center"> <?=$op->lang("status");?> </th>
            <th class="bg-light text-center"> <?=$op->lang("operation");?> </th>
        </thead>
        <tbody>
            <?php if (count((array) $item)) : ?>
                <?php $i = 1; ?>
                <?php foreach ($item as $key => $val) : ?>
                    <tr>
                        <td> <?php echo $i; ?> </td>
                        <td> <?php echo  $op->FullSelProgInfotxt($val->prog_id) ?> </td>
                        <td> <?php $op->getSelpaymentrestxt($val->Pay_Res_id); ?> </td>

                        <td> $<?php echo $val->fee_amount; ?> </td>
                        <td> <?php echo ($val->active == 1) ? $op->lang("active") : $op->lang("non active"); ?> </td>
                        <td class="text-center">
                            <?php if ($op->chkSelProg($val->prog_id)) : ?>
                                <a href="<?php echo ROOT_URL; ?>/finance/feeinfoedit/<?php echo $val->feeinfo_id; ?>" class="btn success-color-dark text-white p-1"> <i class="fa fa-edit p-0"></i> </a>
                                <a href="<?php echo ROOT_URL; ?>/finance/feeinfodel/<?php echo $val->feeinfo_id; ?>" class="btn danger-color-dark text-white p-1"> <i class="fa fa-trash p-1"></i> </a>
                            <?php endif;?>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6">
                        <?php echo $_SESSION['msg'] = Data_Not_Founded; ?>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>