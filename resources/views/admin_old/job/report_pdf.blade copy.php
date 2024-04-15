<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Order PDF</title>
    <style>
        .package_dimension input {
         font-weight: 500 !important;
         font-size: 8px !important;
         width: 26px !important;
         height: 12px !important;
         background: transparent;
         line-height: 12px !important;
        }
        .badge:empty {
             display: block !important;
         }
         .top-info-panel {
             padding: 16px 24px 8px;
         }
         .info-box {
             margin: 0px 30px 12px 0px;
         }
         .info-box label {
             font-size: 12px;
             line-height: 9px;
             margin-bottom: 8px;
         }
         .info-box p {
             font-size: 12px;
             line-height: 9px;
         }
         .info-table td {
             font-size: 8px;
             word-break: break-all;
             padding: 2px !important;
         }
         .info-table tr:last-child td {
             padding: 15px 60px !important;
         }
         .info-table tr:last-child td label {
             font-size: 10px;
         }
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
             #printableArea, .action_btn {
                 display: none !important;
             }
         }
     </style>
</head>
<body>
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
                            <td style="width:15%;text-align:left;vertical-align:top;">
                                <img src="{{asset('admin/assets/images/is_logo.png')}}">
                            </td>
                            <td style="width:70%;">
                                <table style="width: 100%;table-layout:fixed;">
                                    <tbody>
                                        <tr><td style="text-transform:uppercase;font-size:24px;font-weight:700;text-align:center;line-height:20px;padding:5px;">Inspection Syndicate Of India Pvt. Ltd.</td></tr>
                                        <tr><td style="text-transform:uppercase;font-size:18px;font-weight:500;text-align:center;line-height:14px;padding:5px;">Consulntans &amp; surveyors</td></tr>
                                        <tr><td style="text-transform:uppercase;font-size:14px;font-weight:500;text-align:center;line-height:12px;padding:5px;">Ergo Brilliant Tower,(Unit - 1002)</td></tr>
                                        <tr><td style="font-size:12px;font-weight:500;text-align:center;line-height:10px;padding:5px;">Phone:</td></tr>
                                        <tr><td style="text-transform:uppercase;font-size:12px;font-weight:500;text-align:center;line-height:10px;padding:5px;padding-bottom:20px;">Branch Name:</td></tr>
                                    </tbody>
                                </table>
                            </td>
                            <td style="width:15%;text-align:right;vertical-align:top;">
                                <img src="{{asset('admin/assets/images/is_logo.png')}}">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="info-box" style="margin-right:30px;margin-bottom:12px;">
                <label style="font-size:12px;line-height:9px;margin-bottom:8px;">Name of Supplier</label>
                <p style="font-size:12px;line-height:9px;">{{$job->VendorData->name}}</p>
            </div>
            <div class="info-box" style="margin-right:30px;margin-bottom:12px;">
                <label style="font-size:12px;line-height:9px;margin-bottom:8px;">Location of Supplier</label>
                <p style="font-size:12px;line-height:9px;">{{$job->vendor_location}}</p>
            </div>
            <div class="info-box" style="margin-right:30px;margin-bottom:12px;">
                <label style="font-size:12px;line-height:9px;margin-bottom:8px;">Inspection Date</label>
                <p style="font-size:12px;line-height:9px;">{{date('d.m.Y', strtotime($job->inspection_date))}}</p>
            </div>
            <div class="info-box" style="margin-right:30px;margin-bottom:12px;">
                <label style="font-size:12px;line-height:9px;margin-bottom:8px;">Quantity:</label>
                <p style="font-size:12px;line-height:9px;">{{$job->quantity}}</p>
            </div>
            <div class="info-box" style="margin-right:30px;margin-bottom:12px;">
                <label style="font-size:12px;line-height:9px;margin-bottom:8px;">A/C:</label>
                <p style="font-size:12px;line-height:9px;">{{$job->ClientData->name.', '.$job->unit_name}}</p>
            </div>
            <div class="info-box" style="margin-right:30px;margin-bottom:12px;">
                <label style="font-size:12px;line-height:9px;margin-bottom:8px;">Lot No.:</label>
                <p style="font-size:12px;line-height:9px;">{{$job->lot_no}}</p>
            </div>
            <div class="info-box" style="margin-right:30px;margin-bottom:12px;">
                <label style="font-size:12px;line-height:9px;margin-bottom:8px;">P.O. No.:</label>
                <p style="font-size:12px;line-height:9px;">{{$job->po_no}}</p>
            </div>
            <div class="info-box" style="margin-right:30px;margin-bottom:12px;">
                <label style="font-size:12px;line-height:9px;margin-bottom:8px;">Quality:</label>
                <p style="font-size:12px;line-height:9px;">{{$job->quality}}</p>
            </div>
        </div>
        <div class="info-table info-table-holder">
            <!--<div class="table-responsive-xxl">-->
            <div>
                {{-- Stitchable Bag --}}
               @if ($job->package_id==2)
                    <table style="width: 100%;table-layout: fixed;">
                        <tbody>
                            <tr>
                                <td rowspan="2" colspan="2" style="font-size:8px;word-break:break-all;padding:2px !important;">SL. NO.</td>
                                <td colspan="2" style="font-size:8px;word-break:break-all;padding:2px !important;">DIMENSION(MM)</td>
                                <td colspan="2" style="font-size:8px;word-break:break-all;padding:2px !important;">VALVE SIZE(MM)</td>
                                <td rowspan="2" style="font-size:8px;word-break:break-all;padding:2px !important;">BAG WEIGHT (GMS)</td>
                                <td rowspan="2" style="font-size:8px;word-break:break-all;padding:2px !important;">NO. OF STITCHING /DM</td>
                                <td colspan="2" style="font-size:8px;word-break:break-all;padding:2px !important;">MESH/INCH/DM</td>
                                <td colspan="2" style="font-size:8px;word-break:break-all;padding:2px !important;">FOLDING (MM)</td>
                                <td rowspan="2" style="font-size:8px;word-break:break-all;padding:2px !important;">TAPE WIDTH (MM)</td>
                                <td colspan="4" style="font-size:8px;word-break:break-all;padding:2px !important;">BREAKING STRENGTH KGF/N (FABRIC)</td>
                                <td colspan="2" style="font-size:8px;word-break:break-all;padding:2px !important;">SEAM STRENGTH(KGF/N)</td>
                                <td colspan="2" style="font-size:8px;word-break:break-all;padding:2px !important;">STRUSS WT.</td>
                                <td rowspan="2" style="font-size:8px;word-break:break-all;padding:2px !important;">ASH CONTENT(%)</td>
                                <td rowspan="2" style="font-size:8px;word-break:break-all;padding:2px !important;" class="action_btn">Action</td>
                            </tr>
                            <tr>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">LENGTH WAY</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">WIDTH WAY</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">OPENING</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">DEPTH</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">LENGTH WAY</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">WIDTH WAY</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">TOP</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">BOTTOM</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">LENGTH WAY</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">ELONGATION %</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">WIDTH WAY</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">ELONGATION %</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">TOP</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">BOTTOM</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">SL. NO.</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">KGS.</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-size:8px;word-break:break-all;padding:2px !important;"><strong>Required</strong></td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->dimension_length}}{{$AllRequiredValue->dimension_length_plus?'+'.$AllRequiredValue->dimension_length_plus:''}}{{$AllRequiredValue->dimension_length_minus?'-'.$AllRequiredValue->dimension_length_minus:''}}</td>
    
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->dimension_width}}{{$AllRequiredValue->dimension_width_plus?'+'.$AllRequiredValue->dimension_width_plus:''}}{{$AllRequiredValue->dimension_width_minus?'-'.$AllRequiredValue->dimension_width_minus:''}}</td>
    
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->value_size_opening}}{{$AllRequiredValue->value_size_opening_plus?'+'.$AllRequiredValue->value_size_opening_plus:''}}{{$AllRequiredValue->value_size_opening_minus?'-'.$AllRequiredValue->value_size_opening_minus:''}}</td>
    
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->value_size_depth}}{{$AllRequiredValue->value_size_depth_plus?'+'.$AllRequiredValue->value_size_depth_plus:''}}{{$AllRequiredValue->value_size_depth_minus?'-'.$AllRequiredValue->value_size_depth_minus:''}}</td>
    
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->bag_weight}}{{$AllRequiredValue->bag_weight_plus?'+'.$AllRequiredValue->bag_weight_plus:''}}{{$AllRequiredValue->bag_weight_minus?'-'.$AllRequiredValue->bag_weight_minus:''}}</td>
    
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->stitching_dm}}{{$AllRequiredValue->stitching_dm_plus?'+'.$AllRequiredValue->stitching_dm_plus:''}}{{$AllRequiredValue->stitching_dm_minus?'-'.$AllRequiredValue->stitching_dm_minus:''}}</td>
    
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->mesh_length}}{{$AllRequiredValue->mesh_length_plus?'+'.$AllRequiredValue->mesh_length_plus:''}}{{$AllRequiredValue->mesh_length_minus?'-'.$AllRequiredValue->mesh_length_minus:''}}</td>
    
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->mesh_weight}}{{$AllRequiredValue->mesh_weight_plus?'+'.$AllRequiredValue->mesh_weight_plus:''}}{{$AllRequiredValue->mesh_weight_minus?'-'.$AllRequiredValue->mesh_weight_minus:''}}</td>
    
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->folding_top}}{{$AllRequiredValue->folding_top_plus?'+'.$AllRequiredValue->folding_top_plus:''}}{{$AllRequiredValue->folding_top_minus?'-'.$AllRequiredValue->folding_top_minus:''}}</td>
    
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->folding_bottom}}{{$AllRequiredValue->folding_bottom_plus?'+'.$AllRequiredValue->folding_bottom_plus:''}}{{$AllRequiredValue->folding_bottom_minus?'-'.$AllRequiredValue->folding_bottom_minus:''}}</td>
    
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->tape_width}}{{$AllRequiredValue->tape_width_plus?'+'.$AllRequiredValue->tape_width_plus:''}}{{$AllRequiredValue->tape_width_minus?'-'.$AllRequiredValue->tape_width_minus:''}} mm</td>
                                
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->breaking_length}}{{$AllRequiredValue->breaking_length_plus?'+'.$AllRequiredValue->breaking_length_plus:''}}{{$AllRequiredValue->breaking_length_minus?'-'.$AllRequiredValue->breaking_length_minus:''}}</td>
    
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->breaking_length_elongation}}{{$AllRequiredValue->breaking_length_elongation_plus?'+'.$AllRequiredValue->breaking_length_elongation_plus:''}}{{$AllRequiredValue->breaking_length_elongation_minus?'-'.$AllRequiredValue->breaking_length_elongation_minus:''}}</td>
    
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->breaking_width}}{{$AllRequiredValue->breaking_width_plus?'+'.$AllRequiredValue->breaking_width_plus:''}}{{$AllRequiredValue->breaking_width_minus?'-'.$AllRequiredValue->breaking_width_minus:''}}</td>
    
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->breaking_width_elongation}}{{$AllRequiredValue->breaking_width_elongation_plus?'+'.$AllRequiredValue->breaking_width_elongation_plus:''}}{{$AllRequiredValue->breaking_width_elongation_minus?'-'.$AllRequiredValue->breaking_width_elongation_minus:''}}</td>
    
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->seam_top}}{{$AllRequiredValue->seam_top_plus?'+'.$AllRequiredValue->seam_top_plus:''}}{{$AllRequiredValue->seam_top_minus?'-'.$AllRequiredValue->seam_top_minus:''}}</td>
    
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->seam_bottom}}{{$AllRequiredValue->seam_bottom_plus?'+'.$AllRequiredValue->seam_bottom_plus:''}}{{$AllRequiredValue->seam_bottom_minus?'-'.$AllRequiredValue->seam_bottom_minus:''}}</td>
    
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->struss_sl}}{{$AllRequiredValue->struss_sl_plus?'+'.$AllRequiredValue->struss_sl_plus:''}}{{$AllRequiredValue->struss_sl_minus?'-'.$AllRequiredValue->struss_sl_minus:''}}</td>
    
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->struss_kgs}}{{$AllRequiredValue->struss_kgs_plus?'+'.$AllRequiredValue->struss_kgs_plus:''}}{{$AllRequiredValue->struss_kgs_minus?'-'.$AllRequiredValue->struss_kgs_minus:''}}</td>
    
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->ash_content}}{{$AllRequiredValue->ash_content_plus?'+'.$AllRequiredValue->ash_content_plus:''}}{{$AllRequiredValue->ash_content_minus?'-'.$AllRequiredValue->ash_content_minus:''}}%</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;"></td>
                            </tr>
                           
                            @foreach ($data as $key => $item)
                            <form action="{{route('admin.job.report.update')}}" method="POST">
                                @csrf
                                <tr class="package_dimension">
                                    <td colspan="2" style="font-size:8px;word-break:break-all;padding:2px !important;">{{$key+1}}</td>
                                    <td style="font-size:8px;padding:2px !important;"><input type="text" class="input_field" name="dimension_length" value="{{$item->dimension_length}}" style="width:26px !important;font-size:8px !important;height: 12px !important;background-color: transparent;line-height: 12px !important;"></td>
                                    <td style="font-size:8px;padding:2px !important;"><input type="text" class="input_field" name="dimension_width" value="{{$item->dimension_width}}" style="width:26px !important;font-size:8px !important;height: 12px !important;background-color: transparent;line-height: 12px !important;"></td>
                                    <td style="font-size:8px;padding:2px !important;"><input type="text" class="input_field" name="value_size_opening" value="{{$item->value_size_opening}}" style="width:26px !important;font-size:8px !important;height: 12px !important;background-color: transparent;line-height: 12px !important;"></td>
                                    <td style="font-size:8px;padding:2px !important;"><input type="text" class="input_field" name="value_size_depth" value="{{$item->value_size_depth}}" style="width:26px !important;font-size:8px !important;height: 12px !important;background-color: transparent;line-height: 12px !important;"></td>
                                    <td style="font-size:8px;padding:2px !important;"><input type="text" class="input_field" name="bag_weight" value="{{$item->bag_weight}}" style="width:26px !important;font-size:8px !important;height: 12px !important;background-color: transparent;line-height: 12px !important;"></td>
                                    <td style="font-size:8px;padding:2px !important;"><input type="text" class="input_field" name="stitching_dm" value="{{$item->stitching_dm}}" style="width:26px !important;font-size:8px !important;height: 12px !important;background-color: transparent;line-height: 12px !important;"></td>
                                    <td style="font-size:8px;padding:2px !important;"><input type="text" class="input_field" name="mesh_length" value="{{$item->mesh_length}}" style="width:26px !important;font-size:8px !important;height: 12px !important;background-color: transparent;line-height: 12px !important;"></td>
                                    <td style="font-size:8px;padding:2px !important;"><input type="text" class="input_field" name="mesh_weight" value="{{$item->mesh_weight}}" style="width:26px !important;font-size:8px !important;height: 12px !important;background-color: transparent;line-height: 12px !important;"></td>
                                    <td style="font-size:8px;padding:2px !important;"><input type="text" class="input_field" name="folding_top" value="{{$item->folding_top}}" style="width:26px !important;font-size:8px !important;height: 12px !important;background-color: transparent;line-height: 12px !important;"></td>
                                    <td style="font-size:8px;padding:2px !important;"><input type="text" class="input_field" name="folding_bottom" value="{{$item->folding_bottom}}" style="width:26px !important;font-size:8px !important;height: 12px !important;background-color: transparent;line-height: 12px !important;"></td>
                                    <td style="font-size:8px;padding:2px !important;"><input type="text" class="input_field" name="tape_width" value="{{$item->tape_width}}" style="width:26px !important;font-size:8px !important;height: 12px !important;background-color: transparent;line-height: 12px !important;"></td>
                                    <td style="font-size:8px;padding:2px !important;"><input type="text" class="input_field" name="breaking_length" value="{{$item->breaking_length}}" style="width:26px !important;font-size:8px !important;height: 12px !important;background-color: transparent;line-height: 12px !important;"></td>
                                    <td style="font-size:8px;padding:2px !important;"><input type="text" class="input_field" name="breaking_length_elongation" value="{{$item->breaking_length_elongation}}" style="width:26px !important;font-size:8px !important;height: 12px !important;background-color: transparent;line-height: 12px !important;"></td>
                                    <td style="font-size:8px;padding:2px !important;"><input type="text" class="input_field" name="breaking_width" value="{{$item->breaking_width}}" style="width:26px !important;font-size:8px !important;height: 12px !important;background-color: transparent;line-height: 12px !important;"></td>
                                    <td style="font-size:8px;padding:2px !important;"><input type="text" class="input_field" name="breaking_width_elongation" value="{{$item->breaking_width_elongation}}" style="width:26px !important;font-size:8px !important;height: 12px !important;background-color: transparent;line-height: 12px !important;"></td>
                                    <td style="font-size:8px;padding:2px !important;"><input type="text" class="input_field" name="seam_top" value="{{$item->seam_top}}" style="width:26px !important;font-size:8px !important;height: 12px !important;background-color: transparent;line-height: 12px !important;"></td>
                                    <td style="font-size:8px;padding:2px !important;"><input type="text" class="input_field" name="seam_bottom" value="{{$item->seam_bottom}}" style="width:26px !important;font-size:8px !important;height: 12px !important;background-color: transparent;line-height: 12px !important;"></td>
                                    <td style="font-size:8px;padding:2px !important;"><input type="text" class="input_field" name="struss_sl" value="{{$item->struss_sl}}" style="width:26px !important;font-size:8px !important;height: 12px !important;background-color: transparent;line-height: 12px !important;"></td>
                                    <td style="font-size:8px;padding:2px !important;"><input type="text" class="input_field" name="struss_kgs" value="{{$item->struss_kgs}}" style="width:26px !important;font-size:8px !important;height: 12px !important;background-color: transparent;line-height: 12px !important;"></td>
                                    <td style="font-size:8px;padding:2px !important;"><input type="text" class="input_field" name="ash_content" value="{{$item->ash_content}}" style="width:26px !important;font-size:8px !important;height: 12px !important;background-color: transparent;line-height: 12px !important;"></td>
                                    <td><input type="hidden" name="id" value="{{$item->id}}"><input type="submit" style="width:30px !important;font-size:8px !important;background:#1B6ECB !important;border-radius:0.375rem;color:#fff;" value="Edit"></td>
                                </tr>
                            </form>
                            @endforeach
                            <tr>
                                <td colspan="2" style="font-size:8px;word-break:break-all;padding:2px !important;">AVG.</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->dimension_length, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->dimension_width, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->value_size_opening, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->value_size_depth, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->bag_weight, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->stitching_dm, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->mesh_length, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->mesh_weight, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->folding_top, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->folding_bottom, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->tape_width, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->breaking_length, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->breaking_length_elongation, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->breaking_width, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->breaking_width_elongation, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->seam_top, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->seam_bottom, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;"><strong>G. wt</strong></td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->struss_kgs, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->ash_content, 1)}}%</td>
                                <td style="font-size:8px;padding:2px !important;"></td>
                            </tr>
                            <tr>
                                <td rowspan="2" style="font-size:8px;word-break:break-all;padding:2px !important;">Range</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;"><strong>MIN</strong></td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->dimension_length_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->dimension_width_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->value_size_opening_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->value_size_depth_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->bag_weight_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->stitching_dm_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->mesh_length_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->mesh_weight_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->folding_top_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->folding_bottom_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->tape_width_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->breaking_length_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->breaking_length_elongation_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->breaking_width_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->breaking_width_elongation_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->seam_top_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->seam_bottom_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;"><strong>T. wt</strong></td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->bale_weight_less?$finalValue->bale_weight_less:0, 2)}}</td>
                                <td style="font-size:8px;padding:2px !important;"></td>
                                <td style="font-size:8px;padding:2px !important;"></td>
                            </tr>
                            <tr>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;"><strong>MAX</strong></td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->dimension_length_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->dimension_width_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->value_size_opening_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->value_size_depth_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->bag_weight_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->stitching_dm_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->mesh_length_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->mesh_weight_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->folding_top_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->folding_bottom_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->tape_width_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->breaking_length_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->breaking_length_elongation_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->breaking_width_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->breaking_width_elongation_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->seam_top_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->seam_bottom_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;"><strong>N. wt</strong></td>
                                <td style="font-size:8px;padding:2px !important;">{{ round(isset($finalValue->bale_weight_less) ? $finalValue->struss_kgs - $finalValue->bale_weight_less : $finalValue->struss_kgs, 2) }}</td>
                                <td style="font-size:8px;padding:2px !important;"></td>
                                <td style="font-size:8px;padding:2px !important;"></td>
                            </tr>
                            <tr>
                                <td colspan="23" style="font-size:8px;word-break:break-all;padding:2px !important;">
                                    <strong>REMARKS:</strong>
                                    pp (715x510,100x220mm)78gm 42x42 perdm full yellow colour Fabric BIRLA SMART ADVANCE COMPOSITE TRADE BRAND "-50Kg packing capacity..
                                    <br>Mrp-Blank, W.M.Y. is blank
                                </td>
                            </tr>
                            <tr>
                                <td colspan="23" style="padding: 20px !important;vertical-align:top;">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-6 col-12 text-start">
                                                <p class="text-left">{{$job->VendorData->name}}</p>
                                                <label>(Vendor&apos;s Representative Signature with Stamp)</label>
                                            </div>
                                            <div class="col-md-6 col-12 text-end">
                                                <p>Inspector Name: {{$job->InspectorData->name}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-12 text-start">
                                                Name: ...........................................................
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    {{-- {{dd($AllRequiredValue)}} --}}
               @else
               {{--Non Stitchable Bag --}}
                    <table style="width: 100%;table-layout: fixed;">
                        <tbody>
                            <tr>
                                <td rowspan="2" colspan="2" style="font-size:8px;word-break:break-all;padding:2px !important;">SL. NO.</td>
                                <td colspan="2" style="font-size:8px;word-break:break-all;padding:2px !important;">DIMENSION(MM)</td>
                                <td colspan="2" style="font-size:8px;word-break:break-all;padding:2px !important;">VALVE SIZE(MM)</td>
                                <td colspan="2" style="font-size:8px;word-break:break-all;padding:2px !important;">PATCH LENGTH(MM)</td>
                                <td colspan="2" style="font-size:8px;word-break:break-all;padding:2px !important;">PATCH WIDTH(MM)</td>
                                <td rowspan="2" style="font-size:8px;word-break:break-all;padding:2px !important;">BAG WEIGHT (GMS)</td>
                                <td colspan="2" style="font-size:8px;word-break:break-all;padding:2px !important;">MESH/DM</td>
                                <td colspan="4" style="font-size:8px;word-break:break-all;padding:2px !important;">BREAKING STRENGTH KGF/N</td>
                                <td colspan="2" style="font-size:8px;word-break:break-all;padding:2px !important;">PATCH STRENGTH (KGF/N)</td>
                                <td colspan="2" style="font-size:8px;word-break:break-all;padding:2px !important;">BALE WEIGHT(KGS)</td>
                                <td rowspan="2" style="font-size:8px;word-break:break-all;padding:2px !important;">AIR PERMIABILTY(Nm/Hr@50mbar)</td>
                                <td rowspan="2" style="font-size:8px;word-break:break-all;padding:2px !important;">ASH CONTENT(%)</td>
                                <td rowspan="2" class="action_btn" style="font-size:8px;word-break:break-all;padding:2px !important;">Action</td>
                            </tr>
                            <tr>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">LENGTH WAY</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">WIDTH WAY</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">LENGTH</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">WIDTH</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">OS</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">DS</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">OS</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">DS</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">LENGTH WAY</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">WIDTH WAY</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">LENGTH WAY</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">ELONGATION %</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">WIDTH WAY</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">ELONGATION %</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">OS</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">DS</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">SL. NO.</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">WT.</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-size:8px;word-break:break-all;padding:2px !important;"><strong>Required</strong></td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->dimension_length}}{{$AllRequiredValue->dimension_length_plus?'+'.$AllRequiredValue->dimension_length_plus:''}}{{$AllRequiredValue->dimension_length_minus?'-'.$AllRequiredValue->dimension_length_minus:''}}</td>
    
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->dimension_width}}{{$AllRequiredValue->dimension_width_plus?'+'.$AllRequiredValue->dimension_width_plus:''}}{{$AllRequiredValue->dimension_width_minus?'-'.$AllRequiredValue->dimension_width_minus:''}}</td>
    
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->value_size_opening}}{{$AllRequiredValue->value_size_opening_plus?'+'.$AllRequiredValue->value_size_opening_plus:''}}{{$AllRequiredValue->value_size_opening_minus?'-'.$AllRequiredValue->value_size_opening_minus:''}}</td>
    
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->value_size_depth}}{{$AllRequiredValue->value_size_depth_plus?'+'.$AllRequiredValue->value_size_depth_plus:''}}{{$AllRequiredValue->value_size_depth_minus?'-'.$AllRequiredValue->value_size_depth_minus:''}}</td>
    
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->patch_length_os}}{{$AllRequiredValue->patch_length_os_plus?'+'.$AllRequiredValue->patch_length_os_plus:''}}{{$AllRequiredValue->patch_length_os_minus?'-'.$AllRequiredValue->patch_length_os_minus:''}}</td>
    
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->patch_length_ds}}{{$AllRequiredValue->patch_length_ds_plus?'+'.$AllRequiredValue->patch_length_ds_plus:''}}{{$AllRequiredValue->patch_length_ds_minus?'-'.$AllRequiredValue->patch_length_ds_minus:''}}</td>
    
                               <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->patch_width_os}}{{$AllRequiredValue->patch_width_os_plus?'+'.$AllRequiredValue->patch_width_os_plus:''}}{{$AllRequiredValue->patch_width_os_minus?'-'.$AllRequiredValue->patch_width_os_minus:''}}</td>
    
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->patch_width_ds}}{{$AllRequiredValue->patch_width_ds_plus?'+'.$AllRequiredValue->patch_width_ds_plus:''}}{{$AllRequiredValue->patch_width_ds_minus?'-'.$AllRequiredValue->patch_width_ds_minus:''}}</td>
    
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->bag_weight}}{{$AllRequiredValue->bag_weight_plus?'+'.$AllRequiredValue->bag_weight_plus:''}}{{$AllRequiredValue->bag_weight_minus?'-'.$AllRequiredValue->bag_weight_minus:''}}</td>
    
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->mesh_length}}{{$AllRequiredValue->mesh_length_plus?'+'.$AllRequiredValue->mesh_length_plus:''}}{{$AllRequiredValue->mesh_length_minus?'-'.$AllRequiredValue->mesh_length_minus:''}}</td>
    
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->mesh_weight}}{{$AllRequiredValue->mesh_weight_plus?'+'.$AllRequiredValue->mesh_weight_plus:''}}{{$AllRequiredValue->mesh_weight_minus?'-'.$AllRequiredValue->mesh_weight_minus:''}}</td>
    
                               <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->breaking_length}}{{$AllRequiredValue->breaking_length_plus?'+'.$AllRequiredValue->breaking_length_plus:''}}{{$AllRequiredValue->breaking_length_minus?'-'.$AllRequiredValue->breaking_length_minus:''}}</td>
    
                               <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->breaking_length_elongation}}{{$AllRequiredValue->breaking_length_elongation_plus?'+'.$AllRequiredValue->breaking_length_elongation_plus:''}}{{$AllRequiredValue->breaking_length_elongation_minus?'-'.$AllRequiredValue->breaking_length_elongation_minus:''}}</td>
    
                               <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->breaking_width}}{{$AllRequiredValue->breaking_width_plus?'+'.$AllRequiredValue->breaking_width_plus:''}}{{$AllRequiredValue->breaking_width_minus?'-'.$AllRequiredValue->breaking_width_minus:''}}</td>
    
                               <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->breaking_width_elongation}}{{$AllRequiredValue->breaking_width_elongation_plus?'+'.$AllRequiredValue->breaking_width_elongation_plus:''}}{{$AllRequiredValue->breaking_width_elongation_minus?'-'.$AllRequiredValue->breaking_width_elongation_minus:''}}</td>
    
                               <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->patch_strength_os}}{{$AllRequiredValue->patch_strength_os_plus?'+'.$AllRequiredValue->patch_strength_os_plus:''}}{{$AllRequiredValue->patch_strength_os_minus?'-'.$AllRequiredValue->patch_strength_os_minus:''}}</td>
    
                               <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->patch_strength_ds}}{{$AllRequiredValue->patch_strength_ds_plus?'+'.$AllRequiredValue->patch_strength_ds_plus:''}}{{$AllRequiredValue->patch_strength_ds_minus?'-'.$AllRequiredValue->patch_strength_ds_minus:''}}</td>
    
                               <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->bale_weight_sl}}{{$AllRequiredValue->bale_weight_sl_plus?'+'.$AllRequiredValue->bale_weight_sl_plus:''}}{{$AllRequiredValue->bale_weight_sl_minus?'-'.$AllRequiredValue->bale_weight_sl_minus:''}}</td>
    
                               <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->bale_weight_wt}}{{$AllRequiredValue->bale_weight_wt_plus?'+'.$AllRequiredValue->bale_weight_wt_plus:''}}{{$AllRequiredValue->bale_weight_wt_minus?'-'.$AllRequiredValue->bale_weight_wt_minus:''}}</td>
    
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->air_permiabilty}}{{$AllRequiredValue->air_permiabilty_plus?'+'.$AllRequiredValue->air_permiabilty_plus:''}}{{$AllRequiredValue->air_permiabilty_minus?'-'.$AllRequiredValue->air_permiabilty_minus:''}}</td>
    
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;">{{$AllRequiredValue->ash_content}}{{$AllRequiredValue->ash_content_plus?'+'.$AllRequiredValue->ash_content_plus:''}}{{$AllRequiredValue->ash_content_minus?'-'.$AllRequiredValue->ash_content_minus:''}}</td>
    
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;"></td>
                            </tr>
                            @foreach ($data as $key => $item)
                            <form action="{{route('admin.job.report.update')}}" method="POST">
                                @csrf
                                <tr class="package_dimension">
                                    <td colspan="2" style="font-size:8px;word-break:break-all;padding:2px !important;">{{$key+1}}</td>
                                    <td style="padding: 2px !important;"><input type="text" class="input_field" name="dimension_length" value="{{$item->dimension_length}}" style="width:26px !important;font-size:8px !important;height: 12px !important;background-color: transparent;line-height: 12px !important;"></td>
                                    <td style="padding: 2px !important;"><input type="text" class="input_field" name="dimension_width" value="{{$item->dimension_width}}" style="width:26px !important;background:transparent;font-size:8px !important;height: 12px !important;background: transparent;line-height: 12px !important;"></td>
                                    <td style="padding: 2px !important;"><input type="text" class="input_field" name="value_size_opening" value="{{$item->value_size_opening}}" style="width:26px !important;background:transparent;font-size:8px !important;height: 12px !important;background: transparent;line-height: 12px !important;"></td>
                                    <td style="padding: 2px !important;"><input type="text" class="input_field" name="value_size_depth" value="{{$item->value_size_depth}}" style="width:26px !important;background:transparent;font-size:8px !important;height: 12px !important;background: transparent;line-height: 12px !important;"></td>
                                    <td style="padding: 2px !important;"><input type="text" class="input_field" name="patch_length_os" value="{{$item->patch_length_os}}" style="width:26px !important;background:transparent;font-size:8px !important;height: 12px !important;background: transparent;line-height: 12px !important;"></td>
                                    <td style="padding: 2px !important;"><input type="text" class="input_field" name="patch_length_ds" value="{{$item->patch_length_ds}}" style="width:26px !important;background:transparent;font-size:8px !important;height: 12px !important;background: transparent;line-height: 12px !important;"></td>
                                    <td style="padding: 2px !important;"><input type="text" class="input_field" name="patch_width_os" value="{{$item->patch_width_os}}" style="width:26px !important;background:transparent;font-size:8px !important;height: 12px !important;background: transparent;line-height: 12px !important;"></td>
                                    <td style="padding: 2px !important;"><input type="text" class="input_field" name="patch_width_ds" value="{{$item->patch_width_ds}}" style="width:26px !important;background:transparent;font-size:8px !important;height: 12px !important;background: transparent;line-height: 12px !important;"></td>
                                    <td style="padding: 2px !important;"><input type="text" class="input_field" name="bag_weight" value="{{$item->bag_weight}}" style="width:26px !important;background:transparent;font-size:8px !important;height: 12px !important;background: transparent;line-height: 12px !important;"></td>
                                    <td style="padding: 2px !important;"><input type="text" class="input_field" name="mesh_length" value="{{$item->mesh_length}}" style="width:26px !important;background:transparent;font-size:8px !important;height: 12px !important;background: transparent;line-height: 12px !important;"></td>
                                    <td style="padding: 2px !important;"><input type="text" class="input_field" name="mesh_weight" value="{{$item->mesh_weight}}" style="width:26px !important;background:transparent;font-size:8px !important;height: 12px !important;background: transparent;line-height: 12px !important;"></td>
                                    <td style="padding: 2px !important;"><input type="text" class="input_field" name="breaking_length" value="{{$item->breaking_length}}" style="width:26px !important;background:transparent;font-size:8px !important;height: 12px !important;background: transparent;line-height: 12px !important;"></td>
                                    <td style="padding: 2px !important;"><input type="text" class="input_field" name="breaking_length_elongation" value="{{$item->breaking_length_elongation}}" style="width:26px !important;background:transparent;font-size:8px !important;height: 12px !important;background: transparent;line-height: 12px !important;"></td>
                                    <td style="padding: 2px !important;"><input type="text" class="input_field" name="breaking_width" value="{{$item->breaking_width}}" style="width:26px !important;background:transparent;font-size:8px !important;height: 12px !important;background: transparent;line-height: 12px !important;"></td>
                                    <td style="padding: 2px !important;"><input type="text" class="input_field" name="breaking_width_elongation" value="{{$item->breaking_width_elongation}}" style="width:26px !important;background:transparent;font-size:8px !important;height: 12px !important;background: transparent;line-height: 12px !important;"></td>
                                    <td style="padding: 2px !important;"><input type="text" class="input_field" name="patch_strength_os" value="{{$item->patch_strength_os}}" style="width:26px !important;background:transparent;font-size:8px !important;height: 12px !important;background: transparent;line-height: 12px !important;"></td>
                                    <td style="padding: 2px !important;"><input type="text" class="input_field" name="patch_strength_ds" value="{{$item->patch_strength_ds}}" style="width:26px !important;background:transparent;font-size:8px !important;height: 12px !important;background: transparent;line-height: 12px !important;"></td>
                                    <td style="padding: 2px !important;"><input type="text" class="input_field" name="bale_weight_sl" value="{{$item->bale_weight_sl}}" style="width:26px !important;background:transparent;font-size:8px !important;height: 12px !important;background: transparent;line-height: 12px !important;"></td>
                                    <td style="padding: 2px !important;"><input type="text" class="input_field" name="bale_weight_wt" value="{{$item->bale_weight_wt}}" style="width:26px !important;background:transparent;font-size:8px !important;height: 12px !important;background: transparent;line-height: 12px !important;"></td>
                                    <td style="padding: 2px !important;"><input type="text" class="input_field" name="air_permiabilty" value="{{$item->air_permiabilty}}" style="width:26px !important;background:transparent;font-size:8px !important;height: 12px !important;background: transparent;line-height: 12px !important;"></td>
                                    <td style="padding: 2px !important;"><input type="text" class="input_field" name="ash_content" value="{{$item->ash_content}}" style="width:26px !important;background:transparent;font-size:8px !important;height: 12px !important;background: transparent;line-height: 12px !important;"></td>
                                    <td  style="padding: 2px !important;"><input type="hidden" name="id" value="{{$item->id}}"><input type="submit" style="width:30px !important;font-size:8px !important;background:#1B6ECB !important;border-radius:0.375rem;color:#fff;" value="Edit"></td>
                                </tr>
                            </form>
                            @endforeach
                            <tr>
                                <td colspan="2" style="font-size:8px;word-break:break-all;padding:2px !important;">AVG.</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->dimension_length, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->dimension_width, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->value_size_opening, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->value_size_depth, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->patch_length_os, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->patch_length_ds, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->patch_width_os, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->patch_width_ds, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->bag_weight, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->mesh_length, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->mesh_weight, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->breaking_length, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->breaking_length_elongation, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->breaking_width, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->breaking_width_elongation, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->patch_strength_os, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->patch_strength_ds, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;"><strong>G. wt</strong></td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->bale_weight_wt, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;"></td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->ash_content, 1)}}%</td>
                                <td style="font-size:8px;padding:2px !important;"></td>
                            </tr>
                            <tr>
                                <td rowspan="2" style="font-size:8px;word-break:break-all;padding:2px !important;">Range</td>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;"><strong>MIN</strong></td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->dimension_length_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->dimension_width_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->value_size_opening_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->value_size_depth_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->patch_length_os_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->patch_length_ds_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->patch_width_os_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->patch_width_ds_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->bag_weight_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->mesh_length_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->mesh_weight_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->breaking_length_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->breaking_length_elongation_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->breaking_width_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->breaking_width_elongation_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->patch_strength_os_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->patch_strength_ds_min, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;"><strong>T. wt</strong></td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->bale_weight_less?$finalValue->bale_weight_less:0, 2)}}</td>
                                <td style="font-size:8px;padding:2px !important;"></td>
                                <td style="font-size:8px;padding:2px !important;"></td>
                                <td style="font-size:8px;padding:2px !important;"></td>
                            </tr>
                            <tr>
                                <td style="font-size:8px;word-break:break-all;padding:2px !important;"><strong>MAX</strong></td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->dimension_length_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->dimension_width_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->value_size_opening_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->value_size_depth_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->patch_length_os_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->patch_length_ds_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->patch_width_os_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->patch_width_ds_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->bag_weight_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->mesh_length_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->mesh_weight_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->breaking_length_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->breaking_length_elongation_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->breaking_width_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->breaking_width_elongation_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->patch_strength_os_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;">{{round($finalValue->patch_strength_ds_max, 1)}}</td>
                                <td style="font-size:8px;padding:2px !important;"><strong>N. wt</strong></td>
                                <td style="font-size:8px;padding:2px !important;">{{ round(isset($finalValue->bale_weight_less) ? $finalValue->bale_weight_wt - $finalValue->bale_weight_less : $finalValue->bale_weight_wt, 2) }}</td>
                                <td style="font-size:8px;padding:2px !important;"></td>
                                <td style="font-size:8px;padding:2px !important;"></td>
                                <td style="font-size:8px;padding:2px !important;"></td>
                            </tr>
                            <tr>
                                <td colspan="24" style="font-size:8px;word-break:break-all;padding:2px !important;">
                                    <strong>REMARKS:</strong>
                                    pp (715x510,100x220mm)78gm 42x42 perdm full yellow colour Fabric BIRLA SMART ADVANCE COMPOSITE TRADE BRAND "-50Kg packing capacity..
                                    <br>Mrp-Blank, W.M.Y. is blank
                                </td>
                            </tr>
                            <tr>
                                <td colspan="22" style="padding: 20px !important;vertical-align:top;">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-6 col-12 text-start">
                                                <p class="text-left">{{$job->VendorData->name}}</p>
                                                <label>(Vendor&apos;s Representative Signature with Stamp)</label>
                                            </div>
                                            <div class="col-md-6 col-12 text-end">
                                                <p>Inspector Name: {{$job->InspectorData->name}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-12 text-start">
                                                Name: ...........................................................
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
               @endif
            </div>
        </div>
    </div>
    
</div>
</body>

</html>