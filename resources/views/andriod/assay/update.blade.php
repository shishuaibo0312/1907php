	
<form action="{{url('assay/update_do/'.$data->id)}}" method="post" enctype="multipart/form-data">
@csrf
	文章标题：<input type="text" name="title" value="{{$data->title}}">
			 <b style="color:pink">{{$errors->first('title')}}</b>	
	         <br>

	文章分类：<select name="tid">
		<option value="">--请选择--</option>
		@foreach($date as $v)
		<option value="{{$v->tid}}" {{$v->tid == $data->tid ? "selected" : ''}}>{{$v->tname}}</option>
		@endforeach
	</select><br>
	文章重要性：<input type="radio" name="type" value="1" {{$data->type ==1 ? "checked" : ''}}>普通
	<input type="radio" name="type" value="2" {{$data->type ==2  ? "checked" : ''}}>置顶<br>
	是否显示：<input type="radio" name="show" value="1" {{$data->show ==1  ? "checked" : ''}}>显示
	<input type="radio" name="show" value="2" {{$data->show ==2  ? "checked" : ''}}>不显示<br>
	文章作者:<input type="text" name="author" value="{{$data->author}}"><br>
	作者email：<input type="text" name="email" value="{{$data->email}}"><br>
	关键字：<input type="text" name="key" value="{{$data->key}}"><br>
	网页描述：<textarea name="count">{{$data->count}}</textarea><br>

	上传文件：
	<img src="{{env('UPLOAD_URL')}}{{$data->logo}}" width="100px">
	<input type="file" name="logo"><br>
	<input type="submit" value="修改">
	
</form>