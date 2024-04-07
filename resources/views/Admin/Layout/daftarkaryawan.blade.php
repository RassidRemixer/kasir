<div class="body-wrapper">
    <!--  Navbar Start -->
    <header class="app-header">
      <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
          <li class="nav-item d-block d-xl-none">
            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
              <i class="ti ti-menu-2"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-icon-hover" href="javascript:void(0)">
              <i class="ti ti-bell-ringing"></i>
              <div class="notification bg-primary rounded-circle"></div>
            </a>
          </li>
        </ul>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
          <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
            {{-- <a href="/Login"  class="btn btn-primary">LOGIN</a> --}}
            <li class="nav-item dropdown">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                aria-expanded="false">
                <img src="{{asset('/assets/images/profile/user-1.jpg')}}" alt="" width="35" height="35" class="rounded-circle">
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                <div class="message-body">
                  <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                    <i class="ti ti-user fs-6"></i>
                    <p class="mb-0 fs-3">My Profile</p>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</button>
                  </form>
                  {{-- <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a> --}}
                </div>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!--  Navbar End -->
    <div class="container-fluid">
        <div class="container-fluid">
            <table id="myTable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th style="text-align: center">No</th>
                        <th style="text-align: center">Nama</th>
                        <th style="text-align: center">Email</th>
                        <th style="text-align: center">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($karyawan as $user)
                    <tr>
                        <td style="text-align: center">{{ $no++ }}</td>
                        <td style="text-align: center">{{ $user->name }}</td>
                        <td style="text-align: center">{{ $user->email }}</td>
                        <td style="text-align: center">
                            <a href="{{ route('edit.karyawan', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form id="deleteForm" action="{{ route('delete.karyawan', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="hapusUser(event, {{ $user->id }})" name="delete_user">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>                            
                        </td>
                    </tr>                    
                    @endforeach
                </tbody>
            </table>
            
        </div>
      </div>
</div>

