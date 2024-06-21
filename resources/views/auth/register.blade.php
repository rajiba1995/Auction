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
    
    <div class="main">
        <div class="outer-page-wrapper">
            <div class="page-content">
                <div class="form-content">
                    <div class="login-logo">
                        <img src="https://milaapp.in/frontend/assets/images/logo.png">
                    </div>
                    <h2>Sign Up your Account</h2>
                    <form id="registerForm">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Full Name*</label>
                            <input type="text" class="form-control border-red" placeholder="Ex, John Doe" name="full_name">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email Address*</label>
                            <input type="email" class="form-control border-red" placeholder="Ex, info@auction.com" name="email">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Password*</label>
                            <input type="password" class="form-control border-red" placeholder="............." name="password"> 
                        </div>
                        <div class="form-group">
                            <label class="form-label">Confirm Password*</label>
                            <input type="password" class="form-control border-red" placeholder="............." name="cpassword"> 
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone Number*</label>
                            <input type="text" class="form-control border-red" placeholder="Ex, xxxxxxxxxx" name="phone">
                        </div>
                        <div id="alertContainer">

                        </div>
                        <!-- <input type="submit" class="btn btn-animated" value="Register Now"> -->
                        <button type="submit" class="btn btn-animated">Register Now</button>
                        {{-- onclick="registerOtp()" --}}
                        <div class="resend-block mt-4">
                            <label>If you already have an account,</label>
                            <a href="{{route('login')}}">Login Here</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade register-otp-modal" id="registerOtpModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-content">
                        <div class="top-icon">
                            <div class="icon-holder">
                                <img src="{{asset('assets/images/verify-icon.png')}}" alt="">
                            </div>
                        </div>
                        <h2>Enter OTP Code</h2>
                        <form class="otp-form">
                            <div class="form-input-group">
                                <input type="text" class="form-control otp-input border-red" maxlength="1">
                                <input type="text" class="form-control otp-input border-red" maxlength="1">
                                <input type="text" class="form-control otp-input border-red" maxlength="1">
                                <input type="text" class="form-control otp-input border-red" maxlength="1">
                            </div>
                            <input type="submit" value="Verify OTP" class="btn btn-animated">
                        </form>
                        <div class="resend-block">
                            <label>Didn&apos;t Receive the OTP? Retry in <span id="timer_counter">00:10</span></label>
                            <a href="javascript:void(0)" id="resend_otp_button" style="display: none;">Resend OTP</a>
                        </div>
                    </div>
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

        $(document).ready(function() {
            $('#registerForm').submit(function(e) {
                e.preventDefault(); // Prevent default form submission
                // Perform client-side validation using jQuery Validation plugin
                if ($(this).valid()) {
                    var randomNumber = getRandomNumber(1000, 9999);
                    var formData = $(this).serialize() + '&randomNumber=' + randomNumber;
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('register-check') }}", // Replace with your Laravel route for registration
                        data: formData, // Serialize form data
                        success: function(response) {
                            if(response.status==500){
                                var alertMessage = $('<div class="alert alert-danger" role="alert">Your email and mobile number are already registered. Please <a href="{{route("login")}}"><strong>login now</strong></a></div>');
                                // Append the alert to a container element (assuming there's a container with the id "alertContainer")
                                $('#alertContainer').append(alertMessage);
                                setTimeout(function() {
                                    alertMessage.remove();
                                }, 5000); // 5000 milliseconds = 5 seconds
                            }else{
                                window.location.href = response.route; 
                            }
                        },
                        error: function(xhr, status, error) {
                            // Handle error response from server
                            console.error(xhr.responseText);
                            // You can display an error message to the user here
                        }
                    });
                }
            });

            // Initialize jQuery Validation plugin
            $('#registerForm').validate({
                rules: {
                    // Define validation rules for form fields
                    // You can customize these rules as per your requirements
                    'full_name': {
                        required: true
                    },
                    'email': {
                        required: true,
                        email: true
                    },
                    'password': {
                        required: true
                    },
                    'cpassword': {
                        required: true,
                        equalTo: '[name="password"]' // Ensure password matches the confirmation
                    },
                    'phone': {
                        required: true,
                        minlength: 10, // Minimum length of 10 characters
                        maxlength: 12, // Maximum length of 12 characters
                        digits: true
                    }
                },
                messages: {
                    // Define custom error messages for form fields
                    // You can customize these messages as per your requirements
                    'full_name': {
                        required: "Please enter your full name"
                    },
                    'email': {
                        required: "Please enter your email address",
                        email: "Please enter a valid email address"
                    },
                    'password': {
                        required: "Please enter a password"
                    },
                    'cpassword': {
                        required: "Please confirm your password",
                        equalTo: "Passwords do not match"
                    },
                    'phone': {
                        required: "Please enter your phone number",
                        minlength: "Phone number must be at least 10 characters long",
                        maxlength: "Phone number must not exceed 12 characters"
                    }
                }
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
