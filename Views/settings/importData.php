<?php

/**
 * fileName: استيراد البيانات
 */
?>
<div class="container col-xs-12 col-sm-12 col-md-10 m-auto">
    <div class="card p-3 ">
        <?php echo (isset($_SESSION['msg'])) ? $_SESSION['msg'] : ""; ?>
        <?php echo '<ul class="list-group p-1 ">'; ?>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="text-center p-3">
            <button type="submit" name="export" class="btn success-color-dark text-white float-right"> عمل نسخة احتياطية </button>
            <br class="mt-3">
        </form>
        <?php
        $p = str_replace("\core", "", REL_DIR);
        $t = str_replace("\\", "/",  $p  . "/filesdir");
        $files = glob($t . "/*.sql");

        $outputFileNames = str_replace($t . "/", "", $files);
        if (count($outputFileNames) > 0) :
            echo "<div class='conrainer tab-pane p-1'>";
            for ($i = 0; $i < count($outputFileNames); $i++) :
                echo "<li class='list-group-item  rounded-0'>$outputFileNames[$i] <span class='badge badge-primary badge-pill float-left text-white rounded-0 py-2 px-3'> <a href=" . $op->siteSetting("siteUrl") . "filesdir/" . $outputFileNames[$i] . " class='text-white '> تحميل </a> </span>   </li>";
            endfor;
            echo "</div> </ul>";
        else :
            $_SESSION['msg']  = File_Not_Founded;
        endif;
        ?>
    </div>
</div>