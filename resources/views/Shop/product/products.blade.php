@extends('layout.shop.layout');
@section('title', 'trang chủ');
@section('content')
@props([ 'products'])
<div>
  <div class="container-fluid mt-3">
    <div class="container py-5">
      <div class="tab-class text-center">
        <div class="row g-4 align-items-center mb-3">
          <div class=" text-center">
            <h1>Tất cả sản phẩm</h1>
          </div>
        </div>
        <div class="tab-content">
          <div id="tab-1" class="tab-pane fade show p-0 active">
            <div class="row g-4 d-flex flex-wrap justify-content-start">
              @foreach ($products as $product)
                <div class="col-md-6 col-lg-4 col-xl-3 d-flex">
                  <div class="rounded position-relative w-100 product-card">
                    <div class="product-image">
                      <img src="{{ asset($product->image) }}" class="img-fluid w-70 rounded-top" alt="Product Image">
                    </div>
                    @if($product->is_on_sale)
                    <div class="sale-label text-white bg-danger px-3 py-1 rounded position-absolute">
                      Sale - {{ $product->discount }}%
                    </div>
                    @endif
                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">
                      {{ $product->category->category_name }}
                    </div>

                    <div class="p-4 border border-secondary border-top-0 rounded-bottom d-flex flex-column h-100">
                      <h4 class="mb-2 product-title">{{ $product->name }}</h4>
                      <div class="d-flex justify-content-between align-items-center">
                        @if($product->price != $product->pricesale)
                        <p class="text-muted text-decoration-line-through mb-0">{{ number_format($product->price) }}₫</p>
                        @endif
                        <p class="text-dark fs-5 fw-bold mb-0 text-danger">{{ number_format($product->pricesale) }}₫</p>
                      </div>
                      <button class="btn border border-secondary rounded-pill px-3 text-primary mt-3">
                        <a href="{{ route('shop.detail', $product->slug) }}">   
                            <i class="fa fa-shopping-bag me-2 text-primary"></i> chi tiết
                        </a>                    
                      </button>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
          <div class="text-center mt-4">
            {{ $products->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<style scoped>
.sale-label {
  top: 10px;
  right: 10px;
  font-size: 14px;
  font-weight: bold;
}

.text-danger {
  color: red;
}

.product-card {
  display: flex;
  flex-direction: column;
  height: 100%;
  transition: transform 0.3s ease;
}

.product-card:hover {
  transform: scale(1.05);
  z-index: 1;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.product-image img {
  max-height: 200px;
  object-fit: cover;
}

.product-title {
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  max-height: 2.5em;
}

.product-description {
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  max-height: 4.5em;
}

.nav-pills .nav-link {
  transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease; /* Added transform transition */
}

.nav-pills .nav-link.active {
  background-color: #007bff !important;
  color: white !important;
  transform: scale(1.05); /* Slight scale on active state */
}

.nav-pills .nav-link:hover:not(.active) {
  background-color: #e9ecef;
  color: #0056b3;
  transform: scale(1.05); /* Scale up by 5% on hover */
}

.dropdown-menu {
  border: 1px solid #e0e0e0; /* Khung viền nhẹ */
  border-radius: 8px; /* Bo góc */
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Đổ bóng nhẹ */
  padding: 10px 0; /* Khoảng cách bên trong */
  background-color: #fff; /* Màu nền trắng */
  min-width: 150px; /* Độ rộng tối thiểu */
  transition: opacity 0.2s ease-in-out; /* Hiệu ứng mượt mà khi hiện/ẩn */
}

/* Style cho từng item trong dropdown */
.dropdown-item {
  padding: 8px 20px; /* Khoảng cách bên trong */
  color: #333; /* Màu chữ */
  font-weight: 500; /* Độ đậm chữ */
  transition: background-color 0.3s ease, color 0.3s ease; /* Hiệu ứng chuyển màu */
}

/* Hiệu ứng hover cho dropdown-item */
.dropdown-item:hover {
  background-color: #f1f3f5; /* Màu nền khi hover */
  color: #007bff; /* Màu chữ khi hover */
  cursor: pointer;
}

/* Style cho nút "More" (dropdown toggle) */
.dropdown-toggle {
  transition: background-color 0.3s ease, transform 0.3s ease;
}

.dropdown-toggle:hover {
  background-color: #e9ecef; /* Màu nền khi hover */
  transform: scale(1.05); /* Phóng to nhẹ khi hover */
}

/* Đảm bảo dropdown menu hiển thị mượt mà */
.dropdown-menu.show {
  opacity: 1;
}

/* Các style khác của bạn */
.sale-label {
  top: 10px;
  right: 10px;
  font-size: 14px;
  font-weight: bold;
}

.text-danger {
  color: red;
}

.product-card {
  display: flex;
  flex-direction: column;
  height: 100%;
  transition: transform 0.3s ease;
}

.product-card:hover {
  transform: scale(1.05);
  z-index: 1;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.product-image img {
  max-height: 200px;
  object-fit: cover;
}

.product-title {
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  max-height: 2.5em;
}

.product-description {
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  max-height: 4.5em;
}

.nav-pills .nav-link {
  transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
}

.nav-pills .nav-link.active {
  background-color: #007bff !important;
  color: white !important;
  transform: scale(1.05);
}

.nav-pills .nav-link:hover:not(.active) {
  background-color: #e9ecef;
  color: #0056b3;
  transform: scale(1.05);
}
/* Căn giữa phân trang */
.pagination {
    justify-content: center;
    display: flex;
    margin-top: 20px;
}
</style>
