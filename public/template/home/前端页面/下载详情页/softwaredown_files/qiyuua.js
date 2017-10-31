var murl;
var androidurl = "https://d.ruanmei.com/app/qiyu/qiyu_android_2.11.apk";
var iosurl = "ios";
var wpurl = "https://www.microsoft.com/zh-cn/store/p/%E6%97%97%E9%B1%BC%E6%B5%8F%E8%A7%88%E5%99%A8/9nblgggxwsnd";
var appstoreurl = "https://itunes.apple.com/cn/app/qi-yu-liu-lan-qi/id959447103?mt=8";

if ((navigator.userAgent.match(/(Windows Phone|WPDesktop)/i)))
    murl = wpurl;
else if ((navigator.userAgent.match(/(iPhone|iPod|iPad)/i)))
    murl = appstoreurl;
else if ((navigator.userAgent.match(/(Android)/i)))
    murl = androidurl;
else
    murl = "http://qiyu.ruanmei.com/";
