<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{mix('css/common.css')}}">
    <script src="{{mix('js/common.js')}}"></script>
    <title>@yield('title')</title>
</head>
<body class="sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('admin.navigation')
        @include('admin.sidebar')
        <div class="content-wrapper pt-4">
            @yield('content')
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create( document.querySelector( '.editor' ) ).catch( error => {
            console.error( error );
        });
    </script>
</body>
</html>
