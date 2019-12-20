@extends('layouts.shop')
@section('title', '首页')
@section('content')

     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
      <dl>
       <dt><a href="user.html"><img src="/static/index/images/touxiang.jpg" /></a></dt>
       <dd>
        <h1 class="username">三级分销终身荣誉会员</h1>
        <ul>
         <li><a href="prolist.html"><strong>34</strong><p>全部商品</p></a></li>
         <li><a href="javascript:;"><span class="glyphicon glyphicon-star-empty"></span><p>收藏本店</p></a></li>
         <li style="background:none;"><a href="javascript:;"><span class="glyphicon glyphicon-picture"></span><p>二维码</p></a></li>
         <div class="clearfix"></div>
        </ul>
       </dd>
       <div class="clearfix"></div>
      </dl>
     </div><!--head-top/-->
     <form action="" method="get" class="search">
      <input type="text" class="seaText fl" name="key" value="{{$all['key']??''}}" placeholder="商品名称" />
      <input type="submit" value="搜索" class="seaSub fr" />
     </form><!--search/-->
     <ul class="reg-login-click">
      <li><a href="{{url('logins')}}">登录</a></li>
      <li><a href="{{url('reg')}}" class="rlbg">注册</a></li>
      <div class="clearfix"></div>
     </ul><!--reg-login-click/-->
     <div id="sliderA" class="slider">
      @foreach($data as $v)
      <img src="{{env('UPLOAD_URL')}}{{$v->g_img}}"  />
      @endforeach
     </div><!--sliderA/-->
     <ul class="pronav">
       @foreach($date as $v)
      <li><a href="{{url('list',$v->tid)}}">{{$v->t_name}}</a></li>
      @endforeach
      <div class="clearfix"></div>
     </ul><!--pronav/-->
     <div class="index-pro1">
         @foreach($data as $v)
      <div class="index-pro1-list" >
     
       <dl>
        <dt><a href="{{url('product',$v->gid)}}"><img src="{{env('UPLOAD_URL')}}{{$v->g_img}}" width="100px"
        height="150px" /></a></dt>
        <dd class="ip-text"><a href="{{url('product',$v->gid)}}">{{$v->g_name}}</a><span>已售：488</span></dd>
        <dd class="ip-price"><strong>¥{{$v->g_jiage}}</strong> <span>¥{{$v->g_jiage*2}}</span></dd>
       </dl>
      
      </div>
       @endforeach
    

      <div class="clearfix"></div>
     </div><!--index-pro1/-->
       {{$data->appends($all)->links()}}
     <div class="prolist">

      @foreach($data1 as $v)
      <dl>
       <dt><a href="{{url('product',$v->gid)}}"><img src="{{env('UPLOAD_URL')}}{{$v->g_img}}" width="100" height="100" /></a></dt>
       <dd>
        <h3><a href="{{url('product',$v->gid)}}">{{$v->g_name}}</a></h3>
        <div class="prolist-price"><strong>¥{{$v->g_jiage}}</strong> <span>¥{{$v->g_jiage*2 }}</span></div>
        <div class="prolist-yishou"><span>5.0折</span> <em>已售：35</em></div>
       </dd>
       <div class="clearfix"></div>
      </dl>
    @endforeach
     </div><!--prolist/-->
     <div class="joins"><a href="fenxiao.html"><img src="/static/index/images/jrwm.jpg" /></a></div>
     <div class="copyright">Copyright &copy; <span class="blue">这是就是三级分销底部信息</span></div>
     @endsection

 