@props(['categories', 'trashCount'])

<div class="category-container mt-4">
    <h2 class="text-center">Quản Lý Danh Mục</h2>

    <!-- Nút điều khiển -->
    <div class="d-flex justify-content-between mb-3">
        <button class="btn btn-warning mx-2">
            <a href="{{ route('admin.category.trash') }}" class="btn btn-warning mx-2">
                <i class="bi bi-trash">Thùng rác</i> 
            </a>
        </button>
        <button class="btn btn-success">
            <a href="{{ route('admin.category.create') }}" class="btn btn-success mx-2">
                <i class="bi bi-plus-circle">Thêm danh mục</i> 
            </a>
        </button>
    </div>

    <!-- Bảng danh sách danh mục -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>

                    <th>ID</th>
                    <th>Tên Danh Mục</th>
                    <th>Slug</th>
                    <th>Trạng thái</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                            <a href="{{ route('admin.category.updateStatus', $category->id) }}" class="btn btn-sm 
                                @if($category->status == 1) btn-success @else btn-danger @endif">
                                @if($category->status == 1)  <i class="bi bi-toggle-on "></i> @else <i class="bi bi-toggle-off"></i>
                                @endif
                            </a>
                        </td>
                    <td>
                    <div class="btn-group">
                                <a href="{{ route('admin.category.show', $category->id) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i> Xem
                                </a>
                                    <form action="{{ route('admin.category.delete', $category->id) }}"
                                         method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa và đưa vào thùng rác không?');">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i> Xoá
                                        </button>   
                                    </form>
                                    <a href="{{ route('admin.category.edit',$category->id)}}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil"></i> Sửa
                                    </a>

                            </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>


<style>
.category-container {
    max-width: 900px;
    margin:  auto;
    padding: 20px;
    background: white;
    border-radius: 8px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    color: #4a5568;
}

.button-container {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 10px;
    gap: 3px;
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
.button-group {
    display: flex;
    gap: 3px;
    justify-content: center;
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