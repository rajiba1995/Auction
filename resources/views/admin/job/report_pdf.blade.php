<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
         .info-box {
            display: inline-block;
            margin: 0px 60px 24px 0px;
        }
        .first-info-row{
            margin-bottom: 25px !important;
        }
     </style>
</head>
<body>
    <div class="inner-content">
        <div id="printableArea">
            <div class="top-info-panel">
                <div class="first-info-row" style="">
                    <table style="width: 100%;table-layout: fixed;">
                        <tbody>
                            <tr>
                                <td style="width:15%;text-align:left;vertical-align:top;">
                                    <img src="https://demo90.co.in/dev/inspection_syndicate/public/admin/assets/images/is_logo.png" alt="Company Logo" style="width: 100%">
                                </td>
                                <td style="width:70%;">
                                    <table class="top_table" style="width: 100%;table-layout:fixed;">
                                        <tbody>
                                            <tr><td style="text-transform:uppercase;font-size:50px;font-weight:700;text-align:center;line-height:20px;padding:5px;">Inspection Syndicate Of India Pvt. Ltd.</td></tr>
                                            <tr><td style="text-transform:uppercase;font-size:28px;font-weight:500;text-align:center;padding:5px;">Consulntans &amp; surveyors</td></tr>
                                            <tr><td style="text-transform:uppercase;font-size:28px;font-weight:500;text-align:center;padding:5px;">Ergo Brilliant Tower,(Unit - 1002)</td></tr>
                                            <tr><td style="text-transform:uppercase;font-size:28px;font-weight:500;text-align:center;padding:5px;padding-bottom:20px;">Phone:</td></tr>
                                            <tr><td style="text-transform:uppercase;font-size:28px;font-weight:500;text-align:center;line-height:5px;padding:5px;padding-bottom:20px;">Branch Name:</td></tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td style="width:15%;text-align:right;vertical-align:top;">
                                    <img src="https://demo90.co.in/dev/inspection_syndicate/public/admin/assets/images/is_logo.png" alt="Company Logo" style="width: 100%">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="">
                    <table class="job_details" style="border: 1px solid #272626; width:100%;">
                        <tr>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:35px; padding:10px"><strong>Name of Supplier: </strong> {{$job->VendorData->name}}</td>
                            <td  style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:35px; padding:10px"><strong>Inspection Date: </strong>{{date('d.m.Y', strtotime($job->inspection_date))}}</td>
                        </tr>
                        <tr>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:35px; padding:10px" colspan="2"><strong>Location of Supplier: </strong>{{$job->vendor_location}}</td>
                        </tr>
                        <tr>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:35px; padding:10px"><strong>P.O. No.: </strong> {{$job->po_no}}</td>
                            <td  style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:35px; padding:10px"><strong>Lot No.: </strong>{{$job->lot_no}}</td>
                        </tr>
                       
                        <tr>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:35px; padding:10px"><strong>A/C:</strong> {{$job->ClientData->name.', '.$job->unit_name}}</td>
                            <td  style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:35px; padding:10px"><strong>Quantity: </strong> {{$job->quantity}}</td>
                        </tr>
                        <tr>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:35px; padding:10px"><strong>Quality: </strong>{{$job->quality}}</td>
                            <td  style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:35px; padding:10px"><strong>INV No. & Date: </strong></td>
                        </tr>
                    </table>
                </div>
              {{-- <p>ddd</p> --}}
            <div style="">
                {{-- Stitchable Bag --}}
                @if ($job->package_id==2)
                    <table style="border: 1px solid #272626; width:100%;">
                            <tr>
                                <td rowspan="2" colspan="2" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; font-weight:700; padding:5px; word-break:break-all; text-align:center;">SL. NO.</td>
                                <td colspan="2" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; font-weight:700; padding:5px; word-break:break-all; text-align:center;">DIMENSION(MM)</td>
                                <td colspan="2" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; font-weight:700; padding:5px; word-break:break-all; text-align:center;">VALVE SIZE(MM)</td>
                                <td rowspan="2" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; font-weight:700; padding:5px; word-break:break-all; text-align:center;">BAG WEIGHT (GMS)</td>
                                <td rowspan="2" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; font-weight:700; padding:5px; word-break:break-all; text-align:center;">NO. OF STITCHING /DM</td>
                                <td colspan="2" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; font-weight:700; padding:5px; word-break:break-all; text-align:center;">MESH/INCH/DM</td>
                                <td colspan="2" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; font-weight:700; padding:5px; word-break:break-all; text-align:center;">FOLDING (MM)</td>
                                <td rowspan="2" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; font-weight:700; padding:5px; word-break:break-all; text-align:center;">TAPE WIDTH (MM)</td>
                                <td colspan="4" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; font-weight:700; padding:5px; word-break:break-all; text-align:center;">BREAKING STRENGTH KGF/N (FABRIC)</td>
                                <td colspan="2" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; font-weight:700; padding:5px; word-break:break-all; text-align:center;">SEAM STRENGTH(KGF/N)</td>
                                <td colspan="2" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; font-weight:700; padding:5px; word-break:break-all; text-align:center;">BELL WT.</td>
                                <td rowspan="2" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; font-weight:700; padding:5px; word-break:break-all; text-align:center;">ASH CONTENT</td>
                            </tr>
                            <tr>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; font-weight:700; padding:5px; word-break:break-all; text-align:center;">LENGTH WAY{{$TextValuePack2->dimension_length_text?'('.$TextValuePack2->dimension_length_text.')':""}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; font-weight:700; padding:5px; word-break:break-all; text-align:center;">WIDTH WAY{{$TextValuePack2->dimension_width_text?'('.$TextValuePack2->dimension_width_text.')':""}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; font-weight:700; padding:5px; word-break:break-all; text-align:center;">OPENING{{$TextValuePack2->value_size_opening_text?'('.$TextValuePack2->value_size_opening_text.')':""}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; font-weight:700; padding:5px; word-break:break-all; text-align:center;">DEPTH{{$TextValuePack2->value_size_depth_text?'('.$TextValuePack2->value_size_depth_text.')':""}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; font-weight:700; padding:5px; word-break:break-all; text-align:center;">LENGTH WAY{{$TextValuePack2->mesh_length_text?'('.$TextValuePack2->mesh_length_text.')':""}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; font-weight:700; padding:5px; word-break:break-all; text-align:center;">WIDTH WAY{{$TextValuePack2->mesh_weight_text?'('.$TextValuePack2->mesh_weight_text.')':""}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; font-weight:700; padding:5px; word-break:break-all; text-align:center;">TOP{{$TextValuePack2->folding_top_text?'('.$TextValuePack2->folding_top_text.')':""}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; font-weight:700; padding:5px; word-break:break-all; text-align:center;">BOTTOM{{$TextValuePack2->folding_bottom_text?'('.$TextValuePack2->folding_bottom_text.')':""}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; font-weight:700; padding:5px; word-break:break-all; text-align:center;">LENGTH WAY{{$TextValuePack2->breaking_length_text?'('.$TextValuePack2->breaking_length_text.')':""}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; font-weight:700; padding:5px; word-break:break-all; text-align:center;">ELONGATION %{{$TextValuePack2->breaking_length_elongation_text?'('.$TextValuePack2->breaking_length_elongation_text.')':""}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; font-weight:700; padding:5px; word-break:break-all; text-align:center;">WIDTH WAY{{$TextValuePack2->breaking_width_text?'('.$TextValuePack2->breaking_width_text.')':""}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; font-weight:700; padding:5px; word-break:break-all; text-align:center;">ELONGATION %{{$TextValuePack2->breaking_width_elongation_text?'('.$TextValuePack2->breaking_width_elongation_text.')':""}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; font-weight:700; padding:5px; word-break:break-all; text-align:center;">TOP{{$TextValuePack2->seam_top_text?'('.$TextValuePack2->seam_top_text.')':""}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; font-weight:700; padding:5px; word-break:break-all; text-align:center;">BOTTOM{{$TextValuePack2->seam_bottom_text?'('.$TextValuePack2->seam_bottom_text.')':""}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; font-weight:700; padding:5px; word-break:break-all; text-align:center;">SL. NO.{{$TextValuePack2->struss_sl_text?'('.$TextValuePack2->struss_sl_text.')':""}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; font-weight:700; padding:5px; word-break:break-all; text-align:center;">KGS.{{$TextValuePack2->struss_kgs_text?'('.$TextValuePack2->struss_kgs_text.')':""}}</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;"><strong>Required</strong></td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->dimension_length}}{{$AllRequiredValue->dimension_length_plus?'+'.$AllRequiredValue->dimension_length_plus:''}}{{$AllRequiredValue->dimension_length_minus?'-'.$AllRequiredValue->dimension_length_minus:''}}</td>
    
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->dimension_width}}{{$AllRequiredValue->dimension_width_plus?'+'.$AllRequiredValue->dimension_width_plus:''}}{{$AllRequiredValue->dimension_width_minus?'-'.$AllRequiredValue->dimension_width_minus:''}}</td>
    
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->value_size_opening}}{{$AllRequiredValue->value_size_opening_plus?'+'.$AllRequiredValue->value_size_opening_plus:''}}{{$AllRequiredValue->value_size_opening_minus?'-'.$AllRequiredValue->value_size_opening_minus:''}}</td>
    
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->value_size_depth}}{{$AllRequiredValue->value_size_depth_plus?'+'.$AllRequiredValue->value_size_depth_plus:''}}{{$AllRequiredValue->value_size_depth_minus?'-'.$AllRequiredValue->value_size_depth_minus:''}}</td>
    
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->bag_weight}}{{$AllRequiredValue->bag_weight_plus?'+'.$AllRequiredValue->bag_weight_plus:''}}{{$AllRequiredValue->bag_weight_minus?'-'.$AllRequiredValue->bag_weight_minus:''}}</td>
    
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->stitching_dm}}{{$AllRequiredValue->stitching_dm_plus?'+'.$AllRequiredValue->stitching_dm_plus:''}}{{$AllRequiredValue->stitching_dm_minus?'-'.$AllRequiredValue->stitching_dm_minus:''}}</td>
    
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->mesh_length}}{{$AllRequiredValue->mesh_length_plus?'+'.$AllRequiredValue->mesh_length_plus:''}}{{$AllRequiredValue->mesh_length_minus?'-'.$AllRequiredValue->mesh_length_minus:''}}</td>
    
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->mesh_weight}}{{$AllRequiredValue->mesh_weight_plus?'+'.$AllRequiredValue->mesh_weight_plus:''}}{{$AllRequiredValue->mesh_weight_minus?'-'.$AllRequiredValue->mesh_weight_minus:''}}</td>
    
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->folding_top}}{{$AllRequiredValue->folding_top_plus?'+'.$AllRequiredValue->folding_top_plus:''}}{{$AllRequiredValue->folding_top_minus?'-'.$AllRequiredValue->folding_top_minus:''}}</td>
    
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->folding_bottom}}{{$AllRequiredValue->folding_bottom_plus?'+'.$AllRequiredValue->folding_bottom_plus:''}}{{$AllRequiredValue->folding_bottom_minus?'-'.$AllRequiredValue->folding_bottom_minus:''}}</td>
    
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->tape_width}}{{$AllRequiredValue->tape_width_plus?'+'.$AllRequiredValue->tape_width_plus:''}}{{$AllRequiredValue->tape_width_minus?'-'.$AllRequiredValue->tape_width_minus:''}} mm</td>
                                
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->breaking_length}}{{$AllRequiredValue->breaking_length_plus?'+'.$AllRequiredValue->breaking_length_plus:''}}{{$AllRequiredValue->breaking_length_minus?'-'.$AllRequiredValue->breaking_length_minus:''}}</td>
    
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->breaking_length_elongation}}{{$AllRequiredValue->breaking_length_elongation_plus?'+'.$AllRequiredValue->breaking_length_elongation_plus:''}}{{$AllRequiredValue->breaking_length_elongation_minus?'-'.$AllRequiredValue->breaking_length_elongation_minus:''}}</td>
    
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->breaking_width}}{{$AllRequiredValue->breaking_width_plus?'+'.$AllRequiredValue->breaking_width_plus:''}}{{$AllRequiredValue->breaking_width_minus?'-'.$AllRequiredValue->breaking_width_minus:''}}</td>
    
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->breaking_width_elongation}}{{$AllRequiredValue->breaking_width_elongation_plus?'+'.$AllRequiredValue->breaking_width_elongation_plus:''}}{{$AllRequiredValue->breaking_width_elongation_minus?'-'.$AllRequiredValue->breaking_width_elongation_minus:''}}</td>
    
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->seam_top}}{{$AllRequiredValue->seam_top_plus?'+'.$AllRequiredValue->seam_top_plus:''}}{{$AllRequiredValue->seam_top_minus?'-'.$AllRequiredValue->seam_top_minus:''}}</td>
    
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->seam_bottom}}{{$AllRequiredValue->seam_bottom_plus?'+'.$AllRequiredValue->seam_bottom_plus:''}}{{$AllRequiredValue->seam_bottom_minus?'-'.$AllRequiredValue->seam_bottom_minus:''}}</td>
    
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->struss_sl}}{{$AllRequiredValue->struss_sl_plus?'+'.$AllRequiredValue->struss_sl_plus:''}}{{$AllRequiredValue->struss_sl_minus?'-'.$AllRequiredValue->struss_sl_minus:''}}</td>
    
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->struss_kgs}}{{$AllRequiredValue->struss_kgs_plus?'+'.$AllRequiredValue->struss_kgs_plus:''}}{{$AllRequiredValue->struss_kgs_minus?'-'.$AllRequiredValue->struss_kgs_minus:''}}</td>
    
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->ash_content}}{{$AllRequiredValue->ash_content_plus?'+'.$AllRequiredValue->ash_content_plus:''}}{{$AllRequiredValue->ash_content_minus?'-'.$AllRequiredValue->ash_content_minus:''}}%</td>
                            </tr>
                            
                            @foreach ($data as $key => $item)
                                <tr class="package_dimension">
                                    <td colspan="2" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center; text-align:center">{{$key+1}}</td>
                                    <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center; text-align:center">{{$item->dimension_length}}</td>
                                    <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$item->dimension_width}}</td>
                                    <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$item->value_size_opening}} </td>
                                    <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$item->value_size_depth}} </td>
                                    <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$item->bag_weight}} </td>
                                    <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$item->stitching_dm}} </td>
                                    <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$item->mesh_length}} </td>
                                    <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$item->mesh_weight}} </td>
                                    <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$item->folding_top}} </td>
                                    <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$item->folding_bottom}}</td>
                                    <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$item->tape_width}} </td>
                                    <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$item->breaking_length}} </td>
                                    <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$item->breaking_length_elongation}} </td>
                                    <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$item->breaking_width}} </td>
                                    <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$item->breaking_width_elongation}} </td>
                                    <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$item->seam_top}} </td>
                                    <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$item->seam_bottom}} </td>
                                    <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$item->struss_sl}} </td>
                                    <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$item->struss_kgs}}</td>
                                    <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$item->ash_content}} </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="2" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">AVG.</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->dimension_length, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->dimension_width, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->value_size_opening, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->value_size_depth, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->bag_weight, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->stitching_dm, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->mesh_length, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->mesh_weight, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->folding_top, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->folding_bottom, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->tape_width, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->breaking_length, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->breaking_length_elongation, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->breaking_width, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->breaking_width_elongation, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->seam_top, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->seam_bottom, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;"><strong>G. wt</strong></td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->struss_kgs, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->ash_content, 1)}}%</td>
                            </tr>
                            <tr>
                                <td rowspan="2" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">Range</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;"><strong>MIN</strong></td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->dimension_length_min, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->dimension_width_min, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->value_size_opening_min, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->value_size_depth_min, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->bag_weight_min, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->stitching_dm_min, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->mesh_length_min, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->mesh_weight_min, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->folding_top_min, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->folding_bottom_min, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->tape_width_min, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->breaking_length_min, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->breaking_length_elongation_min, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->breaking_width_min, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->breaking_width_elongation_min, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->seam_top_min, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->seam_bottom_min, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;"><strong>T. wt</strong></td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->bale_weight_less?$finalValue->bale_weight_less:0, 2)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;"></td>
                            </tr>
                            <tr>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;"><strong>MAX</strong></td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->dimension_length_max, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->dimension_width_max, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->value_size_opening_max, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->value_size_depth_max, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->bag_weight_max, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->stitching_dm_max, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->mesh_length_max, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->mesh_weight_max, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->folding_top_max, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->folding_bottom_max, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->tape_width_max, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->breaking_length_max, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->breaking_length_elongation_max, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->breaking_width_max, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->breaking_width_elongation_max, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->seam_top_max, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->seam_bottom_max, 1)}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;"><strong>N. wt</strong></td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{ round(isset($finalValue->bale_weight_less) ? $finalValue->struss_kgs - $finalValue->bale_weight_less : $finalValue->struss_kgs, 2) }}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;"></td>
                            </tr>
                            <tr>
                                <td colspan="23" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all;">
                                    <strong>REMARKS:</strong>
                                    pp (715x510,100x220mm)78gm 42x42 perdm full yellow colour Fabric BIRLA SMART ADVANCE COMPOSITE TRADE BRAND "-50Kg packing capacity..
                                    <br>Mrp-Blank, W.M.Y. is blank
                                </td>
                            </tr>
                            <tr>
                                <td colspan="23" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all;">
                                    <div class="container-fluid">
                                        <table style="width: 100%">
                                            <tr>
                                                <td style="font-size:22px; padding:5px; width:50%"> 
                                                    <p class="text-left">{{$job->VendorData->name}}</p>
                                                    <label>(Vendor&apos;s Representative Signature with Stamp)</label>
                                                </td>
                                                <td style="font-size:22px; padding:5px; text-align:right"><p>Inspector Name: {{$job->InspectorData->name}}</p></td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                    </table>
                    {{-- {{dd($AllRequiredValue)}} --}}
                @else
                {{--Non Stitchable Bag --}}
                    <table style="border: 1px solid #272626; width:100%;">
                        <tr>
                            <td rowspan="2" colspan="2" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">SL. NO.</td>
                            <td colspan="2" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">DIMENSION(MM)</td>
                            <td colspan="2" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">VALVE SIZE(MM)</td>
                            <td colspan="2" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">PATCH LENGTH(MM)</td>
                            <td colspan="2" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">PATCH WIDTH(MM)</td>
                            <td rowspan="2" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">BAG WEIGHT (GMS)</td>
                            <td colspan="2" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">MESH/DM</td>
                            <td colspan="4" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">BREAKING STRENGTH KGF/N</td>
                            <td colspan="2" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">PATCH STRENGTH (KGF/N)</td>
                            <td colspan="2" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">BALE WEIGHT(KGS)</td>
                            <td rowspan="2" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">AIR PERMIABILTY</td>
                            <td rowspan="2" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">ASH CONTENT</td>
                        </tr>
                        <tr>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">LENGTH WAY{{$TextValuePack1->dimension_length_text?'('.$TextValuePack1->dimension_length_text.')':""}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">WIDTH WAY{{$TextValuePack1->dimension_width_text?'('.$TextValuePack1->dimension_width_text.')':""}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">LENGTH{{$TextValuePack1->value_size_opening_text?'('.$TextValuePack1->value_size_opening_text.')':""}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">WIDTH{{$TextValuePack1->value_size_depth_text?'('.$TextValuePack1->value_size_depth_text.')':""}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">OS{{$TextValuePack1->patch_length_os_text?'('.$TextValuePack1->patch_length_os_text.')':""}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">DS{{$TextValuePack1->patch_length_ds_text?'('.$TextValuePack1->patch_length_ds_text.')':""}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">OS{{$TextValuePack1->patch_width_os_text?'('.$TextValuePack1->patch_width_os_text.')':""}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">DS{{$TextValuePack1->patch_width_ds_text?'('.$TextValuePack1->patch_width_ds_text.')':""}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">LENGTH WAY{{$TextValuePack1->mesh_length_text?'('.$TextValuePack1->mesh_length_text.')':""}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">WIDTH WAY{{$TextValuePack1->mesh_weight_text?'('.$TextValuePack1->mesh_weight_text.')':""}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">LENGTH WAY{{$TextValuePack1->breaking_length_text?'('.$TextValuePack1->breaking_length_text.')':""}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">ELONGATION %{{$TextValuePack1->breaking_length_elongation_text?'('.$TextValuePack1->breaking_length_elongation_text.')':""}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">WIDTH WAY{{$TextValuePack1->breaking_width_text?'('.$TextValuePack1->breaking_width_text.')':""}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">ELONGATION %{{$TextValuePack1->breaking_width_elongation_text?'('.$TextValuePack1->breaking_width_elongation_text.')':""}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">OS{{$TextValuePack1->patch_strength_os_text?'('.$TextValuePack1->patch_strength_os_text.')':""}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">DS{{$TextValuePack1->patch_strength_ds_text?'('.$TextValuePack1->patch_strength_ds_text.')':""}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">SL. NO.{{$TextValuePack1->bale_weight_sl_text?'('.$TextValuePack1->bale_weight_sl_text.')':""}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">WT.{{$TextValuePack1->bale_weight_wt_text?'('.$TextValuePack1->bale_weight_wt_text.')':""}}</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;"><strong>Required</strong></td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->dimension_length}}{{$AllRequiredValue->dimension_length_plus?'+'.$AllRequiredValue->dimension_length_plus:''}}{{$AllRequiredValue->dimension_length_minus?'-'.$AllRequiredValue->dimension_length_minus:''}}</td>

                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->dimension_width}}{{$AllRequiredValue->dimension_width_plus?'+'.$AllRequiredValue->dimension_width_plus:''}}{{$AllRequiredValue->dimension_width_minus?'-'.$AllRequiredValue->dimension_width_minus:''}}</td>

                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->value_size_opening}}{{$AllRequiredValue->value_size_opening_plus?'+'.$AllRequiredValue->value_size_opening_plus:''}}{{$AllRequiredValue->value_size_opening_minus?'-'.$AllRequiredValue->value_size_opening_minus:''}}</td>

                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->value_size_depth}}{{$AllRequiredValue->value_size_depth_plus?'+'.$AllRequiredValue->value_size_depth_plus:''}}{{$AllRequiredValue->value_size_depth_minus?'-'.$AllRequiredValue->value_size_depth_minus:''}}</td>

                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->patch_length_os}}{{$AllRequiredValue->patch_length_os_plus?'+'.$AllRequiredValue->patch_length_os_plus:''}}{{$AllRequiredValue->patch_length_os_minus?'-'.$AllRequiredValue->patch_length_os_minus:''}}</td>

                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->patch_length_ds}}{{$AllRequiredValue->patch_length_ds_plus?'+'.$AllRequiredValue->patch_length_ds_plus:''}}{{$AllRequiredValue->patch_length_ds_minus?'-'.$AllRequiredValue->patch_length_ds_minus:''}}</td>

                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->patch_width_os}}{{$AllRequiredValue->patch_width_os_plus?'+'.$AllRequiredValue->patch_width_os_plus:''}}{{$AllRequiredValue->patch_width_os_minus?'-'.$AllRequiredValue->patch_width_os_minus:''}}</td>

                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->patch_width_ds}}{{$AllRequiredValue->patch_width_ds_plus?'+'.$AllRequiredValue->patch_width_ds_plus:''}}{{$AllRequiredValue->patch_width_ds_minus?'-'.$AllRequiredValue->patch_width_ds_minus:''}}</td>

                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->bag_weight}}{{$AllRequiredValue->bag_weight_plus?'+'.$AllRequiredValue->bag_weight_plus:''}}{{$AllRequiredValue->bag_weight_minus?'-'.$AllRequiredValue->bag_weight_minus:''}}</td>

                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->mesh_length}}{{$AllRequiredValue->mesh_length_plus?'+'.$AllRequiredValue->mesh_length_plus:''}}{{$AllRequiredValue->mesh_length_minus?'-'.$AllRequiredValue->mesh_length_minus:''}}</td>

                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->mesh_weight}}{{$AllRequiredValue->mesh_weight_plus?'+'.$AllRequiredValue->mesh_weight_plus:''}}{{$AllRequiredValue->mesh_weight_minus?'-'.$AllRequiredValue->mesh_weight_minus:''}}</td>

                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->breaking_length}}{{$AllRequiredValue->breaking_length_plus?'+'.$AllRequiredValue->breaking_length_plus:''}}{{$AllRequiredValue->breaking_length_minus?'-'.$AllRequiredValue->breaking_length_minus:''}}</td>

                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->breaking_length_elongation}}{{$AllRequiredValue->breaking_length_elongation_plus?'+'.$AllRequiredValue->breaking_length_elongation_plus:''}}{{$AllRequiredValue->breaking_length_elongation_minus?'-'.$AllRequiredValue->breaking_length_elongation_minus:''}}</td>

                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->breaking_width}}{{$AllRequiredValue->breaking_width_plus?'+'.$AllRequiredValue->breaking_width_plus:''}}{{$AllRequiredValue->breaking_width_minus?'-'.$AllRequiredValue->breaking_width_minus:''}}</td>

                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->breaking_width_elongation}}{{$AllRequiredValue->breaking_width_elongation_plus?'+'.$AllRequiredValue->breaking_width_elongation_plus:''}}{{$AllRequiredValue->breaking_width_elongation_minus?'-'.$AllRequiredValue->breaking_width_elongation_minus:''}}</td>

                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->patch_strength_os}}{{$AllRequiredValue->patch_strength_os_plus?'+'.$AllRequiredValue->patch_strength_os_plus:''}}{{$AllRequiredValue->patch_strength_os_minus?'-'.$AllRequiredValue->patch_strength_os_minus:''}}</td>

                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->patch_strength_ds}}{{$AllRequiredValue->patch_strength_ds_plus?'+'.$AllRequiredValue->patch_strength_ds_plus:''}}{{$AllRequiredValue->patch_strength_ds_minus?'-'.$AllRequiredValue->patch_strength_ds_minus:''}}</td>

                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->bale_weight_sl}}{{$AllRequiredValue->bale_weight_sl_plus?'+'.$AllRequiredValue->bale_weight_sl_plus:''}}{{$AllRequiredValue->bale_weight_sl_minus?'-'.$AllRequiredValue->bale_weight_sl_minus:''}}</td>

                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->bale_weight_wt}}{{$AllRequiredValue->bale_weight_wt_plus?'+'.$AllRequiredValue->bale_weight_wt_plus:''}}{{$AllRequiredValue->bale_weight_wt_minus?'-'.$AllRequiredValue->bale_weight_wt_minus:''}}</td>

                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->air_permiabilty}}{{$AllRequiredValue->air_permiabilty_plus?'+'.$AllRequiredValue->air_permiabilty_plus:''}}{{$AllRequiredValue->air_permiabilty_minus?'-'.$AllRequiredValue->air_permiabilty_minus:''}}</td>

                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$AllRequiredValue->ash_content}}{{$AllRequiredValue->ash_content_plus?'+'.$AllRequiredValue->ash_content_plus:''}}{{$AllRequiredValue->ash_content_minus?'-'.$AllRequiredValue->ash_content_minus:''}} (%)</td>
                        </tr>
                        @foreach ($data as $key => $item)
                            <tr class="package_dimension">
                                <td colspan="2" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{$key+1}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center; text-align:center">{{$item->dimension_length}} </td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center; text-align:center">{{$item->dimension_width}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center; text-align:center">{{$item->value_size_opening}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center; text-align:center">{{$item->value_size_depth}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center; text-align:center">{{$item->patch_length_os}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center; text-align:center">{{$item->patch_length_ds}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center; text-align:center">{{$item->patch_width_os}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center; text-align:center">{{$item->patch_width_ds}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center; text-align:center">{{$item->bag_weight}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center; text-align:center">{{$item->mesh_length}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center; text-align:center">{{$item->mesh_weight}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center; text-align:center">{{$item->breaking_length}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center; text-align:center">{{$item->breaking_length_elongation}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center; text-align:center">{{$item->breaking_width}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center; text-align:center">{{$item->breaking_width_elongation}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center; text-align:center">{{$item->patch_strength_os}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center; text-align:center">{{$item->patch_strength_ds}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center; text-align:center">{{$item->bale_weight_sl}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center; text-align:center">{{$item->bale_weight_wt}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center; text-align:center">{{$item->air_permiabilty}}</td>
                                <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center; text-align:center">{{$item->ash_content}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">AVG.</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->dimension_length, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->dimension_width, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->value_size_opening, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->value_size_depth, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->patch_length_os, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->patch_length_ds, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->patch_width_os, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->patch_width_ds, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->bag_weight, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->mesh_length, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->mesh_weight, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->breaking_length, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->breaking_length_elongation, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->breaking_width, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->breaking_width_elongation, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->patch_strength_os, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->patch_strength_ds, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;"><strong>G. wt</strong></td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->bale_weight_wt, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;"></td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->ash_content, 1)}}%</td>
                        </tr>
                        <tr>
                            <td rowspan="2" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">Range</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;"><strong>MIN</strong></td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->dimension_length_min, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->dimension_width_min, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->value_size_opening_min, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->value_size_depth_min, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->patch_length_os_min, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->patch_length_ds_min, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->patch_width_os_min, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->patch_width_ds_min, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->bag_weight_min, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->mesh_length_min, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->mesh_weight_min, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->breaking_length_min, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->breaking_length_elongation_min, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->breaking_width_min, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->breaking_width_elongation_min, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->patch_strength_os_min, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->patch_strength_ds_min, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;"><strong>T. wt</strong></td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->bale_weight_less?$finalValue->bale_weight_less:0, 2)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;"></td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;"></td>
                        </tr>
                        <tr>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;"><strong>MAX</strong></td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->dimension_length_max, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->dimension_width_max, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->value_size_opening_max, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->value_size_depth_max, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->patch_length_os_max, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->patch_length_ds_max, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->patch_width_os_max, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->patch_width_ds_max, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->bag_weight_max, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->mesh_length_max, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->mesh_weight_max, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->breaking_length_max, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->breaking_length_elongation_max, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->breaking_width_max, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->breaking_width_elongation_max, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->patch_strength_os_max, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{round($finalValue->patch_strength_ds_max, 1)}}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;"><strong>N. wt</strong></td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;">{{ round(isset($finalValue->bale_weight_less) ? $finalValue->bale_weight_wt - $finalValue->bale_weight_less : $finalValue->bale_weight_wt, 2) }}</td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;"></td>
                            <td style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all; text-align:center;"></td>
                        </tr>
                        <tr>
                            <td colspan="24" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all;">
                                <strong>REMARKS:</strong>
                                pp (715x510,100x220mm)78gm 42x42 perdm full yellow colour Fabric BIRLA SMART ADVANCE COMPOSITE TRADE BRAND "-50Kg packing capacity..
                                <br>Mrp-Blank, W.M.Y. is blank
                            </td>
                        </tr>
                        <tr>
                            <td colspan="23" style="border-right: 1px solid #000000;border-bottom: 1px solid #000000; font-size:22px; padding:5px; word-break:break-all;">
                                <div class="container-fluid">
                                    <table style="width: 100%">
                                        <tr>
                                            <td style="font-size:22px; padding:5px; width:50%"> 
                                                <p class="text-left">{{$job->VendorData->name}}</p>
                                                <label>(Vendor&apos;s Representative Signature with Stamp)</label>
                                            </td>
                                            <td style="font-size:22px; padding:5px; text-align:right"><p>Inspector Name: {{$job->InspectorData->name}}</p></td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </table>
                @endif
            </div>
        </div>
        
    </div>
</body>
</html>