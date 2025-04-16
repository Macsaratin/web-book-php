@extends('layout.shop.layout');
@section('title', 'trang chủ');
@section('content')
<x-shop.productbybrand :products="$products" :brand="$brand" :brands="$brands"/>
@endsection
