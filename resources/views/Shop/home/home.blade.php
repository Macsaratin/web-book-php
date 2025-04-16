@extends('layout.shop.layout')

@section('title', 'Trang chủ')

@section('content')
    <div class="homepage-container">
        <!-- Banner Section -->
        <section class="banner-section">
            <div class="container">
                <x-shop.banner :banners="$banners"/>
            </div>
        </section>

        <!-- Products Section -->
        <section class="products-section bg-gray">
            <div class="container">
                <x-shop.product :products="$products"/>
                <div class="text-center mb-4">
                    <a href="{{ route('shop.product.products') }}" class="btn btn-secondary btn-lg">Xem thêm</a>
                </div>
            </div>
        </section>

        <!-- Categories Section -->
        <section class="categories-section">
            <div class="container">
                <x-shop.category :categories="$categories"/>
            </div>
        </section>

        <!-- Sale Products Section -->
        <section class="sale-products-section">
            <div class="container">
                <x-shop.productsale :saleProducts="$saleProducts"/>
                <div class="text-center mb-4">
                    <a href="{{ route('shop.product.productsale') }}" class="btn btn-secondary btn-lg">Xem thêm</a>
                </div>
            </div>
        </section>

        <!-- Brands Section -->
        <section class="brands-section">
            <div class="container">
                <x-shop.brand :brands="$brands"/>
            </div>
        </section>
    </div>
@endsection