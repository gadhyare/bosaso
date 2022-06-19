<?php

/**
 * fileName: سلة المهملات  للمستويات
 */
?>
<div class="container mt-3">
    <a href="<?php echo ROOT_URL; ?>/academics" class="btn primary-color-dark mt-2 float-left rounded-0 mb-2 py-1 px-3 text-white"><i class="fa fa-home" aria-hidden="true"></i> الرئيسية </a>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th class="p-1 bg-dark text-center"> المسلسل</th>
                    <th class="p-1 bg-dark"> المستوى</th>
                    <th class="p-1 bg-dark"> الكود</th>
                    <th class="p-1 bg-dark text-center">العمليات</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($viewmodel as $item) : ?>
                    <?php $status = ($item['active'] == 1) ? 'مفعل' : 'غير مفعل'; ?>
                    <tr>
                        <td class="p-1">
                            <?php echo $i++; ?>
                            <input type="checkbox" name="chid[]" id="chid" value="<?php echo $item['academics_id']; ?>">
                        </td>
                        <td class="p-1"><?php echo $item['academics'];  ?></td>
                        <td class="p-1"><?php echo $item['code'];  ?></td>
                        <td class="p-1">
                            <a href="<?php echo ROOT_URL; ?>/academics/trash?replace=yes&ids=<?php echo $item['academics_id']; ?>" class="btn primary-color-dark text-white rounded-0 py-1 px-2 px-3 "> <i class="fa fa-undo" aria-hidden="true"></i> </a>
                            <a href="<?php echo ROOT_URL; ?>/academics/trash?remove=yes&ids=<?php echo $item['academics_id']; ?>" class="btn danger-color-dark text-white rounded-0 py-1 px-2 px-3 "> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>
</div>