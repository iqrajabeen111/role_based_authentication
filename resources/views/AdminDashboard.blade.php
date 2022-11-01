<!DOCTYPE html>
<html>
<head>
    <title>Custom Auth in Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
        <div class="container">
           
            <a class="navbar-brand mr-auto" href="#">Welcome {{$username}}</a>
            <!-- <a class="navbar-brand mr-auto" href="{{url('todo/create')}}">Add Todo</a>
            <a class="navbar-brand mr-auto" href="{{url('todo/show')}}">List tasks</a> -->
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                 
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                  
                </ul>
            </div>
        </div>
    </nav>
    
    @yield('content')
    
</body>
</html>