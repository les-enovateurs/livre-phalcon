<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Phalcon PHP Framework</title>
        
        {{ assets.outputCss('entete') }}
        
        <link rel="shortcut icon" type="image/x-icon" href="{{ url('img/favicon.ico') }}"/>
    </head>
    <body>
        <div class="container">
            {{ content() }}
        </div>
        <!-- jQuery first, then Popper.js, and then Bootstrap's JavaScript -->
        {{ assets.outputJs('pied_de_page') }}
    </body>
</html>
