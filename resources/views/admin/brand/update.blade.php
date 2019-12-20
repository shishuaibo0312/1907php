</body>
</html>

<form class="form-horizontal" role="form" action="{{url('brand/update_do/'.$data->brand_id)}}" method="post" enctype="multipart/form-data">
 <!--  <input type="hidden" name="brand_id" value="{{$data->brand_id}}"> -->
@csrf
  <div class="form-group">
    <label for="name">品牌名称</label>
    <input type="text" class="form-control" id="name" name="brand_name" value="{{$data->brand_name}}" placeholder="请输入品牌名称">
    <b style="color:pink">{{$errors->first('brand_name')}}</b>
  </div>
  <br>
  <div class="form-group">
    <label for="name">品牌URL</label>
    <input type="text" class="form-control" id="name" name="brand_url" value="{{$data->brand_url}}"" placeholder="请输入名称">
  </div>
   <br>
  <div class="form-group">
    <label for="inputfile">品牌LOGO</label>
    <img src="{{env('UPLOAD_URL')}}{{$data->brand_logo}}" width="100px">
    <input type="file" id="inputfile" name="brand_logo">
  </div>
   <br>
  <div class="form-group">
    <label for="name">品牌详情</label>
    <textarea class="form-control" rows="3" name="brand_desc">{{$data->brand_desc}}</textarea>
  </div>
  <br>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">编辑品牌</button>
    </div>
  </div>

</form>


