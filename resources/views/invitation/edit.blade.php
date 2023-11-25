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
      <h2 class="section-title">Edit Undangan</h2>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4></h4>
              <div class="card-header-action">
                <a class="btn btn-sm btn-primary float-right" href="{{ url('invite') }}"><i class="fa fa-arrow-left"></i> Kembali</a>
              </div>
            </div>
            <div class="card-body">
              <form action="{{ url('invite/update/'. $invitation->id_invitation ) }}" method="POST" autocomplete="off">
                @method('PUT')
                @csrf
                  <div class="row">
                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="">Nama Tamu</label>
                        <input class="form-control" type="text" value="{{ $invitation->name_guest }}" readonly>
                        @error('guest')
                          <small class="text-danger"> {{ $message }} </small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="">Type</label>
                        <select class="form-control" name="type" id="">
                          <option @if ( $invitation->type_invitation == "reguler") selected @endif value="reguler">REGULER</option>
                          <option @if ( $invitation->type_invitation == "vip") selected @endif value="vip">VIP</option>
                        </select>
                        @error('type')
                          <small class="text-danger"> {{ $message }} </small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="">No Meja</label>
                        <input class="form-control" name="table_number" value="{{ $invitation->table_number_invitation }}" type="text">
                        @error('table_number')
                          <small class="text-danger"> {{ $message }} </small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="">Keterangan</label>
                        <input class="form-control" name="information" value="{{ $invitation->information_invitation }}" type="text">
                        @error('information') 
                          <small class="text-danger"> {{ $message }} </small>
                        @enderror
                      </div>
                    </div>
                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="">Email</label>
                        <input id="email" class="form-control" type="text" readonly value="{{ $invitation->email_guest }}">
                      </div>
                      <div class="form-group">
                        <label for="">Telp</label>
                        <input id="telp" class="form-control" type="text" readonly value="{{ $invitation->phone_guest }}">
                      </div>
                      <div class="form-group">
                        <label for="">Alamat</label>
                        <input id="alamat" class="form-control" type="text" readonly value="{{ $invitation->address_guest }}">
                      </div>
                      <div class="form-group">
                        <label for="">Keterangan</label>
                        <input id="ket" class="form-control" type="text" readonly value="{{ $invitation->information_guest }}">
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <button class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button>
                      </div>
                    </div>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
