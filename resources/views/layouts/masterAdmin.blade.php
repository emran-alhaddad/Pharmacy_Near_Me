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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>

</html>
