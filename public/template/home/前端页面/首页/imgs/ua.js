if ((navigator.userAgent.match(/(iPhone|iPod|Android|Windows Phone)/i))) { var reg = new RegExp(/www.ithome.com\/html\/.*?\/(\d+).htm/i); var r = window.location.href.match(reg); location.replace("https://wap.ithome.com/html/" + r[1] + ".htm"); }
if (self != top) top.location.href = window.location.href