@extends('layout.admin.layout')
@section('title', 'Thùng Rác Banner')
@section('content')
@props(['trashCount'])
<x-admin.dashboard />
<div class="banner-container">
    <h2>Thùng Rác Banner</h2>
    <div class="table-container">
        <a href="{{ route('admin.banner.list') }}" class="btn btn-secondary">Quay lại</a>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Tên Banner</th>
                    <th>Hình ảnh</th>
                    <th>Mô tả</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trashCount as $banner)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $banner->id }}</td>
                        <td>{{ $banner->name }}</td>
                        <td>
                            @if($banner->image)
                                <img src="{{ asset($banner->image) }}" width="60">
                            @endif
                        </td>
                        <td>{{ $banner->description }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.banner.restore', $banner->id) }}" 
                                    class="btn btn-success btn-sm"
                                    onclick="return confirm('Bạn có chắc muốn khôi phục banner này không?');">
                                    <i class="bi bi-arrow-counterclockwise"></i> Khôi phục
                                </a>
                                <form action="{{ route('admin.banner.destroy', $banner->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xoá banner này không?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Xóa vĩnh viễn
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
.banner-container {
    max-width: 900px;
    margin: auto;
    padding: 20px;
    background: white;
    border-radius: 8px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    color: #4a5568;
}

.table-container {
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    border: 1px solid #e2e8f0;
    padding: 10px;
    text-align: center;
}

th {
    background-color: #edf2f7;
}

.btn-group {
    display: flex;
    gap: 5px;
}
</style>
@endsection
