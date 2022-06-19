<?php

/**
 * fileName: طباعة GPA كامل
 */
?>
<br>
<br>
<div class="container print-page">
    <?php $op = new Khas(); ?>
    <?php echo $op->get_report_header("استمارة درجات الطالب"); ?>

    <div class="container">

        <?php $op = new Khas(); ?>
        <?php $count  = $viewmodel; ?>
        <?php foreach ((array) $viewmodel as $item) : ?>
            <table class="print-table   m-auto  text-right">
                <tr>
                    <td class="p-1 "> <?=$op->lang("name");?>:<?php echo $op->getStuNameById($item['stu_id']); ?> </td>
                    <td class="p-1 "> <?=$op->lang("id number");?>: <?php echo $op->getStuInfoByStunm($_GET['id'], 'stu_num'); ?> </td>
                    <td class="p-1 " colspan="3"> <?=$op->lang("program");?>: <?php echo $op->GetSelProgInfoTxt($_GET['prog_id']); ?> </td>
                </tr>
                <tr>
                    <td class="p-1 "> <?=$op->lang("section");?> :<?php echo $op->getSelesectionTxt($item['sec_id']); ?> </td>
                    <td class="p-1 "> <?=$op->lang("shift");?>: <?php echo $op->getSelDepartmentTxt($item['dep_id']); ?> </td>
                    <td class="p-1 "> <?=$op->lang("level");?>: <?php echo $op->GetSellevelsTxt($item['lev_id']); ?> </td>
                    <td class="p-1 "> <?=$op->lang("group");?>: <?php echo $op->GetSelgroupsTxt($item['grp_id']); ?> </td>
                </tr>
            </table>
        <?php endforeach; ?>
        <?php $op->get_stuLevGPA( $_GET['id'] , $_GET['prog_id']); ?>
    </div>
</div>
<?php $op->get_report_footer(); ?>
<script>
    window.print();
    window.addEventListener('afterprint', (event) => {
        window.close();
    });

    document.getElementById("topTotal").innerText = sumData(2);
    document.getElementById("downTotal").innerText = sumData(3);


    function sumData(num) {
        var table = document.getElementById("tableOfTotal"),
            sumVal = 0;

        for (var i = 1; i < table.rows.length; i++) {
            sumVal = sumVal + parseInt(table.rows[i].cells[num].innerHTML);
        }

        return sumVal;
    }
</script>