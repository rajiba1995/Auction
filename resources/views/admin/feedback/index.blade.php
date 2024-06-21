@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row">
            <h3>Feedback List</h3>
            <div class="d-flex">
                <a href="{{route('admin.feedback.create')}}" class="btn btn-add btn-sm">
                    <i class="fa-solid fa-plus"></i>
                    Add Feedback
                </a>
            </div>
        </div>


<table class="table">
    <thead>
        <tr>
            <th>SL.</th>
            <th width="10%">Logo</th>
            <th>Customer Name</th>
            <th>Designation</th>
            <th width="15%">Company Name</th>
            <th width="25%">Message</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="align-middle">
        @forelse ($data as $key =>$item)
        <tr>
            <td> {{ $data->firstItem() + $loop->index }}</td>
            <td>
                <img src="{{asset($item->logo)}}" alt="No-Logo" srcset="" class="img-thumbnail" height="5%" width="50%">
            </td>
            <td> {{ $item->customer_name }}</td>
            <td> {{ $item->customer_designation }}</td>
            <td> {{ $item->company_name }}</td>
            <td>{!! Str::limit($item->message, 200) !!}</td>
            <td>
                <a href="{{route('admin.feedback.status', $item->id)}}"><span class="btn-sm btn-status btn {{$item->status==1?"bg-success":"bg-danger"}}">{{$item->status==1?"Active":"Inactive"}}</span></a>
            </td>
            <td>
                {{-- <button type="button" class="btn btn-view" title="View"><i class="fa-regular fa-eye"></i></button> --}}
                <a href="{{route('admin.feedback.edit', $item->id)}}" class="btn btn-edit" title="Edit">Edit</a>
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
                window.location.href = "feedback/delete/" + id;
            } else {
                Swal.fire("Cancelled", "Record is safe", "error");
            }
        });
    });
</script>
@endpush