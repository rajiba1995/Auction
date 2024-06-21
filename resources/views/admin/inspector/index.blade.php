@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row">
            <h3>Inspector List</h3>
            <a href="{{route('admin.inspector.create')}}" class="btn btn-add">
                <i class="fa-solid fa-plus"></i>
                Add Inspector 
            </a>
        </div>
        <form action="" method="get" id="searchForm">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-auto col-12">
                        <input type="text" name="name" placeholder="Name..." value="{{request()->input('name')??""}}" class="w-100"/>
                    </div>
                    <div class="col-lg-auto col-12">
                        <input type="text" name="email" placeholder="Email..." value="{{request()->query('email')}}" class="w-100"/>
                    </div>
                    <div class="col-lg-auto col-12" style="width:19%">
                        <input type="text" name="stencil_number" placeholder="Stencil number..." value="{{request()->query('stencil_number')}}" class="w-100"/>
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
                        <a href="{{route('admin.inspector.index')}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-rotate"></i></a>
                    </div>
                </div>
            </div>
        </form>
        
        <table class="table">
            <thead>
                <tr>
                    <th>SL.</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Stencil Number</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key =>$item)
                    <tr>
                        <td> {{ $data->firstItem() + $loop->index }}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->mobile}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->address}},{{$item->state}},{{$item->pin}}</td>
                        <td>{{$item->stencil_number}}</td>
                        <td>
                            <a href="{{route('admin.inspector.status', $item->id)}}"><span class="badge rounded-pill {{$item->status==1?"bg-success":"bg-danger"}}">{{$item->status==1?"Active":"Inactive"}}</span></a>
                        </td>
                        <td>
                            {{-- <button type="button" class="btn btn-view" title="View"><i class="fa-regular fa-eye"></i></button> --}}
                            <a href="{{route('admin.inspector.edit', $item->id)}}" class="btn btn-edit" title="Edit"><i class="fa-solid fa-pen"></i></a>
                            <button type="button" class="btn btn-delete itemremove" data-id="{{$item->id}}" title="Delete"><i class="fa-regular fa-trash-can"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$data->appends($_GET)->links()}}
    </div>
</div>
@endsection
@push('scripts')
<script>
    $('.itemremove').on("click",function(){
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
                    window.location.href = "inspector/delete/"+id;
                }else{
                    Swal.fire("Cancelled", "Record is safe", "error");
                }
        });
    }); 
</script>
@endpush