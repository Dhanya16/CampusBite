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
                                <a class="nav-link" href="orderpage">Order</a>
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

        @if (session('status'))
            <script>
                alert("{{ session('status') }}");
            </script>
        @endif

        <!--Main section-->
        <h1 class="text-center" style="margin-top:5%;">Snacks</h1>
        <div class="container text-center">
            @php
                $snacksItems = $filteredItems->where('Category', 'Snacks')->where('delete', 1)->sortByDesc('created_at')->chunk(2);
            @endphp
            @foreach ($snacksItems as $itemPair)
                <div class="row">
                    @foreach ($itemPair as $item)
                        <div class="col-md-6 menu-item mb-2 mt-4">
                            <img src="{{ asset('uploads/event/' .$item->Itemimage) }}" alt="{{ $item->Itemname }}" class="cover-image mb-4">
                            <h2>{{ $item->Itemname }}</h2>
                            <p class="item-descriptionr">{{ $item->Description }}</p>
                            <p>Price: ₹{{ $item->Price }}.00</p>
                            <p>Quantity:</p>
                            <form action="{{ route('addToCart1', ['Itemid' => $item->Itemid]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <p style="display: flex; align-items: center;padding-left:42%;" class="text-center">
                                    <button type="button" class="btn swiggy-button btn-sm btn-info" onclick="updateQuantity('{{ $item->Itemid }}',-1)">-</button>
                                    <input type="number" name="quantity" value="1" class="quantity-input-{{ $item->Itemid }}" style="width:30px;margin: 0;" />
                                    <button type="button" class="btn swiggy-button btn-sm btn-info" onclick="updateQuantity('{{ $item->Itemid }}',1)">+</button>
                                </p>
                                <button type="submit" class="btn swiggy-button order-button">
                                    Order
                                </button></form>
                            </div>
                    @endforeach
                </div>
            @endforeach
        </div>
        <!--Main section ends-->

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
                                <li><a href="categories">Categories</a></li>
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
        
<script>
    function updateQuantity(itemId, delta) {
        var quantityInput = document.querySelector('.quantity-input-' + itemId);
        var currentQuantity = parseInt(quantityInput.value);

        // Ensure that the quantity is a positive integer
        if (isNaN(currentQuantity) || currentQuantity < 1) {
            currentQuantity = 1;
        }

        // Update the quantity based on the delta (1 or -1)
        var newQuantity = currentQuantity + delta;

        // Ensure that the quantity doesn't go below 1
        newQuantity = Math.max(newQuantity, 1);

        // Update the quantity input field
        quantityInput.value = newQuantity;
    }
</script>

        <!--JS files ends-->

    </body>
</html>