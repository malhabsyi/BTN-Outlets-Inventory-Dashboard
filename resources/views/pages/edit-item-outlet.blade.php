@extends('pages.layout')

@section('content')

@include('pages.breadcrumb')

<div class="row">
    <div class="col-md-12">
        <form action="/update-item-outlet/{{$itemoutlet->id}}" method="post"class="form-input-section" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Nama Item</label>
                <div class="col-md-6">
                    <input type="text" class=" form-input" name="itemoutlet_name"value="{{$itemoutlet->itemoutlet_name}}" placeholder="Masukan Nama Item">
                </div>
            </div>
            <div class="row mb-4">
                <label for="" class="col-md-2 text-end fw-bold py-1">Foto Item Outlet</label>
                <div class="col-md-6">
                    <div class="dropzone">
                        <img src="/uploads/itemoutlet/{{$itemoutlet->itemoutlet_image}}" alt="Icon Upload">
                        <input type="file" class="form-input-file" name="itemoutlet_image">
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