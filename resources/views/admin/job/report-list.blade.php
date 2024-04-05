@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<style>
.priority_status {
    width: 77% !important;
}
.btn-edit{
    background: #0063c01f !important;
}
</style>
<div class="inner-content">
    <div class="row">
        <div class="col-md-12">
            <div class="report-table-box">
                <div class="heading-row">
                    <h3>Job wise all reports</h3>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Vendor (Supplier)</th>
                            <th>Client</th>
                            <th>Inspector</th>
                            <th>Ins. Date</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key =>$item)
                        @php
                            $report = App\Models\JobFinalReport::where('job_id', $item->id)->first();
                        @endphp
                            <tr>
                                <td> {{ $data->firstItem() + $loop->index }}</td>
                                <td>{{$item->VendorData->name}}</td>
                                <td>{{$item->ClientData->name}}</td>
                                <td>{{$item->InspectorData->name}}</td>
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
                                    <select name="priority_name" id="priority_name{{$item->id}}" class="btn-sm form-control priority_status {{$class}}" data-id="{{$item->id}}">
                                        <option value="1" {{$item->priority==1?"selected":"hidden"}}>High</option>
                                        <option value="2" {{$item->priority==2?"selected":"hidden"}}>Medium</option>
                                        <option value="3" {{$item->priority==3?"selected":"hidden"}}>Low</option>
                                    </select>
                                </td>
                                <td>
                                    <a href="javascript:void(0)"><span class="btn btn-sm {{$item->status == 1 ? "low_priority text-dark" : ($item->status == 2 ? "high_priority text-dark" : "medium_priority text-dark status_class")}}">{{$item->status == 1 ? "Completed" : ($item->status == 2 ? "Rejected" : "Pending")}}</span></a>
                                </td>
                                <td>
                                    @if ($item->status>0)
                                    <a href="{{route('admin.job.report', $item->id)}}" class="btn btn-edit" title="Report"><i class="fa-solid fa-folder-open"></i> Report</a>
                                    @endif
                                    @if($report)
                                        <a href="{{route('admin.job.report.release-order', $item->id)}}" class="btn btn-edit" title="Report"><i class="fa-solid fa-folder-open"></i> Release Order</a>
                                        <a href="{{route('admin.job.report.certificate', $item->id)}}" class="btn btn-edit" title="Report"><i class="fa-solid fa-folder-open"></i> Certificate</a>
                                    @endif
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

</script>
@endpush