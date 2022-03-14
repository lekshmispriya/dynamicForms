<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="http://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">

        <!-- <link rel="stylesheet" href="{{ URL::asset('/css/app.css') }}" type="text/css"> -->
       
         <link rel="stylesheet" href="{{ url('/public/css/app.css') }}" type="text/css">
        <!-- Scripts -->
        <!-- <script src="{{ URL::asset('js/app.js') }}" defer></script> -->
        <script src="{{ url('/public/js/app.js') }}" defer></script>
 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
        <!-- <script src="{{ URL::asset('js/custom.js') }}" defer></script> -->
        <script src="{{ url('/public/js/custom.js') }}" defer></script>
        <script>
    var base_path = "{{ url('/') }}/";
</script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
