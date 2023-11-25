
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Undangan Online</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('template/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('template/node_modules/select2/dist/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('template/node_modules/izitoast/dist/css/iziToast.min.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('template/assets/css/components.css') }}">
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('') }}template/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">{{ auth()->user()->name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="{{ url('user-profile') }}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="{{ url('change-password') }}" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Ganti Password
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ url('/dashboard') }}"><i class="fa fa-paper-plane"></i> {{ env("APP_NAME", "Undanganku") }} </a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/dashboard') }}"><i class="fa fa-paper-plane"></i></a>
          </div>
          <ul class="sidebar-menu">
  
            <li class="menu-header">Dashboard</li>
            <li class="{{ request()->segment(1) == 'dashboard' ? 'active' : '' }}"><a class="nav-link" href="{{ url("/dashboard") }}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Scan</li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-qrcode"></i><span>Scan</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" target="_blank" href="{{ url('scan/in') }}">Scan in</a></li>
                <li><a class="nav-link" target="_blank" href="{{ url('scan/out') }}">Scan Out</a></li>
              </ul>
            </li>
            <li class="menu-header">Tamu</li>
            @if (auth()->user()->role == 1)
            <li class="{{ request()->segment(1) == 'guest' ? 'active' : '' }}"><a class="nav-link" href="{{ url('guest') }}"><i class="fas fa-users"></i> <span>Tamu</span></a></li>
            <li class="{{ request()->segment(1) == 'invite' ? 'active' : '' }}"><a class="nav-link" href="{{ url('invite') }}"><i class="fas fa-envelope"></i> <span>Undangan</span></a></li>
            @endif
            <li class="{{ request()->segment(1) == 'arrived-manually' ? 'active' : '' }}"><a class="nav-link" href="{{ url('arrived-manually') }}"><i class="fas fa-pencil-alt"></i> <span>Tiba Manual</span></a></li>
            <li class="{{ request()->segment(1) == 'arrival-log' ? 'active' : '' }}"><a class="nav-link" href="{{ url('arrival-log') }}"><i class="fas fa-list-ul"></i> <span>Log Kedatangan</span></a></li>
            @if (auth()->user()->role == 1)
            <li class="{{ request()->segment(1) == 'event' ? 'active' : '' }}"><a class="nav-link" href="{{ url('event') }}"><i class="fas fa-calendar-check"></i> <span>Acara</span></a></li>
            <li class="{{ request()->segment(1) == 'user' ? 'active' : '' }}"><a class="nav-link" href="{{ url('user') }}"><i class="fas fa-user"></i> <span>User</span></a></li>
            @endif

          </ul>
        </aside>
      </div>

   

      @yield('content')



      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; {{ date('Y') }} <div class="bullet"></div> <a href="#">{{  env('APP_NAME', "Undanganku") }}</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('template/assets/js/stisla.js') }}"></script>

  <!-- JS Libraies -->
  <script src="{{ asset('template/node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('template/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('template/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
  <script src="{{ asset('template/node_modules/izitoast/dist/js/iziToast.min.js') }}"></script>

  <!-- Template JS File -->
  <script src="{{ asset('template/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('template/assets/js/custom.js') }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('template/assets/js/page/modules-datatables.js') }}"></script>


  <script>
    $(document).ready(function(){


      var toastrSuccess = "{{ session()->get('success') }}";
      var toastrError    = "{{ session()->get('error') }}";
      var toastrWarning    = "{{ session()->get('warning') }}";
      
      if(toastrSuccess){
        iziToast.success({
          title: 'Berhasil',
          message: toastrSuccess,
          position: 'topRight'
        });
      }

      if(toastrError){
        iziToast.error({
          title: 'Gagal',
          message: toastrError,
          position: 'topRight'
        });
      }
      if(toastrWarning){
        iziToast.warning({
          title: 'Peringatan',
          message: toastrWarning,
          position: 'topRight'
        });
      }

    })
  </script>


</body>
</html>
