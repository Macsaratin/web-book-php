@extends('layout.shop.layout');
@section('title', 'trang chủ');
@section('content')
<x-shop.productbycategory :products="$products" :categories="$categories" :category="$category"/>
@endsection
