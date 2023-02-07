@extends('layouts.default')
@section('content')
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title"></h3>
            <h3 class="card-label">Payment Details @if ($payment->status == 0)
                <span class="badge badge-warning p-2">Pending</span>
            @elseif($payment->status == 1)
                <span class="badge badge-success p-2">Approved</span>
            @else
            <span class="badge badge-danger p-2">Rejected</span>
            @endif
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @elseif(session()->has('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    <div class="card-body">
       
            <div class="kt-portlet__body">
             

              <div class="form-group row">
                <label for="order" class="col-md-2 col-form-label"><b>{{__('Order Details')}}</b></label>
                <div class="col-lg-8">
                <div class="card">
                  <div class="card-body">
                    @php
                        $order = $payment->order;
                    @endphp
                    <div class="row">
                      <div class="col-md-12">
                        <div class="d-flex justify-content-between">
                          <div>
                            <h6>
                              <strong>Order Number :</strong> {{ $order->order_no }}
                            </h6>
                            <h6><strong>Customer :</strong> {{ $order->user?->name }}</h6>
                            <h6><strong>Phone :</strong> {{ $order->user?->mobile }}</h6>
                            @if($order->user?->email)
                              <h6><strong>Email :</strong> {{ $order->user?->email }}</h6>
                            @endif
                          </div>
                          <span>
                            <strong>Order Date :</strong> {{ dateFormat($order->created_at) }}
                            <br>
                            <strong>Order Status :</strong> {{ $order->formatted_order_status }}
                            <br>
                            @if ($order->order_status == App\Models\Order::CANCELLED)
                              <strong>Cancel Reason :</strong> {{ $order->cancel_reason }}
                              <br>
                            @endif
                            <strong>Payment Method :</strong> {{ $order->formatted_payment_method }}
                            <br>
                            <strong>Payment Status :</strong> {{ $order->formatted_payment_status }}
                          </span>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-12">
                        <table class="table table-bordered" id="myTable" width="100%">
                          <thead>
                          <tr>
                            <th style="width: 10px">SL</th>
                            <th>Product name</th>
                            <th>Product Qty</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach ($order->load('products')->products->load('unit') as $product)
                            <tr>
                              <td>
                                {{ $loop->iteration }}
                              </td>
                              <td>
                                {{ $product->name }}
                              </td>
                              <td>
                                {{ $product->pivot->qty }} {{ $product->unit->name }}
                              </td>
                              <td>
                                {{ $product->pivot->price }} tk
                              </td>
                              <td>
                                {{ $product->pivot->price * $product->pivot->qty }} tk
                              </td>
                            </tr>
                          @endforeach
                          <tr>
                            <th colspan="4">
                              <p class="mb-0 text-right">Grand Total</p>
                            </th>
                            <td>
                              <p class="mb-0">{{ $order->total }} tk</p>
                            </td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-4">
                        <h4 class="font-weight-bolder">Shipping Info</h4>
                        <table class="table table-sm table-borderless">
                          <tr>
                            <th>Address</th>
                            <td>: {{ $order->address?->address }}</td>
                          </tr>
                        </table>
                      </div>
                    </div>
                    @if($order->feedbacks->count())
                      <div class="row border-top-lg pt-4">
                        <div class="col-md-4">
                          <h4 class="font-weight-bolder">Feedback</h4>
                          <table class="table table-sm table-borderless">
                            @foreach($order->feedbacks as $feedback)
                              <tr>
                                <th><img class="w-40px rounded-circle" src="{{ getImageUrl($order->user?->profile_picture) }}" alt="{{ $order->user?->name }}" loading="lazy"> {{ $order->user?->name }}</th>
                              </tr>
                              <tr>
                                <td>{{ $feedback->content }}</td>
                              </tr>
                            @endforeach
                          </table>
                        </div>
                      </div>
                    @endif
                  </div>
                </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="payment Method" class="col-md-2 col-form-label"><b>{{__('Payment Method')}} </b></label>
                <label for="payment Method" class="col-md-8 col-form-label"><b>{{$payment->type == 1?'Mobile Banking (Bkash/Nogod/Rocket)':'Bank Transfer'}} </b></label>
                
              </div>
              <div class="form-group row">
                <label for="payment document" class="col-md-2 col-form-label"><b>{{__('Prove Document')}} </b></label>
                <img src="{{getImageUrl($payment->prove_document)}}" alt="">
                
              </div>
              <form action="{{route('payment.update',$payment->id)}}" method="post">
                @csrf
                @method('put')
              <div class="form-group row">
                <label for="status" class="col-md-2 col-form-label"><b>{{__('Status')}} <span class="text-danger">*</span></b></label>
                <div class="col-lg-8">
                  <select name="status" id="status"  class="custom-select  @error('status') is-invalid @enderror">
                    <option value="0" {{$payment->status == 0?'selected':null }}>Pending</option>
                    <option value="1" {{$payment->status == 1?'selected':null }}>Approved</option>
                    <option value="2" {{$payment->status == 2?'selected':null }}>Rejected</option>
                  </select>
                  @error('status')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                  @enderror
                  <span class="form-text text-muted">Please select the status.</span>
                </div>
              </div>

              <div class="form-group row">
                  
              </div>

             

            </div>
            <div class="kt-portlet__foot">
              <div class="kt-form__actions">
                <div class="row">
                  <div class="col-lg-6">
                    <!-- <button type="reset" class="btn btn-danger">Delete</button> -->
                  </div>
                  <div class="col-lg-6 kt-align-right">
                    <button type="submit" class="btn btn-primary">Save</button>
                   
                  </div>
                </div>
              </div>
            </div>
          </form>
    </div>
</div>

  
@endsection
