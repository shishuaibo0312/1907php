@extends('layouts.shop')
@section('title', '购物车')
@section('content')
     <header>

      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>购物车</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     <table class="shoucangtab">
      <tr>
       <td width="75%"><span class="hui">购物车共有：<strong class="orange">{{$count}}</strong>件商品</span></td>
       <td width="25%" align="center" style="background:#fff url(images/xian.jpg) left center no-repeat;">
        <span class="glyphicon glyphicon-shopping-cart" style="font-size:2rem;color:#666;"></span>
       </td>
      </tr>
     </table>
     
     <div class="dingdanlist">
      <table>
       <tr>
        <td width="100%" colspan="4"><a href="javascript:;"><input type="checkbox" name="1" /> 全选</a></td>
       </tr>
       @foreach($goodInfo as $v)
       <tr gid="{{$v->gid}}">
        <td width="4%"><input type="checkbox" class="box" /></td>
        <td class="dingimg" width="15%"><img src="{{env('UPLOAD_URL')}}{{$v->g_img}}" /></td>
        <td width="50%">
         <h3>{{$v->g_name}}</h3>
         <time>下单时间：{{date('Y-m-d h:i:s',$v->buy_time)}}</time>
        </td>
        <td align="right">
          <!-- <input type="text" class="spinnerExample" /> -->
    
              <button class="less">-</button>
              <input type="text" class="buy_number" style="width: 30px ;color:#00ffff;text-align: center" value="{{$v->buy_number}}">
              <button class="add">+</button>  
            
              <button id="del">删除</button>
        </td>
      
       </tr>
       <tr>
        <th colspan="4"><b style="color: red">小计:：</b><strong class="orange" >¥{{$v->g_jiage*$v->buy_number}}</strong></th>
       </tr>
         @endforeach
         <tr>
          <td width="100%" colspan="4"><a href="javascript:;" style="color:orange;" class="destroy">删除已选商品</a></td>
        </tr>
    
      </table>
     </div><!--dingdanlist/-->
   
   
   
  
      <tr>
       <th width="10%"><a href="javascript:history.back(-1)"><span class="glyphicon glyphicon-menu-left"></span></a></th>
       <td width="50%">总计：<strong class="orange">¥{{$v->g_jiage*$v->buy_number}}</strong></td>&nbsp;&nbsp;&nbsp;
      <!--  <td width="40%"><a href="{{url('orderpay')}}" class="jiesuan">去结算</a></td> -->
       <td width="40%"><button style="color:green" class="submit">去结算</button></td>

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
<script type="text/javascript" src="/jquery.js"></script>
<script type="text/javascript">
  $(function(){
    
    //确认账单
     $(document).on('click','.submit',function(){
     
        var _box=$('.box:checked');
          if(_box.length>0){
            
             var gid="";
              _box.each(function(index){
                gid+=$(this).parents('tr').attr('gid')+',';
              });
              gid=gid.substr(0,gid.length-1);
              //console.log(gid);
              location.href='/orderpay/'+gid;
              //alert('添加购物车成功');location.href='/carlist';
             
            }else{
              alert('请至少选择一个商品进行结算');
            }
         
        })

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

    //删除
      $(document).on('click','#del',function(){
        var _this=$(this);
        gid=_this.parents('tr').attr('gid');
       // alert(gid);
       $.ajax({
       
          url:"{{url('/cardel')}}/"+gid,  

       }).done(function(res){
        console.log(res)
        if(res==1){
            _this.parents('tr').next('tr').remove();
           _this.parents('tr').remove();
         
              //location.reload();
          // alert('删除成功');
        }else{
          alert('删除失败');
        }
       })

      })


    //批量删除
      $(document).on('click','.destroy',function(){
         //alert(111);
        var _box=$('.box:checked');
          if(_box.length>0){
            
             var gid="";
              _box.each(function(index){
                gid+=$(this).parents('tr').attr('gid')+',';
              });
              gid=gid.substr(0,gid.length-1);
              //console.log(gid);
                $.ajax({

                   url:"{{url('/cardel')}}/"+gid, 

                   }).done(function(res){
                    console.log(res)
                    if(res==1){
                      _box.each(function(index){
                        $(this).parents('tr').remove();
                       })
                       location.reload();              
                      // alert('删除成功');
                    }else{
                      alert('删除失败');
                    }
                   })
             
            }else{
              alert('请至少选择一个商品');
            }
         
        })
         
  })
</script>