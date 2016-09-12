<!DOCTYPE html>
<html lang="{{ get_full_locale_for(App::getLocale(), true) }}" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('partials.seo.metadata')
    @yield('metadata')

    <title>@yield('pageTitle') &mdash; {{ $home->getTranslationAttribute('meta_title') }}</title>

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->

    {!! Theme::css('css/app.css') !!}
    @yield('styles')

    {!! Theme::js('js/vendor/modernizr-2.8.3.min.js') !!}

    <script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        ga('create','{{ $home->getTranslationAttribute('google_analytics_key') }}','auto');ga('send','pageview');
    </script>

</head>
<body class="@yield('bodyStyle', 'body-default')">

<!--[if lt IE 8]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

@yield('body')

@yield('modules')

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script>window.jQuery || document.write('<script src="{!! Theme::url('js/vendor/jquery-1.12.0.min.js') !!}"><\/script>')</script>

{!! Theme::js('js/app.js') !!}

@yield('scripts')

</body>
</html>