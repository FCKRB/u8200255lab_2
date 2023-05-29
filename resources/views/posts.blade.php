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
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <aside>
                    <form action="/posts">
                        <div class="form-group">
                        <input type="text" name="code" placeholder="Filter by code" value="{{ request()->code }}">
                        </div>
                        
                        <div class="form-group">
                        <input type="text" name="name" placeholder="Filter by name" value="{{ request()->name }}">
                        </div>

                        <div class="form-group">
                        <input type="text" name="tag" placeholder="Filter by tag" value="{{ request()->tag }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                </aside>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Code</th>
                    <th scope="col">Content</th>
                    <th scope="col">Author</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $data)
                <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->code }}</td>
                    <td>{{ $data->content }}</td>
                    <td>{{ $data->author }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $articles->links() !!}
        </div>
    </div>
</body>
</html>
