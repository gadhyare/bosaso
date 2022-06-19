<div class="container p-0  ">
    <div class="row">
        <?php $op = new Khas(); ?>
        <div class="col-xs-12 col-md-4">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="card p-0 border z-depth-0 rounded-0">
                    <div class="card-header unique-color-dark text-white text-center p-1 "> <?=$op->lang("raising the monthly salaries of employees");?> </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="action_month"> <?=$op->lang("financial month");?> </label>
                            <input type="month" name="action_month" id="action_month" value="<?php echo  $op->setPosts("action_month"); ?>" onchange="getRepos();" class="form-control rounded-0 p-0">
                        </div>
                        <div class="form-group">
                            <label for="upDates"> <?=$op->lang("date");?> </label>
                            <input type="date" name="upDates" id="upDates" value="<?php echo $op->setPosts("upDates"); ?>" class="form-control p-0 alert-info rounded-0">
                        </div>
                        <button type="submit" name="btnUpSellary" id="btnUpSellary" class="btn py-1  danger-color-dark text-center text-white col-12 m-auto rounded-0"> <?=$op->lang("rais");?> </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-xs-12 col-md-8">
            <div class="card rounded-0 border z-depth-0">
                <div class="card-header unique-color-dark p-1 text-white text-center"> <?=$op->lang("list of salaries raised for the financial month");?> : <span id="act_month"></span> </div>
                <div class="card-body" id="getempSellay">
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function getRepos() {
        var t = document.getElementById("action_month");
        var act_month = document.getElementById("act_month");
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                document.getElementById("getempSellay").innerHTML = xmlhttp.responseText;
                act_month.innerHTML = t.value;

            }
        };
        xmlhttp.open("GET", "<?php echo ROOT_URL; ?>/finance/getempSellay?actionmonth=" + t.value, true);
        xmlhttp.send();
    }


    function getData() {
        var getId = document.getElementById("getId");
        var netSellary = document.getElementById("netSellary");
        var action_month = document.getElementById("action_month");
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                document.getElementById("getDataHere").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "<?php echo ROOT_URL; ?>/finance/empsellarypaid/"+ getId.value + "?sellery="+ netSellary.value  +"&action_month="+action_month.value   , true);
        xmlhttp.send();
    }
 
 
</script>