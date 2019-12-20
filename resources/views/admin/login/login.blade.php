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
​{{session('msg')}}
{{session('user')}}
<form class="form-horizontal" role="form" action="{{url('login/logindo')}}" method="post" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label for="name">用户名</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="请输入用户名">
  </div>
  <b style="color:pink">{{$errors->first('name')}}</b>
  <br>
  <div class="form-group">
    <label for="name">密码</label>
    <input type="text" class="form-control" id="name" name="password" placeholder="请输入密码">
  </div>
  <b style="color:green">{{$errors->first('password')}}</b>
  
  <br>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-danger">登录</button>
 
    </div>
  </div>

</form>


