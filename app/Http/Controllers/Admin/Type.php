<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\Typess;
use Validator;
use Illuminate\Validation\Rule;
//use App\Model\Brands;
class Type extends Controller
{
	
    //分类的添加
     function add(){
     	$res=Typess::get();
     	$data=list_level($res);
     	//$data=Db::table('type')->get();
     	//dd($data);
     	return view('admin.type.add',['data'=>$data]);
     }
    //分类的添加执行
     function add_do(){
     	$post=request()->except('_token');
         //第三种验证
        $validator = Validator::make(request()->all(), [
         't_name' => 'required|unique:type|max:12|min:2',
       
         ],
         
         [
          't_name.required'=>'分类名称必填',
          't_name.unique'=>'分类名称已存在',
          
         
        ]);
    
         if ($validator->fails()) {
         return redirect('type/add')
         ->withErrors($validator)
        ->withInput();
         }
     	//dd($data);
     	$data=Typess::insert($post);
     	  if($data){
	          return redirect('type/list');
	      }else{
	          return redirect('type/add');
	      }
     }
    //分类的展示
     function list(){
     	$res=Typess::get();
     	$data=list_level($res);
     	//dd($data);
     	return view('admin.type.list',['data'=>$data]);
     }
    //分类的删除
     function destroy($tid){
     	$res=Typess::destroy($tid);
     	 if($res){
     	  	  echo "<script>alert('删除成功');location.href='/type/list';</script>";
	         // return redirect('list');
	      }else{
	           return redirect('type/list');
	      }

     }
    //分类的修改视图
    function update($tid){
    	$res=Typess::get();
    	$date=list_level($res);
	    $data=Typess::where('tid','=',$tid)->first();
	    //dd($data);
	    return view('admin.type.update',['data'=>$data],['date'=>$date]);
	    }
    //分类的修改执行
     function update_do($tid){
     	$post=request()->except('_token');
        //第三种验证
                $validator = Validator::make(request()->all(), [
                 //'brand_name' => 'required|unique:bra)nd|max:12|min:2',
                 't_name'=>[
                        'required',
                        Rule::unique('type')->ignore($tid,'tid'),
                        'max:12',
                        'min:2'
                 ]
                
                 ],
                 [
                  't_name.required'=>'品牌分类名称必填',
                  't_name.unique'=>'分类名称已存在',
                  't_name.max'=>'分类名称最大长度为12位',
                  't_name.min'=>'分类名称最小长度为2位',
                 
                ]);
            
                 if ($validator->fails()) {
                 return redirect('type/update/'.$tid)
                 ->withErrors($validator)
                ->withInput();
                 }
     	//dd($data);
     	$data=Typess::where('tid','=',$tid)->update($post);
     	  if($data!=='false'){
	          return redirect('type/list')->with('msg','修改成功');
	      }else{
	          return redirect('type/list/'.$tid)->with('msg','修改失败');
	      }
     }
}
