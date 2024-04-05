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
            <h3>Sub-Categories List</h3>
            <div class="d-flex">
                <a href="{{route('admin.collection.index')}}" class="btn btn-danger btn-sm">
                    <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                    Back 
                </a>
            </div>
        </div>


        <table class="table">
            <thead>
                <tr>
                    <th>SL.</th>
                    <th width="10%">Image</th>
                    <th>SubCategory Name</th>
                    
                </tr>
            </thead>
            <tbody class="align-middle">
                @forelse($data as $key =>$item)
                    <tr>
                        <td> {{ $key+1 }}</td>
                        <td>
                            <img src="{{ asset($item->image) }}" alt="No-Image" srcset="" class="img-thumbnail"
                                height="5%" width="50%">
                        </td>
                        <td> {{ $item->title }}</td>
                       
                    </tr>
                @empty
                    <tr>
                        <td colspan="100%" class="text-center">No SubCategory records found</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
        {{-- {{ $data->appends($_GET)->links() }} --}}
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


        function setBackgroundColor(selectElement) {
            var status = selectElement.value;
            switch(status) {
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
                default:
                    selectElement.style.borderColor = 'transparent'; // Default color or transparent
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