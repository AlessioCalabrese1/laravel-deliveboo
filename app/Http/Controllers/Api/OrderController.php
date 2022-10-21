<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request){
        $sentData = $request->all();
        return response()->json([
            'result' => true,
            'data' => $sentData
        ]);
    }
}