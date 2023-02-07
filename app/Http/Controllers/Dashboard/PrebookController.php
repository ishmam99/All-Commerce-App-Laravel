<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PrebookDate;
use App\Models\ProductAttribute;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PrebookController extends Controller
{
    public function index()
    {
        $prebooks = PrebookDate::with('prebookProducts.product')->get();
        $this->check();
        return view('admin.prebook.index',compact('prebooks'));
    }
    public function check()
    {
        $prebooks = PrebookDate::where('order_status',0)->get();
        foreach($prebooks as $prebook){
           
            if(date_diff(now(),Carbon::parse($prebook->created_at))->days>4)
            {
                foreach($prebook->prebookProducts->load('product') as $pre_prod)
                {
                    $pre_prod->product->increment('quantity',$pre_prod->qty);
                    $attribute = ProductAttribute::findOrfail($pre_prod->product_attribute_id);
                    $attribute->increment('quantity',$pre_prod->qty);
                    $pre_prod->delete();
                }
                $prebook->delete();

            }
        }
    }
}
