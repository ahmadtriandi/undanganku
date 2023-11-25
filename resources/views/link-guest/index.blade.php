<html>
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

  <style>
    .custom-bg {
      /* The image used */
      background-image: url("{{ asset('asset/tmp/bg.png') }}");
      background-color: #6c3c0c;
      /* Full height */
      height: 100%;

      /* Center and scale the image nicely */
      background-position: center;
      background-repeat: repeat;
      background-size: cover;
    }
  </style>

</head>

<body class="custom-bg">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <div id="app">
    <div class="main-wrapper">
      <div class="container">
        <div class="text-center text-light">
          <img class="mt-4" src="{{ asset('asset/front/logo2.png') }}" style="width: 340px" alt="">
          <div class="h6 mt-3 text-light text-center">
            {{ $event->type_event }}
            <div class="h1" style="margin-top: 10px">
              {{ $event->name_event }}
            </div>
          </div>
        
          <div class="d-flex justify-content-center py-3">
            <div class="mx-3 text-right">
              <h5>{{  \Carbon\Carbon::parse($event->start_event)->isoFormat("dddd, DD MMMM YYYY") }}</h5>
              <h6>{{  \Carbon\Carbon::parse($event->start_event)->isoFormat("hh:mm a") ." - ".  \Carbon\Carbon::parse($event->end_event)->isoFormat("hh:mm a") }}</h6>
            </div>
            <div class="bg-light" style="padding: 0 2px"></div>
            <div class="mx-3 text-left rounded">
              <h5>{{  $event->place_event }}</h5>
              <h6>{{ $event->location_event }}</h6>
            </div>
          </div>
      
          
          <h2 class="p-2">
            {{ strtoupper($invt->type_invitation) }}
            {{ $invt->table_number_invitation != null ? "- ". ucwords($invt->table_number_invitation) : "" }}
          </h2>

          <p>
            {{ $invt->information_invitation   }}
          </p>
      
          <p class="my-3">Simpan barcode ini dan ditunjukkan pada saat acara</p>
      
          <div class="text-center mb-2">
            <img src="{{ asset('qrCode/'. $invt->qrcode_invitation .'.png') }}" class="rounded" style="width: 150px" alt="...">
            <h5 class="mt-3">
              <div id="qrcode" class="h6" style="cursor: pointer">
                <span>
                  {{ $invt->qrcode_invitation }}
                </span> 
                <i class="far fa-copy"></i>
              </div>
              <div>
                {{ $invt->name_guest }}
              </div>
            </h5>
      
            <a class="shadow-none btn rounded-pill btn-lg btn-warning mt-3 mb-2" href="{{ url('download/'. $invt->qrcode_invitation) }}">Download QrCode</a>
      
          </div>
      
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $('#qrcode').click(function() {
        var textToCopy = $('#qrcode span').text();
        var tempTextarea = $('<textarea>');
        $('body').append(tempTextarea);
        tempTextarea.val(textToCopy).select();
        document.execCommand('copy');
        tempTextarea.remove();
        iziToast.success({
              title: 'Berhasil',
              message: "Qrcode berhasil dicopy",
              position: 'topRight'
        });
      });
    });
  </script>
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

</body>
</html>
 