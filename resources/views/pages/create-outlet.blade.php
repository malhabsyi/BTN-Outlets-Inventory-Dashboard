@extends('pages.layout')

@section('content')

@include('pages.breadcrumb')

<div class="row">
    <div class="col-md-12">
        <form action="/store-outlet" class="form-input-section" method="POST" enctype="multipart/form-data" id="my-form">
            @csrf
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Nama Outlet</label>
                <div class="col-md-6">
                    <input type="text" class=" form-input" name="outlet_name"placeholder="Nama Outlet" required>
                </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Kantor Cabang</label>
                <div class="col-md-6">
                <select id="kantor_cabang" name="kantor_cabang_id" class="form-input" required>
                <option value="1">Pilih Kantor Cabang</option>
                @foreach($kantorcabang as $kc)
                    <option value="{{ $kc->id }}">{{ $kc->kantor_cabang_name }}</option>
                @endforeach
                </select>
            </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Sub Branch Head</label>
                <div class="col-md-6">
                    <input type="text" class=" form-input" name="outlet_sbh" placeholder="Masukan Nama Sub Branch Head" required>
                </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Outlet Number</label>
                <div class="col-md-6">
                    <input type="text" class=" form-input" name="outlet_number" placeholder="Masukan Nomor Outlet" required>
                </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Alamat</label>
                <div class="col-md-6">
                    <textarea type="text" name="outlet_location" class=" form-input" placeholder="Masukan Alamat Outlet" rows="6" required></textarea>
                </div>
            </div>
            <div class="row mb-4">
                    <label for="" class="col-md-2 text-end fw-bold py-1">Status</label>
                    <div class="col-md-6">
                <select id="status_atm" name="outlet_status" class="form-input" onchange="showHideJatuhTempo()">
                    <option value="sewa">Pilih Status Outlet</option>
                    @foreach($status as $s)
                        <option value="{{ $s }}">{{ $s }}</option>
                    @endforeach
                </select>
            </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1"id="jatuh_tempo_label">Jatuh Tempo</label>
                <div class="col-md-6">
                    <input type="date" class=" form-input" name="date" id="jatuh_tempo" placeholder="Masukan Status Outlet">
                </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Catatan</label>
                <div class="col-md-6">
                    <textarea type="text" name="outlet_note" class=" form-input" placeholder="Masukan Catatan untuk Outlet" rows="6" required></textarea>
                </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Foto Outlet</label>
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
                    <a href="overview-cabang" class="btn-go-back">
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
<!-- Modal Foto Outlet-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body  modal-upload p-5 text-center">
          <h1>Drag and Drop Your Photo Here</h1>
        
          <h1 class="or">Or</h1>
          <input type="file" name="outlet_image" class="form-input-section upload-dropzone" id="imageUpload" accept=".png, .jpg, .jpeg" required>
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
  </div>
@endsection

@section('page-scripts')
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