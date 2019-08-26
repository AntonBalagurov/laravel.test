<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }


        </style>
    </head>
    <body>
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



        <form style="width: 70%; margin: 0 auto;" method="post" action="{{ route('book-store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="select-author">Автор:</label>
                <select name="author" class="form-control" id="select-author" required>
                    <option hidden></option>
                    @foreach($authors as $key => $author)
                        <option value="{{ $author->id }}">{{ $author->getFullName() }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="book-name">Название книги:</label>
                <input name="name" class="form-control" id="book-name" type="text" required>
            </div>
            <div class="form-group">
                <label for="pages-count">Количество страниц:</label>
                <input name="count_pages" class="form-control" id="pages-count" type="number" min="1" required>
            </div>
            <div class="form-group">
                <label for="book-description">Краткое описание:</label>
                <textarea  name="description" class="form-control" id="book-description" row="3" style="resize: none;" required></textarea >
            </div>
            <div class="form-group">
                <div class="custom-file">
                    <input name="image" type="file" class="custom-file-input" id="customFile" accept=".png, .jpg, .jpeg">
                    <label  class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


    </body>
</html>
