<?php

namespace App\Api\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HelloController extends Controller
{

    public function index(){

        return response()->json(['code'=>200,'message'=>'success']);
    }
}
