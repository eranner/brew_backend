@include('partials.header')

<div class="checkout-page">
<div class="order-summary">
<h2 style="text-align:center; font-weight:bolder;">Payment Successful!</h2>

<div class="totals">
    <h5>Your Order has been received and will be filled as soon as possible!</h5>
</div>
</div>
</div>


<script>
    setTimeout(() => {
    window.location.replace('http://localhost:3000/')

    }, 3000);
</script>
@include('partials.footer')


