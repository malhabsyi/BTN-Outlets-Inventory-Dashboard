@extends('pages.layout')

@section('content')

@include('pages.breadcrumb')

<div class="row">
    <div class="col-md-12">
        <form action="#" class="form-input-section">
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Nama Kantor Cabang</label>
                <div class="col-md-6">
                    <input type="text" class=" form-input" value="Kantor Cabang Mulyosari" placeholder="Nama Kantor Cabang">
                </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Alamat</label>
                <div class="col-md-6">
                    <textarea type="text" class=" form-input" placeholder="Masukan Alamat Kantor Cabang" rows="6">Jalan Raya Mulyosari No.82-82A, Kalisari, Kec. Mulyorejo, Kota SBY, Jawa Timur 60112</textarea>
                </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Kepala Kantor Cabang</label>
                <div class="col-md-6">
                    <input type="text" class=" form-input" value="I Putu Haryasa" placeholder="Masukan Nama Kepala Kantor Cabang">
                </div>
            </div>
            
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Jumlah Outlet</label>
                <div class="col-md-6">
                    <input type="text" class=" form-input" value="3" placeholder="Masukan Jumlah Outlet">
                </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Jumlah ATM</label>
                <div class="col-md-6">
                    <input type="date" class=" form-input" value="3" placeholder="Masukan Jumlah ATM">
                </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Catatan</label>
                <div class="col-md-6">
                    <textarea type="text" class=" form-input" placeholder="Masukan Catatan untuk Kantor Cabang" rows="6">Pelayanan perlu ditingkatkan kembali dan Sticker masih ada yang kurang.</textarea>
                </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Foto Outlet</label>
                <div class="col-md-6">
                    <div class="dropzone">
                        <img src="img/upload-image.svg" alt="Icon Upload">
                        <input type="file" class="form-input-file">
                        <div class="upload-text mx-auto">
                            Upload Your Photo 
                        </div>
                        <div class="preview-edit">
                            <img src="/img/outlet.png" alt="Foto" height="190">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-2">
                    <a href="/overview-cabang" class="btn-go-back">
                        <img src="img/go-back@2x.png" alt="Button Go Back" width="60" height="60">
                    </a>
                </div>
                <div class="col-md-6 text-center">
                    <button class="btn-confirm">Confirm</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection