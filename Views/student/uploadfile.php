<?php

/**
 * fileName: رفع معلومات طلبة
 */
?>
<?php if (isset($_SESSION['hidden_fileds'])) {
    $di = $_SESSION['hidden_fileds'];
} else {
    $di = '';
}
$img_path = (isset($_SESSION['hidden_fileds'])) ? ROOT_URL . "/uplouds/" . $di : "";


?>
<div class="container mt-3">
    <img src="<?php echo $img_path; ?>" alt="<?php echo $di; ?>" title="<?php echo $di; ?>" style="width:200px; height:200px; border-radius: 3px; float:left ">
</div>
<div class="container">
    <div class="container primary-color-dark  text-center rounded-0">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group primary-color-dark p-1">
                <input type="file" name="fileToUpload" class="btn primary-color-dark   rounded-0" id="fileToUpload">
                <input type="hidden" name="hidden_fileds" value="<?php echo $di; ?>">
                <input type="submit" name="uploads" class="btn btn-outline-light   " value="Upload">
            </div>
        </form>
    </div>

</div>
<?php unset($_SESSION['hidden_fileds']); ?>
<div class="container tab-pane border border-danger">
    <div class="row">


        <?php

        show_images();

        ?>

    </div>


</div>