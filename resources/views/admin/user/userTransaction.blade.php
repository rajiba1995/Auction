{{-- {{$data}} --}}

@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row">
            <h3>Transaction  History</h3>
            <div class="d-flex">  
                <a href="{{route('admin.user.index')}}" class="btn btn-primary btn-sm">
                    <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                    Back 
                </a>            
            </div>
        </div>
            <form action="" method="get" id="searchForm">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-auto col-12">
                            <input type="date" class="form-control form-control-sm" name="start_date" id="start_date" value="{{ request()->input('start_date') }}" >
                        </div>
                        <div class="col-lg-auto col-12">
                            <input type="date" class="form-control form-control-sm" name="end_date" id="end_date" value="{{ request()->input('end_date') }}" >
                        </div>
                        <div class="col-lg-auto col-12">
                            <select name="status" class="form-control" class="w-100">
                                <option {{$status == 0?"selected":""}}  value="0" >All</option>
                                <option {{$status == 1?"selected":""}} value="1">Seller</option>
                                <option {{$status == 2?"selected":""}} value="2">Buyer</option>
                            </select>
                        </div>
                        <div class="col-lg-auto col-12">
                            <input type="text" name="keyword" placeholder="Global Search..." value="{{request()->input('keyword')??""}}" class="w-100"/>
                        </div>
                        <div class="col-lg-auto col-12 text-end">
                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i>Search</button>
                            <a href="{{route('admin.user.transaction.view',$id)}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-xmark"></i></a>
                        </div>
                    </div>
                </div>
            </form>

<table class="table">
    <thead>
        <tr class="align-middle">
            <th>SL.</th>
            <th>Unique Id</th>
            <th>Transaction Id</th>
            <th>Mode</th>
            <th>Purpose</th>
            <th>Actual Amount</th>
            <th>Negotiable Amount</th>
            <th>Transaction Amount</th>
            <th>Transaction Source</th>
            <th>Date</th>

        </tr>
    </thead>
    <tbody class="align-middle">
        @forelse ($data as $key =>$item)
        <tr>
            <td> {{ $key+1 }}</td>
            <td> {{ $item->unique_id }}</td>      
            <td> {{ $item->transaction_id }}</td>      
            <td> {{ $item->transaction_type == 1? 'Online' : 'Offline' }}</td>         
            <td> {{ $item->purpose }}</td>      
            <td> {{ $item->actual_amount }}</td>      
            <td> {{ $item->negotiable_amount }}</td>      
            <td> {{ $item->amount }}</td>   
            <td> {{ $item->transaction_source }}</td>      
            <td> {{ $item->created_at->format('d-M-Y') }}</td>      
            <td>
                {{-- <a href="{{route('admin.user.report.status', $item->id)}}"><span class="btn-sm btn-status btn {{$item->status==1?"bg-success":"bg-danger"}}">{{$item->status==1?"Active":"Inactive"}}</span></a> --}}
                {{-- <a href="{{route('admin.banner.edit', $item->id)}}" class="btn btn-edit" title="Edit"><i class="fa-solid fa-pen"></i></a> --}}
                {{-- <a href="{{route('admin.user.view', $item->id)}}" class="btn btn-sm btn-outline-primary" title="View">Details</a>                --}}
                {{-- <a href="{{route('admin.user.document.view', $item->id)}}" class="btn btn-sm btn-outline-primary" title="View">Documents</a> --}}
                {{-- <a href="{{route('admin.user.report', $item->id)}}" class="btn btn-sm btn-outline-danger" title="View">Reports</a> --}}
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