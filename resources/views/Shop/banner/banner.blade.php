@extends('layout.shop.layout');
@section('title', 'trang chủ');
@section('content')
<x-shop.banner :banners="$banners"/>
@endsection
