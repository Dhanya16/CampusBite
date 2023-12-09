<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Admin</title>
        <link rel="icon" type="image/x-icon" href="favicon.ico">

        <!--CSS files-->
        <link href="css/bootstrap.min.css" rel='stylesheet'>
        <link rel="stylesheet" href="css/login.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <style>
            .error-message{
	            color:white;
                
                font-weight:bold;
                
                position: relative;
                top: -20px;
            }
        </style>
        <!--CSS files ends-->

    </head>
    <body>
        <div class="full-page">
            <div id="form" class='page'>
                <div class="form-box">
                    <div class='button-box'>
                        <div id='btn'></div>
                        <button type='button'onclick='login(); hideanothermsg()'class='toggle-btn'>Log In</button>
                        <button type='button'onclick='signup(); hideErrorMessage()'class='toggle-btn'>SignUp</button>
                    </div>

                    <!--Login form-->
                    <div id='loginid'class='login-page'>
                        @if(session('error'))
                            <div id='invalid-error' class="error-message text-center">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form id='login' action='admin' method='POST' class='input-group-login'>
                            @csrf
                            <div class='input-box'>
                                <i class="bx bx-user"></i>
                                <input type='text'class='input-field' name='username' placeholder='Username' required >
                            </div>
                            <div class='input-box'>
                                <i class="bx bx-lock-alt"></i>
                                <input type='password'class='input-field' name='password' placeholder='Enter Password' required>
                            </div>
                            <input type='checkbox' class='check-box' name='remember' id='remember'><span>Remember Password</span>
                            <button type='submit'class='submit-btn'>Log in</button>
                        </form>
                    </div>
                    <!--Login form ends-->

                    <!--Signup form-->
                    <div id='signupid'class='signup-page'>
                        <form id='signup' action='userSign1' method='POST' class='input-group-signup' onsubmit="return validatePassword()">
                            @csrf
                            <div class='input-box'>
                                <i class="bx bx-envelope"></i>
                                <input type='email'class='input-field' name='username' id='email' placeholder='Email Id' required>
                            </div>
                            <div class='input-box'>
                                <i class="bx bx-lock-alt"></i>
                                <input type='password'class='input-field' name='password' id="password" placeholder='Enter Password' required>
                            </div>
                            <div class='input-box'>
                                <i class="bx bx-lock-alt"></i>
                                <input type='password'class='input-field' name='confirm' id="confirm" placeholder='Confirm Password'  required>
                            </div>
                            <input type='checkbox'class='check-box' id="termsCheckbox"><span>I agree to the terms and conditions</span>
                            <button type='submit'class='submit-btn'>Register</button>
                        </form> 
                        <div id="password-error" class="error-message text-center" style="color: white;"></div>
                    </div>
                    <!--Signup form ends-->
                    
                </div>
            </div> 
        </div>

        <!--Js files-->
        <script src="js/jquery-3.5.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/login.js"></script>
        <script>
            function validatePassword() {
                var password = document.getElementById('password').value;
                var confirm = document.getElementById('confirm').value;
                var errorElement = document.getElementById('password-error');
                var email = document.getElementById('email').value;
                var emailPattern = /nmamit\.in$/;
                var termsCheckbox = document.getElementById('termsCheckbox');

                if (password !== confirm) {
                    errorElement.textContent = 'Confirm Password must match Password.';
                    errorElement.style.display = 'block';
                    return false; 
                } else if(!emailPattern.test(email)){
                    errorElement.textContent = 'Email must end with "nmamit.in"';
                    errorElement.style.display = 'block';
                    return false;
                } else if (!termsCheckbox.checked) {
                    alert('Please agree to the terms and conditions.');
                    return false;
                }else {
                    errorElement.style.display = 'none';
                    return true; 
                }
            }
            function hideErrorMessage() {
                var errorElement = document.getElementById('invalid-error');
                errorElement.style.display = 'none';
            }
            function hideanothermsg() {
                var errorElement = document.getElementById('password-error');
                errorElement.style.display = 'none';
            }
        </script>
        <!--Js files ends--> 

    </body>
</html>