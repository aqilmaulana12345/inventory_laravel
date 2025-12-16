<!DOCTYPE html>
<html>
<head>
    <title>Inventory System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('products.index') }}">Inventory</a>
    <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a href="{{ route('products.index') }}" class="nav-link">Products</a></li>
        <li class="nav-item"><a href="{{ route('categories.index') }}" class="nav-link">Categories</a></li>
        <li class="nav-item"><a href="{{ route('transactions.create') }}" class="nav-link">Transactions</a></li>
    </ul>
    <form action="{{ route('logout') }}" method="POST" class="ms-3">@csrf<button class="btn btn-danger">Logout</button></form>
</nav>
<div class="container mt-4">
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    @yield('content')
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
@stack('scripts')
</body>
</html>
