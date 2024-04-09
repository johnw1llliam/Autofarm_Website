<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Daftar User</title>
</head>
<body>
    <h1>Daftar User</h1>
    {{ session('message') }}
    <table>
        <tr>
            <th>Id</th>
            <th>User</th>
            <th>Password</th>
        </tr>
        @php $i = 1 @endphp
        @foreach ($data as $d)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $d->Username }}</td>
            <td>{{ $d->Password }}</td>
        </tr>
        <tr>
            <td>
                <a href="/users/create" class="btn btn-success">Add</a>
            </td>
            <td>
                <a href="" class="btn btn-warning">Edit</a>
            </td>
            <td>
                <a class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        @endforeach
    </table>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>