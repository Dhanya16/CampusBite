<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <title>Counter</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/counter.css">
</head>

<body>
  <nav class="navbar">
    <div class="container-fluid">
      <div class="d-flex profile-icon">
        <img src="images/admin.jpg" alt="Profile picture" width="50px"
          class="rounded-circle ">
      </div>
      <!--------changes-------->   
      @if (session('counter_username'))
      <?php
        $username = session('counter_username');
      ?>
      {{ $username }}
      @endif
      </p >
      <a href="{{ route('clearCart') }}">Clear Cart</a>
      <!--------changes ends-------->
      <a href="counterlogout" class="btn" id="logoutbtn" style="background-color:white;color:black;font-family: 'Times New Roman', Times, serif;
    font-size: 18px;border: 1px solid white;">Logout</a>
  </nav>
  @if(session('status'))
 <script>
  alert("{{session('status')}}");
  </script>
  @endif

  <div class="container-fluid" id="content">
    <div class="row" id="counter">
      <div class="col-4 bg-secondary border rounded-3" id="section1">
        <br>
        <form class="w-100 me-3" action="counterpage" method="POST" id="searchForm"  enctype="multipart/form-data">
          @csrf
          <input type="search" class="form-control" name="searchbar" id="searchid" placeholder="Enter ID...">
        </form>
        <br>

        <div class="row">
          <div class="col-10 bg-light border rounded-3" id="image">
            <br>
            @if(isset($item) && $item->isNotEmpty())
            @if($item->first()->Itemimage)
            <img src="{{ asset('uploads/event/'.$item->first()->Itemimage) }}" alt="picture">
            @else
            <p>No Image Available!!</p>
            @endif
            <br>
            <label id="itmname">Name: {{ $item->first()->Itemname }}</label>
            <br>
            <label id="cost">Cost: {{ $item->first()->Price }}</label>
            <br>
            @if(isset($items) && $items->isNotEmpty())
            <label id="available">Available: 
              @if($items->first()->Availability )
                      Yes
                  @else
                      NO
                  @endif</label>
            @else
            <p>No availability information found!!</p>
            @endif
            @else
            <p>No item found!!</p>
            @endif
          </div>
        </div>
        <br> 
        @if(isset($item)&& $item->isNotEmpty())
        <form method="POST" action="{{ route('addToCart', ['Itemid' => $item->first()->Itemid ]) }}">
                @csrf
                @method('PUT')
                <input type="number" class="form-control w-50"  name="quantity" id="qty" placeholder="Enter Quantity">
        <button type="submit" class="btn btn-sm" id="addbtn">Add to cart</button>
        </form>
        @endif
        
        <br>
      </div>
      <div class="col-8 bg-secondary border rounded-3" id="section2">
        <br>
        <table class="table table-bordered" style="text-align: center;" id="orderlist">
          <thead>
            <tr class="table-dark">
              <th>ItemId</th>
              <th>Name</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>GST</th>
              <th>Total</th>
            </tr>
          </thead>
          @foreach(session('cart', []) as $cartItem)
          @if(isset($cartItem['item']) && $cartItem['item'] !== null)
          <tr>
            <td>{{ $cartItem['item']->Itemid }}</td>
            <td>{{ $cartItem['item']->Itemname }}</td>
            <td>{{ $cartItem['item']->Price }}</td>
            <td>{{ $cartItem['quantity'] }}</td>
            <td>3%</td>
            <td>{{ $cartItem['item']->Price *$cartItem['quantity'] * 1.03 }}</td>  
          </tr>
          @endif
          @endforeach
          <tfoot>
            <tr>
              <td colspan="5" id="total">Total Amount:</td>
              <td id="totalamt">{{ session('cumulativeTotal', 0) }}</td>
            </tr>
          </tfoot>
          <tbody>
          </tbody>
        </table>
        <form method="POST" action="{{ route('saveOrder') }}">
                @csrf
        <button type="submit" class="btn btn-sm" id="billbtn">Get Bill</button>
        </form>
        <br><br>
      </div>
    </div>
  </div>
  <!--Js files-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
            
        <!--Js files ends-->
</body>

</html>