<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\Good;
use App\Model\Brands;
use App\Model\Typess;
use Validator;
use Illuminate\Validation\Rule;
class Goods extends Controller
{
    //商品的展示
         function list(){
         	//$data=Good::get();
         	 $data=Good::orderBy('gid','desc')
                     -> leftjoin('brand','brand.brand_id','=','goods.brand_id')
                     -> leftjoin('type','type.tid','=','goods.tid')
                      ->paginate(3);
         	 // $date=Brands::get();
         	 // $datt=Typess::get();
            foreach($data as $k=>$v){
            $data[$k]['g_imgs']=explode('|',$v['g_imgs']); 
          }
             //dd($data);
         	 				// ->leftjoin('brand','goods.brand_id=brand.brand_id')
               //              ->leftjoin('type','goods.tid=type.tid')
               //               ->get();
                           // dd($data);
         	return view('admin.goods.list',['data'=>$data]);
         }

    //商品的添加
         function add(){

             $date=Brands::get();
             $res=Typess::get();
             $data=list_level($res);
            return view('admin.goods.add',['data'=>$data,'date'=>$date]);
          }

    //商品的添加执行
         function add_do(){
            $post=request()->except('_token');
            //dd($post);
            //第三种验证
                $validator = Validator::make(request()->all(), [
                 'g_name' => 'required|unique:goods|max:12|min:2',
               
                 ],
                 [
                  'g_name.required'=>'商品名称必填',
                  'g_name.unique'=>'商品名称已存在',
                 
                ]);
            
                 if ($validator->fails()) {
                 return redirect('goods/add')
                 ->withErrors($validator)
                ->withInput();
                 }
            // 单文件上传
            if(request()->hasFile('g_img')){
                $post['g_img'] = $this->upload('g_img');
            }
             //多文件上传
            if (request()->hasFile('g_imgs')) {
               
               $imgs =$this->uploads('g_imgs');
               $post['g_imgs'] = implode('|',$imgs);
           }
            //dd($post);
            $data=Good::insert($post);

              if($data){
                  return redirect('goods/list');
              }else{
                  return redirect('goods/add');
              }
         }

    //商品的删除
         function destroy($gid){
            $res=Good::destroy($gid);
             if($res){
                  echo "<script>alert('删除成功');location.href='/goods/list';</script>";
                 // return redirect('list');
              }else{
                   return redirect('gooods/list');
              }
         }

    //商品的修改
         function update($gid){
            $data=Good::where('gid','=',$gid)->first();
            $date=Brands::get();
           
            $datt=Typess::get();
          
            $data['g_imgs']=explode('|',$data['g_imgs']); 
           
            //dd($data);
            return view('admin.goods.update',['data'=>$data,'date'=>$date,'datt'=>$datt]);

         }

    //商品的修改执行
         function update_do($gid){
            $post=request()->except('_token');
            //第三种验证
              $validator = Validator::make(request()->all(), [
               //'brand_name' => 'required|unique:bra)nd|max:12|min:2',
               'g_name'=>[
                      'required',
                      Rule::unique('goods')->ignore($gid,'gid'),
                      'max:12',
                      'min:2'
               ]
              
               ],
               [
                'g_name.required'=>'商品名称必填',
                'g_name.unique'=>'商品名称已存在',
                'g_name.max'=>'商品名称最大长度为12位',
                'g_name.min'=>'商品名称最小长度为2位',
               
              ]);
          
               if ($validator->fails()) {
               return redirect('goods/update/'.$gid)
               ->withErrors($validator)
              ->withInput();
               }
            //文件上传
            if(request()->hasFile('g_img')){
                $post['g_img'] = $this->upload('g_img');
            }
            //多文件上传
            if (request()->hasFile('g_imgs')) {
               
               $imgs =$this->uploads('g_imgs');
               $post['g_imgs'] = implode('|',$imgs);
           }
            //dd($post);
            $data=Good::where('gid','=',$gid)->update($post);

              if($data){
                 echo "<script>alert('修改成功');location.href='/goods/list';</script>";
              }else{
                  return redirect('goods/list');
              }
         }
        

    //文件上传
        function upload($file){
            if(request()->file($file)->isValid()) {
             $photo =request()->file($file);
             $store_result = $photo->store('g_img');
             // $store_result = $photo->storeAs('uploads'); 
             return $store_result;      
             }
             exit('未获取到上传文件或上传过程出错');
         }

    //多文件上传     
        function uploads($file){
         $imgs = request()->file($file);
         $result = [];
         foreach($imgs as $v){
         //验证文件是否上传成功
        if ($v->isValid()){
            //接收文件并上传
        $result[] = $v->store('g_imgs');
            //返回上传的文件路径 
        } 
        }
            return $result; 
        }
      
}
