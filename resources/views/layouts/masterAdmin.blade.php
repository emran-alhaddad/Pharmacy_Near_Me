@include('includes.FrontAdminNavbar')

@include('includes.FrontAdminSidebar')
@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {!! session('error') !!}
    </div>
@endif
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {!! session('status') !!}
    </div>
@endif
@yield('admin_pages')


</body>

<script src="{{ asset('admin/js/script2.js') }}"></script>

</html>
