@extends('pages.layout')

@section('content')

@include('pages.breadcrumb')
<div class="row mt-5">
    <div class="col-md-12">
        <div class="row">
            <a href="/edit-indikator-penilaian-outlet/{{$itemoutlet->id}}" class="text-end py-3 px-5">Edit</a>
        </div>
        <div class="indikator-penilain">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th></th>
                        <th>Kelangkapan</th>
                        <th>Indikator</th>
                        <th>Skor</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($penilaianitemoutlet as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><button class="indikator-btn" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}"><img src="/uploads/penilaianitemoutlet/{{$item->penilaianitemoutlet_gambar}}" alt="Indikator" style="border-radius: 20%; overflow: hidden; width: 75px; height: 75px;"></button></td>
                    <td>{{$item->penilaianitemoutlet_name}}</td>
                    <td>Terlihat jelas, Posisi hadap ATM (Monitor tidak terkena sinar matahari)</td>
                    <td>{{$item->penilaianitemoutlet_score}}</td>
                </tr>

                <!-- Modal Foto Outlet-->
                <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body  modal-upload p-5 text-center">
                                <h1>Foto Penilaian {{$item->penilaianitemoutlet_name}}</h1>
                                <img src="/uploads/penilaianitemoutlet/{{$item->penilaianitemoutlet_gambar}}" alt="Foto" width="80%" class="my-5">
                                <div class="btn-action" style="margin-top:-30px">
                                    <button class="btn-blue">Done</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <div class="row my-4">
        <div class="col-md-2">
            <a href="/kantor-cabang" class="btn-go-back">
                <img src="../img/go-back@2x.png" alt="Button Go Back" width="60" height="60">
            </a>
        </div>
        <div class="col-md-8 text-center">
            <button class="btn-confirm">Done</button>
        </div>
    </div>
</div>



  <!-- Modal Foto Outlet-->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body  modal-upload p-5 text-center">
          <h1>Foto Penilaian Layar Outlet</h1>
        
          <h1 class="or">Or</h1>
          <input type="file" class="upload-dropzone" id="imageUpload" accept=".png, .jpg, .jpeg">
          <div class="image-preview-square" id="preview"></div>
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