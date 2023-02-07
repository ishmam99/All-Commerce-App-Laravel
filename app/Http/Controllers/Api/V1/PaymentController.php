<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentResource;
use App\Library\Utilities;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function getPaymentMethods()
    {
        return apiResponse(
            200,
            "Payment methods successfully fetched.",
            Utilities::availablePaymentMethods()
        );
    }
    public function make(Request $request)
    {
       
        $input = $request->validate([
            'order_id'  => 'required|exists:orders,id',
            'amount'    => 'required|numeric',
            'type'      => 'required',
            'prove_document'=> 'required',    
        ]);
        $input['prove_document'] = uploadFile($request->file('prove_document'));
        auth()->user()->payments()->create($input);
        return apiResponse(201,'Payment Submitted');
    }
    public function paymentHistory()
    {
        $payments = auth()->user()->payments;
        return apiResponseResourceCollection(200,'Payment History',PaymentResource::collection($payments));
    }
}
