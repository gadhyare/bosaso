<?php

/**
 * fileName:     تعديل رسوم دراسية
 */
?>
<div class="container p-2">
    <div class="card-header text-center unique-color-dark text-white py-1">
    <?=$op->lang("update student fee");?>
    </div>
    <?php $op = new Khas(); ?>
    <?php $item = json_decode($viewmodel); ?>
    <table class="table w-100" id="myTable">
        <thead class="unique-color-dark text-white">
            <tr>
                <th class="p-2 text-center info-color-dark" style="font-size:80%">
                <?=$op->lang("no");?>
                </th>
                <th class="p-2 text-center info-color-dark" style="font-size:80%">
                <?=$op->lang("program");?>
                </th>
                <th class="p-2 text-center info-color-dark" style="font-size:80%">
                <?=$op->lang("shift");?>
                </th>
                <th class="p-2 text-center info-color-dark" style="font-size:80%">
                <?=$op->lang("level");?>
                </th>
                <th class="p-2 text-center info-color-dark" style="font-size:80%">
                <?=$op->lang("section");?>
                </th>
                <th class="p-2 text-center info-color-dark" style="font-size:80%">
                <?=$op->lang("group");?>
                </th>
                <th class="p-2 text-center info-color-dark" style="font-size:80%">
                <?=$op->lang("payment reasone");?>
                </th>
                <th class="p-2 text-center info-color-dark" style="font-size:80%">
                <?=$op->lang("operation");?>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ((array) $item as $titem) : ?>
                <tr>
                    <td class="p-2 text-center" style="font-size:80%">
                        <?php echo $i++; ?>
                    </td>
                    <td class="p-2 text-center" style="font-size:80%">
                        <select name="s" id="ss" class="form-control p-0 rounded-0 col-9 border-0 bg-white " disabled="disabled" style="font-size:80%">
                            <?php echo $op->FullSelProgInfo($titem->prog_id); ?>
                        </select>
                    </td>
                    <td class="p-2 text-center" style="font-size:80%">
                        <?php echo $op->getSelDepartmentTxt($titem->dep_id); ?>
                    </td>
                    <td class="p-2 text-center" style="font-size:80%">
                        <?php echo $op->GetSellevelsTxt($titem->lev_id); ?>
                    </td>
                    <td class="p-2 text-center" style="font-size:80%">
                        <?php echo $op->getSelesectionTxt($titem->sec_id); ?>
                    </td>
                    <td class="p-2 text-center" style="font-size:80%">
                        <?php echo $op->GetSelgroupsTxt($titem->grp_id); ?>
                    </td>
                    <td class="p-2 text-center" style="font-size:80%">
                        <?php echo $op->getSelpaymentrestxt($titem->Pay_Res_id); ?>
                    </td>
                    <?php $UrlVal = "prog_id=$titem->prog_id&dep_id=$titem->dep_id&lev_id=$titem->lev_id&sec_id=$titem->sec_id&grp_id=$titem->grp_id&Pay_Res_id=$titem->Pay_Res_id"; ?>
                    <td class="p-2 text-center" style="font-size:80%">
                        <a href="<?php echo ROOT_URL; ?>/finance/updatetransfeedo/s?<?php echo $UrlVal; ?>" class="btn purple darken-4 text-white p-1 rounded"> <i class="fa fa-pencil p-0" aria-hidden="true"></i> </a>
                        <a href="<?php echo ROOT_URL; ?>/finance/deletetransfeedo/s?<?php echo $UrlVal; ?>" class="btn purple darken-4 text-white p-1 rounded"> <i class="fa fa-pencil p-0" aria-hidden="true"></i> </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>