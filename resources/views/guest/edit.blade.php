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
      <h2 class="section-title">Edit Tamu</h2>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4></h4>
              <div class="card-header-action">
                <a class="btn btn-sm btn-primary float-right" href="{{ url('guest') }}"><i class="fa fa-arrow-left"></i> Kembali</a>
              </div>
            </div>
            <div class="card-body">
              <form action="{{ url('guest/update/'. $guest->id_guest ) }}" method="POST" autocomplete="off">
                @method('PUT')
                @csrf
                <div class="row">
                  <div class="col-xl-6">
                    <div class="form-group">
                      <label for="">Nama</label>
                      <input class="form-control" name="name" value="{{ old('name') ? old('name') : $guest->name_guest  }}" type="text">
                      @error('name')
                        <small class="text-danger"> {{ $message }} </small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="">Email</label>
                      <input class="form-control" name="email" value="{{ old('email') ? old('email') : $guest->email_guest  }}" type="text">
                      @error('email')
                        <small class="text-danger"> {{ $message }} </small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="">Telp</label>
                      <input class="form-control" name="phone" value="{{ old('phone') ? old('phone') : $guest->phone_guest  }}" type="text">
                      @error('phone')
                        <small class="text-danger"> {{ $message }} </small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="">Alamat</label>
                      <input class="form-control" name="address" value="{{ old('address') ? old('address') : $guest->address_guest  }}" type="text">
                      @error('address')
                        <small class="text-danger"> {{ $message }} </small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="">Keterangan</label>
                      <input class="form-control" name="information" value="{{ old('information') ? old('information') : $guest->information_guest }}" type="text">
                      @error('information') 
                        <small class="text-danger"> {{ $message }} </small>
                      @enderror
                    </div>
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
