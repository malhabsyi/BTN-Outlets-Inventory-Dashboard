@extends('pages.layout')

@section('content')

@include('pages.breadcrumb')

<div class="row">
    <div class="col-md-12">
        <form action="/update-outlet/{{$outlet->id}}" class="form-input-section" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Nama Outlet</label>
                <div class="col-md-6">
                    <input type="text" class=" form-input" name="outlet_name" value="{{$outlet->outlet_name}}" placeholder="Nama Outlet" required>
                </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Kode Outlet</label>
                <div class="col-md-6">
                    <input type="text" class=" form-input" name="outlet_number" value="{{$outlet->outlet_number}}" placeholder="Kode Outlet" required>
                </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Kantor Cabang</label>
                <div class="col-md-6">
                    <select id="kantor_cabang" name="kantor_cabang_id" class="form-input" required>
                        <option value="{{$outlet->kantorcabang->id}}">Pilih Kantor Cabang</option>
                        @foreach($kantorcabang as $kc)
                            <option value="{{ $kc->id }}">{{ $kc->kantor_cabang_name }}</option>
                        @endforeach
                    </select>    
                </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Sub Branch Head</label>
                <div class="col-md-6">
                    <input type="text" class=" form-input" name="outlet_sbh" value="{{$outlet->outlet_sbh}}" placeholder="Masukan Nama Sub Branch Head" required>
                </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Alamat</label>
                <div class="col-md-6">
                    <textarea type="text" class=" form-input" name="outlet_location" placeholder="Masukan Alamat Outlet" rows="6" required>{{$outlet->outlet_location}}</textarea>
                </div>
            </div>
            <div class="row mb-4">
                <label for="status_atm" class="col-md-2 text-end fw-bold py-1">Status</label>
                <div class="col-md-6">
                    <select id="status_atm" name="atm_status" class="form-input">
                        <option value="{{$outlet->outlet_status}}">{{$outlet->outlet_status}}</option>
                        @foreach($status as $s)
                            <option value="{{ $s }}">{{ $s }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Jatuh Tempo</label>
                <div class="col-md-6">
                    <input type="date" class=" form-input" name="date" value="{{$outletdeadline}}" placeholder="Masukan Status Outlet">
                </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Catatan</label>
                <div class="col-md-6">
                    <textarea type="text" class=" form-input" name="outlet_note" placeholder="Masukan Catatan untuk Outlet" rows="6" required>{{$outlet->outlet_note}}</textarea>
                </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Foto Outlet</label>
                <div class="col-md-6">
                    <div class="dropzone">
                        <img src="img/upload-image.svg" alt="Icon Upload">
                        <input type="file" class="form-input-file" name="outlet_image">
                        <div class="upload-text mx-auto">
                            Upload Your Photo 
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-2">

                    <button class="btn-go-back">
                        <img src="../img/go-back@2x.png" alt="Button Go Back" width="60" height="60">
                    </button>
                </div>
                <div class="col-md-6 text-center">
                    <button class="btn-confirm">Confirm</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection