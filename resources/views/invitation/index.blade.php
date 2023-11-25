@extends('template.template')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Undangan</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Data undangan</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Tabel Undangan</h2>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
             <a class="btn btn-sm btn-success" href="{{ url('invite/create') }}"><i class="fa fa-plus"></i> Tambah Undangan</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Qr Code</th>
                      <th>Nama Tamu</th>
                      <th>No Meja</th>
                      <th>Jenis Tamu</th>
                      <th>Kirim Email</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($invitations as $key => $invitation)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $invitation->qrcode_invitation }}</td>
                      <td>{{ $invitation->name_guest }}</td>
                      <td>{{ $invitation->table_number_invitation }}</td>
                      <td>{{ $invitation->type_invitation }}</td>
                      <td>
                        @if ($invitation->send_email_invitation == 1)
                          <span class="badge badge-small badge-success"><i>terkirim</i></span>
                        @else 
                          <span class="badge badge-small badge-warning"><i>menunggu</i></span>
                        @endif
                      </td>
                      <td>
                        <form action="{{ url('invite/delete') }}" method="POST">
                          @method("DELETE")
                          @csrf
                          <a target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="Link" class="btn btn-sm btn-success" href="{{ url('/invitation/'. $invitation->qrcode_invitation ) }}"><i class="fas fa-external-link-alt"></i></a>
                          <a data-toggle="tooltip" data-placement="top" data-original-title="Kirim Email" class="btn btn-sm btn-warning send-email" data-email="{{ $invitation->email_guest }}" data-name="{{ $invitation->name_guest }}" href="{{ url('invite/send-email?guestQrcode='.$invitation->qrcode_invitation.'&guestMail='.$invitation->email_guest.'&guestName='.$invitation->name_guest) }}"><i class="fa fa-envelope"></i></a>
                          <a data-toggle="tooltip" data-placement="top" data-original-title="Edit" class="btn btn-sm btn-primary" href="{{ url('invite/edit/'. $invitation->id_invitation) }}"><i class="fa fa-pencil-alt"></i></a>
                          <input type="hidden" name="id_invitation" value="{{ $invitation->id_invitation }}">
                          <input type="hidden" name="qrcode" value="{{ $invitation->qrcode_invitation }}">
                          <button data-toggle="tooltip" data-placement="top" data-original-title="Hapus" onclick="return confirm('Hapus data ini?')" class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<div class="modal fade" id="modal-send-email" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Kirim Email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-primary">
        <input id="data-email" type="hidden" value="">
        <input id="data-href" type="hidden" value="">
        <span>Undangan akan dikirim ke</span>
        <span id="email-guest"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button id="send-email-process" type="button" class="btn btn-primary">Kirim</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="loading" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Proses mengirim</h5>
        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> --}}
      </div>
      <div class="modal-body">
        <button class="btn btn-primary" type="button" disabled>
          <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
          Loading...
        </button>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){

    $(".send-email").click(function(e){
      e.preventDefault()
      var href = $(this).prop("href")
      var name = $(this).data("name")
      var email = $(this).data("email")
      $("#data-email").val(email)
      $("#data-href").val(href)
      $("#email-guest").html("<b>" +name+ "</b> | <b>"+ email + "</b>")
      $("#modal-send-email").modal('show');
    })
    $("#send-email-process").click(function(){
      $("#modal-send-email").modal('hide');
      $("#loading").modal('show');
      window.location.href = $("#data-href").val()
    })

  })
</script>

@endsection
