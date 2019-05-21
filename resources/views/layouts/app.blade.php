<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Cookin home</title>
        <meta name="description" content="みつなおのポートフォリオです。">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Noto+Sans+JP:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">
        <link rel="stylesheet" href='css/style.css'>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        
    </head>

    <body>
        
        <div class="wrap">

            @include('commons.navbar')
            
            <div class="container mt-2 mb-5">
                @include('commons.error_messages')
                
                @yield('content')
            </div>
        </div>
        
        @include('commons.footer')
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>