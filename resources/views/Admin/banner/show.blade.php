@extends('layout.admin.layout')
@section('title', 'Admin')
@section('content')
    <x-admin.dashboard />
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white text-center">
                        <h2 class="mb-0">Chi tiết Banner</h2>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <strong>ID:</strong> {{ $banner->id }}
                                </div>
                                <div class="mb-3">
                                    <strong>Tên:</strong> {{ $banner->name }}
                                </div>
                                <div class="mb-3">
                                    <strong>Link:</strong> 
                                    <a href="{{ $banner->link }}" target="_blank" class="text-primary">{{ $banner->link }}</a>
                                </div>
                                <div class="mb-3">
                                    <strong>Vị trí:</strong> {{ $banner->position }}
                                </div>
                                <div class="mb-3">
                                    <strong>Sắp xếp:</strong> {{ $banner->sort_order }}
                                </div>
                                <div class="mb-3">
                                    <strong>Mô tả:</strong> {{ $banner->description }}
                                </div>
                                <div class="mb-3">
                                    <strong>Trạng thái:</strong> 
                                    @if ($banner->status == 1)
                                        <span class="badge bg-success px-2 py-1">Hiển thị</span>
                                    @elseif ($banner->status == 0)
                                        <span class="badge bg-secondary px-2 py-1">Ẩn</span>
                                    @else
                                        <span class="badge bg-danger px-2 py-1">Đã xoá</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <strong>Hình ảnh:</strong>
                                    <div class="text-center mt-2">
                                        @if ($banner->image)
                                            <img src="{{ asset($banner->image) }}" alt="Banner" class="img-fluid rounded" style="max-width: 300px;">
                                        @else
                                            <p class="text-muted">Không có ảnh</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <strong>Ngày tạo:</strong> {{ $banner->created_at }}
                                </div>
                                <div class="mb-3">
                                    <strong>Người tạo:</strong> {{ $banner->created_by }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-light text-center">
                        <a href="{{ route('admin.banner.list') }}" class="btn btn-primary px-4">Quay lại danh sách</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection