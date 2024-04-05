@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row">
            <h3>User List</h3>
            <div class="d-flex">              
            </div>
        </div>
            <form action="" method="get" id="searchForm">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-auto col-12">
                            <input type="text" name="keyword" placeholder="Global Search..." value="{{request()->input('keyword')??""}}" class="w-100"/>
                        </div>
                        <div class="col-lg-auto col-12 text-end">
                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i>Search</button>
                            <a href="{{route('admin.user.index')}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-xmark"></i></a>
                        </div>
                    </div>
                </div>
            </form>

<table class="table">
    <thead>
        <tr class="align-middle">
            <th>SL.</th>
            <th>Image</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="align-middle">
        @forelse ($data as $key =>$item)
        <tr>
            <td> {{ $key+1 }}</td>
            <td><img src="{{ asset($item->image)}}" alt="No-Image" height="100px" width="100px" class="img-thumbnail" srcset=""></td>
            <td> {{ $item->name }}</td>      
            <td> {{ $item->mobile }}</td>      
            <td> {{ $item->email }}</td>      
            <td>
                {{-- <a href="{{route('admin.banner.edit', $item->id)}}" class="btn btn-edit" title="Edit"><i class="fa-solid fa-pen"></i></a> --}}
                <a href="{{route('admin.user.view', $item->id)}}" class="btn btn-sm btn-outline-primary" title="View">Profile</a>               
                <a href="{{route('admin.user.document.view', $item->id)}}" class="btn btn-sm btn-outline-primary" title="View">Documents</a>
                <a href="{{route('admin.user.report', $item->id)}}" class="btn btn-sm btn-outline-danger" title="View">Reports</a>
                {{-- <button type="button" class="btn btn-delete itemremove" data-id="{{$item->id}}" title="Delete"><i class="fa-regular fa-trash-can"></i></button> --}}
            </td>
            
        </tr>
        @empty
        <tr>
            <td colspan="100%" class="text-center">No records found</td>
        </tr>
        @endforelse

    </tbody>
</table>
{{$data->appends($_GET)->links()}}
</div>
</div>
@endsection
@push('scripts')
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
                window.location.href = "banner/delete/" + id;
            } else {
                Swal.fire("Cancelled", "Record is safe", "error");
            }
        });
    });
</script>
@endpush