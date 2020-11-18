window.onload = function () {
    var lookupbutton = document.getElementById("lookup");
    var lookupcity = document.getElementById("cities");
    lookupbutton.addEventListener('click', function (i) {
        i.preventDefault();
        var lookupquery = document.getElementById("country").value;
        var url = "world.php?country=" + lookupquery;
        var httprequest = new XMLHttpRequest();
        httprequest.onreadystatechange = function () {
            if (httprequest.readyState == XMLHttpRequest.DONE) {
                if (httprequest.status == 200) {
                    var country = httprequest.responseText;
                    var result = document.getElementById("result");
                    result.innerHTML = country;
                } else {
                    alert("Error");
                }
            }
        }
        httprequest.open("GET", url, true);
        httprequest.send();
    });

    lookupcity.addEventListener('click', function(i){
        i.preventDefault();
        var lookupquery = document.getElementById("country").value;
        var url = "world.php?country=" + lookupquery + "&context=cities";
        var httprequest = new XMLHttpRequest();
        httprequest.onreadystatechange = function () {
            if (httprequest.readyState == XMLHttpRequest.DONE) {
                if (httprequest.status == 200) {
                    var country = httprequest.responseText;
                    var result = document.getElementById("result");
                    result.innerHTML = country;
                } else {
                    alert("Error");
                }
            }
        }
        httprequest.open("GET", url, true);
        httprequest.send();
    });
}