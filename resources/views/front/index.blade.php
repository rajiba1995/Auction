@extends('front.layout.app')

@section('section')
    <div class="main">
        <div class="inner-page">

            <section class="home-banner-section">
                <!--<div class="container">-->
                <!--    <div class="row">-->
                <!--        <div class="col-12">-->
                            <div class="home-banner">
                                <div class="swiper home-banner-slider">
                                    <div class="swiper-wrapper">
                                        @foreach ($data->banners as $bannerKey => $banner)
                                        {{-- <div class="swiper-slide">
                                            @if($banner->file_path)
                                            <div class="slider-img">
                                                <!-- <a href="#"> -->
                                                    <img src="{{ $banner->file_path}}" alt="">
                                                <!-- </a> -->
                                            </div>
                                            @else
                                            <div class="slider-video">
                                                <video class="banner-slider-video" autoplay="" muted="" loop="">
                                                    <source src="{{ $banner->video_path}}" type="video/mp4"> 
                                                    Your browser does not support the video tag.
                                                </video>
                                            </div>
                                            @endif
                                        </div> --}}
                                        @endforeach
                                        
                                        <div class="swiper-slide">
                                            <div class="slider-img">
                                                <img src="{{asset('frontend/assets/images/home-banner-1.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider-img">
                                                <img src="{{asset('frontend/assets/images/home-banner-2.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider-img">
                                                <img src="{{asset('frontend/assets/images/home-banner-3.jpg')}}" alt="">
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div class="swiper-pagination banner-swiper-pagination"></div>
                                </div>
                                <!-- <div class="banner-swiper-navigation">
                                    <div class="swiper-button-prev banner-swiper-button-prev">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M19 12H5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M12 5L5 12L12 19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="swiper-button-next banner-swiper-button-next">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M12 5L19 12L12 19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </div> -->
                            </div>
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
            </section>
            
            <section class="popular-categories-section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-header">
                                <h2>Explore Popular Categories</h2>
                                <a href="#">
                                    Find More
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M5 12H19" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 5L19 12L12 19" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="swiper pop-cat-slider">
                                <div class="swiper-wrapper">
                            
                                @foreach ($data->categories as $categoryKey => $category)
                                    <div class="swiper-slide">
                                        <div class="content-col">
                                            <div class="category-card">
                                                <img src="{{ $category->image }}">
                                                <div class="category-content">
                                                    <h5>{{$category->title}}</h5>
                                                    <a href="#">
                                                        Explore
                                                        <img src="{{asset('frontend/assets/images/arrow-right-white.png')}}">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                
                                </div>
                                <div class="pop-cat-swiper-navigation">
                                    <div class="swiper-button-prev pop-cat-swiper-button-prev">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M19 12H5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M12 5L5 12L12 19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="swiper-button-next pop-cat-swiper-button-next">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M12 5L19 12L12 19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            
                            
                        
                        </div>
                    </div>
                </div>
            </section>

            <section class="cat-subcat-section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-header">
                                <h2>Category</h2>
                                <a href="#">
                                    Browse More
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M5 12H19" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 5L19 12L12 19" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ( $data->collections as $collectionKey => $collection )
                        {{-- <div class="col-lg-6 col-12 parent-col">
                            <div class="cat-subcat-box" style="background-image:{{asset('frontend/assets/images/arrow-right-white.png')}}">
                                
                                <h4>{{ $collection->title }}</h4>
                            
                                <div class="cat-subcat">
                                    <div class="row">
                                        @if(count($collection->categoryDetails)>0)
                                        @foreach ( $collection->categoryDetails as $key => $item )
                                            @if($key<=1)
                                            <div class="col-md-6 col-12 child-col">
                                                <div class="category-card">
                                                    <img src="{{ $item->image }}" alt="No-Image">
                                                    <div class="category-content">
                                                        <h5>{{ $item->title}}</h5>
                                                        <a href="#">
                                                            Explore
                                                            <img src="{{asset('frontend/assets/images/arrow-right-white.png')}}">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach
                                        @endif
                                        
                                    </div>
                                </div>
                                <a href="#" class="find-more-cta">
                                    Find More
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 12H19" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 5L19 12L12 19" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>                                        
                                </a>
                                    
                            </div>
                        </div> --}}
                        @endforeach
                        
                        <div class="col-lg-6 col-12 parent-col">
                            <div class="cat-subcat-box" style="background-image:url({{asset('frontend/assets/images/category-1.png')}})">
                                <div class="cat-subcat-content">
                                    <div class="wrapper">
                                        <h4>Restaurants</h4>
                                        <a href="#" class="find-more-cta">
                                            Explore
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5 12H19" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M12 5L19 12L12 19" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-12 parent-col">
                            <div class="cat-subcat-box" style="background-image: url({{asset('frontend/assets/images/category-2.png')}})">
                                <div class="cat-subcat-content">
                                    <div class="wrapper">
                                        <h4>Home Decor</h4>
                                        <a href="#" class="find-more-cta">
                                            Explore
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5 12H19" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M12 5L19 12L12 19" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                      
                    </div>
                </div>
            </section>
            
            <section class="single-category-section">
                <div class="container-fluid pe-0">
                    <div class="row m-0 p-0">
                        <div class="col-lg-3 col-md-4 col-12 p-0">
                            <div class="info-content">
                                <div class="section-header">
                                    <h2>Repairs &amp; Services</h2>
                                    <div class="sub-cat-swiper-navigation">
                                        <div class="swiper-button-prev sub-cat-swiper-button-prev sub-cat-1-swiper-button-prev">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M19 12H5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M12 5L5 12L12 19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="swiper-button-next sub-cat-swiper-button-next sub-cat-1-swiper-button-next">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M12 5L19 12L12 19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <a href="#">
                                        Browse More
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M5 12H19" stroke="black" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 5L19 12L12 19" stroke="black" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-12 p-0">
                            <div class="slider-content">
                                <div class="swiper sub-cat-slider sub-cat-slider-1">
                                    <div class="swiper-wrapper">
                                        
                                        <div class="swiper-slide">
                                            <div class="content" style="background-image: url({{asset('frontend/assets/images/repairing-1.png')}})">
                                                <div class="overlay">
                                                    <h4>AC</h4>
                                                    <a href="#">
                                                        Explore
                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M4.16699 10H15.8337" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M10 4.16602L15.8333 9.99935L10 15.8327" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="content" style="background-image: url({{asset('frontend/assets/images/repairing-2.png')}})">
                                                <div class="overlay">
                                                    <h4>Laptop</h4>
                                                    <a href="#">
                                                        Explore
                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M4.16699 10H15.8337" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M10 4.16602L15.8333 9.99935L10 15.8327" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="content" style="background-image: url({{asset('frontend/assets/images/repairing-1.png')}})">
                                                <div class="overlay">
                                                    <h4>Water Purifier</h4>
                                                    <a href="#">
                                                        Explore
                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M4.16699 10H15.8337" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M10 4.16602L15.8333 9.99935L10 15.8327" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
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
            </section>
            
            <section class="register-ad-section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="content">
                                <h2>Register For Free &amp; Start Bidding Now!</h2>
                                <a href="#" class="btn btn-cta btn-animated btn-yellow">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="single-category-section">
                <div class="container-fluid pe-0">
                    <div class="row m-0 p-0">
                        <div class="col-lg-3 col-md-4 col-12 p-0">
                            <div class="info-content">
                                <div class="section-header">
                                    <h2>Transporters</h2>
                                    <div class="sub-cat-swiper-navigation">
                                        <div class="swiper-button-prev sub-cat-swiper-button-prev sub-cat-2-swiper-button-prev">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M19 12H5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M12 5L5 12L12 19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="swiper-button-next sub-cat-swiper-button-next sub-cat-2-swiper-button-next">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M12 5L19 12L12 19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <a href="#">
                                        Browse More
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M5 12H19" stroke="black" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 5L19 12L12 19" stroke="black" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-12 p-0">
                            <div class="slider-content">
                                <div class="swiper sub-cat-slider sub-cat-slider-2">
                                    <div class="swiper-wrapper">
                                        
                                        <div class="swiper-slide">
                                            <div class="content" style="background-image: url({{asset('frontend/assets/images/transporters-1.png')}})">
                                                <div class="overlay">
                                                    <h4>Animal Transporters</h4>
                                                    <a href="#">
                                                        Explore
                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M4.16699 10H15.8337" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M10 4.16602L15.8333 9.99935L10 15.8327" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="content" style="background-image: url({{asset('frontend/assets/images/transporters-2.png')}})">
                                                <div class="overlay">
                                                    <h4>Household Goods</h4>
                                                    <a href="#">
                                                        Explore
                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M4.16699 10H15.8337" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M10 4.16602L15.8333 9.99935L10 15.8327" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="content" style="background-image: url({{asset('frontend/assets/images/transporters-1.png')}})">
                                                <div class="overlay">
                                                    <h4>Vehicles Transporters</h4>
                                                    <a href="#">
                                                        Explore
                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M4.16699 10H15.8337" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M10 4.16602L15.8333 9.99935L10 15.8327" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
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
            </section>

            <!-- <section class="how-it-works-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-12 left-col">
                            <div class="inner">
                                <img src="assets/images/character.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7 col-12 right-col">
                            <div class="inner">
                                <div class="section-header">
                                    <h2>How it works?</h2>
                                </div>
                                <div class="row content">
                                    <div class="col-lg-6 col-12">
                                        <div class="content-box">
                                            <div class="numbering">1</div>
                                            <h6>Where does it come from?</h6>
                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="content-box">
                                            <div class="numbering">2</div>
                                            <h6>Where can I get some?</h6>
                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="content-box">
                                            <div class="numbering">3</div>
                                            <h6>Why do we use it?</h6>
                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="content-box">
                                            <div class="numbering">4</div>
                                            <h6>What is Lorem Ipsum?</h6>
                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->

            <section class="tutorials-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-header">
                                    <h2>Video Tutorials</h2>
                                    <div class="tutorial-swiper-navigation">
                                        <div class="swiper-button-prev tutorial-swiper-button-prev">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M19 12H5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M12 5L5 12L12 19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="swiper-button-next tutorial-swiper-button-next">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M12 5L19 12L12 19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tutorials-block">
                        <div class="container-fluid pe-0">
                            <div class="swiper tutorials-slider">
                            <div class="swiper-wrapper">
                                @foreach ( $data->tutorials as $tutorialKey => $tutorial )
                                <div class="swiper-slide">
                                    <div class="tutorial-content">
                                        {{-- <img src="assets/images/tutorials1.png" alt=""> --}}
                                        <video autoplay loop muted src="{{ $tutorial->file_path }}"></video>
                                        {{-- <div class="bottom-content">
                                            <h5>Automobile</h5>
                                            <a href="#">
                                                Explore
                                                <img src="{{asset('frontend/assets/images/arrow-right-white.png')}}">
                                            </a>
                                        </div> --}}
                                        <div class="overlay-content">
                                            <img src="{{asset('frontend/assets/images/video.png')}}">
                                            <span>Tutorial Heading</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                               
                            </div>
                            <!--<div class="swiper-pagination tutorials-swiper-pagination"></div>-->
                        </div>
                        </div>
                    </div>
            </section>

            <section class="testimonial-section">
                <div class="container">
                    <h2 class="section-heading"> What our customers <br> are saying ?</h2>

                    <div class="tetimonial-top">
                        <div class="swiper testi-top">
                            <div class="swiper-wrapper">

                                <div class="swiper-slide">
                                    <div class="testi-inner">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of...</p>
                                        <h3>Alexandra Nguyen</h3>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="testi-inner">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of...</p>
                                        <h3>Alexandra Nguyen</h3>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="testi-inner">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of...</p>
                                        <h3>Alexandra Nguyen</h3>
                                    </div>
                                </div>
                                
                                <div class="swiper-slide">
                                    <div class="testi-inner">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of...</p>
                                        <h3>Alexandra Nguyen</h3>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="tetimonial-bottom">
                        <div class="swiper testi-bottom">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="testi-bloger">
                                        <img src="https://as2.ftcdn.net/v2/jpg/03/64/21/11/1000_F_364211147_1qgLVxv1Tcq0Ohz3FawUfrtONzz8nq3e.jpg">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testi-bloger">
                                        <img src="https://as2.ftcdn.net/v2/jpg/06/90/85/01/1000_F_690850105_JfG4fC2aN96JkGUQlA71gEmPycjj2E8n.jpg">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testi-bloger">
                                        <img src="https://as1.ftcdn.net/v2/jpg/06/90/84/82/1000_F_690848234_QCXW1ymbqyRwVNol9kua0ixtUAEXa2E5.jpg">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testi-bloger">
                                    <img src="https://as1.ftcdn.net/v2/jpg/04/36/28/10/1000_F_436281035_2YRDwazayWXrhKvqu5kEl7w4L34ZU2fN.jpg">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            
            <section class="our-brands-section">
                <div class="section-header">
                    <h2>Our Clients</h2>
                </div>
                <div class="brand-slider">
                    <div class="swiper brands-slider">
                        <div class="swiper-wrapper">
                            @foreach ( $data->clients as $clientKey => $client )
                            <div class="swiper-slide">
                                <img src="{{ $client->image }}" alt="">
                                </div>  
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </section>

            {{-- <section class="customer-saying-section">
                <div class="inner-wrap">
                    <div class="background">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-12 "></div>
                                <div class="col-xl-9 col-lg-8 col-12 "></div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row heading-row">
                            <div class="col-xl-3 col-lg-4 col-12">
                                <h2>What our customers are saying ?</h2>
                            </div>
                            <div class="col-xl-9 col-lg-8 col-12"></div>
                        </div>
                        <div class="customer-swiper-navigation">
                            <div class="swiper-button-prev customer-swiper-button-prev">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M19 12H5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 5L5 12L12 19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="swiper-button-next customer-swiper-button-next">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 5L19 12L12 19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </div>
                        <div class="swiper customer-saying-slider">
                            <div class="swiper-wrapper">
                                @foreach ( $data->feedbacks as $feedbackKey => $feedback )
                                <div class="swiper-slide">
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-4 col-12">
                                            <div class="customer-saying-logo">
                                                <img src="{{ $feedback->logo}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-xl-9 col-lg-8 col-12">
                                            <div class="customer-saying-content">
                                                <div class="quote-icon">
                                                    <img src="{{asset('frontend/assets/images/quote.png')}}" alt="">
                                                </div>
                                                <p class="saying">{!! $feedback->message !!}</p>
                                                <p class="name color-red">{{ $feedback->customer_name }}</p>
                                                <p class="designation">{{ $feedback->customer_designation}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </section> --}}
            
            <section class="customer-saying-section-new">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-heading">
                                
                            </div>
                            <div class="section-slider">
                                <div class="upper-slider">
                                    
                                </div>
                                <div class="lower-slider">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- <section class="blogs-section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-header">
                                <h2>Latest Blogs</h2>
                                <a href="#">
                                    Find More
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M5 12H19" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 5L19 12L12 19" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        @foreach ( $data->blogs as $blogKey => $blog )
                        <div class="col-lg-4 col-md-6 col-12 blog-col">
                            <div class="card blog-card">
                                <div class="card-img">
                                    <img src="{{ $blog->image }}" alt="">
                                </div>
                                <div class="card-body">
                                    <div class="card-title">{{ $blog->title }}</div>
                                    <div class="card-text">{!! $blog->short_desc !!}</div>
                                    <a href="#">
                                        Read More
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M5 12H19" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M12 5L19 12L12 19" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                        
                    </div>
                </div>
            </section> -->
            
        </div>
    </div>

   @endsection