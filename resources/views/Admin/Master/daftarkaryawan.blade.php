@include('Admin.Layout.header')
@include('Admin.Layout.sidebar')
@include('Admin.Layout.daftarkaryawan')
@include('Admin.Layout.footer')

    <script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    {{-- <script src="{{ asset('js/sweetalert.min.js') }}"></script> --}}
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    

    <script>
        new DataTable('#myTable', {
            scrollX: true
            , autoWidth: false
        , });
    </script>
    <script>
        new DataTable('myTable-1');

    </script>

<script>
    function hapusUser(event, userId) {
      event.preventDefault();
      // Tampilkan konfirmasi SweetAlert
      Swal.fire({
        title: "Apa Kamu Yakin?",
        text: "Setelah Menghapus, Kamu tidak bisa Mengembalikan nya!!!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya Hapus "
      }).then((result) => {
        if (result.isConfirmed) {
          // Lakukan permintaan AJAX ke endpoint penghapusan
          $.ajax({
            url: "{{ url('hapus') }}/" + bukuId,
            type: "POST",
            data: {
              _token: "{{ csrf_token() }}",
              _method: "DELETE"
            },
            success: function(response) {
              // Tampilkan pesan sukses SweetAlert
              Swal.fire({
                title: "Terhapus!",
                text: "Buku Berhasil Dihapus.",
                icon: "success"
              }).then((result) => {
                // Me-reload halaman setelah menekan "OK"
                if (result.isConfirmed || result.dismiss === Swal.DismissReason.timer) {
                  location.reload();
                }
              });
            },
            error: function(xhr, status, error) {
              // Tampilkan pesan kesalahan SweetAlert
              Swal.fire({
                title: "Error!",
                text: "Tidak Bisa menghapus Buku.",
                icon: "error"
              });
              console.error(xhr.responseText);
            }
          });
        } else {
          // Tampilkan pesan pembatalan jika pengguna membatalkan penghapusan
          Swal.fire({
            title: "Gagal",
            text: "Buku Tidak jadi di hapus",
            icon: "info"
          });
        }
      });
    }


</body>

</html>