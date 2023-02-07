@extends('layouts.default')
@section('content')
  <div class="card card-custom">
    <div class="card-header">
      <div class="card-title">
        <h3 class="card-label">Add Product</h3>
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
      <form class="kt-form kt-form--label-right" enctype="multipart/form-data" method="POST"
            action="{{route('attribute.store')}}">
        @csrf
        <div class="kt-portlet__body">
          <div class="row">
            <div class="col-md-8">
                <label class="form-label">Name:</label>
                <input type="text" name="name" class="form-control mb-2 mb-md-0" placeholder="Enter attribute name"/>
            </div>
          </div>
          <div class="row mt-5">
            <label class="col-md-1 col-form-label" for="discount"><b>{{__('Value')}}</b></label>
            <div class="col-md-8">
              <!--begin::Repeater-->
              <div id="values">
                <!--begin::Form group-->
                <div class="form-group">
                  <div data-repeater-list="values">
                    <div data-repeater-item>
                      <div class="form-group row">
                        <div class="col-md-3">
                          <input type="text" name="value" class="form-control mb-2 mb-md-0" placeholder="Enter attribute value"/>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--end::Form group-->

                <!--begin::Form group-->
                <div class="form-group mt-5">
                  <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
                    <i class="la la-plus"></i>Add
                  </a>
                </div>
                <!--end::Form group-->
              </div>
              <!--end::Repeater-->
            </div>
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
                <a href="{{route('product.index')}}" class="btn btn-secondary">Cancel</a>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

@endsection

@push('script')
  <script src="{{asset('assets/plugins/onscan.min.js')}}" type="text/javascript"></script>

  <script>
    let regular_price = document.getElementById('regular_price');
    let sell_price = document.getElementById('sell_price');
    let discount = document.getElementById('discount');

    //when sell input change
    function showDiscount() {
      if (sell_price.value < 0) {
        sell_price.value = '';
      }
      if (parseInt(regular_price.value) > parseInt(sell_price.value)) {
        discount.value = Math.round((regular_price.value - sell_price.value) / (regular_price.value * 0.01));
      } else {
        sell_price.value = '';
      }
    }

    //when discount input change
    function showSellPrice() {
      if (discount.value > 100) {
        discount.value = '';
      }
      sell_price.value = Math.round(regular_price.value - (regular_price.value * (discount.value / 100)));
    }

    // Add existing barcode to product
    onScan.attachTo(document, {
      suffixKeyCodes: [13], // enter-key expected at the end of a scan
      reactToPaste: false, // Compatibility to built-in scanners in paste-mode (as opposed to keyboard-mode)
      onScan: function (sCode, iQty) { // Alternative to document.addEventListener('scan')
        document.getElementById('barcode').value = sCode;
      },
      onKeyDetect: function (iKeyCode) {
        // console.log('Pressed: ' + iKeyCode);
      }
    });

    //sub category
    $('#category_id').on('change', function () {
      //reset sub subcategory value
      let subSubcategory = $("#sub_subcategory_id");
      subSubcategory.attr('disabled', true);
      subSubcategory.html('');

      let category_id = $('#category_id').select2("val");

      $.ajax({
        method: "post",
        url: "{{ route('load.subcategory') }}",
        data: {category_id: category_id, "_token": "{{ csrf_token() }}"},
        dataType: "html",
        success: function (response) {
          let subcategory = $("#subcategory_id");
          subcategory.attr("disabled", false);
          subcategory.html(response);
        },
        error: function (err) {
          console.log(err);
        }
      });
    });
    //sub subcategory
    $('#subcategory_id').on('change', function () {
      let subcategory_id = $('#subcategory_id').select2("val");
      $.ajax({
        method: "post",
        url: "{{ route('load.subSubcategory') }}",
        data: {subcategory_id: subcategory_id, "_token": "{{ csrf_token() }}"},
        dataType: "html",
        success: function (response) {
          let subSubcategory = $("#sub_subcategory_id");
          subSubcategory.attr("disabled", false);
          subSubcategory.html(response);
        },
        error: function (err) {
          console.log(err);
        }
      });
    });

    //show image
    function readURL(input, id) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $(id).css("background-image", "url(" + e.target.result + ")");
        };
        reader.readAsDataURL(input.files[0]);
      }
    }

    function ImageClear(id) {
      $(id).css("background-image", "url()");
    }

    $('#values').repeater({
      initEmpty: false,

      defaultValues: {
        'text-input': 'foo'
      },

      show: function () {
        $(this).slideDown();
      },

      hide: function (deleteElement) {
        $(this).slideUp(deleteElement);
      }
    });


  </script>
@endpush
