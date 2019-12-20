<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\OrderShipped;

use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //邮箱注册
    	 public function send_email()
    {
        Mail::to('2565918843@qq.com')->send(new OrderShipped());
    }
}
