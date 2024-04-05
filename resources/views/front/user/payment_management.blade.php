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
                                    <div class="content-box bg-gray-1">
                                        <div class="inner">
                                            <h3>Credit Packages</h3>
                                            <div class="packages">
                                                <div class="row">
                                                    <div class="col-xxl-3 col-md-6 col-12 package-col">
                                                        <div class="packages-card">
                                                            <div class="card-header bg-gradient-free">
                                                                <h4>Free</h4>
                                                                <p>INR 5,400 / monthly</p>
                                                            </div>
                                                            <div class="card-body">
                                                                <p>It is a long established fact that</p>
                                                                <p>Lorem Ipsum is that it has Lorem Ipsum is that</p>
                                                                <p>Lorem Ipsum is that Lorem Ipsum is that it has</p>
                                                                <p>Lorem Ipsum is that it has a more-or-less</p>
                                                            </div>
                                                            <div class="card-footer bg-gradient-free">
                                                                <a href="#" class="btn btn-animated btn-cta bg-free">Buy Now</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-3 col-md-6 col-12 package-col">
                                                        <div class="packages-card">
                                                            <div class="card-header bg-gradient-individual">
                                                                <h4>Individual</h4>
                                                                <p>INR 5,400 / monthly</p>
                                                            </div>
                                                            <div class="card-body">
                                                                <p>It is a long established fact that</p>
                                                                <p>Lorem Ipsum is that it has Lorem Ipsum is that</p>
                                                                <p>Lorem Ipsum is that Lorem Ipsum is that it has</p>
                                                                <p>Lorem Ipsum is that it has a more-or-less</p>
                                                            </div>
                                                            <div class="card-footer bg-gradient-individual">
                                                                <a href="#" class="btn btn-animated btn-cta bg-individual">Buy Now</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-3 col-md-6 col-12 package-col">
                                                        <div class="packages-card">
                                                            <div class="card-header bg-gradient-business">
                                                                <h4>Individual</h4>
                                                                <p>INR 5,400 / monthly</p>
                                                            </div>
                                                            <div class="card-body">
                                                                <p>It is a long established fact that</p>
                                                                <p>Lorem Ipsum is that it has Lorem Ipsum is that</p>
                                                                <p>Lorem Ipsum is that Lorem Ipsum is that it has</p>
                                                                <p>Lorem Ipsum is that it has a more-or-less</p>
                                                            </div>
                                                            <div class="card-footer bg-gradient-business">
                                                                <a href="#" class="btn btn-animated btn-cta bg-business">Buy Now</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-3 col-md-6 col-12 package-col">
                                                        <div class="packages-card">
                                                            <div class="card-header bg-gradient-premium">
                                                                <h4>Individual</h4>
                                                                <p>INR 5,400 / monthly</p>
                                                            </div>
                                                            <div class="card-body">
                                                                <p>It is a long established fact that</p>
                                                                <p>Lorem Ipsum is that it has Lorem Ipsum is that</p>
                                                                <p>Lorem Ipsum is that Lorem Ipsum is that it has</p>
                                                                <p>Lorem Ipsum is that it has a more-or-less</p>
                                                            </div>
                                                            <div class="card-footer bg-gradient-premium">
                                                                <a href="#" class="btn btn-animated btn-cta bg-premium">Buy Now</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-box bg-gray-1">
                                        <div class="inner">
                                            <h3>Credit Usages</h3>
                                            <div class="credit-charts">
                                                <canvas id="creditChart" style="width:632px;height:632px;"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-box bg-gray-2">
                                        <div class="inner">
                                            <h3>Badges</h3>
                                            <div class="badges">
                                                <h5>Unpaid Badges</h5>
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
                                                            <tr>
                                                                <td>
                                                                    <div class="badge">
                                                                        <div class="img">
                                                                            <img src="assets/images/verified-badge.png" alt="">
                                                                        </div>
                                                                        <div class="name">
                                                                            <label class="color-verified">Verified</label>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <p>
                                                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p>
                                                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="badge">
                                                                        <div class="img">
                                                                            <img src="assets/images/trusted-badge.png" alt="">
                                                                        </div>
                                                                        <div class="name">
                                                                            <label class="color-trusted">Trusted</label>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <p>
                                                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p>
                                                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="badges">
                                                <h5>Unpaid Badges</h5>
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
                                                            <tr>
                                                                <td>
                                                                    <div class="badge">
                                                                        <div class="img">
                                                                            <img src="assets/images/featured-basic.png" alt="">
                                                                        </div>
                                                                        <div class="name">
                                                                            <label class="color-featured-basic">Featured</label>
                                                                            <span>Basic</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <p>
                                                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p>
                                                                        There are many variations of passages of Lorem Ipsum available, but the majority have 
                                                                    </p>
                                                                </td>
                                                                <td class="price-td">
                                                                    <label class="price-label">INR - 1500</label>
                                                                    <a href="" class="btn btn-animated btn-yellow btn-cta">Buy Now</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="badge">
                                                                        <div class="img">
                                                                            <img src="assets/images/featured-intermediate.png" alt="">
                                                                        </div>
                                                                        <div class="name">
                                                                            <label class="color-featured-intermediate">Featured</label>
                                                                            <span>Intermediate</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <p>
                                                                        There are many variations of passages of Lorem Ipsum available, 
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p>
                                                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration
                                                                    </p>
                                                                </td>
                                                                <td class="price-td">
                                                                    <label class="price-label">INR - 1500</label>
                                                                    <a href="" class="btn btn-animated btn-yellow btn-cta">Buy Now</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="badge">
                                                                        <div class="img">
                                                                            <img src="assets/images/featured-advanced.png" alt="">
                                                                        </div>
                                                                        <div class="name">
                                                                            <label class="color-featured-advanced">Featured</label>
                                                                            <span>Advanced</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <p>
                                                                        There are many variations of passages of Lorem Ipsum available, 
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p>
                                                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration
                                                                    </p>
                                                                </td>
                                                                <td class="price-td">
                                                                    <label class="price-label">INR - 1500</label>
                                                                    <a href="" class="btn btn-animated btn-yellow btn-cta">Buy Now</a>
                                                                </td>
                                                            </tr>
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
<script>
    $(document).ready(function() {

    const consumptionChart = new Chart(document.getElementById("creditChart"), {
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
@endsection