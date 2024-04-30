@include('partials.header')
<h1 style="text-align:center; font-size: 4rem; color:black; text-shadow: 2px 2px #333; background-color:rgba(241, 10, 175, 0.868);margin:0;">Order Hub</h1>
<p style="text-align:center; font-size: 1.2rem; color:black; background-color:rgba(241, 10, 175, 0.868);margin:0;">Please pick up your order from the counter when you see it move into the "completed orders" column.</p>
<div class="custom-order-backdrop">
<div class="customer-order-holder">


<div class="container table-holder">
<table class="table table-warning table-striped">
    <h2 style='text-align:center; color: black; text-shadow: 1px 1px #333; background: gold;'>Pending Orders</h2>
    <tr>
        <th >Customer</th>
        <th >Order</th>
        <th >Order Placed</th>
        <th >Mark Ready</th>
    </tr>
@foreach($orders as $order)
    <tr>
        <td>{{$order['customer_name']}}</td>
        <td>{{substr($order['order'], 0, -19)}}</td>
        <td>{{$order['created_at']}}</td>
        <td><form action="{{route('fillOrder', ['id'=>$order['id']])}}" method="post">
            @method('PUT') <!-- Spoof the method to PUT -->
            @csrf
            <button class="btn btn-success">Complete</button></form></td>
    </tr>
@endforeach
</table>
</div>
<div class="container table-holder">

<table class="table table-success table-striped">
    <h2 style='text-align:center; color: black; text-shadow: 1px 1px #333; background: rgb(15, 198, 79);'>Completed Orders</h2>
    <tr>
        <th >Customer</th>
        <th >Order</th>
        <th >Time Completed</th>
        <th >Picked Up</th>
    </tr>

@foreach($filled as $complete)

    <tr>
        <td>{{$complete['customer_name']}}</td>
        <td>{{substr($complete['order'], 0, -19)}}</td>
        <td>{{$complete['updated_at']}}</td>
        <td><form action="{{route('orderPickedUp', ['id'=>$complete['id']])}}" method="post">
            @method('PUT') <!-- Spoof the method to PUT -->
            @csrf
            <button class="btn btn-danger">Picked Up</button></form></td>
    </tr>
@endforeach
</table>
</div>
</div>
</div>
@include('partials.footer')