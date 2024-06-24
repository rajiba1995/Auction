@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row">
            <h3>Badge List</h3>
            <div class="d-flex">
                <a href="{{route('admin.badge.create')}}" class="btn btn-add btn-sm">
                    <i class="fa-solid fa-plus"></i>
                    Add Badge
                </a>
            </div>
        </div>


<table class="table">
    <thead>
        <tr>
            <th>SL.</th>
            <th>Logo</th>
            <th>Title</th>
            <th>Type</th>
            <th>Duration</th>
            <th>Short Descripton</th>
            <th>Long Desccription</th>
            <th>Price</th>
            <th>Price Prefix</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="align-middle">
        @forelse ($data as $key =>$item)
        <tr>
            <td> {{ $data->firstItem() + $loop->index }}</td>
            <td><img src="{{asset($item->logo)}}" alt="" width="50px" class="img-thumbnail" ></td>
            <td> {{ $item->title }}</td>
            <td>
                @if($item->type == 0)
                    Free
                @elseif($item->type == 1)
                    Basic              
                @elseif($item->type == 2)
                    Intermideate
                @elseif($item->type == 3)
                    Advance
                @endif
            </td>
 
            <td>{{ $item->duration }}</td>

            <td>{{ Str::limit($item->short_desc, 200) }}</td>
            <td>{{ Str::limit($item->long_desc, 200) }}</td>
            <td>{{ $item->price }}</td>
            <td>{{ $item->price_prefix }}</td>

            <td>
                <a href="{{route('admin.badge.status', $item->id)}}"><span class="btn-sm btn-status btn {{$item->status==1?"bg-success":"bg-danger"}}">{{$item->status==1?"Active":"Inactive"}}</span></a>
            </td>

            <td>
                <a href="{{route('admin.badge.edit', $item->id)}}" class="btn btn-edit" title="Edit">Edit</a>
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
                window.location.href = "badge/delete/" + id;
            } else {
                Swal.fire("Cancelled", "Record is safe", "error");
            }
        });
    });
</script>
@endpush