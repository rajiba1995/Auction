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
        <form action="{{route('admin.badge.update')}}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 col-12">
                          
                    <div class="form-wrap mb-3">
                        <label for="">Logo</label>
                        <img src="{{asset($data->logo)}}" alt="no-image" width="85px" class="img-thumbnail">
                            <input type="file" class="form-control" name="logo" id="logo">
                            @error('logo')<div class="text-danger">{{ $message }}</div>@enderror                      
                    </div>

                    <div class="form-wrap mb-3">
                    <label for="">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{$data->title}}">
                        @error('title')<div class="text-danger">{{ $message }}</div>@enderror                      
                    </div>
                    <div class="form-wrap mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="">Badge Type</label>
                                <select name="type" class="form-select">

                                    <option  value="0" {{$data->type==0? "selected" : ""}}>Free</option>
                                    <option value="1" {{$data->type==1? "selected" : ""}}>Basic</option>
                                    <option value="2" {{$data->type==2? "selected" : ""}}>Intermideate</option>
                                    <option value="3" {{$data->type==3? "selected" : ""}}>Advance</option>
                                </select>
                                    @error('type')<div class="text-danger">{{ $message }}</div>@enderror                      
                            </div>
                            @if($data->type != 0)  
                            <div class="col">
                                <label for="">Duration(in monthes)</label>
                                <input type="number" class="form-control" name="duration" id="duration" value="{{$data->duration}}">
                                @error('duration')<div class="text-danger">{{ $message }}</div>@enderror                      
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-wrap mb-3">
                        <label for="">Short Description</label>
                            <textarea type="text" class="form-control" name="short_desc" id="short_desc" >{{$data->short_desc}}</textarea>
                            @error('short_desc')<div class="text-danger">{{ $message }}</div>@enderror                      
                        </div>

                        <div class="form-wrap mb-3">
                            <label for="">Long Description</label>
                            <textarea type="text" class="form-control" name="long_desc" id="long_desc" >{{ $data->long_desc}}</textarea>
                            @error('long_desc')<div class="text-danger">{{ $message }}</div>@enderror                      
                        </div>

                        <div class="form-wrap mb-3">
                            <label for="">Price</label>
                                <input type="text" class="form-control" name="price" id="price" value="{{$data->price}}">
                                @error('price')<div class="text-danger">{{ $message }}</div>@enderror                      
                        </div>

                            <div class="form-wrap mb-3">
                                <label for="">Price Prefix</label>
                                    <input type="text" class="form-control" name="price_prefix" id="price_prefix" value="{{$data->price_prefix}}">
                                    @error('price_prefix')<div class="text-danger">{{ $message }}</div>@enderror                      
                         </div>

                         <input type="hidden" name="id"  value="{{$data->id}}"/>


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
@endpush