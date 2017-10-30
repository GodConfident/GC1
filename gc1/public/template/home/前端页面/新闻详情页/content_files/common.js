/* IT之家 PC Common JS 20161220 */
$(document).ready(function() {
	$(document).click(function() {
		$(".view_setting").slideUp(300,
		function() {
			$('.item-link-5').removeClass('il5-bg');
		});
	});
	$("img").each(function() {
		$(this).parent("a").css("border", "0");
	}) ;
       $(".view_setting").click(function(e) {
		e.stopPropagation();
	});

	/* 首页新闻标题 */
	var HOMENL = $('.rt .nlst .new-list ul li');
	HOMENL.hover(function() {
		$(this).addClass('mnow');
		$(this).find('.date').hide();
	},
	function() {
		$(this).removeClass('mnow');
		$(this).find('.date').show();
	});

	/* 新闻分类切换 */
	var CTULA = $('.ct ul li a');
	CTULA.click(function() {
		CTULA.removeClass('current');
		$(this).addClass('current');
		var NUMB = $(this).parent().index() + 1;
		//alert(String(NUMB));
		if ($(this).attr('class') == 'current') {
			$('.lst').css({
				'display': 'none'
			});
			$('.lst-' + String(NUMB)).css({
				'display': 'block'
			});
		} else {
			$('.lst').css({
				'display': 'none'
			});
		}
	});

	/* 页码切换 */
	var NLNUM = $('.page_num a');
	NLNUM.click(function() {
		NLNUM.removeClass('current');
		$(this).addClass('current');
		var NUMB = $(this).index() + 1;
		//alert(String(NUMB));
		if ($(this).attr('class') == 'current') {
			$('.new-list .block').css({
				'display': 'none'
			});
			$('.new-list-' + String(NUMB)).css({
				'display': 'block'
			});
		} else {
			$('.new-list .block').css({
				'display': 'none'
			});
		}
	});

	/* 浮动内容 */
	$(window).scroll(function() {
		var bodyTop = 0,
		//bodyHeight = $(window).height(),
		sideTop = $('.sidebar ul').eq(0).height() + 142;
		if (typeof window.pageYOffset != 'undefined') {
			bodyTop = window.pageYOffset;
		} else if (typeof document.compatMode != 'undefined' && document.compatMode != 'BackCompat') {
			bodyTop = document.documentElement.scrollTop;
		} else if (typeof document.body != 'undefined') {
			bodyTop = document.body.scrollTop;
		}
		if (bodyTop > sideTop) {
			$('#crf1').css({
				'position': 'fixed',
				'top': '53px'
			});
		} else {
			$('#crf1').css({
				'position': 'relative',
				'top': '0px'
			});
		}
	});

	/* 侧边分享按钮 */
	$('#goshare').mouseleave(function() {
		clearTimeout(hideTimer);
		$('#bdshare_s').removeAttr('te');
		hideTimer = setTimeout(function() {
			if ($('#bdshare_s').attr('te') != 'displayed') {
				$('#bdshare_l').fadeOut(200,
				function() {
					$('#bdshare_s').prependTo('body');
				});
			}
		},
		100); //鼠标移除元素区域子元素消失
	}).mouseenter(function() {
		$('#bdshare_s').attr('te', 'displayed');
		hideTimer = setTimeout(function() {
			$('#bdshare_s').appendTo('#side_func');
			$('#bdshare_l').addClass('show_bds').fadeIn(200);
		},
		500); //鼠标滑过元素1秒钟显示子元素
		$('#bdshare_l').mouseenter(function() {
			$('#bdshare_s').attr('te', 'displayed');
		}).mouseleave(function() {
			hideTimer = setTimeout(function() {
				$('#bdshare_l').fadeOut(200,
				function() {
					$('#bdshare_s').prependTo('body');
					$('#bdshare_s').removeAttr('te');
				});
			},
			100); //鼠标移除元素区域子元素消失
		});
	});

	$('.related_post a').hover(function() {
		$(this).parent().find('span').addClass('rp_span');
	},
	function() {
		$(this).parent().find('span').removeClass('rp_span');
	});
	
	$('#searchTextbox').bind('keydown',function(event){  
  if(event.keyCode == "13")      
  {  
     $(".sc button").click();  
return false;
  }  
});  

	if(document.getElementById("ifcomment"))
	{ 
	  $(window).scroll(function () {//绑定浏览器窗口对象
          var scrollTop = $(this).scrollTop();
          var scrollHeight = $(document).height();
          var windowHeight = $(this).height();

					if (scrollTop + windowHeight+300  >= scrollHeight)
					{
						if($("#ifcomment").attr("src")==null)
							$("#ifcomment").attr("src",'//dyn.ithome.com/comment/'+	$("#ifcomment").attr("data"));
					}
          if (scrollTop + windowHeight+100  >= scrollHeight) {
          	document.getElementById('ifcomment').contentWindow.AutoifHeight();
	          if($("#ifcomment").contents().find("#commentlatest").is(':checked'))
	           {
	         	 $("#ifcomment").contents().find("#latestpagecomment")[0].click();
	         }
	         else
	          {
	             if( $("#ifcomment").contents().find("#pagecomment").length>0)
	                $("#ifcomment").contents().find("#pagecomment")[0].click();
	           }
           }
         });
	}
});
/* jQuery Document End */

