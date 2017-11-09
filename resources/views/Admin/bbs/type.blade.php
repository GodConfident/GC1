<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="/template/admin/layui/css/layui.css">
    <link rel="stylesheet" href="/template/admin/fonts/css/font-awesome.min.css">
    <script src="/template/admin/layui/layui.js"></script>
    <script src="/template/admin/jquery-1.8.3.min.js"></script>
</head>
<body style="padding: 10px;">
<div class="user">
    <fieldset class="layui-elem-field layui-field-title">
        <legend>社区分类管理</legend>
    </fieldset>

    <blockquote class="layui-elem-quote">
        <form action="/user" class="layui-form" method="get">
            <button class="layui-btn layui-btn-danger" id='tjyh'>添加新分类</button>
        </form>


    </blockquote>

{{--表格主体--}}
    <table id="demo" lay-filter="oper"></table>
    {{--编辑按钮--}}
    <script type="text/html" id="barDemo">
        <a class="layui-btn layui-btn-mini" lay-event="edit">编辑</a>
        <a class="layui-btn layui-btn-danger layui-btn-mini" lay-event="del">删除</a>
    </script>

    <script>
        // 点击添加模态框
        $('#tjyh').click(function(){
            layer.open({
                type: 1,
                title:"添加分类",
                skin: 'layui-layer-rim', //加上边框
                area: ['420px', '180px'], //宽高
                content: '<form action="/admin/bbs/type"method="post"class="layui-form"style="width: 80%;margin-top: 20px">{{csrf_field()}}<div class="layui-form-item"><label class="layui-form-label">分类标题</label><div class="layui-input-block"><input type="text"name="title"placeholder="分类标题"class="layui-input"></div></div>{{--提交--}}<div class="layui-form-item"><div class="layui-input-block"><button class="layui-btn"lay-submit lay-filter="formDemo">添加</button><button type="reset"class="layui-btn layui-btn-primary">重置</button></div></div></form>'
        });
        return false;
        })

        layui.use(['table','layer'], function(){
            var table = layui.table,
                layer = layui.layer;
            //各自提示
            @if(session('ico'))
            layer.msg('{{session('text')}}', {icon:{{session('ico')}}});
            @endif

            //展示已知数据
            table.render({
                elem: '#demo'
                ,data: [
//                    循环数据
                    @foreach($data as $v)
                    {
                    "id": "{{$v->id}}"
                    ,"title":"{{$v->title}}"
                    ,"rank": "{{$v->rank}}"
                    ,"right": ""
                },
                    @endforeach
                ]
                ,width:'500'
                ,height: 'auto' //高度自适应
                ,cols: [[ //标题栏
                    {field: 'id', title: 'ID', width: 80, sort: true}
                    ,{field: 'title', title: '分类名称', width: 215}
                    ,{field: 'rank', title: '权重', width: 80}
                    ,{fixed: 'right', title: '操作',width:120, toolbar: '#barDemo'}
                ]]
                ,skin: 'row' //表格风格
                ,even: true
                ,page: true //是否显示分页
                ,limits: [10,20]
                ,limit: 10 //每页默认显示的数量
            });
            table.on('tool(oper)', function(obj){ //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
                var data = obj.data; //获得当前行数据
                var layEvent = obj.event; //获得 lay-event 对应的值
                var tr = obj.tr; //获得当前行 tr 的DOM对象
//                当点击修改按钮后执行
                if(layEvent=='edit'){
                    layer.open({
                        type: 1,
                        title:"修改分类",
                        skin: 'layui-layer-rim', //加上边框
                        area: ['420px', '240px'], //宽高
                        content: '<form action="/admin/bbs/type/'+data['id']+'"method="post"class="layui-form"style="width: 80%;margin-top: 20px">{{csrf_field()}}<div class="layui-form-item"><label class="layui-form-label">单页标题</label><div class="layui-input-block"><input type="text"name="title"value="'+data['title']+'"class="layui-input"><input type="hidden"name="_method"value="put"></div></div><div class="layui-form-item"><label class="layui-form-label">权重设置</label><div class="layui-input-block"style="width:50px"><input type="text"name="rank"value="'+data['rank']+'"class="layui-input"></div></div>{{--提交--}}<div class="layui-form-item"><div class="layui-input-block"><button class="layui-btn"lay-submit lay-filter="formDemo">立即提交</button><button type="reset"class="layui-btn layui-btn-primary">重置</button></div></div></form>'
                    });
                }
//                当点击删除按钮后执行
                if(layEvent=='del'){
                    layer.confirm('您确定要删除数据么？', {
                        btn: ['确 定','取 消'] //按钮
                    }, function(){
                        $.post('/admin/bbs/type/'+data['id'],{'_method':'DELETE','_token':'{{csrf_token()}}','id':data['id']},function(msg){
                            if(msg==1){
                                layer.msg('['+data['title']+'],删除成功', {icon: 6});
                                obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
                            }else{
                                layer.msg(data['title']+',删除失败', {icon: 5});
                            }
                        })
                    }, function(){

                    });
                }

            });

        });
    </script>
</div>
<p>　</p>
</body>
</html>