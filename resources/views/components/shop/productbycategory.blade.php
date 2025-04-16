@props(['products', 'categories','category'])

<div class="container py-5 mt-3">
    <div class="row">
        <!-- Danh mục -->
        <div class="col-lg-8">
            <ul class="nav nav-pills d-inline-flex text-center mb-5">
                @foreach ($categories as $category)
                    <li class="nav-item">
                        <a href="{{ route('shop.category.categories', $category->slug) }}" class="d-flex m-2 py-2 bg-light rounded-pill">
                            <span class="text-dark" style="width: 130px;">{{ $category->category_name }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Sản phẩm theo danh mục -->
        <div class="col-lg-12">
            <h2>Danh mục: {{ $category->category_name }}</h2>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-4">
                        <div class="product-card">
                            <img src="{{ asset($product->image) }}" class="img-fluid" alt="{{ $product->name }}">
                            <h5>{{ $product->name }}</h5>
                            <p>{{ number_format($product->pricesale) }}₫</p>
                            <a href="{{ route('shop.detail', $product->slug) }}" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
