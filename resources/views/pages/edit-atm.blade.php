@extends('pages.layout')

@section('content')

@include('pages.breadcrumb')

<div class="row">
    <div class="col-md-12">
        <form action="/update-atm/{{$atm->id}}" class="form-input-section" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Nama ATM/CRM</label>
                <div class="col-md-6">
                    <input type="text" class=" form-input"  name="atm_name" value="{{$atm->atm_name}}" placeholder="Masukan Nama ATM/CRM" required>
                </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">ID Mesin</label>
                <div class="col-md-6">
                    <input type="text" class=" form-input" name="atm_machine_id" value="{{$atm->atm_machine_id}}" placeholder="Masukan ID Mesin" required>
                </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Kantor Cabang</label>
                <div class="col-md-6">
                    <input type="text" class=" form-input" value="{{$atm->kantorcabang->kantor_cabang_name}}" placeholder="Nama Kantor Cabang" readonly>
                </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Alamat</label>
                <div class="col-md-6">
                    <textarea type="text" class=" form-input" name="atm_location" placeholder="Masukan Alamat ATM" rows="6" required>{{$atm->atm_location}}</textarea>
                </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Status</label>
                <div class="col-md-6">
                    <select id="status_atm" name="atm_status" class="form-input" onchange="showHideJatuhTempo()">
                        <option value="{{$atm->atm_status}}">{{$atm->atm_status}}</option>
                        @foreach($status as $s)
                            <option value="{{ $s }}">{{ $s }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Jatuh Tempo</label>
                <div class="col-md-6">
                    <input type="date" class=" form-input" name="date" value="{{$atmdeadline}}" placeholder="Masukan Jatuh Tempo ATM" {{ $atm->outlet != null ? 'readonly' : '' }}>
                </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Outlet</label>
                <div class="col-md-6">
                    <input type="text" class=" form-input" value="{{$outletname}}" placeholder="Masukan Outlet" readonly>
                </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Catatan</label>
                <div class="col-md-6">
                    <textarea type="text" class=" form-input" name="atm_note" placeholder="Masukan Catatan untuk ATM" rows="6" required>{{$atm->atm_note}}</textarea>
                </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Foto ATM</label>
                <div class="col-md-6">
                    <div class="dropzone">
                        <input type="file" class="form-input-file" name='atm_image'>
                        <div class="upload-text mx-auto">
                            Upload Your Photo 
                        </div>
                        <div class="preview-edit">
                            <img src="/img/outlet2.png" alt="Foto" height="190">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-2">
                    <a href="/overview-cabang/overview-atm/{{$atm->id}}" class="btn-go-back">
                        <img src="../img/go-back@2x.png" alt="Button Go Back" width="60" height="60">
                    </a>
                </div>
                <div class="col-md-6 text-center">
                    <button class="btn-confirm" type="submit" name="submit">Confirm</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
@section('page-scripts')
<script>
function showHideJatuhTempo() {
  var status = document.getElementById("status_atm").value;
  var jatuhTempoField = document.getElementById("jatuh_tempo");
  var jatuhTempoLabel = document.getElementById("jatuh_tempo_label");
  if (status === "milik perusahaan") {
    jatuhTempoField.style.display = "none";
    jatuhTempoLabel.style.display = "none";
    jatuhTempoField.value = "0000-00-00";
  } else {
    jatuhTempoField.style.display = "block";
    jatuhTempoLabel.style.display = "block";
    jatuhTempoField.value = "";
  }
}
</script>
@endsection