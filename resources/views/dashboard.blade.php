@include('partials.header')
<h1 class="inventoryHeader">Inventory Manager</h1>

<div class="dashbaordHoldingContainer container">
    <div class="addItemHolder">
        <h2 style="text-align:center;">Add Coffee</h2><hr>
        <form action="{{route('addCoffee')}}" method="POST">
        @csrf
            <label for="coffee" class="form-label">Coffee</label>
            <input type="text" name="coffee" class="form-control">
            <label for="size" class="form-label">Size (S, M, L)</label>
            <input type="text" name="size" class="form-control">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" name="price" class="form-control mb-2">
            <label for="in_stock" class="form-label">In Stock?</label>
            <input type="checkbox" name="in_stock"><br>
            <button class="btn btn-success">Add Coffee</button>
        </form>
        <div class="inStockHolder">
            <h2 style="text-align:center; padding: 40px 0 20px 0;">In Stock Coffees:</h2>
            @foreach ($inStockCoffee as $coffee)
                <div style="display:flex; justify-content: space-between;">{{$coffee->coffee}}<form method="POST" action="{{route('outOfCoffee', ['id' => $coffee->id])}}">@csrf  @method('PUT')<button class="btn btn-danger">Out of Stock</button></form>
                </div>
                <hr>
            @endforeach
        </div>
        <div class="outOfStockHolder">
            <h3>Out of Stock:</h3>
            <p>Click on coffee to add back into the "In Stock Coffees"</p>
            <div style="display:flex; flex-wrap: wrap; gap: 10px;">
                @foreach ($outOfStockCoffee as $coffee)
                    <form method="POST" action="{{route('restockCoffee', ['id' => $coffee->id])}}">@csrf  @method('PUT')<button class="btn btn-outline-danger">{{$coffee->coffee}}</button></form>
                @endforeach
            </div>
        </div>
    </div>

<div class="addItemHolder">
<h2 style="text-align:center;">Add Snack</h2><hr>
<form action="{{route('addSnack')}}" method="POST">
    @csrf
    <label for="snack" class="form-label">Snack</label>
    <input type="text" name="snack" class="form-control">
    <label for="price" class="form-label">Price</label>
    <input type="number" step="0.01" name="price" class="form-control mb-2">
    <label for="in_stock" class="form-label">In Stock?</label>
    <input type="checkbox" name="in_stock"><br>
    <button class="btn btn-success">Add Snack</button>
</form>

<div class="inStockHolder">
    <h2 style="text-align:center; padding: 40px 0 20px 0;">In Stock Snacks:</h2>
    @foreach ($inStockSnacks as $snack)
        <div style="display:flex; justify-content: space-between;">{{$snack->snack}}<form method="POST" action="{{route('outOfSnacks', ['id' => $snack->id])}}">@csrf  @method('PUT')<button class="btn btn-danger">Out of Stock</button></form>
        </div>
        <hr>
    @endforeach
</div>
<div class="outOfStockHolder">
    <h3>Out of Stock:</h3>
    <p>Click on flavor to add back into the "In Stock Flavors"</p>
    <div style="display:flex; flex-wrap: wrap; gap: 10px;">
        @foreach ($outOfStockSnacks as $oSnack)
            <form method="POST" action="{{route('restockSnack', ['id' => $oSnack->id])}}">@csrf  @method('PUT')<button class="btn btn-outline-danger">{{$oSnack->snack}}</button></form>
        @endforeach
    </div>
</div>
</div>

<div class="addItemHolder">
    <h2 style="text-align: center;">Add Game</h2><hr>
    <form action="{{route('addGame')}}" method="POST">
        @csrf
        <label for="gameName" class="form-label">Game Name</label>
        <input type="text" name="gameName" class="form-control">
        <label for="minutes" class="form-label">Duration (in minutes)</label>
        <input type="number" name="minutes" class="form-control">
        <label for="price" class="form-label">Price</label>
        <input type="number" step="0.01" name="price" class="form-control mb-2">
        <label for="is_working" class="form-label">Is Working?</label>
        <input type="checkbox" name="is_working"><br>
        <button class="btn btn-success">Add Game</button>
    </form>
    <div class="inStockHolder">
        <h2 style="text-align:center; padding: 40px 0 20px 0;">Working Games:</h2>
        @foreach ($workingGames as $game)
            <div style="display:flex; justify-content: space-between;">{{$game->game}}<form method="POST" action="{{route('outOfOrder', ['id' => $game->id])}}">@csrf  @method('PUT')<button class="btn btn-danger">Out of Order</button></form>
            </div>
            <hr>
        @endforeach
    </div>
    <div class="outOfStockHolder">
        <h3>Out of Order:</h3>
        <p>Click on game to add back into the "Working Games"</p>
        <div style="display:flex; flex-wrap: wrap; gap: 10px;">
            @foreach ($brokenGames as $game)
                <form method="POST" action="{{route('fixedGame', ['id' => $game->id])}}">@csrf  @method('PUT')<button class="btn btn-outline-danger">{{$game->game}}</button></form>
            @endforeach
        </div>
    </div>
</div>
</div>
@include('partials.footer')