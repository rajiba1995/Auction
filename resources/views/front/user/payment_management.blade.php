@extends('front.layout.app')
@section('section')
@php
    $package_type = isset($_GET['package']) ? $_GET['package'] : "buyer";
@endphp
<div class="main">
    <div class="inner-page">

        <div class="profile-page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    @include('front.user.layout.sidebar')
                    <div class="col-xxl-9 col-xl-8 col-12 profile-right">
                        <div class="sidebar-toggler">
                            <span class="sidebar-opener" id="sidebarOpener">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M385.1 219.9 199.2 34c-20-20-52.3-20-72.3 0s-20 52.3 0 72.3L276.7 256 126.9 405.7c-20 20-20 52.3 0 72.3s52.3 20 72.3 0l185.9-185.9c19.9-19.9 19.9-52.3 0-72.2z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path></g></svg>
                            </span>
                        </div>
                        <div class="tab-panes-wrapper">
                            <div class="tab-content">
                                <div class="tab-content-wrapper">
                                    <div class="top-content-bar">
                                        <a href="{{ route('user.transaction')}}" class="btn btn-animated btn-yellow btn-cta btn-download">Transaction History</a>
                                        <!-- <a href="#" class="btn btn-animated btn-yellow btn-cta btn-download">Download Invoice</a> -->
                                    </div>
                                    <!-- <div class="m-2">
                                        @if (session('success'))
                                            <div class="alert alert-success" id="message_div">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="m-2">
                                        @if (session('error'))
                                            <div class="alert alert-danger" id="message_div">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="m-2">
                                        @if (session('warning'))
                                            <div class="alert alert-warning" id="message_div">
                                                {{ session('warning') }}
                                            </div>
                                        @endif
                                    </div> -->
                                    <div class="content-box bg-gray-1">
                                        <div class="inner">
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
                                            <div class="tab-content products-services-tab-content">
                                                <div class="tab-pane fade {{$package_type=='buyer'?"show active":""}}" id="buyers" role="tabpanel" aria-labelledby="buyers-tab" tabindex="0">
                                                    <h3 class="mb-4">Buyer Credit Packages</h3>
                                                    <div class="packages" >
                                                        <div class="row">
                                                            @foreach ($packages as $item)
                                                            <div class="col-xxl-3 col-md-6 col-12 package-col">
                                                                <div class="packages-card">
                                                                    <form method="post" action="{{ route('user.buyer_package_store') }}" id="buyer_package_form{{$item->id}}">
                                                                        @csrf
                                                                        <input type="hidden" name="package_id" value="{{$item->id}}">
                                                                        <input type="hidden" name="package_type" value="{{$item->type}}">
                                                                        <input type="hidden" name="package_amount" value="{{$item->package_price}}">
                                                                        <input type="hidden" name="package_duration" value="{{$item->package_duration}}">
                                                                        <input type="hidden" name="package_credit" value="{{$item->total_number_of_auction}}">
                                                                        <div class="card-header bg-gradient-free">
                                                                            <h4>{{$item->package_name}}</h4>
                                                                            <p>{{$item->rupees_prefix}} {{$item->package_price}} /{{$item->package_type}}</p>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <p>No. of credit : {{$item->total_number_of_auction}}</p>
                                                                            @if($item->type =="basic")
                                                                                <p>Cost per credit : "Free"</p>   
                                                                                {{-- <p>Application cost per credit:Included+Sms cost per credit:Included</p>  --}}
                                                                            @else                                                    
                                                                                <p>Cost per credit : {{$item->rupees_prefix}} {{$item->total_cost_per_auction}}</p>   
                                                                                {{-- <p>Application cost per credit({{$item->rupees_prefix}} {{$item->application_cost_per_auction}})+Sms cost per inquiry({{$item->rupees_prefix}} {{$item->sms_cost_per_auction}}) => {{$item->rupees_prefix}} {{$item->total_cost_per_auction}}</p>                                                  --}}
                                                                            @endif
                                                                            <p>Watchlist Added: {{$item->watchlist == 0 ? 'Yes':'No'}}</p>   
                                                                            <p>Supplier Suggestion: {{$item->supplier_vendor_suggestion == 0 ? 'Yes':'No'}}</p>   
                                                                            <p>Added Participants: {{$item->added_participant_per_credits}}/credit</p>   
                                                                            <p>Consultation: {{$item->consultation == 0 ? '1 meeting':'No'}}</p> 
                                                                            <p>Duration : {{$item->package_duration}} Months</p>  
                                                                        </div>
                                                                        <div class="card-footer bg-gradient-free">
                                                                            @if($my_cuttent_buyer_package)
                                                                                @if($my_cuttent_buyer_package->package_id==$item->id)
                                                                                    <button type="button" class="btn btn-animated btn-cta bg-free" data-bs-toggle="modal" data-bs-target="#view_seller_package{{$item->id}}">Current Plan</button>
                                                                                    <div class="modal fade all-quotes-modal" id="view_seller_package{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog modal-lg">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                                </div>
                                                                                                <div class="modal-body">
                                                                                                    <div class="table-responsive">
                                                                                                        <table class="table badges-data-table">
                                                                                                            <thead>
                                                                                                                <tr>
                                                                                                                    <th>Package</th>
                                                                                                                    <th>Duration</th>
                                                                                                                    <th>Expiry Date</th>
                                                                                                                </tr>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td>{{$item->package_name}}</td>
                                                                                                                    <td>{{$my_cuttent_buyer_package->package_duration}} Months</td>
                                                                                                                    <td>{{date("d-m-Y h:i a",strtotime($my_cuttent_buyer_package->expiry_date))}}</td>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @else
                                                                                    <input type="hidden" name="form_type" value="upgrade">
                                                                                    <button type="button" class="btn btn-animated btn-cta bg-free" onclick="upgrade_buyer_package({{$item->id}})">Upgrade Now</button>
                                                                                @endif
                                                                            @else
                                                                                <input type="hidden" name="form_type" value="new">
                                                                                <button type="button" class="btn btn-animated btn-cta bg-free" onclick="buy_buyer_package({{$item->id}})">Buy Now</button>
                                                                            @endif
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <!-- <div class="content-box bg-gray-1">
                                                        <div class="inner">
                                                            <h3 class="mb-4">Credit Usages As a Buyer</h3>
                                                            <div class="credit-charts">
                                                                <canvas id="buyer-creditChart" style="width:632px;height:632px;"></canvas>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                </div>

                                                <div class="tab-pane fade {{$package_type=='seller'?"show active":""}}" id="sellers" role="tabpanel" aria-labelledby="sellers-tab" tabindex="0">
                                                    <h3 class="mb-4">Seller Credit Packages</h3>
                                                    <div class="packages" style="color: red">
                                                        <div class="row">
                                                            @foreach ($seller_packages as $item)
                                                            <div class="col-xxl-3 col-md-6 col-12 package-col">
                                                                <div class="packages-card">
                                                                    <form method="post" action="{{ route('user.package_payment_management') }}" id="seller_package_form{{$item->id}}">
                                                                        @csrf
                                                                        <input type="hidden" name="package_id" value="{{$item->id}}">
                                                                        <input type="hidden" name="package_value" value="{{$item->package_price}}">
                                                                        <input type="hidden" name="package_duration" value="{{$item->package_duration}}">
                                                                        <input type="hidden" name="package_name" value="{{$item->package_name}}">
                                                                        <input type="hidden" name="monthly_credit" value="{{$item->credit}}">
                                                                        <div class="card-header bg-gradient-free">
                                                                            <h4>{{$item->package_name}}</h4>
                                                                            <p>{{$item->rupees_prefix}} {{$item->package_price}} / {{$item->package_type}}</p>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            @if($item->bid == 0)
                                                                                <p>Bid : Yes</p> 
                                                                            @else
                                                                                <p>Bid : No</p> 
                                                                            @endif
                                                                            <p>Credit : {{$item->credit}} /Months</p> 
                                                                            @if($item->badge == 0)
                                                                            <p>Badge : No-badge</p> 
                                                                            @elseif($item->badge == 1)
                                                                            <p>Badge : Featured Basic</p> 
                                                                            @elseif($item->badge == 2)
                                                                            <p>Badge : Featured Intermediate</p> 
                                                                            @elseif($item->badge == 3)
                                                                            <p>Badge : Featured Advance</p> 
                                                                            @endif  
                                                                            @if($item->group_watchlist_addition == 0)
                                                                            <p>Group Watchlisdt Addition : Yes</p> 
                                                                            @else
                                                                            <p>Group Watchlisdt Addition : No</p> 
                                                                            @endif 
                                                                            @if($item->consultation == 0)
                                                                            <p>Consultation : Yes</p> 
                                                                            @else
                                                                            <p>Consultation : No</p> 
                                                                            @endif 
                                                                            <p>Duration : {{$item->package_duration}} Months</p> 
                                                                        </div>
                                                                        <div class="card-footer bg-gradient-free">
                                                                            @if($my_cuttent_seller_package)
                                                                                @if($my_cuttent_seller_package->package_id==$item->id)
                                                                                    <button type="button" class="btn btn-animated btn-cta bg-free" data-bs-toggle="modal" data-bs-target="#view_currect_package{{$item->id}}">Current Plan</button>
                                                                                    <div class="modal fade all-quotes-modal" id="view_currect_package{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog modal-lg">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                                </div>
                                                                                                <div class="modal-body">
                                                                                                    <div class="table-responsive">
                                                                                                        <table class="table badges-data-table">
                                                                                                            <thead>
                                                                                                                <tr>
                                                                                                                    <th>Package</th>
                                                                                                                    <th>Monthly Credit</th>
                                                                                                                    <th>Next Credit Date</th>
                                                                                                                    <th>Expiry Date</th>
                                                                                                                </tr>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td>{{$item->package_name}}</td>
                                                                                                                    <td>{{$my_cuttent_seller_package->monthly_credit}}</td>
                                                                                                                    <td>{{date("d-m-Y",strtotime($my_cuttent_seller_package->next_credit_date))}}</td>
                                                                                                                    <td>{{date("d-m-Y h:i a",strtotime($my_cuttent_seller_package->expiry_date))}}</td>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @else
                                                                                    <input type="hidden" name="form_type" value="upgrade">
                                                                                    <button type="button" class="btn btn-animated btn-cta bg-free" onclick="upgrade_seller_package({{$item->id}})">Upgrade Now</button>
                                                                                @endif
                                                                            @else
                                                                                <input type="hidden" name="form_type" value="new">
                                                                                <button type="button" class="btn btn-animated btn-cta bg-free" onclick="buy_seller_package({{$item->id}})">Buy Now</button>
                                                                            @endif
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <!-- <div class="content-box bg-gray-1">
                                                        <div class="inner">
                                                            <h3>Credit Usages As a Seller</h3>
                                                            <div class="credit-charts">
                                                                <canvas id="seller-creditChart"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>                -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                
                                    <div class="content-box bg-gray-2">
                                        <div class="inner">
                                            <h3>Badges</h3>
                                            <div class="badges">
                                                <h5>My Badges</h5>
                                                <div class="table-responsive">
                                                    <table class="table badges-data-table">
                                                        <thead>
                                                            <tr>
                                                                <th>Badge Name</th>
                                                                <th>Descriptions</th>
                                                                <th>Instructions to get it</th>
                                                                <th>Expiry Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($myBadgesFullDetails as $item)
                                                            @if($item->getBadgeDetails)
                                                            <tr>
                                                                <td>
                                                                    <div class="badge">
                                                                        <div class="img">
                                                                            <img src="{{ asset($item->getBadgeDetails->logo) }}" width="30px" alt="">
                                                                        </div>
                                                                        <div class="name">
                                                                            @php
                                                                            $typeLabels = [
                                                                                0 => ['class' => 'color-verified', 'text' => ''],
                                                                                1 => ['class' => 'color-featured-basic', 'text' => 'Basic'],
                                                                                2 => ['class' => 'color-featured-intermediate', 'text' => 'Intermediate'],
                                                                                3 => ['class' => 'color-featured-advanced', 'text' => 'Advance']
                                                                            ];
                                                                        @endphp
                                                                        
                                                                        <label class="{{ $typeLabels[$item->getBadgeDetails->type]['class'] }}">
                                                                            {{ ucwords($item->getBadgeDetails->title) }}
                                                                        </label>
                                                                        
                                                                        @if ($typeLabels[$item->getBadgeDetails->type]['text'] !== '')
                                                                            <span>{{ $typeLabels[$item->getBadgeDetails->type]['text'] }}</span>
                                                                        @endif
                                                                        
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <p>
                                                                        {{$item->getBadgeDetails->short_desc}}
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p>
                                                                        {{$item->getBadgeDetails->long_desc}}
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                
                                                                    <p> 
                                                                        {{date('d-m-Y H:i:s A', strtotime($item->expiry_date))}}
                                                                        
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                            @endforeach
                                                           
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="badges">
                                                <h5>Paid Badges</h5>
                                                <div class="table-responsive">
                                                    <table class="table badges-data-table">
                                                        <thead>
                                                            <tr>
                                                                <th>Badge Name</th>
                                                                <th>Descriptions</th>
                                                                <th>Instructions to get it</th>
                                                                <th class="price-th">Validity</th>
                                                                <th class="price-th">Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($allBadges as $item)
                                                            <tr>
                                                                <td>
                                                                    <div class="badge">
                                                                        <div class="img">
                                                                            <img src="{{asset($item->logo) }}" alt="" width="50px">
                                                                        </div>
                                                                        <div class="name">
                                                                            @php
                                                                            $typeLabels = [
                                                                                1 => ['class' => 'color-featured-basic', 'text' => 'Basic'],
                                                                                2 => ['class' => 'color-featured-intermediate', 'text' => 'Intermediate'],
                                                                                3 => ['class' => 'color-featured-advanced', 'text' => 'Advance']
                                                                            ];
                                                                        @endphp
                                                                        
                                                                        <label class="{{ $typeLabels[$item->type]['class'] }}">{{ ucwords($item->title) }}</label>
                                                                        <span>{{ $typeLabels[$item->type]['text'] }}</span>
                                                                        
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <p>
                                                                        {{ Str::limit($item->short_desc,200) }}
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p>
                                                                        {{ Str::limit($item->long_desc,200) }}
                                                                    </p>
                                                                </td>
                                                                <td class="name"><label class="price-label">{{$item->duration}}</label></td>
                                                                <td class="price-td">
                                                                    <label class="price-label">{{ $item->price_prefix }} - {{ $item->price }}</label>
                                                                    <a href="#"  class="btn btn-animated btn-yellow btn-cta purchase" data-badge_id="{{$item->id}}" data-amount="{{ $item->price }}" data-duration="{{$item->duration}}" >Buy Now</a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
            $('.purchase').on("click", function() {
                var badge_id = $(this).data('badge_id');             // console.log(id); 
                var badge_amount = $(this).data('amount');             // console.log(id); 
                var badge_duration = $(this).data('duration');             // console.log(id); 
                Swal.fire({
                title: "Are you sure you want to purchase it??",
                // text: "Purchase this Badge?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Purchase it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var csrfToken = "{{csrf_token()}}";
                        $.ajax({
                            type: 'POST',
                            url: '{{ route("user.purchase.transaction") }}',
                            data: {
                                '_token' : csrfToken ,
                                'id' : badge_id,
                                'amount' : badge_amount,
                                'duration' : badge_duration,
                            },
                            success: function(response) {
                                if(response.status==200){
                                    Swal.fire({
                                        title: 'Success!',
                                        text: 'Your Badge Successfully Purchased.',
                                        icon: 'success',
                                    });
                                        location.reload();
                                }
                            },
                            // error: function(xhr, status, error) {
                            //     console.error(xhr.responseText);
                            // }
                        });
                    }
                });
            });

            function buy_seller_package(id){
                Swal.fire({
                title: "Are you sure you want to purchase it??",
                // text: "Purchase this Package?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Purchase it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                       $('#seller_package_form'+id).submit();
                    }
                });
            }
            function upgrade_seller_package(id){
                Swal.fire({
                title: "Are you sure you want to upgrade?",
                // text: "Purchase this Package?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, upgrade it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                       $('#seller_package_form'+id).submit();
                    }
                });
            }
            // For Buyer
            function buy_buyer_package(id){
                Swal.fire({
                title: "Are you sure you want to purchase it??",
                // text: "Purchase this Package?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Purchase it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                       $('#buyer_package_form'+id).submit();
                    }
                });
            }
            function upgrade_buyer_package(id){
                Swal.fire({
                title: "Are you sure you want to upgrade?",
                // text: "Purchase this Package?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, upgrade it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                       $('#buyer_package_form'+id).submit();
                    }
                });
            }
    
        
               
