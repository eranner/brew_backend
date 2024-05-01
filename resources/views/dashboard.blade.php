@include('partials.header')
<h1 class="inventoryHeader">Inventory Manager</h1>

<div class="dashbaordHoldingContainer container">
<div class="addItemHolder">
    <h2>Add Coffee</h2>
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
    </div>

<div class="addItemHolder">
<h2>Add Snack</h2>
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
</div>

<div class="addItemHolder">
    <h2>Add Game</h2>
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
    </div>
</div>
@include('partials.footer')