if ((navigator.userAgent.indexOf('iPhone') > 0 && 
navigator.userAgent.indexOf('iPad') == -1) ||
navigator.userAgent.indexOf('iPod') > 0 ||
navigator.userAgent.indexOf('Android') > 0) {
    window.onload = function() {
        function getCanonicalUrl() {
            var links = document.getElementsByTagName("link");
            for (var i = 0; i < links.length; i++) {
                if (links[i].rel) {
                    if (links[i].rel.toLowerCase() == "alternate") {
                        return links[i].href;
                    }
                }
            }
            return 'https://'+location.hostname+'/sp/';
        }

    var altern = getCanonicalUrl();
    var txt = '<a href=\"'+altern+'\"><img src=\"https://midorimushi-senka.com/sp/img/cmn/spw26.png\">スマホサイトはこちら</a>';
    document.getElementById('gotosp').innerHTML = txt;
    }
}