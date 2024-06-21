@extends('front.layout.app')
@section('section')
<div class="main">
    <div class="inner-page">

        <div class="profile-page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    @include('front.user.layout.sidebar')
                    <div class="col-xxl-9 col-xl-8 col-12 profile-right">
                        <div class="sidebar-toggler">
                            <span class="sidebar-opener" id="sidebarOpener">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M385.1 219.9 199.2 34c-20-20-52.3-20-72.3 0s-20 52.3 0 72.3L276.7 256 126.9 405.7c-20 20-20 52.3 0 72.3s52.3 20 72.3 0l185.9-185.9c19.9-19.9 19.9-52.3 0-72.2z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path></g></svg>
                            </span>
                        </div>
                        <div class="tab-panes-wrapper">
                            <div class="tab-content">
                                <div class="tab-content-wrapper">
                                    <div class="top-content-bar">
                                        <a href="{{ route('user.photos_and_documents') }}" class="btn btn-normal btn-cta"><i class="fa-solid fa-backward"></i> Back</a>
                                    </div>
                                    <div class="inner">
                                        <div class="my-4">
                                            <p>UPLOAD<strong>->YOUR PHOTOS &amp; DOCUMENTS</strong> </p>
                                        </div>
                                            {{-- @if (session('success'))
                                                <div class="alert alert-success" id="message_div">
                                                    {{ session('success') }}
                                                </div>
                                            @endif --}}
                                        <form action="{{ route('user.photos_and_documents_update') }}" class="input-form" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="upload-photos-block">
                                                <label for="user_images" class="custom-upload">
                                                    <input type="file" name="user_images[]" id="user_images"  multiple="multiple">
                                                <span class="btn btn-animated btn-upload">Upload Photos</span>
                                                </label>
                                                <div class="mt-4">
                                                    @unless ($errors->has('gst_file') || $errors->has('gst_number') || $errors->has('pan_file') || $errors->has('pan_number') || $errors->has('adhar_file') || $errors->has('adhar_number') || $errors->has('trade_license_file') || $errors->has('trade_license_number') || $errors->has('cancelled_cheque_file') || $errors->has('account_number') || $errors->has('ifsc_code'))
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                <div class="alert alert-danger p-1">
                                                                    <li style="list-style-type: none;">{{ $error }}</li>
                                                                </div>
                                                                @endforeach
                                                            </ul>
                                                    @endunless
                                                </div>
                                                <div class="photos-block">
                                                    @foreach ($AllImages as  $item)
                                                    <div class="photo-wrap" id="RemoveLI{{$item->id}}">
                                                        <img src="{{asset($item->image)}}" alt="No-Image">
                                                            <span class="remove itemremove" data-id="{{$item->id}}">
                                                                <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9.5486 3.03894L3.26562 8.21932" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    <path d="M3.26562 3.03894L9.5486 8.21932" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                                                </svg>                                                        
                                                            </span>
                                                    </div>
                                                    @endforeach                                                    
                                                </div>
                                            </div>
                                            <div class="row input-row">
                                                <div class="col-lg-6 col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Upload GST</label>
                                                        <label for="gst_file" class="custom-upload">
                                                            <input type="file" name="gst_file" id="gst_file">
                                                            <span class="btn btn-animated btn-upload">Upload</span>
                                                        </label>
                                                        @error('gst_file')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">GST Number</label>
                                                        <input type="text" name="gst_number" class="form-control {{$user_document && $user_document->gst_number?"border-red":"border-danger"}}" value="{{$user_document?$user_document->gst_number:old('gst_number')}}">
                                                        @error('gst_number')<span class="text-danger" role="alert"> <strong>{{ $message }}</strong> </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row input-row">
                                                <div class="col-lg-6 col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Upload Pan</label>
                                                        <label for="pan_file" class="custom-upload">
                                                            <input type="file" name="pan_file" id="pan_file">
                                                            <span class="btn btn-animated btn-upload">Upload</span>
                                                        </label>
                                                        @error('pan_file')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">PAN Number</label>
                                                        <input type="text" name="pan_number" class="form-control {{$user_document && $user_document->pan_number?"border-red":"border-danger"}}" value="{{$user_document?$user_document->pan_number:old('pan_number')}}">
                                                        @error('pan_number')<span class="text-danger" role="alert"> <strong>{{ $message }}</strong> </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row input-row">
                                                <div class="col-lg-6 col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Upload Adhar</label>
                                                        <label for="adhar_file" class="custom-upload">
                                                            <input type="file" name="adhar_file" id="adhar_file">
                                                            <span class="btn btn-animated btn-upload">Upload</span>
                                                        </label>
                                                        @error('adhar_file')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Adhar Number</label>
                                                        <input type="text" name="adhar_number" class="form-control {{$user_document && $user_document->adhar_number?"border-red":"border-danger"}}" value="{{$user_document?$user_document->adhar_number:old('adhar_number')}}">
                                                        @error('adhar_number')<span class="text-danger" role="alert"> <strong>{{ $message }}</strong> </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row input-row">
                                                <div class="col-lg-6 col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Upload Trade License</label>
                                                        <label for="trade_license_file" class="custom-upload">
                                                            <input type="file" name="trade_license_file" id="trade_license_file">
                                                            <span class="btn btn-animated btn-upload">Upload</span>
                                                        </label>
                                                        @error('trade_license_file')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Trade License Number</label>
                                                        <input type="text" name="trade_license_number" class="form-control {{$user_document && $user_document->trade_license_number?"border-red":"border-danger"}}" value="{{$user_document?$user_document->trade_license_number:old('trade_license_number')}}">
                                                        @error('trade_license_number')<span class="text-danger" role="alert"> <strong>{{ $message }}</strong> </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row input-row">
                                                <div class="col-lg-4 col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Upload Cancelled Cheque</label>
                                                        <label for="cancelled_cheque_file" class="custom-upload">
                                                            <input type="file" name="cancelled_cheque_file" id="cancelled_cheque_file">
                                                            <span class="btn btn-animated btn-upload">Upload</span>
                                                        </label>
                                                        @error('cancelled_cheque_file')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Account Number</label>
                                                        <input type="text" name="account_number" class="form-control {{$user_document && $user_document->account_number?"border-red":"border-danger"}}" value="{{$user_document?$user_document->account_number:old('account_number')}}">
                                                        @error('account_number')<span class="text-danger" role="alert"> <strong>{{ $message }}</strong> </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">IFSC Code</label>
                                                        <input type="text" name="ifsc_code" class="form-control {{$user_document && $user_document->ifsc_code?"border-red":"border-danger"}}" value="{{$user_document?$user_document->ifsc_code:old('ifsc_code')}}">
                                                        @error('ifsc_code')<span class="text-danger" role="alert"> <strong>{{ $message }}</strong> </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            

                                            <div class="row input-row additional-doc-input-row">
                                                <div class="col-lg-4 col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Upload Additional Documents</label>
                                                        <label for="additional_document_file" class="custom-upload">
                                                            <input type="file" name="additional_document_file[]" id="additional_document_file">
                                                            <span class="btn btn-animated btn-upload">Upload</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7 col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Additional Document</label>
                                                        <input type="text" class="form-control {{$user_document && $user_document->gst_number?"border-red":"border-danger"}}" name="additional_documents[]">
                                                    </div>
                                                </div>
                                                <div class="col-lg-1 col-12">
                                                    <div class="form-group cta-form-group">
                                                        <a href="javascript:void(0)" class="btn-add" id="btn_add_document">
                                                            <i class="fa-solid fa-plus text-light"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div id="additional_document_append">
                                            </div>
                                            <div class="form-submit-row">
                                                <button type="submit" class="btn btn-animated btn-submit">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
@section('script')
{{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

<script>
    $('.itemremove').on("click", function() {
        var id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Trigger AJAX request to delete item
                $.ajax({
                    url: "{{route('user.photos_and_documents_delete')}}", // Replace 'your_delete_endpoint' with your actual delete route
                    method: 'GET', // Adjust the HTTP method if needed
                    data: { id: id }, // Pass the item ID to be deleted
                    success: function(response) {
                        // Handle success response
                        $('#RemoveLI'+id).remove();
                        Swal.fire('Deleted!', 'Your item has been deleted.', 'success');
                        // You may want to perform additional actions here like removing the item from the DOM
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        Swal.fire('Error!', 'An error occurred while deleting the item.', 'error');
                    }
                });
            } 
        });
    });


    $(document).ready(function() {
    // Click event for the add button
    var counter = 1;
    $('#btn_add_document').click(function() {
        // Clone the additional-doc-input-row template and append it to the container
        var template = `
            <div class="row input-row additional-doc-input-row">
                <div class="col-lg-4 col-12">
                    <div class="form-group">
                        <label class="form-label">Upload Additional Documents</label>
                        <label for="additional_document_file${counter}" class="custom-upload">
                            <input type="file" name="additional_document_file[]" id="additional_document_file${counter}" required>
                            <span class="btn btn-animated btn-upload">Upload</span>
                        </label>
                    </div>
                </div>
                <div class="col-lg-7 col-12">
                    <div class="form-group">
                        <label class="form-label">Additional Document</label>
                        <input type="text" class="form-control border-red" name="additional_documents[]" required>
                    </div>
                </div>
                <div class="col-lg-1 col-12">
                    <div class="form-group cta-form-group">
                        <button type="button" class="btn-remove">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M3 6H5H21" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M10 11V17" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M14 11V17" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>`;
        $('#additional_document_append').append(template);

        // Increment counter for the next row
        counter++;
    });

    // Click event for the delete button
    $(document).on('click', '.btn-remove', function() {
        // Remove the corresponding input row
        $(this).closest('.additional-doc-input-row').remove();
    });
});


    
</script>
@endsection