@extends('layouts.shop')
@section('title', '商品展示')
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>产品详情</h1>
      </div>
     </header>
     <div id="sliderA" class="slider">
      @foreach($date['g_imgs'] as $v)
      <img src="{{env('UPLOAD_URL')}}{{$v}}" />
     @endforeach
     </div><!--sliderA/-->
     <table class="jia-len">
      <tr>
       <th><strong class="orange">{{$date->g_jiage}}</strong></th>
       <td>
       <button class="less">-</button>
        <input type="text" class="buy_number" style="width: 30px ;color:#00ffff;" value="1">
       <button class="add">+</button>
       </td>
      </tr>
      <tr>
       <td>
        <strong>{{$date->g_name}}</strong>
        <p class="hui">{{$date->g_count}}</p>
       </td>
       <td align="right">
        <a href="javascript:;" class="shoucang"><span class="glyphicon glyphicon-star-empty"></span></a>
       </td>
      </tr>
     </table>
     <div class="height2"></div>
     <h3 class="proTitle">商品规格</h3>
     <ul class="guige">
      <li class="guigeCur"><a href="javascript:;">50ML</a></li>
      <li><a href="javascript:;">100ML</a></li>
      <li><a href="javascript:;">150ML</a></li>
      <li><a href="javascript:;">200ML</a></li>
      <li><a href="javascript:;">300ML</a></li>
      <div class="clearfix"></div>
     </ul><!--guige/-->
     <div class="height2"></div>
     <div class="zhaieq">
      <a href="javascript:;" class="zhaiCur">商品简介</a>
      <a href="javascript:;">商品参数</a>
      <a href="javascript:;" style="background:none;">订购列表</a>
      <div class="clearfix"></div>
     </div><!--zhaieq/-->
     <div class="proinfoList">
      <img src="{{env('UPLOAD_URL')}}{{$date->g_img}}" width="636" height="822" />
     </div><!--proinfoList/-->
     <div class="proinfoList">
      暂无信息....
     </div><!--proinfoList/-->
     <div class="proinfoList">
      暂无信息......
     </div><!--proinfoList/-->
     <table class="jrgwc">
      <tr>
       <th>
        <a href="index.html"><span class="glyphicon glyphicon-home"></span></a>
       </th>
       <td><button id="addcar">加入购物车</button></td>
      </tr>
     </table>

    
 @endsection


<script type="text/javascript" src="/jquery.js"></script>
<script>

  //页面加载
    $(function(){
      //加号
        $(document).on('click','.add',function(){
          var _this=$(this);
          var buy_number=parseInt($('.buy_number').val());
          //alert(buy_number);
          buy_number+=1;
          $('.buy_number').val(buy_number);
        })
      //减号
        $(document).on('click','.less',function(){
          var _this=$(this);
             //alert(111);
          var buy_number=parseInt($('.buy_number').val());
          //alert(buy_number);
          buy_number-=1;
          if(buy_number<=1){
             $('.buy_number').val(1);
          }else{
             $('.buy_number').val(buy_number);
          }
         
        })
     //点击加入购物车
         $(document).on('click','#addcar',function(){
          //alert(111);exit;
            var buy_number=$('.buy_number').val();
            var gid="{{$date->gid}}";
           //alert(buy_number);
            //console.log(gid);
             $.ajax({
              method:'POST',
             url:"{{url('caradd')}}",

              data:{ buy_number:buy_number,gid:gid, _token:"{{csrf_token()}}"},
            }).done(function(res){
             //console.log(res);
              if(res == 1){
              
                alert('添加购物车成功');location.href='/carlist';
              }else{
                alert('添加购物车失败');
              }
              

            });
         })
  

    })


</script>
 