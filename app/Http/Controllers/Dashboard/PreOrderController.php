<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PreOrder;
use Illuminate\Http\Request;

class PreOrderController extends Controller
{
    public function index()
    {
        $preorders = PreOrder::with('preOrderProducts.productAttribute.product')->get();
        return view('admin.preorder.index',compact('preorders'));
    }
}
