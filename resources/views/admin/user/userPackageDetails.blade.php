{{-- {{$data}} --}}

@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
@php
    $package_type = isset($_GET['package']) ? $_GET['package'] : "buyer";
@endphp
<div class="inner-content">
    <div class="page-tabs-row">
        <ul class="nav nav-tabs watchlist-tabs" id="productsServicesTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link {{$package_type=='buyer'?"active":""}}" id="buyers-tab" data-bs-toggle="tab" data-bs-target="#buyers" type="button" role="tab" aria-controls="buyers" aria-selected="true">Buyer</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link {{$package_type=='seller'?"active":""}}" id="sellers-tab" data-bs-toggle="tab" data-bs-target="#sellers" type="button" role="tab" aria-controls="sellers" aria-selected="false">Seller</button>
            </li>
        </ul>
    </div>
    <div class="tab-content report-table-box">
         <div class="tab-pane fade {{$package_type=='buyer'?"show active":""}}" id="buyers" role="tabpanel" aria-labelledby="buyers-tab" tabindex="0">
            <div class="heading-row">
                <h3>User Buyer Package  History</h3>
                <div class="d-flex">  
                    <a href="{{route('admin.user.index')}}" class="btn btn-primary btn-sm">
                        <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                        Back 
                    </a>            
                </div>
            </div>


            <table class="table">
                <thead>
                    <tr class="align-middle">
                        <th>SL.</th>
                        <th>Package Name</th>
                        <th>Duration</th>
                        <th>Amount</th>
                        <th>Package Credit unit</th>
                        <th>Start date</th>
                        <th>Expiry date</th>

                    </tr>
                </thead>
                <tbody class="align-middle">
                    @if($buyer_currernt_package)
                    <tr>
                        <td> {{ '#' }}</td>
                        <td> {{ $buyer_currernt_package->package_data ? $buyer_currernt_package->package_data->package_name :"" }}</td>      
                        <td> {{ $buyer_currernt_package->package_duration}} Months</td>         
                        <td> {{ $buyer_currernt_package->purchase_amount }}</td>      
                        <td> {{ $buyer_currernt_package->monthly_credit }}</td>    
                        <td>{{date("d-m-Y",strtotime($buyer_currernt_package->created_at))}}</td>
                        <td>{{date("d-m-Y",strtotime($buyer_currernt_package->expiry_date))}}</td>
                    </tr>
                    @endif
                    <tr class="bg-primary text-white">
                        <td colspan="100%" class="text-center">User old Buyer Package</td>
                    </tr>
                    @forelse ($buyer_old_package as $key =>$item)
                    @php
                        $seller_Package = App\Models\SellerPackage::where('id',$item->package_Id)->first();
                    @endphp
             
                    <tr>
                        <td> {{ $loop->index+1 }}</td>
                        <td> {{ $seller_Package->package_name}}</td>      
                        <td> {{ $item->package_duration }}</td>      
                        <td> {{ $item->package_amount }}</td>      
                        <td> {{ $item->package_credit }}</td>     
                        <td>{{date("d-m-Y",strtotime($item->purchase_date))}}</td>
                        <td>{{date("d-m-Y",strtotime($item->expiry_date))}}</td>
                        
                    </tr>
                    @empty
                    <tr>
                        <td colspan="100%" class="text-center">No records found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
         </div>
         <div class="tab-pane fade {{$package_type=='seller'?"show active":""}}" id="sellers" role="tabpanel" aria-labelledby="sellers-tab" tabindex="0">
            <div class="heading-row">
                <h3>User Seller Package  History</h3>
                <div class="d-flex">  
                    <a href="{{route('admin.user.index')}}" class="btn btn-primary btn-sm">
                        <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                        Back 
                    </a>            
                </div>
            </div>


            <table class="table">
                <thead>
                    <tr class="align-middle">
                        <th>SL.</th>
                        <th>Package Name</th>
                        <th>Duration</th>
                        <th>Amount</th>
                        <th>Monthly Credit unit</th>
                        <th>Start date</th>
                        <th>Expiry date</th>

                    </tr>
                </thead>
                <tbody class="align-middle">
                    @if($seller_currernt_package)
                    <tr>
                        <td> {{ '#' }}</td>
                        <td> {{ $seller_currernt_package->getPackageDetails ? $seller_currernt_package->getPackageDetails->package_name :"" }}</td>      
                        <td> {{ $seller_currernt_package->package_duration}} Months</td>         
                        <td> {{ $seller_currernt_package->purchase_amount }}</td>      
                        <td> {{ $seller_currernt_package->monthly_credit }}</td>    
                        <td>{{date("d-m-Y",strtotime($seller_currernt_package->created_at))}}</td>
                        <td>{{date("d-m-Y",strtotime($seller_currernt_package->expiry_date))}}</td>
                    </tr>
                    @endif
                    <tr class="bg-primary text-white">
                        <td colspan="100%" class="text-center">User old Seller Package</td>
                    </tr>
                    @forelse ($seller_old_package as $key =>$item)
                    @php
                        $seller_Package = App\Models\SellerPackage::where('id',$item->package_id)->first();
                    @endphp
                    <tr>
                        <td> {{ $loop->index+1 }}</td>
                        <td> {{ $seller_Package->package_name}}</td>      
                        <td> {{ $item->package_duration }}</td>      
                        <td> {{ $item->purchase_amount }}</td>      
                        <td> {{ $item->monthly_credit }}</td>     
                        <td>{{date("d-m-Y",strtotime($item->purchase_date))}}</td>
                        <td>{{date("d-m-Y",strtotime($item->expiry_date))}}</td>
                        
                    </tr>
                    @empty
                    <tr>
                        <td colspan="100%" class="text-center">No records found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
         </div>
    </div>
</div>
@endsection
@push('scripts')
{{-- <script>
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
</script> --}}
@endpush