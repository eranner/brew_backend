@include('partials.header')
<?php
$parsedOrder = explode( '|', $order['order']);
?>
<div class="checkout-page">
<div class="order-summary">
<h2 style="text-align:center; font-weight:bolder;">Order Confirmation</h2>

    <form action="{{route('stripePayment')}}" method="post" id="orderForm">
        @csrf
        <input type="hidden" value="{{$order['order']}} + 6% PA sales tax" name="finalOrderDetails">
        <input type="hidden" value="{{floatVal($order['finalBill']) * 0.06 + floatVal($order['finalBill'])}}" name="finalOrderTotal">
        <input type="hidden" value="{{$order['customerName']}}" name="customerName">
        <h3 style="text-align: center;">for <span style="color:red; font-weight:bolder; text-decoration: underline;">{{$order['customerName']}}</span></h3>
        <div style="height:10px; width: 100%; border-top: 1px solid #333;"></div>

<div class="totals">
    <ul style="display:flex; flex-direction: column; align-items: flex-end; width:100%;">
    @foreach ($parsedOrder as $item)
    @if ($item !== '')
        <li style="list-style: none; font-size: 1.2rem;">{{$item}}</li>
    @endif
@endforeach
</ul>
<div style="height:10px; width: 100%; border-top: 1px solid #333;"></div>
<h3>Subtotal: ${{floatVal($order['finalBill'])}}</h3>
<h3>Tax: ${{number_format($order['finalBill']* .06, 2)}}</h3>
<div style="height:10px; width: 100%; border-top: 1px solid #333;"></div>

<h3 style="font-weight:bolder;">Total: ${{number_format($order['finalBill']* .06 + $order['finalBill'], 2)}}</h3>

<button class="btn btn-success" style="margin:auto; margin-top: 20px;">Place Order</button>
</div>
    </form>
</div>
</div>
@include('partials.footer')
