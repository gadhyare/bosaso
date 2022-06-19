<?php

/**
 * fileName: رفع رسوم على الطلبة
 */
?>
<div class="container p-2 table-responsive">

    <?php $op = new Khas(); ?>
    <?php $item = json_decode($viewmodel); ?>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" onsubmit="return confirm($op->lang("are you sure to upload the selected records"))>

        <button type="submit" name="upLoadfee" class="btn danger-color-dark text-white py-2 px-3 "> <?=$op->lang("fee rais");?> </button>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8">
                <select name="PyRes" id="PyRes" class="py-1 text-center w-100 " style="font-size:80%">
                    <?php echo $op->getPayReso(); ?>
                </select>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <select name="descountactive" id="descountactive" class="py-1 text-center w-100" style="font-size:80%">
                    <option value="1"> <?=$op->lang("active");?> </option>
                    <option value="2"> <?=$op->lang("non active");?> </option>
                </select>
            </div>
        </div>

        <table class="table  table-striped " id="myTable">
            <thead class="unique-color-dark text-white">
                <tr>
                    <th class="p-2 text-center info-color-dark" style="font-size:80%">
                        <?=$op->lang("no");?> 
                    </th>
                    <th class="py-2 px-4 info-color-dark text-center">
                        <input type="checkbox" name="chkall" id="chkall">
                    </th>
                    <th class="p-2 text-center info-color-dark" style="font-size:80%">
                    <?=$op->lang("program");?> 
                    </th>
                    <th class="p-2 text-center info-color-dark" style="font-size:80%">
                    <?=$op->lang("department");?> 
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
                        <td class="p-2 text-center" style="font-size:70%">
                            <input type="checkbox" name="chk[]" id="chkitem-<?=$titem->dep_id;?>" value="<?php echo $titem->prog_id    . ","   .
                                                                                        $titem->dep_id     . ","   .
                                                                                        $titem->lev_id . "," .
                                                                                        $titem->sec_id . "," .
                                                                                        $titem->grp_id; ?>"> </td>
                        <td class="p-2 text-right" style="font-size:80%">
                            <?php echo $op->FulltextProgInfo($titem->prog_id); ?>
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
                        <?php $edulev_id = $op->getSelprogramInfoById($titem->prog_id, 'edulev_id'); ?>
                        <?php $UrlVal = "edulev_id=$edulev_id&ids=$titem->prog_id&dep_id=$titem->dep_id&lev_id=$titem->lev_id&sec_id=$titem->sec_id&grp_id=$titem->grp_id"; ?>
                        <td class="p-2 text-center" style="font-size:80%">
                            <a href="<?php echo ROOT_URL; ?>/student/searchstuinfo?<?php echo $UrlVal; ?>" target="_blank" class="btn purple darken-4 text-white p-1 rounded"> <?=$op->lang("details");?>  </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>
</div>
</div>