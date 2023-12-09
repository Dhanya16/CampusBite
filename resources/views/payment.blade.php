<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Payment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .bill-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .bill-details {
            margin-bottom: 20px;
        }

        .item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .total {
            font-weight: bold;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="bill-header">
        <h2 class="mb-4">Payment Details</h2>
        <p>Thank you for your order!</p>
    </div>

    <div class="bill-details">
        <div class="item">
            <span>Order ID:</span>
            <span>#12345</span>
        </div>
        <div class="item">
            <span>Date:</span>
            <span>{{ now() }}</span>
        </div>
        <div class="item">
            <span>Total Amount:</span>
            <span>₹{{ $totalAmt }}</span>
        </div>
    </div>

    <h3>Ordered Items:</h3>
        <ul class="list-group mb-4">
            @foreach($orderItemsDetails as $itemDetails)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $itemDetails['Itemname'] }} ({{ $itemDetails['Quantity'] }})
                    <span>₹{{ $itemDetails['SubTotal'] }}</span>
                </li>
            @endforeach
        </ul>

    <div class="total">
        <span>Total Amount:</span>
        <span>₹{{ $totalAmt }}</span>
    </div>
    <div class="footer mt-4">
    <form id="paymentForm" action="{{ url('/send-sms') }}" method="post" target="_blank">
    <!-- Add a hidden input field for the total amount -->
    @csrf
    @method('PUT')
    <input type="hidden" name="totalAmt" value="{{ $totalAmt }}">

    <button  type="submit" class="btn btn-primary text-center" onclick="redirectToPayment()">Pay Now</button>
</form>
    </div>
    <div class="footer mt-4">
        <p>Proceed with the payment to complete your order.</p>
    </div>
</div>
<script>
    function redirectToPayment() {
        // Redirect to the SMS route
        //window.location.href = '{{ url('/send-sms') }}'; // Replace '/send-sms' with your actual SMS route

        // If you want to open the route in a new tab or window, use the following line instead:
        document.getElementById('paymentForm').submit();
        setTimeout(function() {
           
        var features = 'width=600,height=400,top=100,left=100,resizable=yes,scrollbars=yes';
        window.open('{{ url('/send-sms') }}', '_blank', features);
        paymentWindow.focus();
        
    }, 100);
    setTimeout(function() {
            // Go back to the previous page
            window.location.href = document.referrer;
        }, 1100);
    }
</script>
</body>
</html>
