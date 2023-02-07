<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
       $payments = Payment::all();
       return view('admin.payment.index',compact('payments'));
    }
    public function show(Payment $payment)
    {
        return view('admin.payment.show',compact('payment'));
    }
    public function update(Payment $payment,Request $request)
    {
        $payment->update(['status'=>$request->status]);
        return back()->with('success', 'Payment Status Updated');
    }
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return back()->with('success','Payment Deleted');
    }
}
