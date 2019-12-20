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
<form action="" method="get">
	<input type="text" name="key" value="{{$all['key']??''}}"  placeholder="品牌名称">
	<input type="text" name="url" value="{{$all['url']??''}}" placeholder="品牌URL">
	<input type="submit" value="搜索">

</form>	
<table class="table">
   <!--  <caption>上下文表格布局</caption> -->
    <thead>
    	<tr class="danger">
            <td>ID</td>
			<td>管理员账号</td>
			<td>管理员密码</td>
			<td>管理员头像</td>
			<td>操作</td>
		</tr>
    </thead>
    <tbody>
        @foreach($data as $v)
		<tr class="success">
			<td>{{$v->id}}</td>
			<td>{{$v->admin_name}}</td>
			<td>{{$v->admin_pwd}}</td>			
			<td><img src="{{env('UPLOAD_URL')}}{{$v->admin_logo}}" width="100px"></td>
			
			<td>
				 
				<a href="{{url('admin/delete/'.$v->id)}}" class="btn btn-danger">删除</a>
				<!-- <button type="button" class="btn btn-danger">删除</button> -->
				<!-- <button type="button" class="btn btn-info">修改</button> -->
				<a href="{{url('admin/update/'.$v->id)}}" class="btn btn-info">编辑</a>
			</td>
		</tr>
		@endforeach
    </tbody>
</table>
{{$data->links()}}


​
</body>
</html>
<h3><a href="{{url('admin/add')}}" style="color:#00ffff">添加管理员</a></h3>

