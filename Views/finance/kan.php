<?php

/**
 * fileName: دفع الرسوم 
 * in
 */
?>

                <?php $row = json_decode($viewmodel); ?>
                <?php foreach ((array) $row as $item) : ?>
                    <tr>
                        <td class="p-1 text-center">#</td>
                        <td style="font-size: 70%;" class="p-1 text-center"> <?php echo $op->getStuInfoById($item->stu_id, "StuName"); ?> </td>
                        <td style="font-size: 70%;" class="p-1 text-center"> <?php echo $op->getStuInfoById($item->stu_id, "stu_num"); ?> </td>
                        <td style="font-size: 70%;" class="p-1 text-center"> <?php echo $op->GetSellevelsTxt($item->lev_id); ?> </td>
                        <td style="font-size: 70%;" class="p-1 text-center"> <?php echo $op->GetSelgroupsTxt($item->grp_id); ?> </td>
                        <td style="font-size: 70%;" class="p-1 text-center"> <?php echo $op->getSelesectionTxt($item->sec_id); ?> </td>
                        <td style="font-size: 70%;" class="p-1 text-center"> <?php echo $op->getSelDepartmentTxt($item->dep_id); ?> </td>
                        <td style="font-size: 70%;" class="p-1 text-center"> <?php echo $op->FullSelProgInfotxt($item->prog_id); ?> </td>
                        <td style="font-size: 70%;" class="p-1 text-center"><?php echo $op->getSelpaymentrestxt($item->Pay_Res_id); ?></td>
                        <td class="p-1 text-center">$<?php echo $item->want; ?></td>
                        <td style="font-size: 70%;" class="p-1 text-center"> <?php echo ($item->AccountStatuse == 1) ? "قيد الإجراء" : ""; ?> </td>
                        <td style="font-size: 70%;" class="p-1 text-center">
                            <?php if ($op->chkSelProg($item->prog_id)) : ?>
                                <button class="btn primary-color-dark dropdown-toggle text-white p-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:70% !important">
                                    العمليات
                                </button>

                                <div class="dropdown-menu p-0" aria-labelledby="dropdownMenuButton">
                                    <?php $editFee = "تعديل الرسم"; ?>
                                    <?php $paidFee = "دفع الرسم"; ?>
                                    <?php $deleteFee = "حذف الرسم"; ?>
                                    <a href="<?php echo ROOT_URL; ?>/finance/updatestuFee/<?php echo $item->Invoice_id; ?>" class="dropdown-item px-2 py-1   text-right     " style="color:#000 !important; font-size:12px;  " data-toggle="tooltip" title="تعديل الرسوم"> <?php echo  $editFee; ?> </a>
                                    <a href="<?php echo ROOT_URL; ?>/finance/paidstufee/<?php echo $item->Invoice_id; ?>" class="dropdown-item px-2 py-1   text-right     " style="color:#000 !important; font-size:12px;  " data-toggle="tooltip" title="دفع الرسوم"> <?php echo  $paidFee; ?> </a>
                                    <a href="<?php echo ROOT_URL; ?>/finance/deletestuFee/<?php echo $item->Invoice_id; ?>" class="dropdown-item px-2 py-1   text-right     " style="color:#000 !important; font-size:12px;  " data-toggle="tooltip" title="حذف الرسوم"> <?php echo  $deleteFee; ?> </a>
                                </div>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

 