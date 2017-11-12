                    <!-- tb-nav End -->
                </div>
            </div>
            <div class="view view_setting" style="">
                <div class="set_con">
                    <p class="c_st">
                        <span class="set_op">
                            内容字号：
                        </span>
                        <a href="javascript:;" id="fs1">
                            默认
                        </a>
                        <span class="v">
                        </span>
                        <a href="javascript:;" id="fs2">
                            大号
                        </a>
                        <span class="v">
                        </span>
                        <a href="javascript:;" id="fs3">
                            超大号
                        </a>
                    </p>
                    <p class="c_st">
                        <span class="set_op">
                            段落设置：
                        </span>
                        <a href="javascript:;" id="indt">
                            取消段首缩进
                        </a>
                        <a class="hide" href="javascript:;" id="noindt">
                            段首缩进
                        </a>
                    </p>
                    <p class="g_st">
                        <span class="set_op">
                            字体设置：
                        </span>
                        <a href="javascript:;" id="yahei">
                            切换到微软雅黑
                        </a>
                        <a class="hide" href="javascript:;" id="song">
                            切换到宋体
                        </a>
                    </p>
                </div>
            </div>
<style type="text/css">
/*    #top5 #logo {
        height: 80px;
    }*/
</style>
            <div class="col" id="top5">
                <a href="{{url('home/index')}}" id="logo" style="border: 0px none;">
                    <img alt="唠IT" src="{{ asset('template/home/imgs/ithome.png') }}">
                    </img>
                </a>
            {{-- 首页板块列表 --}}
            {!!$string!!}
                <!-- 搜索 -->
                <div class="sc">
                    <form action="//dyn.ithome.com/search" target="_blank">
                        <input name="s" type="hidden" value="10375816656400526905">
                            <input accesskey="s" autocomplete="off" autosave="baidu" class="focus" id="searchTextbox" name="q" results="8" size="24">
                                <button name="sa" onclick='location.href="//dyn.ithome.com/search/adt_all_"+ $("#searchTextbox").val() +"_0.html";' type="button">
                                    搜索
                                </button>
                            </input>
                        </input>
                    </form>
                    <div class="extra_sc" style="">
                        精准搜索请尝试：
                        <a class="js" href="http://dyn.ithome.com/search/" target="_blank" title="精确搜索">
                            精确搜索
                        </a>
                    </div>
                </div>
            </div>
            <div class="indexV2" id="con">

