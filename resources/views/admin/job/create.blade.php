@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="row">
        <div class="col-md-12">
            <div class="report-table-box">
                <div class="heading-row mb-2">
                    <h3>Create Job</h3>
                    <a href="{{route('admin.job.index')}}" class="btn btn-danger btn-sm">
                        <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                        Back 
                    </a>
                </div>
               <div class="mt-3">
                <form action="{{route('admin.job.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="client_name" class="form-label">Client Name</label>
                            <select name="client_name" id="client_name" class="form-control w-100 js-example-basic-single" data-placeholder="Select a client">
                                <option value="">Select client</option>
                                @foreach ($clients as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error('client_name')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="unit_name" class="form-label">Unit Name</label>
                            <select name="unit_name" id="unit_name" class="form-control w-100 js-example-basic-single" data-placeholder="Select a unit">
                                <option value="">Select unit</option>
                                @foreach ($units as $item)
                                    <option value="{{$item->name}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error('unit_name')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>
                        <div class="mb-3">
                            <label for="vendor_name" class="form-label">Vendor (Supplier)</label>
                            <select name="vendor_name" id="vendor_name" class="form-control w-100 js-example-basic-single" data-placeholder="Select a vendor">
                                <option value="">Select vendor</option>
                                @foreach ($vendors as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error('vendor_name')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                     <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="vendor_location" class="form-label">Location of Vendor(Supplier)</label>
                            <input type="text" class="form-control" name="vendor_location" id="vendor_location" value="{{old('vendor_location')}}" readonly>
                            @error('vendor_location')<div class="text-danger">{{ $message }}</div>@enderror
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="inspection_date" class="form-label">Inspection date</label>
                            <input type="date" class="form-control" name="inspection_date" id="inspection_date" value="{{old('inspection_date')}}">
                            @error('inspection_date')<div class="text-danger">{{ $message }}</div>@enderror
                          </div>
                     </div>
                      <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="po_no" class="form-label">P.O No:</label>
                            <input type="text" class="form-control" name="po_no" id="po_no" value="{{old('po_no')}}">
                            @error('po_no')<div class="text-danger">{{ $message }}</div>@enderror
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="lot_no" class="form-label">Lot No:</label>
                            <input type="text" class="form-control" name="lot_no" id="lot_no" value="{{old('lot_no')}}">
                            @error('lot_no')<div class="text-danger">{{ $message }}</div>@enderror
                          </div>
                      </div>
                      <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="branding_side" class="form-label">Branding (Side)</label>
                            <input type="text" class="form-control" name="branding_side" id="branding_side" value="{{old('branding_side')}}">
                            @error('branding_side')<div class="text-danger">{{ $message }}</div>@enderror
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="stitching_thread_colour" class="form-label">Stitching Thread Colour</label>
                            <input type="text" class="form-control" name="stitching_thread_colour" id="stitching_thread_colour" value="{{old('stitching_thread_colour')}}">
                            @error('stitching_thread_colour')<div class="text-danger">{{ $message }}</div>@enderror
                          </div>
                      </div>
                      <div class="row">
                        <div class="mb-3 col-md-3">
                            <label for="quantity" class="form-label">Quantity:</label>
                            <input type="text" class="form-control" name="quantity" id="quantity" value="{{old('quantity')}}">
                            @error('quantity')<div class="text-danger">{{ $message }}</div>@enderror
                          </div>
                          <div class="mb-3 col-md-3">
                                <label for="package_name" class="form-label">Package Name</label>
                                <select name="package_name" id="package_name" class="form-control w-100">
                                    <option value="">Select package</option>
                                    @foreach ($packages as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('package_name')<div class="text-danger">{{ $message }}</div>@enderror
                          </div>
                          <div class="mb-3 col-md-6">
                                <label for="inspector_name" class="form-label">Inspector Name</label>
                                <select name="inspector_name" id="inspector_name" class="form-control w-100 js-example-basic-single" data-placeholder="Select a inspector">
                                    <option value="">Select vendor</option>
                                    @foreach ($inspectors as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('inspector_name')<div class="text-danger">{{ $message }}</div>@enderror
                          </div>
                      </div>
                      <div class="mb-3">
                        <label for="quality" class="form-label">Quality</label>
                        <textarea class="form-control" name="quality" id="quality" rows="3">{{old('quality')}}</textarea>
                        @error('quality')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                      <div class="mb-3 text-end">
                        <button type="submit" class="form-control btn btn-primary" style="width: auto;">Submit</button>
                      </div>

                </form>
               </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            placeholder: 'Select a data',
            allowClear: true
        });
    });

    // Vendor Data Fetch
    $(document).ready(function() {
        $('#vendor_name').on('change', function() {
            var selectedVendorId = $(this).val();
            var baseUrl = "{{ url('/') }}";
            $.ajax({
                url: baseUrl + '/admin/job/vendor/fetchdata/' + selectedVendorId,
                type: 'GET',
                success: function(data) {
                    var location = data.result.location+', '+data.result.pincode+', '+data.result.state;
                    $('#vendor_location').val(location);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>
@endpush