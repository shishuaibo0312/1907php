@extends('layouts.shop')
@section('title', '商品展示')
@section('content')

     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <form action="#" method="get" class="prosearch"><input type="text" /></form>
      </div>
     </header>
     <ul class="pro-select">
       <li class="pro-selCur"><a href="javascript:;"  class="ww" >默认</a></li>
       <li><a href="javascript:;" class="ww"  field="g_new">新品</a></li>  
       <li><a href="javascript:;"  class="ww" field="g_jiage">价格</a></li>
     </ul><!--pro-select/-->
     <div class="prolist">
      @foreach($data as $v)
      <dl>
       <dt><a href="{{url('product',$v->gid)}}"><img src="{{env('UPLOAD_URL')}}{{$v->g_img}}" width="100" height="100" /></a></dt>
       <dd>
        <h3><a href="proinfo.html">{{$v->g_name}}</a></h3>
        <div class="prolist-price"><strong>¥{{$v->g_jiage}}</strong> <span>¥{{$v->g_jiage*2}}</span></div>
        <div class="prolist-yishou"><span>5.0折</sp{{env('UPLOAD_URL')}}{{$v->g_img}}an> <em>已售：35</em></div>
       </dd>
       <div class="clearfix"></div>
      </dl>
      @endforeach
     </div><!--prolist/-->
     
      @endsection
<script type="text/javascript" src="/jquery.js"></script>
<script type="text/javascript">
  $(function(){
    $(document).on('click','.ww',function(){
      var _this=$(this);
      _this.parent('li').addClass('pro-selCur').siblings('li').removeClass('pro-selCur');
     //getGoodsInfo();
    })

    // //商品数据  分页
    //       function getGoodsInfo(){
    //         var _this=$(this);
    //        var price=_this.attr('field');

    //         var field=$('.ww').attr('field');
           
    //       console.log(price);
    //        //alert(field);
           
    //       }        
  })
</script>