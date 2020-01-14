{{ get_doctype() }}
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        {{ renderTitle() }}
        {{ stylesheetLink('https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css', false) }}
        <link rel="shortcut icon" type="image/x-icon" href="{{ url('img/favicon.ico') }}"/>
        {{ stylesheetLink('css/site.css') }}
    </head>
    <body>
        <div class="container">
            {{ content() }}
        </div>
        <!-- jQuery first, then Popper.js, and then Bootstrap's JavaScript -->
        {{ javascriptInclude('https://code.jquery.com/jquery-3.3.1.slim.min.js', false) }}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        {{ javascriptInclude('js/site.js') }}
    </body>
</html>
