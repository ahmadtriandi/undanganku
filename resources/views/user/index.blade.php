@extends('template.template')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data User</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Data User</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Tabel User</h2>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
             <a class="btn btn-sm btn-success" href="{{ url('user/create') }}"><i class="fa fa-plus"></i> Tambah User</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $key => $user)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->username }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->role == 1 ? "Admin" : "Resepsionis" }}</td>
                      <td>
                        <form action="{{ url('user/delete') }}" method="POST">
                          @method("DELETE")
                          @csrf
                          <a data-toggle="tooltip" data-placement="top" data-original-title="Edit" class="btn btn-sm btn-primary" href="{{ url('user/edit/'. $user->id) }}"><i class="fa fa-pencil-alt"></i></a>
                          <input type="hidden" name="id" value="{{ $user->id }}">
                          @if ($user->id != 1)
                          <button data-toggle="tooltip" data-placement="top" data-original-title="Hapus" onclick="return confirm('Hapus data ini?')" class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>                           
                          @endif
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
