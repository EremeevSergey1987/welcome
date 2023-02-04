<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Users</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<div class="container">
    <div class="row" style="padding: 30px 0">
        <h1>Список постов</h1>
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
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$item['id']}}">Edit</button>
                        <form method="POST" action="/telegraph_text/{{$item['id']}}">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <button type='submit' class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>

                <div class="modal fade" id="exampleModal_{{$item['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" action="/telegraph_text">
                                @csrf
                                @method('put')
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" >Edit post {{$item['title']}}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input name="id" type="hidden"  value="{{$item['id']}}">
                                    <input name="edit" type="hidden"  value="1">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">author</label>
                                        <input name="author" value="{{$item['author']}}" type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">title</label>
                                        <input name="title" value="{{$item['title']}}" type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">text</label>
                                        <textarea class="form-control" name="text" rows="3">{{$item['text']}}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        
        <h2>Добавить новый пост</h2>
            <form action="/telegraph_text" method="post">
                @csrf
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Автор</label>
                    <input name="author" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Заголовок</label>
                    <input name="title" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Текст</label>
                    <textarea class="form-control" name="text" rows="3">{{$item['text']}}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Add post <i class="bi bi-person-fill"></i></button>
            </form>
    </div>
</div>
</body>
</html>
