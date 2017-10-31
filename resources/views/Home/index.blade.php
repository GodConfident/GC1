
<!-- 首页 尾部 -->
@extends('home.footer')

<!-- 首页 顶部 广告 -->
@extends('home.ad_index_top')

<!-- 首页 头部 -->
@extends('home.header')

<!-- 首页 头部 登录 -->
@extends('home.index_login')

<!-- 首页 头部  +  右侧边栏  +  导航区域 -->
@extends('home.index_nav')


<!-- 首页 中间各个新闻模块 -->
@section('content')
<div class="con-block">
<!-- 大左侧栏 -->
    <div class="lf">

<!-- 左侧轮播图 -->
        <div class="bx1">
            <div class="coin-slider" id="coin-slider-coin-slider">
                <div class="coin-slider" id="coin-slider-coin-slider">
                    <div class="coin-slider" id="coin-slider-coin-slider">
                        <div id="coin-slider" style='background-image: url("imgs/d29d99ea-90aa-4946-95b7-50fae735a085.jpg"); width: 300px; height: 375px; position: relative; background-position: left top;'>
                            <item data="https://www.ithome.com/html/digi/331251.htm" target="_blank">
                                <img alt="诺基亚7开箱图赏" height="375" src="imgs/aca89b64-6bbd-42da-820c-45cc04f0eebb.jpg" style="display: none;" width="300">
                                    <span style="display: none;">
                                        诺基亚7开箱图赏
                                    </span>
                                </img>
                            </item>
                            <item data="https://www.ithome.com/html/digi/330935.htm" target="_blank">
                                <img alt="华为Mate 10/10 Pro开箱图赏" height="375" src="imgs/09cefca8-d8c1-43d0-be9e-2764e08e8b0b.jpg" style="display: none;" width="300">
                                    <span style="display: none;">
                                        华为Mate 10/10 Pro开箱图赏
                                    </span>
                                </img>
                            </item>
                            <item data="https://www.ithome.com/html/it/331064.htm" target="_blank">
                                <img alt="联通10月底前开放老用户更改互联网套餐" height="375" src="imgs/d29d99ea-90aa-4946-95b7-50fae735a085.jpg" style="display: none;" width="300">
                                    <span style="display: none;">
                                        联通10月底前开放老用户更改互联网套餐
                                    </span>
                                </img>
                            </item>
                            <div class="cs-title" id="cs-title-coin-slider" style="position: absolute; bottom: 0px; left: 0px; z-index: 1000; opacity: 0.7;">
                                诺基亚7开箱图赏
                            </div>
                            <a class="cs-coin-slider" href="https://www.ithome.com/html/digi/331251.htm" id="cs-coin-slider11" style='width: 100px; height: 188px; float: left; position: absolute; background-position: 0px 0px; left: 0px; top: 0px; opacity: 1; background-image: url("imgs/aca89b64-6bbd-42da-820c-45cc04f0eebb.jpg");' target="_blank">
                            </a>
                            <a class="cs-coin-slider" href="https://www.ithome.com/html/digi/331251.htm" id="cs-coin-slider12" style='width: 100px; height: 188px; float: left; position: absolute; background-position: -100px 0px; left: 100px; top: 0px; opacity: 1; background-image: url("imgs/aca89b64-6bbd-42da-820c-45cc04f0eebb.jpg");' target="_blank">
                            </a>
                            <a class="cs-coin-slider" href="https://www.ithome.com/html/digi/331251.htm" id="cs-coin-slider13" style='width: 100px; height: 188px; float: left; position: absolute; background-position: -200px 0px; left: 200px; top: 0px; opacity: 1; background-image: url("imgs/aca89b64-6bbd-42da-820c-45cc04f0eebb.jpg");' target="_blank">
                            </a>
                            <a class="cs-coin-slider" href="https://www.ithome.com/html/digi/331251.htm" id="cs-coin-slider21" style='width: 100px; height: 187px; float: left; position: absolute; background-position: 0px -188px; left: 0px; top: 188px; opacity: 1; background-image: url("imgs/aca89b64-6bbd-42da-820c-45cc04f0eebb.jpg");' target="_blank">
                            </a>
                            <a class="cs-coin-slider" href="https://www.ithome.com/html/digi/331251.htm" id="cs-coin-slider22" style='width: 100px; height: 187px; float: left; position: absolute; background-position: -100px -188px; left: 100px; top: 188px; opacity: 1; background-image: url("imgs/aca89b64-6bbd-42da-820c-45cc04f0eebb.jpg");' target="_blank">
                            </a>
                            <a class="cs-coin-slider" href="https://www.ithome.com/html/digi/331251.htm" id="cs-coin-slider23" style='width: 100px; height: 187px; float: left; position: absolute; background-position: -200px -188px; left: 200px; top: 188px; opacity: 1; background-image: url("imgs/aca89b64-6bbd-42da-820c-45cc04f0eebb.jpg");' target="_blank">
                            </a>
                            <div id="cs-navigation-coin-slider" style="display: none;">
                                <a class="cs-prev" href="#" id="cs-prev-coin-slider" style="position: absolute; top: 172.5px; left: 0px; z-index: 1001; line-height: 30px; opacity: 0.7;">
                                    prev
                                </a>
                                <a class="cs-next" href="#" id="cs-next-coin-slider" style="position: absolute; top: 172.5px; right: 0px; z-index: 1001; line-height: 30px; opacity: 0.7;">
                                    next
                                </a>
                                <a class="cs-prev" href="#" id="cs-prev-coin-slider">
                                    prev
                                </a>
                                <a class="cs-next" href="#" id="cs-next-coin-slider">
                                    next
                                </a>
                                <a class="cs-prev" href="#" id="cs-prev-coin-slider">
                                    prev
                                </a>
                                <a class="cs-next" href="#" id="cs-next-coin-slider">
                                    next
                                </a>
                            </div>
                            <div class="cs-title" id="cs-title-coin-slider" style="position: absolute; bottom:0; left: 0; z-index: 1000;">
                            </div>
                            <a class="cs-coin-slider" href="https://www.ithome.com/html/digi/331251.htm" id="cs-coin-slider11" style="width:100px; height:188px; float: left; position: absolute;" target="_blank">
                            </a>
                            <a class="cs-coin-slider" href="https://www.ithome.com/html/digi/331251.htm" id="cs-coin-slider12" style="width:100px; height:188px; float: left; position: absolute;" target="_blank">
                            </a>
                            <a class="cs-coin-slider" href="https://www.ithome.com/html/digi/331251.htm" id="cs-coin-slider13" style="width:100px; height:188px; float: left; position: absolute;" target="_blank">
                            </a>
                            <a class="cs-coin-slider" href="https://www.ithome.com/html/digi/331251.htm" id="cs-coin-slider21" style="width:100px; height:187px; float: left; position: absolute;" target="_blank">
                            </a>
                            <a class="cs-coin-slider" href="https://www.ithome.com/html/digi/331251.htm" id="cs-coin-slider22" style="width:100px; height:187px; float: left; position: absolute;" target="_blank">
                            </a>
                            <a class="cs-coin-slider" href="https://www.ithome.com/html/digi/331251.htm" id="cs-coin-slider23" style="width:100px; height:187px; float: left; position: absolute;" target="_blank">
                            </a>
                            <div id="cs-navigation-coin-slider">
                            </div>
                            <div class="cs-title" id="cs-title-coin-slider" style="position: absolute; bottom:0; left: 0; z-index: 1000;">
                            </div>
                            <a class="cs-coin-slider" href="https://www.ithome.com/html/digi/331251.htm" id="cs-coin-slider11" style="width:100px; height:188px; float: left; position: absolute;" target="_blank">
                            </a>
                            <a class="cs-coin-slider" href="https://www.ithome.com/html/digi/331251.htm" id="cs-coin-slider12" style="width:100px; height:188px; float: left; position: absolute;" target="_blank">
                            </a>
                            <a class="cs-coin-slider" href="https://www.ithome.com/html/digi/331251.htm" id="cs-coin-slider13" style="width:100px; height:188px; float: left; position: absolute;" target="_blank">
                            </a>
                            <a class="cs-coin-slider" href="https://www.ithome.com/html/digi/331251.htm" id="cs-coin-slider21" style="width:100px; height:187px; float: left; position: absolute;" target="_blank">
                            </a>
                            <a class="cs-coin-slider" href="https://www.ithome.com/html/digi/331251.htm" id="cs-coin-slider22" style="width:100px; height:187px; float: left; position: absolute;" target="_blank">
                            </a>
                            <a class="cs-coin-slider" href="https://www.ithome.com/html/digi/331251.htm" id="cs-coin-slider23" style="width:100px; height:187px; float: left; position: absolute;" target="_blank">
                            </a>
                            <div id="cs-navigation-coin-slider">
                            </div>
                        </div>
                    </div>
                </div>



                <div class="cs-buttons" id="cs-buttons-coin-slider" style="left: 50%; margin-left: -27.5px; position: relative;">
                    <a class="cs-button-coin-slider cs-active" href="#" id="cs-button-coin-slider-1">
                        1
                    </a>
                    <a class="cs-button-coin-slider" href="#" id="cs-button-coin-slider-2">
                        2
                    </a>
                    <a class="cs-button-coin-slider" href="#" id="cs-button-coin-slider-3">
                        3
                    </a>
                    <a class="cs-button-coin-slider" href="#" id="cs-button-coin-slider-1">
                        1
                    </a>
                    <a class="cs-button-coin-slider" href="#" id="cs-button-coin-slider-2">
                        2
                    </a>
                    <a class="cs-button-coin-slider" href="#" id="cs-button-coin-slider-3">
                        3
                    </a>
                    <a class="cs-button-coin-slider" href="#" id="cs-button-coin-slider-1">
                        1
                    </a>
                    <a class="cs-button-coin-slider" href="#" id="cs-button-coin-slider-2">
                        2
                    </a>
                    <a class="cs-button-coin-slider" href="#" id="cs-button-coin-slider-3">
                        3
                    </a>
                </div>



                <div class="cs-buttons" id="cs-buttons-coin-slider">
                </div>
                <div class="cs-buttons" id="cs-buttons-coin-slider">
                </div>
            </div>
        </div>
