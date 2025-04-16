@extends('layout.admin.layout')
@section('title', 'Admin')
@props(['trashCount'])
@section('content')
    <x-admin.dashboard />
    <div class="trash-container">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4 text-center">Thùng rác danh mục</h2>
            <!-- Bảng hiển thị sản phẩm trong thùng rác -->
            <table class="w-full border-collapse border border-gray-300">
            <a href="{{ route('admin.category.list') }}" class="btn btn-secondary mt-3">Quay lại danh sách</a>
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border p-2">Tên danh muc</th>
                        <th class="border p-2">Hình Ảnh</th>
                        <th class="border p-2">slug</th>
                        <th class="border p-2">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trashCount as $category)
                        <tr>
                            <td class="border p-2">{{ $category->category_name }}</td>
                            <td class="text-center">
                                        @if ($category->image)
                                            <img src="{{ asset($category->image) }}" alt="{{ $category->category }}"
                                                style="max-width: 100px; height: auto;">
                                        @else
                                            <span>No Image</span>
                                        @endif
                            </td>
                            <td class="border p-2 text-center">{{ $category->slug}} VND</td>
                            <td class="border p-2 text-center">
                            <div class="btn-group">
                                <a href="{{ route('admin.category.restore', $category->id) }}" 
                                    class="btn btn-success btn-sm"
                                    onclick="return confirm('Bạn có chắc muốn khôi phục sản phẩm này không?');">
                                    <i class="bi bi-arrow-counterclockwise"></i> Khôi phục
                                </a>
                                <form action="{{ route('admin.category.destroy', $category->id) }}"
                                    method="POST" onsubmit="return confirm('Bạn có chắc muốn xoá sản phẩm này không?');">
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

            <!-- Phân trang -->
            <div class="pagination-controls mt-4">
            </div>
    </div>
</div>
<style>
.trash-container {
    max-width: 900px;
    margin:  auto;
    padding: 20px;
    background: white;
    border-radius: 8px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    color: #020a17;
}
.category-img {
    width: 80px;
    height: auto;
    border-radius: 5px;
  }

.button-container {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 10px;
  }
  
h2 {
    text-align: center;
    font-size: 24px;
    color: #4a5568;
    margin-bottom: 20px;
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

button {
    background-color: #e53e3e;
    color: white;
    padding: 5px 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
button:hover {
    background-color: #c53030;
}
button {
    cursor: pointer;
  }

.text-green {
    color: green;
  }
  
.text-red {
    color: red;
  }
</style>
@endsection