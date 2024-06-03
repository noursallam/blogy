<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://unpkg.com/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>

    <style>
        body {
            background: #007bff;
            background: linear-gradient(to right, #0062E6, #33AEFF);
        }=
    </style>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('posts.index')}}"
                style="font-family: 'Poppins', sans-serif; font-weight: 300;">
                <img src="{{ asset('logo1.png') }}" alt="Logo" style="max-height: 40px;">
                Blogy
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse  justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-link active border border-success rounded-pill px-3 py-1 ml-4"
                        href="{{route('pages.profile')}}">profile</a>
                    <a class="nav-link active border border-success rounded-pill px-3 py-1 ml-4"
                        href="{{route('posts.index')}}">My Posts</a>
                    <a class="nav-link active border border-success rounded-pill px-3 py-1 ml-4"
                        href="{{route('posts.showall')}}">Your Timeline</a>
                    <a class="btn btn-outline-success nav-link rounded-pill px-3 py-1 ml-4" href="">Sign</a>



                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-4">

        @yield('content')
    </div>

    <script src="https://unpkg.com/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>

</html>