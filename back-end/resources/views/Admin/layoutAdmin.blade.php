<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
<link rel="stylesheet" href="../../js/dropzone-5.7.0/dist/min/dropzone.min.css">
<link rel="stylesheet" href="../../js/dropzone-5.7.0/dist/min/basic.min.css">
<link rel="stylesheet" href="../../js/dropzone-5.7.0/dist/basic.css">
<link rel="stylesheet" href="../../js/dropzone-5.7.0/dist/dropzone.css">
<link rel="stylesheet" href="../../css/index.css">
<link rel="stylesheet" href="../../css/myphoto.css">
<link rel="stylesheet" href="../../css/editUser.css">
<link rel="stylesheet" href="../../css/login.css">
<title>FotoBook Admin</title>
</head>
<body>
<header>
    <nav class="nav bg-primary navbar-expand-lg">
        <a class="navbar-brand text-light text-font" href="#">FotoBook Admin</a>
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-6">
                    <form class="form-inline py-1 my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search Photo/Album" aria-label="Search">
                    </form>
                </div>
                <div class="col-xl-6">
                    <ul class="navbar-nav ">
                        <!-- @guest
                        <li class="nav-item"><a href="/login" class="nav-link text-font text-light">Login</a></li>
                        @else
                        <li class="nav-item"><a href="/logout" class="nav-link text-font text-light">LogOut</a></li>
                        <li class="nav-item"><a class="nav-link text-font text-light">{{Auth::user()->firstName}}</a></li>
                        @endguest -->
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
@yield('main')


<!-- <script src="../../js/dropzone.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- <script src="../../js/dropzone-5.7.0/dist/min/dropzone-amd-module.min.js"></script> -->
<!-- <script src="../../js/dropzone-5.7.0/dist/min/dropzone.min.js"></script> -->
<!-- <script src="../../js/dropzone-5.7.0/dist/dropzone-amd-module.js"></script> -->
<script src="../../js/dropzone-5.7.0/dist/dropzone.js"></script>
@yield('scripts')
</body>
</html>