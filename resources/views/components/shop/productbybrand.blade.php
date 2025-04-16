@props(['products', 'brands', 'brand'])

        <div class="container py-5 mt-3">
            <div class="row">
                <!-- Danh sách thương hiệu -->
                <div class="col-lg-8">
            <form method="GET" action="" class="d-flex flex-wrap gap-2 mb-5">
                @foreach ($brands as $item)
                    <button 
                        type="submit" 
                        formaction="{{ route('shop.brand.brands', $item->slug) }}" 
                        class="btn btn-outline-primary rounded-pill px-4 py-2">
                        {{ $item->name }}
                    </button>
                @endforeach
            </form>
        </div>

        <!-- Sản phẩm theo thương hiệu -->
        <div class="col-lg-12">
            <h2>{{ $brand->name }}</h2>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="product-card p-3 border rounded shadow-sm">
                            <img src="{{ asset($product->image) }}" class="img-fluid mb-2" alt="{{ $product->name }}">
                            <h5>{{ $product->name }}</h5>
                            <p class="text-danger fw-bold">{{ number_format($product->pricesale) }}₫</p>
                            <a href="{{ route('shop.detail', $product->slug) }}" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
