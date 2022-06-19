<?php

/**
 * fileName: اضافة دورة
 */
?>
<div class="container mt-5 col-xs-12 col-sm-10 col-md-6">
    <div class="card  ">
        <div class="card-header  text-dark font-weight-bold text-center p-1"> اضافة دورة جديدة </div>
        <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group" id="div">
                    <label> عنوان الدورة </label>
                    <input type="text" name="cou_title[]" id="cou_title" class="form-control p-1  rounded-0">
                </div>
                <span class="btn  success-color-dark p-2 text-white" id="add" onclick="add()"> اضافة درس </span>

                <input type="submit" name="add_rec" value="اضافة" class="btn primary-color-dark text-white px-3 py-2">
                <a href="<?php echo ROOT_URL; ?>/coulesson/<?php echo $_GET['id'];?>" class="btn danger-color-dark text-white p-2">إلغاء</a>
            </form>
        </div>
    </div>
</div>


<script>
    function add() {

        var div = document.getElementById("div");
        var input = document.createElement("input");
        input.classList.add("form-control");
        input.classList.add("mt-1");
        input.classList.add("rounded-0");
        input.setAttribute("type", "text");
        input.setAttribute("name", "cou_title[]");
        input.setAttribute("accept", ".mp4");



        div.appendChild(input);

    }
</script>