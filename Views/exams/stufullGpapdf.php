<?php

/**
 * fileName: طباعة GPA كامل
 */
?>

<?php $op = new Khas(); ?>
<?php




$op->report_with_no_customizedpdf($_GET['id'], $_GET['prog_id'], $_GET['stupro'], $_SESSION['firstString'], $_SESSION['secondtString'], $_SESSION['therdString'], $_SESSION['foruthString']); ?>
 