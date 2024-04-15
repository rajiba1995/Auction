@extends('admin.app')


@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row mb-2">
            <h3>Website Settings Form</h3>
           {{-- {{dd($data)}} --}}
                </div>
                        <form action="{{ route('admin.website-settings.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                            <div class="form-group">
                                <label for="official_phone1">Official contact number 1 *</label>
                                <input type="text" class="form-control" name="official_phone1" id="official_phone1" value="{{ old('official_phone1') ? old('official_phone1') : $data[0]->content }}">
                                @error('official_phone1') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                            <div class="col">
                            <div class="form-group">
                                <label for="official_phone2">Official contact number 2</label>
                                <input type="text" class="form-control" name="official_phone2" id="official_phone2" value="{{ old('official_phone2') ? old('official_phone2') : $data[1]->content }}">
                                @error('official_phone2') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="official_email">Official email *</label>
                                <input type="email" class="form-control" name="official_email" id="official_email" value="{{ old('official_email') ? old('official_email') : $data[2]->content }}">
                                @error('official_email') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="website_link">Website *</label>
                                <input type="text" class="form-control" name="website_link" id="website_link" value="{{ old('website_link') ? old('website_link') : $data[8]->content }}">
                                @error('website_link') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        </div>

                            
                            
                        <div class="row">
                            <div class="col">
                            <div class="form-group">
                                <label for="full_company_name">Full Company name *</label>
                                <input type="text" class="form-control" name="full_company_name" id="full_company_name" value="{{ old('full_company_name') ? old('full_company_name') : $data[3]->content }}">
                                @error('full_company_name') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            </div>
                            <div class="col">
                            <div class="form-group">
                                <label for="pretty_company_name">Pretty Company name *</label>
                                <input type="text" class="form-control" name="pretty_company_name" id="pretty_company_name" value="{{ old('pretty_company_name') ? old('pretty_company_name') : $data[4]->content }}">
                                @error('pretty_company_name') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                            </div>
                            <div class="row">
                                <div class="col">
                            <div class="form-group">
                                <label for="company_logo">Company Logo*</label>
                                <img src="{{asset($data[9]->content)}}" width="100px" alt="No-Image" class="img-thumbnail"/><br/>
                                <input type="file" class="form-control" name="company_logo" id="company_logo" value="{{ old('company_logo') }}">
                                @error('company_logo') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                                </div>
                                <div class="col">
                                <div class="form-group">
                                <label for="company_favicon">Company Fav-icon*</label>
                                <img src="{{asset($data[10]->content)}}" width="100px" alt="No-Image" class="img-thumbnail"/><br/>
                                <input type="file" class="form-control" name="company_favicon" id="company_favicon" value="{{ old('company_favicon') }}">
                                @error('company_favicon') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                                </div>                              
                            </div>

                            <div class="form-group">
                                <label for="company_short_desc">Short Company description *</label>
                                <textarea name="company_short_desc" id="company_short_desc" class="form-control" rows="4">{{ old('company_short_desc') ? old('company_short_desc') : $data[5]->content }}</textarea>
                                @error('company_short_desc') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="company_full_address">Full Company address *</label>
                                <input type="text" class="form-control" name="company_full_address" id="company_full_address" value="{{ old('company_full_address') ? old('company_full_address') : $data[6]->content }}">
                                @error('company_full_address') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="google_map_address_link">Google map address link *</label>
                                <textarea name="google_map_address_link" id="google_map_address_link" class="form-control" rows="4">{{ old('google_map_address_link') ? old('google_map_address_link') : $data[7]->content }}</textarea>
                                @error('google_map_address_link') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
          
</section>
@endsection