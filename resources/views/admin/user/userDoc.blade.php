@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row">
            <h3>User Documents List</h3>
            <div class="d-flex">
                <a href="{{route('admin.user.index')}}" class="btn btn-primary btn-sm">
                    <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                    Back 
                </a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>File Path</th>
                    <th>File Name/Document</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @if($data)
                <tr>
                    <td></td>
                    <td>
                        @if($data->gst_file)
                            <a href="{{asset($data->gst_file)}}" class="badge bg-primary" target="_blank">GST DOCUMENT</a>
                        @else
                            <a href="#" class="badge bg-danger">PENDING GST</a>
                        @endif
                    </td>
                    <td>{{$data->gst_number?$data->gst_number:""}}</td>
                    <td>
                        <select  style="width: 110px" class="form-select {{$data->gst_status == 1 ? 'bg-success' : ($data->gst_status == 0 ? 'bg-warning' : 'bg-danger')}}" onchange="changeDocumentStatus(event,{{$data->id}},'gst')">
                            <option value="1" {{$data->gst_status == 1 ? 'selected' : ''}}>Verified</option>
                            <option value="0" {{$data->gst_status == 0 ? 'selected' : ''}}>Pending</option>
                            <option value="2" {{$data->gst_status == 2 ? 'selected' : ''}}>Rejected</option>
                        </select>
                    </td>
                    
                </tr>
                <tr>
                    <td></td>
                    <td>
                        @if($data->pan_file)
                        <a href="{{asset($data->pan_file)}}" class="badge bg-primary" target="_blank">PAN DOCUMENT</a>
                        @else
                        <a href="#" class="badge bg-danger">PENDING PAN</a>
                        @endif
                    </td>
                    <td>{{$data->pan_number?$data->pan_number:""}}</td>
                    <td>
                        <select style="width: 110px"  class="form-select {{$data->pan_status == 1 ? 'bg-success' : ($data->pan_status == 0 ? 'bg-warning' : 'bg-danger')}}" onchange="changeDocumentStatus(event,{{$data->id}},'pan')">
                            <option value="1" {{$data->pan_status == 1 ? 'selected' : ''}}>Verified</option>
                            <option value="0" {{$data->pan_status == 0 ? 'selected' : ''}}>Pending</option>
                            <option value="2" {{$data->pan_status == 2 ? 'selected' : ''}}>Rejected</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        @if($data->adhar_file)
                        <a href="{{asset($data->adhar_file)}}" class="badge bg-primary" target="_blank">ADHAR DOCUMENT</a>
                        @else
                        <a href="#" class="badge bg-danger">PENDING ADHAR</a>
                        @endif
                    </td>
                    <td>{{$data->adhar_number?$data->adhar_number:""}}</td>
                    <td>
                        <select  style="width: 110px" class="form-select {{$data->adhar_status == 1 ? 'bg-success' : ($data->adhar_status == 0 ? 'bg-warning' : 'bg-danger')}}" onchange="changeDocumentStatus(event,{{$data->id}},'adhar')">
                            <option value="1" {{$data->adhar_status == 1 ? 'selected' : ''}}>Verified</option>
                            <option value="0" {{$data->adhar_status == 0 ? 'selected' : ''}}>Pending</option>
                            <option value="2" {{$data->adhar_status == 2 ? 'selected' : ''}}>Rejected</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        @if($data->trade_license_file)
                        <a href="{{asset($data->trade_license_file)}}" class="badge bg-primary" target="_blank">TRADE LICENSE DOCUMENT</a>
                        @else
                        <a href="#" class="badge bg-danger">PENDING TRADE LICENSE</a>
                        @endif
                    </td>
                    <td>{{$data->trade_license_number?$data->trade_license_number:""}}</td>
                    <td>
                        <select style="width: 110px"  class="form-select {{$data->trade_license_status == 1 ? 'bg-success' : ($data->trade_license_status == 0 ? 'bg-warning' : 'bg-danger')}}" onchange="changeDocumentStatus(event,{{$data->id}},'trade_license')">
                            <option value="1" {{$data->trade_license_status == 1 ? 'selected' : ''}}>Verified</option>
                            <option value="0" {{$data->trade_license_status == 0 ? 'selected' : ''}}>Pending</option>
                            <option value="2" {{$data->trade_license_status == 2 ? 'selected' : ''}}>Rejected</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        @if($data->cancelled_cheque_file)
                        <a href="{{asset($data->cancelled_cheque_file)}}" class="badge bg-primary" target="_blank">CANCELLED CHEQUE DOCUMENT</a>
                        @else
                        <a href="#" class="badge bg-danger">PENDING CANCELLED CHEQUE</a>
                        @endif
                    </td>
                    <td>
                        <p>Account No:{{$data->account_number?$data->account_number:""}}</p>
                        <p>IFSC CODE:{{$data->ifsc_code?$data->ifsc_code:""}}</p>
                    </td>
                    <td>
                        <select style="width: 110px" class="form-select {{$data->cancelled_cheque_status == 1 ? 'bg-success' : ($data->cancelled_cheque_status == 0 ? 'bg-warning' : 'bg-danger')}}" onchange="changeDocumentStatus(event,{{$data->id}},'cancelled_cheque')">
                            <option value="1" {{$data->cancelled_cheque_status == 1 ? 'selected' : ''}}>Verified</option>
                            <option value="0" {{$data->cancelled_cheque_status == 0 ? 'selected' : ''}}>Pending</option>
                            <option value="2" {{$data->cancelled_cheque_status == 2 ? 'selected' : ''}}>Rejected</option>
                        </select>
                    </td>
                </tr>
                @endif
                {{-- {{dd($Additional_data)}} --}}
                @if($Additional_data)
                
                    @forelse ($Additional_data as $key=> $document)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td><a href="{{ asset($document->additional_document_file) }}" class="badge bg-primary" target="_blank">Addition File</a></td>
                        <td>{{ $document->additional_documents }}</td>
                            {{-- <td><a href="{{route('admin.user.document.status', $document->id)}}"><span class="badge rounded-pill {{$document->status==0?"bg-danger":"bg-success"}}" style="padding: 7px 15px">{{$document->status==0?"Pending":"Accepted"}}</span></a></td> --}}
                        <td>
                            <select style="width: 110px" class="form-select {{$document->status == 1 ? 'bg-success' : ($document->status == 0 ? 'bg-warning' : 'bg-danger')}}" onchange="changeDocumentStatus(event,{{$document->id}},'additional_doc')">
                                <option value="1" {{$document->status == 1 ? 'selected' : ''}}>Verified</option>
                                <option value="0" {{$document->status == 0 ? 'selected' : ''}}>Pending</option>
                                <option value="2" {{$document->status == 2 ? 'selected' : ''}}>Rejected</option>
                            </select>
                        </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="100%" class="text-center">No records found</td>
                        </tr>
                    @endforelse
                @endif
            </tbody>

        </table>
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
        <script>
            function changeDocumentStatus(event,id,type) {
                event.preventDefault();
                var status = event.target.value;

                $.ajax({
                    type: 'GET',
                    url: '{{ route("admin.user.document.status") }}',
                    data: {
                        id: id,
                        type: type,
                        status: status,
                    },
                    success: function(response) {
        
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }

                });
            }
            </script>
            
        @endpush        