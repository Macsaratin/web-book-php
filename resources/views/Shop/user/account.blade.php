@extends('layout.shop.layout')

@section('title', 'Tài khoản của tôi')

@section('content')
<div class="container my-5">
    <h3 class="mb-4">Thông tin tài khoản</h3>

    <div class="row">
        <div class="col-md-4 text-center">
            <img src="{{ asset('imagebook/' . (auth()->user()->avatar ?? 'avatars/default.png')) }}" 
                 alt="Avatar" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
            <h5 class="text-primary">{{ auth()->user()->fullname ?? auth()->user()->name }}</h5>
        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <tr>
                    <th>Tên đăng nhập</th>
                    <td>{{ auth()->user()->username }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ auth()->user()->email }}</td>
                </tr>
                <tr>
                    <th>Điện thoại</th>
                    <td>{{ auth()->user()->phone ?? 'Chưa cập nhật' }}</td>
                </tr>
                <tr>
                    <th>Địa chỉ</th>
                    <td>{{ auth()->user()->address ?? 'Chưa cập nhật' }}</td>
                </tr>
                <tr>
                    <th>Ngày sinh</th>
                    <td>{{ auth()->user()->birthday ?? 'Chưa cập nhật' }}</td>
                </tr>
                <tr>
                    <th>Giới tính</th>
                    <td>
                        @php
                            $gender = auth()->user()->gender ?? '';
                        @endphp
                        {{ $gender === 'male' ? 'Nam' : ($gender === 'female' ? 'Nữ' : 'Khác') }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
