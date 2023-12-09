<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="favicon.ico">
        <title>CampusBite</title>

        <!--CSS files-->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/loader.css" rel="stylesheet">
        <link href="css/header.css" rel="stylesheet">
        <link href="css/search.css" rel="stylesheet">
        <link href="css/footer.css" rel="stylesheet">
        <style>
            body{
                background:linear-gradient(to right,#190F0E,#42251D);
                color:white;
                text-align:justify;
            }
        </style>
        <!--CSS files ends-->

    </head>
    <body>
        <!--Header section-->
        <header>
            <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="index">
                        <img src="images/logo.png" alt="Foodie Delights Logo" width="50" height="50" style="width:30px;height:30px;border-radius:50%;border:2px solid white;">
                        CampusBite
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span style="color:white;">☰</span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="index">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="categories" id="categoriesDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Categories
                                </a>
                                <div class="dropdown-menu" aria-labelledby="categoriesDropdown">
                                    <a class="dropdown-item" href="category1">Chinese</a>
                                    <a class="dropdown-item" href="category2">Chaats</a>
                                    <a class="dropdown-item" href="category3">Ice Cream</a>
                                    <a class="dropdown-item" href="category4">Meal & Pulao</a>
                                    <a class="dropdown-item" href="category5">Juice</a>
                                    <a class="dropdown-item" href="category6">Milkshakes</a>
                                    <a class="dropdown-item" href="category7">South Indian Snacks</a>
                                    <a class="dropdown-item" href="category8">Snacks</a>
                                    <a class="dropdown-item" href="category9">Dosa</a>
                                    <a class="dropdown-item" href="category10">Special Dosa</a>
                                    <a class="dropdown-item" href="category11">Sweets</a>
                                    <a class="dropdown-item" href="category12">Gravys</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Order</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="aboutus">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mr-5" href="feedback">Reviews</a>
                            </li>
                            <li class="nav-item">
                                <a href="login">
                                    <img src="images/usericon.png" alt="user" width="50" height="50" style="width:50px;height:50px;border-radius:50%;border:2px solid white;">
                                </a>
                            </li>
                            <li class="nav-item">
                                <p style="color:white;margin-top:10px;">
                                    @if (session('email'))
                                        <?php
                                            $user = DB::table('users')->where('email', session('email'))->first();
                                        ?>
                                        {{ $user->fname }}
                                    @endif
                                </p>
                            </li>
                            <li class="nav-item">
                                <a class="btn ml-4 swiggy-button" href="logout">Logout</a>
                            </li><br>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <!--Header section ends-->  
        
        <!--Main section-->
        <section class="container mt-5 pt-5">
    <div class="row">
        <div class="col-md-6">
            <h2>About CampusBite</h2>
            <p class="mt-5">
                Welcome to CampusBite, your go-to destination for delicious and diverse culinary experiences. We believe in bringing campus communities together through the joy of good food.
            </p>
            <p>
                At CampusBite, we curate a delightful menu that caters to a variety of tastes, from Chinese cuisine to savory Chaats, refreshing Juices to mouth-watering Sweets. Our goal is to satisfy your cravings and make every meal a memorable experience.
            </p>
            <p>
                Whether you're a student looking for a quick bite between classes or a food enthusiast exploring new flavors, CampusBite has something for everyone. Join us on a culinary journey that celebrates the rich tapestry of flavors and brings people closer through shared meals.
            </p>
        </div>
        <div class="col-md-6">
            <h2 class="text-center"><p>Under the Guidance of</p><p class="text-center"> Dr. Pradeep Kanchan</p><p class="text-center"> Assistant Professor Gd-III</p></h2>
            <div class="d-flex justify-content-center">
            <img src="images/mentor.png" alt="Mentor Image" class="img-fluid mb-4" style="border-radius: 50%;">
        </div>
            <p class="text-center">
                NMAM Institute of Technology, Nitte, Karkala, Udupi
            </p>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <h2>Meet the Team</h2>
        </div>
        <div class="col-md-6">
            <h3 class="text-center">Avisha V Shetty</h3>
            <p>
                Hi there! I am Avisha, co-creator of CampusBite. Passionate about food and dedicated to creating a platform that connects people through delicious experiences. I believe in the power of good food to foster a sense of community and joy.
            </p>
        </div>
        <div class="col-md-6">
            <h3 class="text-center">Dhanya</h3>
            <p>
                Greetings! I am Dhanya, co-creator of CampusBite. My love for diverse cuisines and commitment to delivering quality meals drive our mission to make CampusBite a culinary heaven for everyone.
            </p>
        </div>
    </div>
</section>
        <!--Main section ends-->
        
        <!--Footer section-->
        <footer class="bg-dark text-light p-3 mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="footer-section">
                            <a href="login">
                                <img src="images/logo.png" alt="Logo" class="img-fluid mb-3" style="width:150px;height:150px;border-radius:50%;border:2px solid white;">
                            </a>
                            <a href="login">
                                <h4>CampusBite</h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="footer-section" id="quicklinks">
                            <h4>Quick Links</h4>
                            <ul class="list-unstyled">
                                <li><a href="login">Home</a></li>
                                <li><a href="login">Order</a></li>
                                <li><a href="login">Comment</a></li>
                                <li><a href="login">History</a></li>
                                <li><a href="login">Categories</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="footer-section">
                            <h4>Contact Us</h4>
                            <p>Email: info@yourwebsite.com</p>
                            <p>Phone: (123) 456-7890</p>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12 text-center">
                        <p>&copy; 2023 CampusBite</p>
                        <a href="login">Privacy Policy</a> | <a href="login">Terms of Service</a>
                    </div>
                </div>
            </div>
        </footer>
        <!--Footer section ends-->

        <!--JS files-->
        <script src="js/jquery-3.5.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/loader.js"></script>
        <!--JS files ends--> 
    </body>
</html>