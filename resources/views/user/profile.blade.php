@extends('template.template')
@section('content')
<div class="main-content" style="min-height: 847px;">
  <section class="section">
    <div class="section-header">
      <h1>User</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Profile</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Profile</h2>

      <div class="row">
        <div class="col-12 col-sm-12 col-lg-7">
          <div class="card author-box card-primary">
            <div class="card-body">
              <div class="author-box-left">
                <img alt="image" src="{{ asset('template/assets/img/avatar/avatar-1.png') }}" class="rounded-circle author-box-picture">
                <div class="clearfix"></div>
                <span class="badge badge-primary mt-2">{{ auth()->user()->role == 1 ? "Admin" : "Resepsionis" }}</span>
              </div>
              <div class="author-box-details">
                <div class="author-box-name">
                  <a href="#">{{ auth()->user()->name }}</a>
                </div>
                <div class="author-box-job">{{ auth()->user()->username }}</div>
                <div class="author-box-description">
                  <p>{{ auth()->user()->information }}</p>
                </div>
                <div class="float-right mt-sm-0 mt-3">
                  <a href="{{ url('change-password') }}" class="btn text-primary">Ganti Password <i class="fas fa-cog"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection