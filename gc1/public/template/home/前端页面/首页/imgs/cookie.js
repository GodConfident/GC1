﻿setCookie = function (nm, val, y) { var exp = ''; if (y) { var dt = new Date(); dt.setTime(dt.getTime() + (y * 86400000)); exp = '; expires=' + dt.toGMTString(); } document.cookie = nm + '=' + escape(val) + exp + ';path=/;domain=ithome.com'; }
getCookie = function (nm) { var m = ''; if (window.RegExp) { var re = new RegExp(';\\s*' + nm + '=([^;]*)', 'i'); m = re.exec(';' + document.cookie); } return (m ? unescape(m[1]) : ''); }

