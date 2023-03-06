@extends('pages.layout')

@section('content')

@include('pages.breadcrumb')

<div class="row">
    <div class="col-md-12">
    <form action="/store-item-outlet/{{$outlet->id}}" class="form-input-section" method="POST" enctype="multipart/form-data" id="my-form">
        @csrf
        <div class="row mb-4">
            <label for="" class="col-md-2 text-end fw-bold py-1">Nama Item</label>
            <div class="col-md-6">
                <input type="text" class=" form-input" name="itemoutlet_name" placeholder="Masukan Nama Item" required>
            </div>
        </div>
        <div class="row mb-4">
            <label for="" class="col-md-2 text-end fw-bold py-1">Foto Item Outlet</label>
            <div class="col-md-6">
                <div class="dropzone">
                    <img src="img/upload-image.svg" alt="Icon Upload">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="form-input-create">
                        <div class="upload-text-create mx-auto">
                            Upload Your Photo
                        </div>
                    </button>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-2">
                <a href="/overview-cabang/overview-outlet" class="btn-go-back">
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
          <input type="file" class="form-input-section upload-dropzone" name="itemoutlet_image" id="imageUpload" accept=".png, .jpg, .jpeg" required>
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
@endsection