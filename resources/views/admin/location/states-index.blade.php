@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row">
            <h3>Location (States)</h3>
            <div class="d-flex">
                <!-- <a href="{{route('admin.legalstatus.create')}}" class="btn btn-add btn-sm">
                    <i class="fa-solid fa-plus"></i>
                    Add Legal Status
                </a> -->
            </div>
        </div>
        <!-- <form action="" method="get" id="searchForm">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-auto col-12">
                        <input type="text" name="name" placeholder="Name..." value="{{request()->input('name')??""}}" class="w-100"/>
    </div>
    <div class="col-lg-auto col-12">
        <input type="text" name="email" placeholder="Email..." value="{{request()->query('email')}}" class="w-100" />
    </div>
    <div class="col-lg-auto col-12">
        <select name="status" class="form-control" class="w-100">
            <option value="all" selected>All Statuses</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
    </div>
    <div class="col-lg-auto col-12 text-end">
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-magnifying-glass"></i>Search</button>
        <a href="" class="btn btn-danger btn-sm"><i class="fa-solid fa-rotate"></i></a>
    </div>
</div>
</div>
</form> -->


<table class="table">
    <thead>
        <tr>
            <th>SL.</th>
            <th>States Name</th>
            <th>Cities</th>
        </tr>
    </thead>
    <tbody class="align-middle">
        @forelse ($data as $key =>$item)
        <tr>
            <td> {{ $key+1 }}</td>          
            <td> {{ $item->name }}</td>
            <td>
            <a href="{{ route('admin.location.cities.index', $item->id) }}" class="btn btn-sm btn-outline-primary">Cities</a>
            </td>
            
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
                window.location.href = "legal-status/delete/" + id;
            } else {
                Swal.fire("Cancelled", "Record is safe", "error");
            }
        });
    });
</script>
@endpush