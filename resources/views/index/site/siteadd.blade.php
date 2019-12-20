@extends('layouts.shop')
@section('title', '收货地址的添加')
@section('content')
    <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>收货地址</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     <form action="{{url('siteadd_do')}}" method="post" class="reg-login">
      @csrf

      <div class="lrBox">
       <div class="lrList"><input type="text" name="shop_people" placeholder="收货人" /></div>
       <div class="lrList"><input type="text"  name="count_place"  placeholder="详细地址" /></div>
       
        <select class="change" name="province">
         <option>省份/直辖市</option>
         @foreach($data as $v)
         <option value="{{$v->id}}">{{$v->name}}</option>
         @endforeach
        </select>
      
      
        <select class="change" name="city">
         <option value="0" selected="selected">市/县级市</option>
        </select>
      
      
        <select class="change" name="area">
         <option value="0" selected="selected">县/区</option>
        </select>
     
       <div class="lrList"><input type="text" name="tel" placeholder="手机" /></div>
       <div class="lrList2"><input type="text" placeholder="设为默认地址" /> <button>设为默认</button></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" value="保存" />
      </div>
     </form><!--reg-login/-->
     
    
    </div><!--maincont-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/static/index/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/static/index/js/bootstrap.min.js"></script>
    <script src="/static/index/js/style.js"></script>
    <!--jq加减-->
    <script src="/static/index/js/jquery.spinner.js"></script>
   <script>
  $('.spinnerExample').spinner({});
   </script>
  </body>
</html>
@endsection
<script type="text/javascript" src="/jquery.js"></script>
  <script type="text/javascript">
    $(function(){
      //下拉菜单的选取
       $(document).on('change','.change',function(){
        var _this=$(this);  //表示当前要发生内容改变的下拉菜单
        //alert(111);
        _this.nextAll('select').html("<option value=''>--请选择--</option>");
        var id=_this.val();
        //console.log(id);
         $.ajax({
          url:"{{url('getplace')}}/"+id,
          dataType:'json',
         }).done(function(res){
           //console.log(res);
            var _option="<option value=''>--请选择--</option>";
            for(var i in res){
              _option+="<option value='"+res[i]['id']+"'>"+res[i]['name']+"</option>"
            } 
           //console.log(_option);
            _this.next('select').html(_option);
          })
          
          
         
     
    })
})
</script>
