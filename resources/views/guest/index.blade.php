@extends('template.template')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Tamu</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Data Tamu</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Tabel Tamu</h2>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
             <a class="btn btn-sm btn-success" href="{{ url('guest/create') }}"><i class="fa fa-plus"></i> Tambah Tamu</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Telp</th>
                      <th>Alamat</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($guests as $key => $guest)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $guest->name_guest }}</td>
                      <td>{{ $guest->email_guest }}</td>
                      <td>{{ $guest->phone_guest }}</td>
                      <td>{{ $guest->address_guest }}</td>
                      <td>
                        <form action="{{ url('guest/delete') }}" method="POST">
                          @method("DELETE")
                          @csrf
                          <a data-toggle="tooltip" data-placement="top" data-original-title="Edit" class="btn btn-sm btn-primary" href="{{ url('guest/edit/'. $guest->id_guest) }}"><i class="fa fa-pencil-alt"></i></a>
                          <input type="hidden" name="id_guest" value="{{ $guest->id_guest }}">
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

@endsection
