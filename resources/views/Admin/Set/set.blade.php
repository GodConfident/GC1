<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="/template/admin/layui/css/layui.css">
    <link rel="stylesheet" href="/template/admin/fonts/css/font-awesome.min.css">
    <script src="/template/admin/layui/layui.js"></script>
    <script src="/js/jquery-3.2.1.min.js"></script>
    <style type="text/css">
    .user{
        margin-left: 50px;
        margin-top:50px;
    }
</style>
</head>
<body style="padding: 10px;background: #fff;">
    <div class="user">
        <fieldset class="layui-elem-field layui-field-title">
            <legend>站点管理</legend>
        </fieldset>
        <form action="{{url('/admin/conf/webchange')}}" class="layui-form layui-form-pane" method="post">
            <!-- <div class="layui-form"> -->
                {{csrf_field()}}
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-filter="formDemo" lay-submit="" style="margin-top:10px;margin-left: -90px">
                            提交修改
                        </button>
                    </div>
                </div>
                <!-- <button>提交修改</button> -->

                <table class="layui-table" lay-size="sm" style="margin: 0 0;">
                    <colgroup>
                        <col width="60">
                        <col width="80">
                        <col width="130">
                        <col width="60">
                        <col width="240">
                        <col width="140">
                        <col width="100">
                        <col width="200">
                        <col width="100">
                    </colgroup>
                    <thead>
                        <tr >
                            <th>排序</th>
                            <th >ID</th>
                            <th >项目标题</th>
                            <th >英文名</th>
                            <th >项目标语</th>
                            <th >备注</th>
                            <th >标签类型</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{--dd($data)--}}
                        @foreach ($conf as $k => $v)
                        <tr>
                            <td  >
                                <div class="layui-form-item" >  <input value ="{{$v->conf_order}}" onblur="orders({{ $v->id}},this.value)"  autocomplete="off" class="layui-input" name="conf_order" type="phone"/> </div>
                            </td>
                            <td > {{ $v->id}}</td>
                            <td> {{ $v->conf_title}}</td>
                            <td> {{ $v->conf_name}}</td>
                            <td> {!! $v->conf_content !!}</td>
                            <td> {{ $v->conf_tips}}</td>
                            <td> {{ $v->conf_type}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- </div> -->
            </form>

        </div>
        <p>　</p>
        <script>
            layui.use(['form', 'layedit', 'laydate'], function(){
              var form = layui.form,
              layer = layui.layer
          });

function orders(id,conf_order){
    // alert(conf_order);
        $.get('conf/'+id+'/edit',{"conf_order":conf_order},function(s){
            // alert(s);
           if( s == 1){
               alert('修改成功');
               location.href = location.href;
           }else{
                alert('修改失败');
               // layer.msg(data.msg, {icon: 5});
               location.href = location.href;
           }
        });
}
</script>
</body>
</html>