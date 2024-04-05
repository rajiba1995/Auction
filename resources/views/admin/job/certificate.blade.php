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
        <div class="top-info-panel" style="display:none">
            <div class="info-box">
                <label>Release Order No.</label>
                <p>MPPL / HCIL / 02</p>
            </div>
            <div class="info-box">
                <label>Date</label>
                <p>01.10.2023</p>
            </div>
            <div class="info-box">
                <label>Date of Inspection</label>
                <p>01.10.2023</p>
            </div>
            <div class="info-box">
                <label>Place of Inspection</label>
                <p>Singur, Hooghly </p>
            </div>
            <div class="info-box">
                <label>Basis of Testing</label>
                <p>IS 11652 - 2000</p>
            </div>
            <div class="info-box">
                <label>Vendor Name: </label>
                <p>Shri Dakshineswari Maa Polyfabs Ltd, Singur, Hooghly </p>
            </div>
            <div class="info-box">
                <label>Buyer Name:</label>
                <p>Shri Dakshineswari Maa Polyfabs Ltd, Singur, Hooghly </p>
            </div>
            <div class="info-box">
                <label>Destination</label>
                <p>IS 11652 - 2000</p>
            </div>
            <div class="info-box">
                <label>Quality</label>
                <p>Shri Dakshineswari Maa Polyfabs Ltd, Singur, Hooghly </p>
            </div>
            <div class="info-box">
                <label>Lot No.</label>
                <p>Blank</p>
            </div>
            <div class="info-box">
                <label>Bags / Bale</label>
                <p>500</p>
            </div>
            <div class="info-box">
                <label>Purchase order No.</label>
                <p>Blank</p>
            </div>
            <div class="info-box">
                <label>Stencil No.</label>
                <p>Jutin - 10</p>
            </div>
            <div class="info-box">
                <label>Serial No.</label>
                <p>Jutin - 10</p>
            </div>
            <div class="info-box">
                <label>Despatch Invoice No.</label>
                <p>Jutin - 10</p>
            </div>
            <div class="info-box">
                <label>Quantity</label>
                <p>Jutin - 10</p>
            </div>
        </div>
        <div class="top-info-panel" style="">
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
                                    <tr><td colspan="2" style="text-transform:uppercase;font-size:12px;font-weight:500;text-align:center;line-height:10px;padding:5px;padding-bottom:20px;"><strong>CERTIFICATE</strong></td></tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="result-info-table info-table-holder" style="margin-top: 0px !important;">
            <div>
                <table style="width: 100%;table-layout: fixed;">
                    <tbody>
                        <tr>
                            <td style="padding:0;">
                                <table style="width: 100%;table-layout: fixed;border:none;">
                                    <thead>
                                        <tr>
                                            <th style="font-size:10px;font-weight:600;text-align:left;padding:2px 10px;">Sl. No.ISI/C/278</th>
                                            <th style="font-size:10px;font-weight:600;text-align:right;padding:2px 10px;">Date:30.09.2023</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="font-size:10px;text-align:left;border-bottom:none;padding:2px 10px;">A/c M/S. RCCPL PVT.LTD.</td>
                                            <td style="font-size:10px;font-weight:600;text-align:left;border-bottom:none;padding:2px 10px;">P.O. NO.23123915 Dt. 01.09.2023</td>
                                        </tr>
                                        <tr>
                                            <td style="font-size:10px;text-align:left;border-bottom:none;padding:2px 10px;">UNIT: <span style="font-weight:600;">MUKUTBAN CEMENT WORKS</span></td>
                                            <td style="font-size:10px;text-align:left;border-bottom:none;padding:2px 10px;">Sl. No.:</td>
                                        </tr>
                                        <tr>
                                            <td style="font-size:10px;font-weight:600;text-align:left;border-bottom:none;padding:2px 10px;">TALUKA: </td>
                                            <td style="font-size:10px;text-align:left;border-bottom:none;padding:2px 10px;">Challan. No.:</td>
                                        </tr>
                                        <tr>
                                            <td style="font-size:10px;font-weight:600;text-align:left;padding:2px 10px;">Maharashtra: 445319</td>
                                            <td style="font-size:10px;text-align:left;padding:2px 10px;">Basis of tasting.:</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size:10px;font-weight:600;text-align:center;text-transform:uppercase;padding:2px 10px;">Test Results</td>
                        </tr>
                        <tr>
                            <td style="padding:0;">
                                <table style="width: 100%;table-layout: fixed;border:none;">
                                    <thead>
                                        <tr>
                                            <th colspan="2" class="text-start" style="font-size: 10px; padding: 2px 10px;">OBSERVATION</th>
                                            <th colspan="2" style="font-size: 10px; padding: 2px 10px;">REQUIRED</th>
                                            <th colspan="2" style="font-size: 10px; padding: 2px 10px;">FINDING</th>
                                            <th style="font-size: 10px; padding: 2px 10px;">RANGE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="2" class="text-start" style="font-size: 10px; padding: 2px 10px;">Counting of Bales</td>
                                            <td style="font-size: 10px; padding: 2px 10px;">200</td>
                                            <td style="font-size: 10px; padding: 2px 10px;">Nos.</td>
                                            <td style="font-size: 10px; padding: 2px 10px;">{{count($AllBales)}}</td>
                                            <td style="font-size: 10px; padding: 2px 10px;">Nos.</td>
                                            <td style="font-size: 10px; padding: 2px 10px;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-start" style="font-size: 10px; padding: 2px 10px;">Bales selected for opening</td>
                                            <td style="font-size: 10px; padding: 2px 10px;">80</td>
                                            <td style="font-size: 10px; padding: 2px 10px;">Nos.</td>
                                            <td style="font-size: 10px; padding: 2px 10px;">80</td>
                                            <td style="font-size: 10px; padding: 2px 10px;">Nos.</td>
                                            <td style="font-size: 10px; padding: 2px 10px;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-start" style="font-size: 10px; padding: 2px 10px;">Counting of bags/bale</td>
                                            <td style="font-size: 10px; padding: 2px 10px;">500</td>
                                            <td style="font-size: 10px; padding: 2px 10px;">Nos.</td>
                                            <td style="font-size: 10px; padding: 2px 10px;">500</td>
                                            <td style="font-size: 10px; padding: 2px 10px;">Nos.</td>
                                            <td style="font-size: 10px; padding: 2px 10px;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-start" style="font-size: 10px; padding: 2px 10px;">No. of bags checked</td>
                                            <td style="font-size: 10px; padding: 2px 10px;">32</td>
                                            <td style="font-size: 10px; padding: 2px 10px;">Nos.</td>
                                            <td style="font-size: 10px; padding: 2px 10px;">32</td>
                                            <td style="font-size: 10px; padding: 2px 10px;">Nos.</td>
                                            <td style="font-size: 10px; padding: 2px 10px;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-start" style="font-size: 10px; padding: 2px 10px;">Wt./Bag (gsm) (Inclu. of stitching thread & printing ink)</td>
                                            <td colspan="2" style="font-size: 10px; padding: 2px 10px;">710+-10</td>
                                            <td colspan="2" style="font-size: 10px; padding: 2px 10px;">714</td>
                                            <td style="font-size: 10px; white-space:nowrap; padding: 2px 10px;">700 - 715</td>
                                        </tr>
                                        @php
                                            // dd($FetchFinalJobData);
                                        @endphp
                                        @if ($FetchFinalJobData->dimension_length>0 && $FetchFinalJobData->dimension_width>0)
                                        <tr>
                                            <td rowspan="2" class="text-black text-start" style="font-size: 10px; padding: 2px 10px;">Dimension (mm)</td>
                                            <td class="text-start" style="font-size: 10px; padding: 2px 10px;">Inside Length (mm)</td>
                                            <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{$AllRequiredValue->dimension_length}}{{$AllRequiredValue->dimension_length_plus?'+'.$AllRequiredValue->dimension_length_plus:''}}{{$AllRequiredValue->dimension_length_minus?'-'.$AllRequiredValue->dimension_length_minus:''}}</td>
                                            <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{round($FetchFinalJobData->dimension_length, 2)}}</td>
                                            <td style="font-size: 10px; white-space:nowrap; padding: 2px 10px;">{{round($FetchFinalJobData->dimension_length_min, 2)}}-{{round($FetchFinalJobData->dimension_length_max, 2)}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-start" style="font-size: 10px; padding: 2px 10px;">Inside Length (mm)</td>
                                            <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{$AllRequiredValue->dimension_width}}{{$AllRequiredValue->dimension_width_plus?'+'.$AllRequiredValue->dimension_width_plus:''}}{{$AllRequiredValue->dimension_width_minus?'-'.$AllRequiredValue->dimension_width_minus:''}}</td>
                                            <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{round($FetchFinalJobData->dimension_width, 2)}}</td>
                                            <td style="font-size: 10px; white-space:nowrap; padding: 2px 10px;">{{round($FetchFinalJobData->dimension_width_min, 2)}}-{{round($FetchFinalJobData->dimension_width_max, 2)}}</td>
                                        </tr>
                                        @endif
                                        @if ($FetchFinalJobData->mesh_length>0 && $FetchFinalJobData->mesh_weight>0)
                                            <tr>
                                                <td rowspan="2" class="text-black text-start" style="font-size: 10px; padding: 2px 10px;">Mesh / dm</td>
                                                <td class="text-start" style="font-size: 10px; padding: 2px 10px;">Length wise</td>
                                                <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{$AllRequiredValue->mesh_length}}{{$AllRequiredValue->mesh_length_plus?'+'.$AllRequiredValue->mesh_length_plus:''}}{{$AllRequiredValue->mesh_length_minus?'-'.$AllRequiredValue->mesh_length_minus:''}}</td>
                                                <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{round($FetchFinalJobData->mesh_length, 2)}} </td>
                                                <td style="font-size: 10px; white-space:nowrap; padding: 2px 10px;">{{round($FetchFinalJobData->mesh_length_min, 2)}}-{{round($FetchFinalJobData->mesh_length_max, 2)}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-start" style="font-size: 10px; padding: 2px 10px;">Widthwise</td>
                                                <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{$AllRequiredValue->mesh_weight}}{{$AllRequiredValue->mesh_weight_plus?'+'.$AllRequiredValue->mesh_weight_plus:''}}{{$AllRequiredValue->mesh_weight_minus?'-'.$AllRequiredValue->mesh_weight_minus:''}}</td>
                                                <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{round($FetchFinalJobData->mesh_weight, 2)}} </td>
                                                <td style="font-size: 10px; white-space:nowrap; padding: 2px 10px;">{{round($FetchFinalJobData->mesh_weight_min, 2)}}-{{round($FetchFinalJobData->mesh_weight_max, 2)}}</td>
                                            </tr>
                                        @endif
                                        @if ($FetchFinalJobData->value_size_opening>0 && $FetchFinalJobData->value_size_depth>0)
                                            <tr>
                                                <td rowspan="2" class="text-black text-start" style="font-size: 10px; padding: 2px 10px;">Value size (mm)</td>
                                                <td class="text-start" style="font-size: 10px; padding: 2px 10px;">Opening</td>
                                                <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{$AllRequiredValue->value_size_opening}}{{$AllRequiredValue->value_size_opening_plus?'+'.$AllRequiredValue->value_size_opening_plus:''}}{{$AllRequiredValue->value_size_opening_minus?'-'.$AllRequiredValue->value_size_opening_minus:''}}</td>
                                                <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{round($FetchFinalJobData->value_size_opening, 2)}}</td>
                                                <td style="font-size: 10px; white-space:nowrap; padding: 2px 10px;">{{round($FetchFinalJobData->value_size_opening_min, 2)}}-{{round($FetchFinalJobData->value_size_opening_max, 2)}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-start" style="font-size: 10px; padding: 2px 10px;">Depth</td>
                                                <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{$AllRequiredValue->value_size_depth}}{{$AllRequiredValue->value_size_depth_plus?'+'.$AllRequiredValue->value_size_depth_plus:''}}{{$AllRequiredValue->value_size_depth_minus?'-'.$AllRequiredValue->value_size_depth_minus:''}}</td>
                                                <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{round($FetchFinalJobData->value_size_depth, 2)}}</td>
                                                <td style="font-size: 10px; white-space:nowrap; padding: 2px 10px;">{{round($FetchFinalJobData->value_size_depth_min, 2)}}-{{round($FetchFinalJobData->value_size_depth_max, 2)}}</td>
                                            </tr>
                                        @endif
                                        @if ($FetchFinalJobData->folding_top>0 && $FetchFinalJobData->folding_bottom>0)
                                            <tr>
                                                <td rowspan="2" class="text-black text-start" style="font-size: 10px; padding: 2px 10px;">Folding (mm)</td>
                                                <td class="text-start" style="font-size: 10px; padding: 2px 10px;">Top</td>
                                                <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{$AllRequiredValue->folding_top}}{{$AllRequiredValue->folding_top_plus?'+'.$AllRequiredValue->folding_top_plus:''}}{{$AllRequiredValue->folding_top_minus?'-'.$AllRequiredValue->folding_top_minus:''}}</td>
                                                <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{round($FetchFinalJobData->folding_top, 2)}}</td>
                                                <td style="font-size: 10px; white-space:nowrap; padding: 2px 10px;">{{round($FetchFinalJobData->folding_top_min, 2)}}-{{round($FetchFinalJobData->folding_top_max, 2)}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-start" style="font-size: 10px; padding: 2px 10px;">Bottom(Min)</td>
                                                <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{$AllRequiredValue->folding_bottom}}{{$AllRequiredValue->folding_bottom_plus?'+'.$AllRequiredValue->folding_bottom_plus:''}}{{$AllRequiredValue->folding_bottom_minus?'-'.$AllRequiredValue->folding_bottom_minus:''}}</td>
                                                <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{round($FetchFinalJobData->folding_bottom, 2)}}</td>
                                                <td style="font-size: 10px; white-space:nowrap; padding: 2px 10px;">{{round($FetchFinalJobData->folding_bottom_min, 2)}}-{{round($FetchFinalJobData->folding_bottom_max, 2)}}</td>
                                            </tr>
                                        @endif
                                        @if ($FetchFinalJobData->stitching_dm>0)
                                        <tr>
                                            <td colspan="2" class="text-black text-start" style="font-size: 10px; padding: 2px 10px;">No. of Stitches/ dm.</td>
                                            <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{$AllRequiredValue->stitching_dm}}{{$AllRequiredValue->stitching_dm_plus?'+'.$AllRequiredValue->stitching_dm_plus:''}}{{$AllRequiredValue->stitching_dm_minus?'-'.$AllRequiredValue->stitching_dm_minus:''}}</td>
                                            <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{round($FetchFinalJobData->stitching_dm, 2)}}</td>
                                            <td style="font-size: 10px; white-space:nowrap; padding: 2px 10px;">{{round($FetchFinalJobData->stitching_dm_min, 2)}}-{{round($FetchFinalJobData->stitching_dm_max, 2)}}</td>
                                        </tr>
                                        @endif
                                        @if ($FetchFinalJobData->breaking_length>0 && $FetchFinalJobData->breaking_width>0 && $FetchFinalJobData->seam_top>0 && $FetchFinalJobData->seam_bottom>0)
                                            <tr>
                                                <td rowspan="6" class="text-black text-start" style="font-size: 10px; padding: 2px 10px;">Breaking Strength(N)Avg.</td>
                                                <td class="text-start" style="font-size: 10px; padding: 2px 10px;">Length wise</td>
                                                <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{$AllRequiredValue->breaking_length}}{{$AllRequiredValue->breaking_length_plus?'+'.$AllRequiredValue->breaking_length_plus:''}}{{$AllRequiredValue->breaking_length_minus?'-'.$AllRequiredValue->breaking_length_minus:''}}</td>
                                                <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{round($FetchFinalJobData->breaking_length, 2)}}</td>
                                                <td style="font-size: 10px; white-space:nowrap; padding: 2px 10px;">{{round($FetchFinalJobData->breaking_length_min, 2)}}-{{round($FetchFinalJobData->breaking_length_max, 2)}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-start" style="font-size: 10px; padding: 2px 10px;">Elongation%</td>
                                                <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{$AllRequiredValue->breaking_length_elongation}}{{$AllRequiredValue->breaking_length_elongation_plus?'+'.$AllRequiredValue->breaking_length_elongation_plus:''}}{{$AllRequiredValue->breaking_length_elongation_minus?'-'.$AllRequiredValue->breaking_length_elongation_minus:''}}</td>
                                                <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{round($FetchFinalJobData->breaking_length_elongation, 2)}}</td>
                                                <td style="font-size: 10px; white-space:nowrap; padding: 2px 10px;">{{round($FetchFinalJobData->breaking_length_elongation_min, 2)}}-{{round($FetchFinalJobData->breaking_length_elongation_max, 2)}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-start" style="font-size: 10px; padding: 2px 10px;">Widthwise</td>
                                                <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{$AllRequiredValue->breaking_width}}{{$AllRequiredValue->breaking_width_plus?'+'.$AllRequiredValue->breaking_width_plus:''}}{{$AllRequiredValue->breaking_width_minus?'-'.$AllRequiredValue->breaking_width_minus:''}}</td>
                                                <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{round($FetchFinalJobData->breaking_width, 2)}}</td>
                                                <td style="font-size: 10px; white-space:nowrap; padding: 2px 10px;">{{round($FetchFinalJobData->breaking_width_min, 2)}}-{{round($FetchFinalJobData->breaking_width_max, 2)}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-start" style="font-size: 10px; padding: 2px 10px;">Elongation%</td>
                                                <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{$AllRequiredValue->breaking_width_elongation}}{{$AllRequiredValue->breaking_width_elongation_plus?'+'.$AllRequiredValue->breaking_width_elongation_plus:''}}{{$AllRequiredValue->breaking_width_elongation_minus?'-'.$AllRequiredValue->breaking_width_elongation_minus:''}}</td>
                                                <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{round($FetchFinalJobData->breaking_width_elongation, 2)}}</td>
                                                <td style="font-size: 10px; white-space:nowrap; padding: 2px 10px;">{{round($FetchFinalJobData->breaking_width_elongation_min, 2)}}-{{round($FetchFinalJobData->breaking_width_elongation_max, 2)}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-start" style="font-size: 10px; padding: 2px 10px;">Top Seam</td>
                                                <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{$AllRequiredValue->seam_top}}{{$AllRequiredValue->seam_top_plus?'+'.$AllRequiredValue->seam_top_plus:''}}{{$AllRequiredValue->seam_top_minus?'-'.$AllRequiredValue->seam_top_minus:''}}</td>
                                                <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{round($FetchFinalJobData->seam_top, 2)}}</td>
                                                <td style="font-size: 10px; white-space:nowrap; padding: 2px 10px;">{{round($FetchFinalJobData->seam_top_min, 2)}}-{{round($FetchFinalJobData->seam_top_max, 2)}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-start" style="font-size: 10px; padding: 2px 10px;">Bottom Seam</td>
                                                <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{$AllRequiredValue->seam_bottom}}{{$AllRequiredValue->seam_bottom_plus?'+'.$AllRequiredValue->seam_bottom_plus:''}}{{$AllRequiredValue->seam_bottom_minus?'-'.$AllRequiredValue->seam_bottom_minus:''}}</td>
                                                <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{round($FetchFinalJobData->seam_bottom, 2)}}</td>
                                                <td style="font-size: 10px; white-space:nowrap; padding: 2px 10px;">{{round($FetchFinalJobData->seam_bottom_min, 2)}}-{{round($FetchFinalJobData->seam_bottom_max, 2)}}</td>
                                            </tr>
                                        @endif
                                        @if ($FetchFinalJobData->bale_weight_wt>0)
                                            <tr>
                                                <td colspan="2" class="text-black text-start" style="font-size: 10px; padding: 2px 10px;">Avg. Bale Wt. (kgs)</td>
                                                <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{$AllRequiredValue->bale_weight_wt}}</td>
                                                <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{round($FetchFinalJobData->bale_weight_wt, 2)}}</td>
                                                <td style="font-size: 10px; padding: 2px 10px;"></td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td colspan="2" class="text-start" style="font-size: 10px; padding: 2px 10px;">Branding (Side)</td>
                                            <td colspan="2" style="font-size: 10px; padding: 2px 10px;"></td>
                                            <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{$data->branding_side}}</td>
                                            <td style="font-size: 10px; padding: 2px 10px;"></td>
                                        </tr>
                                        {{-- <tr>
                                            <td colspan="2" class="text-start" style="font-size: 10px; padding: 2px 10px;">Corona</td>
                                            <td colspan="2" style="font-size: 10px; padding: 2px 10px;"></td>
                                            <td colspan="2" style="font-size: 10px; padding: 2px 10px;">Treated</td>
                                            <td style="font-size: 10px; padding: 2px 10px;"></td>
                                        </tr> --}}
                                        @if ($FetchFinalJobData->ash_content>0)
                                            <tr>
                                                <td colspan="2" class="text-start" style="font-size: 10px; padding: 2px 10px;">ASH CONTENT (%) (Max)</td>
                                                <td colspan="2" class="text-black" style="font-size: 10px; padding: 2px 10px;">{{$AllRequiredValue->ash_content}}</td>
                                                <td colspan="2" class="text-black" style="font-size: 10px; padding: 2px 10px;">{{round($FetchFinalJobData->ash_content, 2)}}%</td>
                                                <td style="font-size: 10px; padding: 2px 10px;"></td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td colspan="2" class="text-start" style="font-size: 10px; padding: 2px 10px;">Printing Ink Quality (Tape Tasted)</td>
                                            <td colspan="2" style="font-size: 10px; padding: 2px 10px;"></td>
                                            <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{$FetchFinalJobData->ink_quality}}</td>
                                            <td style="font-size: 10px; padding: 2px 10px;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-start" style="font-size: 10px; padding: 2px 10px;">Stitching Thread Colour</td>
                                            <td colspan="2" style="font-size: 10px; padding: 2px 10px;"></td>
                                            <td colspan="2" style="font-size: 10px; padding: 2px 10px;">{{$data->stitching_thread_colour}}</td>
                                            <td style="font-size: 10px; padding: 2px 10px;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-start" style="font-size: 10px; padding: 2px 10px;">Bale nos. opened for</td>
                                            <td colspan="5" style="font-size: 10px; padding: 2px 10px;">
                                            @php
                                               echo $AllBales = count($AllBales)>0 ? implode(", ", $AllBales) : "";
                                            @endphp
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:0;">
                                <table style="width: 100%;table-layout: fixed;border:none;">
                                    <tbody>
                                        <tr>
                                            <td rowspan="4" style="font-size:10px;font-weight:600;text-align:left;border:none;padding: 2px 10px;">Marking:</td>
                                            <td style="font-size: 10px; text-align:left;border:none; width: 60px; padding: 2px 10px;">RPT-</td>
                                            <td style="font-size: 10px; text-align:left;border:none; width: 172px; padding: 2px 10px;">QWS</td>
                                            <td rowspan="3" style="font-size: 10px; text-align:left;border:none; width: 60px; padding: 2px 10px;"></td>
                                            <td rowspan="3" style="font-size: 10px; text-align:left;border:none; width: 60px; padding: 2px 10px;"></td>
                                            <td rowspan="4" style="font-size: 10px; text-align:left;border:none; padding: 2px 10px;">MRP - NIL</td>
                                            <td rowspan="4" style="font-size: 10px;text-align:left;border:none;  padding: 2px 10px;">*Stenciled with 'JUTIN'-KN-4</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 60px;font-size: 10px; text-align:left;border:none; padding: 2px 10px;">RCCPL</td>
                                            <td style="font-size: 10px; text-align:left;border:none; width: 172px; padding: 2px 10px;">MUKUTBAN</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 60px;font-size: 10px; text-align:left;border:none; padding: 2px 10px;">TYPE</td>
                                            <td style="font-size: 10px; text-align:left;border:none; width: 172px; padding: 2px 10px;">OPC 43Gr.NT</td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 10px; text-align:left;border:none; width: 60px; padding: 2px 10px;">Lot no.</td>
                                            <td style="font-size: 10px; text-align:left;border:none; width: 172px; padding: 2px 10px;">I-09</td>
                                            <td style="font-size: 10px; text-align:left;border:none; width: 60px;padding: 2px 10px;">Bale No.</td>
                                            <td style="font-size: 10px; text-align:left;border:none; padding: 2px 10px;">1-200</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7" style="font-size: 10px; text-align:left;border:none; padding: 2px 10px;">Checked by</td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" style="font-size: 10px; font-weight: 600; text-align:left;border:none; padding: 2px 10px;">SK/-</td>
                                            <td colspan="2" style="font-size: 10px; font-weight: 600; text-align:left;border:none; padding: 2px 10px;">For INSPECTION SYNDICATE OF INDIA</td>
                                        </tr>
                                    </tbody>
                                </table>
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