@extends('template.template')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Tiba Manual</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Tiba manual</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Tabel Tiba Manual</h2>

      <div class="row">
        <div class="col-12">
          <div class="card">
            {{-- <div class="card-header">
            </div> --}}
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
                      <th>Datang</th>
                      <th>Pulang</th>
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
                      <td><?= $invitation->checkin_invitation == "" ? "<span class='text-danger'>Belum Datang</span>" : $invitation->checkin_invitation ?></td>
                      <td><?= $invitation->checkout_invitation == "" ? "-" : $invitation->checkout_invitation ?></td>
                      <td>
                        <form action="{{ url('/arrived-manually/process-scan/') }}" method="POST">
                          @csrf
                          @method('PUT')
                          <input type="hidden" name="id" value="{{ $invitation->id_invitation }}">
                          <input type="hidden" name="come" value="{{ $invitation->checkin_invitation == null ? "" : "1" }}">
                          <button {{ $invitation->checkout_invitation == null ? "" : "disabled" }}  onclick="return  confirm('Scan manual')" data-toggle="tooltip" data-placement="top" data-original-title="Scan Manual" class="btn btn-sm btn-primary" type="submit"><i class="fa fa-cog"></i></button>
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

@endsection
