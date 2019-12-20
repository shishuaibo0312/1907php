</body>
</html>

<!-- @if ($errors->any())
 <div class="alert alert-danger">
 <ul>
 @foreach ($errors->all() as $error)
 <li>{{ $error }}</li>
 @endforeach
 </ul>
 </div>
@endif -->
​
<form class="form-horizontal" role="form" action="{{url('brand/add_do')}}" method="post" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label for="name">品牌名称</label>
    <input type="text" class="form-control" id="name" name="brand_name" placeholder="请输入品牌名称">
  </div>
  <b style="color:pink">{{$errors->first('brand_name')}}</b>
  <br>
  <div class="form-group">
    <label for="name">品牌URL</label>
    <input type="text" class="form-control" id="name" name="brand_url" placeholder="请输入名称">
  </div>
  <b style="color:green">{{$errors->first('brand_url')}}</b>
   <br>
  <div class="form-group">
    <label for="inputfile">品牌LOGO</label>
    <input type="file" id="inputfile" name="brand_logo">
  </div>
   <br>
  <div class="form-group">
    <label for="name">品牌详情</label>
    <textarea class="form-control" rows="3" name="brand_desc"></textarea>
  </div>
  <br>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">添加品牌</button>
    </div>
  </div>

</form>


