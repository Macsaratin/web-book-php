@extends('layout.admin.layout')
@section('title', 'Admin')

@section('content')
        <x-admin.dashboard />
        <x-admin.user :custom_users="$custom_users" />
@endsection