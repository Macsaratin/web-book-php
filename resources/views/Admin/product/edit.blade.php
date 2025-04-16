@extends('layout.admin.layout')
@section('title', 'Sửa Sản Phẩm')
@section('content')
<x-admin.dashboard/>
@props(['htmlcategoryid', 'htmlbrandid', 'product'])

<div class="d-flex">
    <div class="product-list-container mt-5" style="margin-left: 230px; width: calc(100% - 270px);">
        <h2 class="text-center mb-4">Sửa Sản Phẩm</h2>

        <form action="{{ route('admin.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="container">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="name" name="name"
                               value="{{ old('name', $product->name) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="image" class="form-label">Hình ảnh</label><br>
                        @if($product->image)
                            <img src="{{ asset($product->image) }}" width="100" class="mb-2" alt="Current Image">
                        @endif
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="qty" class="form-label">Số lượng</label>
                        <input type="number" class="form-control" id="qty" name="qty"
                               value="{{ old('qty', $product->qty) }}" min="0" required>
                    </div>
                    <div class="col-md-4">
                        <label for="price" class="form-label">Giá gốc</label>
                        <input type="number" class="form-control" id="price" name="price"
                               value="{{ old('price', $product->price) }}" min="0" step="1000" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Giảm giá</label><br>
                        <input type="checkbox" class="form-check-input" id="is_on_sale" name="is_on_sale" value=""
                            {{ old('is_on_sale', $product->is_on_sale) ? 'checked' : '' }}>
                        <label for="is_on_sale" class="form-check-label">Có giảm giá</label>
                    </div>
                </div>

                <div class="row mb-3" id="discount-section">
                    <div class="col-md-6">
                        <label for="discount" class="form-label">Phần trăm giảm (%)</label>
                        <input type="number" class="form-control" id="discount" name="discount"
                               value="{{ old('discount', $product->discount) ?? 0 }}" min="0" max="100">
                    </div>
                    <div class="col-md-6">
                        <label for="pricesale" class="form-label">Giá sau giảm</label>
                        <input type="number" class="form-control" id="pricesale" name="pricesale"
                               value="{{ old('pricesale', $product->pricesale) }}" readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="category_id" class="form-label">Danh mục</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            <option value="">Chọn danh mục</option>
                            {!! str_replace("value=\"{$product->category_id}\"", "value=\"{$product->category_id}\" selected", $htmlcategoryid) !!}
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="brand_id" class="form-label">Thương hiệu</label>
                        <select class="form-control" id="brand_id" name="brand_id" required>
                            <option value="">Chọn thương hiệu</option>
                            {!! str_replace("value=\"{$product->brand_id}\"", "value=\"{$product->brand_id}\" selected", $htmlbrandid) !!}
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="status" class="form-label">Trạng thái</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Hiển thị</option>
                            <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Ẩn</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="description" class="form-label">Mô tả sản phẩm</label>
                        <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $product->description) }}</textarea>
                    </div>
                </div>

                <div class="d-flex justify-content-center gap-3">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Cập nhật
                    </button>
                    <a href="{{ route('admin.product.list') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Quay lại
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
.product-list-container {
    max-width: 1000px;
    background: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    color: black;
    padding: 20px;
}
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const price = document.getElementById('price');
        const discount = document.getElementById('discount');
        const pricesale = document.getElementById('pricesale');

        function updateDiscountedPrice() {
            const basePrice = parseFloat(price.value) || 0;
            const discountPercent = parseFloat(discount.value) || 0;
            const discounted = basePrice - (basePrice * discountPercent / 100);
            pricesale.value = Math.round(discounted);
        }

        price.addEventListener('input', updateDiscountedPrice);
        discount.addEventListener('input', updateDiscountedPrice);

        updateDiscountedPrice();
    });
</script>
@endsection
