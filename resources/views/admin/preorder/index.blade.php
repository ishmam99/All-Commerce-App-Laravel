@extends('layouts.default')

@section('content')
  <div class="card card-custom">
    <div class="card-header">
      <div class="card-title">
        <h3 class="card-label">PreOrders</h3>
      </div>
      <div class="card-toolbar">
       
      </div>
    </div>

    <div class="card-body">
      <table class="table" id="myTable" width="100%">
        <thead>
          <tr>
            <th style="width: 10px">SL</th>
           
            <th>Customer Name</th>
            <th>Products</th>
            <th>Quantity</th>
           
            <th style="width: 60px">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($preorders as $preorder)
            <tr>
              <td>
                {{ $loop->iteration }}
              </td>
               <td>
                {{ $preorder->user->name }}
              </td>
            
              
            
              <td>
                @foreach ($preorder->preOrderProducts as $item)
                 <li>{{$item->productAttribute->product->name}} -> {{$item->productAttribute->name}} ({{$item->quantity}})</li>
                @endforeach

              </td>
              <td>
                {{ $preorder->quantity }}
              </td>
              
              <td>
                 
                {{-- @canany(['category.all', 'category.edit'])
                  <a href="{{ route('category.edit', $cat->id) }}" class="btn btn-sm  btn-clean btn-icon"><i class="la la-edit icon-lg"></i></a>
                @endcanany

                @canany(['category.all', 'category.delete'])
                  <form method="post" action="{{ route('category.destroy', $cat->id) }}" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class=" btn btn-sm text-hover-danger btn-clean btn-icon"><i
                        class="la la-trash icon-lg"></i></button>
                  </form>
                @endcanany --}}
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
