<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Shopuser;
class Login extends Controller
{
    //登录视图
    	function login(){

    		return view('index.login');
    	}
    	function login_do(){
    		$post=request()->except('_token');
    		//dd($post);
    		$where=[
    			['user_count','=',$post['user_count']],
    			['user_pwd','=',$post['user_pwd']]

    		];
    		$count=Shopuser::where($where)->count();
    		//dd($count);
    		if($count>0){
    			 echo "<script>alert('登录成功');location.href='/';</script>";
    		}else{
    			 echo "<script>alert('登录失败');location.href='/login';</script>";
    		}
    	}

   	//注册视图
   		function reg(){

   			return view('index.reg');
   		}



	// //ajax传值
	// 	public function emailInfo(){
	// 		$email=request()->all();
	// 	   // dump($email);
	// 		echo $email['email'];

			
	// 		//随机的生成的6位验证码
	// 		$code=rand(100000,999999);
	// 		//$code="请及时更改";
	// 		//发邮件
	// 		$body="尊敬的用户,你的验证码为".$code.",5分钟内输入有效,请勿泄露。";
	// 		//$body="尊敬的用户,你的密码被盗".$code.",5分钟内更改有效,请勿忽略。";

	// 		//echo $body;die;
	// 		//$res=sendEmail($email,'验证码',$body);
	// 		//echo $res;die;
		 
	// 		if(!empty($body)){
	// 			$emailInfo1=['user_email'=>$email,'code'=>$code];
	// 			//cookie('emailInfo1',$emailInfo1);
				
	// 			$arr=['font'=>'发送成功','code'=>1];
	// 			echo json_encode($arr);
	// 		}else{
	// 			$arr=['font'=>'发送失败','code'=>2];
	// 			echo json_encode($arr);
				
	// 		}
	// 	}

	//  //执行邮箱注册
	// 	function emailregist_do(){
	// 		$reg='/^[0-9a-z]{6,16}@[0-9a-z]{1,4}\.com$/';
	// 		$data=request()->post();
	// 		$email=request()->user_name;
			
	// 		//print_r($data);
	// 		$info=cookie('emailInfo1');
	// 			if(empty($info)){
	// 				$this->error('请先给邮箱发一份邮件');
	// 			}

	// 		if(empty($email)){			
	// 			$this->error('邮箱必填');exit;			
	// 		}else if(!preg_match($reg,$email)){
	// 			$this->error('邮箱格式有误');exit;	
	// 		}else{
	// 			$where=[
	// 				['user_email','=',$email]
	// 			];
	// 			$count=User::where($where)->count();
	// 			if($count>0){
	// 				$this->error('邮箱已被注册');exit;
	// 			}else if($info['email']!=$data['user_email']){
	// 				$this->error('发送验证码邮箱与注册邮箱不一致');exit;
	// 			}
	// 		}
	// 		//验证验证码
	// 		if(empty($data['user_code'])){
	// 			$this->error('验证码必填');exit;
	// 		}else if($info['code']!=$data['user_code']){
	// 			$this->error('验证码有误');exit;
	// 		}else if((time()-$info['user_time'])>300){
	// 			$this->error('验证码已失效，请在5分钟之内输入有效');exit;
	// 		}
	// 		//验证密码
	// 		if(empty($data['user_pwd'])){
	// 			$this->error('密码必填');exit;
	// 		}
	// 		//验证密码与确认密码一致
	// 		// if($user_pwd!=$user_pwd1){
	// 		// 	$this->error('密码与确认密码不一致');exit;
	// 		// 	//user_pwd  改为email_pwd
	// 		// }
	// 		//dump($data);die;
	// 		$data['user_pwd']=md5($data['user_pwd']);
		
	// 		$res=User::insert($data);
	// 		if($res){
	// 			$this->success('注册成功');			
	// 		}else{
	// 			$this->error('注册失败');
	// 		}
	// 	}


}