hd_float = "<div id=\"hd_float\" style=\"position:fixed;left:50%;bottom:190px;margin-left:-680px;width:220px;\"><a class=\"close\" href=\"http://go.ruanmei.com/url.aspx?linkid=332\" target=\"_blank\" style=\"display:block;width:175px;height:180px;background:url(//img.ithome.com/images/hb/redenvelopes.gif) no-repeat;\"></a></div>";
document.write(hd_float);
$('#hd_float').prependTo('body');

/* 修复Flash遮挡 */
$('embed').attr('wmode', 'transparent');

if ((navigator.userAgent.match(/(iPhone|iPod|Android|Windows Phone)/i))) {
	app_recom = $('<a href="http://wap.ithome.com" class="go_wap">进入WAP版</a>');
	app_recom.prependTo('#hd');
	$('body').css({
		'padding-top': '86px'
	});
}

function connectLogin(type) {
	var url = "",
	name = "",
	width = "",
	height = "";
	var clienttime = parseInt((new Date).getTime() / 1000)

	switch (type) {
	case "Sina":
		url = "http://www.ithome.com/ithome/openplat/sina/login.aspx";
		name = "SinaLogin";
		width = 562;
		height = 380;
		break;
	case "QQ":
		url = "http://www.ithome.com/openplat/qq/login";
		name = "qq";
		width = 600;
		height = 380;
		break;
	case "WX":
		url = "http://www.ithome.com/ithome/openplat/wx/login.aspx";
		name = "wx";
		width = 580;
		height = 660;
		break;

	}
	if (url) {
		url += "?clienttime=" + clienttime
		var l = (window.screen.width - width) / 2,
		t = (window.screen.height - height) / 2;
		window.open(url, name, "width=" + width + ",height=" + height + ",left=" + l + ",top=" + t + ",menubar=0,scrollbars=0,resizable=0,status=0,titlebar=0,toolbar=0,location=1");
	}

}

$(".login").on({
	click: function() {
		popWin.showWin("400", "620", "软媒通行证登录", "//my.ruanmei.com/?source=ithome");
	}
})

$("#btnLogout").on({
	click: function() {
				var url = "https://www.ithome.com/logout";
				$.getScript(url);
				url = "http://www.lapin365.com/Login/logout";
				$.getScript(url);
				location.reload();

	}
});
 $(".refresh a").on({
	click: function() {
		location.reload();
	}
})

$("body").append("<div style='display:none;'>" + $(".con-recom").css("display") + "</div>");

if ($.cookie('ipadapp') == null && navigator.userAgent.match(/(iPad)/i)) {
	app_top = '<div class="app_recom fly_down"><div class="close"><a href="javascript:;" id="close_app"><img src="//img.ithome.com/images/v2.3/close.png" width="26" height="26"></a></div><a id="a_ad" href="http://m.ruanmei.com/d/it/" style="display: block;" target="_blank"><img src="//img.ithome.com/images/v2.3/ipad.png"></a></div>';
	document.write(app_top);
	$('.app_top').prependTo('body');
	$('#close_app').click(function() {
		$('body').removeClass('app');
		$('.fly_down').remove();
		$.cookie('ipadapp', 'ipadhide', {
			expires: 7
		});
	});
}
function goanswer() {
	location.href="#ifcomment";
}
