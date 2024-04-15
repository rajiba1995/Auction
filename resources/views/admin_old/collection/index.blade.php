@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
{{-- <style>
    .custom-select-width {
    width: 100px; 
}

</style> --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row">
            <h3>Categories List</h3>
            <div class="d-flex">
                <a href="{{ route('admin.collection.create') }}" class="btn btn-add btn-sm">
                    <i class="fa-solid fa-plus"></i>
                    Add Category
                </a>
            </div>
        </div>
        <div class="col">
            <ul>
                <li @if(!Request::get('status') || (Request::get('status') == '1')) class="active" @endif><a href="{{route('admin.collection.index',['status'=>'1'])}}">All </a></li>
                <li @if(Request::get('status') == '0' ) class="active" @endif><a href="{{route('admin.collection.index',['status'=>'0'])}}">Inactive </a></li>
                <li @if(Request::get('status') == '3' ) class="active" @endif><a href="{{route('admin.collection.index',['status'=>'3'])}}">Pending </a></li>
                <li @if(Request::get('status') == '2' ) class="active" @endif><a href="{{route('admin.collection.index',['status'=>'2'])}}">Rejected </a></li>
            </ul>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>SL.</th>
                    <th width="10%">Image</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="align-middle">
                @forelse($data as $key =>$item)
                    <tr>
                        <td> {{ $data->firstItem() + $loop->index }}</td>
                        <td>
                            <img src="{{ asset($item->image) }}" alt="No-Image" srcset="" class="img-thumbnail"
                                height="5%" width="50%">
                        </td>
                        <td> {{ $item->title }}</td>
                        <td>
                            {{-- <a href="{{route('admin.collection.status', $item->id) }}"><span
                                class="badge rounded-pill {{ $item->status==1?"bg-success":"bg-danger" }}">{{ $item->status==1?"Active":"Inactive" }}</span></a>
                            --}}

                            <select class="form-select" style="width: 110px" aria-label="Default select example">
                            <select class="form-select" style="width: 110px"
                                aria-label="Default select example"
                                onchange="updateStatus({{ $item->id }}, this.value, this)">
                                <option value="1"
                                    {{ $item->status==1?"selected":"" }}>
                                    Active</option>
                                <option value="0"
                                    {{ $item->status==0?"selected":"" }}>
                                    Inactive</option>
                                <option value="2"
                                    {{ $item->status==2?"selected":"" }}>
                                    Rejected</option>
                                <option value="3"
                                    {{ $item->status==3?"selected":"" }}>
                                    Pending</option>

                            </select>
                        </td>
                        <td>
                            {{-- <button type="button" class="btn btn-view" title="View"><i class="fa-regular fa-eye"></i></button> --}}
                            <a href="{{ route('admin.collection.edit', $item->id) }}"
                                class="btn btn-edit" title="Edit"><i class="fa-solid fa-pen"></i></a>
                            <button type="button" class="btn btn-delete itemremove" data-id="{{ $item->id }}"
                                title="Delete"><i class="fa-regular fa-trash-can"></i></button>
                                <a href="{{ route('admin.collection.category', $item->id) }}"
                                    class="btn btn-outline-primary">SubCategory</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100%" class="text-center">No records found</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
        {{ $data->appends($_GET)->links() }}
    </div>
</div>
@endsection
@push('scripts')
    <script>
        $('.itemremove').on("click", function () {
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
                    window.location.href = "collection/delete/" + id;
                } else {
                    Swal.fire("Cancelled", "Record is safe", "error");
                }
            });
        });
    </script>
    <script>
        function updateStatus(itemId, newStatus, selectElement) {
            console.log(newStatus, itemId);

            $.ajax({
                type: "GET",
                data: {
                    id: itemId,
                    status: newStatus,
                },
                url: "{{ route('admin.collection.status') }}",
                success: function () {

                    Swal.fire({
                    title: "Updated!",
                    text: "Category Status has been updated!",
                    icon: "success"
                    });

                    setBackgroundColor(selectElement);
                },
                error: function () {
                    alert("Error")
                }
            })


        
    </script>
    <script>
    function updateStatus(itemId, newStatus, selectElement) {
        // console.log(newStatus, itemId);

            $.ajax({
                type: "GET", 
                data:{
                    id:itemId,
                    status:newStatus,
                },
                url: "{{route('admin.collection.status')}}",
                success:function(){
                    Swal.fire({
                        title: "Updated!",
                        text: "Status has been updated!",
                        icon: "success"
                        });

                        setBackgroundColor(selectElement);
                },
                error:function(){alert("Error")}
            })
            
        };

</script>
<script>
        function setBackgroundColor(selectElement) {
            var status = selectElement.value;
            switch (status) {
                case '1': // Active
                    selectElement.style.borderColor = 'darkgreen';
                    selectElement.style.color = 'darkgreen';
                    break;
                case '0': // Inactive
                    selectElement.style.borderColor = 'orange';
                    selectElement.style.color = 'orange';
                    break;
                case '2': // Rejected
                    selectElement.style.borderColor = 'darkred';
                    selectElement.style.color = 'darkred';
                    break;
                case '3': // Pending
                    selectElement.style.borderColor = 'blue';
                    selectElement.style.color = 'blue';
                    break;
                default:
                    selectElement.style.borderColor = 'transparent'; // Default color or transparent
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            var selects = document.querySelectorAll('.form-select');
            selects.forEach(function (selectElement) {
                setBackgroundColor(selectElement);
            });
        });
    </script>
            switch(status) {
                case '1': // Active
                    selectElement.style.backgroundColor = 'green';
                    break;
                case '0': // Inactive
                    selectElement.style.backgroundColor = 'yellow';
                    break;
                case '2': // Rejected
                    selectElement.style.backgroundColor = 'red';
                    break;
                default:
                    selectElement.style.backgroundColor = 'transparent'; // Default color or transparent
            }
        }

            document.addEventListener("DOMContentLoaded", function() {
            var selects = document.querySelectorAll('.form-select');
            selects.forEach(function(selectElement) {
                setBackgroundColor(selectElement);
            });
        });

</script>




@endpush