<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>CampusBite</title>
        <link rel="icon" type="image/x-icon" href="favicon.ico">

        <!--CSS files-->
        <link href="css/bootstrap.min.css" rel='stylesheet'>
        <link rel="stylesheet" href="css/login.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <!--CSS files ends-->

    </head>
    <body>
        <div class="full-page">
            <div id="form" class='page'>
                <div class="form-box">
                    <div class='button-box'>
                        <div id='btn'></div>
                        <button type='button'onclick='login()'class='toggle-btn'>Log In</button>
                        <button type='button'onclick='signup()'class='toggle-btn'>SignUp</button>
                    </div>

                    <!--Login form-->
                    <div id='loginid'class='login-page'>
                        <form id='login' class='input-group-login'>
                            <div class='input-box'>
                                <i class="bx bx-user"></i>
                                <input type='text'class='input-field'placeholder='Email Id' required >
                            </div>
                            <div class='input-box'>
                                <i class="bx bx-lock-alt"></i>
                                <input type='password'class='input-field'placeholder='Enter Password' required>
                            </div>
                            <input type='checkbox'class='check-box'><span>Remember Password</span>
                            <button type='submit'class='submit-btn'>Log in</button>
                        </form>
                    </div>
                    <!--Login form ends-->

                    <!--Signup form-->
                    <div id='signupid'class='signup-page'>
                        <form id='signup' class='input-group-signup'>
                            <div class='input-box'>
                                <i class="bx bx-user"></i>
                                <input type='text'class='input-field' placeholder='First Name' required>
                            </div>
                            <div class='input-box'>
                                <i class="bx bx-user"></i>
                                <input type='text'class='input-field'placeholder='Last Name ' required>
                            </div>
                            <div class='input-box'>
                                <i class="bx bx-envelope"></i>
                                <input type='email'class='input-field'placeholder='Email Id' required>
                            </div>
                            <div class='input-box'>
                                <i class="bx bx-lock-alt"></i>
                                <input type='password'class='input-field'placeholder='Enter Password' required>
                            </div>
                            <div class='input-box'>
                                <i class="bx bx-lock-alt"></i>
                                <input type='password'class='input-field'placeholder='Confirm Password'  required>
                            </div>
                            <input type='checkbox'class='check-box'><span>I agree to the terms and conditions</span>
                            <button type='submit'class='submit-btn'>Register</button>
                        </form> 
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
        <!--Js files ends--> 

    </body>
</html>
