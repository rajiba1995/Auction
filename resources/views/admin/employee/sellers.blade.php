@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row">
            <h3>Sellers List</h3>
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
            <th>
            <input type="checkbox" id="select-all"> All
            </th>
            <th>SL.</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Business Name</th>
            <th>Statuss</th>
            {{-- <th>Action</th> --}}
        </tr>
    </thead>
    <tbody class="align-middle">
        @forelse ($data as $key =>$item)
        <tr>
            <td>
                <input type="checkbox" class="select-item" name="selected_items[]" value="{{ $item->id }}">
            </td>
            <td> {{ $data->firstItem() + $loop->index }}</td>
            <td> {{ $item->name }}</td>
            <td>{{ $item->mobile }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->business_name }}</td>

            <td>
                {{-- <a href="{{route('admin.employee.status', $item->id)}}"><span class="btn-sm btn-status btn {{$item->status==1?"bg-success":"bg-danger"}}">{{$item->status==1?"Active":"Inactive"}}</span></a> --}}
                <a href="{{route('admin.user.status', $item->id)}}"><span class="btn-sm btn-status btn {{$item->status==1?"bg-success":"bg-danger"}}">{{$item->status==1?"Active":"Inactive"}}</span></a>

            </td>
            {{-- <td> --}}
                {{-- <button type="button" class="btn btn-view" title="View"><i class="fa-regular fa-eye"></i></button> --}}
                {{-- <a href="{{route('admin.employee.edit', $item->id)}}" class="btn btn-edit" title="Edit">Edit</a> --}}
                {{-- <button type="button" class="btn btn-delete itemremove" data-id="{{$item->id}}" title="Delete"><i class="fa-regular fa-trash-can"></i></button> --}}
                {{-- <a href="{{route('admin.employee.sellers', $item->id)}}" class="btn btn-edit" title="Edit">Sellers</a> --}}

            {{-- </td> --}}
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
<div style="display: flex; justify-content: flex-end; align-items: flex-end;">
<select class="form-control" style="width: 400px;">
                @if(count($employees)>0)
                @foreach($employees as $employee)
                <option value="{{$employee->id}}">{{$employee->name}}</option>
                @endforeach
                @endif
</select>
<a href="{{route('admin.employee.index')}}" id="transferButton" class="btn btn-primary btn-sm transfer">
                    Tranfer 
                    <iconify-icon icon="tabler:transfer-in" width="1.2rem" height="1.2rem"></iconify-icon>
</a>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#select-all').click(function() {
            $('.select-item').prop('checked', this.checked);
        });

        $('.select-item').change(function() {
            if ($('.select-item:checked').length == $('.select-item').length) {
                $('#select-all').prop('checked', true);
            } else {
                $('#select-all').prop('checked', false);
            }
        });
    });
</script>

@endpush