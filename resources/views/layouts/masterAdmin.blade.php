@include('includes.FrontAdminNavbar')

@include('includes.FrontAdminSidebar')

@yield('admin_pages')

@include('shared.image-view')

</body>

<script src="{{ asset('admin/js/script2.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if (session('error'))
    <script>
        swal("عملية غير مكتملة", "{!! session('error') !!}", "error")
    </script>
@endif
@if (session('status'))
    <script>
        swal("أكتملت العملية", "{!! session('status') !!}", "success")
    </script>
@endif

</html>

</html>
