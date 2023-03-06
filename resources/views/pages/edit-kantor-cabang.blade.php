@extends('pages.layout')

@section('content')

@include('pages.breadcrumb')

<div class="row">
    <div class="col-md-12">
        <form action="/update-kantor-cabang/{{$kantorcabang->id}}" class="form-input-section" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Nama Kantor Cabang</label>
                <div class="col-md-6">
                    <input type="text" class=" form-input" name="kantor_cabang_name" value="{{$kantorcabang->kantor_cabang_name}}" placeholder="Nama Kantor Cabang" required>
                </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Alamat</label>
                <div class="col-md-6">
                    <textarea type="text" class=" form-input" name="kantor_cabang_location" placeholder="Masukan Alamat Kantor Cabang" rows="6" required>{{$kantorcabang->kantor_cabang_location}}</textarea>
                </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Kepala Kantor Cabang</label>
                <div class="col-md-6">
                    <input type="text" class=" form-input" name="kantor_cabang_sbh" value="{{$kantorcabang->kantor_cabang_sbh}}" placeholder="Masukan Nama Kepala Kantor Cabang" required>
                </div>
            </div>
            
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Jumlah Outlet</label>
                <div class="col-md-6">
                    <input type="text" class=" form-input" value="{{$kantorcabang->outlet->count()}}" placeholder="Masukan Jumlah Outlet" readonly>
                </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Jumlah ATM</label>
                <div class="col-md-6">
                    <input type="text" class=" form-input" value="{{$kantorcabang->atm->count()}}" placeholder="Masukan Jumlah ATM" readonly>
                </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Catatan</label>
                <div class="col-md-6">
                    <textarea type="text" class=" form-input" name="kantor_cabang_note" placeholder="Masukan Catatan untuk Kantor Cabang" rows="6" required>{{$kantorcabang->kantor_cabang_note}}</textarea>
                </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Foto Kantor Cabang</label>
                <div class="col-md-6">
                    <div class="dropzone">
                        <input type="file" class="form-input-file" name="kantor_cabang_image">
                        <div class="upload-text mx-auto">
                            Upload Your Photo 
                        </div>
                        <div class="preview-edit">
                            <img src="../uploads/kantorcabang/{{$kantorcabang->kantor_cabang_image}}" alt="Foto" height="190">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-2">
                    <a href="/overview-cabang/{{$kantorcabang->id}}" class="btn-go-back">
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