@extends('layouts.default')

@section('content')
  <div class="card card-custom">
    <div class="card-header">
      <div class="card-title">
        <h3 class="card-label">Products Stock</h3>
      </div>
      {{--      <div class="card-toolbar">--}}
      {{--      </div>--}}
    </div>

    <div class="card-body">
      <table class="table" id="myTable" width="100%">
        <thead>
        <tr>
          <th style="width: 10px">SL</th>
          <th>Image</th>
          <th>Name</th>
          <th>Category</th>
          <th>Stock</th>
          <th>Sale Price</th>
          {{--          @if (!isset($stockreport))--}}
          {{--            <th style="width: 60px">Action</th>--}}
          {{--          @endif--}}
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
              <img src="{{ $product->image_url }}" alt="{{ $product->name }}" height="50px" width="50px" loading="lazy"/>
            </td>
            <td>{{ $product->name }}</td>
            <td>
              @foreach ($product->categories as $category)
                <p class="badge badge-secondary d-inline-block w-auto">{{ $category->name }}</p>
              @endforeach
            </td>
            <td>
              <a target="__blank" href="{{ route("warehouse.stock.store-wise", $product->id) }}">
                @unless ($store)
                  {{ $product->stock - ($product->stores->sum('pivot.stock_out')) }}
                @else
                  {{ $product->storeStock($store->id) }}
                @endunless
              </a>
            </td>
            <td>{{ $product->regular_price }}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection

@push('style')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}"/>
@endpush

@push('script')
  <script type="text/javascript" src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();
    })
  </script>
@endpush
