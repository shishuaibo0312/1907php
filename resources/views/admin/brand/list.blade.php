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
<h2 style="color:#00ffff">欢迎{{Auth::user()->name}}登录</h2>
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
			<td>品牌名称</td>
			<td>品牌LOGO</td>
			<td>品牌URL</td>
			<td>品牌详情</td>
			<td>操作</td>
		</tr>
    </thead>
    <tbody>
        @foreach($data as $v)
		<tr class="success">
			<td>{{$v->brand_id}}</td>
			<td>{{$v->brand_name}}</td>
			<td><img src="{{env('UPLOAD_URL')}}{{$v->brand_logo}}" width="100px"></td>
			<td>{{$v->brand_url}}</td>
			<td>{{$v->brand_desc}}</td>
			<td>
				 
				<a href="{{url('brand/delete/'.$v->brand_id)}}" class="btn btn-danger">删除</a>
				<!-- <button type="button" class="btn btn-danger">删除</button> -->
				<!-- <button type="button" class="btn btn-info">修改</button> -->
				<a href="{{url('brand/update/'.$v->brand_id)}}" class="btn btn-info">编辑</a>
			</td>
		</tr>
		@endforeach
    </tbody>
</table>
{{$data->appends($all)->links()}}


​
</body>
</html>
<h3><a href="{{url('brand/add')}}" style="color:#00ffff">添加品牌</a></h3>

