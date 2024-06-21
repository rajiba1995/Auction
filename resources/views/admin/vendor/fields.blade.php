@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="row">
        <div class="col-md-12">
            <div class="report-table-box">
                <div class="heading-row">
                    <h3>Inspection Field Management</h3>
                </div>
                <form action="" method="get" id="searchForm">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-auto col-12" id="Job_vendor">
                                <select name="name" class="form-control w-100 js-example-basic-single" data-placeholder="Select a vendor">
                                    <option value="">Select vendor</option>
                                    @foreach ($data as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-auto col-12 text-end">
                                <button type="submit" class="btn btn-success"><i class="fa-solid fa-magnifying-glass"></i>Search</button>
                                <a href="{{route('admin.field.index')}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-rotate"></i></a>
                            </div>
                        </div>
                    </div>
                </form>
                
                <table class="table">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Location</th>
                            <th>A/C</th>
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
                                <td>{{$item->address}},{{$item->city}},{{$item->state}},{{$item->pin}}</td>
                                <td>{{$item->account_no}}</td>
                                <td>
                                    <a href="{{route('admin.field.data', $item->id)}}" class="btn btn-primary btn-sm">
                                        Fields
                                        <iconify-icon icon="icomoon-free:arrow-right" style="margin-bottom: -2px;"></iconify-icon>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$data->appends($_GET)->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            placeholder: 'Select a vendor',
            allowClear: true
        });
    });

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
                    window.location.href = "job/prioriry/"+id;
                }else{
                    Swal.fire("Cancelled", "Record is safe", "error");
                }
        });
    }); 
    $(document).ready(function() {
        $('.priority_status').on('change', function() {
            var priority = $(this).val();
            var id = $(this).data('id');
            $.ajax({
                url: '/admin/job/prioriry',
                type: 'GET',
                data:{'id': id,'value':priority},
                success: function(data) {
                    if(data.status == 200){
                        Swal.fire({
                        icon: 'success',
                        title: 'Priority updated successfully',
                        showConfirmButton: false,
                        timer: 1500
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 1500); // 2000 milliseconds = 2 seconds
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>Why do I have this issue?</a>'
                            });
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>
@endpush