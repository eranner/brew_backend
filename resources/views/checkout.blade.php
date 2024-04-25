
<?php
$parsedOrder = explode( '|', $order['order']);
?>
<div class="order-summary">
<h2>Order for {{$order['customerName']}}</h2>
@foreach ($parsedOrder as $item)
    @if ($item !== '')
        <li>{{$item}}</li>
    @endif
@endforeach
<h3>Subtotal: {{$order['finalBill']}}</h3>
<h3>Tax: {{number_format($order['finalBill']* .06, 2)}}</h3>
<h3>Total: {{number_format($order['finalBill']* .06 + $order['finalBill'], 2)}}</h3>

</div>