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
<form class="form-horizontal" role="form" action="{{url('admin/add_do')}}" method="post" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label for="name">管理员账号</label>
    <input type="text" class="form-control" id="name" name="admin_name" placeholder="请输入品牌名称">
  </div>
  <b style="color:pink">{{$errors->first('admin_name')}}</b>
  <br>
  <div class="form-group">
    <label for="name">管理员密码</label>
    <input type="text" class="form-control" id="name" name="admin_pwd" placeholder="请输入名称">
  </div>
  <b style="color:green">{{$errors->first('admin_pwd')}}</b>
   <br>
  <div class="form-group">
    <label for="inputfile">管理员头像</label>
    <input type="file" id="inputfile" name="admin_logo">
  </div>
   
  <br>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">添加管理员</button>
    </div>
  </div>

</form>


