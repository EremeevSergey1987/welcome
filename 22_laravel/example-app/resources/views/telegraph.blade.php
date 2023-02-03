<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
    <div class="row" style="padding: 30px 0">
        <h1>Список постов</h1>
        @if(!empty($telegraph))
            @foreach($telegraph as $item)
                <div class="card border-success mb-3">
                    <div class="card-header bg-transparent border-success">
                        <p>Автор - {{$item['author']}}</p>
                        <p>Дата добавления: {{$item['created_at']}}</p>
                    </div>
                    <div class="card-body text-success">
                        <h5 class="card-title"><a href="{{$item['slug']}}">{{$item['title']}}</a></h5>
                        <p class="card-text">{{$item['text']}}</p>
                    </div>
                    <div class="card-footer bg-transparent border-success">
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal_">Edit <i class="bi bi-gear"></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDell_">Delete <i class="bi bi-trash"></i></button>
                    </div>
                </div>
            @endforeach
        @else
            <p>Постов нет</p>
        @endif

        <h2>Добавить новый пост</h2>
            <form action="index.php" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Автор</label>
                    <input name="first_name" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Заголовок</label>
                    <input name="last_name" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Текст</label>
                    <input name="text" type="textarea" class="form-control" >
                </div>

                <button type="submit" class="btn btn-success">Add post <i class="bi bi-person-fill"></i></button>
            </form>
    </div>
</div>
</body>
</html>
