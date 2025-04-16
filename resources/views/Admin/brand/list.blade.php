@extends('layout.admin.layout')
@section('title', 'Admin')

@section('content')
        <x-admin.dashboard />
        <x-admin.brand :brands="$brands" />
@endsection