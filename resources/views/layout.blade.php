<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Todo App | Todos</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css', true) }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/toastr.min.css', true) }}">
        
    </head>
    <body>
        @yield('modal')
        
                <div class="container">
                    <header>
                        <ul>
                            @yield('home')
                            @auth
                            <li>
                                <a href="{{ url('home') }}" class=""><i class="material-icons md-36">dashboard</i></a>
                                <span>Dashboard</span>
                            </li>
                            <li>
                                <a href="#modal1" class="modal-trigger"><i class="material-icons md-36">note_add</i></a>
                                <span>Add Todo</span>
                            </li>
                            <li class="align-right">
                                <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    <i class="material-icons md-36">logout</i>
                                </a>
                                <span>logout</span>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            <li class="align-right">
                                <a href="#" class=""><i class="material-icons md-36">person_outline</i></a>
                                <span>{{ auth()->user()->name }}</span>
                            </li>
                            @endauth
                        </ul>
                    </header>
                    @yield('content')
                </div>
            

        <!-- Compiled and minified JavaScript -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
        <script src="{{ asset('js/toastr.min.js') }}"></script>
        <script type="text/javascript">
            @if(session()->has('success'))
            toastr.success("{{ session()->get('success') }}");
            @endif
            @if(session()->has('info'))
            toastr.info("{{ session()->get('info') }}");
            @endif
            @if(session()->has('error'))
            toastr.error("{{ session()->get('error') }}");
            @endif
            $(document).ready(function(){
                M.AutoInit();
                $('.collapsible').collapsible();
                $('.modal').modal();
            });
        </script>
    </body>
</html>
