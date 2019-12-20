<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Cars;
use App\Model\Good;

class Car extends Controller
{
	//购物车的添加
		function caradd(){
			$post['gid']=request()->gid;
			$post['buy_time']=time();
			$post['buy_number']=request()->buy_number;
			$res=Cars::where('gid','=',$post['gid'])->where('car_del','=',1)->first();
			if($res){
				$data=cars::where('gid','=',$post['gid'])->update(['buy_number'=>$res['buy_number']+$post['buy_number'],'buy_time'=>$post['buy_time']]);
				    if($data){
						echo 1;
					}else{
						echo 2;
					}

			}else{
				 $res=Cars::insert($post);
					if($res){
						echo 1;
					}else{
						echo 2;
					}
			}
			
			//echo  $post['buy_number'];
			
		}


    //购物车展示
    	function carlist(){
    		
    		$gid=Cars::get('gid');
    	
    		//dd($gid);
    		$goodInfo=Good::leftjoin('shop_car','goods.gid','=','shop_car.gid')->whereIn('goods.gid',$gid)->where('car_del','=',1)->get();
    		$count=Cars::whereIn('gid',$gid)->where('car_del','=',1)->count();
    		//dd($goodInfo);
    		return view('index.carlist',['goodInfo'=>$goodInfo,'count'=>$count]);
    	}

    //购物车的删除
    	function cardel($gid){
    		$gid=explode(',',$gid);
    		//dump($gid); 
    		$data=Cars::whereIn('gid',$gid)->update(['car_del'=>2]);
    		if($data){
    			echo 1;
    		}else{
    			echo 2;
    		}
    	}



}
