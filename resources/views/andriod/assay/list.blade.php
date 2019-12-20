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
​<form action="" method="get">
	<input type="text" name="key" value="{{$all['key']??''}}" placeholder="标题名称">
		文章分类：<select name="tid">
		<option value="">--请选择--</option>
		@foreach($date as $v)
		
		<option value="{{$v->tid}}" {{$v['tid'] == request()->tid ? "selected" : ''}}>{{$v->tname}}</option>
		@endforeach
	<input type="submit" value="搜索">

</form>	
<table class="table">
   <!--  <caption>上下文表格布局</caption> -->
    <thead>
    	<tr class="danger">
           
			<td>编号</td>
			<td>文章标题</td>
			<td>文章分类</td>
			<td>文章重要性</td>
			<td>是否显示</td>
			<td>添加时间</td>
			<td>操作</td>
		</tr>
    </thead>
    <tbody>
        @foreach($data as $v)
		<tr class="success" id="{{$v->id}}">
			<td>{{$v->id}}</td>
			<td>{{$v->title}}</td>
			<td>{{$v->tname}}</td>	
			<td>{{$v->type == 1 ? '是' : '否'}}</td>
			<td>{{$v->show == 1 ? '是' : '否'}}</td>
			<td>{{date('Y-m-d h:i:s',$v->time)}}</td>		
			
			<td>
				 
				<!-- <a href="{{url('assay/destroy/'.$v->id)}}" class="btn btn-danger destroy">删除</a> -->
				<button type="button" class="btn btn-danger destroy">删除</button>
				<!-- <button type="button" class="btn btn-info">修改</button> -->
				<a href="{{url('assay/update/'.$v->id)}}" class="btn btn-info">编辑</a>
			</td>
		</tr>
		@endforeach
    </tbody>
</table>

{{$data->appends($all)->links()}}


​
</body>
</html>
<h3><a href="{{url('assay/add')}}" style="color:#00ffff">添加文章</a></h3>
  <script type="text/javascript" src="/jquery.js"></script>

<script type="text/javascript">
	$(function(){
		$(document).on('click','.destroy',function(){
			var _this=$(this);
			//alert(1);
			var _id=_this.parents('tr').attr('id');
			$.ajax({

				url:"{{url('assay/destroy')}}/"+_id,

				}).done(function(res){
					if(res == 1){
						_this.parents('tr').remove();
						location.reload();
					}else{
						alert('删除失败');

					}

				});
					
		})
	})
</script>