<!-- 左侧轮播图  end-->

<!-- 左侧下载模块-->
        <div class="bx2">
            <div class="bx-title">
                <div class="border">
                </div>
                软媒旗下产品下载
            </div>
            <ul>
                <li>
                    <a href="http://qiyu.ruanmei.com/" style="border: 0px none;">
                        <img alt="旗鱼浏览器" height="38" src="imgs/qiyu_icon.gif" width="38">
                        </img>
                    </a>
                    <p class="pro-name">
                        <a href="http://qiyu.ruanmei.com/" target="_blank">
                            旗鱼浏览器 2.11 正式版
                        </a>
                    </p>
                    <a class="down_btn" href="http://qiyu.ruanmei.com/" target="_blank">
                        立即下载
                    </a>
                </li>
                <li>
                    <a href="http://sj.ruanmei.com/" style="border: 0px none;">
                        <img alt="软媒时间" height="38" src="imgs/mytime.png" width="38">
                        </img>
                    </a>
                    <p class="pro-name">
                        <a href="http://sj.ruanmei.com/" target="_blank">
                            软媒时间 3.19 正式版
                        </a>
                    </p>
                    <a class="down_btn" href="http://down.ruanmei.com/tweakcube/partner/mytimesetup_u136.exe" target="_blank">
                        立即下载
                    </a>
                </li>
                <li>
                    <a href="http://mofang.ruanmei.com/" style="border: 0px none;">
                        <img alt="软媒魔方" height="38" src="imgs/tweakcube_icon.gif" width="38">
                        </img>
                    </a>
                    <p class="pro-name">
                        <a href="http://mofang.ruanmei.com/" target="_blank">
                            软媒魔方 6.21 正式版
                        </a>
                    </p>
                    <a class="down_btn" href="http://sw.bos.baidu.com/sw-search-sp/software/b134fcea174df/pcmaster_6.2.1.0_setup_u92.exe" target="_blank">
                        立即下载
                    </a>
                </li>
                <li>
                    <a href="http://m.ruanmei.com/d/it/" style="border: 0px none;">
                        <img alt="唠ITApp客户端" height="38" src="imgs/ithome_icon.gif" width="38">
                        </img>
                    </a>
                    <p class="pro-name">
                        <a href="http://m.ruanmei.com/d/it/" target="_blank">
                            唠ITApp客户端
                        </a>
                    </p>
                    <a class="down_btn" href="http://m.ruanmei.com/d/it" target="_blank">
                        立即下载
                    </a>
                </li>
            </ul>
            <div class="zj">
                <a href="https://www.ithome.com/bibei/" target="_blank">
                    >> 装机必备软件大全
                </a>
            </div>
        </div>
