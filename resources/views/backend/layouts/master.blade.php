<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/dashboard/dashboard.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        main {
            padding-top: 1.5rem;
        }

        .container {
            width: auto;
            height: auto;
        }

        .footer {
            background-color: #f5f5f5;
            position: fixed;
            bottom: 0;
            left: 16rem;
        }

    </style>

<body>
    @include('backend.part.nav')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div id="app">
            <div class="container-fluid">
                <div class="card">
                    @include('backend.part.sidebar')
                    @section('content')
                    @show
                </div>
            </div>
        </div>
    </main>
    <br>
    {{-- @include('backend.part.foot') --}}
</body>
@include('sweetalert::alert')
{{-- <script src="{{ asset('js/app.js') }}" charset="utf-8"></script> --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="//cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
{{-- <script>CKEDITOR.replace('summary-ckeditor');</script> --}}
@section('script')
@show
</head>

</html>
