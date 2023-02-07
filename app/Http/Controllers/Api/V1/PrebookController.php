<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PrebookResource;
use App\Models\PrebookDate;
use App\Models\PrebookProduct;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\Store;
use Illuminate\Http\Request;

class PrebookController extends Controller
{
    public function index()
    {
        $prebooks = auth()->user()->prebooks;
        return apiResponseResourceCollection(200,'Prebooking List',PrebookResource::collection($prebooks));
    }
    public function show(PrebookDate $prebook)
    {
        return apiResponse(200, 'Prebook Details ', PrebookResource::make($prebook));
    }
    public function store(Request $request)
    {
        $input = $request->validate([
            
            'store_id'      => 'required|exists:stores,id',
            
        ]);

        $store = Store::findOrfail($request->store_id);
        $input['shipping_cost'] = $store->shipping_fee;
       $prebook = auth()->user()->prebooks()->create($input);
        return apiResponse(201,'Prebook completed ',PrebookResource::make($prebook));
    }
   
    public function prebookProductAdd(Request $request)
    {
        $input = $request->validate([
            'prebook_date_id'   => 'required|exists:prebook_dates,id',
            'product_id'    	=> 'required|exists:products,id',
            'product_attribute_id'    	=> 'required|exists:product_attributes,id',
            'qty'               => 'required',
        ]);
        $prebook =PrebookDate::findOrfail($request->prebook_date_id);
        $product = Product::findOrfail($request->product_id);
        $product_attribute = ProductAttribute::findOrfail($request->product_attribute_id);
        $price = $request->qty * $product->regular_price;
        $input['price'] = $price;
        if($prebook->prebookProducts->where('product_attribute_id', $request->product_attribute_id)->first() == false)
        PrebookProduct::create($input);
        else{
            $prebook->prebookProducts->where('product_attribute_id', $request->product_attribute_id)->first()->increment('qty',$request->qty);
            $prebook->prebookProducts->where('product_attribute_id', $request->product_attribute_id)->first()->increment('price',$price);
        }
        $prebook->increment('total',$price);
        $product->decrement('quantity',$request->qty);
        $product_attribute->decrement('quantity',$request->qty);
        return apiResponse(201,'Product added For prebooking');
    }
    public function prebookProductRemove(PrebookProduct $prebookProduct)
    {
        $prebookProduct->product->increment('quantity',$prebookProduct->qty);
        $prebookProduct->product_attribute->increment('quantity',$prebookProduct->qty);
        $prebookProduct->prebook->decrement('total',$prebookProduct->price);
        $prebookProduct->delete();
        return apiResponse(201,'Product removed from prebook list');
    }
}
