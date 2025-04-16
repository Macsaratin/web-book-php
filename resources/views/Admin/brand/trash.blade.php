@extends('layout.admin.layout')
@section('title', 'Thùng rác thương hiệu')
@section('content')
    <x-admin.dashboard />

    <div class="container mt-5">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Thùng rác Thương Hiệu</h4>
                <a href="{{ route('admin.brand.list') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-arrow-left"></i> Quay lại danh sách
                </a>
            </div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if ($brands->isEmpty())
                    <p class="text-center text-muted">Không có thương hiệu nào trong thùng rác.</p>
                @else
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Hình ảnh</th>
                                <th>Mô tả</th>
                                <th>Ngày xóa</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)
                                <tr>
                                    <td>{{ $brand->id }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>
                                        @if($brand->image)
                                            <img src="{{ asset($brand->image) }}" width="60" class="rounded" alt="Brand Image">
                                        @else
                                            <span class="text-muted">Không có</span>
                                        @endif
                                    </td>
                                    <td>{{ Str::limit($brand->description, 50) }}</td>
                                    <td>{{ optional($brand->deleted_at)->format('d/m/Y H:i') ?? 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('admin.brand.restore', $brand->id) }}" class="btn btn-success btn-sm">
                                            <i class="bi bi-arrow-clockwise"></i> Khôi phục
                                        </a>
                                        <form action="{{ route('admin.brand.delete', $brand->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn chắc chắn muốn xóa vĩnh viễn thương hiệu này?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash3-fill"></i> Xóa vĩnh viễn
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
