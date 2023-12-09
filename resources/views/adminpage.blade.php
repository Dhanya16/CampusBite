<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="favicon.ico">
        <title>Admin</title>

        <!--Css files-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="css/admin.css">
        <!--Css files ends-->

    </head>
    <body>

        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
        @endif
        <!--Navigation bar-->
        <nav class="navbar">
            <div class="container-fluid">
                <div class="profile-icon">
                    <img src="images/admin.jpg" alt="Profile picture" width="100px">
                </div>
                <p style="font-size: 20px;font-family: 'Times New Roman', Times, serif;color:rgba(86, 4, 4, 0.803);margin-top:10px;">
                    @if (session('admin_username'))
                        <?php
                            $username = session('admin_username');
                            $admin = DB::table('admins')->where('username', $username)->first();
                        ?>
                        {{ $username }}
                    @endif
                </p>
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="availability"><i class="bi bi-check-circle-fill"></i>Available</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="orders"><i class="bi bi-cart-fill"></i> Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="editMenu"><i class="bi bi-pencil-fill"></i> Edit Menu</a>
                    </li>
                </ul>
                <a href="adminlogout" class="btn ml-4" style="font-size: 20px;font-family: 'Times New Roman', Times, serif;background-color:rgba(86, 4, 4, 0.803);color:rgb(238, 183, 79);margin-top:10px;margin-left:30px;">Logout</a>
            </div>
        </nav>
        <!--Navigation bar ends-->

        

        <!--Availability section-->
        <div id="availabilityContent">
            <div class="container">
                <h2>Availability List</h2>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr class="table-dark">
                            <th>Item</th>
                            <th>Available</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items->sortByDesc('created_at') as $item)
                            @if ($item->delete == 1)
                                <tr>
                                    <td>{{ $item->Itemname }}</td>
                                    <td>
                                    <form method="POST" action="{{ route('updateAvailability', ['Itemid' => $item->Itemid ]) }}">
                                        @csrf
                                        @php
                                        $itemInventory = $inventory->where('Itemid', $item->Itemid)->first();
                                        @endphp
                                        @if($itemInventory)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox"id="checkbox{{ $item->Itemname }}" name="availability"  {{ $itemInventory->Availability ? 'checked':'' }} onchange="this.form.submit()">
                                            <label class="form-check-label" for="checkbox{{ $item->Itemname }}">Available</label>
                                        </div>
                                    @endif
                                    </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--Availability section ends-->

        <!--Menu section-->
        <div id="editMenuContent" style="display: none;">
            <div class="container text-center">
                <h2>Menu</h2>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr class="table-dark">
                            <th>Item Id</th>
                            <th>Item Name</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items->sortByDesc('created_at') as $item)
                            @if ($item->delete == 1)
                                <tr>
                                    <td>{{ $item->Itemid }}</td>
                                    <td>{{ $item->Itemname }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('removeItem', ['id' => $item->Itemid]) }}">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm" id="removebtn"><i class="bi bi-trash3-fill"></i>Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#addmodal"><i class="bi bi-plus-circle-fill"></i> Add Item</button>
            </div>
        </div>

        <!----->
        <div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="addmodalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addtitle">Choose to add</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#add1modal" style="margin-right:35%;">Add New
                            Item</button>
                        <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#add2modal">Add
                            Existing Item</button>
                    </div>
                </div>
            </div>
        </div>

        <!---->
        <div class="modal fade" id="add2modal" tabindex="-1" aria-labelledby="add2modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add2title">Item Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('addItem') }}" method="POST">
                            @csrf
                            <div class="mb-7">
                                <label for="item-id1" class="col-form-label">Item ID</label>
                                <input type="number" class="form-control" id="item-id1" placeholder="Enter item id..." name="ItemId" required>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Add Item</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!---->
        <div class="modal fade" id="add1modal" tabindex="-1" aria-labelledby="add1modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add1title">New Item Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="adminpage" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-7">
                                <label for="item-name" class="col-form-label">Item Name</label>
                                <input type="text" class="form-control" id="item-name" placeholder="Enter item name..." name="Itemname" required>
                            </div>
                            <div class="mb-7">
                                <label for="item-id" class="col-form-label">Item Id</label>
                                <input type="text" class="form-control" id="item-id" placeholder="Enter item id..." name="Itemid" required>
                            </div>
                            <div class="mb-7">
                                <label for="item-price" class="col-form-label">Price</label>
                                <input type="number" class="form-control" id="item-price" placeholder="Enter item price..." name="Price" required>
                            </div>
                            <div class="mb-7">
                                <label for="item-category" class="col-form-label">Category</label>
                                <select class="form-control" id="item-category" name="Category" required>
                                    <option value="" disabled selected>Select item category...</option>
                                    <option value="Chinese">Chinese</option>
                                    <option value="Chaats">Chaats</option>
                                    <option value="Ice cream">Ice cream</option>
                                    <option value="Meal & Pulao">Meal & Pulao</option>
                                    <option value="Juice">Juice</option>
                                    <option value="Milkshakes">Milkshakes</option>
                                    <option value="South Indian Snacks">South Indian Snacks</option>
                                    <option value="Snacks">Snacks</option>
                                    <option value="Dosa">Dosa</option>
                                    <option value="Special Dosa">Special Dosa</option>
                                    <option value="Sweets">Sweets</option>
                                    <option value="Gravys">Gravys</option>
                                </select>
                            </div>
                            <div class="mb-7">
                                <label for="item-image" class="col-form-label">Item Image</label>
                                <input type="file" class="form-control" id="item-image" name="Itemimage" required>
                            </div>
                            <div class="mb-7">
                                <label for="item-description" class="col-form-label">Description</label>
                                <textarea class="form-control" id="item-description" placeholder="Enter item description here..." name="Description" required></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Add Item</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <!--Menu section ends-->

        <!--Order section-->
        <div id="ordersContent" style="display: none;">
            <div class="container">
                <h2>Orders</h2>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr class="table-dark">
                            <th>Order ID</th>
                            <th>Itemname</th>
                            <th>Quantity</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($orders->sortByDesc('created_at') as $order)
                        <tr>
                            <td>{{ $order->Orderid }}</td>
                            <td>
                            @php
                                $ordername = $items->where('Itemid', $order->Itemid)->first();
                            @endphp
                            @if($ordername)
                                {{$ordername->Itemname}}
                            @endif
                            </td>
                            <td>{{ $order->Quantity}}</td>
                            <td>
                            <form method="POST" action="{{ route('updateOrderStatus', ['Orderitemid' => $order->Orderitemid]) }}">
                            @csrf
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="status" type="radio" id="radio{{ $order->Orderitemid}}_1" value=0 {{ $order->Status == 0 ? 'checked' : '' }} onchange="this.form.submit()">
                                    <label class="form-check-label" for="radio{{ $order->Orderitemid}}_1">Pending</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="status" type="radio" id="radio{{ $order->Orderitemid}}_2" value=1  {{ $order->Status == 1 ? 'checked' : '' }} onchange="this.form.submit()">
                                    <label class="form-check-label" for="radio{{ $order->Orderitemid}}_2">Completed</label>
                                </div>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
        <!--Order section ends-->

        <!--Js files-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
        <script src="js/admin.js"></script>
        <!--Js files ends-->
        <!--Js files ends-->
        @if(session('newOrder'))
    <script>
        alert('New order placed!');
    </script>
    {{ session()->forget('newOrder') }}
@endif

    </body>
</html>