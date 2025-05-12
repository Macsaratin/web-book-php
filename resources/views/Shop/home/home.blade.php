@extends('layout.shop.layout')

@section('title', 'Trang chủ')

@section('content')
<x-shop.banner :banners="$banners"/>
    <div class="homepage-container">
          <!-- Brands Section -->
          <section class="brands-section">
            <div class="container">
                <x-shop.brand :brands="$brands"/>
            </div>
        </section>
        <!-- Products Section -->
        <section class="products-section bg-light">
            
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

      
    </div>
@endsection