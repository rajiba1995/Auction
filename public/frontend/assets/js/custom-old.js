document.addEventListener("DOMContentLoaded", () => {
    // var otpInputs = document.querySelectorAll('otp-input');

    // otpInputs.forEach((element, index) => {
    //     console.log('here' + index);
    //     element.addEventListener("keyup", ()=> {
    //         if (element.value.length === element.maxLength && index < otpInputs.length - 1) {
    //             otpInputsArray[index + 1].focus();
    //         }
    //     });
    // });

    var homeBannerSwiper = new Swiper(".home-banner-slider", {
        slidesPerView: 1, 
        spaceBetween: 0,
        // effect: 'fade',
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        // navigation: {
        //     nextEl: ".banner-swiper-button-next",
        //     prevEl: ".banner-swiper-button-prev",
        // },
        pagination: {
            el: ".banner-swiper-pagination",
            clickable: true
        },
    });

    var tutorialsSlider = new Swiper(".tutorials-slider", {
        slidesPerView: 2, 
        spaceBetween: 20,
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".tutorials-swiper-pagination",
            clickable: true
        },
    });

    
    var brandsSwiper = new Swiper(".brands-slider", {
        slidesPerView: 6, 
        spaceBetween: 40,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        breakpoints: {
            320: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 4,
            },
            992: {
                slidesPerView: 5,
            },
        }
    });

    var customerSayingSwiper = new Swiper(".customer-saying-slider", {
        slidesPerView: 1, 
        spaceBetween: 0,
        navigation: {
            nextEl: ".customer-swiper-button-next",
            prevEl: ".customer-swiper-button-prev",
        },
    });

    $("input[name='sendwatchlist']").click(function() {
        var inputval = $(this).val();
        if(inputval == "sendwatchlistgroup") {
            $("#watchlistoptions").addClass('show');
        } else {
            $("#watchlistoptions").removeClass('show');
        }
    });

    $("input[name='sendinquirylist']").click(function() {
        var inputval = $(this).val();
        if(inputval == "sendinquiryexisting") {
            $("#inquiryoptions").addClass('show');
        } else {
            $("#inquiryoptions").removeClass('show');
        }
    });

    $("input[name='auctiontype']").click(function() {
        var inputval = $(this).val();
        if(inputval == "openauction") {
            $("#openAuctionOptions").addClass('show');
        } else {
            $("#openAuctionOptions").removeClass('show');
        }
    });
    
});

function registerOtp() {
    $("#registerOtpModal").modal("show");
}

