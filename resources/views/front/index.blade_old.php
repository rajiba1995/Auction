@extends('front.layout.app')

@section('section')
    <div class="main">
        <div class="inner-page">

            <section class="home-banner-section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="home-banner">
                                <div class="swiper home-banner-slider">
                                    <div class="swiper-wrapper">
                                        @foreach ($data->banners as $bannerKey => $banner)
                                        <div class="swiper-slide">
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
                                        </div>
                                        @endforeach
                                       
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
                        </div>
                    </div>
                </div>
            </section>

            <section class="cat-subcat-section">
                <div class="container">
                    <div class="row">
                        @foreach ( $data->collections as $collectionKey => $collection )
                        <div class="col-lg-6 col-12 parent-col">
                            <div class="cat-subcat-box">
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
                        </div>
                        @endforeach
                        
                      
                    </div>
                </div>
            </section>

            <section class="popular-categories-section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-header">
                                <h2>Popular Categories</h2>
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
                    @foreach ($data->categories as $categoryKey => $category)
                        <div class="col-lg-3 col-sm-6 col-12 content-col">
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
                    @endforeach
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
                                <h2>Tutorials</h2>
                            </div>
                        </div>
                    </div>
                    <div class="tutorials-block">
                        <div class="swiper tutorials-slider">
                            <div class="swiper-wrapper">
                                @foreach ( $data->tutorials as $tutorialKey => $tutorial )
                                <div class="swiper-slide">
                                    <div class="tutorial-content">
                                        {{-- <img src="assets/images/tutorials1.png" alt=""> --}}
                                        <video autoplay loop muted src="{{ $tutorial->file_path }}"></video>
                                        <div class="bottom-content">
                                            <h5>Automobile</h5>
                                            <a href="#">
                                                Explore
                                                <img src="{{asset('frontend/assets/images/arrow-right-white.png')}}">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                               
                            </div>
                            <div class="swiper-pagination tutorials-swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="our-brands-section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-header">
                                <h2>Our Clients</h2>
                            </div>
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
                    </div>
                </div>
            </section>

            <section class="customer-saying-section">
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
            </section>

            <section class="blogs-section">
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
            </section>
            
        </div>
    </div>

   @endsection