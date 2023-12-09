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
        <link href="css/hero.css" rel="stylesheet">
        <link href="css/categories.css" rel="stylesheet">
        <link href="css/search.css" rel="stylesheet">
        <link href="css/food.css" rel="stylesheet">
        <link href="css/testimonials.css" rel="stylesheet">
        <link href="css/footer.css" rel="stylesheet">
        <style>
            body{
                background:linear-gradient(to right,#190F0E,#42251D);
            }
        </style>
        <!--CSS files ends-->

    </head>
    <body>

        <!--Loader--
        <div class="loader-container">
            <div class="loader">
                <img src="images/logo.png" alt="Loading...">
            </div>
        </div>
        --Loader ends-->

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
                                <a href="index">
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

        <!--Featured categories-->
        <section class="featured-categories">
            <div class="container mt-5">
                <h1 class="text-center" style="color:white;font-size:36px;">Categories</h1>
                <div class="row">
                    <div class="col-md-3">
                        <a href="category5">
                            <div class="circle">
                                <div class="circle-content">
                                    <img src="images/cat1_juice.png" alt="Category 1" style="border:4px solid white;"><br>
                                    <button class="btn swiggy-button">Juice</button>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="category1">
                            <div class="circle">
                                <div class="circle-content">
                                    <img src="images/cat2_chinese.png" alt="Category 2" style="border:4px solid white;"><br>
                                    <button class="btn swiggy-button">Chinese</button>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="category2">
                            <div class="circle">
                                <div class="circle-content">
                                    <img src="images/cat3_chaats.png" alt="Category 3" style="border:4px solid white;"><br>
                                    <button class="btn swiggy-button">Chaats</button>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="category3">
                            <div class="circle">
                                <div class="circle-content">
                                    <img src="images/special2.png" alt="Category 4" style="border:4px solid white;"><br>
                                    <button class="btn swiggy-button">Icecream</button>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <a href="category5">
                            <div class="circle">
                                <div class="circle-content">
                                    <img src="images/pulav.jpeg" alt="Category 5" style="border:4px solid white;"><br>
                                    <button class="btn swiggy-button">Meal</button>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="category6">
                            <div class="circle">
                                <div class="circle-content">
                                    <img src="images/Milkshake.jpeg" alt="Category 6" style="border:4px solid white;"><br>
                                    <button class="btn swiggy-button">Milkshakes</button>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="category7">
                            <div class="circle">
                                <div class="circle-content">
                                    <img src="images/cat4_breakfast.png" alt="Category 7" style="border:4px solid white;"><br>
                                    <button class="btn swiggy-button">South Indian</button>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="category8">
                            <div class="circle">
                                <div class="circle-content">
                                    <img src="images/snacks.jpeg" alt="Category 8" style="border:4px solid white;"><br>
                                    <button class="btn swiggy-button">Snacks</button>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <a href="category9">
                            <div class="circle">
                                <div class="circle-content">
                                    <img src="images/dosa.jpeg" alt="Category 9" style="border:4px solid white;"><br>
                                    <button class="btn swiggy-button">Dosa</button>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="category10">
                            <div class="circle">
                                <div class="circle-content">
                                    <img src="images/special dosa.jpeg" alt="Category 10" style="border:4px solid white;"><br>
                                    <button class="btn swiggy-button">Special Dosa</button>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="category11">
                            <div class="circle">
                                <div class="circle-content">
                                    <img src="images/sweets.jpeg" alt="Category 11" style="border:4px solid white;"><br>
                                    <button class="btn swiggy-button">Sweets</button>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="category12">
                            <div class="circle">
                                <div class="circle-content">
                                    <img src="images/gravy.jpeg" alt="Category 12" style="border:4px solid white;"><br>
                                    <button class="btn swiggy-button">Gravys</button>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!--Featured categories ends-->

        <!--Footer section-->
        <footer class="bg-dark text-light p-3 mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="footer-section">
                            <a href="index">
                                <img src="images/logo.png" alt="Logo" class="img-fluid mb-3" style="width:150px;height:150px;border-radius:50%;border:2px solid white;">
                            </a>
                            <a href="index">
                                <h4>CampusBite</h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="footer-section" id="quicklinks">
                            <h4>Quick Links</h4>
                            <ul class="list-unstyled">
                                <li><a href="index">Home</a></li>
                                <li><a href="orderpage">Order</a></li>
                                <li><a href="feedback">Comment</a></li>
                                <li><a href="category1">Categories</a></li>
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
                        <a href="index">Privacy Policy</a> | <a href="index">Terms of Service</a>
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
        <script src="js/hero.js"></script>
        <script src="js/search.js"></script>
        <!--JS files ends-->
        
    </body>
</html>
