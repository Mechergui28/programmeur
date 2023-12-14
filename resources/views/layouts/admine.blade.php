@include('includes.admin.header')

<div class="container">
@stack('css')
{{-- @include('includes.admin.sidebar') --}}

@yield ('content')
</div>
@include('includes.admin.footer')



</body>
</html>
