<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="/css/app.css" rel="stylesheet" type="text/css"/>

        <link rel="icon" type="image/x-icon" href="/favicon.ico">

        <title>Find Me TV</title>

        <script type='text/javascript'>
             window.Laravel = <? php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <body>

        @section('content')
            <div id="app">
                <router-view></router-view>
            </div>
        @endsection

        <script type="text/javascript" src="js/app.js"></script>

    </body>
</html>