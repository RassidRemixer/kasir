<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LOGIN KASIR</title>
  <link rel="shortcut icon" type="image/png" href="{{asset('/assets/images/logos/favicon.png')}}" />
  <link rel="stylesheet" href="{{asset('/assets/css/styles.min.css')}}" />
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>

</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <p class="text-center h1">LOGIN</p>
                <p class="text-center ">Silahkan Login Untuk Mengakses Toko</p>
                <form action="{{ route('authenticate') }}" method="post">
                  @csrf
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required autofocus>
                  </div>
                  <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                  </div>
                  <div>
                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Login</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{asset('/assets/libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  @if ($message = Session::get('failed'))
    <script>
      // Swal.fire(' {{$message}} ');
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Email Atau Password Anda Salah",
        // footer: '<a href="#">Why do I have this issue?</a>'
      });
    </script>
@endif

@if ($message = Session::get('success'))
    <script>
      Swal.fire({
      title: "Logout Berhasil",
      text: "Silahkan Login Lagi Untuk Mengakses Kasir",
      icon: "success"
    });
    </script>
@endif
</body>

</html>