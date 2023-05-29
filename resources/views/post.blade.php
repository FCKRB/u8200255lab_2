<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PHP LAB 2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h>Tags of current article</h>
        <table class="table table-bordered mb-4">
            <tr>
                <th>Name</th>
            </tr>
            @foreach($tags as $data)
                <tr>
                    <td>{{ $data }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="container mt-5">
        <h>Current article</h>
        <table class="table table-bordered mb-5">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Code</th>
                <th>Content</th>
                <th>Author</th>
                <th>Created at</th>
            </tr>
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->name }}</td>
                <td>{{ $article->code }}</td>
                <td>{{ $article->content }}</td>
                <td>{{ $article->author }}</td>
                <td>{{ $article->created_at }}</td>
            </tr>
        </table>
    </div>
</body>
