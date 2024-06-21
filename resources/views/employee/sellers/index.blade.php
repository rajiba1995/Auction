@extends('employee.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row">
            <h3>Employee's -> Users Sheet</h3>
            <div class="d-flex">
                <a href="{{route('employee.sellers.create')}}" class="btn btn-add btn-sm">
                    <i class="fa-solid fa-plus"></i>
                    Add Seller
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

{{-- <h1>Employee id: {{$loggedInEmployee->id}}</h1> --}}
<table class="table">
    <thead>
        <tr class="align-middle">
            <th>SL.</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Created_at</th>
            <th>Status</th>
            <th>Action</th>
         
    </thead>
    <tbody class="align-middle">
        @forelse ($data as $key =>$item)
        <tr>
            <td> {{ $data->firstItem() + $loop->index }}</td>
            <td> {{ $item->name }}</td>
            <td>{{ $item->mobile }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->created_at->format('d-M-Y') }}</td>    
            <td>
                <span class="btn-sm btn-status btn {{$item->status==1?"bg-success":"bg-danger"}}">{{$item->status==1?"Active":"Inactive"}}</span>
            </td>
            <td>
                {{-- <button type="button" class="btn btn-view" title="View"><i class="fa-regular fa-eye"></i></button> --}}
                @if ($item->status==0)                  
                <a href="{{route('employee.sellers.edit', $item->id)}}" class="btn btn-edit" title="Edit">Edit</a>
                @else
                
                <a href="{{route('show.user.buyer.activity',$item->id)}}" class="btn btn-outline-primary" >As a buyer</a>
                <a href="{{route('show.user.seller.activity',$item->id)}}" class="btn btn-outline-primary" >As a seller</a>
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="100%" class="text-center">No seller records found</td>
        </tr>
        @endforelse
    </tbody>
</table>

</div>
</div>
@endsection
@push('scripts')
{{-- <script>
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
</script> --}}
@endpush