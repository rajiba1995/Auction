@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row">
            <h3>Buyer Package List</h3>
            <div class="d-flex">
                <a href="{{route('admin.buyer.package.create')}}" class="btn btn-add btn-sm">
                    <i class="fa-solid fa-plus"></i>
                    Add Package
                </a>
            </div>
        </div>
        {{-- <form action="" method="get" id="searchForm">
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
        <a href="{{route('admin.client.index')}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-rotate"></i></a>
    </div>
</div>
</div>
</form> --}}

<table class="table">
    <thead>
        <tr>
            <th>SL.</th>
            <th>Name</th>
            <th>Type</th>
            <th>Duration</th>
            <th>Price</th>
            <th>No. of Cr.</th>
            <th>Total cost/Cr.</th>
            <th>Application cost/Cr.</th>
            <th>Sms cost/Cr.</th>
            <th>Supplier Suggestion</th>
            <th>Consultation</th>
            <!-- <th>Description</th> -->
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="align-middle">
        @forelse ($data as $key =>$item)
        <tr>
            <td> {{ $data->firstItem() + $loop->index }}</td>
            <td>{{ $item->package_name }}</td>
            <td>{{ $item->package_type }}</td>
            <td>{{ $item->package_duration }} months</td>
            <td>{{ $item->rupees_prefix }} {{ $item->package_price }}</td>
            <td>{{ $item->total_number_of_auction }}</td>
            <td>{{ $item->type==="basic"?"NIL":$item->total_cost_per_auction }}</td>
            <td>{{ $item->type==="basic"?$item->package_price:$item->application_cost_per_auction }}</td>
            <td>{{ $item->type==="basic"?"Included":$item->sms_cost_per_auction }}</td>
            <td>{{ $item->supplier_vendor_suggestion == 0 ? "Yes" : "No" }}</td>
            <td>{{ $item->consultation == 0 ? "1 meeting" : "No" }}</td>
            <!-- <td>{!! $item->package_description !!}</td> -->
            <td>
                <a href="{{route('admin.buyer.package.status', $item->id)}}"><span class="btn-sm btn-status btn {{$item->status==1?"bg-success":"bg-danger"}}">{{$item->status==1?"Active":"Inactive"}}</span></a>
            </td>
            <td>
                {{-- <button type="button" class="btn btn-view" title="View"><i class="fa-regular fa-eye"></i></button> --}}
                <a href="{{route('admin.buyer.package.edit', $item->id)}}" class="btn btn-edit" title="Edit">Edit</a>
                <button type="button" class="btn btn-delete itemremove" data-id="{{$item->id}}" title="Delete"><i class="fa-regular fa-trash-can"></i></button>
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
                window.location.href = "buyer-package/delete/" + id;
            } else {
                Swal.fire("Cancelled", "Record is safe", "error");
            }
        });
    });
</script>
@endpush