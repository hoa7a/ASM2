<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container">
        <h1>Danh sách Người Dùng</h1>
        
        <a href="/admin/users/create" class="btn btn-info">Thêm mới</a>

        <div class="row">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>

                @foreach ($users as $user)
                    <tr>
                        <td> {{ $user['id'] }} </td>
                        <td> {{ $user['name'] }} </td>
                        <td> {{ $user['email'] }} </td>
                        <td> {{ $user['password'] }} </td>

                        <td>
                            <a class="btn btn-primary" href="/admin/users/{{ $user['id'] }}/update">Update </a>
                            <a class="btn btn-info" href="/admin/users/{{ $user['id'] }}/show">show  </a>
                            <a class="btn btn-danger" 
                            onclick="return comfim('bạn có chắc chắn xóa!!')"
                            href="/admin/users/{{ $user['id'] }}/delete">delete</a>
                        </td>
                    </tr>
                @endforeach
                
            </table>
        </div>
    </div>

</body>

</html>