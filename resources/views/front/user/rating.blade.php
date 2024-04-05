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
@endsection