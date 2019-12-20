<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Order;
class Pay extends Controller
{
    //发起手机支付
    	function phonepay($order_id){
    		//echo $order_id;
    		//根据订单id查询订单号和订单金额
    		 $orderInfo=Order::select('order_number','order_amount')->where('order_id',$order_id)->first();
    		 //dd($orderInfo);
    		require_once app_path('phonepay/alipay/wappay/service/AlipayTradeService.php');
			require_once  app_path('phonepay/alipay/wappay/buildermodel/AlipayTradeWapPayContentBuilder.php');
			$config=config('alipay');
			//dd($config);
			if (!empty($orderInfo->order_number)&& trim($orderInfo->order_number)!=""){
		    //商户订单号，商户网站订单系统中唯一订单号，必填
		    $out_trade_no =$orderInfo->order_number;

		    //订单名称，必填
		    $subject = "瑶瑶商城";

		    //付款金额，必填
		    $total_amount = $orderInfo->oeder_amount;

		    //商品描述，可空
		    $body = '';

		    //超时时间
		    $timeout_express="1m";

		    $payRequestBuilder = new \AlipayTradeWapPayContentBuilder();
		    $payRequestBuilder->setBody($body);
		    $payRequestBuilder->setSubject($subject);
		    $payRequestBuilder->setOutTradeNo($out_trade_no);
		    $payRequestBuilder->setTotalAmount($total_amount);
		    $payRequestBuilder->setTimeExpress($timeout_express);

		    $payResponse = new \AlipayTradeService($config);
		    $result=$payResponse->wapPay($payRequestBuilder,$config['return_url'],$config['notify_url']);

		    return;
		    	}
		    }
}
