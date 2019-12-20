
    @extends('layouts.shop')
@section('title', '注册')
@section('content')

     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>会员注册</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     <form action="{{url('emailregist_do')}}" method="get" class="reg-login">
      <h3>已经有账号了？点此<a class="orange" href="login.html">登陆</a></h3>
      <div class="lrBox">
       <div class="lrList"><input type="text"  name="user_email" id="email" placeholder="输入手机号码或者邮箱号" /></div>
       <div class="lrList2"><input type="text" placeholder="输入短信验证码" /> <input type="button" id="click_email" value="获取验证"></div>
       <div class="lrList"><input type="text" placeholder="设置新密码（6-18位数字或字母）" /></div>
       <div class="lrList"><input type="text" placeholder="再次输入密码" /></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" value="立即注册" />
      </div>
     </form><!--reg-login/-->
        @endsection

<script type="text/javascript" src="/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    var reg=/^[0-9a-z]{6,16}@[0-9a-z]{1,4}\.com$/;
    $(document).on('click','#click_email',function(){
    //alert(111);die;
      var email=$('#email').val();
      //console.log(email);die;
      if(email==""){
        alert('邮箱必填');
      }else if(!reg.test(email)){
        alert('邮箱格式不正确');
        return false;
      }
      $.get(
        "{{url('send_emails')}}",
        {email:email},
        function(res){
              alert(res.font);
            },
            'json'
            );
          })
          return false;
        });




</script>


