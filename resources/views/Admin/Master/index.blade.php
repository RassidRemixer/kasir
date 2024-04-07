@include('Admin.Layout.header')
@include('Admin.Layout.sidebar')
@include('Admin.Layout.dashboard')
@include('Admin.Layout.footer')

  <script src="{{asset('/assets/libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('/assets/js/sidebarmenu.js')}}"></script>
  <script src="{{asset('/assets/js/app.min.js')}}"></script>
  <script src="{{asset('/assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
  <script src="{{asset('/assets/libs/simplebar/dist/simplebar.js')}}"></script>
  <script src="{{asset('/assets/js/dashboard.js')}}"></script>
  {{-- sweetalert2 --}}
  {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script> --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  @if ($message = Session::get('success'))
  <script>
    Swal.fire({
      title: "Login Berhasil",
      text: "Selamat Datang Kasir DumilaMart",
      icon: "success"
    });
  </script>
@endif
</body>

</html>