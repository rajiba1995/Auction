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
                                    <div class="top-content-bar"><h2 class="text-light">WRITE A REVIEW</h2></div>
                                    <div class="content-box">
                                    <div class="inner">
                                        <form action="{{ route('user.profile.review_and_rating.submit') }}" class="input-form" method="POST" enctype="multipart/form-data">
                                          @csrf
                                            <div class="row input-row">
                                                <div class="col-lg-4 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label for="rateasauctioneer" class="modal-custom-radio">
                                                            <input type="radio" name="rateas" id="rateasauctioneer" value="1" checked>
                                                            <span class="checkmark">
                                                                <span class="checkedmark"></span>
                                                            </span>
                                                            <div class="radio-text">
                                                                <label>Rate your buyer</label>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label for="rateasbidder" class="modal-custom-radio">
                                                            <input type="radio" name="rateas" id="rateasbidder" value="2">
                                                            <span class="checkmark">
                                                                <span class="checkedmark"></span>
                                                            </span>
                                                            <div class="radio-text">
                                                                <label>Rate your supplier</label>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rating-inputs show" id="ratingInputsAuctioneer">
                                                <div class="row input-row overall-rating-row">
                                                    <!-- <div class="col-12">
                                                        <label class="rating-label">Overall Rating</label>
                                                        <ul class="rating-stars">
                                                            <li class="star three" onclick="giveRating(this,1)">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                            <li class="star three" onclick="giveRating(this,2)">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                            <li class="star three" onclick="giveRating(this,3)">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                            <li class="star" onclick="giveRating(this,4)">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                            <li class="star" onclick="giveRating(this,5)">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                        </ul>
                                                    </div> -->
                                                </div>
        
                                                <div class="row input-row">
                                                    <div class="col-12">
                                                        <label class="rating-label">On-time payment</label>
                                                        <input type="hidden" name="on_time_payment" id="on_time_payment" value="">
                                                        <ul class="rating-stars on_time_payment">
                                                            <li class="star"  data-rating="1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                            <li class="star"  data-rating="2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                            <li class="star"  data-rating="3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                            <li class="star"  data-rating="4">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                            <li class="star"  data-rating="5">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
        
                                                <div class="row input-row">
                                                    <div class="col-12">
                                                        <label class="rating-label">Post/during Delivery Cooperation</label>
                                                        <input type="hidden" id="post_delivery_cooperation" name="post_delivery_cooperation" value="">
                                                        <ul class="rating-stars post_delivery_cooperation">
                                                            <li class="star" data-rating="1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                            <li class="star" data-rating="2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                            <li class="star" data-rating="3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                            <li class="star" data-rating="4">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                            <li class="star" data-rating="5">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
        
                                                <div class="row input-row">
                                                    <div class="col-12">
                                                        <label class="rating-label">Auctioneer Performance/ Genuineness</label>
                                                        <input type="hidden" id="genuiness" name="genuiness" value="">

                                                        <ul class="rating-stars genuiness">
                                                            <li class="star" data-rating="1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                            <li class="star" data-rating="2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                            <li class="star" data-rating="3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                            <li class="star" data-rating="4">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                            <li class="star" data-rating="5">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            
                                                <div class="row input-row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control border-red review" name="supplier_message" placeholder="Write a review">{{ old('buyer_message') }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
        
                                            <div class="rating-inputs" id="ratingInputsBidder">
                                                <div class="row input-row overall-rating-row">
                                                    <!-- <div class="col-12">
                                                        <label class="rating-label">Overall Rating</label>
                                                        <ul class="rating-stars">
                                                            <li class="star three" onclick="giveRating(this,1)">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                            <li class="star three" onclick="giveRating(this,2)">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                            <li class="star three" onclick="giveRating(this,3)">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                            <li class="star" onclick="giveRating(this,4)">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                            <li class="star" onclick="giveRating(this,5)">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                        </ul>
                                                    </div> -->
                                                </div>
        
                                                <div class="row input-row">
                                                    <div class="col-12">
                                                        <label class="rating-label">On-time Delivery</label>
                                                        <input type="hidden" id="on_time_delivery" name="on_time_delivery" value="">
                                                        <ul class="rating-stars on_time_delivery">
                                                            <li class="star" data-rating="1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                            <li class="star" data-rating="2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                            <li class="star" data-rating="3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                            <li class="star" data-rating="4">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                            <li class="star" data-rating="5">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
        
                                                <div class="row input-row">
                                                    <div class="col-12">
                                                        <label class="rating-label">Right Product/ Service Delivered</label>
                                                        <input type="hidden" id="right_product" name="right_product" value="4">
                                                        <ul class="rating-stars right_product">
                                                            <li class="star" data-rating="1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                            <li class="star" data-rating="2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                            <li class="star" data-rating="3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                            <li class="star" data-rating="4">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                            <li class="star" data-rating="5">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
        
                                                <div class="row input-row">
                                                    <div class="col-12">
                                                        <label class="rating-label">Post delivery Services</label>
                                                        <input type="hidden" id="post_delivery_service" name="post_delivery_service" value="5">
                                                        <ul class="rating-stars post_delivery_service">
                                                            <li class="star" data-rating="1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                            <li class="star" data-rating="2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                            <li class="star" data-rating="3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                            <li class="star" data-rating="4">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                            <li class="star" data-rating="5">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                    "></path></g></svg>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            
                                                <div class="row input-row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control border-red review" name="buyer_message" placeholder="Write a review">{{ old('seller_message') }}</textarea>
                                                            @error('message')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
        
                                            <div class="form-submit-row">
                                                <button type="button" class="btn btn-normal">Cancel</button>
                                                <button type="submit" class="btn btn-animated btn-submit">Post</button>
                                            </div>
                                            <input type="hidden" name="rated_on_id" value="{{$data->id}}">
                                        </form>
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
    setTimeout(function() {
        $('#message_div').remove();
    }, 5000);
</script>
<script>
    $(document).ready(function() {
        $('.on_time_payment .star').on('click', function() {
            var rating = $(this).data('rating');
            $('#on_time_payment').val(rating);

              // Remove 'selected' class from all stars
            $(this).siblings().removeClass('three');
            $(this).siblings().find('svg').removeClass('three');
            
            // Add 'selected' class to all stars up to the clicked star
            $(this).addClass('three').prevAll().addClass('three');
            $(this).find('svg').addClass('three');
            $(this).prevAll().find('svg').addClass('three');
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.post_delivery_cooperation .star').on('click', function() {
            var rating = $(this).data('rating'); 
            $('#post_delivery_cooperation').val(rating); 

              // Remove 'selected' class from all stars
            $(this).siblings().removeClass('three');
            $(this).siblings().find('svg').removeClass('three');
            
            // Add 'selected' class to all stars up to the clicked star
            $(this).addClass('three').prevAll().addClass('three');
            $(this).find('svg').addClass('three');
            $(this).prevAll().find('svg').addClass('three');
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.genuiness .star').on('click', function() {
            var rating = $(this).data('rating');
            $('#genuiness').val(rating); 

              // Remove 'selected' class from all stars
            $(this).siblings().removeClass('three');
            $(this).siblings().find('svg').removeClass('three');
            
            // Add 'selected' class to all stars up to the clicked star
            $(this).addClass('three').prevAll().addClass('three');
            $(this).find('svg').addClass('three');
            $(this).prevAll().find('svg').addClass('three');
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.on_time_delivery .star').on('click', function() {
            var rating = $(this).data('rating');
            $('#on_time_delivery').val(rating); 

              // Remove 'selected' class from all stars
            $(this).siblings().removeClass('three');
            $(this).siblings().find('svg').removeClass('three');
            
            // Add 'selected' class to all stars up to the clicked star
            $(this).addClass('three').prevAll().addClass('three');
            $(this).find('svg').addClass('three');
            $(this).prevAll().find('svg').addClass('three');
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.right_product .star').on('click', function() {
            var rating = $(this).data('rating');
            $('#right_product').val(rating); 

              // Remove 'selected' class from all stars
            $(this).siblings().removeClass('three');
            $(this).siblings().find('svg').removeClass('three');
            
            // Add 'selected' class to all stars up to the clicked star
            $(this).addClass('three').prevAll().addClass('three');
            $(this).find('svg').addClass('three');
            $(this).prevAll().find('svg').addClass('three');
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.post_delivery_service .star').on('click', function() {
            var rating = $(this).data('rating');
            $('#post_delivery_service').val(rating); 

              // Remove 'selected' class from all stars
            $(this).siblings().removeClass('three');
            $(this).siblings().find('svg').removeClass('three');
            
            // Add 'selected' class to all stars up to the clicked star
            $(this).addClass('three').prevAll().addClass('three');
            $(this).find('svg').addClass('three');
            $(this).prevAll().find('svg').addClass('three');
        });
    });
</script>

@endsection