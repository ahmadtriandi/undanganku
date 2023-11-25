@extends('template.template')
@section('content')
<div class="main-content" style="min-height: 847px;">
  <section class="section">
    <div class="section-header">
      <h1>Ganti Password</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Ganti Password</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Ganti Password</h2>
      <div class="row">
        <div class="col-12 col-sm-12 col-lg-7">
          <div class="card author-box card-primary">
            <div class="card-body">
              <form action="{{ url('change-password-process') }}" method="POST">
                @csrf
                <div class="row">
                  <div class="form-group col-xl-6">
                    <label for="">Password Lama</label>
                    <input class="form-control" type="password" name="old_pass" required>
                  </div>
                  <div class="form-group col-xl-6">
                    <label for="">Password Baru</label>
                    <input class="form-control" type="password" name="new_pass" required>
                  </div>
                  <div class="form-group col-xl-6">
                    <label for="">Konfirmasi Password Baru</label>
                    <input class="form-control" type="password" name="pass_conf" required>
                  </div>

                </div>
                <div class="form-group">
                  <button class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Ganti Password</button>
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