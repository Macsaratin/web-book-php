@extends('layout.admin.layout')
@section('title', 'Thêm Sản Phẩm')
@section('content')
<x-admin.dashboard/>
@props(['htmlcategoryid', 'htmlbrandid','product'])
<div class="d-flex">
    <!-- Nội dung chính -->
    <div class="product-list-container mt-5" style="margin-left: 230px; width: calc(100% - 270px);">
        <h2 class="text-center mb-4">Thêm Sản Phẩm Mới</h2>

        <!-- Form thêm sản phẩm -->
        <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="image" class="form-label">Hình ảnh</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="qty" class="form-label">Số lượng</label>
                        <input type="number" class="form-control" id="qty" name="qty" min="0" required>
                    </div>
                    <div class="col-md-4">
                        <label for="price" class="form-label">Giá gốc</label>
                        <input type="number" class="form-control" id="price" name="price" min="0" step="1000" required>
                    </div>
                    <div class="col-md-4">
                        <label for="is_on_sale" class="form-label">Giảm giá</label>
                        <input type="checkbox" class="form-check-input" id="is_on_sale" name="is_on_sale" value="1" {{ old('is_on_sale') ? 'checked' : '' }}>
                        <label for="is_on_sale" class="form-check-label">Có giảm giá</label>
                    </div>
                </div>

                <!-- Nếu có giảm giá, thêm phần trăm giảm và giá sau khi giảm -->
                <div class="row mb-3" id="discount-section">
                    <div class="col-md-6">
                        <label for="discount" class="form-label">Phần trăm giảm giá (%)</label>
                        <input type="number" class="form-control" id="discount" name="discount" min="0" max="100" value="0">
                    </div>
                    <div class="col-md-6">
                        <label for="pricesale" class="form-label">Giá sau khi giảm</label>
                        <input type="number" class="form-control" id="pricesale" name="pricesale" readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="category_id" class="form-label">Danh mục</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            <option value="">Chọn danh mục</option>
                            {!! $htmlcategoryid !!}
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="brand_id" class="form-label">Thương hiệu</label>
                        <select class="form-control" id="brand_id" name="brand_id" required>
                            <option value="">Chọn thương hiệu</option>
                            {!! $htmlbrandid !!}
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="status" class="form-label">Trạng thái</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="1">Hiển thị</option>
                            <option value="0">Ẩn</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="description" class="form-label">Mô tả sản phẩm</label>
                        <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                    </div>
                </div>

                <!-- Nút điều khiển -->
                <div class="d-flex justify-content-center gap-3">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Lưu sản phẩm
                    </button>
                    <a href="{{ route('admin.product.list') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Quay lại
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const checkbox = document.getElementById('is_on_sale');
        const discountSection = document.getElementById('discount-section');
        const priceInput = document.getElementById('price');
        const discountInput = document.getElementById('discount');
        const pricesaleInput = document.getElementById('pricesale');

        function toggleDiscountSection() {
            if (checkbox.checked) {
                discountSection.style.display = 'flex';
            } else {
                discountSection.style.display = 'none';
                discountInput.value = 0;
                pricesaleInput.value = '';
            }
        }

        function calculatePriceSale() {
            const price = parseFloat(priceInput.value) || 0;
            const discount = parseFloat(discountInput.value) || 0;
            const pricesale = price - (price * discount / 100);
            pricesaleInput.value = pricesale.toFixed(0);
        }

        checkbox.addEventListener('change', toggleDiscountSection);
        discountInput.addEventListener('input', calculatePriceSale);
        priceInput.addEventListener('input', calculatePriceSale);

        toggleDiscountSection();
    });
</script>

<style>
.product-list-container {
    max-width: 1000px;
    background: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    color: black;
    padding: 20px;
}

.form-label {
    font-weight: bold;
}

.form-control {
    border-radius: 5px;
}

.btn {
    padding: 8px 15px;
    border-radius: 5px;
}

.btn-success:hover {
    background-color: #218838;
}

.btn-secondary:hover {
    background-color: #5a6268;
}
</style>
@endsection
