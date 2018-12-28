<?php

namespace App\Http\Controllers\Admin;

use App\Model\Bill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BillController extends Controller
{
    function ThanhToan(Request $request){
        $bill = Bill::findOrFail($request->id);
        $bill->state= 0;
        if($bill->save())
            return redirect()->back();
    }
}
