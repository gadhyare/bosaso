    <?php
    /**
     * fileName: طباعة نتيجة اختبار
     */
    ?>
    <br>
    <br>
    <div class="container print-page">
        <?php $op = new Khas(); ?>
        <?php echo $op->get_report_header($op->lang("course test result")); ?>

        <table class="print-table">
            <tr>
                <td colspan="5"> <?= $op->lang("exam report"); ?>: <?php echo $op->GetSelProgInfoTxt($_GET['selprog_id']); ?> </td>
            </tr>
            <tr>
                <td> <?= $op->lang("section name"); ?> :<?php echo $op->getSelesectionTxt($_GET['sec_id']); ?> </td>
                <td> <?= $op->lang("shift name"); ?>: <?php echo $op->getSelDepartmentTxt($_GET['dep_id']); ?> </td>
                <td> <?= $op->lang("level name"); ?>: <?php echo $op->GetSellevelsTxt($_GET['lev_id']); ?> </td>
                <td> <?= $op->lang("group name"); ?>: <?php echo $op->GetSelgroupsTxt($_GET['grp_id']); ?> </td>
                <td> <?= $op->lang("subject name"); ?>: <?php echo $op->getSelExsubTxt($_GET['sub_id']); ?> </td>
            </tr>
        </table>
        <hr class="hr">
        <table class="print-table  ">
            <tr>
                <td class="p-1 purple darken-4 text-white text-center" rowspan="2"> <?= $op->lang("Serial"); ?></td>
                <td class="p-1 purple darken-4 text-white text-center" rowspan="2"><?= $op->lang("name"); ?> </td>
                <td class="p-1 purple darken-4 text-white text-center" rowspan="2"><?= $op->lang("id number"); ?> </td>
                <td class="p-1 purple darken-4 text-white text-center" colspan="3">
                    <?= $op->lang("first term"); ?>
                </td>
                <td class="p-1 purple darken-4 text-white text-center" colspan="3">
                    <?= $op->lang("second term"); ?>
                </td>
                <td class="p-1 purple darken-4 text-white text-center" rowspan="2"> <?= $op->lang("attendance"); ?> </td>
                <td class="p-1 purple darken-4 text-white text-center" rowspan="2"> <?= $op->lang("total"); ?></td>
                <td class="p-1 purple darken-4 text-white text-center" rowspan="2"> <?= $op->lang("appreciation"); ?></td>

            </tr>
            <tr>
                <td class="p-1 purple darken-4 text-white text-center"> <?= $op->lang("questions"); ?></td>
                <td class="p-1 purple darken-4 text-white text-center"> <?= $op->lang("assignment"); ?></td>
                <td class="p-1 purple darken-4 text-white text-center"> <?= $op->lang("test"); ?></td>
                <td class="p-1 purple darken-4 text-white text-center"> <?= $op->lang("questions"); ?></td>
                <td class="p-1 purple darken-4 text-white text-center"> <?= $op->lang("assignment"); ?></td>
                <td class="p-1 purple darken-4 text-white text-center"> <?= $op->lang("test"); ?> </td>
            </tr>

            <tbody>
                <?php $no = 1; ?>
                <?php $items = json_decode($viewmodel); ?>
                <?php if (count((array) $items) > 0) : ?>
                    <?php foreach ($items as $SearchResultShow => $val) : ?>
                        <tr>
                            <td class="p-0 text-center"> <i id="no"> <?php echo $no++; ?></i> </td>
                            <td class="p-0 "> <?php echo $op->getStuInfoById($val->stu_id, "StuName"); ?></td>
                            <td class="p-0 text-center"> <?php echo $op->getStuInfoById($val->stu_id, "stu_num"); ?></td>
                            <td class="p-0 text-center"> <?php echo $val->qu1; ?></td>
                            <td class="p-0 text-center"> <?php echo $val->as1; ?></td>
                            <td class="p-0 text-center"> <?php echo $val->ex1; ?></td>
                            <td class="p-0 text-center"> <?php echo $val->qu2; ?></td>
                            <td class="p-0 text-center"> <?php echo $val->as2; ?></td>
                            <td class="p-0 text-center"> <?php echo $val->ex2; ?></td>
                            <td class="p-0 text-center"> <?php echo $val->att; ?></td>
                            <td class="p-0 text-center"> <?php echo $val->qu1 + $val->as1 + $val->ex1 + $val->qu2 + $val->as2 + $val->ex2 + $val->att; ?></td>
                            <td class="p-0 text-center"> <?php echo $op->get_gpa($val->qu1 + $val->as1 + $val->ex1 + $val->qu2 + $val->as2 + $val->ex2 + $val->att); ?></td>

                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                <?php if ($no == 1) {
                    echo '<tr class="alert alert-danger " > <td colspan="13" class="text-center"> عفواً ولكن لا توجد بيانات لعرضها  </td></tr>';
                } ?>
                <div class="alert alert-info float-left text-dark rounded-0 py-1 ml-1"> <?php if ($no > 1) echo 'عدد الطلبة هو: ' . ($no - 1); ?> </div>
                </tr>
        </table>

        <?php $op->get_report_footer(); ?>

    </div>
    <script>
        window.onload = function() {
            window.print();

        }
        window.addEventListener('afterprint', (event) => {
            window.close();
        });
    </script>