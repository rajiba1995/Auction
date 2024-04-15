@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row mb-2">
            <h3>New Sub-category</h3>
            <a href="{{route('admin.category.index')}}" class="btn btn-danger btn-sm">
                <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                Back
            </a>
        </div>
        <form action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-wrap mb-3">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
                        @error('title')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-wrap mb-3">
                        <label for="">Choose Category</label>
                        <select name="collection" id="collection" class="form-control">
                            <option selected hidden>----select----</option>
                            @foreach ($data as $index => $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                        @error('collection')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-wrap mb-3">
                        <label for="">Upload Sub-category</label>
                        <input type="file" class="form-control" name="image" id="image" value="{{old('image')}}">
                        @error('image')<div class="text-danger">{{ $message }}</div>@enderror

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
@endpush