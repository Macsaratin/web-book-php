@props(['contacts'])
<div class="contact-container">
    <h2>Quản Lý liên hệ</h2>

    <div class="table-container">
        <div class="button-container">
            <button class="btn btn-warning">Thùng rác</button>
            <button class="btn btn-success">Thêm</button>
        </div>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Tên liên hệ</th>
                    <th>email</th>
                    <th>title</th>
                    <th>phone</th>
                    <th>content</th>
                    <th>Trạng thái</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts  as $contact)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->title }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->content }}</td>
                        <td>
                        <p class="cursor-pointer">
                            @if ($contact->status == 1)
                                <i class="bi bi-toggle-on text-success"></i>
                            @else
                                <i class="bi bi-toggle-off text-danger"></i>
                            @endif
                        </p>
                        </td>
                        </td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Xoá
                                </button>
                                <button class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Sửa
                                </button>
                                <button class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i> Chi tiết
                                </button>
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
.contact-container {
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
