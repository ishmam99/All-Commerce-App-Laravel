<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PreOrderResource;
use App\Models\PreOrder;
use App\Models\PreOrderProducts;
use Illuminate\Http\Request;

class PreOrderController extends Controller
{
    public function index()
    {
        return apiResponseResourceCollection(200,'My Pre Orders',PreOrderResource::collection(auth()->user()->preOrders));
    }
    public function create()
    {
      $preOrder =  auth()->user()->preOrders()->create();
        return apiResponse(201,'Pre Order Created , Add Products',PreOrderResource::make($preOrder));
    }
    public function show(PreOrder $preOrder)
    {
        return apiResponse(200, 'Pre Order Details', PreOrderResource::make($preOrder));
    }
    public function addProduct(Request $request)
    {
        $input = $request->validate([
            'product_attribute_id'  => 'required|exists:product_attributes,id',
            'quantity'              => 'required|numeric',
            'pre_order_id'          => 'required|exists:pre_orders,id'    
        ]);
        $preOrder = PreOrder::findOrfail($request->pre_order_id);
        $preOrder->increment('quantity',$request->quantity);
        PreOrderProducts::create($input);
        return apiResponse(201,'Product Added For Pre Order',PreOrderResource::make($preOrder));
    }
    public function removeProduct(PreOrderProducts $preOrderProducts)
    {
        $preOrderProducts->preOrder->decrement('quantity',$preOrderProducts->quantity);
        $preOrderProducts->delete();
        return apiResponse(201, 'Product Removed From Pre Order', PreOrderResource::make($preOrderProducts->preOrder));
    }
}
