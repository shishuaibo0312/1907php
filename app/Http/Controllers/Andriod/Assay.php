<?php

namespace App\Http\Controllers\Andriod;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Type;
use App\Model\Assays;
use Validator;
use Illuminate\Validation\Rule;
class Assay extends Controller
{
    //文章的添加视图
    	function add(){
    		$data=Type::get();
    		return view('andriod.assay.add',['data'=>$data]);
    	}

    //文章的添加执行
    	function add_do(){
    		$post=request()->except('_token');

    		//第三种验证
		        $validator = Validator::make(request()->all(), [
		         'title' => 'required|unique:assay|max:12|min:2',
		         'type'=>'required',
		         'show'=>'required',
		       
		        ],
		         [
		          'title.required'=>'标题必填',
		          'title.unique'=>'标题已存在',
		          'tid.required'=>'文章分类必选',
		          'type.required'=>'类型必选',
		          'show.required'=>'是否展示必选',
		       
		        ]);
		    
		         if ($validator->fails()) {
		         return redirect('assay/add')
		         ->withErrors($validator)
		        ->withInput();
		         }
		     	//dd($post);
		     	
	     	//文件上传
	     	  if(request()->hasFile('logo')){

		     		$post['logo'] = $this->upload('logo');
		    		
		     	}

        

		     $post['time']=time();
		
		    $res=Assays::insert($post);
		     if($res){
     	  	  echo "<script>alert('添加成功');location.href='/assay/list';</script>";
	         // return redirect('list');
	        }else{
	           echo "<script>alert('添加失败');location.href='/assay/list';</script>";
	        }
 
    	}

    //文章的展示
    
    	function list(){
    		$date=Type::get();
    		$tid=request()->tid;
    		$key=request()->key;
    		$where=[];
    		if($key){
    			$where[]=['title','like',"%$key%"];
    		};
    		if($tid){
    			$where[]=['assay.tid','=',$tid];
    		};
    		$data=Assays::leftjoin('assay_type','assay.tid','=','assay_type.tid')
    		->where($where)->orderBy('id','desc')->paginate(2);
    		$all=request()->all();
    		//dd($data);
    		return view('andriod.assay.list',['data'=>$data,'date'=>$date,'all'=>$all]);
    	}

    //文章的删除
     	function destroy($id){
     		$res=Assays::destroy($id);
     		if($res){
     	  	  echo 1;//"<script>alert('删除成功');location.href='/assay/list';</script>";
	         // return redirect('list');
	        }else{
	           echo 2;//"<script>alert('删除失败');location.href='/assay/list';</script>";
	        }

     	}

    //文章的修改视图
    	function update($id){
    		$date=Type::get();
    		$data=Assays::where('id','=',$id)->first();
    		return view('andriod.assay.update',['data'=>$data,'date'=>$date]);
    	}

    //文章的修改执行
    	function update_do($id){
    		$post=request()->except('_token');

    		 //第三种验证
                $validator = Validator::make(request()->all(), [
                 //'brand_name' => 'required|unique:bra)nd|max:12|min:2',
                 'title'=>[
                        'required',
                        Rule::unique('assay')->ignore($id,'id'),
                        'max:12',
                        'min:2'
                 ]
                 ],
                 [
                  'title.required'=>'标题必填',
                  'title.unique'=>'标题已存在',
                  'title.max'=>'标题最大长度为12位',
                  'title.min'=>'标题最小长度为2位',
                 
                 
                ]);
            
                 if ($validator->fails()) {
                 return redirect('assay/update/'.$id)
                 ->withErrors($validator)
                ->withInput();
                 }
	     	//文件上传
	     	  if(request()->hasFile('logo')){

		     		$post['logo'] = $this->upload('logo');
		    		
		     	}
		    //$post['time']=time();
		
		    $res=Assays::where('id','=',$id)->update($post);
		     if($res!==false){
     	  	  echo "<script>alert('修改成功');location.href='/assay/list';</script>";
	         // return redirect('list');
	      }else{
	           echo "<script>alert('修改失败');location.href='/assay/update/'.$id;</script>";
	      }

    	}

   

    //ajax检测唯一性
        function checktitle(){
            $post=request()->title;
            //dump($post);
            $where=[
                ['title','=',$post]
            ];
            $count=Assays::where($where)->count();
            if($count>0){
                echo  'no';
            }else{
                echo "ok";
            }
        }

    //文件上传
     	function upload($file){
     		if (request()->file($file)->isValid()) {
				 $photo = request()->file($file);
				 $extension = $photo->extension();
				 $store_result = $photo->store('myfile');
				 //$store_result = $photo->storeAs('photo', 'test.jpg');
				
				 return $store_result;
				 }

				 exit('未获取到上传文件或上传过程出错');

	    }
}
