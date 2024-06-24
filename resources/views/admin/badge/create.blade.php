@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row mb-2">
            <h3>New Badge</h3>
            <a href="{{route('admin.badge.index')}}" class="btn btn-danger btn-sm">
                <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                Back 
            </a>
        </div>
        <form action="{{route('admin.badge.store')}}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 col-12">
                          
                    <div class="form-wrap mb-3">
                        <label for="">Logo</label>
                            <input type="file" class="form-control" name="logo" id="logo">
                            @error('logo')<div class="text-danger">{{ $message }}</div>@enderror                      
                    </div>

                    <div class="form-wrap mb-3">
                    <label for="">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
                        @error('title')<div class="text-danger">{{ $message }}</div>@enderror                      
                    </div>
                    <div class="form-wrap mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="">Badge Type</label>
                                <select name="type" class="form-select"  id="type">
                                    <option selected value="0">Free</option>
                                    <option value="1">Basic</option>
                                    <option value="2">Intermideate</option>
                                    <option value="3">Advance</option>
                                </select>
                                    @error('type')<div class="text-danger">{{ $message }}</div>@enderror  
                            </div>
                            <div class="col" id="duration-container">
                            <label for="">Duration(in monthes)</label>
                                <input type="number" class="form-control" name="duration" id="duration" value="{{old('duration')}}">
                                @error('duration')<div class="text-danger">{{ $message }}</div>@enderror   
                            </div>   
                        </div>                    
                    </div>
                    <div class="form-wrap mb-3">
                        <label for="">Short Description</label>
                            <textarea type="text" class="form-control" name="short_desc" id="short_desc" >{{old('short_desc')}}</textarea>
                            @error('short_desc')<div class="text-danger">{{ $message }}</div>@enderror                      
                        </div>

                        <div class="form-wrap mb-3">
                            <label for="">Long Description</label>
                            <textarea type="text" class="form-control" name="long_desc" id="long_desc" >{{old('long_desc')}}</textarea>
                            @error('long_desc')<div class="text-danger">{{ $message }}</div>@enderror                      
                        </div>

                        <div class="form-wrap mb-3">
                            <label for="">Price</label>
                                <input type="text" class="form-control" name="price" id="price" value="{{old('price')}}">
                                @error('price')<div class="text-danger">{{ $message }}</div>@enderror                      
                        </div>

                            <div class="form-wrap mb-3">
                                <label for="">Price Prefix</label>
                                    <input type="text" class="form-control" name="price_prefix" id="price_prefix" value="{{old('price_prefix')}}">
                                    @error('price_prefix')<div class="text-danger">{{ $message }}</div>@enderror                      
                         </div>


                </div>
                
                <div class="col-12">
                    <div class="form-wrap">
                        <input type="submit" value="Save" class="btn btn-save ms-auto">
                    </div>
                </div>
            </div>
          </form>
    </div>
</div>
@endsection
@push('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const typeSelect = document.getElementById('type');
        const durationContainer = document.getElementById('duration-container');

        function toggleDurationField() {
            if (typeSelect.value == '0') {
                durationContainer.style.display = 'none';
            } else {
                durationContainer.style.display = 'block';
            }
        }

        // Initial check
        toggleDurationField();

        // Add event listener
        typeSelect.addEventListener('change', toggleDurationField);
    });
</script>
@endpush