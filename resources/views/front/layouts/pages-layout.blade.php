
<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en-us"><head>
    <meta charset="utf-8">
    <title>@yield('pageTitle')</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="BlogManagementSystem">
    <meta name="author" content="BlogManagementSystem">
    <meta name="generator" content="Hugo 0.74.3" />

    <!-- theme meta -->
    <meta name="theme-name" content="reader" />

    <!-- plugins -->
    <link rel="stylesheet" href="/front/plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/front/plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="/front/plugins/slick/slick.css">

    <!-- Main Stylesheet -->
    <link href="{{ asset('assets/css/iziToast.min.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="/front/css/style.css" media="screen">

    <!--Favicon-->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <meta property="og:title" content="Reader | Hugo Personal Blog Template" />
    <meta property="og:description" content="This is meta description" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:updated_time" content="2020-03-15T15:40:24+06:00" />
</head>
<body>
<!-- navigation -->
@include('front.layouts.inc.header')
<!-- /navigation -->

@yield('content')

@include('front.layouts.inc.footer')

<!-- JS Plugins -->
<script src="{{ asset('assets/js/iziToast.min.js') }}"></script>

<script src="/front/plugins/jQuery/jquery.min.js"></script>

<script src="/front/plugins/bootstrap/bootstrap.min.js"></script>

<script src="/front/plugins/slick/slick.min.js"></script>

<script src="/front/plugins/instafeed/instafeed.min.js"></script>


<!-- Main Script -->
<script src="/front/js/script.js"></script></body>

<!-- Flash Message Script -->
<script>
    $(document).ready(function() {
        @if(session()->has('success'))
        iziToast.success({
            title: '',
            position: 'topRight',
            message: '{{ session('success') }}'
        });
        @endif
    });
</script>

<script>
    $(document).ready(function() {
        @if(session()->has('error'))
        iziToast.error({
            title: '',
            position: 'topRight',
            message: '{{ session('error') }}'
        });
        @endif
    });
</script>

</html>
