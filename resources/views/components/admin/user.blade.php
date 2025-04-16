@props(['custom_users'])
<div class="user-container">
    <h2>Quản Lý người dùng</h2>

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
                    <th>Tên người dùng</th>
                    <th>avatar</th>
                    <th>username</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>address</th>
                    <th>birthday</th>
                    <th>gender</th>
                    <th>role</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($custom_users  as $user)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->fullname }}</td>
                        <td>
                            @if($user->avatar)
                                <img src="{{ asset('images/user/' . $user->avatar) }}" alt="{{ $user->username }}" width="60">
                            @endif
                        </td>
                        <td>{{$user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->birthday }}</td>
                        <td>{{  $user->gender}}</td>
                        <td>{{ $user->role }}</td>

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
.user-container {
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
