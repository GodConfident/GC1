<html xmlns="http://www.w3.org/1999/xhtml"><head id="Head1"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title>
	用户激活
</title>
    <link href="/login_files/style.css" rel="stylesheet" type="text/css"><meta property="qc:admins" content="26733071625165516375"><meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <script type="text/javascript" src="/login_files/jquery.js"></script>
    <script type="text/javascript" src="/login_files/common.js"></script>
    <script type="text/javascript" src="/login_files/default.js"></script>
    <script type="text/javascript" src="/login_files/lrz.all.bundle.js"></script>
</head>

<body class="lr" style="background-color: rgb(246, 246, 246);">
    <form method="get" action="/admin/activation/create" id="form1" class="form_style">
<div class="aspNetHidden">
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwULLTE2OTY3ODA1OTZkZGBq6rWnVklKLPArhNW/WjGDZFsSNGfHowLnNR9VNFsi">
</div>

<div class="aspNetHidden">

</div>
        
      <!--   <div id="rm_login">
            <div class="txtAccount">用户激活</div>
            <div class="product">
            </div>
            
            <div id="login_panel" style="display: none;">
                <div class="userinput_parent">
                    <div class="user_input_text">&nbsp;</div>
                    <div>
                        <input type="text" class="user_input" id="txtEmail" placeholder="邮箱">
                    </div>
                </div>
                <div class="userinput_parent">
                    <div style="float: left">
                        <div class="user_input_text">&nbsp;</div>
                        <div>
                            <input type="password" class="user_input user_pw" id="txtPwd" placeholder="密码">
                        </div>
                    </div>
                    <a class="forgotpsw a_link" href="javascript:forgetpsw_clilcked()">忘记密码？</a>
                </div>
                <a class="loginbtn" href="javascript:loginbtn_clicked()">登录</a>
                <div class="remember_me_parent">
                    <a class="remember_me_link" href="javascript:remember_me_click()" title="">
                        <img id="remember_me_img" width="15" height="15" alt="" src="/login_files/checked.png"></a>
                    <div id="remember_me_text_parent"><a href="javascript:remember_me_click()" class="remember_me a_link" title="">记住我</a></div>
                    <a href="javascript:regnow_clicked()"><img width="15" height="15" alt="" src="/login_files/arraw.png" class="reg_now_img"></a>
                    <div><a class="reg_now a_link" href="javascript:regnow_clicked()">立即注册</a></div>
                </div>
            </div>
            
            <div id="reg_panel" style="">
                <div class="userinput_parent">
                    <div class="user_input_text">&nbsp;</div>
                    <input type="number" class="user_input" id="phone" placeholder="手机号">
                </div>
                <div id="validateParent" class="userinput_parent" style="display:none;">
                    <div class="user_input_text">&nbsp;</div>
                    <input type="text" class="user_input validate_input" id="validate" onblur="this.value = this.value.toLowerCase();" placeholder="请输入验证码，再发送短信">
                    <img src="/login_files/validate.aspx" onclick="this.src = &#39;validate.aspx?&#39; + Math.random()" alt="将图中的文字填到左边输入框中" id="randomNoImg">
                </div>
                <div class="userinput_parent no_border">
                    <div class="code_parent">
                        <div class="user_input_text">&nbsp;</div>
                        <div>
                            <input type="number" class="user_input code_input" id="code" placeholder="短信验证码">
                        </div>
                    </div>
                    <a id="sendsms" class="sendsms sendsms_enable a_link" href="javascript:send_sms_click()">获取验证码</a>
                </div>
                <div><a class="regbtn" href="javascript:registerbtn_clicked()">注册</a></div>
                <div><a class="login_now a_link" href="javascript:loginnow_clicked()">我已有软媒通行证，立即登录</a></div>
            </div>
            <div class="one_press_login_parent">
                <img src="/login_files/line.png" alt="线" width="270" height="1" class="one_press_login_img">
                <div class="one_press_login">一键登录</div>
            </div>
            <div id="openplat">
                <span class="openplaticon qqlogin_parent">
                    <a href="javascript:connectLogin(&#39;qq&#39;);" title="使用QQ帐号登录">
                        <img width="40" height="40" src="/login_files/iconqq.png" alt=""></a>
                </span>
                
                <span class="openplaticon wxlogin_parent">
                    <a href="javascript:connectLogin(&#39;wx&#39;);" title="使用微信帐号登录">
                        <img width="40" height="40" src="/login_files/iconwechat.png" alt=""></a>
                </span>
                <span class="openplaticon sinalogin_parent">
                    <a href="javascript:connectLogin(&#39;sina&#39;)" title="使用新浪微博帐号登录">
                        <img width="40" height="40" src="/login_files/iconweibo.png" alt=""></a>
                </span>
            </div>
        </div>
         -->

        
        <div id="rm_forgetpassword">
            <div id="fp_step1">
                <div class="fp_title">用户激活,欢迎新用户</div>
                <div class="userinput_parent">
                    <div class="user_input_text">&nbsp;</div>
                    <div>
                        <input type="text" class="user_input" id="txtFpEmail" readonly="" value="{{ session('user')->phone }}">
                    </div>
                </div>
               <!--  <div id="validateParentFP" class="userinput_parent">
                    <div class="user_input_text">&nbsp;</div>
                    <input type="text" class="user_input validate_input" id="validateFP" onblur="this.value = this.value.toLowerCase();" placeholder="请先输入验证码">
                    <img src="/login_files/validate(1).aspx" onclick="this.src = &#39;validate.aspx??s=fp&amp;r=&#39; + Math.random()" alt="将图中的文字填到左边输入框中" id="randomNoImgFP">
                </div> -->
                <div class="userinput_parent no_border">
                    <div class="code_parent">
                        <div class="user_input_text">&nbsp;</div>
                        <div>
                            <input type="text" name="code" class="user_input code_input" id="txtFpCode" placeholder="验证码">
                        </div>
                    </div>
                    <a id="fp_sendsms" class="sendsms sendsms_enable a_link" >获取验证码</a>
                </div>
                <button class="fp_nextbtn"">提交</button>
                <script type="text/javascript">
                    $('#fp_sendsms').click(function(){
                        $.ajax({
                            type:'get',
                            data:{"code":"{{ $code }}" },
                            url:'{{url("/admin/activation/1")}}',
                            success:function(m){
                                
                            }
                        })
                        var $this = $(this)
                        var time=59
                        var dt = setInterval(function(){
                            $this.text(time--)
                            if(time<-1){
                                time=59;
                                $this.text('重新获取')
                                clearInterval(dt)
                            }
                        },1000)
                    })
                    @if(count($errors)>0)
                        alert("{{ $errors }}");
                    @endif
                </script>
            </div>
        </div>
        
    </form>
    
    <div class="error_msg">
        <div class="error_mask"></div>
        <div class="error_content">
            <img class="error_img" src="/login_files/ok.png" width="50" height="50" alt="ok">
            <div class="error_text"></div>
        </div>
    </div>
    <div class="avater_qq_msg">
        <div class="aq_mask"></div>
        <div class="aq_content">
            <div class="aq_text">上传头像、填写QQ号码各获得50金币，您确定要放弃领取金币吗？</div>
            <div style="display: inline-flex">
                <a class="aq_backbtn" href="javascript:ContinueAvaterAndQQMessage()">放弃金币</a>
                <a class="aq_savebtn" href="javascript:HideAvaterAndQQMessage()">返回填写</a>
                <input type="hidden" id="data" value="B30FC472DA56F3D3CFED0FAC8AEBBDFE4CAD22A79C2BE56606E6EB5470C4FCFA">
            </div>
        </div>
    </div>


<div style="position: static; display: none; width: 0px; height: 0px; border: none; padding: 0px; margin: 0px;"><div id="trans-tooltip"><div id="tip-left-top" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-left-top.png&quot;);"></div><div id="tip-top" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-top.png&quot;) repeat-x;"></div><div id="tip-right-top" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-right-top.png&quot;);"></div><div id="tip-right" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-right.png&quot;) repeat-y;"></div><div id="tip-right-bottom" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-right-bottom.png&quot;);"></div><div id="tip-bottom" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-bottom.png&quot;) repeat-x;"></div><div id="tip-left-bottom" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-left-bottom.png&quot;);"></div><div id="tip-left" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-left.png&quot;);"></div><div id="trans-content"></div></div><div id="tip-arrow-bottom" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-arrow-bottom.png&quot;);"></div><div id="tip-arrow-top" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-arrow-top.png&quot;);"></div></div></body></html>