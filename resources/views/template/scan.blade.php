
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
  <link rel="stylesheet" href="{{ asset('template/node_modules/izitoast/dist/css/iziToast.min.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('template/assets/css/components.css') }}">
  <link rel="stylesheet" href="{{ asset('plugin/sweetalert2/dist/sweetalert2.min.css') }}">
  <script src="{{ asset('plugin/sweetalert2/dist/sweetalert2.min.js') }}"></script>

  <style>
    .custom-bg {
      /* The image used */
      background-image: url("{{ asset('asset/tmp/bg.png') }}");

      /* Full height */
      height: 100%;

      /* Center and scale the image nicely */
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>

</head>

<body class="custom-bg">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <div id="app">
    <div class="main-wrapper">
      @yield('content')
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('template/assets/js/stisla.js') }}"></script>

  <!-- JS Libraies -->
  <script src="{{ asset('template/node_modules/izitoast/dist/js/iziToast.min.js') }}"></script>

  <!-- Template JS File -->
  <script src="{{ asset('template/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('template/assets/js/custom.js') }}"></script>


{{-- 
  <script>
    $(document).ready(function(){


      

      // Scan in
      // $('#scan-in').on("keypress", function(e) {
      //   if (e.keyCode == 13) {
      //     var qrcode = $(this).val();

      //     $.ajax({
      //       url     : "{{ url('scan/scan-in-process') }}",
      //       method  : "POST",
      //       type    : "JSON",
      //       data: {
      //           "_token": "{{ csrf_token() }}",
      //           "qrcode": qrcode
      //       },
      //       success : (res) => {
      //         var data = res;
      //         customToastr(data);
      //       },
      //       error : (err) => {
      //         iziToast.error({
      //           title: 'Gagal',
      //           message: "Scan gagal!",
      //           position: 'topRight'
      //         });
      //       }
      //     })

      //   }
      // });

      // Scan out
      $('#scan-out').on("keypress", function(e) {

        if (e.keyCode == 13) {
          var qrcode = $(this).val();

          $.ajax({
            url     : "{{ url('scan/scan-out-process') }}",
            method  : "POST",
            type    : "JSON",
            data: {
                "_token": "{{ csrf_token() }}",
                "qrcode": qrcode
            },
            success : (res) => {
              var data = res;
              customToastr(data);
            },
            error : (err) => {
              iziToast.error({
                title: 'Gagal',
                message: "Scan gagal!",
                position: 'topRight'
              });
            }
          })

        }
      });

    })
  </script> --}}


</body>
</html>
