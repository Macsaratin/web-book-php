@extends('layout.shop.layout');
@section('title', 'trang chủ');
@section('content')
<x-shop.productsale :saleProducts="$saleProducts"/>
@endsection