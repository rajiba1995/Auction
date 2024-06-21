@extends('admin.app')

<style>
    .star{
        color: red;
        font-size: 1.5em;
        vertical-align: -0.25em;
    
    }
    </style>
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div style="display: flex; alig-items: center; justify-content:center;"  class="report-table-box bg-primary text-center">
            <h3 style="font-size: 25px" class="text-white text-center">Website Settings Form</h3>
           {{-- {{dd($data)}} --}}
                </div>
                <br>
                <br>
                        <form action="{{ route('admin.website-settings.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                            <div class="mb-3">
                                <label for="official_phone1"><strong>Official contact number 1</strong> <span class="star">*</span></label>
                                <input type="text" class="form-control" name="official_phone1" id="official_phone1" value="{{ old('official_phone1') ? old('official_phone1') : $data[0]->content }}">
                                @error('official_phone1') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                            <div class="col">
                            <div class="mb-3">
                                <label for="official_phone2"><strong>Official contact number 2</strong> <span class="star" style="color: white">*</span></label>
                                <input type="text" class="form-control" name="official_phone2" id="official_phone2" value="{{ old('official_phone2') ? old('official_phone2') : $data[1]->content }}">
                                @error('official_phone2') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="official_email"><strong>Official email</strong> <span id=><span class="star">*</span></span></label>
                                <input type="email" class="form-control" name="official_email" id="official_email" value="{{ old('official_email') ? old('official_email') : $data[2]->content }}">
                                @error('official_email') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="website_link"><strong>Website</strong> <span class="star">*</span></label>
                                <input type="text" class="form-control" name="website_link" id="website_link" value="{{ old('website_link') ? old('website_link') : $data[8]->content }}">
                                @error('website_link') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        </div>

                            
                            
                        <div class="row">
                            <div class="col">
                            <div class="mb-3">
                                <label for="full_company_name"><strong>Full Company name</strong> <span class="star">*</span></label>
                                <input type="text" class="form-control" name="full_company_name" id="full_company_name" value="{{ old('full_company_name') ? old('full_company_name') : $data[3]->content }}">
                                @error('full_company_name') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            </div>
                            <div class="col">
                            <div class="mb-3">
                                <label for="pretty_company_name"><strong>Pretty Company name </strong><span class="star">*</span></label>
                                <input type="text" class="form-control" name="pretty_company_name" id="pretty_company_name" value="{{ old('pretty_company_name') ? old('pretty_company_name') : $data[4]->content }}">
                                @error('pretty_company_name') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                            </div>
                            <div class="row">
                                <div class="col">
                            <div class="mb-3">
                                <label for="company_logo"><strong>Company Logo</strong><span class="star">*</span></label>&nbsp;&nbsp;
                                <img src="{{asset($data[9]->content)}}" width="18.5%" alt="No-Image" class="img-thumbnail"/><br/>
                                <input type="file" class="form-control mt-1" name="company_logo" id="company_logo" value="{{ old('company_logo') }}">
                                @error('company_logo') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                                </div>
                                <div class="col">
                                <div class="mb-3">
                                <label for="company_favicon"><strong> Fav-icon </strong><span class="star">*</span></label>&nbsp;&nbsp;
                                <img src="{{asset($data[10]->content)}}" width="20%" alt="No-Image" class="img-thumbnail"/><br/>
                                <input type="file" class="form-control mt-2" name="company_favicon" id="company_favicon" value="{{ old('company_favicon') }}">
                                @error('company_favicon') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                                </div>                              
                            </div>

                            <div class="mb-3">
                                <label for="company_short_desc"><strong>Short Company description </strong><span class="star">*</span></label>
                                <textarea name="company_short_desc" id="company_short_desc" class="form-control" rows="4">{{ old('company_short_desc') ? old('company_short_desc') : $data[5]->content }}</textarea>
                                @error('company_short_desc') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="company_full_address"><strong>Full Company address </strong><span class="star">*</span></label>
                                <textarea class="form-control" name="company_full_address" id="company_full_address">{{ old('company_full_address') ? old('company_full_address') : $data[6]->content }}</textarea>
                                @error('company_full_address') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="google_map_address_link"><strong>Google map address link </strong><span class="star">*</span></label>
                                <textarea name="google_map_address_link" id="google_map_address_link" class="form-control" rows="4">{{ old('google_map_address_link') ? old('google_map_address_link') : $data[7]->content }}</textarea>
                                @error('google_map_address_link') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                        </br>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
          
</section>
@endsection