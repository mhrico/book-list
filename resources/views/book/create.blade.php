<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create a New Book</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<body>

    <nav class="navbar navbar-expand-sm fixed-top bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('book.index') }}">Book List</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="{{ route('book.download') }}">Download PDF <i
                            class="bi bi-file-earmark-arrow-down"></i></a>
                    <a class="nav-link active" href="{{ route('book.create') }}">Create a Book <i
                            class="bi bi-plus-circle"></i></a>
                </div>
            </div>
            <form action="{{ route('book.search') }}" method="get" class="d-flex" role="search">
                @csrf
                @method('get')
                <input name="search" class="form-control me-2" type="search" placeholder="Name or Author"
                    aria-label="Search">
                <button class="btn btn-outline-success" type="submit"><i class="bi bi-search">search</i> </button>
            </form>
        </div>
    </nav>

    <div class="container-fluid mt-5 p-5 bg-dark bg-gradient">
        
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    <ul>
                        <li>{{$error}}</li>
                    </ul>
                @endforeach
            </div>
        @endif

        <form action="{{ route('book.store') }}" method="POST">
            @csrf
            @method('post')

            <div>
                <input type="text" name="name" placeholder="Book Name" class="form-control">
            </div>
            <div>
                <input type="text" name="author" placeholder="Author Name" class="form-control">
            </div>
            <div>
                <input type="text" name="isbn" placeholder="10 Digit ISBN" class="form-control">
            </div>
            <div>
                <input type="text" name="price" placeholder="Enter Price" class="form-control">
            </div>
            <div>
                <input type="text" name="quantity" placeholder="Enter Quantity" class="form-control">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

</body>

</html>
