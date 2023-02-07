@extends('layouts.default')
@section('content')
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">Edit Attribute</h3>
            </div>
          <a href="{{route('product.edit',$productAttribute->product_id)}}"> <button class="btn btn-primary">Back <i class="fa fa-arrow-right"></i></button></a>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
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
                action="{{ route('update.attribute', $productAttribute->id) }}">
                @csrf
            
                <div class="kt-portlet__body">
                    <div class="row">
                        <div class="col-lg-7">

                            

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label" for="name"><b>{{ __('Attribute Name') }}</b></label>
                                <div class="col-md-8">
                                    <input name="name" id="name" value="{{ old('name') ?? $productAttribute->name }}"
                                        placeholder="Ex: " type="text"
                                        class="form-control  @error('name') is-invalid @enderror">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"
                                    for="quantity"><b>{{ __('Quantity') }}</b></label>
                                <div class="col-md-8">
                                    <input class="form-control @error('quantity') is-invalid @enderror"
                                        id="quantity" name="quantity"
                                        placeholder="Enter a product Short Description..."
                                        rows="3" value="{{old('quantity') ?? $productAttribute->quantity }} ">
                                    @error('quantity')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                             <button type="submit" class="btn btn-success">Save</button>
                            
            </form>
            
        </div>
    </div>
<!-- Modal -->

@endsection

@push('script')
    <script src="{{ asset('assets/plugins/onscan.min.js') }}" type="text/javascript"></script>

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
            onScan: function(sCode, iQty) { // Alternative to document.addEventListener('scan')
                document.getElementById('barcode').value = sCode;
            },
            onKeyDetect: function(iKeyCode) {
                // console.log('Pressed: ' + iKeyCode);
            }
        });

        //sub category
        $('#category_id').on('change', function() {
            //reset sub subcategory value
            let subSubcategory = $("#sub_subcategory_id");
            subSubcategory.attr('disabled', true);
            subSubcategory.html('');

            let category_id = $('#category_id').select2("val");
            $.ajax({
                method: "post",
                url: "{{ route('load.subcategory') }}",
                data: {
                    category_id: category_id,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: "html",
                success: function(response) {
                    let subcategory = $("#subcategory_id");
                    subcategory.attr("disabled", false);
                    subcategory.html(response);
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });
        //sub subcategory
        $('#subcategory_id').on('change', function() {
            let subcategory_id = $('#subcategory_id').select2("val");
            $.ajax({
                method: "post",
                url: "{{ route('load.subSubcategory') }}",
                data: {
                    subcategory_id: subcategory_id,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: "html",
                success: function(response) {
                    let subSubcategory = $("#sub_subcategory_id");
                    subSubcategory.attr("disabled", false);
                    subSubcategory.html(response);
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });

        function readURL(input, id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(id).css("background-image", "url(" + e.target.result + ")");
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function ImageClear(id) {
            $(id).css("background-image", "url()");
        }




        // var avatar4 = new KTImageInput('#');

        // avatar4.on('cancel', function(imageInput) {
        //     swal.fire({
        //         title: 'Image successfully canceled !',
        //         type: 'success',
        //         buttonsStyling: false,
        //         confirmButtonText: 'Awesome!',
        //         confirmButtonClass: 'btn btn-primary font-weight-bold'
        //     });
        // });

        // avatar4.on('change', function(imageInput) {
        //     swal.fire({
        //         title: 'Image successfully changed !',
        //         type: 'success',
        //         buttonsStyling: false,
        //         confirmButtonText: 'Awesome!',
        //         confirmButtonClass: 'btn btn-primary font-weight-bold'
        //     });
        // });

        // avatar4.on('remove', function(imageInput) {
        //     swal.fire({
        //         title: 'Image successfully removed !',
        //         type: 'error',
        //         buttonsStyling: false,
        //         confirmButtonText: 'Got it!',
        //         confirmButtonClass: 'btn btn-primary font-weight-bold'
        //     });
        // });

    </script>
@endpush
@push('script')
    <!--begin::Page Scripts(used by this page)-->

    <!--end::Page Scripts-->
@endpush
