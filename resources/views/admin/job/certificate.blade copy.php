@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<style>
     @media print {
        body * {
            visibility: hidden;
        }
        #printableArea, #printableArea * {
            visibility: visible;
        }
        #printableArea {
            position: absolute;
            left: 0;
            top: 0;
        }
    }
</style>
<div class="inner-content">
    <div class="heading-row mb-2 ">
        <a href="{{route('admin.job.report.index')}}" class="btn btn-danger btn-sm">
            <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
            Back 
        </a>
        <div class="d-flex">
            <a href="javascript:void(0)" onclick="printDiv('printableArea')" class="btn btn-primary btn-sm mx-2">
                <i class="fa-solid fa-plus"></i>
               Print
            </a>
        </div>
    </div>
    <div id="printableArea">
        <div class="top-info-panel">
            <div class="first-info-row" style="">
                <table style="width: 100%;table-layout: fixed;">
                    <tbody>
                        <tr>
                            <td style="width:80%;">
                                <table style="width: 100%;table-layout:fixed;">
                                    <tbody>
                                        <tr><td colspan="2" style="text-transform:uppercase;font-size:18px;font-weight:500;text-align:center;line-height:20px;padding:5px;">Inspection Syndicate Of India Private Limited</td></tr>
                                        <tr><td colspan="2" style="text-transform:uppercase;font-size:12px;font-weight:500;text-align:center;line-height:10px;padding:5px;">(consultant & surveyors) iso:9001:2015 organization</td></tr>
                                        <tr>
                                            <td style="font-size:12px;font-weight:500;text-align:justify;line-height:14px;padding:5px;border-right: black 3px solid"><p style="margin-top: -48px;">All inspection are carried out with best of our knowledge and ability but this cerfificate under no circumstances absolve to the seller from the contractual obligation to the buyer and our responsibility is limited to the exercise of due care.</p></td>
                                            <td style="font-size:12px;font-weight:500;text-align:left;line-height:14px;padding:5px;">
                                            <p style="margin-bottom:2px;"><small>Certificate issued by:</small></p>
                                            <P style="margin-bottom:2px;">INSPECTION SYNDICATE OF INDIA PVT LTD.</P>
                                            <P style="margin-bottom:2px;">"ERGO BRILLIANT TOWER" (UNIT-1002), 10TH FLOOR, GP BLOCK, SECTOR-V, SALT LAKE, KOLKATA-700 091, WEST BENGAL, INDIA</P>
                                            <P style="margin-bottom:2px;"><small>Phone: 40951400-17</small></P>
                                            <P style="margin-bottom:2px;"><small>Email: isoipl.ho@gmail.com/inspection@isoipl.in</small></P>
                                            <P style="margin-bottom:2px;"><small>Website: www.isoipl.co.in</small></P>
                                            </td>
                                        </tr>
                                        <tr><td colspan="2" style="text-transform:uppercase;font-size:12px;font-weight:500;text-align:center;line-height:10px;padding:5px;padding-bottom:20px;">CERTIFICATE</td></tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="info-box" style="margin-right:30px;margin-bottom:12px;">
                <label>Release Order No.</label>
                <p>.......................</p>
            </div>
            <div class="info-box" style="margin-right:30px;margin-bottom:12px;">
                <label style="font-size:12px;line-height:9px;margin-bottom:8px;">Date</label>
                <p style="font-size:12px;line-height:9px;">{{date('d.m.Y')}}</p>
            </div>
            <div class="info-box" style="margin-right:30px;margin-bottom:12px;">
                <label style="font-size:12px;line-height:9px;margin-bottom:8px;">Date of Inspection</label>
                <p style="font-size:12px;line-height:9px;">{{date('d.m.Y', strtotime($data->inspection_date))}}</p>
            </div>
            <div class="info-box" style="margin-right:30px;margin-bottom:12px;">
                <label style="font-size:12px;line-height:9px;margin-bottom:8px;">Place of Inspection</label>
                <p style="font-size:12px;line-height:9px;">{{$data->vendor_location}}</p>
            </div>
            <div class="info-box" style="margin-right:30px;margin-bottom:12px;">
                <label style="font-size:12px;line-height:9px;margin-bottom:8px;">Vendor Name:</label>
                <p style="font-size:12px;line-height:9px;">{{$data->VendorData->name}}</p>
            </div>
            <div class="info-box" style="margin-right:30px;margin-bottom:12px;">
                <label style="font-size:12px;line-height:9px;margin-bottom:8px;">Buyer Name:</label>
                <p style="font-size:12px;line-height:9px;">{{$data->ClientData->name}}</p>
            </div>
            <div class="info-box" style="margin-right:30px;margin-bottom:12px;">
                <label style="font-size:12px;line-height:9px;margin-bottom:8px;">Destination</label>
                <p style="font-size:12px;line-height:9px;">IS 11652 - 2000</p>
            </div>
            <div class="info-box" style="margin-right:30px;margin-bottom:12px;">
                <label style="font-size:12px;line-height:9px;margin-bottom:8px;">Quality</label>
                <p style="font-size:12px;line-height:9px;">{{$data->quality}}</p>
            </div>
            <div class="info-box" style="margin-right:30px;margin-bottom:12px;">
                <label style="font-size:12px;line-height:9px;margin-bottom:8px;">Lot No.</label>
                <p style="font-size:12px;line-height:9px;">{{$data->lot_no}}</p>
            </div>
            <div class="info-box" style="margin-right:30px;margin-bottom:12px;">
                <label style="font-size:12px;line-height:9px;margin-bottom:8px;">Bags / Bale</label>
                <p style="font-size:12px;line-height:9px;">500</p>
            </div>
            <div class="info-box" style="margin-right:30px;margin-bottom:12px;">
                <label style="font-size:12px;line-height:9px;margin-bottom:8px;">Purchase order No.</label>
                <p style="font-size:12px;line-height:9px;">{{$data->po_no}}</p>
            </div>
            <div class="info-box" style="margin-right:30px;margin-bottom:12px;">
                <label style="font-size:12px;line-height:9px;margin-bottom:8px;">Stencil No.</label>
                <p style="font-size:12px;line-height:9px;">{{$data->InspectorData->stencil_number}}</p>
            </div>
            <div class="info-box" style="margin-right:30px;margin-bottom:12px;">
                <label style="font-size:12px;line-height:9px;margin-bottom:8px;">Serial No.</label>
                <p style="font-size:12px;line-height:9px;">Jutin - 10</p>
            </div>
            <div class="info-box" style="margin-right:30px;margin-bottom:12px;">
                <label style="font-size:12px;line-height:9px;margin-bottom:8px;">Despatch Invoice No.</label>
                <p style="font-size:12px;line-height:9px;">Jutin - 10</p>
            </div>
            <div class="info-box" style="margin-right:30px;margin-bottom:12px;">
                <label style="font-size:12px;line-height:9px;margin-bottom:8px;">Quantity</label>
                <p style="font-size:12px;line-height:9px;">{{$data->quantity}}</p>
            </div>
        </div>
        <div class="vendor-info-table info-table-holder">
            <div class="table-responsive-xxl">
                <table>
                    <thead>
                        <tr>
                            <th style="font-size: 10px;padding:5px 20px;">Serial No</th>
                            <th style="font-size: 10px;padding:5px 20px;">Observation</th>
                            <th style="font-size: 10px;padding:5px 20px;">Unit</th>
                            <th style="font-size: 10px;padding:5px 20px;">Required</th>
                            <th style="font-size: 10px;padding:5px 20px;">Findings</th>
                            <th style="font-size: 10px;padding:5px 20px;">Range</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sl = 0;
                        @endphp
                        @if ($FetchFinalJobData->dimension_length>0 && $FetchFinalJobData->dimension_width>0)
                            <tr>
                                <td rowspan="3" class="heading" style="line-height: 8px;font-size: 10px;padding:5px 20px;">0{{$sl= $sl+1}}</td>
                            </tr>
                            <tr>
                                <td class="text-start" style="line-height: 8px;font-size: 10px;padding:5px 20px;">A&#41;. Length wise</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">cm./mm.</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{$AllRequiredValue->dimension_length}}{{$AllRequiredValue->dimension_length_plus?'+'.$AllRequiredValue->dimension_length_plus:''}}{{$AllRequiredValue->dimension_length_minus?'-'.$AllRequiredValue->dimension_length_minus:''}}</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{round($FetchFinalJobData->dimension_length, 2)}}</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{round($FetchFinalJobData->dimension_length_min, 2)}}-{{round($FetchFinalJobData->dimension_length_max, 2)}}</td>
                            </tr>
                            <tr>
                                <td class="text-start" style="line-height: 8px;font-size: 10px;padding:5px 20px;">B&#41;. Width wise</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">cm./mm.</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{$AllRequiredValue->dimension_width}}{{$AllRequiredValue->dimension_width_plus?'+'.$AllRequiredValue->dimension_width_plus:''}}{{$AllRequiredValue->dimension_width_minus?'-'.$AllRequiredValue->dimension_width_minus:''}}</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{round($FetchFinalJobData->dimension_width, 2)}}</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{round($FetchFinalJobData->dimension_width_min, 2)}}-{{round($FetchFinalJobData->dimension_width_max, 2)}}</td>
                            </tr>
                        @endif
                        @if ($FetchFinalJobData->value_size_opening>0 && $FetchFinalJobData->value_size_depth>0)
                            <tr>
                                <td rowspan="3" class="heading" style="line-height: 8px;font-size: 10px;padding:5px 20px;">0{{$sl=$sl+1}}</td>
                                <td colspan="5" class="text-start" style="line-height: 8px;font-size: 10px;padding:5px 20px;">VALVE</td>
                            </tr>
                            <tr>
                                <td class="text-start" style="line-height: 8px;font-size: 10px;padding:5px 20px;">A&#41;. Open</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">cm./mm.</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{$AllRequiredValue->value_size_opening}}{{$AllRequiredValue->value_size_opening_plus?'+'.$AllRequiredValue->value_size_opening_plus:''}}{{$AllRequiredValue->value_size_opening_minus?'-'.$AllRequiredValue->value_size_opening_minus:''}}</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{round($FetchFinalJobData->value_size_opening, 2)}}</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{round($FetchFinalJobData->value_size_opening_min, 2)}}-{{round($FetchFinalJobData->value_size_opening_max, 2)}}</td>
                            </tr>
                            <tr>
                                <td class="text-start" style="line-height: 8px;font-size: 10px;padding:5px 20px;">B&#41;. Depth</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">cm./mm.</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{$AllRequiredValue->value_size_depth}}{{$AllRequiredValue->value_size_depth_plus?'+'.$AllRequiredValue->value_size_depth_plus:''}}{{$AllRequiredValue->value_size_depth_minus?'-'.$AllRequiredValue->value_size_depth_minus:''}}</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{round($FetchFinalJobData->value_size_depth, 2)}}</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{round($FetchFinalJobData->value_size_depth_min, 2)}}-{{round($FetchFinalJobData->value_size_depth_max, 2)}}</td>
                            </tr>
                        @endif
                        @if ($FetchFinalJobData->patch_length_os>0 && $FetchFinalJobData->patch_length_ds>0 && $FetchFinalJobData->patch_width_os>0 && $FetchFinalJobData->patch_width_ds>0)
                            <tr>
                                <td rowspan="5" class="heading" style="line-height: 8px;font-size: 10px;padding:5px 20px;">0{{$sl=$sl+1}}</td>
                                <td colspan="5" class="text-start" style="line-height: 8px;font-size: 10px;padding:5px 20px;">PATCH</td>
                            </tr>
                            <tr>
                                <td class="text-start" style="line-height: 8px;font-size: 10px;padding:5px 20px;">A&#41;. Top Lenght</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">cm./mm.</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{$AllRequiredValue->patch_length_os}}{{$AllRequiredValue->patch_length_os_plus?'+'.$AllRequiredValue->patch_length_os_plus:''}}{{$AllRequiredValue->patch_length_os_minus?'-'.$AllRequiredValue->patch_length_os_minus:''}}</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{round($FetchFinalJobData->patch_length_os, 2)}}</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{round($FetchFinalJobData->patch_length_os_min, 2)}}-{{round($FetchFinalJobData->patch_length_os_max, 2)}}</td>
                            </tr>
                            <tr>
                                <td class="text-start" style="line-height: 8px;font-size: 10px;padding:5px 20px;">B&#41;. Top Width</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">cm./mm.</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{$AllRequiredValue->patch_width_os}}{{$AllRequiredValue->patch_width_os_plus?'+'.$AllRequiredValue->patch_width_os_plus:''}}{{$AllRequiredValue->patch_width_os_minus?'-'.$AllRequiredValue->patch_width_os_minus:''}}</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{round($FetchFinalJobData->patch_width_os, 2)}}</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{round($FetchFinalJobData->patch_width_os_min, 2)}}-{{round($FetchFinalJobData->patch_width_os_max, 2)}}</td>
                            </tr>
                            <tr>
                                <td class="text-start" style="line-height: 8px;font-size: 10px;padding:5px 20px;">A&#41;. Bottom Lenght</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">cm./mm.</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{$AllRequiredValue->patch_length_ds}}{{$AllRequiredValue->patch_length_ds_plus?'+'.$AllRequiredValue->patch_length_ds_plus:''}}{{$AllRequiredValue->patch_length_ds_minus?'-'.$AllRequiredValue->patch_length_ds_minus:''}}</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{round($FetchFinalJobData->patch_length_ds, 2)}}</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{round($FetchFinalJobData->patch_length_ds_min, 2)}}-{{round($FetchFinalJobData->patch_length_ds_max, 2)}}</td>
                            </tr>
                            <tr>
                                <td class="text-start" style="line-height: 8px;font-size: 10px;padding:5px 20px;">B&#41;. Bottom Width</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">cm./mm.</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{$AllRequiredValue->patch_width_ds}}{{$AllRequiredValue->patch_width_ds_plus?'+'.$AllRequiredValue->patch_width_ds_plus:''}}{{$AllRequiredValue->patch_width_ds_minus?'-'.$AllRequiredValue->patch_width_ds_minus:''}}</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{round($FetchFinalJobData->patch_width_ds, 2)}}</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{round($FetchFinalJobData->patch_width_ds_min, 2)}}-{{round($FetchFinalJobData->patch_width_ds_max, 2)}}</td>
                            </tr>
                        @endif
                        @if ($FetchFinalJobData->bag_weight>0)
                        <tr>
                            <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">0{{$sl=$sl+1}}</td>
                            <td class="text-start" style="line-height: 8px;font-size: 10px;padding:5px 20px;">BAG WEIGHT</td>
                            <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">gsm.</td>
                            <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{$AllRequiredValue->bag_weight}}{{$AllRequiredValue->bag_weight_plus?'+'.$AllRequiredValue->bag_weight_plus:''}}{{$AllRequiredValue->bag_weight_minus?'-'.$AllRequiredValue->bag_weight_minus:''}}</td>
                            <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{round($FetchFinalJobData->bag_weight, 2)}}</td>
                            <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{round($FetchFinalJobData->bag_weight_min, 2)}}-{{round($FetchFinalJobData->bag_weight_max, 2)}}</td>
                        </tr>
                        @endif
                        @if ($FetchFinalJobData->breaking_length>0 && $FetchFinalJobData->breaking_width>0)
                            <tr>
                                <td rowspan="3" class="heading" style="line-height: 8px;font-size: 10px;padding:5px 20px;">0{{$sl=$sl+1}}</td>
                                <td colspan="5" class="text-start" style="line-height: 8px;font-size: 10px;padding:5px 20px;">BREAKING STRENGTH</td>
                            </tr>
                            <tr>
                                <td class="text-start" style="line-height: 8px;font-size: 8px;padding:5px 20px;">A&#41;. Length wise</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">kgf./Newton</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{$AllRequiredValue->breaking_length}}{{$AllRequiredValue->breaking_length_plus?'+'.$AllRequiredValue->breaking_length_plus:''}}{{$AllRequiredValue->breaking_length_minus?'-'.$AllRequiredValue->breaking_length_minus:''}}</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{round($FetchFinalJobData->breaking_length, 2)}}</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{round($FetchFinalJobData->breaking_length_min, 2)}}-{{round($FetchFinalJobData->breaking_length_max, 2)}}</td>
                            </tr>
                            <tr>
                                <td class="text-start" style="line-height: 8px;font-size: 10px;padding:5px 20px;">B&#41;. Width wise</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">kgf./Newton</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{$AllRequiredValue->breaking_width}}{{$AllRequiredValue->breaking_width_plus?'+'.$AllRequiredValue->breaking_width_plus:''}}{{$AllRequiredValue->breaking_width_minus?'-'.$AllRequiredValue->breaking_width_minus:''}}</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{round($FetchFinalJobData->breaking_width, 2)}}</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{round($FetchFinalJobData->breaking_width_min, 2)}}-{{round($FetchFinalJobData->breaking_width_max, 2)}}</td>
                            </tr>
                        @endif
                        @if ($FetchFinalJobData->seam_top>0 && $FetchFinalJobData->seam_bottom>0)
                            <tr>
                                <td rowspan="3" class="heading" style="line-height: 8px;font-size: 10px;padding:5px 20px;">0{{$sl=$sl+1}}</td>
                                <td colspan="5" class="text-start" style="line-height: 8px;font-size: 10px;padding:5px 20px;">SEAM STRENGTH</td>
                            </tr>
                            <tr>
                                <td class="text-start" style="line-height: 8px;font-size: 8px;padding:5px 20px;">A&#41;. Top</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">kgf./Newton</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{$AllRequiredValue->seam_top}}{{$AllRequiredValue->seam_top_plus?'+'.$AllRequiredValue->seam_top_plus:''}}{{$AllRequiredValue->seam_top_minus?'-'.$AllRequiredValue->seam_top_minus:''}}</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{round($FetchFinalJobData->seam_top, 2)}}</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{round($FetchFinalJobData->seam_top_min, 2)}}-{{round($FetchFinalJobData->seam_top_max, 2)}}</td>
                            </tr>
                            <tr>
                                <td class="text-start" style="line-height: 8px;font-size: 10px;padding:5px 20px;">B&#41;. Bottom</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">kgf./Newton</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{$AllRequiredValue->seam_bottom}}{{$AllRequiredValue->seam_bottom_plus?'+'.$AllRequiredValue->seam_bottom_plus:''}}{{$AllRequiredValue->seam_bottom_minus?'-'.$AllRequiredValue->seam_bottom_minus:''}}</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{round($FetchFinalJobData->seam_bottom, 2)}}</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{round($FetchFinalJobData->seam_bottom_min, 2)}}-{{round($FetchFinalJobData->seam_bottom_max, 2)}}</td>
                            </tr>
                        @endif
                        @if ($FetchFinalJobData->patch_strength_os>0 && $FetchFinalJobData->patch_strength_ds>0)
                            <tr>
                                <td rowspan="3" class="heading" style="line-height: 8px;font-size: 10px;padding:5px 20px;">0{{$sl=$sl+1}}</td>
                                <td colspan="5" class="text-start" style="line-height: 8px;font-size: 10px;padding:5px 20px;">PATCH STRENGTH</td>
                            </tr>
                            <tr>
                                <td class="text-start" style="line-height: 8px;font-size: 10px;padding:5px 20px;">A&#41;. Top</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">kgf./Newton</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{$AllRequiredValue->patch_strength_os}}{{$AllRequiredValue->patch_strength_os_plus?'+'.$AllRequiredValue->patch_strength_os_plus:''}}{{$AllRequiredValue->patch_strength_os_minus?'-'.$AllRequiredValue->patch_strength_os_minus:''}}</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{round($FetchFinalJobData->patch_strength_os, 2)}}</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{round($FetchFinalJobData->patch_strength_os_min, 2)}}-{{round($FetchFinalJobData->patch_strength_os_max, 2)}}</td>
                            </tr>
                            <tr>
                                <td class="text-start" style="line-height: 8px;font-size: 10px;padding:5px 20px;">B&#41;. Bottom</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">kgf./Newton</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{$AllRequiredValue->patch_strength_ds}}{{$AllRequiredValue->patch_strength_ds_plus?'+'.$AllRequiredValue->patch_strength_ds_plus:''}}{{$AllRequiredValue->patch_strength_ds_minus?'-'.$AllRequiredValue->patch_strength_ds_minus:''}}</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{round($FetchFinalJobData->patch_strength_ds, 2)}}</td>
                                <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">{{round($FetchFinalJobData->patch_strength_ds_min, 2)}}-{{round($FetchFinalJobData->patch_strength_ds_max, 2)}}</td>
                            </tr>
                        @endif
                        <tr>
                            <td rowspan="3" class="heading" style="line-height: 8px;font-size: 10px;padding:5px 20px;">0{{$sl=$sl+1}}</td>
                            <td colspan="5" class="text-start" style="line-height: 8px;font-size: 10px;padding:5px 20px;">PRINTING</td>
                        </tr>
                        <tr>
                            <td class="text-start" style="line-height: 8px;font-size: 10px;padding:5px 20px;">A&#41;. Art Work</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-start" style="line-height: 8px;font-size: 10px;padding:5px 20px;">B&#41;. Ink Quality (Tape Test)</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="line-height: 8px;font-size: 10px;padding:5px 20px;">Remarks:</td>
                            <td colspan="5" style="line-height: 8px;font-size: 10px;padding:5px 20px;"></td>
                        </tr>
                        <tr>
                            <td colspan="24" style="padding: 10px 20px !important;vertical-align:top;">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6 col-12 text-start">
                                            <p class="text-left"></p>
                                            <label style="border-top: 1px solid #000;">(Vendor&apos;s Representative Signature with Stamp)</label>
                                        </div>
                                        <div class="col-md-6 col-12 text-end">
                                            <p></p>
                                            <label style="border-top: 1px solid #000;">(Attending Inspector&apos;s Signature)</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12 text-start">
                                            Name: ...........................................................
                                        </div>
                                        <div class="col-md-6 col-12 text-end">
                                            Name: ...........................................................
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
     function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
    </script>
<script>

</script>
@endpush