@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<style>
    .package_dimension input{
        cursor: pointer;
    }
    .info-table tr:nth-last-child(2) td {
        text-align: center !important;
    }
    input[type="number"] {
        color: #0063c0;
    }
</style>
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row mb-2">
            <h3>{{$client->name}}</h3>
            <a href="{{route('admin.field.index')}}" class="btn btn-danger btn-sm">
                <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                Back 
            </a>
        </div>
        @foreach ($data as $key =>$item)
        <div class="row">
            <div class="col-12 dimension_table">
                <div class="info-table info-table-holder">
                    <label for="">{{$item->PackageData->name}}</label>
                    @if($item->package_id==1)
                        <div class="table-responsive-xxl mt-2">
                            <table class="mb-4">
                                <tbody>
                                    <tr>
                                        <td rowspan="2" colspan="2">SL. NO.</td>
                                        <td colspan="2">DIMENSION(MM)</td>
                                        <td colspan="2">VALVE SIZE(MM)</td>
                                        <td colspan="2">PATCH LENGTH(MM)</td>
                                        <td colspan="2">PATCH WIDTH(MM)</td>
                                        <td rowspan="2">BAG WEIGHT (GMS)</td>
                                        <td colspan="2">MESH/DM</td>
                                        <td colspan="4">BREAKING STRENGTH (KGF/N)</td>
                                        <td colspan="2">PATCH STRENGTH  (KGF/N)</td>
                                        <td colspan="2">BALE WEIGHT(KGS)</td>
                                        <td rowspan="2">AIR PERMIABILTY(Nm/Hr@50mbar)</td>
                                        <td rowspan="2">ASH CONTENT(%)</td>
                                    </tr>
                                    <tr>
                                        <td>LENGTH WAY</td>
                                        <td>WIDTH WAY</td>
                                        <td>LENGTH</td>
                                        <td>WIDTH</td>
                                        <td>OS</td>
                                        <td>DS</td>
                                        <td>OS</td>
                                        <td>DS</td>
                                        <td>LENGTH WAY</td>
                                        <td>WIDTH WAY</td>
                                        <td>LENGTH WAY</td>
                                        <td>ELONGATION %</td>
                                        <td>WIDTH WAY</td>
                                        <td>ELONGATION %</td>
                                        <td>OS</td>
                                        <td>DS</td>
                                        <td>SL. NO.</td>
                                        <td>WT.</td>
                                    </tr>
                                    <tr class="package_dimension">
                                        <td colspan="2"><strong>Required</strong></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="dimension_length" name="dimension_length" {{$item->dimension_length==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="dimension_width" name="dimension_width" {{$item->dimension_width==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="value_size_opening" name="value_size_opening" {{$item->value_size_opening==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="value_size_depth" name="value_size_depth" {{$item->value_size_depth==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="patch_length_os" name="patch_length_os" {{$item->patch_length_os==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="patch_length_ds" name="patch_length_ds" {{$item->patch_length_ds==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="patch_width_os" name="patch_width_os" {{$item->patch_width_os==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="patch_width_ds" name="patch_width_ds" {{$item->patch_width_ds==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="bag_weight" name="bag_weight" {{$item->bag_weight==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value=mesh_length"" name="mesh_length" {{$item->mesh_length==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="mesh_weight" name="mesh_weight" {{$item->mesh_weight==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="breaking_length" name="breaking_length" {{$item->breaking_length==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="breaking_length_elongation" name="breaking_length_elongation" {{$item->breaking_length_elongation==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="breaking_width" name="breaking_width" {{$item->breaking_width==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="breaking_width_elongation" name="breaking_width_elongation" {{$item->breaking_width_elongation==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="patch_strength_os" name="patch_strength_os" {{$item->patch_strength_os==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="patch_strength_ds" name="patch_strength_ds" {{$item->patch_strength_ds==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="bale_weight_sl" name="bale_weight_sl" {{$item->bale_weight_sl==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="bale_weight_wt" name="bale_weight_wt" {{$item->bale_weight_wt==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="air_permiabilty" name="air_permiabilty" {{$item->air_permiabilty==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="ash_content" name="ash_content" {{$item->ash_content==1?"checked":""}}></td>
                                    </tr>
                                    <tr class="d-none">
                                        <td colspan="22"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="table-responsive-xxl mt-2">
                            <table class="mb-4">
                                <tbody>
                                    <tr>
                                        <td rowspan="2" colspan="2">SL. NO.</td>
                                        <td colspan="2">DIMENSION(MM)</td>
                                        <td colspan="2">VALVE SIZE(MM)</td>
                                        <td rowspan="2">BAG WEIGHT (GMS)</td>
                                        <td rowspan="2">NO. OF STITCHING /DM</td>
                                        <td colspan="2">MESH/INCH/DM</td>
                                        <td colspan="2">FOLDING (MM)</td>
                                        <td rowspan="2">TAPE WIDTH (MM)</td>
                                        <td colspan="4">BREAKING STRENGTH KGF/N (FABRIC)</td>
                                        <td colspan="2">SEAM STRENGTH(KGF/N)</td>
                                        <td colspan="2">BELL WT.</td>
                                        <td rowspan="2">ASH CONTENT(%)</td>
                                    </tr>
                                    <tr>
                                        <td>LENGTH WAY</td>
                                        <td>WIDTH WAY</td>
                                        <td>OPENING</td>
                                        <td>DEPTH</td>
                                        <td>LENGTH WAY</td>
                                        <td>WIDTH WAY</td>
                                        <td>TOP</td>
                                        <td>BOTTOM</td>
                                        <td>LENGTH WAY</td>
                                        <td>ELONGATION %</td>
                                        <td>WIDTH WAY</td>
                                        <td>ELONGATION %</td>
                                        <td>TOP</td>
                                        <td>BOTTOM</td>
                                        <td>SL. NO.</td>
                                        <td>KGS.</td>
                                    </tr>
                                    <tr class="package_dimension">
                                        <td colspan="2"><strong>Required</strong></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="dimension_length" name="dimension_length" {{$item->dimension_length==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="dimension_width" name="dimension_width" {{$item->dimension_width==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="value_size_opening" name="value_size_opening" {{$item->value_size_opening==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="value_size_depth" name="value_size_depth" {{$item->value_size_depth==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="bag_weight" name="bag_weight" {{$item->bag_weight==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="stitching_dm" name="stitching_dm" {{$item->stitching_dm==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="mesh_length" name="mesh_length" {{$item->mesh_length==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="mesh_weight" name="mesh_weight" {{$item->mesh_weight==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="folding_top" name="folding_top" {{$item->folding_top==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="folding_bottom" name="folding_bottom" {{$item->folding_bottom==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="tape_width" name="tape_width" {{$item->tape_width==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="breaking_length" name="breaking_length" {{$item->breaking_length==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="breaking_length_elongation" name="breaking_length_elongation" {{$item->breaking_length_elongation==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="breaking_width" name="breaking_width" {{$item->breaking_width==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="breaking_width_elongation" name="breaking_width_elongation" {{$item->breaking_width_elongation==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="seam_top" name="seam_top" {{$item->seam_top==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="seam_bottom" name="seam_bottom" {{$item->seam_bottom==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="struss_sl" name="struss_sl" {{$item->struss_sl==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="struss_kgs" name="struss_kgs" {{$item->struss_kgs==1?"checked":""}}></td>
                                        <td><input type="checkbox" onchange="myFunction(event, {{$item->id}})" value="ash_content" name="ash_content" {{$item->ash_content==1?"checked":""}}></td>
                                    </tr>
                                    <tr class="d-none">
                                        <td colspan="22"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-12">
                <div class="form-wrap">
                    <input type="hidden" id="field_id{{$item->id}}" value="{{$item->id}}">
                </div>
            </div>
            @foreach ($RequiredValue as $key => $Fitem)
                @if($Fitem->package_id==$item->package_id)
                    @if($Fitem->package_id==1)
                        <div class="col-12 dimension_table">
                            <form action="{{route('admin.field.value.store')}}" method="POST" id="Required{{$key+1}}">
                                @csrf
                                <div class="info-table info-table-holder">
                                    <label for="">Required Values <span class="text-danger">({{$item->PackageData->name}} )</span></label>
                                    <div class="table-responsive-xxl mt-2">
                                        <table class="mb-4">
                                            <tbody>
                                                <tr>
                                                    <td rowspan="2" colspan="2">SL. NO.</td>
                                                    <td colspan="4">DIMENSION(MM)</td>
                                                    <td colspan="4">VALVE SIZE(MM)</td>
                                                    <td colspan="4">PATCH LENGTH(MM)</td>
                                                    <td colspan="4">PATCH WIDTH(MM)</td>
                                                    <td rowspan="2" colspan="2">BAG WEIGHT (GMS)</td>
                                                    <td colspan="4">MESH/DM</td>
                                                    <td colspan="8">BREAKING STRENGTH KGF/N</td>
                                                    <td colspan="4">PATCH STRENGTH (KGF/N)</td>
                                                    <td colspan="4">BALE WEIGHT(KGS)</td>
                                                    <td rowspan="2" colspan="2">AIR PERMIABILTY(Nm/Hr@50mbar)</td>
                                                    <td rowspan="2" colspan="2">ASH CONTENT(%)</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">LENGTH WAY</td>
                                                    <td colspan="2">WIDTH WAY</td>
                                                    <td colspan="2">LENGTH</td>
                                                    <td colspan="2">WIDTH</td>
                                                    <td colspan="2">OS</td>
                                                    <td colspan="2">DS</td>
                                                    <td colspan="2">OS</td>
                                                    <td colspan="2">DS</td>
                                                    <td colspan="2">LENGTH WAY</td>
                                                    <td colspan="2">WIDTH WAY</td>
                                                    <td colspan="2">LENGTH WAY</td>
                                                    <td colspan="2">ELONGATION %</td>
                                                    <td colspan="2">WIDTH WAY</td>
                                                    <td colspan="2">ELONGATION %</td>
                                                    <td colspan="2">OS</td>
                                                    <td colspan="2">DS</td>
                                                    <td colspan="2">SL. NO.</td>
                                                    <td colspan="2">WT.</td>
                                                </tr>
                                                @foreach ($RequiredTextValues as $item)
                                                    @if($item->package_id==1)
                                                    <input type="hidden" name="text_field_id" value="{{$item->id}}">
                                                        <tr class="package_dimension">
                                                            <td colspan="2"><strong>Text</strong></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="dimension_length_text" value="{{$item->dimension_length_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="dimension_width_text" value="{{$item->dimension_width_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="value_size_opening_text" value="{{$item->value_size_opening_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="value_size_depth_text" value="{{$item->value_size_depth_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="patch_length_os_text" value="{{$item->patch_length_os_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="patch_length_ds_text" value="{{$item->patch_length_ds_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="patch_width_os_text" value="{{$item->patch_width_os_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="patch_width_ds_text" value="{{$item->patch_width_ds_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="bag_weight_text" value="{{$item->bag_weight_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="mesh_length_text" value="{{$item->mesh_length_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="mesh_weight_text" value="{{$item->mesh_weight_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="breaking_length_text" value="{{$item->breaking_length_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="breaking_length_elongation_text" value="{{$item->breaking_length_elongation_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="breaking_width_text" value="{{$item->breaking_width_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="breaking_width_elongation_text" value="{{$item->breaking_width_elongation_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="patch_strength_os_text" value="{{$item->seam_top_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="patch_strength_ds_text" value="{{$item->seam_bottom_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="bale_weight_sl_text" value="{{$item->bale_weight_sl_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="bale_weight_wt_text" value="{{$item->bale_weight_wt_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="air_permiabilty_text" value="{{$item->air_permiabilty_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="ash_content_text" value="{{$item->ash_content_text}}"></td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                
                                                <tr class="package_dimension">
                                                    <td colspan="2"><strong>Required</strong></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="dimension_length" value="{{$Fitem->dimension_length}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="dimension_width" value="{{$Fitem->dimension_width}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="value_size_opening" value="{{$Fitem->value_size_opening}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="value_size_depth" value="{{$Fitem->value_size_depth}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="patch_length_os" value="{{$Fitem->patch_length_os}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="patch_length_ds" value="{{$Fitem->patch_length_ds}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="patch_width_os" value="{{$Fitem->patch_width_os}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="patch_width_ds" value="{{$Fitem->patch_width_ds}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="bag_weight" value="{{$Fitem->bag_weight}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="mesh_length" value="{{$Fitem->mesh_length}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="mesh_weight" value="{{$Fitem->mesh_weight}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="breaking_length" value="{{$Fitem->breaking_length}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="breaking_length_elongation" value="{{$Fitem->breaking_length_elongation}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="breaking_width" value="{{$Fitem->breaking_width}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="breaking_width_elongation" value="{{$Fitem->breaking_width_elongation}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="patch_strength_os" value="{{$Fitem->seam_top}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="patch_strength_ds" value="{{$Fitem->seam_bottom}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="bale_weight_sl" value="{{$Fitem->bale_weight_sl}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="bale_weight_wt" value="{{$Fitem->bale_weight_wt}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="air_permiabilty" value="{{$Fitem->air_permiabilty}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="ash_content" value="{{$Fitem->ash_content}}"></td>
                                                </tr>
                                                <tr class="package_dimension">
                                                    <td colspan="2"><strong>+/-</strong></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="dimension_length_plus" value="{{$Fitem->dimension_length_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="dimension_length_minus" value="{{$Fitem->dimension_length_minus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="dimension_width_plus" value="{{$Fitem->dimension_width_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="dimension_width_minus" value="{{$Fitem->dimension_width_minus}}"></div></td>

                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="value_size_opening_plus" value="{{$Fitem->value_size_opening_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="value_size_opening_minus" value="{{$Fitem->value_size_opening_minus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="value_size_depth_plus" value="{{$Fitem->value_size_depth_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="value_size_depth_minus" value="{{$Fitem->value_size_depth_minus}}"></div></td>

                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="patch_length_os_plus" value="{{$Fitem->patch_length_os_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="patch_length_os_minus" value="{{$Fitem->patch_length_os_minus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="patch_length_ds_plus" value="{{$Fitem->patch_length_ds_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="patch_length_ds_minus" value="{{$Fitem->patch_length_ds_minus}}"></div></td>

                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="patch_width_os_plus" value="{{$Fitem->patch_width_os_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="patch_width_os_minus" value="{{$Fitem->patch_width_os_minus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="patch_width_ds_plus" value="{{$Fitem->patch_width_ds_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="patch_width_ds_minus" value="{{$Fitem->patch_width_ds_minus}}"></div></td>

                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="bag_weight_plus" value="{{$Fitem->bag_weight_plus}}"><iconify-icon icon="ic:round-percentage" class="mt-1"></iconify-icon></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="bag_weight_minus" value="{{$Fitem->bag_weight_minus}}"><iconify-icon icon="ic:round-percentage" class="mt-1"></iconify-icon></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="mesh_length_plus" value="{{$Fitem->mesh_length_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="mesh_length_minus" value="{{$Fitem->mesh_length_minus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="mesh_weight_plus" value="{{$Fitem->mesh_weight_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="mesh_weight_minus" value="{{$Fitem->mesh_weight_minus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="breaking_length_plus" value="{{$Fitem->breaking_length_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="breaking_length_minus" value="{{$Fitem->breaking_length_minus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="breaking_length_elongation_plus" value="{{$Fitem->breaking_length_elongation_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="breaking_length_elongation_minus" value="{{$Fitem->breaking_length_elongation_minus}}"><iconify-icon icon="ic:round-percentage" class="mt-1"></iconify-icon></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="breaking_width_plus" value="{{$Fitem->breaking_width_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="breaking_width_minus" value="{{$Fitem->breaking_width_minus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="breaking_width_elongation_plus" value="{{$Fitem->breaking_width_elongation_plus}}"><iconify-icon icon="ic:round-percentage" class="mt-1"></iconify-icon></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="breaking_width_elongation_minus" value="{{$Fitem->breaking_width_elongation_minus}}"></div></td>

                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="patch_strength_os_plus" value="{{$Fitem->patch_strength_os_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="patch_strength_os_minus" value="{{$Fitem->patch_strength_os_minus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="patch_strength_ds_plus" value="{{$Fitem->patch_strength_ds_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="patch_strength_ds_minus" value="{{$Fitem->patch_strength_ds_minus}}"></div></td>

                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="bale_weight_sl_plus" value="{{$Fitem->bale_weight_sl_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="bale_weight_sl_minus" value="{{$Fitem->bale_weight_sl_minus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="bale_weight_wt_plus" value="{{$Fitem->bale_weight_wt_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="bale_weight_wt_minus" value="{{$Fitem->bale_weight_wt_minus}}"></div></td>

                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="air_permiabilty_plus" value="{{$Fitem->air_permiabilty_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="air_permiabilty_minus" value="{{$Fitem->air_permiabilty_minus}}"></div></td>

                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="ash_content_plus" value="{{$Fitem->ash_content_plus}}"><iconify-icon icon="ic:round-percentage" class="mt-1"></iconify-icon></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="ash_content_minus" value="{{$Fitem->ash_content_minus}}"><iconify-icon icon="ic:round-percentage" class="mt-1"></iconify-icon></div></td>
                                                </tr>
                                                <tr class="d-none">
                                                    <td colspan="22"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-wrap my-2">
                                        <input type="hidden" name="id" value="{{$Fitem->id}}">
                                        <input type="submit" onclick="StitchableForm()" value="Update" class="btn btn-save ms-auto">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-12">
                            <p>Grades <span class="text-danger">({{$item->PackageData->name}} )</span></p>
                            <table class="w-50">
                                <form action="{{route('admin.field.grade.update')}}" method="POST">
                                    @csrf
                                    @foreach ($AllGradeData as $item)
                                        @if($item->package_id==1)
                                            <tr>
                                                <td>{{$item->field_name}}</td>
                                                <td>
                                                    <input type="hidden" name="id[]" value="{{$item->id}}">
                                                    <input type="text" class="form-coltrol" name="field_value[]" value="{{$item->field_value}}">
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    <input type="submit" value="Update Grade" class="btn btn-save ms-auto">
                                </form>
                            </table>
                        </div>
                    @else
                        <div class="col-12 dimension_table">
                            <form action="{{route('admin.field.value.store')}}" method="POST" id="Required{{$key+1}}">
                                @csrf
                                <div class="info-table info-table-holder">
                                    <label for="">Required Values <span class="text-danger">({{$item->PackageData->name}} )</span></label>
                                    <div class="table-responsive-xxl mt-2">
                                        <table class="mb-4">
                                            <tbody>
                                                <tr>
                                                    <td rowspan="2" colspan="2">SL. NO.</td>
                                                    <td colspan="4">DIMENSION(MM)</td>
                                                    <td colspan="4">VALVE SIZE(MM)</td>
                                                    <td rowspan="2" colspan="2">BAG WEIGHT (GMS)</td>
                                                    <td rowspan="2" colspan="2">NO. OF STITCHING /DM</td>
                                                    <td colspan="4">MESH/INCH/DM</td>
                                                    <td colspan="4">FOLDING (MM)</td>
                                                    <td rowspan="2" colspan="2">TAPE WIDTH (MM)</td>
                                                    <td colspan="8">BREAKING STRENGTH KGF/N (FABRIC)</td>
                                                    <td colspan="4">SEAM STRENGTH(KGF/N)</td>
                                                    <td colspan="4">BELL WT.</td>
                                                    <td rowspan="2" colspan="2">ASH CONTENT(%)</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">LENGTH WAY</td>
                                                    <td colspan="2">WIDTH WAY</td>
                                                    <td colspan="2">OPENING</td>
                                                    <td colspan="2">DEPTH</td>
                                                    <td colspan="2">LENGTH WAY</td>
                                                    <td colspan="2">WIDTH WAY</td>
                                                    <td colspan="2">TOP</td>
                                                    <td colspan="2">BOTTOM</td>
                                                    <td colspan="2">LENGTH WAY</td>
                                                    <td colspan="2">ELONGATION %</td>
                                                    <td colspan="2">WIDTH WAY</td>
                                                    <td colspan="2">ELONGATION %</td>
                                                    <td colspan="2">TOP</td>
                                                    <td colspan="2">BOTTOM</td>
                                                    <td colspan="2">SL. NO.</td>
                                                    <td colspan="2">KGS.</td>
                                                </tr>
                                                @foreach ($RequiredTextValues as $item)
                                                    @if($item->package_id==2)
                                                    <input type="hidden" name="text_field_id" value="{{$item->id}}">
                                                        <tr class="package_dimension">
                                                            <td colspan="2"><strong>Text</strong></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="dimension_length_text" value="{{$item->dimension_length_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="dimension_width_text" value="{{$item->dimension_width_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="value_size_opening_text" value="{{$item->value_size_opening_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="value_size_depth_text" value="{{$item->value_size_depth_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="bag_weight_text" value="{{$item->bag_weight_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="stitching_dm_text" value="{{$item->stitching_dm_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="mesh_length_text" value="{{$item->mesh_length_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="mesh_weight_text" value="{{$item->mesh_weight_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="folding_top_text" value="{{$item->folding_top_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="folding_bottom_text" value="{{$item->folding_bottom_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="tape_width_text" value="{{$item->tape_width_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="breaking_length_text" value="{{$item->breaking_length_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="breaking_length_elongation_text" value="{{$item->breaking_length_elongation_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="breaking_width_text" value="{{$item->breaking_width_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="breaking_width_elongation_text" value="{{$item->breaking_width_elongation_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="seam_top_text" value="{{$item->seam_top_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="seam_bottom_text" value="{{$item->seam_bottom_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="struss_sl_text" value="{{$item->struss_sl_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="struss_kgs_text" value="{{$item->struss_kgs_text}}"></td>
                                                            <td colspan="2"><input type="text" class="input_field" name="ash_content_text" value="{{$item->ash_content_text}}"></td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                <tr class="package_dimension">
                                                    <td colspan="2"><strong>Required</strong></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="dimension_length" value="{{$Fitem->dimension_length}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="dimension_width" value="{{$Fitem->dimension_width}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="value_size_opening" value="{{$Fitem->value_size_opening}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="value_size_depth" value="{{$Fitem->value_size_depth}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="bag_weight" value="{{$Fitem->bag_weight}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="stitching_dm" value="{{$Fitem->stitching_dm}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="mesh_length" value="{{$Fitem->mesh_length}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="mesh_weight" value="{{$Fitem->mesh_weight}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="folding_top" value="{{$Fitem->folding_top}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="folding_bottom" value="{{$Fitem->folding_bottom}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="tape_width" value="{{$Fitem->tape_width}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="breaking_length" value="{{$Fitem->breaking_length}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="breaking_length_elongation" value="{{$Fitem->breaking_length_elongation}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="breaking_width" value="{{$Fitem->breaking_width}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="breaking_width_elongation" value="{{$Fitem->breaking_width_elongation}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="seam_top" value="{{$Fitem->seam_top}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="seam_bottom" value="{{$Fitem->seam_bottom}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="struss_sl" value="{{$Fitem->struss_sl}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="struss_kgs" value="{{$Fitem->struss_kgs}}"></td>
                                                    <td colspan="2"><input type="number" class="input_field" name="ash_content" value="{{$Fitem->ash_content}}"></td>
                                                </tr>
                                                <tr class="package_dimension">
                                                    <td colspan="2"><strong>+/-</strong></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="dimension_length_plus" value="{{$Fitem->dimension_length_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="dimension_length_minus" value="{{$Fitem->dimension_length_minus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="dimension_width_plus" value="{{$Fitem->dimension_width_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="dimension_width_minus" value="{{$Fitem->dimension_width_minus}}"></div></td>

                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="value_size_opening_plus" value="{{$Fitem->value_size_opening_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="value_size_opening_minus" value="{{$Fitem->value_size_opening_minus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="value_size_depth_plus" value="{{$Fitem->value_size_depth_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="value_size_depth_minus" value="{{$Fitem->value_size_depth_minus}}"></div></td>

                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="bag_weight_plus" value="{{$Fitem->bag_weight_plus}}"><iconify-icon icon="ic:round-percentage" class="mt-1"></iconify-icon></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="bag_weight_minus" value="{{$Fitem->bag_weight_minus}}"><iconify-icon icon="ic:round-percentage" class="mt-1"></iconify-icon></div></td>

                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="stitching_dm_plus" value="{{$Fitem->stitching_dm_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="stitching_dm_minus" value="{{$Fitem->stitching_dm_minus}}"></div></td>
                                                    
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="mesh_length_plus" value="{{$Fitem->mesh_length_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="mesh_length_minus" value="{{$Fitem->mesh_weight_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="mesh_weight_plus" value="{{$Fitem->mesh_weight_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="mesh_weight_minus" value="{{$Fitem->mesh_weight_minus}}"></div></td>

                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="folding_top_plus" value="{{$Fitem->folding_top_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="folding_top_minus" value="{{$Fitem->folding_top_minus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="folding_bottom_plus" value="{{$Fitem->folding_bottom_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="folding_bottom_minus" value="{{$Fitem->folding_bottom_minus}}"></div></td>   

                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="tape_width_plus" value="{{$Fitem->tape_width_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="tape_width_minus" value="{{$Fitem->tape_width_minus}}"></div></td>

                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="breaking_length_plus" value="{{$Fitem->breaking_length_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="breaking_length_minus" value="{{$Fitem->breaking_length_minus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="breaking_length_elongation_plus" value="{{$Fitem->breaking_length_elongation_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="breaking_length_elongation_minus" value="{{$Fitem->breaking_length_elongation_minus}}"><iconify-icon icon="ic:round-percentage" class="mt-1"></iconify-icon></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="breaking_width_plus" value="{{$Fitem->breaking_width_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="breaking_width_minus" value="{{$Fitem->breaking_width_minus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="breaking_width_elongation_plus" value="{{$Fitem->breaking_width_elongation_plus}}"><iconify-icon icon="ic:round-percentage" class="mt-1"></iconify-icon></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="breaking_width_elongation_minus" value="{{$Fitem->breaking_width_elongation_minus}}"></div></td>

                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="seam_top_plus" value="{{$Fitem->seam_top_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="seam_top_minus" value="{{$Fitem->seam_top_minus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="seam_bottom_plus" value="{{$Fitem->seam_bottom_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="seam_bottom_minus" value="{{$Fitem->seam_bottom_minus}}"></div></td>

                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="struss_sl_plus" value="{{$Fitem->struss_sl_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="struss_sl_minus" value="{{$Fitem->struss_sl_minus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="struss_kgs_plus" value="{{$Fitem->struss_kgs_plus}}"></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="struss_kgs_minus" value="{{$Fitem->struss_kgs_minus}}"></div></td>

                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="ic:outline-plus" class="mt-1"></iconify-icon><input type="number" name="ash_content_plus" value="{{$Fitem->ash_content_plus}}"><iconify-icon icon="ic:round-percentage" class="mt-1"></iconify-icon></div></td>
                                                    <td><div class="d-flex font-weight-bold"><iconify-icon icon="lucide:minus" class="mt-1"></iconify-icon><input type="number" name="ash_content_minus" value="{{$Fitem->ash_content_minus}}"><iconify-icon icon="ic:round-percentage" class="mt-1"></iconify-icon></div></td>
                                                </tr>
                                                <tr class="d-none">
                                                    <td colspan="22"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-wrap my-2">
                                        <input type="hidden" name="id" value="{{$Fitem->id}}">
                                        <input type="submit" onclick="NonStitchableForm()" value="Update" class="btn btn-save ms-auto">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-12">
                            <p>Grades <span class="text-danger">({{$item->PackageData->name}} )</span></p>
                                <table class="w-50">
                                <form action="{{route('admin.field.grade.update')}}" method="POST">
                                        @csrf
                                    @foreach ($AllGradeData as $item)
                                        @if($item->package_id==2)
                                            <tr>
                                                <td>{{$item->field_name}}</td>
                                                <td>
                                                    <input type="hidden" name="id[]" value="{{$item->id}}">
                                                    <input type="text" class="form-coltrol" name="field_value[]" value="{{$item->field_value}}">
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    <input type="submit" value="Update Grade" class="btn btn-save ms-auto">
                                </form>
                            </table>
                        </div>
                     @endif
                @endif
            @endforeach
        </div>
        
        @endforeach
    </div>
</div>
@endsection
@push('scripts')
<script>
    function NonStitchableForm() {
        // Get the form element by ID
        var form = document.getElementById("Required1");
        // Submit the form
        form.submit();
    }
    function StitchableForm() {
        // Get the form element by ID
        var form = document.getElementById("Required2");
        // Submit the form
        form.submit();
    }
  function myFunction(event, field_id) {
    var value = $(event.target).val(); 
        $.ajax({
            url: "{{route('admin.field.store')}}",
            type: 'GET',
            data: {
                'field_id': field_id,
                'value': value,
            },
            success: function(response) {
                console.log(response);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
</script>
@endpush