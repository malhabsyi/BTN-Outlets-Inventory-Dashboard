@extends('pages.layout')

@section('content')

@include('pages.breadcrumb')
<div class="row mt-5">
    <div class="col-md-12">
        <div class="indikator-penilain">
            <table>
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="5%"></th>
                        <th width="25%">Kelangkapan</th>
                        <th>Indikator</th>
                        <th width="5%">Skor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penilaianitemoutlets as $penilaianitemoutlet)
                    <tr>
                        <form action="/update-indikator-penilaian-outlet/{{ $penilaianitemoutlet->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div style="border-radius: 20%; overflow: hidden; width: 75px; height: 75px;">
                                    <img src="/uploads/penilaianitemoutlet/{{$penilaianitemoutlet->penilaianitemoutlet_gambar}}" alt="Indikator" style="width: 100%; height: 100%;">
                                </div>
                            </td>
                            <td>
                                <input type="text" name="penilaianitemoutlet_name" class="form-control" value="{{ $penilaianitemoutlet->penilaianitemoutlet_name }}" placeholder="Masukan Kelangkapan">
                            </td>
                            <td>
                                <input type="text" name="indikator" class="form-control" value="{{ $penilaianitemoutlet->indikator }}" placeholder="Masukan Indikator">
                            </td>
                            <td>
                                <input type="number" name="penilaianitemoutlet_score" min="0" max="3" class="form-control" value="{{ $penilaianitemoutlet->penilaianitemoutlet_score }}">
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </td>
                            <td>
                            <form method="POST" action="/delete-indikator-penilaian-outlet/{{ $penilaianitemoutlet->id }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
    
                        
                    </tr>
                    @endforeach

                    <tr>
                    <form action="/store-indikator-penilaian-outlet/{{ $itemoutlet->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <td>{{ "New" }}</td>
                            <td>
                            

                            <div class="dropzone" style="height: 50px;">
                            


                            <input type="file"  class="form-input-file" name='penilaianitemoutlet_gambar' style="top: 0;"  placeholder="Masukan Foto " required>
                            </div>

                            </td>
                            <td>
                                <input type="text" name="penilaianitemoutlet_name" class="form-control"  placeholder="Masukan Kelangkapan" required>
                            </td>
                            <td>
                                <input type="text" name="indikator" class="form-control"  placeholder="Masukan Indikator" required>
                            </td>
                            <td>
                                <input type="number" name="penilaianitemoutlet_score" min="0" max="3" class="form-control" required>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </td>
                        </form>                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row my-4">
        <div class="col-md-2">
            <a href="/indikator-penilaian-outlet/{{$itemoutlet->id}}" class="btn-go-back">
                <img src="../img/go-back@2x.png" alt="Button Go Back" width="60" height="60">
            </a>
        </div>
        <div class="col-md-8 text-center">
            <button class="btn-confirm">Done</button>
        </div>
    </div>
</div>

@endsection

@section('page-scripts')
@endsection