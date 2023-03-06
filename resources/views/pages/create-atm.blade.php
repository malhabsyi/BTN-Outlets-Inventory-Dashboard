@extends('pages.layout')

@section('content')

@include('pages.breadcrumb')

<div class="row">
    <div class="col-md-12">
        <form action="/store-atm" class="form-input-section"  method="POST" enctype="multipart/form-data" id="my-form">
            @csrf
            

            <div class="row mb-4">
                <label for="nama_atm" class="col-md-2 text-end fw-bold py-1">Nama ATM/CRM</label>
                <div class="col-md-6">
                    <input type="text" id="nama_atm" name="atm_name" class="form-input" placeholder="Masukan Nama ATM/CRM" required>
                </div>
            </div>
            <div class="row mb-4">
                <label for="id_mesin" class="col-md-2 text-end fw-bold py-1">ID Mesin</label>
                <div class="col-md-6">
                    <input type="text" id="id_mesin" class="form-input" name="atm_machine_id" placeholder="Masukan ID Mesin" required>
                </div>
            </div>
            <div class="row mb-4">
                <label for="kantor_cabang" class="col-md-2 text-end fw-bold py-1">Kantor Cabang</label>
                <div class="col-md-6">
                    <select id="kantor_cabang" name="kantor_cabang_id" class="form-input" required>
                        <option value="">Pilih Kantor Cabang</option>
                        @foreach($kantorcabang as $kc)
                            <option value="{{ $kc->id }}">{{ $kc->kantor_cabang_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-4">
                <label for="alamat_atm" class="col-md-2 text-end fw-bold py-1">Alamat</label>
                <div class="col-md-6">
                    <textarea id="alamat_atm" name="atm_location" class="form-input" placeholder="Masukan Alamat ATM" rows="6" required></textarea>
                </div>
            </div>
            <div class="row mb-4">
                <label for="status_atm" class="col-md-2 text-end fw-bold py-1">Status</label>
                <div class="col-md-6">
                    <select id="status_atm" name="atm_status" class="form-input" onchange="showHideJatuhTempo()">
                        <option value="sewa">Pilih Status ATM</option>
                        @foreach($status as $s)
                            <option value="{{ $s }}">{{ $s }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-4">
                <label for="jenis_atm" class="col-md-2 text-end fw-bold py-1">Jenis ATM</label>
                <div class="col-md-6">
                    <select id="jenis_atm" name="atm_jenis" class="form-input">
                        <option value="atm">Pilih Jenis ATM</option>
                        @foreach($jenis as $s)
                            <option value="{{ $s }}">{{ $s }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-4">
                <label for="jatuh_tempo" id="jatuh_tempo_label" class="col-md-2 text-end fw-bold py-1">Jatuh Tempo</label>
                <div class="col-md-6">
                    <input type="date" id="jatuh_tempo" class="form-input" name="date" placeholder="Masukan Jatuh Tempo ATM">
                </div>
            </div>
            <div class="row mb-4">
                <label for="outlet" class="col-md-2 text-end fw-bold py-1">Outlet</label>
                <div class="col-md-6">
                    <select id="outlet" class="form-input" name="outlet_id">
                        <option value="">Pilih Outlet</option>
                        @foreach($outlet as $o)
                            <option value="{{ $o->id }}">{{ $o->outlet_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-4">
                <label for="catatan" class="col-md-2 text-end fw-bold py-1">Catatan</label>
                    <div class="col-md-6">
                            <textarea type="text" class=" form-input" name="atm_note" placeholder="Masukan Catatan untuk ATM" rows="6"></textarea>
                    </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-2 text-end fw-bold py-1">Foto ATM</label>
                        <div class="col-md-6">
                            <div class="dropzone">
                                <img src="img/upload-image.svg" alt="Icon Upload">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="form-input-create">
                                <div class="upload-text-create mx-auto">
                                    Upload Your Photo 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-2">
                            <a href="/" class="btn-go-back">
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

<!-- Modal Foto ATM-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body  modal-upload p-5 text-center">
          <h1>Drag and Drop Your Photo Here</h1>
        
          <h1 class="or">Or</h1>
          <input type="file" class="form-input-section upload-dropzone" name="atm_image" id="imageUpload" accept=".png, .jpg, .jpeg" required>
          <div class="image-preview-square" id="preview"></div>
          <div style="margin-top:-50px">
              <button class="btn-upload">Select File</button>
          </div>

          <div class="btn-action" style="display:none">
            <button class="btn-red">Cancel</button>
            <button class="btn-blue" id="save-btn">Save</button>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('page-scripts')
<script>
    $(document).ready(function(){
    
        $(document).on("change", "#imageUpload", function() {
            readURL(this)
        })
    
        function readURL(input) {
    
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {    
                $('#preview').css('background-image', 'url('+e.target.result +')');
                $('#preview').css('background-repeat', 'no-repeat');
                $('#preview').css('background-size', 'cover');
                $('#preview').css('background-position', 'center');
                $('#preview').hide();
                $('#preview').fadeIn(650);
    
                $('.btn-upload').css('display', 'none')
                $('.btn-action').removeAttr('style')
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
        
    })
</script>
<script>
document.getElementById('save-btn').addEventListener('click', function() {
    document.querySelector('.form-input-section [type="submit"]').click();
});
</script>
<script>
    const form = document.querySelector('#my-form');
    const fileInput = document.querySelector('#imageUpload');

    form.addEventListener('submit', function(event) {
        // Append the file input to the form
        form.appendChild(fileInput);
    });
</script>
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