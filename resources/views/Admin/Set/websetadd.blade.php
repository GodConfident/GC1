<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="/template/admin/layui/css/layui.css">
    <link rel="stylesheet" href="/template/admin/fonts/css/font-awesome.min.css">
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/template/admin/layui/layui.js"></script>
</head>
<div style="margin-left: 60px">
<!-- 示例-970 -->
<fieldset class="layui-elem-field layui-field-title" style="margin-top:50px">
  <legend>添加网站配置项</legend>
</fieldset>
<fieldset class="layui-elem-field layui-field-title" style="margin-top:50px">
            @if(session('msg'))
                 <legend><h3 style="color:red">{{ session('msg') }}</h3></legend>
            @endif
</fieldset>
    <form action="{{url('/admin/conf/')}}" class="layui-form layui-form-pane" method="post" style="width: 600px">
            {{csrf_field()}}
        <div class="layui-form-item">
            <label class="layui-form-label">
                名称
            </label>
            <div class="layui-input-block">
                <input autocomplete="off" class="layui-input" name="conf_title" placeholder="配置项目名" type="text"/>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">
                标题
            </label>
            <div class="layui-input-block">
                <input autocomplete="off" class="layui-input" name="conf_name" type="text"/>
            </div>
        </div>

        <div class="layui-form-item" style="width:200px">
            <label class="layui-form-label">
                排序
            </label>
            <div class="layui-input-block">
                <input class="layui-input" lautocomplete="off" name="conf_order" type="text" placeholder="0"/>
            </div>
        </div>

  <div class="layui-form-item">
    <label class="layui-form-label">类型</label>
    <div class="layui-input-block">
      <input name="conf_type" title="input"  checked="" type="radio" value="input">
      <input name="conf_type" title="textarea"  type="radio" value="textarea">
      <input name="conf_type" title="radio" type="radio" value="radio">
    </div>
  </div>

        <div class="layui-form-item">
            <label class="layui-form-label">
                项目标语
            </label>
            <div class="layui-input-block">
                <input autocomplete="off" class="layui-input" name="conf_content" type="phone"/>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">
                项目值
            </label>
            <div class="layui-input-block">
                <input class="layui-input" lautocomplete="off" name="conf_value" type="text"/>
            </div>
        </div>

  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">备注</label>
    <div class="layui-input-block">
      <textarea placeholder="请输入内容" class="layui-textarea" name="conf_tips"></textarea>
    </div>
  </div>

        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-filter="formDemo" lay-submit="">
                    立即提交
                </button>
                <button class="layui-btn layui-btn-primary" type="reset">
                    重置
                </button>
            </div>
        </div>
    </form>
</div>
<script>
layui.use(['form', 'layedit', 'laydate'], function(){
  var form = layui.form
  ,layer = layui.layer
});
</script>
</body>
</html>