<!-- 左侧下载模块 end-->

    </div>
<!-- 大左侧栏 end -->

    <div class="rt">
        <div class="focus_area">






<!-- 焦点关注新闻 -->
            <div class="focus">
                <div class="block-title">
                    焦点关注
                </div>
                <ul>
                    <li>
                        <a href="https://www.ithome.com/html/it/331349.htm" style="border: 0px none;" target="_blank">
                            <img alt="11月起，旅客可用微信支付购买火车票" src="imgs/6844fdec-f2a2-4969-9882-10a890c6af5e.jpg">
                            </img>
                        </a>
                        <h2 class="focus-title">
                            <a href="https://www.ithome.com/html/it/331349.htm" target="_blank">
                                11月起，旅客可用微信支付购买火车票
                            </a>
                        </h2>
                        <p>
                            铁路部门计划将于11月份陆续推出互联网、车站窗口及ATM自助售票机购票微信支付功能
                        </p>
                    </li>
                    <li>
                        <a href="https://www.ithome.com/html/it/331157.htm" style="border: 0px none;" target="_blank">
                            <img alt="特斯拉重申将在华建厂" src="imgs/66ea1faf-25a6-4abe-be9f-a7e71989b429.jpg">
                            </img>
                        </a>
                        <h2 class="focus-title">
                            <a href="https://www.ithome.com/html/it/331157.htm" target="_blank">
                                特斯拉重申将在华建厂
                            </a>
                        </h2>
                        <p>
                            计划在上海建设一座工厂，并有望在年底达成协议。
                        </p>
                    </li>
                </ul>
            </div>
