@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row">
            <h3>Inquiry List</h3>
            <div class="d-flex">              
            </div>
        </div>
            <form action="" method="get" id="">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-auto col-12">
                            <ul style="display: flex; list-style: none; gap:15px">
                                <li @if(!Request::get('status') || (Request::get('status') == '1')) class="active" @endif><a href="{{route('admin.inquiry.index',['status'=>'1'])}}"><span class="text-success"> Live </span></a></li>|
                                <li @if(Request::get('status') == '2' ) class="active" @endif><a href="{{route('admin.inquiry.index',['status'=>'2'])}}"><span style="color: #8C887F"> Pending </span></a></li>|
                                <li @if(Request::get('status') == '3' ) class="active" @endif><a href="{{route('admin.inquiry.index',['status'=>'3'])}}"><span style="color: #CB9C26"> Confirmed </span></a></li>|
                                <li @if(Request::get('status') == '4' ) class="active" @endif><a href="{{route('admin.inquiry.index',['status'=>'4'])}}"><span class="text-danger"> Cancelled </span></a></li>
                            </ul>
                        </div>
                        <div class="col-lg-auto col-12">
                            <input type="date" class="form-control form-control-sm" name="start_date" id="start_date" value="{{ request()->input('start_date') }}" >
                        </div>
                        <div class="col-lg-auto col-12">
                            <input type="date" class="form-control form-control-sm" name="end_date" id="end_date" value="{{ request()->input('end_date') }}" >
                        </div>
                        <div class="col-lg-auto col-12">
                            <input type="text" name="keyword" placeholder="Global Search..." value="{{request()->input('keyword')??""}}" class="w-100"/>
                        </div>
                        <div class="col-lg-auto col-12 text-end">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa-solid fa-magnifying-glass"></i>Search</button>
                            <a href="{{route('admin.inquiry.index')}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-xmark"></i></a>
                            <a href="{{ route('admin.inquiry.details.export',['start_date'=>request()->input('start_date'),'end_date'=>request()->input('end_date'),'keyword'=>request()->input('keyword'),'status' => request()->input('status')]) }}" class="btn btn-sm btn-success" data-toggle="tooltip" title="Export">Export</a>

                        </div>
                    </div>
                </div>
            </form>
<table class="table">
    <thead>
        <tr class="align-middle">
            <th>SL.</th>
            <th width="10%">Inquiry Id</th>
            <th width="10%">Name</th>
            <th>Location</th>
            <th>Title</th>
            <th>Inquiry Type</th>
            <th>Amount</th>
            <th>Alloted</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="align-middle">
        @forelse ($data as $key =>$item)
        
       
        <tr>
            <td> {{ $key+1 }}</td>
            <td> {{ $item->inquiry_id }}</td>      
            <td> {{ $item->BuyerData->name }}</td>      
            <td> {{ $item->location }}</td>      
            <td> {{ $item->title }}</td>      
            <td> {{ $item->inquiry_type }}</td>      
            <td>{{number_format($item->inquiry_amount,2, '.', ',')}}</td>      
            <td>
                @if(isset($item->SellerData->name))
                <div  class="alert alert-success p-1 text-center" role="alert">{{ $item->SellerData->name }}</div>
                @else
                <div class="alert alert-danger p-1 text-center" role="alert">Not-Allot</div>
                @endif
            </td>  
            <td>{{ date('d-M-Y',strtotime($item->created_at)) }}</td>
            <td>
                <a href="{{route('admin.inquiry.view', $item->id)}}" class="btn btn-sm btn-outline-primary" title="View">View</a>               
                <a href="{{route('admin.inquiry.participants', $item->id)}}" class="btn btn-sm btn-outline-primary" title="View">Participants</a>               
                <a href="{{route('admin.inquiry.pdf', $item->id)}}" class="btn btn-sm btn-outline-primary" title="View">PDF</a>               
                {{-- <a href="{{route('admin.user.document.view', $item->id)}}" class="btn btn-sm btn-outline-{{$doc_color}}" title="View">Documents</a>
                <a href="{{route('admin.user.transaction.view', $item->id)}}" class="btn btn-sm btn-outline-primary">Transaction</a>
                <a href="{{route('admin.user.report', $item->id)}}" class="btn btn-sm btn-outline-primary" title="View">Reports</a> --}}
                {{-- <button type="button" class="btn btn-delete itemremove" data-id="{{$item->id}}" title="Delete"><i class="fa-regular fa-trash-can"></i></button> --}}
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="100%" class="text-center">No Inquiry records found</td>
        </tr>
        @endforelse

    </tbody>
{{-- </table> --}}
{{-- {{$data->appends($_GET)->links()}} --}}
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