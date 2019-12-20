<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Good;
use App\Model\Cars;
use App\Model\Address;
use DB;
class Orderpay extends Controller
{
    //订单支付页面
    	function orderpay($gid){
    		$gid=explode(',',$gid);
    		//dd($gid);
                //收货地址的显示
                    $where=[
                 // ['user_id','=',$user_id],
                    ['is_checked','=',1],
                    ['is_del','=',1]
                   ];      
                    $addressInfo=Address::where($where)->first();
                    //dd($addressInfo);
                    
                    $addressInfo['province']=Db::table('shop_area')->where('id','=',$addressInfo['province'])->value('name');    
                  // dd($addressInfo);
                    $addressInfo['city']=Db::table('shop_area')->where('id','=',$addressInfo['city'])->value('name');
                    $addressInfo['area']=Db::table('shop_area')->where('id','=',$addressInfo['area'])->value('name');
                  
    		$orderShopInfo=Good::whereIn('goods.gid',$gid)
			     ->where('car_del','=',1)
				->leftjoin('shop_car','goods.gid','=','shop_car.gid')
				->get();
                $data=Good::where('gid','=',$gid)->first();
			//dd($orderShopInfo);
    		return view('index.orderpay',['orderShopInfo'=>$orderShopInfo,'data'=>$data,'addressInfo'=>$addressInfo]);
    	}
    
}
