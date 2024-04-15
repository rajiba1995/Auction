<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auction</title>

    <link rel="stylesheet" href="{{asset('frontend/assets/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}">
</head>
<body>
    @if(session()->has('user'))
        @php
            $user = session('user');
            $otp = session('otp')?session('otp'):"";
        @endphp
    @endif
    <div class="main">
        <div class="outer-page-wrapper">
            <div class="page-content">
                <div class="form-content">
                        {{-- 1 --}}
                        @if(($user->email_status == 0 || $user->mobile_status == 0) && empty($otp))
                        <div class="page-inner-content" id="first_form">
                            <form>
                                <h1 class="color-red">Auction</h1>
                                <p class="sub-text">It is a long established fact that a reader will be distracted</p>
                                <ul class="verfication-status">
                                    <li id="email_status">
                                        @if($user->email_status==1)
                                            <img src="{{asset('frontend/assets/images/success.png')}}" alt="">
                                        @else
                                            <img src="{{asset('frontend/assets/images/failed.png')}}" alt="">
                                        @endif
                                           
                                        Email ID Verification {{$user->email_status==1?"Verified":"Pending"}}
                                    </li>
                                    <li id="mobile_status">
                                        @if($user->mobile_status==1)
                                            <img src="{{asset('frontend/assets/images/success.png')}}" alt="">
                                        @else
                                            <img src="{{asset('frontend/assets/images/failed.png')}}" alt="">
                                        @endif
                                        Mobile Number {{$user->mobile_status==1?"Verified":"Pending"}}
                                    </li>
                                </ul>
                                <button type="submit" class="btn btn-animated btn-cta">Try Again</button>
                            </form>
                        </div>
                        @elseif($user->mobile_status == 1 && $user->email_status == 0 && !empty($otp))
                                <div class="page-inner-content" id="second_form">
                                    <div class="top-icon">
                                        <div class="icon-holder">
                                            <img src="{{asset('frontend/assets/images/verify-icon.png')}}" alt="">
                                        </div>
                                    </div>
                                    <h3>A verification link has been sent to your email account</h3>
                                    <p>Please click on the link that has just been sent to your email account to verify your email and continue the registration proceess</p>
                                </div>
                            @else
                            {{-- 3 --}}
                            <div class="top-icon" id="third_form">
                                <div class="icon-holder">
                                    <img src="{{asset('frontend/assets/images/verify-icon.png')}}" alt="">
                                </div>
                            </div>
                            <h2>Enter OTP Code</h2>
                            <form class="otp-form">
                                <div class="form-input-group">
                                    <input type="text" name="otp[]" class="form-control otp-input border-red" maxlength="1" required>
                                    <input type="text" name="otp[]" class="form-control otp-input border-red" maxlength="1" required>
                                    <input type="text" name="otp[]" class="form-control otp-input border-red" maxlength="1" required>
                                    <input type="text" name="otp[]" class="form-control otp-input border-red" maxlength="1" required>
                                </div>
                                <p class="error" id="error"></p>
                                <input type="submit" value="Verify OTP" class="btn btn-animated" id="registerForm">
                            </form>
                            <div class="resend-block">
                                <label>Didn&apos;t Receive the OTP? Retry in <span id="timer_counter">00:10</span></label>
                                <a href="javascript:void(0)" id="resend_otp_button" style="display: none;">Resend OTP</a>
                            </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/fontawesome.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/custom.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    
    <script>
       function getRandomNumber(min, max) {
            return Math.floor(Math.random() * (max - min) + min);
        }

        $(document).ready(function(){
            $('.otp-form').submit(function(event){
                event.preventDefault(); 
                var otpValues = $('input[name="otp[]"]').map(function(){
                    return $(this).val();
                }).get().join('');
                $.ajax({
                    type: 'GET',
                    url: "{{route('front.otp_validation.check')}}", // Replace with your server URL
                    data: {otp:otpValues}, // Serialize form data
                    success: function(response) {
                        console.log(response);
                        if(response.status==200){
                            window.location.href = "{{route('front.otp_validation')}}";
                        }
                        if(response.status==500){
                            $('#error').text(response.message);
                            $('.otp-form')[0].reset();
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error response from server
                        console.error(xhr.responseText);
                        // You can display an error message to the user here
                    }
                });
            });
        });
        // localStorage.clear();

        // Resend OTP
        $(document).ready(function() {
            // Event handler for the "Resend OTP" button
            $('#resend_otp_button').on('click', function() {
                var randomNumber = getRandomNumber(1000, 9999);
                localStorage.clear();
                localStorage.setItem('otp', randomNumber);
                $('#registerOtpModal').modal({ backdrop: 'static', keyboard: false });
                setTimeout(function() {
                    $('#resend_otp_button').show();
                }, 2000); 
               
                $('#registerOtpModal').on('shown.bs.modal', function (e) {
                    var timerSpan = $('#timer_counter'); // Get the span element where the timer will be displayed
                    var timerSeconds = 10; // Initial number of seconds
                    var timerMinutes = 0; // Initial number of minutes

                    // Function to update the timer display
                    function updateTimer() {
                        // Format the timer display as "mm:ss"
                        var minutesDisplay = timerMinutes < 10 ? '0' + timerMinutes : timerMinutes;
                        var secondsDisplay = timerSeconds < 10 ? '0' + timerSeconds : timerSeconds;
                        timerSpan.text(minutesDisplay + ':' + secondsDisplay);

                        // Decrement the timer
                        if (timerSeconds > 0) {
                            timerSeconds--;
                        } else {
                            if (timerMinutes > 0) {
                                timerMinutes--;
                                timerSeconds = 10;
                            } else {
                                // Timer has reached 0:00
                                clearInterval(timerInterval); // Stop the timer
                                // Additional actions after timer expiration
                                $('#resend_otp_button').show(); // Show the "Resend OTP" button
                            }
                        }
                    }
                    // Initial call to update the timer display
                    updateTimer();

                    // Update the timer display every second
                    var timerInterval = setInterval(updateTimer, 1000);
                });
            });
        });
    </script>
</body>
</html>
