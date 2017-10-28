    if ((navigator.userAgent.match(/(iPhone|iPod|Android|Windows Phone|baidu Transcoder|BlackBerry)/i)))
    {
        var sToMatch = String(window.document.location.href);
        var reEs = /http:\/\/(.*?).ithome.com\/(.*)/;

        var wapDomain;
        if (reEs.test(sToMatch)) {
            wapDomain = sToMatch.match(reEs)[2];
            if (wapDomain.indexOf("category") >= 0)
                wapDomain = sToMatch.match(reEs)[1];
            if (wapDomain == "")
                wapDomain = sToMatch.match(reEs)[1];

        }
        if (wapDomain != "")
            location.replace("http://wap.ithome.com/" + wapDomain);
    }
