@extends('layout.shop.layout');
@section('title', 'trang chủ');
@section('content')
<x-shop.detail :product="$product" :relatedByCategory="$relatedByCategory" :relatedByBrand="$relatedByBrand"/>
@endsection
