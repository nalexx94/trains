<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Trains - @yield('title')</title>

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/theme.blue.css') }}" rel="stylesheet">
    <link href="{{ '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css' }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    @yield('head')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body >
<!-- wrap begin -->
<div id="wrap">

@include('layouts.header')

    <main id="main">
        <section class="container">
                <article id="main-column">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                            </ul>


                        </div>
                    @endif

                        @if (session()->has('flash_notification.message'))
                            <div class="alert alert-{{ session('flash_notification.level') }}">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                                {!! session('flash_notification.message') !!}
                            </div>
                        @endif

                        @yield('content')
                    </article>
            </section>
        </main>

</div>
<!-- wrap end -->
    @include('layouts.footer')




<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ "https://code.jquery.com/ui/1.12.1/jquery-ui.js" }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.tablesorter.min.js') }}"></script>
<script src="{{ asset('js/jquery.tablesorter.widgets.js') }}"></script>
<script src="{{ asset('js/addons/pager/jquery.tablesorter.pager.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>


@yield('scripts')

</body>
</html>
