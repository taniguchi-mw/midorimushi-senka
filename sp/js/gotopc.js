window.onload = function() {
function getCanonicalUrl() {
    var links = document.getElementsByTagName("link");
    for (var i = 0; i < links.length; i++) {
        if (links[i].rel) {
            if (links[i].rel.toLowerCase() == "canonical") {
                return links[i].href;
            }
        }
    }
    return 'https://'+location.hostname;
}

var canoni = getCanonicalUrl();
var txt = '<a href=\"'+canoni+'\" class=\"btn_gray_rs\"><img src=\"https://midorimushi-senka.com/sp/img/cmn/pc26.png\">PCサイト</a>';
document.getElementById('gotopc').innerHTML = txt;
}