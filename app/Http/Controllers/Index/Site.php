<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Area;
use App\Model\Address;
use DB;
class Site extends Controller
{
    //收货地址的添加
   		function siteadd(){

          $where=[
          ['pid','=',0]
          ];
        $data=Area::where($where)->get();
   			return view('index.site.siteadd',['data'=>$data]);
         }

    //收货地址的添加执行
      function siteadd_do(){
         $post=request()->except('_token');
        //dd($post);    
        $data=Address::insert($post);
        if($data){
            echo "<script>alert('添加成功');location.href='/sitelist';</script>";
        }else{
            echo "<script>alert('添加失败');location.href='/siteadd';</script>";
        }
      }

    //获取区域信息
      function getPlaceInfo($pid){
        //echo $pid;
        $where=[
          ['pid','=',$pid]
        ];
        return Area::where($where)->get();
      }

      function getplace($id){
        //$id=request()->id;
        //echo  $id;
        if(!$id==0){
          $info=$this->getPlaceInfo($id);
          //dump($info);
            echo json_encode($info);
        }
      }
   		
    //收货地址的展示
    	function sitelist(){
          $where=[
         // ['user_id','=',$user_id],
          ['is_del','=',1]
        ];   
        $addressInfo=Address::where($where)->get();
        //dd($addressInfo);
         foreach($addressInfo as $k=>$v){
        $addressInfo[$k]['province']=Db::table('shop_area')->where('id','=',$addressInfo[$k]['province'])->value('name');    
      // dd($addressInfo);
        $addressInfo[$k]['city']=Db::table('shop_area')->where('id','=',$addressInfo[$k]['city'])->value('name');
        $addressInfo[$k]['area']=Db::table('shop_area')->where('id','=',$addressInfo[$k]['area'])->value('name');
       }
       //dd($addressInfo);
      //  $this->assign('addressInfo',$addressInfo);
      // //查询所有的省份---作为第一个下拉菜单的值
      //   $placeInfo=$this->getPlaceInfo(0);
      //   $this->assign('placeInfo',$placeInfo);
       
    		return view('index.site.sitelist',['addressInfo'=>$addressInfo]);
    	}
    	
}