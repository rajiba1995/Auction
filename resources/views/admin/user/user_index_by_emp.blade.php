@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row">
            <h3>Users By Employee (List)</h3>
            <div class="d-flex">    
            <a href="{{route('admin.user.index')}}" class="btn btn-danger btn-sm">
                <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                Back 
            </a>          
            </div>
        </div>     

<table class="table">
    <thead>
        <tr class="align-middle">
            <th>SL.</th>
            <th width="5%">Image</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Action</th>
            <th>Status</th>
            <th>Added by</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody class="align-middle">
        @forelse ($data as $key =>$item)
        
        @if ($item->UserDocumentData)
            @php
                $doc_color = "primary"; // Default color
                $required_docs = [
                    'gst_status',
                    'pan_status',
                    'adhar_status',
                    'trade_license_status',
                    'cancelled_cheque_status'
                ];
                // Check if any required document status is not 1
                foreach ($required_docs as $doc) {
                    if (isset($item->UserDocumentData->{$doc}) && $item->UserDocumentData->{$doc} != 1) {
                        $doc_color = "danger";
                        break;
                    }
                }
            @endphp
            {{-- Set color to danger if UserDocumentData is empty --}}
           
        
        @endif
        @if (empty($item->UserDocumentData))
                @php $doc_color = "danger"; @endphp
            @endif
        <tr>
            <td> {{ $key+1 }}</td>
            <td><img src="{{ $item->image ? asset($item->image) : asset('frontend/assets/images/user.png') }}" alt="No-Image" height="100px" width="100px" class="img-thumbnail" srcset=""/></td>
            <td> {{ $item->name }}</td>      
            <td> {{ $item->mobile }}</td>      
            <td> {{ $item->email }}</td>      
            <td>
                <a href="{{route('admin.user.view', $item->id)}}" class="btn btn-sm btn-outline-primary" title="View">Profile</a>               
                <a href="{{route('admin.user.document.view', $item->id)}}" class="btn btn-sm btn-outline-{{$doc_color}}" title="View">Documents</a>
                <a href="{{route('admin.user.transaction.view', $item->id)}}" class="btn btn-sm btn-outline-primary">Transaction</a>
                <a href="{{route('admin.user.report', $item->id)}}" class="btn btn-sm btn-outline-primary" title="View">Reports</a>
                <a href="{{route('admin.user.package.view', $item->id)}}" class="btn btn-sm btn-outline-primary" title="View">Package</a>
                <a href="{{route('admin.user.wallet.view', $item->id)}}" class="btn btn-sm btn-outline-primary" title="View">Wallet</a>
                {{-- <button type="button" class="btn btn-delete itemremove" data-id="{{$item->id}}" title="Delete"><i class="fa-regular fa-trash-can"></i></button> --}}
            </td>

            <td>
            <a href="{{route('admin.user.status', $item->id)}}"><span class="btn-sm btn-status btn {{$item->status==1?"bg-success":"bg-danger"}}">{{$item->status==1?"Active":"Inactive"}}</span></a>
                @if($item->block_status==1)
                 <span class="btn-sm btn-status btn btn btn-sm btn-outline-danger">Blocked
                @endif
            </td>
            <td>{{$item->getEmployeeName?$item->getEmployeeName->name:""}}</td>
            <td>{{ date('d-M-Y',strtotime($item->created_at)) }}</td>
            
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