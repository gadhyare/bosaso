<?php

/**
 * fileName: إدارة الملفات
 */
?>
<div class="container col-xs-12 col-sm-12 col-md-10 m-auto">
    <div class="card p-3 ">
        <?php echo (isset($_SESSION['msg'])) ? $_SESSION['msg'] : ""; ?>
        <?php
        $p = str_replace("\core", "", REL_DIR);
        $t = str_replace("\\", "/",  $p  . "/filesdir");
        $files = glob($t . "/*");
        $outputFileNames = str_replace($t . "/", "", $files);
        if (count($outputFileNames) > 0) :
            echo '<ul class="list-group p-1 ">';
            for ($i = 0; $i < count($outputFileNames); $i++) :
                echo "<li class='list-group-item  rounded-0 py-0 px-1'> <input type='checkbox'> $outputFileNames[$i] <span class='badge badge-danger badge-pill float-left text-white rounded-0 p-1'> <a href=" . $op->siteSetting("siteUrl") . "filesdir/" . $outputFileNames[$i] . " class='text-white '> x </a> </span>   </li>";
            endfor;
            echo "</ul>";
        else :
            $_SESSION['msg']  = File_Not_Founded;
        endif;
        ?>
    </div>
</div>