<!-- 焦点关注新闻  end-->





<!-- 专题入口 -->
            <div class="zhuant">
                <div class="block-title">
                    专题入口
                </div>
                <ul>
                    <li>
                        <a href="http://win10.ithome.com/" target="_blank">
                            Win10专题
                            <span>
                                （下载/安装/疑难解答）
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="http://m.ruanmei.com/d/it/" target="_blank">
                            唠IT客户端
                            <span>
                                （iOS/安卓/WP/Win10）
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.ithome.com/bibei/" target="_blank">
                            装机必备大全
                            <span>
                                （Win7/Win8/Win10）
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="http://wp.ithome.com/" target="_blank">
                            Win10手机系统预览版专题
                            <span>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.ithome.com/zhuanti/win7baodian/" target="_blank">
                            秘笈《Win7宝典》
                            <span>
                                （教你玩转Win7）
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="nlst">
<!-- 专题入口  end-->






            <div class="ct">
                <ul>
                    <li>
                        <a class="current" href="javascript:;">
                            最新更新
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            最热排行
                        </a>
                    </li>
                </ul>
                <span>
                    今日更新文章
                    <strong>
                        138
                    </strong>
                    篇，网友评论
                    <strong>
                        22489
                    </strong>
                    次
                </span>
            </div>




