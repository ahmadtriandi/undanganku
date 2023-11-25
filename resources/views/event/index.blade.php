@extends('template.template')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Acara</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Acara</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Set Acara</h2>

      <div class="row">
        <div class="col-12">
          <div class="card">
            {{-- <div class="card-header">
              <h4></h4>
              <div class="card-header-action">
              </div>
            </div> --}}
            <div class="card-body">
              <form action="{{ url('event/set' ) }}" method="POST" autocomplete="off">
                @method('PUT')
                @csrf
                <div class="row">
                  <div class="col-xl-6">
                    <div class="form-group">
                      <label for="">Nama Acara</label>
                      <input required class="form-control" name="name" value="{{  $event->name_event  }}" type="text">
                    </div>
                    <div class="form-group">
                      <label for="">Jenis</label>
                      <input required class="form-control" name="type" value="{{ $event->type_event  }}" type="text">
                    </div>
                    <div class="form-group">
                      <label for="">Lokasi / Tempat</label>
                      <input required class="form-control" name="location" value="{{ $event->location_event  }}" type="text">
                    </div>
                    <div class="form-group">
                      <label for="">Mulai</label>
                      <input required class="form-control" name="start" value="{{ $event->start_event  }}" type="datetime-local">
                    </div>
                    <div class="form-group">
                      <label for="">Selesai</label>
                      <input required class="form-control" name="end" value="{{ $event->end_event  }}" type="datetime-local">
                    </div>
                    <div class="form-group">
                      <label for="">Keterangan</label>
                      <input required class="form-control" name="information" value="{{ $event->information_event  }}" type="text">
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
