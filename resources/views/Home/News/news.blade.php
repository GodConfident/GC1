<!-- 首页 尾部 -->
@extends('Home.footer')
<!-- 首页 顶部 广告 -->
@extends('Home.ad_index_top')
<!-- 首页 头部 -->
@extends('Home.header')
<!-- 首页 头部 登录 -->
@extends('Home.index_login')
<!-- 首页 头部  +  右侧边栏  +  导航区域 -->
@extends('Home.index_nav')
<!-- 新闻列表页 中间各个新闻模块 -->
@section('content')
<div class="category_nav">
                <div class="item "><a href="/">IT资讯首页</a></div>

                        <div class="item">
                            <a href="/ityejie/">业界</a>
                        </div>

                        <div class="item cu">
                            <a href="/internet/">网络</a>
                        </div>

                        <div class="item">
                            <a href="/pinglun/">评论</a>
                        </div>

                        <div class="item">
                            <a href="/people/">人物</a>
                        </div>

                        <div class="item">
                            <a href="/hudong/">活动互动</a>
                        </div>

                        <div class="item">
                            <a href="/ruanmei/">阳台</a>
                        </div>

                        <div class="item">
                            <a href="/fun/">囧科技</a>
                        </div>

                        <div class="item">
                            <a href="/chuangye/">创业</a>
                        </div>

                        <div class="item">
                            <a href="/tele/">通信</a>
                        </div>

                        <div class="item">
                            <a href="/ec/">电商</a>
                        </div>

                        <div class="item">
                            <a href="/microsoft/">微软</a>
                        </div>

                        <div class="item">
                            <a href="/apple/">苹果</a>
                        </div>

            </div>
<div id="con">
    <div id="wrapper">
        <div class="content fl" id="leftcontent">
            <div class="it_focus ball">
                <span class="top_icon">
                </span>
                <div class="focus1">
                    <h2>
                        <a href="https://www.ithome.com/bibei/" target="_blank">
                            Win10下载 | Win7下载 | 装机必备软件下载
                        </a>
                    </h2>
                    <span>
                        [
                        <a href="https://www.ithome.com/html/it/213897.htm">
                            辣品！辣品！辣品！
                        </a>
                        ]
                    </span>
                </div>
                <div class="cl">
                </div>
            </div>
            <div id="loading" style="display:none;width:630px;padding-bottom:15px;text-align:center;">
                <img src="./newslist_files/loadingAnimation.gif">
                </img>
            </div>
            <div class="cate_list">
                <ul class="ulcl">
                    @foreach ($newslist as $news1)
                    <li>
                        <a class="list_thumbnail" href="https://www.ithome.com/html/it/332036.htm" style="border: 0px;" target="_blank">
                            <img alt="新闻图片" src="{{$news1['img']}}">
                            </img>
                        </a>
                        <div class="block">
                            <h2>
                                <a href="#" target="_blank">
                                    {{$news1['title']}}
                                </a>
                                <span class="state other">
                                    {{$news1['updated_at']}}
                                </span>
                            </h2>
                            <div class="memo">
                                <p>
                                    {{$news1['content']}}
                                </p>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
