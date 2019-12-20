<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Good;
use App\Model\Typess;
class GoodList extends Controller
{
    
    //前台的商品展示
    	function list($tid){
    		
        	$res4=Typess::get();
	    		$tid=getres4($res4,$tid);
	    		//dd($tid2);    		
	    		$data=Good::whereIn('tid',$tid)->get();
    		return view('index.list',['data'=>$data]);
    	}

    //商品详情页面
      	function product($gid){
          //dd($gid);
      		$date=Good::where('gid','=',$gid)->first();
      		$date['g_imgs']=explode('|',$date['g_imgs']); 
      		//dd($data);
      		return view('index.product',['date'=>$date]);
      	}

  
     
    	
}
