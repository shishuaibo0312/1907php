@extends('layouts.shop')
@section('title', '订单成功')
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>购物车</h1>
      </div>
     </header>
     <div class="susstext">订单提交成功</div>
     <div class="sussimg">&nbsp;</div>
     <div class="dingdanlist">
      <table>
       <tr>
        <td width="50%">
       <!--    商品图片：<img src="{{env('UPLOAD_URL')}}{{$data->g_img}}" width="100px" /> -->
         <h3>订单号：{{$data->order_number}}</h3>
         <time><h3 style="color:#00ffff">创建日期：{{date('Y-m:d h:i:s',$data->pay_time)}}</h3>
        <h3 style="color:#0000ff"> 失效日期：{{date('Y-m:d h:i:s',$data->ctime)}}</h3></time>
           <b style="color:#0044ff"> 需要支付</b>：<strong class="orange">¥{{$data->order_amount}}</strong>
       </td>
        <td align="right"><span class="orange">等待支付</span></td>
       </tr>
      </table>
     </div><!--dingdanlist/-->
     <div class="succTi orange">请您尽快完成付款，否则订单将被取消</div>
     
    </div><!--content/-->
    

      <tr>
       <td width="50%"><a href="{{url('/')}}" class="jiesuan" style="background:#5ea626;">继续购物</a></td>
       <td width="50%"><a href="{{url('/phonepay',$data->order_id)}}" class="jiesuan">立即支付</a></td>
      </tr>
     </table>
    </div><!--gwcpiao/-->
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