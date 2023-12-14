@include('includes.admin.header')
@stack('css')
<body>
    @include('includes.admin.nav')
    @include('flash-message')
@yield ('content')
</body>
@stack('js')
@include('includes.admin.footer')

