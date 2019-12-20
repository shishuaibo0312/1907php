<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Good;
use App\Model\Typess;
class Index extends Controller
{
    //前台的首页
    	function index(){
    		//搜索
    			$key=request()->key;
	    		$where=[];
	    		if($key){
	    			$where[]=['g_name','like',"%$key%"];
	    		}


    		//显示tid为1   下的所有商品
    		    $res4=Typess::get();
	    		$tid=getres4($res4,3);
	    		//dd($tid2);    		
	    		$data1=Good::whereIn('tid',$tid)->get();
 
	    		$data=Good::where($where)->paginate(4);
	    		$all=request()->all();
  		
    		$date=Typess::where('parent_id','=',0)->get();
    		//dd($date);
    		return view('index.index',['data'=>$data,'date'=>$date,'data1'=>$data1,'all'=>$all]);
    	}
    	


}
