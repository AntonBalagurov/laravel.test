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
        <div class="flex-center position-ref full-height">

            <div class="content" style="margin: 0 auto; width: 90%;" >

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Автор</th>
                        <th scope="col">Название</th>
                        <th scope="col">Количество страниц</th>
                        <th scope="col">Краткое описание</th>
                        <th scope="col">Изображение</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $key => $book)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $book->author->getFullName() }}</td>
                                <td>{{ $book->name }}</td>
                                <td>{{ $book->count_pages }}</td>
                                <td>{{ $book->description }}</td>
                                <td><img style="width: 50px; margin: 0 auto; cursor: pointer; display: block;" src="{{ $book->getPathToImage() }}" onclick="window.open('{{ $book->getPathToImage() }}')"/></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                    {{ $books->links() }}

                <button type="button" class="btn btn-primary" onclick="location.href='{{ route('book-create') }}'">Добавить книгу</button>


            </div>
        </div>
    </body>
</html>
