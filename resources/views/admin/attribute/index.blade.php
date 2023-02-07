@extends('layouts.default')

@section('content')
  <div class="card card-custom">
    <div class="card-header">
      <div class="card-title">
        <h3 class="card-label">Attributes</h3>
      </div>
    </div>

    <div class="card-body">
      <div class="row">
        <div class="col">
          <table class="table"  id="data-table">
            <thead>
            <tr>
              <th>Name</th>
              <th>Attribute values</th>
              <th style="width: 60px">Action</th>
            </tr>
            </thead>
            <tbody>
{{--                    {{dd($attributes)}}--}}
            @foreach($attributes as $attribute)
              <tr>
                <td class="align-middle">
                  {{ $attribute->name }}
                </td>
                <td class="align-middle">
                  @foreach($attribute->attributeValues as $values)
                    {{$values->value }} ,
                  @endforeach
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
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
      $('#data-table').DataTable();

    })
  </script>
@endpush
