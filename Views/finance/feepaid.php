<?php

/**
 * fileName: دفع رسوم
 */
?>
<div class="container ">
    <div class="card-header p-1 text-center unique-color-dark text-white rounded-0"><?=$op->lang("student fee information");?></div>
    <?php $op = new Khas(); ?>
    <div class="card-bod   table-responsive  table-sm ">
        <table class="table table-bordered table-striped" id="myTable">
            <thead>
                <tr>
                    <th style="font-size: 70%;" class="p-1 text-center"><?=$op->lang("no");?></th>
                    <th style="font-size: 70%;" class="p-1 text-center"><?=$op->lang("name");?></th>
                    <th style="font-size: 70%;" class="p-1 text-center"><?=$op->lang("id number");?></th>
                    <th style="font-size: 70%;" class="p-1 text-center"><?=$op->lang("level");?></th>
                    <th style="font-size: 70%;" class="p-1 text-center"><?=$op->lang("group");?></th>
                    <th style="font-size: 70%;" class="p-1 text-center"><?=$op->lang("section");?></th>
                    <th style="font-size: 70%;" class="p-1 text-center"><?=$op->lang("shift");?></th>
                    <th style="font-size: 70%;" class="p-1 text-center"><?=$op->lang("group");?></th>
                    <th style="font-size: 70%;" class="p-1 text-center"><?=$op->lang("payment reson");?></th>
                    <th style="font-size: 70%;" class="p-1 text-center"><?=$op->lang("requred");?></th>
                    <th style="font-size: 70%;" class="p-1 text-center">  <?=$op->lang("status");?></th>
                    <th style="font-size: 70%;" class="p-1 text-center"> <?=$op->lang("operation");?> </th>
                </tr>
            </thead>
            <tbody>
                <?php $row = json_decode($viewmodel); ?>
                <?php foreach ((array) $row as $item) : ?>
                    <tr>
                        <td>#</td>
                        <td style="font-size: 70%;"> <?php echo $op->getStuInfoById($item->stu_id, "StuName"); ?> </td>
                        <td style="font-size: 70%;"> <?php echo $op->getStuInfoById($item->stu_id, "stu_num"); ?> </td>
                        <td style="font-size: 70%;"> <?php echo $op->GetSellevelsTxt($item->lev_id); ?> </td>
                        <td style="font-size: 70%;"> <?php echo $op->GetSelgroupsTxt($item->grp_id); ?> </td>
                        <td style="font-size: 70%;"> <?php echo $op->getSelesectionTxt($item->sec_id); ?> </td>
                        <td style="font-size: 70%;"> <?php echo $op->getSelDepartmentTxt($item->dep_id); ?> </td>
                        <td style="font-size: 70%;"> <?php echo $op->FullSelProgInfotxt($item->prog_id); ?> </td>
                        <td style="font-size: 70%;"><?php echo $op->getSelpaymentrestxt($item->Pay_Res_id); ?></td>
                        <td>$<?php echo $item->want; ?></td>
                        <td style="font-size: 70%;" class="btn btn-danger text-white py-1"> <?php echo ($item->AccountStatuse == 1) ? $op->lang("pending") : ""; ?> </td>
                        <td style="font-size: 70%;">
                            <?php if ($op->chkSelProg($item->prog_id)) : ?>
                                <button class="btn primary-color-dark dropdown-toggle text-white p-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:70% !important">
                                <?=$op->lang("pending");?>
                                </button>

                                <div class="dropdown-menu p-0 my-0" aria-labelledby="dropdownMenuButton">
                                    <?php $editFee = $op->lang("update"); ?>
                                    <?php $paidFee = $op->lang("paid"); ?>
                                    <?php $deleteFee = $op->lang("delete"); ?>
                                    <a href="<?php echo ROOT_URL; ?>/finance/updatestuFee/<?php echo $item->Invoice_id; ?>" class="dropdown-item px-2 py-1       " style="color:#000 !important; font-size:12px;  " data-toggle="tooltip" title="<?=$op->lang("update");?>"> <?php echo  $editFee; ?> </a>
                                    <a href="<?php echo ROOT_URL; ?>/finance/paidstufee/<?php echo $item->Invoice_id; ?>" class="dropdown-item px-2 py-1       " style="color:#000 !important; font-size:12px;  " data-toggle="tooltip" title="<?=$op->lang("pay");?> "> <?php echo  $paidFee; ?> </a>
                                    <a href="<?php echo ROOT_URL; ?>/finance/deletestuFee/<?php echo $item->Invoice_id; ?>" class="dropdown-item px-2 py-1       " style="color:#000 !important; font-size:12px;  " data-toggle="tooltip" title="<?=$op->lang("delete");?> "> <?php echo  $deleteFee; ?> </a>
                                </div>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>