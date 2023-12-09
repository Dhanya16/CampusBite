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
            }
            .menu-item {
                margin-bottom: 20px;
            }
            .menu-item img {
                max-width: 50%;
                height:auto;
                border-radius: 50%;
                border:2px solid white;
            }
            .menu-item img:hover{
                transform: scale(1.1);
            }
            .star-rating {
                font-size: 30px;
            }

            .star {
                cursor: pointer;
                color: #ddd;
            }

            .star.filled {
                color: #ffcc00;
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
        <div class="container mt-4">
            <div class="row mt-5">
                <div class="col-md-6 offset-md-3">
                    <h2 class="mt-5">Leave a Comment</h2>
                    <form action="feedback" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="username">User Name:</label>
                            <input type="text" class="form-control" id="username" name="username" required placeholder="Enter your name...">
                        </div>
                        <div class="form-group">
                            <label for="itemname">Item Name:</label>
                            <input type="text" class="form-control" id="itemname" name="Itemname" required placeholder="Enter the item...">
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment:</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3" required placeholder="Enter your comments..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="rating">Rating:</label>
                            <div class="star-rating">
                                <span class="star" data-rating="1">&#9733;</span>
                                <span class="star" data-rating="2">&#9733;</span>
                                <span class="star" data-rating="3">&#9733;</span>
                                <span class="star" data-rating="4">&#9733;</span>
                                <span class="star" data-rating="5">&#9733;</span>
                                <input type="hidden" name="rating" id="selected-rating">
                            </div>
                        </div>
                        <button type="submit" class="btn swiggy-button">Submit Comment</button>
                    </form>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6 offset-md-3">
                    <h2>Customer Reviews</h2>
                    <!-- Loop through your reviews and display them -->
                    @foreach($feeds->sortByDesc('created_at') as $review)
                        <div class="row text-center">
                            <div class="col-md-12">
                                <div class="testimonial-box mt-2 mb-2" style="height:200px;border: 2px solid #42251D; border-radius: 10px; background-color: rgba(253, 218, 128, 0.5); box-shadow: 0px 4px 6px rgba(2, 37, 114, 0.3);">
                                    <p>{{ $review->comment }}</p>
                                    @for ($i = 1; $i <= $review->rating; $i++)
                                        &#9733;
                                    @endfor
                                    <br>
                                    <cite>{{ $review->username }}</cite>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
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
        <script>
            $(document).ready(function() {
                // Handle star clicks
                $('.star').on('click', function() {
                var rating = $(this).data('rating');

                // Update selected rating input value
                $('#selected-rating').val(rating);

                // Remove filled class from all stars
                $('.star').removeClass('filled');

                // Add filled class to clicked and previous stars
                $(this).addClass('filled');
                $(this).prevAll('.star').addClass('filled');
                });
            });
        </script>
        <!--JS files ends-->

    </body>
</html>