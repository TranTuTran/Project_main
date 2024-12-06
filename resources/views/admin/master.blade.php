<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('administrator/css/style.css')}}">

    <script>
        function checkDelete (msg){
            if(window.confirm(msg)){
                return true;
            }
            return false;
        }
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="header"></div>
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if ($success = Session::get('success'))
                <div class="alert-info">
                    <strong>{{ $success }}</strong>
                </div>
            @endif

            @yield('content')
        </div>
        <div class="footer"></div>
    </div>
</body>
</html>