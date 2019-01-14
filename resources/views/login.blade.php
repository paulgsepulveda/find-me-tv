<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="/css/app.css" rel="stylesheet" type="text/css"/>

        <link rel="icon" type="image/x-icon" href="/favicon.ico">

        <title>Find Me TV</title>

        <script type='text/javascript'>
             window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col">
                    <p>This is where the awesome pitch goes for joining up.</p>
                    <a href="/login/google">
                        Log In With Google
                    </a>
                    <a href="/login/facebook">
                        Log In With Facebook
                    </a>
                </div>
            </div>
        </div>

    </body>
</html>