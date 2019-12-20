<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Mecenter extends Controller
{
    //个人中心
    	function list(){
    		return view('index.mecenter');
    	}
}
