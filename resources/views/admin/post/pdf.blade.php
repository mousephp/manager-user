<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 5px;
        text-align: left;
    }

</style>
<body>
    <h3>Bài viết: {{$data->title}}</h3>
    <table style="width:100%">
        <tr>
            <th>Stt</th>
            <th>Title</th>
            <th>Content</th>
            <th>User</th>
            <th>Trạng thái</th>
        </tr>
        <tr>
            <td>{{$data->id}}</td>
            <td>{{$data->title}}</td>
            <td>{{$data->content}}</td>
            <td>{{$data->user->name}}</td>
            <td>{{$data->status}}</td>
        </tr>
    </table>

</body>
</html>
