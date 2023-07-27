<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,
initial-scale=1.0">
    <title>{{ $pageTitle }}</title>
    @vite('resources/sass/app.scss')
</head>

<body>
    <div class="d-flex">
        <a href="{{ route('articles.edit', ['id' => $articles->id]) }}" class="btn btn-outline-dark btn-sm me-2"><i
                class="bi-pencil-square"></i></a>
        <div>
            <form action="{{ route('admin.destroy', ['admin' => $articles->id]) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger btn-outline-light btn-sm
me-2"><i
                        class="bi-trash"></i></button>
            </form>
        </div>
    </div>
    @vite('resources/js/app.js')
</body>

</html>
