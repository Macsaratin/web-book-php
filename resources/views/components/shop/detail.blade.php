@props(['product','relatedByCategory','relatedByBrand'])

{{-- Layout --}}
<div class="container py-5 mt-4">
    <div class="row g-4">
        <!-- Ảnh sản phẩm -->
        <div class="col-lg-6">
            <div class="border rounded">
                <a href="#">
                    <img src="{{ asset($product->image) }}" class="img-fluid w-100 rounded-top" alt="Product Image">
                </a>
            </div>
        </div>
        <!-- Thông tin sản phẩm -->
        <div class="col-lg-6">
            <h4 class="fw-bold mb-3">{{ $product->name }}</h4>
            <p class="mb-3">Thể Loại: <strong>{{ $product->category->category_name }}</strong></p>
            <p class="mb-3">Nhà Xuất Bản: <strong>{{ $product->brand->name }}</strong></p>
            <p class="mb-3">Tình trạng: <strong>{{ $product->status == 1 ? 'Mới' : 'Cũ' }}</strong></p>
            <p class="mb-3">Năm xuất bản: <strong>{{ $product->created_at->year }}</strong></p>
            
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5>Giá Sản phẩm:</h5>
                <p class="text-muted text-decoration-line-through mb-0">{{ number_format($product->price) }}₫</p>
                <p class="text-danger fs-5 fw-bold mb-0">{{ number_format($product->pricesale) }}₫</p>
            </div>

            @if($product->is_on_sale)
                <div class="mb-3">
                    <span class="text-danger fw-bold">Sale - {{ $product->discount }}%</span>
                </div>
            @endif
            <!-- Số lượng sản phẩm -->
            <div class="input-group mb-3" style="width: 120px;">
                <button class="btn btn-outline-secondary btn-sm" type="button">-</button>
                <input type="text" class="form-control form-control-sm text-center" value="1" readonly>
                <button class="btn btn-outline-secondary btn-sm" type="button">+</button>
            </div>

            <button class="btn btn-primary">
                <i class="fa fa-shopping-bag me-2"></i> Thêm vào giỏ
            </button>
        </div>
    </div>

    <!-- Mô tả sản phẩm -->
    <div class="col-lg-12 mt-4">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#description">Mô tả</a>
            </li>
        </ul>
        <div class="tab-content mt-3">
            <div id="description" class="tab-pane fade show active">
                <p>{{ $product->description ?? 'Mô tả chi tiết sản phẩm...' }}</p>
            </div>
        </div>
    </div>

    <!-- Gợi ý sản phẩm cùng loại -->

        <div class="mt-5">
            <h3>Sản phẩm cùng loại</h3>
            <div class="row">
                @if($relatedByCategory->isEmpty())
                    <p>Không có sản phẩm cùng loại.</p>
                @else
                    @foreach($relatedByCategory as $relatedProduct)
                        <div class="col-md-3">
                            <div class="product-card">
                                <img src="{{ asset($relatedProduct->image) }}" class="img-fluid" alt="{{ $relatedProduct->name }}">
                                <h5>{{ $relatedProduct->name }}</h5>
                                <p>{{ number_format($relatedProduct->pricesale) }}₫</p>
                                <a href="{{ route('shop.detail', $relatedProduct->slug) }}" class="btn btn-primary">Xem chi tiết</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <h3>Sản phẩm cùng nhà sản xuất</h3>
            <div class="row">
                @if($relatedByBrand->isEmpty())
                    <p>Không có sản phẩm cùng nhà sản xuất.</p>
                @else
                    @foreach($relatedByBrand as $relatedProduct)
                        <div class="col-md-3">
                            <div class="product-card">
                                <img src="{{ asset($relatedProduct->image) }}" class="img-fluid" alt="{{ $relatedProduct->name }}">
                                <h5>{{ $relatedProduct->name }}</h5>
                                <p>{{ number_format($relatedProduct->pricesale) }}₫</p>
                                <a href="{{ route('shop.detail', $relatedProduct->slug) }}" class="btn btn-primary">Xem chi tiết</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>


</div>
