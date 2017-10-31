var murl;
var androidurl = "https://d.ruanmei.com/app/ithome/ithome_android_5.85.apk";
var iosurl = "https://d.ruanmei.com/app/ithome/ithome_ios_3.37.ipa";
var macurl = "https://d.ruanmei.com/app/ithome/ithome_mac_1.21.dmg";
var weixinurl = "http://m.ithome.com/ithome/download/";
if ((navigator.userAgent.match(/(Windows Phone|WPDesktop)/i)))
    murl = "http://www.windowsphone.com/zh-cn/store/app/it%E4%B9%8B%E5%AE%B6/2942b1e3-932d-4faf-9cb7-8bbc2eabbe82";
else if ((navigator.userAgent.match(/(Macintosh)/i)))
    murl = "https://itunes.apple.com/cn/app/it-zhi-jia/id1075668476?l=zh&ls=1&mt=12";
else if ((navigator.userAgent.match(/(iPhone|iPod|iPad)/i)))
    murl = "https://itunes.apple.com/cn/app/it-zhi-jia/id570610859?mt=8";
else if ((navigator.userAgent.match(/(Android)/i)))
    murl = androidurl;
else if ((navigator.userAgent.match(/(micromessenger)/i)))
   murl = weixinurl;
else
    murl = "http://m.ruanmei.com/";
var murltop=murl;
var murldown=murl;
var oldmulr="http://m.ithome.com/ithome/"
var oldmulr1="http://m.ruanmei.com/"
