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
                background:linear-gradient(to right,#FDDA80, #F9E9BD);
            }
        </style>
        <!--CSS files ends-->

    </head>
    <body>

        <!--Loader-->
        <div class="loader-container">
            <div class="loader">
                <img src="images/logo.png" alt="Loading...">
            </div>
        </div>
        <!--Loader ends-->

        <!--Header section-->
        <header>
            <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="login">
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
                                <a class="nav-link" href="login">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="login" id="categoriesDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Categories
                                </a>
                                <div class="dropdown-menu" aria-labelledby="categoriesDropdown">
                                    <a class="dropdown-item" href="login">Category 1</a>
                                    <a class="dropdown-item" href="login">Category 2</a>
                                    <a class="dropdown-item" href="login">Category 3</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login">Order</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mr-5" href="login">Reviews</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn mr-2 signup" href="login">Sign up/Log in</a>
                            </li><br>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <!--Header section ends-->

        <!--Hero section-->
        <div class="container-fluid position-relative p-0">
            <div class="img-container" style="position: relative; overflow: hidden;">
                <img src="images/overlay.jpg" alt="Notebook" class="img-fluid" style="width:100%; height:auto; max-height:400px;" width="100%">
                <div class="content position-absolute w-100 text-center" style="top: 50%; transform: translateY(-50%); color: white;">
                    <h1 id="fade-heading" class="fade-in" style="font-weight: bold; font-size: 5vw; max-font-size: 100px;">CampusBite</h1>
                    <p id="fade-paragraph" class="fade-in" style="font-size: 3vw; max-font-size: 50px;">Order the food of your choice</p>
                </div>
            </div>
        </div>
        <!--Hero section ends-->

        <!--Featured categories-->
        <section class="featured-categories">
            <div class="container">
                <h1 style="color:#42251D;font-size:36px;">Featured Categories</h1>
                <div class="row">
                    <div class="col-md-3">
                        <a href="login">
                            <div class="circle">
                                <div class="circle-content">
                                    <img src="images/cat1_juice.png" alt="Category 1" style="border:4px solid #42251D;"><br>
                                    <button class="btn swiggy-button">Juice</button>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="login">
                            <div class="circle">
                                <div class="circle-content">
                                    <img src="images/cat2_chinese.png" alt="Category 2" style="border:4px solid #42251D;"><br>
                                    <button class="btn swiggy-button">Chinese</button>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="login">
                            <div class="circle">
                                <div class="circle-content">
                                    <img src="images/cat3_chaats.png" alt="Category 3" style="border:4px solid #42251D;"><br>
                                    <button class="btn swiggy-button">Chaats</button>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="login">
                            <div class="circle">
                                <div class="circle-content">
                                    <img src="images/special2.png" alt="Category 4" style="border:4px solid #42251D;"><br>
                                    <button class="btn swiggy-button">Icecream</button>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <a class="see-more text-center" href="login" style="color:#42251D;text-decoration:underline;">See More</a>
            </div>
        </section>
        <!--Featured categories ends-->

        <!--Search option-->
        <div class="container" id="fade-in-section">
            <div class="row">
                <div class="col-md-6">
                    <h1 style="color:#42251D;font-weight:bold;font-size:36px;">Hungry?</h1>
                    <p style="color:#42251D;">Order at any time, anywhere</p>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control swiggy-input" placeholder="Enter your choice">
                        <div class="input-group-append">
                            <button class="btn swiggy-button" type="button">ORDER</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="image-container">
                        <img src="images/overlay.png" alt="Image" class="img-fluid" style="border-radius: 20px;" id="searchimg">
                        <div class="overlay-text">
                            <h1 style="font-weight:bold;font-size:36px;">Today's special</h1>
                            <div class="special-images mt-4">
                                <img src="images/special.png" alt="special img" style="border-radius:50%;width:150px;height:150px;border:4px solid #FDDA80">
                                <img src="images/special2.png" alt="special img" style="border-radius:50%;width:150px;height:150px;border:4px solid #FDDA80">
                            </div>
                            <button class="btn swiggy-button mt-4" style="border:2px solid #FDDA80;">Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Search option ends-->

        <!--Food section-->
        <div class="container food-section mt-4" >
            <h1 style="color:#42251D;font-size:36px;">Food Section</h1>
            <div class="row mt-4">
                <div class="col-md-3">
                    <div class="food-box">
                        <img src="order/idli.png" alt="Image 1" class="rounded-circle img-fluid">
                        <p style="color:#42251D;font-weight:bold;">Idli</p>
                        <button class="btn swiggy-button">₹20.00</button>
                        <button class="btn swiggy-button">Order</button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="food-box">
                        <img src="order/masaldosa.png" alt="Image 2" class="rounded-circle img-fluid">
                        <p style="color:#42251D;font-weight:bold;">Masala Dosa</p>
                        <button class="btn swiggy-button">₹43.00</button>
                        <button class="btn swiggy-button">Order</button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="food-box">
                        <img src="order/masalpuri.png" alt="Image 3" class="rounded-circle img-fluid">
                        <p style="color:#42251D;font-weight:bold;">Masal Puri</p>
                        <button class="btn swiggy-button">₹35.00</button>
                        <button class="btn swiggy-button">Order</button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="food-box">
                        <img src="order/noodles.png" alt="Image 4" class="rounded-circle img-fluid">
                        <p style="color:#42251D;font-weight:bold;">Noodles</p>
                        <button class="btn swiggy-button">₹70.00</button>
                        <button class="btn swiggy-button">Order</button>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-3">
                    <div class="food-box">
                        <img src="order/orangejuice.png" alt="Image 1" class="rounded-circle img-fluid">
                        <p style="color:#42251D;font-weight:bold;">Orange Juice</p>
                        <button class="btn swiggy-button">₹43.00</button>
                        <button class="btn swiggy-button">Order</button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="food-box">
                        <img src="order/panipuri.png" alt="Image 2" class="rounded-circle img-fluid">
                        <p style="color:#42251D;font-weight:bold;">Pani Puri</p>
                        <button class="btn swiggy-button">₹43.00</button>
                        <button class="btn swiggy-button">Order</button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="food-box">
                        <img src="order/parota.png" alt="Image 3" class="rounded-circle img-fluid">
                        <p style="color:#42251D;font-weight:bold;">Parota</p>
                        <button class="btn swiggy-button">₹57.00</button>
                        <button class="btn swiggy-button">Order</button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="food-box">
                        <img src="order/pavbhaji.png" alt="Image 4" class="rounded-circle img-fluid">
                        <p style="color:#42251D;font-weight:bold;">Pav Bhaji</p>
                        <button class="btn swiggy-button">₹42.00</button>
                        <button class="btn swiggy-button">Order</button>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-3">
                    <div class="food-box">
                        <img src="order/puri.png" alt="Image 1" class="rounded-circle img-fluid">
                        <p style="color:#42251D;font-weight:bold;">Poori Bhaji</p>
                        <button class="btn swiggy-button">₹35.00</button>
                        <button class="btn swiggy-button">Order</button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="food-box">
                        <img src="order/samosa.png" alt="Image 2" class="rounded-circle img-fluid">
                        <p style="color:#42251D;font-weight:bold;">Samosa</p>
                        <button class="btn swiggy-button">₹43.00</button>
                        <button class="btn swiggy-button">Order</button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="food-box">
                        <img src="order/vada.png" alt="Image 3" class="rounded-circle img-fluid">
                        <p style="color:#42251D;font-weight:bold;">Vada</p>
                        <button class="btn swiggy-button">₹20.00</button>
                        <button class="btn swiggy-button">Order</button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="food-box">
                        <img src="order/vadapav.png" alt="Image 4" class="rounded-circle img-fluid">
                        <p style="color:#42251D;font-weight:bold;">Vada Pav</p>
                        <button class="btn swiggy-button">₹20.00</button>
                        <button class="btn swiggy-button">Order</button>
                    </div>
                </div>
            </div>
            <a class="see-more text-center" href="login" style="color:#42251D;text-decoration:underline;">See More</a>
        </div>
        <!--Food section ends-->

        <!--Testimonials-->
        <div class="container">
            <h1 class="mt-4" style="color:#42251D;font-size:36px;">Testimonials</h1>
            <div id="testimonialCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#testimonialCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#testimonialCarousel" data-slide-to="1"></li>
                    <li data-target="#testimonialCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="testimonial-box" style="height:200px;">
                                    <p>The desserts here are heavenly! I had the chocolate lava cake, and it was pure indulgence. I'll definitely be coming back for more sweet treats.</p>
                                    <p>&#9733; &#9733; &#9733; &#9733; &#9733; </p>
                                    <cite>Kavita Sharma</cite>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="testimonial-box" style="height:200px;">
                                    <p>The service at this restaurant is exceptional. The staff is friendly and attentive. Plus, the ambiance is lovely. The food here is delicious and flavorful. </p>
                                    <p>&#9733; &#9733; &#9733; &#9733; &#9733; </p>
                                    <cite>Shreya Jain</cite>
                                </div>
                            </div>
                        </div>     
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="testimonial-box" style="height:200px;">
                                    <p>The ice cream parlor here is a gem. They have unique flavors like lavender honey, and everything is made in-house. It's a delightful treat.</p>
                                    <p>&#9733; &#9733; &#9733; &#9733; &#9733; </p>
                                    <cite>Jane Markson</cite>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="testimonial-box" style="height:200px;">
                                    <p>The samosas here are the perfect snack. Crispy, golden pastry with a delicious spiced potato and pea filling. I can't get enough of them.</p>
                                    <p>&#9733; &#9733; &#9733; &#9733; &#9733;</p>
                                    <cite>Rishi Patel</cite>
                                </div>
                            </div>
                        </div>      
                    </div>
                    <div class="carousel-item"> 
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="testimonial-box" style="height:200px;">
                                    <p>I love pani puri, and this place serves them fresh and flavorful. The tangy tamarind water and spicy potato filling are just what I needed.</p>
                                    <p>&#9733; &#9733; &#9733; &#9733; &#9733; </p>
                                    <cite>Arjun Singh</cite>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="testimonial-box" style="height:200px;">
                                    <p>Bhel puri is my favorite snack, and they make it so well. The mix of puffed rice, chutneys, and crunchy bits is pure happiness in a bowl.I love this place.</p>
                                    <p>&#9733; &#9733; &#9733; &#9733; &#9733; </p>
                                    <cite>Aryan Kumar</cite>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <a class="carousel-control-prev" href="login" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="login" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <!--Testimonials ends-->

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
        <script src="js/hero.js"></script>
        <script src="js/categories.js"></script>
        <script src="js/search.js"></script>
        <script src="js/food.js"></script>
        <!--JS files ends-->
        
    </body>
</html>
