    <?php
    /**
     * fileName: طالب   GPA  طباعة
     */
    ?>
    <br>
    <br>
    <div class="container print-page">
        <?php $op = new Khas(); ?>
        <?php echo $op->get_report_header($op->lang("find student grades")); ?>
        <div class="container">
            <?php $op = new Khas(); ?>
            <?php $count  = $viewmodel; ?>
            <?php foreach ((array) $viewmodel as $item) : ?>
                <table class="print-table   m-auto  text-right">
                    <tr>
                        <td class="p-1 "> <?=$op->lang("name");?>:<?php echo $op->getStuNameById($item['stu_id']); ?> </td>
                        <td class="p-1 "> <?=$op->lang("id numpber");?>: <?php echo $op->getStuInfoByStunm($_GET['id'], 'stu_num'); ?> </td>
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
            <?php $op->get_stuLev($_GET['id'], $_GET['prog_id']); ?>
        </div>
    </div>
    <?php $op->get_report_footer(); ?>
    <script>
        window.print();
        window.addEventListener('afterprint', (event) => {
            window.close();
        });
    </script>