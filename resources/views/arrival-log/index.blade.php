@extends('template.template')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Log Kedatangan</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Log kedatangan</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Tabel Log Kedatangan</h2>

      <div class="row">
        <div class="col-12">
          <div class="card">
            {{-- <div class="card-header">
            </div> --}}
            <div class="card-body">

              <div class="mb-4">
                <div class="row">
                  <div class="col-lg-4">
                    <form action="">
                      <div class="form-group">
                        <label for="">Filter</label>
                        <select class="form-control form-control-sm" name="type">
                          <option value="">- Jenis Tamu-</option>
                          <option value="reguler">Reguler</option>
                          <option value="vip">Vip</option>
                        </select>
                      </div>
                      {{-- <div class="form-group">
                        <select class="form-control form-control-sm" name="table">
                          <option value="">- Meja -</option>
                          <option value="">- Jenis -</option>
                          <option value="">- Jenis -</option>
                        </select>
                      </div> --}}
                      <div class="form-group">
                        <div class="float-right">
                          <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-filter"></i> Filter</button>
                          <a class="btn btn-sm btn-warning" href="{{ url('arrival-log/export') . $paramsUrl }}"><i class="fa fa-file-export"></i> Export Excel</a>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

              </div>


              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Qr Code</th>
                      <th>Nama Tamu</th>
                      <th>Jenis Tamu</th>
                      <th>No Meja</th>
                      <th>Datang</th>
                      <th>Pulang</th>
                      <th>Detail</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($invt as $key => $invt)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $invt->qrcode_invitation }}</td>
                      <td>{{ $invt->name_guest }}</td>
                      <td>{{ ucwords($invt->type_invitation) }}</td>
                      <td>{{ $invt->table_number_invitation }}</td>
                      <td>{{ $invt->checkin_invitation }}</td>
                      <td>{{ $invt->checkout_invitation }}</td>
                      <td>
                        <a data-toggle="tooltip" data-placement="top" data-original-title="Detail" class="btn btn-sm btn-primary" href="{{ url('arrival-log/'. $invt->id_invitation) }}"><i class="fa fa-info-circle"></i></a>
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
