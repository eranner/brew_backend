@include('partials.header')
<?php
$parsedOrder = explode( '|', $order['order']);
?>

<h2 style="text-align:center;">Order Confirmation</h2>
<div class="order-summary">
    <form action="{{route('stripePayment')}}" method="post" id="orderForm">
        @csrf
        <input type="hidden" value="{{$order['order']}} + 6% PA sales tax" name="finalOrderDetails">
        <input type="hidden" value="{{floatVal($order['finalBill']) * 0.06 + floatVal($order['finalBill'])}}" name="finalOrderTotal">
        <h2 >Order for {{$order['customerName']}}</h2>
@foreach ($parsedOrder as $item)
    @if ($item !== '')
        <li>{{$item}}</li>
    @endif
@endforeach
<h3>Subtotal: {{$order['finalBill']}}</h3>
<h3>Tax: {{number_format($order['finalBill']* .06, 2)}}</h3>
<h3>Total: {{number_format($order['finalBill']* .06 + $order['finalBill'], 2)}}</h3>
<button class="btn btn-success">Place Order</button>
    </form>
</div>
@include('partials.footer')
