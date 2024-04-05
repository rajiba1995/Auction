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
                                <div class="tab-pane active basic-info-tab-pane " id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab" tabindex="0">
                                    <div class="tab-content-wrapper">
                                        <div class="top-content-bar">
                                            <a href="basic-information-form.html" class="btn btn-normal btn-cta">Edit Basic Information</a>
                                        </div>
                                        <div class="content-box">
                                            <div class="basic-info-banner">
                                                <img src="{{asset('frontend/assets/images/basic-info-banner.png')}}" alt="">
                                            </div>
                                            <div class="basic-info-desc">
                                                <div class="top-info-row">
                                                    <div class="person-img">
                                                        <img src="{{asset('frontend/assets/images/person.png')}}" alt="User">
                                                    </div>
                                                    <div class="person-info">
                                                        <p>Deepak Agarwal<strong>Mani Auto Engg Works</strong></p>
                                                    </div>
                                                </div>
                                                <h3>About Me</h3>
                                                <p class="person-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                            </div>
                                        </div>
                                        <div class="content-box">
                                            <div class="other-info-box">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-6 col-12 info-box">
                                                            <label>Name of the Business: </label>
                                                            <p>Mani Auto Engg Works</p>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6 col-12 info-box">
                                                            <label>Address:</label>
                                                            <p>Chembur East, Mumbai - 400071 (Near Swastik Hospital, Swastik Park)</p>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6 col-12 info-box">
                                                            <label>Pin Code:</label>
                                                            <p>400071</p>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6 col-12 info-box">
                                                            <label>Nature of Business:</label>
                                                            <p>Manufacturer</p>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6 col-12 info-box">
                                                            <label>Email:</label>
                                                            <p>info@gmail.com</p>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6 col-12 info-box">
                                                            <label>Phone Number:</label>
                                                            <p>+91 xx xxxx</p>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6 col-12 info-box">
                                                            <label>Number of Employee:</label>
                                                            <p>25</p>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6 col-12 info-box">
                                                            <label>Year of Establishment:</label>
                                                            <p>2000</p>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6 col-12 info-box">
                                                            <label>Legal Status of Firm:</label>
                                                            <p>Private Limited Company</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="ratingReviews" role="tabpanel" aria-labelledby="ratingReviews-tab" tabindex="0">
                                    <div class="tab-content-wrapper">
                                        <div class="top-content-bar"></div>
                                        <div class="content-box">
                                            <div class="inner">
                                                <h3>Review Summary</h3>

                                                <div class="review-desc-box">
                                                    <h3>Overall Rating</h3>
                                                    <div class="rating-display-box">
                                                        <div class="left-col">
                                                            <div class="rating-value">4.5</div>
                                                            <div class="rating-star-values">
                                                                <ul class="rating-stars blank-stars">
                                                                    <li>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                            "></path></g></svg>
                                                                    </li>
                                                                    <li>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                            "></path></g></svg>
                                                                    </li>
                                                                    <li>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                            "></path></g></svg>
                                                                    </li>
                                                                    <li>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                            "></path></g></svg>
                                                                    </li>
                                                                    <li>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                            "></path></g></svg>
                                                                    </li>
                                                                </ul>
                                                                <ul class="rating-stars solid-stars" data-rating="4.5">
                                                                    <li>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                            "></path></g></svg>
                                                                    </li>
                                                                    <li>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                            "></path></g></svg>
                                                                    </li>
                                                                    <li>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                            "></path></g></svg>
                                                                    </li>
                                                                    <li>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                            "></path></g></svg>
                                                                    </li>
                                                                    <li>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                            "></path></g></svg>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="review-value">29 reviews</div>
                                                        </div>
                                                        <div class="right-col">
                                                            <ul class="ratingBars">
                                                                <li>
                                                                    <span class="ratingNumber">5</span>
                                                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                                        <div class="progress-bar" style="width: 80%"></div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <span class="ratingNumber">4</span>
                                                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                                        <div class="progress-bar" style="width: 23%"></div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <span class="ratingNumber">3</span>
                                                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                                        <div class="progress-bar" style="width: 15%"></div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <span class="ratingNumber">2</span>
                                                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                                        <div class="progress-bar" style="width: 7%"></div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <span class="ratingNumber">1</span>
                                                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                                        <div class="progress-bar" style="width: 12%"></div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="review-desc-box auctioneer-review-desc-box">
                                                    <h3>Rated as Supplier</h3>
                                                    <div class="rating-display-box">
                                                        <div class="left-col">
                                                            <div class="rating-value">4.7</div>
                                                            <div class="rating-star-values">
                                                                <ul class="rating-stars blank-stars">
                                                                    <li>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                            "></path></g></svg>
                                                                    </li>
                                                                    <li>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                            "></path></g></svg>
                                                                    </li>
                                                                    <li>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                            "></path></g></svg>
                                                                    </li>
                                                                    <li>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                            "></path></g></svg>
                                                                    </li>
                                                                    <li>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                            "></path></g></svg>
                                                                    </li>
                                                                </ul>
                                                                <ul class="rating-stars solid-stars" data-rating="4.7">
                                                                    <li>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                            "></path></g></svg>
                                                                    </li>
                                                                    <li>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                            "></path></g></svg>
                                                                    </li>
                                                                    <li>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                            "></path></g></svg>
                                                                    </li>
                                                                    <li>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                            "></path></g></svg>
                                                                    </li>
                                                                    <li>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                            "></path></g></svg>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="review-value">29 reviews</div>
                                                        </div>
                                                        <div class="right-col">
                                                            <ul class="ratingBars">
                                                                <li>
                                                                    <span class="ratingNumber">5</span>
                                                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                                        <div class="progress-bar" style="width: 80%"></div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <span class="ratingNumber">4</span>
                                                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                                        <div class="progress-bar" style="width: 23%"></div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <span class="ratingNumber">3</span>
                                                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                                        <div class="progress-bar" style="width: 15%"></div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <span class="ratingNumber">2</span>
                                                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                                        <div class="progress-bar" style="width: 7%"></div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <span class="ratingNumber">1</span>
                                                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                                        <div class="progress-bar" style="width: 12%"></div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="review-desc-box bidder-review-desc-box">
                                                    <h3>Rated as Buyer</h3>
                                                    <div class="rating-display-box">
                                                        <div class="left-col">
                                                            <div class="rating-value">4.1</div>
                                                            <div class="rating-star-values">
                                                                <ul class="rating-stars blank-stars">
                                                                    <li>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                            "></path></g></svg>
                                                                    </li>
                                                                    <li>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                            "></path></g></svg>
                                                                    </li>
                                                                    <li>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                            "></path></g></svg>
                                                                    </li>
                                                                    <li>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                            "></path></g></svg>
                                                                    </li>
                                                                    <li>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                            "></path></g></svg>
                                                                    </li>
                                                                </ul>
                                                                <ul class="rating-stars solid-stars" data-rating="4.1">
                                                                    <li>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                            "></path></g></svg>
                                                                    </li>
                                                                    <li>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                            "></path></g></svg>
                                                                    </li>
                                                                    <li>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                            "></path></g></svg>
                                                                    </li>
                                                                    <li>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                            "></path></g></svg>
                                                                    </li>
                                                                    <li>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                            "></path></g></svg>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="review-value">29 reviews</div>
                                                        </div>
                                                        <div class="right-col">
                                                            <ul class="ratingBars">
                                                                <li>
                                                                    <span class="ratingNumber">5</span>
                                                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                                        <div class="progress-bar" style="width: 80%"></div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <span class="ratingNumber">4</span>
                                                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                                        <div class="progress-bar" style="width: 23%"></div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <span class="ratingNumber">3</span>
                                                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                                        <div class="progress-bar" style="width: 15%"></div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <span class="ratingNumber">2</span>
                                                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                                        <div class="progress-bar" style="width: 7%"></div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <span class="ratingNumber">1</span>
                                                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                                        <div class="progress-bar" style="width: 12%"></div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="review-cta-row">
                                                    <a href="profile-rating-and-review-from-mail-link-auctioneer-bidder.html" class="btn btn-animated btn-yellow btn-cta">Write a review</a>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="content-box">
                                            <div class="inner">

                                                <div class="reviews-box">
                                                    <div class="top-row">
                                                        <div class="left-col">
                                                            <div class="row-1">
                                                                Amrapali Sirsat
                                                                <span class="verified-rating">Verified rating</span>
                                                            </div>
                                                            <div class="row-2">
                                                                22 Feb 2023
                                                                <span class="rated-as actioneer">Rated as Supplier</span>
                                                            </div>
                                                        </div>
                                                        <div class="right-col">
                                                            <ul class="rating-stars">
                                                                <li class="star three">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                        "></path></g></svg>
                                                                </li>
                                                                <li class="star three">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                        "></path></g></svg>
                                                                </li>
                                                                <li class="star three">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                        "></path></g></svg>
                                                                </li>
                                                                <li class="star">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                        "></path></g></svg>
                                                                </li>
                                                                <li class="star">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                        "></path></g></svg>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="review-desc-text">
                                                        <p>Good company to start career as a fresher but not for long term there is no training guidelines for fresher whatever u can learn through observation only.. Company is good but management is insane particularly mid level management. If you are mba then it`s a crime in TCI seriously i can figure it out.</p>
                                                    </div>
                                                    <div class="bottom-row">
                                                        <a href="#" class="comment-cta">
                                                            <img src="assets/images/comment.png" alt="">
                                                            Comment
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="reviews-box">
                                                    <div class="top-row">
                                                        <div class="left-col">
                                                            <div class="row-1">
                                                                Amrapali Sirsat
                                                            </div>
                                                            <div class="row-2">
                                                                22 Feb 2023
                                                                <span class="rated-as bidder">Rated as Buyer</span>
                                                            </div>
                                                        </div>
                                                        <div class="right-col">
                                                            <ul class="rating-stars">
                                                                <li class="star three">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                        "></path></g></svg>
                                                                </li>
                                                                <li class="star three">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                        "></path></g></svg>
                                                                </li>
                                                                <li class="star three">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                        "></path></g></svg>
                                                                </li>
                                                                <li class="star">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                        "></path></g></svg>
                                                                </li>
                                                                <li class="star">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                        "></path></g></svg>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="review-desc-text">
                                                        <p>Good company to start career as a fresher but not for long term there is no training guidelines for fresher whatever u can learn through observation only.. Company is good but management is insane particularly mid level management. If you are mba then it`s a crime in TCI seriously i can figure it out.</p>
                                                    </div>
                                                    <div class="bottom-row">
                                                        <a href="#" class="comment-cta">
                                                            <img src="assets/images/comment.png" alt="">
                                                            Comment
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="reviews-box">
                                                    <div class="top-row">
                                                        <div class="left-col">
                                                            <div class="row-1">
                                                                Amrapali Sirsat
                                                                <span class="verified-rating">Verified rating</span>
                                                            </div>
                                                            <div class="row-2">
                                                                22 Feb 2023
                                                                <span class="rated-as actioneer">Rated as Supplier</span>
                                                            </div>
                                                        </div>
                                                        <div class="right-col">
                                                            <ul class="rating-stars">
                                                                <li class="star three">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                        "></path></g></svg>
                                                                </li>
                                                                <li class="star three">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                        "></path></g></svg>
                                                                </li>
                                                                <li class="star three">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                        "></path></g></svg>
                                                                </li>
                                                                <li class="star">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                        "></path></g></svg>
                                                                </li>
                                                                <li class="star">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                        "></path></g></svg>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="review-desc-text">
                                                        <p>Good company to start career as a fresher but not for long term there is no training guidelines for fresher whatever u can learn through observation only.. Company is good but management is insane particularly mid level management. If you are mba then it`s a crime in TCI seriously i can figure it out.</p>
                                                    </div>
                                                    <div class="bottom-row">
                                                        <a href="#" class="comment-cta">
                                                            <img src="assets/images/comment.png" alt="">
                                                            Comment
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane" id="photosDocuments" role="tabpanel" aria-labelledby="photosDocuments-tab" tabindex="0">
                                    <div class="tab-content-wrapper">
                                        <div class="top-content-bar">
                                            <a href="photos-and-documents-form.html" class="btn btn-normal btn-cta">Upload Photos and Documents</a>
                                        </div>
                                        <div class="content-box">
                                            <div class="inner">
                                                <h3>Photos</h3>
                                                <div class="photos">
                                                    <div class="photo-box"><img src="assets/images/photos-1.png" alt=""></div>
                                                    <div class="photo-box"><img src="assets/images/photos-2.png" alt=""></div>
                                                    <div class="photo-box"><img src="assets/images/photos-3.png" alt=""></div>
                                                    <div class="photo-box"><img src="assets/images/photos-4.png" alt=""></div>
                                                    <div class="photo-box"><img src="assets/images/photos-1.png" alt=""></div>
                                                    <div class="photo-box"><img src="assets/images/photos-2.png" alt=""></div>
                                                    <div class="photo-box"><img src="assets/images/photos-3.png" alt=""></div>
                                                    <div class="photo-box"><img src="assets/images/photos-4.png" alt=""></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content-box">
                                            <div class="inner">
                                                <h3>Documents</h3>
                                                <div class="docs">
                                                    <!-- <div class="container-fluid"> -->
                                                        <div class="row">
                                                            <div class="col-xxl-4 col-md-6 col-12 doc-box">
                                                                <div class="inner-wrap">
                                                                    <div class="left-col">
                                                                        <div class="img-box">
                                                                            <img src="assets/images/tax.png" alt="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="right-col">
                                                                        <label>
                                                                            GSTIN
                                                                            <span><img src="assets/images/authorized.png" alt=""></span>
                                                                        </label>
                                                                        <p>27ADZPB6608D1KJ</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xxl-4 col-md-6 col-12 doc-box">
                                                                <div class="inner-wrap">
                                                                    <div class="left-col">
                                                                        <div class="img-box">
                                                                            <img src="assets/images/pancard.png" alt="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="right-col">
                                                                        <label>
                                                                            Pan Card
                                                                            <span><img src="assets/images/authorized.png" alt=""></span>
                                                                        </label>
                                                                        <p>ABCD123658GH</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xxl-4 col-md-6 col-12 doc-box">
                                                                <div class="inner-wrap">
                                                                    <div class="left-col">
                                                                        <div class="img-box">
                                                                            <img src="assets/images/card.png" alt="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="right-col">
                                                                        <label>
                                                                            Adhar Card
                                                                            <span><img src="assets/images/authorized.png" alt=""></span>
                                                                        </label>
                                                                        <p>ABCD123658GH</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xxl-4 col-md-6 col-12 doc-box">
                                                                <div class="inner-wrap">
                                                                    <div class="left-col">
                                                                        <div class="img-box">
                                                                            <img src="assets/images/card.png" alt="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="right-col">
                                                                        <label>
                                                                            Trading License
                                                                            <span><img src="assets/images/authorized.png" alt=""></span>
                                                                        </label>
                                                                        <p>ABCD123658GH</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xxl-4 col-md-6 col-12 doc-box">
                                                                <div class="inner-wrap">
                                                                    <div class="left-col">
                                                                        <div class="img-box">
                                                                            <img src="assets/images/card.png" alt="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="right-col">
                                                                        <label>
                                                                            Cheque
                                                                            <span><img src="assets/images/authorized.png" alt=""></span>
                                                                        </label>
                                                                        <p>Account Number: ABCD123658GH</p>
                                                                        <p>IFSC Code: SBIN125698</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <!-- </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="productsServices" role="tabpanel" aria-labelledby="productsServices-tab" tabindex="0">
                                    <div class="tab-content-wrapper">
                                        <div class="top-content-bar">
                                            <a href="produt-and-services-form.html" class="btn btn-normal btn-cta">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="20" height="20" fill="#0076D7"/>
                                                    <path d="M10 4.1665V15.8332" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M4.16602 10H15.8327" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>                                                        
                                                Add Products & Services
                                            </a>
                                        </div>
                                        <div class="content-box">
                                            <div class="inner">
                                                <div class="page-tabs-row">
                                                    <ul class="nav nav-tabs watchlist-tabs" id="productsServicesTab" role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link active" id="products-tab" data-bs-toggle="tab" data-bs-target="#products" type="button" role="tab" aria-controls="products" aria-selected="true">Products</button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="services-tab" data-bs-toggle="tab" data-bs-target="#services" type="button" role="tab" aria-controls="services" aria-selected="false">Services</button>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="tab-content products-services-tab-content">
                                                    <div class="tab-pane fade show active" id="products" role="tabpanel" aria-labelledby="products-tab" tabindex="0">
                                                        <div class="prod-serv-box">
                                                            <div class="cta-box">
                                                                <a href="javascript:void(0)" class="btn-cta">
                                                                    <img src="assets/images/edit.png" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="left-col">
                                                                <div class="img-box">
                                                                    <img src="assets/images/photos-1.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="right-col">
                                                                <h4>Car</h4>
                                                                <p class="desc">
                                                                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
                                                                </p>
                                                                <div class="row">
                                                                    <div class="col-md-6 col-12 info-col">
                                                                        <label>Category:</label>
                                                                        <p>Transport Service</p>
                                                                    </div>
                                                                    <div class="col-md-6 col-12 info-col">
                                                                        <label>Sub-Category:</label>
                                                                        <p>Transport</p>
                                                                    </div>
                                                                    <div class="col-md-6 col-12 info-col">
                                                                        <label>Price per unit:</label>
                                                                        <p>150 / hr</p>
                                                                    </div>
                                                                    <div class="col-md-6 col-12 info-col">
                                                                        <label>Product Specification:</label>
                                                                        <p></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="prod-serv-box">
                                                            <div class="cta-box">
                                                                <a href="javascript:void(0)" class="btn-cta">
                                                                    <img src="assets/images/edit.png" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="left-col">
                                                                <div class="img-box">
                                                                    <img src="assets/images/photos-1.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="right-col">
                                                                <h4>Refrigerator</h4>
                                                                <p class="desc">
                                                                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
                                                                </p>
                                                                <div class="row">
                                                                    <div class="col-md-6 col-12 info-col">
                                                                        <label>Category:</label>
                                                                        <p>Electronics</p>
                                                                    </div>
                                                                    <div class="col-md-6 col-12 info-col">
                                                                        <label>Sub-Category:</label>
                                                                        <p>Kitchen</p>
                                                                    </div>
                                                                    <div class="col-md-6 col-12 info-col">
                                                                        <label>Price per unit:</label>
                                                                        <p>150 / hr</p>
                                                                    </div>
                                                                    <div class="col-md-6 col-12 info-col">
                                                                        <label>Product Specification:</label>
                                                                        <p></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="services-tab" tabindex="0">
                                                        <div class="prod-serv-box">
                                                            <div class="cta-box">
                                                                <a href="javascript:void(0)" class="btn-cta">
                                                                    <img src="assets/images/edit.png" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="left-col">
                                                                <div class="img-box">
                                                                    <img src="assets/images/photos-1.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="right-col">
                                                                <h4>Car repair services</h4>
                                                                <p class="desc">
                                                                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
                                                                </p>
                                                                <div class="row">
                                                                    <div class="col-md-6 col-12 info-col">
                                                                        <label>Category:</label>
                                                                        <p>Transport Service</p>
                                                                    </div>
                                                                    <div class="col-md-6 col-12 info-col">
                                                                        <label>Sub-Category:</label>
                                                                        <p>Transport</p>
                                                                    </div>
                                                                    <div class="col-md-6 col-12 info-col">
                                                                        <label>Price per unit:</label>
                                                                        <p>150 / hr</p>
                                                                    </div>
                                                                    <div class="col-md-6 col-12 info-col">
                                                                        <label>Product Specification:</label>
                                                                        <p></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="prod-serv-box">
                                                            <div class="cta-box">
                                                                <a href="javascript:void(0)" class="btn-cta">
                                                                    <img src="assets/images/edit.png" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="left-col">
                                                                <div class="img-box">
                                                                    <img src="assets/images/photos-1.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="right-col">
                                                                <h4>Refrigerator Services</h4>
                                                                <p class="desc">
                                                                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
                                                                </p>
                                                                <div class="row">
                                                                    <div class="col-md-6 col-12 info-col">
                                                                        <label>Category:</label>
                                                                        <p>Electronics</p>
                                                                    </div>
                                                                    <div class="col-md-6 col-12 info-col">
                                                                        <label>Sub-Category:</label>
                                                                        <p>Kitchen</p>
                                                                    </div>
                                                                    <div class="col-md-6 col-12 info-col">
                                                                        <label>Price per unit:</label>
                                                                        <p>150 / hr</p>
                                                                    </div>
                                                                    <div class="col-md-6 col-12 info-col">
                                                                        <label>Product Specification:</label>
                                                                        <p></p>
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
                                <div class="tab-pane" id="requirementsConsumptions" role="tabpanel" aria-labelledby="requirementsConsumptions-tab" tabindex="0">
                                    <div class="tab-content-wrapper">
                                        <div class="top-content-bar">
                                            <a href="requirements-and-consumption-form.html" class="btn btn-normal btn-cta">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="20" height="20" fill="#0076D7"/>
                                                    <path d="M10 4.1665V15.8332" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M4.16602 10H15.8327" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>                                                        
                                                Add Your Consumption
                                            </a>
                                        </div>
                                        
                                        <div class="row consumption-row">
                                            <div class="col-md-6 col-12 left-col">
                                                <div class="top-row">
                                                    <label>Regular Consumption</label>
                                                    <p>Products or services you consume daily</p>
                                                </div>
                                                <div class="inner-padding">
                                                    <div class="content">
                                                        <div class="row">
                                                            <div class="col-12 info-col">
                                                                <label>Product/service</label>
                                                                <p>AC repair</p>
                                                            </div>
                                                            <div class="col-sm-6 col-12 info-col">
                                                                <label>Category</label>
                                                                <p>Transport Service</p>
                                                            </div>
                                                            <div class="col-sm-6 col-12 info-col">
                                                                <label>Sub-Category</label>
                                                                <p>Transport</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="inner-padding">
                                                    <div class="content">
                                                        <div class="row">
                                                            <div class="col-12 info-col">
                                                                <label>Product/service</label>
                                                                <p>Parlour Service</p>
                                                            </div>
                                                            <div class="col-sm-6 col-12 info-col">
                                                                <label>Category</label>
                                                                <p>Beauty</p>
                                                            </div>
                                                            <div class="col-sm-6 col-12 info-col">
                                                                <label>Sub-Category</label>
                                                                <p>Parlour</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 right-col">
                                                <div class="top-row">
                                                    <label>Yearly Consumption</label>
                                                    <p>Products or services you consume once a year</p>
                                                </div>
                                                <div class="inner-padding">
                                                    <div class="content">
                                                        <div class="row">
                                                            <div class="col-12 info-col">
                                                                <label>Product/service</label>
                                                                <p>Refrigerator</p>
                                                            </div>
                                                            <div class="col-sm-6 col-12 info-col">
                                                                <label>Category</label>
                                                                <p>Electronics</p>
                                                            </div>
                                                            <div class="col-sm-6 col-12 info-col">
                                                                <label>Sub-Category</label>
                                                                <p>Home Appliances</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="inner-padding">
                                                    <div class="content">
                                                        <div class="row">
                                                            <div class="col-12 info-col">
                                                                <label>Product/service</label>
                                                                <p>Television</p>
                                                            </div>
                                                            <div class="col-sm-6 col-12 info-col">
                                                                <label>Category</label>
                                                                <p>Electronics</p>
                                                            </div>
                                                            <div class="col-sm-6 col-12 info-col">
                                                                <label>Sub-Category</label>
                                                                <p>Entertainment</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="tab-pane" id="performanceAnalytics" role="tabpanel" aria-labelledby="performanceAnalytics-tab" tabindex="0">
                                    <div class="tab-content-wrapper">
                                        <div class="top-content-bar"></div>
                                        <div class="content-box">
                                            <div class="inner">
                                                <h3>Coming Soon </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="paymentManagement" role="tabpanel" aria-labelledby="paymentManagement-tab" tabindex="0">
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
                                <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab" tabindex="0">
                                    <div class="tab-content-wrapper">
                                        <div class="top-content-bar"></div>
                                        <div class="content-box">
                                            <div class="inner">
                                                <div class="settings-cta-box">
                                                    <h5>Account Settings</h5>
                                                    <div class="cta-row">
                                                        <a href="#">
                                                            <span>Change password</span>
                                                            <img src="assets/images/angle-right.png" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="cta-row">
                                                        <a href="#">
                                                            <span>Notifications</span>
                                                            <label for="notifyCheck" class="toggler-custom-checkbox">
                                                                <input type="checkbox" id="notifyCheck">
                                                                <span class="toggler"></span>
                                                            </label>
                                                        </a>
                                                    </div>
                                                    <div class="cta-row">
                                                        <a href="#">
                                                            <span>Logout</span>
                                                            <img src="assets/images/log-out-blue.png" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="settings-cta-box">
                                                    <h5>More</h5>
                                                    <div class="cta-row">
                                                        <a href="#">
                                                            <span>About us</span>
                                                            <img src="assets/images/angle-right.png" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="cta-row">
                                                        <a href="#">
                                                            <span>Privacy policy</span>
                                                            <img src="assets/images/angle-right.png" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="cta-row">
                                                        <a href="#">
                                                            <span>Terms and conditions</span>
                                                            <img src="assets/images/angle-right.png" alt="">
                                                        </a>
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
</div>
@endsection