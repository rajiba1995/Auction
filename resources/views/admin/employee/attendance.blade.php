@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row">
            <h3>Employee Attendance Sheet</h3>
            <div class="d-flex">       
                <a href="{{route('admin.employee.index')}}" class="btn btn-danger btn-sm">
                    <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                    Back 
                </a>     
            </div>
        </div>
            {{-- <form action="" method="get" id="searchForm">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-auto col-12">
                            <input type="text" name="keyword" placeholder="Global Search..." value="{{request()->input('keyword')??""}}" class="w-100"/>
                        </div>
                        <div class="col-lg-auto col-12 text-end">
                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i>Search</button>
                            <a href="{{route('admin.employee.index')}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-xmark"></i></a>
                        </div>
                    </div>
                </div>
            </form> --}}

            <table class="table">
    <thead>
        <tr class="align-middle">
            <th>SL.</th>
            <th>Date</th>
            <th>Login Time</th>
            <th>Logout Time</th>  
    </thead>
    <tbody class="align-middle">
        @forelse ($data as $key =>$item)
        <tr>
            <td> {{ $data->firstItem() + $loop->index }}</td>
            <td>{{ $item->created_at->format('d-M-Y') }}</td>    
            <td>{{ $item->login_time }}</td>
            <td>{{ $item->logout_time }}</td>
            
            <!-- <td>
                <span class="btn-sm btn-status btn {{$item->status==1?"bg-success":"bg-danger"}}">{{$item->status==1?"Active":"Inactive"}}</span>
            </td>
            <td>
                {{-- <button type="button" class="btn btn-view" title="View"><i class="fa-regular fa-eye"></i></button> --}}
                @if ($item->status==0)                  
                <a href="{{route('employee.sellers.edit', $item->id)}}" class="btn btn-edit" title="Edit">Edit</a>
                @endif
                {{-- <button type="button" class="btn btn-delete itemremove" data-id="{{$item->id}}" title="Delete"><i class="fa-regular fa-trash-can"></i></button> --}}
            </td> -->
        </tr>
        @empty
        <tr>
            <td colspan="100%" class="text-center">No attendance records found</td>
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
                window.location.href = "employee/delete/" + id;
            } else {
                Swal.fire("Cancelled", "Record is safe", "error");
            }
        });
    });
</script>
@endpush