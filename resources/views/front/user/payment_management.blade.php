@extends('front.layout.app')
@section('section')
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
                                        <a href="#" class="btn btn-animated btn-yellow btn-cta btn-download">Download Invoice</a>
                                    </div>
                                    <div class="m-2">
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
                                    <div class="content-box bg-gray-1">
                                        <div class="inner">
                                            <div class="page-tabs-row">
                                                <ul class="nav nav-tabs watchlist-tabs" id="productsServicesTab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link active" id="buyers-tab" data-bs-toggle="tab" data-bs-target="#buyers" type="button" role="tab" aria-controls="buyers" aria-selected="true">Buyer</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="sellers-tab" data-bs-toggle="tab" data-bs-target="#sellers" type="button" role="tab" aria-controls="sellers" aria-selected="false">Seller</button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-content products-services-tab-content">
                                                <div class="tab-pane fade show active" id="buyers" role="tabpanel" aria-labelledby="buyers-tab" tabindex="0">
                                                    <h3>Buyer Credit Packages</h3>
                                                    <div class="packages" >
                                                        <div class="row">
                                                            @foreach ($packages as $item)
                                                            <div class="col-xxl-3 col-md-6 col-12 package-col">
                                                                <div class="packages-card">
                                                                    <form method="post" action="{{ route('user.package_payment_management') }}">
                                                                        @csrf
                                                                        <input type="hidden" name="package_id" value="{{$item->id}}">
                                                                        <input type="hidden" name="package_value" value="{{$item->package_price}}">
                                                                        <input type="hidden" name="package_duration" value="{{$item->package_type}}">
                                                                        <input type="hidden" name="package_name" value="{{$item->package_name}}">
                                                                        <div class="card-header bg-gradient-free">
                                                                            <h4>{{$item->package_name}}</h4>
                                                                            <p>{{$item->package_prefix}} {{$item->package_price}} / {{$item->package_type}}</p>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <p>{!! $item->package_description !!}</p>                                                    
                                                                        </div>
                                                                        <div class="card-footer bg-gradient-free">
                                                                            <button type="submit" class="btn btn-animated btn-cta bg-free">Buy Now</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="content-box bg-gray-1">
                                                        <div class="inner">
                                                            <h3>Credit Usages As a Buyer</h3>
                                                            <div class="credit-charts">
                                                                <canvas id="buyer-creditChart" style="width:632px;height:632px;"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                
                                                </div>
                                                <div class="tab-pane fade" id="sellers" role="tabpanel" aria-labelledby="sellers-tab" tabindex="0">
                                                    <h3>Seller Credit Packages</h3>
                                                    <div class="packages" style="color: red">
                                                        <div class="row">
                                                            @foreach ($seller_packages as $item)
                                                            <div class="col-xxl-3 col-md-6 col-12 package-col">
                                                                <div class="packages-card" style="background: yellowgreen">
                                                                    <form method="post" action="{{ route('user.package_payment_management') }}">
                                                                        @csrf
                                                                        <input type="hidden" name="package_id" value="{{$item->id}}">
                                                                        <input type="hidden" name="package_value" value="{{$item->package_price}}">
                                                                        <input type="hidden" name="package_duration" value="{{$item->package_type}}">
                                                                        <input type="hidden" name="package_name" value="{{$item->package_name}}">
                                                                        <div class="card-header bg-gradient-free">
                                                                            <h4>{{$item->package_name}}</h4>
                                                                            <p>{{$item->package_prefix}} {{$item->package_price}} / {{$item->package_type}}</p>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <p>{!! $item->package_description !!}</p>                                                    
                                                                        </div>
                                                                        <div class="card-footer bg-gradient-free">
                                                                            <button type="submit" class="btn btn-animated btn-cta bg-free">Buy Now</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="content-box bg-gray-1">
                                                        <div class="inner">
                                                            <h3>Credit Usages As a Seller</h3>
                                                            <div class="credit-charts">
                                                                <canvas id="seller-creditChart" style="width:632px;height:632px;"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>               
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
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($myBadges as $item)
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
                                                                <td class="price-td">
                                                                    <label class="price-label">{{ $item->price_prefix }} - {{ $item->price }}</label>
                                                                    <a href="#"  class="btn btn-animated btn-yellow btn-cta purchase" data-badge_id="{{$item->id}}" data-amount={{ $item->price }}>Buy Now</a>
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
                Swal.fire({
                title: "Are You Sure to Purchase it?",
                text: "Purchase this Badge?",
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

