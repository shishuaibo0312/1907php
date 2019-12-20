
​

​

<form class="form-horizontal" role="form" action="{{url('type/add_do')}}" method="post" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label for="name">分类名称</label>
    <input type="text" class="form-control" id="name" name="t_name" placeholder="请输入品牌名称">
  </div>
  <b style="color:pink">{{$errors->first('t_name')}}</b>
  <br>
  <div class="form-group">
    <label for="name">是否展示</label>
    <input type="radio" name="t_show" value="1">是
     <input type="radio" name="t_show" value="2">否
  </div>
   <br>
  <div class="form-group">
    <label for="inputfile">是否在导航栏展示</label>
    <input type="radio" name="t_nov_show" value="1">是
    <input type="radio" name="t_nov_show" value="2">否
  </div>
   <br>
    <div class="form-group">
    <label for="name">父分类</label>
    <select name="parent_id">
      <option value="">--请选择--</option>
      @foreach($data as $v)
      <option value="{{$v->tid}}"><?php echo str_repeat('&nbsp;&nbsp;&nbsp;',$v->level*2);?>{{$v->t_name}}</option>

      @endforeach
    </select>
  </div>
  <br>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">添加分类</button>
    </div>
  </div>

</form>


