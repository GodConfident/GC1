var murl;
var lapinandroidurl = "https://d.ruanmei.com/app/lapin365/lapin_android_3.0.apk";


if ((navigator.userAgent.match(/(Windows Phone|WPDesktop)/i)))
    murl = "http://m.ruanmei.com/#a2";
else if ((navigator.userAgent.match(/(Windows NT 10.0)/i)))
    murl = "http://m.ruanmei.com/#a2";
else if ((navigator.userAgent.match(/(iPhone|iPod|iPad)/i)))
    murl = "https://itunes.apple.com/cn/app/la-pin-huo-la-shang-pin-huo/id989085507?mt=8";
else if ((navigator.userAgent.match(/(Android)/i))) {
    var webview = readcookie('from');
    if (webview == 'wifikey') {
        lapinandroidurl = "https://d.ruanmei.com/app/lapin365/lapin_android_3.0-wifikey.apk";
    }
    var incomechannel = GetQueryString('from');
    if (incomechannel != null) {
        lapinandroidurl = lapinandroidurl.replace(".apk", "-" + incomechannel + ".apk");
    }
    murl = lapinandroidurl;
}
else
    murl = "http://m.ruanmei.com";

var incomechannel = GetQueryString('from');
if (incomechannel != null) {
    lapinandroidurl = lapinandroidurl.replace(".apk", "-" + incomechannel + ".apk");
}


function GetQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]); return null;
}
function readcookie(c_name) {
    if (document.cookie.length > 0) {
        c_start = document.cookie.indexOf(c_name + "=")
        if (c_start != -1) {
            c_start = c_start + c_name.length + 1
            c_end = document.cookie.indexOf(";", c_start)
            if (c_end == -1) c_end = document.cookie.length
            return unescape(document.cookie.substring(c_start, c_end))
        }
    }
    return ""
}