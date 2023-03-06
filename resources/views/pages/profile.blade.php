@extends('pages.layout')

@section('content')

@include('pages.breadcrumb')
<div class="row mt-5">
    <div class="col-md-8">
        <div class="overview-profile">
            
            <div class="avatar-upload">
                <div class="avatar-edit">
                    <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                    {{-- <label for="imageUpload"></label> --}}
                    <button class="button-uplooad" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <img src="img/Edit.png" alt="">
                    </button>
                </div>
                <div class="avatar-preview">
                    <div id="imagePreview" style="background-image: url('/img/profile.png');">
                    </div>
                </div>
            </div>
           

            <div class="py-5">
                <div class="profile-detail first-item mb-3">
                    <div>
                        <h5>Nama user</h5>
                        <p>KC Mulyosari</p>
                    </div>
                    <a href="/edit-profile" class="item-link">Edit</a>
                </div>
                <div class="profile-detail mb-4">
                    <h5>Email</h5>
                    <p>kcmulyosari@btn.com</p>
                </div>
                <div class="profile-detail mb-4">
                    <h5>Password</h5>
                    <p>*************</p>
                </div>
                <div class="profile-detail mb-4">
                    <h5>Status</h5>
                    <p>Sewa</p>
                </div>
                <div class="profile-detail mb-4">
                    <h5>ID</h5>
                    <p>102752732364</p>
                </div>
                <div class="profile-detail mb-4">
                    <h5>Kantor</h5>
                    <p>Kantor Cabang Mulyosari</p>
                </div>
                <div class="profile-detail mb-4">
                    <h5>Role</h5>
                    <p>User</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="notification p-4">
            <div class="notification-header">
                <h3 class="notification-title mt-1">Notifications</h3>
                <img src="img/Filter.png" alt="Filter" width="24" height="24" class="mt-1S">
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row py-3">
                        <div class="col-md-2">
                            <div class="notif-icon">
                                <img src="img/doorbell@2x.png" alt="Doorbell" width="40" height="40">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="notif-description mb-3">
                                <h5>Jatuh Tempo</h5>
                                <p><b>Outlet KC Mulyosari</b> pada <b>Kantor Cabang Mulyosari</b> mengalami tenggat waktu pembayaran pada tanggal <b> Februari 2023</b>.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row pb-3">
                        <div class="col-md-2">
                            <div class="notif-icon">
                                <img src="img/doorbell@2x.png" alt="Doorbell" width="40" height="40">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="notif-description mb-3">
                                <h5>Jatuh Tempo</h5>
                                <p><b>Outlet KC Mulyosari</b> pada <b>Kantor Cabang Mulyosari</b> mengalami tenggat waktu pembayaran pada tanggal <b> Februari 2023</b>.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row pb-3">
                        <div class="col-md-2">
                            <div class="notif-icon">
                                <img src="img/doorbell@2x.png" alt="Doorbell" width="40" height="40">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="notif-description mb-3">
                                <h5>Jatuh Tempo</h5>
                                <p><b>Outlet KC Mulyosari</b> pada <b>Kantor Cabang Mulyosari</b> mengalami tenggat waktu pembayaran pada tanggal <b> Februari 2023</b>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Foto profile-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body  modal-upload p-5 text-center">
          <h1>Drag and Drop Your Photo Here</h1>
        
          <h1 class="or">Or</h1>
          <input type="file" class="upload-dropzone" id="imageUpload" accept=".png, .jpg, .jpeg">
          <div class="image-preview" id="preview"></div>
          <div style="margin-top:-50px">
              <button class="btn-upload">Select File</button>
          </div>

          <div class="btn-action" style="display:none">
            <button class="btn-red">Cancel</button>
            <button class="btn-blue">Save</button>
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
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
    
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
@endsection