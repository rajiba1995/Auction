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
        // autoplay: {
        //     delay: 5000,
        //     disableOnInteraction: false,
        // },
        // navigation: {
        //     nextEl: ".banner-swiper-button-next",
        //     prevEl: ".banner-swiper-button-prev",
        // },
        pagination: {
            el: ".banner-swiper-pagination",
            clickable: true
        },
    });
    
    var subCat1Swiper = new Swiper(".sub-cat-slider-1", {
        slidesPerView: 'auto',
        spaceBetween: 18,
        navigation: {
            nextEl: ".sub-cat-1-swiper-button-next",
            prevEl: ".sub-cat-1-swiper-button-prev",
        },
    });
    
    var subCat1Swiper = new Swiper(".sub-cat-slider-2", {
        slidesPerView: 'auto',
        spaceBetween: 18,
        navigation: {
            nextEl: ".sub-cat-2-swiper-button-next",
            prevEl: ".sub-cat-2-swiper-button-prev",
        },
    });
    
    var homeBannerSwiper = new Swiper(".pop-cat-slider", {
        slidesPerView: 4,
        spaceBetween: 18,
        navigation: {
            nextEl: ".pop-cat-swiper-button-next",
            prevEl: ".pop-cat-swiper-button-prev",
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            },
            1199: {
                slidesPerView: 4,
            },
        }
    });

    var tutorialsSlider = new Swiper(".tutorials-slider", {
        slidesPerView: 'auto',
        spaceBetween: 28,
        // loop: true,
        // autoplay: {
        //     delay: 2500,
        //     disableOnInteraction: false,
        // },
        // pagination: {
        //     el: ".tutorials-swiper-pagination",
        //     clickable: true
        // },
        navigation: {
            nextEl: ".tutorial-swiper-button-next",
            prevEl: ".tutorial-swiper-button-prev",
        },
    });


    var brandsSwiper = new Swiper(".brands-slider", {
        slidesPerView: 'auto',
        spaceBetween: 80,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        // breakpoints: {
        //     320: {
        //         slidesPerView: 2,
        //     },
        //     768: {
        //         slidesPerView: 4,
        //     },
        //     992: {
        //         slidesPerView: 5,
        //     },
        // }
    });

    var customerSayingSwiper = new Swiper(".customer-saying-slider", {
        slidesPerView: 1,
        spaceBetween: 0,
        navigation: {
            nextEl: ".customer-swiper-button-next",
            prevEl: ".customer-swiper-button-prev",
        },
    });

    $("input[name='sendwatchlist']").click(function () {
        var inputval = $(this).val();
        if (inputval == "sendwatchlistgroup") {
            $("#watchlistoptions").addClass('show');
            $("#single_watchlist_div").hide();
        } else {
            $("#watchlistoptions").removeClass('show');
            $("#single_watchlist_div").show();
        }
    });

    $("input[name='sendinquirylist']").click(function () {
        var inputval = $(this).val();
        if (inputval == "sendinquiryexisting") {
            $("#inquiryoptions").addClass('show');
        } else {
            $("#inquiryoptions").removeClass('show');
        }
    });
    $("input[name='inquiry_type']").click(function () {
        var inputval = $(this).val();
        if (inputval == "existing-inquiry") {
            $("#inquiryoptions").addClass('show');
        } else {
            $("#inquiryoptions").removeClass('show');
        }
    });


    // $("input[name='auctionfrom']").click(function () {
    //     var inputval = $(this).val();
    //     if (inputval == "region") {
    //         $("#selectRegion").addClass('show');
    //     } else {
    //         $("#selectRegion").removeClass('show');
    //     }
    // });
    $("input[name='supplier_location']").click(function () {
        var inputval = $(this).val();
        if (inputval == "region") {
            $("#selectRegion").addClass('show');
        } else {
            $("#selectRegion").removeClass('show');
        }
    });

    $(".solid-stars").each(function () {
        var ratingValue = $(this).data("rating");
        var solidStarsWidth = ((Number(ratingValue) / 5) * 100);
        $(this).css("width", solidStarsWidth + "%");
    });

    $("input[name='rateas']").click(function () {
        var inputval = $(this).val();
        if (inputval == 1) {
            $("#ratingInputsBidder").removeClass('show');
            $("#ratingInputsAuctioneer").addClass('show');
        } else if (inputval == 2) {
            $("#ratingInputsAuctioneer").removeClass('show');
            $("#ratingInputsBidder").addClass('show');
        }
    });

    $("input[name='prodserv']").click(function () {
        var inputval = $(this).val();
        if (inputval == "productdetails") {
            $("#serviceInputs").removeClass('show');
            $("#productInputs").addClass('show');
        } else if (inputval == "servicedetails") {
            $("#productInputs").removeClass('show');
            $("#serviceInputs").addClass('show');
        }
    });

    $("input[name='consumption']").click(function () {
        var inputval = $(this).val();
        if (inputval == "daily") {
            $("#yearlyConsumptionInputs").removeClass('show');
            $("#dailyConsumptionInputs").addClass('show');
        } else if (inputval == "yearly") {
            $("#dailyConsumptionInputs").removeClass('show');
            $("#yearlyConsumptionInputs").addClass('show');
        }
    });

    $("#sidebarOpener").on("click", function () {
        $(".sidebar-toggler").hide();
        $("#profileSidebar").addClass("show");
    });

    $("#sidebarClose").on("click", function () {
        $(".sidebar-toggler").show();
        $("#profileSidebar").removeClass("show");
    });

    $("input[name='allotrate']").click(function () {
        var inputval = $(this).val();
        if (inputval == "yes") {
            $("#allotAmount").prop('disabled', true);
        } else if (inputval == "no") {
            $("#allotAmount").prop('disabled', false);
        }
    });

    var currentDate = new Date();

    /*$("#filterStartDate").datepicker({
        defaultDate: currentDate,
        dateFormat: "d M, yy",
        onSelect: function (dateText) {
            $("#filterSelectedStartDate").text(dateText);
        }
    });

    $("#filterSelectedStartDate").text($.datepicker.formatDate("d M, yy", currentDate));

    $("#filterSelectedStartDate").on("click", function () {
        $("#filterStartDate").datepicker("show");
    });

    $("#filterEndDate").datepicker({
        defaultDate: currentDate,
        dateFormat: "d M, yy",
        onSelect: function (dateText) {
            $("#filterSelectedEndDate").text(dateText);
        }
    });

    $("#filterSelectedEndDate").text($.datepicker.formatDate("d M, yy", currentDate));

    $("#filterSelectedEndDate").on("click", function () {
        $("#filterEndDate").datepicker("show");
    });*/

    $(".read-more span").on("click", function () {
        if ($(this).parent().parent().find("p").hasClass("hidden")) {
            $(this).parent().parent().find("p").removeClass("hidden");
            $(this).text("read less");
        } else {
            $(this).parent().parent().find("p").addClass("hidden");
            $(this).text("read more");
        }
    });

    $(".see-more span").on("click", function () {
        if ($(this).parent().parent().find("ul.participant-data-list").hasClass("hidden")) {
            $(this).parent().parent().find("ul.participant-data-list").removeClass("hidden");
            $(this).text("see less");
        } else {
            $(this).parent().parent().find("ul.participant-data-list").addClass("hidden");
            $(this).text("see more");
        }
    });


    var testiBottomSwiper = new Swiper(".testi-bottom", {
        loop: true,
        spaceBetween: 10,
        centeredSlides: true,
        slidesPerView: 3,
        autoplay:true,
        freeMode: true,
        watchSlidesProgress: true,
      });
    var testiTopSwiper = new Swiper(".testi-top", {
        loop: true,
        spaceBetween: 10,
        autoplay:true,
        // navigation: {
        //   nextEl: ".swiper-button-next",
        //   prevEl: ".swiper-button-prev",
        // },
        thumbs: {
          swiper: testiBottomSwiper,
        },
    });



});

function registerOtp() {
    $("#registerOtpModal").modal("show");
}

// Funtion to update rating
function giveRating(element, n) {

    var allChilds = element.parentElement.getElementsByTagName('li');
    console.log(allChilds);
    let i = 0;
    while (i < 5) {
        allChilds[i].className = "star";
        i++;
    }

    for (let i = 0; i < n; i++) {
        if (n == 1) cls = "one";
        else if (n == 2) cls = "two";
        else if (n == 3) cls = "three";
        else if (n == 4) cls = "four";
        else if (n == 5) cls = "five";
        allChilds[i].className = "star " + cls;
    }
}
$("form").submit(function () {
    // Disable the submit button
    $("button[type='submit']").prop("disabled", true);

    // Enable the submit button after 5 seconds
    setTimeout(function () {
        $("button[type='submit']").prop("disabled", false);
    }, 3000); // 5000 milliseconds = 5 seconds
});

$("form :input").change(function () {
    $("button[type='submit']").prop("disabled", false);
});
$("form select").change(function () {
    $("button[type='submit']").prop("disabled", false);
});