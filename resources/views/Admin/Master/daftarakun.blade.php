@include('Admin.Layout.header')
@include('Admin.Layout.sidebar')
@include('Admin.Layout.daftarakun')
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

  {{-- script data table --}}
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>

  @if ($message = Session::get('success'))
  <script>
    Swal.fire({
      title: "SELAMAT",
      text: "Akun Berhasil Di Daftarkan",
      icon: "success"
    });
  </script>
@endif
</body>

</html>