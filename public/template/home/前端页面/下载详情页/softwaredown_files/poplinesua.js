var murl;
var poplinesandroidurl = "http://down.ruanmei.com/app/poplines/poplines_android_1.08.apk";
var poplinesiosurl = "http://down.ruanmei.com/app/poplines/poplines_ios_1.09.ipa";
var poplineswpurl = "http://www.windowsphone.com/zh-cn/store/app/%E9%AD%94%E7%8F%A0/c6f95e17-8638-405a-8b76-c9d9a4b9b98e";
var poplinesappstoreurl = "https://itunes.apple.com/app/id946787441";

if ((navigator.userAgent.match(/(Windows Phone|WPDesktop)/i)))
    murl = poplineswpurl;
else if ((navigator.userAgent.match(/(iPhone|iPod|iPad)/i)))
    murl = poplinesappstoreurl;
else if ((navigator.userAgent.match(/(Android)/i)))
    murl = poplinesandroidurl;
else
    murl = "http://m.ruanmei.com/";
