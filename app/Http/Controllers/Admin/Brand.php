<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\Brands;
use Validator;
use Illuminate\Validation\Rule;
//use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
class Brand extends Controller
{
    //添加视图
     function add(){
     	return view('admin.brand.add');
     }

    //添加执行
     function add_do(){
        //第一种验证
        // request()->validate([
        //  'brand_name' => 'required|unique:brand|max:12|min:2',
        //  'brand_url' => 'required',
        // ],[
        //   'brand_name.required'=>'品牌名称必填',
        //   'brand_name.unique'=>'品牌名称已存在',
        //   'brand_url.required'=>'品牌网址必填',
        // ]);
     	
     	$post=request()->except('_token');
        //第三种验证
        $validator = Validator::make(request()->all(), [
         'brand_name' => 'required|unique:brand|max:12|min:2',
         'brand_url' => 'required',
         ],
         [
          'brand_name.required'=>'品牌名称必填',
          'brand_name.unique'=>'品牌名称已存在',
          'brand_url.required'=>'品牌网址必填',
        ]);
    
         if ($validator->fails()) {
         return redirect('brand/add')
         ->withErrors($validator)
        ->withInput();
         }
     	//dd($post);
     	//$data=Db::table('brand')->insert($post);
     	//dd(request()->hasFile('brand_logo'));
     	//文件上传
     	if(request()->hasFile('brand_logo')){
     		$post['brand_logo'] = $this->upload('brand_logo');
     	}
     	//dd($post);
     	

     	$data=Brands::insert($post);
	 	  if($data){
	          return redirect('brand/list');
	      }else{
	          return redirect('brand/add');
	      }
     }

    //展示视图
     function list(){
     	$key=request()->key;
     	$url=request()->url;
    	$where=[];
    	if($key){
    		$where[]=['brand_name','like',"%$key%"];
    	};
    	if($url){
    		$where[]=['brand_url','like',"%$url%"];
    	}
     	//$data=Db::table('brand')->paginate(3);
       // DB::connection()->enableQueryLog();    ---监听sql

        $page=request()->page;
        //Redis::del('data_'.$page.'_'.$key.'_'.$url);
        $data=Redis::get('data_'.$page.'_'.$key.'_'.$url);
         //dd(unserialize($data));
                $data=unserialize($data);
         echo 'data_'.$page.'_'.$key.'_'.$url;
        if(!$data){
            echo '走Db';
     	$data=Brands::where($where)->orderBy('brand_id','desc')->paginate(2);
        //$data=serialize($data);
         Redis::setex('data_'.$page.'_'.$key.'_'.$url,20,serialize($data));
        }
       // $logs = DB::getQueryLog();
       //  dd($logs);
     	//dd($data);
     	$all=request()->all();
 
     	return view('admin.brand.list',['data'=>$data,'all'=>$all]);
      }

    //删除的执行
     function delete($brand_id){
     	$brand_id=request()->brand_id;
     	//dd($brand_id);
     	//$res=Db::table('brand')->where('brand_id','=',$brand_id)->delete();
     	$res=Brands::where('brand_id','=',$brand_id)->delete();
     	  if($res){
     	  	  echo "<script>alert('删除成功');location.href='/brand/list';</script>";
	         // return redirect('list');
	      }else{
	           return redirect('brand/list');
	      }
      }

    //修改的视图 
     function update($brand_id){
    	//$brand_id=request()->brand_id;
    	//dd($brand_id);
    	//$data=Db::table('brand')->where('brand_id','=',$brand_id)->first();
    	$data=Brands::where('brand_id','=',$brand_id)->first();
    	//dd($data);
    	return view('admin.brand.update',['data'=>$data]);
     }
    
    //修改的执行
     function update_do($brand_id){
     	//$brand_id=request()->brand_id;
     	$post=request()->except('_token');
     	//dd($post);
          //第三种验证
        $validator = Validator::make(request()->all(), [
         //'brand_name' => 'required|unique:bra)nd|max:12|min:2',
         'brand_name'=>[
                'required',
                Rule::unique('brand')->ignore($brand_id,'brand_id'),
                'max:12',
                'min:2'
         ],
         'brand_url' => 'required',
         ],
         [
          'brand_name.required'=>'品牌名称必填',
          'brand_name.unique'=>'品牌名称已存在',
          'brand_name.max'=>'品牌名称最大长度为12位',
          'brand_name.min'=>'品牌名称最小长度为2位',
          'brand_url.required'=>'品牌网址必填',
        ]);
    
         if ($validator->fails()) {
         return redirect('brand/update/'.$brand_id)
         ->withErrors($validator)
        ->withInput();
         }
     	if(request()->hasFile('brand_logo')){
     		$post['brand_logo'] = $this->upload('brand_logo');
     	}
     	//dd($post);
     	//$res=Db::table('brand')->where('brand_id','=',$brand_id)->update($post);
     	$res=Brands::where('brand_id','=',$brand_id)->update($post);
     	  if($res!==false){
	          return redirect('brand/list')->with('msg','修改成功');
	      }else{
	          return redirect('brand/list')->with('msg','修改失败');	
	      }
     }



    //文件上传
     	function upload($file){
     		if(request()->file($file)->isValid()) {
			 $photo =request()->file($file);
			 $store_result = $photo->store('uploads');
			 // $store_result = $photo->storeAs('uploads');	
			 return $store_result;		
			 }
			 exit('未获取到上传文件或上传过程出错');
     	 }

}