</script>

<script>
    $(document).ready(function() {

    const consumptionChart = new Chart(document.getElementById("buyer-creditChart"), {
        type: "pie",
            data: {
                labels: [
                    'Credits Left',
                    'Credits Used'
                ],
                datasets: [{
                    label: '',
                    data: [200, 300],
                    backgroundColor: [
                        '#30BA00',
                        '#D82C42'
                    ],
                    hoverOffset: 0,
                    borderWidth: 0,
                    maxHeight: 16,
                    maxHeight: 16
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            boxWidth: 16,
                            boxHeight: 16,
                            color: '#000000',
                            padding: 20,
                            font: {
                                family: "'Poppins', sans-serif",
                                weight: 400,
                                size: 12,
                                lineHeight: 1.5
                            }
                        }
                        
                    },
                    title: {
                        display: true,
                        text: 'Total Credits - 500',
                        color: '#000000',
                        font: {
                            size: 12,
                            weight: 600
                        },
                        position: 'right',
                    }
                },
            }
        });
    });
</script>
<script>
    $(document).ready(function() {

    const consumptionChart = new Chart(document.getElementById("seller-creditChart"), {
        type: "pie",
            data: {
                labels: [
                    'Credits Left',
                    'Credits Used'
                ],
                datasets: [{
                    label: '',
                    data: [100, 400],
                    backgroundColor: [
                        '#30BA00',
                        '#D82C42'
                    ],
                    hoverOffset: 0,
                    borderWidth: 0,
                    maxHeight: 16,
                    maxHeight: 16
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            boxWidth: 16,
                            boxHeight: 16,
                            color: '#000000',
                            padding: 20,
                            font: {
                                family: "'Poppins', sans-serif",
                                weight: 400,
                                size: 12,
                                lineHeight: 1.5
                            }
                        }
                        
                    },
                    title: {
                        display: true,
                        text: 'Total Credits - 500',
                        color: '#000000',
                        font: {
                            size: 12,
                            weight: 600
                        },
                        position: 'right',
                    }
                },
            }
        });
    });
</script>
@endsection

