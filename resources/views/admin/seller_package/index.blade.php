@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row">
            <h3>Seller Package List</h3>
            <div class="d-flex">
                <a href="{{route('admin.seller.package.create')}}" class="btn btn-add btn-sm">
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
            <th>Package Name</th>
            <th>Type</th>
            <th>Currency</th>
            <th>Price</th>
            <th>Duration(months)</th>
            <th>Badge</th>
            <th>Credit</th>
            <th>Bid</th>
            <th>Group watchlist addition</th>
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
            <td>{{ $item->rupees_prefix }}</td>
            <td>{{ $item->package_price }}</td>
            <td>{{ $item->package_duration }}</td>
            <td>
                @if($item->badge == 0)
                    No-badge
                @elseif($item->badge == 1)
                    Basic
                @elseif($item->badge == 2)
                    Intermediate
                @elseif($item->badge == 3)
                    Advance
                @endif
            </td>
            <td>{{ $item->credit }}</td>
            <td>{{ $item->bid == 0?"Yes":"No"}}</td>
            <td>{{ $item->group_watchlist_addition == 0?"Yes":"No"}}</td>
            <td>{{ $item->consultation == 0?"Yes":"No"}}</td>
            <!-- <td>{!! $item->package_description !!}</td> -->
            <td>
                <a href="{{route('admin.seller.package.status', $item->id)}}"><span class="btn-sm btn-status btn {{$item->status==1?"bg-success":"bg-danger"}}">{{$item->status==1?"Active":"Inactive"}}</span></a>
            </td>
            <td>
                {{-- <button type="button" class="btn btn-view" title="View"><i class="fa-regular fa-eye"></i></button> --}}
                <a href="{{route('admin.seller.package.edit', $item->id)}}" class="btn btn-edit" title="Edit">Edit</a>
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
                window.location.href = "seller-package/delete/" + id;
            } else {
                Swal.fire("Cancelled", "Record is safe", "error");
            }
        });
    });
</script>
@endpush