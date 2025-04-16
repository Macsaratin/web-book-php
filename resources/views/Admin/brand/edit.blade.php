@extends('layout.admin.layout')
@section('title', 'Sửa Thương Hiệu')
@section('content')
    <x-admin.dashboard />
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white text-center">
                        <h2 class="mb-0">Sửa Thương Hiệu</h2>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('admin.brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold">Tên thương hiệu</label>
                                <input type="text" class="form-control" id="name" name="name" 
                                       value="{{ old('name', $brand->name) }}" required>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Hình ảnh</label>
                                @if($brand->image)
                                    <div class="mb-2 text-center">
                                        <img src="{{ asset($brand->image) }}" alt="Brand Image" 
                                             class="img-fluid rounded shadow-sm" style="max-width: 150px;">
                                    </div>
                                @else
                                    <p class="text-muted text-center">Chưa có hình ảnh</p>
                                @endif
                                <input type="file" class="form-control" name="image" accept="image/*">
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label fw-bold">Mô tả</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $brand->description) }}</textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="sort_order" class="form-label fw-bold">Thứ tự sắp xếp</label>
                                <input type="number" class="form-control" id="sort_order" name="sort_order" 
                                       value="{{ old('sort_order', $brand->sort_order) }}">
                                @error('sort_order')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label fw-bold">Trạng thái</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="1" {{ $brand->status == 1 ? 'selected' : '' }}>Hiển thị</option>
                                    <option value="0" {{ $brand->status == 0 ? 'selected' : '' }}>Ẩn</option>
                                </select>
                                @error('status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="d-flex gap-3 justify-content-center mt-4">
                                <button type="submit" class="btn btn-success px-4">
                                    <i class="bi bi-save"></i> Cập nhật
                                </button>
                                <a href="{{ route('admin.brand.list') }}" class="btn btn-secondary px-4">
                                    <i class="bi bi-arrow-left"></i> Quay lại
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card {
            border-radius: 10px;
            overflow: hidden;
        }
        .card-header {
            padding: 15px;
        }
        .form-label {
            color: #2d3748;
        }
        .form-control, .form-select {
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }
        .form-control:focus, .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }
        .btn {
            transition: all 0.3s ease;
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        img {
            transition: transform 0.3s ease;
        }
        img:hover {
            transform: scale(1.05);
        }
    </style>
@endsection