@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row mb-2">
            <h3>New Banner</h3>
            <a href="{{route('admin.banner.index')}}" class="btn btn-danger btn-sm">
                <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                Back 
            </a>
        </div>
        <form action="{{route('admin.banner.store')}}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-wrap mb-3">
                    <label for="">Banner Type</label>
                    <input type="radio" name="type" value="0" id="imageRadio" checked @if($errors->has('image')) checked @endif >  <label for="imageRadio">Image</label>
                    <input type="radio" name="type" value="1" id="VideoRadio" @if($errors->has('video')) checked @endif > <label for="VideoRadio">Video</label>
                    {{-- <input type="radio" name="type" value="1"/>Video --}}
                    </div>
                    <div class="form-wrap mb-3 image">
                    <label for="">Upload Banner Image</label>
                        <input type="file" class="form-control" name="image" id="image" value="{{old('image')}}">
                    </div>
                    @error('image')<div class="text-danger">{{ $message }}</div>@enderror
                    <div class="form-wrap mb-3 video" style="display: none;">
                        <label for="">Upload Banner Video</label>
                            <input type="file" class="form-control" name="video" id="video" value="{{old('video')}}">
                    </div>
                    @error('video')<div class="text-danger">{{ $message }}</div>@enderror
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

@section('script')
    <script>
    //    $(document).ready(function(){

    //        $('input[name=type]').click(function(){
    //            var val = $(this).val();
    //            console.log(val);
    //            if (val == '0') {
    //                $('.video').hide()               
    //                $('.image').show()
    //            }else{
    //             $('.image').hide()
    //             $('.video').show()
    //            }
    //        })
    //    }); 
       $(document).ready(function(){
            var condition = $("input[name='type']").val();
            // alert(condition);
            if (condition==0) {
                $(".video").hide();
                $(".image").show(); 
            }else{
                $(".image").hide(); 
                $(".video").show(); 
            }
           $('input[name=type]').click(function(){
               var val = $(this).val();

               if (val == 0) {
                   $('.video').hide()               
                   $('.image').show()
               }else{
                $('.image').hide()
                $('.video').show()
               }
           })

        });

    </script>


@endsection