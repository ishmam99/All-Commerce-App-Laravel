@extends('layouts.default')

@section('content')
  <div class="card card-custom">
    <div class="card-header">
      <div class="card-title">
        <h3 class="card-label">Customers Report</h3>
      </div>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table" id="data-table">
          <thead>
          <tr>
            <th style="width: 10px">SL</th>
            <th>Name</th>
            <th>Email</th>
            <th class="text-right">Shopping Amount</th>
            <th class="text-right">Due Amount</th>
          </tr>
          </thead>
          <tbody>
          @foreach($customers as $customer)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $customer->name }}</td>
              <td>{{ $customer->email }}</td>
              <td
                class="text-right">{{ $customer->orders_summary->total_ordered_amount + $customer->sales_summary->total_sales_amount }}
                TK
              </td>
              <td class="text-right">{{ $customer->sales_summary->total_sales_due_amount }} TK</td>
            </tr>
          @endforeach
          </tbody>
          <tfoot id="customer-report-table-footer">
          <tr class="text-center">
            <th></th>
            <th></th>
            <th>Total :</th>
            <th class="text-right"></th>
            <th class="text-right"></th>
          </tr>
          </tfoot>
        </table>
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
      $('#data-table').DataTable({
        "footerCallback": function (row, data, start, end, display) {
          if (data.length > 0) {
            var api = this.api(), data;

            // Remove the formatting to get integer data for summation
            var intVal = function (i) {
              return typeof i === 'string' ? i.replace(/[\$,'TK''&nbsp;'' ']/g, '') * 1 : typeof i === 'number' ? i :
                0;

            };

            // Total over all page
            let totalAmount = api.column(3).data().reduce(function (a, b) {
              return intVal(a) + intVal(b);
            }, 0);

            // Total over all page
            let totalDue = api.column(4).data().reduce(function (a, b) {
              return intVal(a) + intVal(b);
            }, 0);

            // Number formatting
            let format = function number_format(number) {
              return number.toString().replace(/./g, function (c, i, a) {
                return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
              });
            }

            // Update footer
            $(api.column(3).footer()).html(format(totalAmount) + ' TK');
            $(api.column(4).footer()).html(format(totalDue) + ' TK');
          } else {
            $('#customer-report-table-footer').remove();
          }
        }
      });
    })
  </script>
@endpush
