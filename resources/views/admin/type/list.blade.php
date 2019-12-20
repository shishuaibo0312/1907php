<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bootstrap 实例 - 上下文类</title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
    <script src="/jquery.js"></script>
    <script src="/static/admin/js/bootstrap.min.js"></script>
</head>
<body>
​{{session('msg')}}
<!-- <form action="" method="get">
	<input type="text" name="key" value="{{$all['key']??''}}"  placeholder="品牌名称">
	<input type="text" name="url" value="{{$all['url']??''}}" placeholder="品牌URL">
	<input type="submit" value="搜索">

</form>	 -->
<table class="table">
   <!--  <caption>上下文表格布局</caption> -->
    <thead>
    	<tr class="danger">
            <td>ID</td>
			<td>分类名称</td>
			<td>是否显示</td>
			<td>是否在导航栏显示</td>
			<td>操作</td>
		</tr>
    </thead>
    <tbody>
        @foreach($data as $v)
		<tr class="success">
			<td>{{$v->tid}}</td>
			<td><?php echo str_repeat('&nbsp;&nbsp;&nbsp;',$v->level*2);?>{{$v->t_name}}</td>
			<td>{{$v->t_show==1 ? "是" : '否'}}</td>
			<td>{{$v->t_nov_show==1 ? "是" : '否'}}</td>
			<td>
				 
				<a href="{{url('type/delete/'.$v->tid)}}" class="btn btn-danger">删除</a>
				<!-- <button type="button" class="btn btn-danger">删除</button> -->
				<!-- <button type="button" class="btn btn-info">修改</button> -->
				<a href="{{url('type/update/'.$v->tid)}}" class="btn btn-info">编辑</a>
			</td>
		</tr>
		@endforeach
    </tbody>
</table>



​
</body>
</html>
<h3><a href="{{url('type/add')}}" style="color:#00ffff">添加品牌</a></h3>

