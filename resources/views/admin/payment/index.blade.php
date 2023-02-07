@extends('layouts.default')

@section('content')
  <div class="card card-custom">
    <div class="card-header">
      <div class="card-title">
        <h3 class="card-label">Payments</h3>
      </div>
      <div class="card-toolbar">
       
      </div>
    </div>

    <div class="card-body">
      <table class="table" id="myTable" width="100%">
        <thead>
         
            <th style="width: 10px">SL</th>
            <th>Order</th>
            <th>Prove Document</th>
            <th>Customer Name</th>
            {{-- <th>Products</th> --}}
            <th>Payment Type</th>
            <th>Payment Status</th>
            <th>Amount</th>
            <th style="width: 60px">Action</th>
         
        </thead>
        <tbody>
          @foreach ($payments as $payment)
            <tr>
              <td>
                {{ $loop->iteration }}
              </td>
               <td>
                <a href="{{route('order.show',$payment->order->id)}}">{{ $payment->order->order_no }}</a>
              </td>
              <td>
                <a href="{{ getImageUrl($payment->prove_document) }}"><img width="100px" src="{{ getImageUrl($payment->prove_document) }}"></a>
               
              </td>
              
              <td>
                {{ $payment->user->name }}
              </td>
              {{-- <td>
                @foreach ($payment->order->products as $item)
                    <li>{{$item->name}}</li>
                @endforeach
              </td> --}}
              <td>
                {{ $payment->type }}
              </td>
              <td>
                {{ $payment->status==1 ? 'Paid' : 'Unpaid' }}
              </td>
              <td>{{$payment->amount}}</td>
              <td>
              
                  <a href="{{ route('payment.show', $payment->id) }}" class="btn btn-sm  btn-clean btn-icon"><i class="la la-edit icon-lg"></i></a>
            
                  <form method="post" action="{{ route('payment.destroy', $payment->id) }}" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class=" btn btn-sm text-hover-danger btn-clean btn-icon"><i
                        class="la la-trash icon-lg"></i></button>
                  </form>
            
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection

@push('style')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" />
@endpush

@push('script')
  <script type="text/javascript" src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    })
  </script>
@endpush
