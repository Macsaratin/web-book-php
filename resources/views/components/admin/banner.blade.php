@props(['banners'])
<div class="banner-container">
    <h2>Quản Lý Banner</h2>

    <div class="table-container">
        <div class="button-container">
            <button class="btn btn-warning">
            <a href="{{ route('admin.banner.trash') }}"  class="btn btn-warning mx-2">
                <i class="bi bi-trash">thùng rác</i> 
            </a>
        </button>
            <button class="btn btn-success">
                <a href="{{ route('admin.banner.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle">Thêm banner</i> 
                </a>
            </button>
        </div>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Tên Banner</th>
                    <th>Hình ảnh</th>
                    <th>mô tả</th>
                    <th>link</th>
                    <th>position</th>
                    <th>Trạng thái</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($banners  as $banner)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $banner->id }}</td>
                        <td>{{ $banner->name }}</td>
                        <td>
                            @if($banner->image)
                                <img src="{{ asset($banner->image) }}" alt="{{ $banner->name }}" width="60">
                            @endif
                        </td>
                        <td>{{ $banner->description }}</td>
                        <td>{{ $banner->link }}</td>
                        <td>{{ $banner->position }}</td>
                        
                        <td>
                            <a href="{{ route('admin.banner.updateStatus', $banner->id) }}" class="btn btn-sm 
                                @if($banner->status == 1) btn-success @else btn-danger @endif">
                                @if($banner->status == 1)  <i class="bi bi-toggle-on "></i> @else <i class="bi bi-toggle-off"></i>
                                @endif
                            </a>
                        </td>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.banner.show', $banner->id) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i> Xem
                                </a>
                                    <form action="{{ route('admin.banner.delete', $banner->id) }}"
                                         method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa và đưa vào thùng rác không?');">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i> Xoá
                                        </button>   
                                    </form>
                                    <form action="{{ route('admin.banner.edit', $banner->id) }}" >
                                        <button type="submit" class="btn btn-success btn-sm">
                                            <i class="bi bi-pencil"></i> sửa
                                        </button>
                                    </form>


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
.banner-container {
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
