<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Cadastro</title>
</head>
<body>

    @component('components/navbar')
    @endcomponent

    <div class="container">

        <main role="main">

            @hasSection ('body')
                
                @yield('body')
                
            @endif

        </main>

    </div>

    @component('components/footer')
    @endcomponent

    <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>-->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>

    @hasSection ('javascript')

        @yield('javascript')
        
    @endif

</body>
</html>