@extends('layouts.default')
@section('content')
  <div class="card card-custom">
    <div class="card-header">
      <div class="card-title">
        <h3 class="card-label">Edit Customer</h3>
      </div>
    </div>
    <div class="card-body">
      <form class="kt-form kt-form--label-right" enctype="multipart/form-data" method="POST" action="{{ route('customer.update', $customer->id) }}">
        @csrf
        @method('PUT')

        <div class="kt-portlet__body">

          @include('dashboard.user-management.partials.edit-form-fields', ['user' => $customer])

        </div>
        <div class="kt-portlet__foot">
          <div class="kt-form__actions">
            <div class="row">
              <div class="col-lg-6">
                <!-- <button type="reset" class="btn btn-danger">Delete</button> -->
              </div>
              <div class="col-lg-6 kt-align-right">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('customer.index') }}" class="btn btn-secondary">Cancel</a>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
