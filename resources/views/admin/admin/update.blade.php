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
<form class="form-horizontal" role="form" action="{{url('admin/update_do/'.$res->id)}}" method="post" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label for="name">管理员账号</label>
    <input type="text" class="form-control" id="name" name="admin_name" value="{{$res->admin_name}}" >
  </div>
  <b style="color:pink">{{$errors->first('admin_name')}}</b>
  <br>
  <div class="form-group">
    <label for="name">管理员密码</label>
    <input type="text" class="form-control" id="name" name="admin_pwd" value="{{$res->admin_pwd}}">
  </div>
  <b style="color:green">{{$errors->first('admin_pwd')}}</b>
   <br>
  <div class="form-group">
    <label for="inputfile">管理员头像</label>
    <img src="{{env('UPLOAD_URL')}}{{$res->admin_logo}}" width="100px">
    <input type="file" id="inputfile" name="admin_logo">
  </div>
   
  <br>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">编辑管理员</button>
    </div>
  </div>

</form>


