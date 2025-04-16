@extends('layout.shop.layout')
@section('title', 'Search Results')
@section('content')
  <div class="container">
    <div class="text-center mb-4">
        <h1 class="display-4">Search Results</h1>
    </div>
    <h2 class="text-center mt-5 mb-4">Search Results for "{{ $query }}"</h2>

    @if($products->isEmpty())
        <div class="alert alert-warning text-center">No products found for your search query.</div>
    @else
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-light rounded">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="card-img-top img-fluid">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($product->description, 100) }}</p>
                            <p class="card-text"><strong>{{ $product->price }} USD</strong></p>
                            <a href="{{ route('shop.detail', $product->slug) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    @endif
  </div>
@endsection
<style>
.container{
    margin-top: 50px;
}
.card {
    transition: transform 0.3s ease-in-out;
}

.card:hover {
    transform: translateY(-5px);
}

.card-img-top {
    height: 200px;
    object-fit: cover;
    border-bottom: 1px solid #ddd;
}

.card-title {
    font-size: 1.25rem;
    font-weight: 600;
}

.card-text {
    font-size: 1rem;
    color: #6c757d;
}

.card-body {
    padding: 20px;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #004085;
}

/* Pagination */
.pagination {
    justify-content: center;
    margin-top: 20px;
}

/* Alert when no products are found */
.alert {
    padding: 10px;
    font-size: 1rem;
}

</style>