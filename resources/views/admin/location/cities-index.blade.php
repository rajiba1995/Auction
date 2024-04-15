@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row">
            <h3>Location(Cities)</h3>
            <div class="d-flex">
                <a href="{{ route('admin.location.city.create',$stateId) }}" class="btn btn-add btn-sm">
                    <i class="fa-solid fa-plus"></i>
                    Add City
                </a>&nbsp;&nbsp;
                <a href="{{route('admin.location.states.index')}}" class="btn btn-danger btn-sm">
                <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                    back
                </a>
            </div>
        </div>
<table class="table">
    <thead>
        <tr>
            <th>SL.</th>
            <th>Cities Name</th>
            <th>Action</th>         
        </tr>
    </thead>
    <tbody class="align-middle">
        @forelse ($data as $key =>$item)
        <tr>
            <td> {{ $key+1 }}</td>          
            <td> {{ $item->name }}</td>       
            <td>
                <a href="{{route('admin.location.city.edit', [$item->id,$item->state_id])}}" class="btn btn-edit" title="Edit">Edit</a>
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