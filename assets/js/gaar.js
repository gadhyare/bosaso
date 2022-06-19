function showHint(txtSearch,divContent) {
    var inp = document.getElementById(txtSearch);
    if (inp.length == 0) { 
      document.getElementById("yui").innerHTML = "";
      return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            document.getElementById("jax").innerHTML = '<img src="assets/img/tahmil10.gif" class="border-0" style="height:100px;">';
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("yui").innerHTML = this.responseText;
                document.getElementById("jax").innerHTML = '';
            }
        };
        xmlhttp.open("GET", divContent  + inp.value, true);
        xmlhttp.send();
    }
}


function delItem(pageUrl,da){
            $.ajax({
                url:  pageUrl, //'function/function.php',
                type: 'post',
                data: {da}, 
                success: function(response) { 
                     alert('تمت العملية بنجاح');
                     location.reload();
                 }
        });
}


function showDetails(divContent,div) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(div).innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", divContent , true);
        xmlhttp.send();
}


function addRec(pageUrl){
    $.ajax({
        url:  pageUrl, 
        type: 'post',
        data:  $("form").serialize() , 
        success: function(response) { 
              alert('تمت العملية بنجاح');
              location.reload();
         }
});
}



function updateRec(pageUrl){
    $.ajax({
        url:  pageUrl, 
        type: 'post',
        data:  $("form").serialize() , 
        success: function(response) { 
              alert('تمت العملية بنجاح');
              location.reload();
         }
});
}

 





function showAllDetails(url,div) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() { 
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById(div).innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", url , true);
    xmlhttp.send();
}
 
 

 