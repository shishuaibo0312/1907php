	<meta name="csrf-token" content="{{ csrf_token() }}">
<form action="{{url('assay/add_do')}}" method="post" enctype="multipart/form-data" class="submit">
@csrf
	文章标题：<input type="text" name="title" id="title">
	        <b style="color:pink">{{$errors->first('title')}}</b>									
	        <br>
	文章分类：<select name="tid">
		<option value="">--请选择--</option>
		@foreach($data as $v)
		<option value="{{$v->tid}}">{{$v->tname}}</option>
		@endforeach

	</select>

	 	<br>
	文章重要性：<input type="radio" name="type" value="1">普通
	<input type="radio" name="type" value="2">置顶
	 <b style="color:pink">{{$errors->first('type')}}</b>	<br>
	是否显示：<input type="radio" name="show" value="1">显示
	<input type="radio" name="show" value="2">不显示
	 <b style="color:pink">{{$errors->first('show')}}</b>	<br>
	文章作者:<input type="text" name="author"><br>
	作者email：<input type="text" name="email"><br>
	关键字：<input type="text" name="key"><br>
	网页描述：<textarea name="count"></textarea><br>
	上传文件：<input type="file" name="logo"><br>
	<input type="submit" value="添加">
	
</form>
<!--                -->