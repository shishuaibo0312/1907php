<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admins;
use Validator;
use Illuminate\Validation\Rule;
class Admin extends Controller
{
    //管理员的添加视图
     	function add(){
     		return view('admin.admin.add');
     	}

    //管理员添加执行
    	function add_do(){
    		$post=request()->except('_token');
            //第三种验证
                $validator = Validator::make(request()->all(), [
                 'admin_name' => 'required|unique:admin|max:12|min:2',
                 'admin_pwd' => 'required',
                 ],

                 [
                  'admin_name.required'=>'账号必填',
                  'admin_name.unique'=>'账号已存在',
                  'admin_pwd.required'=>'密码必填',
                 
                ]);
            
                 if ($validator->fails()) {
                 return redirect('admin/add')
                 ->withErrors($validator)
                ->withInput();
                 }
    		if(request()->hasFile('admin_logo')){
     		$post['admin_logo'] = $this->upload('admin_logo');
     	    }
     	//dd($post);
    		$data=Admins::insert($post);
    		 if($data){
	          return redirect('admin/list');
	      }else{
	          return redirect('admin/add');
	      }
    	}
    	
    //管理员的展示
    	function list(){
    		$data=Admins::paginate(3);
    		return view('admin.admin.list',['data'=>$data]);
    	  }

    //管理员的删除
    	function destroy($id){
    		$res=Admins::destroy($id);
    		if($res){
     	  	  echo "<script>alert('删除成功');location.href='/admin/list';</script>";
	         // return redirect('list');
	        }else{
	           return redirect('admin/list');
	        }
    	    }

    //管理员的修改视图
    	function update($id){
    		$res=Admins::where('id','=',$id)->first();
    		return view('admin.admin.update',['res'=>$res]);
    	}

    //管理员的修改执行
    	function update_do($id){
    		$post=request()->except('_token');
            //第三种验证
                $validator = Validator::make(request()->all(), [
                 //'brand_name' => 'required|unique:bra)nd|max:12|min:2',
                 'admin_name'=>[
                        'required',
                        Rule::unique('admin')->ignore($id,'id'),
                        'max:12',
                        'min:2'
                 ],
                'admin_pwd' => 'required',
                 ],
                 [
                  'admin_name.required'=>'账号必填',
                  'admin_name.unique'=>'账号名称已存在',
                  'admin_name.max'=>'账号名称最大长度为12位',
                  'admin_name.min'=>'账号名称最小长度为2位',
                  'admin_pwd.required'=>'密码必填',
                 
                ]);
            
                 if ($validator->fails()) {
                 return redirect('admin/update/'.$id)
                 ->withErrors($validator)
                ->withInput();
                 }
    		if(request()->hasFile('admin_logo')){
     		$post['admin_logo'] = $this->upload('admin_logo');
     	    }
    		$data=Admins::where('id','=',$id)->update($post);
    		if($data!==false){
	          return redirect('admin/list')->with('msg','修改成功');
	        }else{
	          return redirect('admin/update')->with('msg','修改成功');
	        }
    	}
    
    //文件上传
     	function upload($file){
     		if(request()->file($file)->isValid()) {
			 $photo =request()->file($file);
			 $store_result = $photo->store('admin');
			 // $store_result = $photo->storeAs('uploads');	
			 return $store_result;		
			 }
			 exit('未获取到上传文件或上传过程出错');
     	  }
}