<!-- 新闻列表     每块列表9条 -->
            <div class="lst lst-1 new-list">
                <div class="block 4602 new-list-1">

                    <ul>
                        <li class="top">
                            <span class="date" style="display: block;">
                                21日
                            </span>
                            <span class="title">
                                <a href="https://www.ithome.com/html/it/331059.htm" target="_blank">
                                    10月24日辣品福包：30天虾米SVIP、45天QQ豪华黄钻、双11现金红包
                                </a>
                            </span>
                        </li>
                    </ul>

                    <ul>
                        <li class="new">
                            <span class="date" style="display: block;">
                                今日
                            </span>
                            <span class="title">
                                <a href="https://www.ithome.com/html/game/331411.htm" target="_blank">
                                    《小米枪战：大逃杀》游戏视频/截图曝光：画质喜人
                                </a>
                            </span>
                        </li>
                    </ul>


                    <ul>
                        <li class="new">
                            <span class="date" style="display: block;">
                                今日
                            </span>
                            <span class="title">
                                <a href="https://www.ithome.com/html/auto/331429.htm" target="_blank">
                                    全新荣威360 PLUS配置曝光：标配8英寸中控屏、LED日间行车灯
                                </a>
                            </span>
                        </li>
                    </ul>




                    <ul>
                        <li class="new">
                            <span class="date" style="display: block;">
                                今日
                            </span>
                            <span class="title">
                                <a href="https://www.ithome.com/html/it/331402.htm" target="_blank">
                                    乐视梁军与孙宏斌之争：梁军要创新，孙宏斌要盈利
                                </a>
                            </span>
                        </li>
                        <li class="new">
                            <span class="date" style="display: block;">
                                今日
                            </span>
                            <span class="title">
                                <a href="https://www.ithome.com/html/it/331400.htm" target="_blank">
                                    剁手不吃土！2017天猫双11超实用省钱攻略
                                </a>
                            </span>
                        </li>
                        <li>
                            <span class="date">
                                21日
                            </span>
                            <span class="title">
                                <a href="http://lapin.ithome.com/html/digi/331038.htm" target="_blank">
                                    APP创意秀才艺/拒绝浪费用纸，乐写9寸柔性屏液晶手写板49.9元（30元券）
                                </a>
                            </span>
                        </li>
                    </ul>

                    <ul>
                        <li class="new">
                            <span class="date" style="display: block;">
                                今日
                            </span>
                            <span class="title">
                                <a href="https://www.ithome.com/html/android/331420.htm" target="_blank">
                                    vivo X20Plus评测：全面屏手机的“大逆”之道
                                </a>
                            </span>
                        </li>
                    </ul>

                    <ul>
                        <li class="new">
                            <span class="date">
                                今日
                            </span>
                            <span class="title">
                                <a href="http://lapin.ithome.com/html/digi/331389.htm" target="_blank">
                                    中国诗词大会推荐，《唐诗宋词元曲》 插盒精装版全8册19.8元（20元券）
                                </a>
                            </span>
                        </li>
                    </ul>
                </div>
    <!-- 隐藏的新闻列表 -->
                <div class="block 4602 new-list-2" style="display:none;">
                    <ul>
                        <li class="new">
                            <span class="date">
                                今日
                            </span>
                            <span class="title">
                                <a href="https://www.ithome.com/html/auto/331380.htm" target="_blank">
                                    汽车充电从此不用掏钱，能源公司Ovo开发出可自动赚钱的电能系统
                                </a>
                            </span>
                        </li>
                    </ul>

                    <ul>
                        <li class="new">
                            <span class="date">
                                今日
                            </span>
                            <span class="title">
                                <a href="https://www.ithome.com/html/android/331353.htm" target="_blank">
                                    Pixel 2 XL曝“烧屏”问题，谷歌称正在调查
                                </a>
                            </span>
                        </li>
                    </ul>

                    <ul>
                        <li class="new">
                            <span class="date">
                                今日
                            </span>
                            <span class="title">
                                <a href="https://www.ithome.com/html/digi/331371.htm" target="_blank">
                                    当前最快！芝奇发布全新笔记本内存条：DDR4-3800MHz
                                </a>
                            </span>
                        </li>
                    </ul>

                    <ul>
                        <li class="new">
                            <span class="date">
                                今日
                            </span>
                            <span class="title">
                                <a href="https://www.ithome.com/html/it/331344.htm" target="_blank">
                                    中国联通回应：尚未支持老用户任意改换互联网套餐
                                </a>
                            </span>
                        </li>
                    </ul>

                    <ul>
                        <li class="new">
                            <span class="date">
                                今日
                            </span>
                            <span class="title">
                                <a href="https://www.ithome.com/html/digi/331362.htm" target="_blank">
                                    索尼发布IMX324传感器：一眼可看160米
                                </a>
                            </span>
                        </li>
                    </ul>

                    <ul>
                        <li class="new">
                            <span class="date">
                                今日
                            </span>
                            <span class="title">
                                <a href="https://www.ithome.com/html/it/331334.htm" target="_blank">
                                    《时代》评史上最具影响力的15个网站：谷歌第一
                                </a>
                            </span>
                        </li>
                    </ul>
                </div>
    <!-- 隐藏的新闻列表  end-->
<!-- 新闻列表     每块列表9条 -->

        <!-- 页码  -->
                <div class="page_nav">
                    <span class="page_num">
                        <a class="current" href="javascript:void(0)">
                            1
                        </a>
                        <a href="javascript:void(0)">
                            2
                        </a>
                        <a href="javascript:void(0)">
                            3
                        </a>
                        <a href="javascript:void(0)">
                            4
                        </a>
                        <a href="javascript:void(0)">
                            5
                        </a>
                    </span>
                    <span class="all_news">
                        <a class="date_list" href="https://www.ithome.com/blog/">
                            博客版
                        </a>
                        <span class="v">
                            |
                        </span>
                        <a class="date_list" href="https://www.ithome.com/list/">
                            新闻日历...
                        </a>
                    </span>
                </div>
        <!-- 页码  end -->

            </div>
        </div>
    </div>
</div>
@endsection