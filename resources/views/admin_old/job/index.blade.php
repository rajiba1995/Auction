@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="row">
        <div class="col-md-12">
            <div class="report-table-box">
                <div class="heading-row">
                    <h3>Job List</h3>
                    <a href="{{route('admin.job.create')}}" class="btn text-light font-weight-bold bg-primary text-right btn-sm">
                        <i class="fa-solid fa-plus"></i>
                        Create New Job 
                    </a>
                </div>
                <form action="" method="get" id="searchForm">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-auto col-12" id="Job_vendor">
                                <select name="name" class="form-control w-100 js-example-basic-single" data-placeholder="Select a vendor">
                                    <option value="">Select vendor</option>
                                    @foreach ($vendors as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-auto col-12">
                                <input type="date" name="date" value="{{request()->query('date')}}" class="form-control w-100"/>
                            </div>
                            <div class="col-lg-auto col-12">
                                <select name="status" class="form-control" class="w-100">
                                    <option value="all" selected>All Statuses</option>
                                    <option value="1">Completed</option>
                                    <option value="0">Pending</option>
                                </select>
                            </div>
                            <div class="col-lg-auto col-12">
                                <select name="status" class="form-control" class="w-100">
                                    <option value="all" selected>All Priority</option>
                                    <option value="1">High</option>
                                    <option value="2">Medium</option>
                                    <option value="3">Low</option>
                                </select>
                            </div>
                            <div class="col-lg-auto col-12 text-end">
                                <button type="submit" class="btn btn-success"><i class="fa-solid fa-magnifying-glass"></i>Search</button>
                                <a href="{{route('admin.job.index')}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-rotate"></i></a>
                            </div>
                        </div>
                    </div>
                </form>
                
                <table class="table">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Vendor (Supplier)</th>
                            <th>Client</th>
                            <th>Inspector</th>
                            <th>Lot No</th>
                            <th>Ins. Date</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key =>$item)
                            <tr>
                                <td> {{ $data->firstItem() + $loop->index }}</td>
                                <td>{{$item->VendorData->name}}</td>
                                <td>{{$item->ClientData->name}}</td>
                                <td>{{$item->InspectorData->name}}</td>
                                <td>{{$item->lot_no}}</td>
                                <td>{{date('d-m-Y', strtotime($item->inspection_date))}}</td>
                                <td>
                                    @php
                                        if($item->priority==1){
                                            $class = 'high_priority';
                                        }elseif($item->priority==2){
                                            $class = 'medium_priority';
                                        }else{
                                            $class = 'low_priority';
                                        }

                                    @endphp
                                    <select name="priority_name" id="priority_name{{$item->id}}" class="form-control priority_status {{$class}}" data-id="{{$item->id}}">
                                        <option value="1" {{$item->priority==1?"selected":""}}>High</option>
                                        <option value="2" {{$item->priority==2?"selected":""}}>Medium</option>
                                        <option value="3" {{$item->priority==3?"selected":""}}>Low</option>
                                    </select>
                                </td>
                                <td>
                                    <a href="javascript:void(0)"><span class="badge rounded-pill {{$item->status == 1 ? "low_priority text-dark" : ($item->status == 2 ? "high_priority text-dark" : "medium_priority text-dark status_class")}}">{{$item->status == 1 ? "Completed" : ($item->status == 2 ? "Rejected" : "Pending")}}</span></a>
                                </td>
                                <td>
                                    <a href="{{route('admin.job.edit', $item->id)}}" class="btn btn-edit" title="Edit"><i class="fa-solid fa-pen"></i></a>
                                    @if($item->status>0)
                                    <a href="{{route('admin.job.report', $item->id)}}" class="btn btn-edit" title="Report"><i class="fa-solid fa-folder-open"></i></a>
                                    @endif
                                    <button type="button" class="btn btn-delete itemremove" data-id="{{$item->id}}" title="Delete"><i class="fa-regular fa-trash-can"></i></button>
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
                    var baseUrl = "{{ url('/') }}";
                    window.location.href = baseUrl + "/admin/job/delete/" + id;
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
                url: "{{route('admin.job.priority')}}",
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