<style type="text/css">
    .page_nav .pagination a.current, .page_nav .pagination span.current {
    background-position: 0 -28px;
    color: #d22222;
}
.active{
    border:1px solid red;
    margin:0px;
    padding: 0px;
    display: block;
    overflow: hidden;
    margin-right: 9px;
    width: 28px;
    height: 28px;
    background-size: 84px 7pc;
    color: #000;
    text-align: center;
    font-size: 14px;
    line-height: 28px;
    border-radius: 14px;
    /*display: none;*/
}
.page_nav .pagination a, .page_nav .pagination span.current ,.disabled span{
    float: left;
    display: block;
    overflow: hidden;
    margin-right: 9px;
    width: 28px;
    height: 28px;
    background: url(https://img.ithome.com/images/v2.1/page_nav.png) 0 -56px;
    background-size: 84px 7pc;
    color: #fff;
    text-align: center;
    font-size: 14px;
    line-height: 28px;
}
.page_nav{
    margin-left: 120px;
    margin-top: 10px;
}
.pagination li{
    float: left;
}
</style>
{{-- 新闻分页 分页样式--}}
<div class="page_nav">
    {!! $newslist->render() !!}
</div>
        </div>
        <div class="sidebar">
            <ul>
                <li class="sb_list">
                    <div class="bx">
                    </div>
                </li>
                <li class="sb_list">
                    <div class="bx">
                        <!-- 广告位：IT之家内容页 边栏 300*250 位置3 -->
                        <script>
                            (function() { var s = "_" + Math.random().toString(36).slice(2);
                                document.write('<div id="' + s + '"></div>');
                                (window.slotbydup = window.slotbydup || []).push({ id: '1005739', container: s, size: '300,250', display: 'inlay-fix' }); })();
                        </script>
                        <div id="_g6qsr3fbdr">
                        </div>
                        <script charset="utf-8" src="https://pos.baidu.com/icam?di=1005739&dri=0&dis=0&dai=0&ps=246x908&enu=encoding&dcb=___adblockplus&dtm=SSP_JSONP&dvi=0.0&dci=-1&dpt=none&tsr=0&tpr=1510219605066&ti=IT%E4%B9%8B%E5%AE%B6%EF%BC%88%E5%8D%9A%E5%AE%A2%E7%89%88%EF%BC%89%20-%20%E6%95%B0%E7%A0%81%EF%BC%8C%E7%A7%91%E6%8A%80%EF%BC%8C%E7%94%9F%E6%B4%BB%20-%20%E8%BD%AF%E5%AA%92%E6%97%97%E4%B8%8B&ari=2&dbv=2&drs=1&pcs=1349x675&pss=1349x7120&cfv=0&cpl=5&chi=1&cce=true&cec=UTF-8&tlm=1510219626&prot=2&rw=675<u=file%3A%2F%2F%2FC%3A%2FUsers%2FAdministrator.WIN-BD28FEGD6G9%2FDesktop%2F%25E6%2596%25B0%25E9%2597%25BB%25E5%2588%2597%25E8%25A1%25A8%25E9%25A1%25B5%2Fnewslist.html&ecd=1&uc=1366x768&pis=-1x-1&sr=1366x768&tcn=1510219627">
                        </script>
                        <div id="cpro_u2575614">
                            <iframe align="center,center" allowtransparency="true" frameborder="0" height="250" hspace="0" id="iframeu2575614_2" marginheight="0" marginwidth="0" name="iframeu2575614_2" scrolling="no" src="https://pos.baidu.com/icam?rdid=2575614&dc=3&di=u2575614&dri=2&dis=0&dai=3&ps=246x908&enu=encoding&dcb=___adblockplus&dtm=HTML_POST&dvi=0.0&dci=-1&dpt=none&tsr=0&tpr=1510219605066&ti=IT%E4%B9%8B%E5%AE%B6%EF%BC%88%E5%8D%9A%E5%AE%A2%E7%89%88%EF%BC%89%20-%20%E6%95%B0%E7%A0%81%EF%BC%8C%E7%A7%91%E6%8A%80%EF%BC%8C%E7%94%9F%E6%B4%BB%20-%20%E8%BD%AF%E5%AA%92%E6%97%97%E4%B8%8B&ari=2&dbv=2&drs=1&pcs=1349x675&pss=1349x7120&cfv=0&cpl=5&chi=1&cce=true&cec=UTF-8&tlm=1510219626&prot=2&rw=675<u=file%3A%2F%2F%2FC%3A%2FUsers%2FAdministrator.WIN-BD28FEGD6G9%2FDesktop%2F%25E6%2596%25B0%25E9%2597%25BB%25E5%2588%2597%25E8%25A1%25A8%25E9%25A1%25B5%2Fnewslist.html&ecd=1&uc=1366x768&pis=-1x-1&sr=1366x768&tcn=1510219627&qn=fa302c78fddb1d5f&tt=1510219604995.21976.21976.21977" style="border:0;vertical-align:bottom;margin:0;width:300px;height:250px" vspace="0" width="300">
                            </iframe>
                        </div>
                        <script type="text/javascript">
                            ( window.cproArray = window.cproArray || [] ).push({id: "u2575614"});
                        </script>
                        <script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript">
                        </script>
                        <div id="_4g9htuw2sdc">
                        </div>
                        <script charset="utf-8" src="./newslist_files/wcfm(5)">
                        </script>
                        <div id="cpro_u2575614">
                        </div>
                        <script type="text/javascript">
                            ( window.cproArray = window.cproArray || [] ).push({id: "u2575614"});
                        </script>
                        <script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript">
                        </script>
                        <div id="cpro_u2575614">
                            <iframe align="center,center" allowtransparency="true" frameborder="0" height="250" hspace="0" id="iframeu2575614_0" marginheight="0" marginwidth="0" name="iframeu2575614_0" scrolling="no" src="./newslist_files/wcfm.html" style="border:0;vertical-align:bottom;margin:0;width:300px;height:250px" vspace="0" width="300">
                            </iframe>
                        </div>
                        <script type="text/javascript">
                            ( window.cproArray = window.cproArray || [] ).push({id: "u2575614"});
                        </script>
                        <script src="./newslist_files/c.js.下载" type="text/javascript">
                        </script>
                        <div id="_ytsnhpl857">
                        </div>
                    </div>
                </li>
                <li class="sb_list">
                    <iframe class="hotnews" frameborder="0" marginheight="0" marginwidth="0" scrolling="no" src="./newslist_files/topnews.html">
                    </iframe>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
