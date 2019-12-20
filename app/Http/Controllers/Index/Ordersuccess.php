<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Good;
use App\Model\Order;
use App\Model\Cars;
class Ordersuccess extends Controller
{
    //订单成功的添加
    	function ordersuccess($gid){
    		//dd($gid);
            $res5=Cars::where('gid','=',$gid)->update(['car_del'=>2]);
    		$res=Good::where('goods.gid',$gid)		
				->leftjoin('shop_car','goods.gid','=','shop_car.gid')
				->first();
		    $date['pay_time']=$res['buy_time'];
			$date['order_amount']=$res['buy_number']*$res['g_jiage'];

    		//dd($date['order_amount']);
    		$date['order_number']=time().rand(1000,9999);
    		$date['ctime']=time();
    		//dd($date);
    		$orderInfo=Order::insert($date);
    		
    		if($orderInfo){
    			 echo "<script>alert('提交成功');location.href='/ordersuccesslist';</script>";
    		}
    		
    	}
    	function ordersuccesslist(){
    		$data=Order::get();

    		
    		//dd($data);
    		return view('index.ordersuccess',['data'=>$data[0]]);
    	}
}
