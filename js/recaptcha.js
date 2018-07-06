var captha = null;
var loadapi = function () {
    captha = grecaptcha.render('grecaptcha', {
        'sitekey': '6Le-WlwUAAAAAPbKrt0MmAtQQLxGpl54bsxl8eMI',
        callback: verifyCallback
    });
};



var verifyCallback = function() {
    CheckRecaptchaa();
};


function CheckRecaptchaa() {
    console.log("debug");
    var http = new XMLHttpRequest();
    var url = "/php/recaptcha.php";
    var params = "api=" + grecaptcha.getResponse(captha);
    http.open("POST", url, true);

    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    http.onreadystatechange = function () {//Call a function when the state changes.
        if (http.readyState === 4 && http.status === 200) {
            console.log(http.responseText);
            var checker = JSON.parse(http.responseText);

            if (checker["api_res"] === true) {
                let verstuurrow = document.getElementById("verstuurrow");
                verstuurrow.style.display = "block";
                console.log("done");
            }
        }

    };
    http.send(params);
}