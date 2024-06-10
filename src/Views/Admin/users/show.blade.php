<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Chi tiet nguoi dung:{{$user['name']}}</h1>
    <div class="row">
        <table class="table">
            <tr>
                <th>Truong du lieu</th>
                <th>Gia tri</th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{$user['id']}}</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{$user['name']}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{$user['email']}}</td>
            </tr>
            <tr>
                <td>Password</td>
                <td>{{$user['password']}}</td>
            </tr>
        </table>
    </div>
</body>
</html>