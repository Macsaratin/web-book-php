@props(['brands'])
<div class="brand-container">
    <h2>Quản Lý thương hiệu</h2>

    <div class="table-container">
    <div class="button-container">
            <button class="btn btn-warning">
            <a href="{{ route('admin.brand.trash') }}"  class="btn btn-warning mx-2">
                <i class="bi bi-trash">thùng rác</i> 
            </a>
        </button>
            <button class="btn btn-success">
                <a href="{{ route('admin.brand.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle">Thêm brand</i> 
                </a>
            </button>
        </div>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Tên thương hiệu</th>
                    <th>Hình ảnh</th>
                    <th>mô tả</th>
                    <th>sort_order</th>
                    <th>Trạng thái</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($brands  as $brand)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $brand->id }}</td>
                        <td>{{ $brand->name }}</td>
                        <td>
                            @if($brand->image)
                                <img src="{{ asset($brand->image)}}" alt="{{ $brand->name }}" width="60">
                            @endif
                        </td>
                        <td>{{ $brand->description }}</td>
                        <td>{{ $brand->sort_order }}</td>
                        
                        <td>
                            <a href="{{ route('admin.brand.updateStatus', $brand->id) }}" class="btn btn-sm 
                                @if($brand->status == 1) btn-success @else btn-danger @endif">
                                @if($brand->status == 1)  <i class="bi bi-toggle-on "></i> @else <i class="bi bi-toggle-off"></i>
                                @endif
                            </a>
                        </td>
                        </td>
                        </td>
                        <td>
                            <div class="btn-group">
                            <form action="{{ route('admin.brand.delete', $brand->id) }}"
                                         method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa và đưa vào thùng rác không?');">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i> Xoá
                                        </button>   
                                    </form>
                                <a href="{{ route('admin.brand.edit',$brand->id)}}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Sửa
                                </a>
                                <a  href="{{ route('admin.brand.show',$brand->id)}}"class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i> Chi tiết
                                </a>
                            </div>
                        </td>
                    </tr>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Phân trang -->
        <div class="pagination-controls">
        </div>
    </div>
</div>

<style>
.brand-container {
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
