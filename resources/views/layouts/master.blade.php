<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <style>
        body {
            padding-top: 4.5rem;
        }

        .footer {
            background-color: #f5f5f5;
        }

    </style>

<body>
    @include('part.nav')
    <main role="main" class="flex-shrink-0">
        <div id="app">
            <div class="container">
                <div class="card">
                    @section('content')
                    @show
                </div>
            </div>
        </div>
    </main>
    <br>
    @include('part.foot')
</body>
{{-- <script src="{{asset('js/app.js') }}" charset="utf-8"></script> --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
@section('script')
@show
</head>

</html>
