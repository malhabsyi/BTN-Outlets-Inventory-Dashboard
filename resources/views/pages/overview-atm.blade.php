@extends('pages.layout')

@section('content')

@include('pages.breadcrumb')
<div class="row mt-5">
    <div class="col-md-8">
        <div class="overview-cabang">
            <div class="image-cabang-frame p-4">
                <img src="uploads/atm/{{$atm->atm_image}}" alt="Foto ATM">
            </div>

            <div class="py-5">
                <div class="item-detail first-item mb-3">
                    <div>
                        <h5>Nama ATM/CRM</h5>
                        <p>{{$atm -> atm_name}}</p>
                    </div>
                    <a href="/edit-atm/{{$atm->id}}" class="item-link">Edit</a>
                </div>
                <div class="item-detail mb-4">
                    <h5>Kantor Cabang</h5>
                    <p>{{$atm->kantorcabang->kantor_cabang_name}}</p>
                </div>
                <div class="item-detail mb-4">
                    <h5>Alamat</h5>
                    <p>{{$atm->atm_location}}</p>
                </div>
                <div class="item-detail mb-4">
                    <h5>Status</h5>
                    <p>{{$atm->atm_status}}</p>
                </div>
                <div class="item-detail mb-4">
                    <h5>ID Mesin</h5>
                    <p>{{$atm->atm_machine_id}}</p>
                </div>
                <div class="item-detail mb-4">
                    <h5>Jatuh Tempo</h5>
                    <p>{{$atmdeadline}}</p>
                </div>
                <div class="item-detail mb-4">
                    <h5>Outlet</h5>
                    <p>{{$outletname}}</p>
                </div>

                <textarea cols="30" rows="5" class="form-control" readonly>{{$atm->atm_note}}
                </textarea>
            </div>
        </div>
        
        <div class="row my-3">
            <div class="p-1">                
                <button class="accordions">List Item ATM {{$atm->atm_name}}</button>
                <div class="panels">
                    <div class="row">
                        <a href="/create-item-atm/{{$atm->id}}" class="text-end my-4">Tambah Item</a>
                    </div>
                    @foreach($itematm as $item)
                    <div class="col-md-12 my-2">
                        <div class="list-accordion-item-outlet">
                            <div class="item-outlet-box" >
                                <img src="/uploads/itematm/{{$item->itematm_image}}" alt="Outlet" width="50" height="50">
                                <div class="list-item-outlet list-middle" style="width:50%">
                                    <h3>Nama Item</h3>
                                    <h4>{{$item->itematm_name}}</h4>
                                </div>
                                <div class="list-item-outlet" style="width:50%">
                                    <a href="/indikator-penilaian-atm/{{$item->id}}" style="color:inherit; text-decoration:none;">
                                        <h3>Indikator Penilaian</h3>
                                        <h4>{{$item->penilaianitematm->count()}} Buah</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="list-item-outlet">
                                <a href="/edit-item-atm/{{$item->id}}">
                                    <img src="/img/next-page20@2x.png" class="mt-3" alt="Next" width="40" height="40">
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row my-4">
            <div class="col-md-2">
                <button class="btn-go-back">
                    <img src="../img/go-back@2x.png" alt="Button Go Back" width="60" height="60">
                </button>
            </div>
            <div class="col-md-8 text-center">
                <a href="/">
                <button class="btn-confirm">Done</button>
                </a>
                
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
                    @foreach ($outletnotif as $notif)
                    <div class="row py-3">
                        <div class="col-md-2">
                            <div class="notif-icon">
                                <img src="img/doorbell@2x.png" alt="Doorbell" width="40" height="40">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="notif-description mb-3">
                                <a href="/overview-cabang/overview-outlet/{{$notif->id}}"style="color:inherit; text-decoration:none;">

                                <h5>Jatuh Tempo</h5>
                                <p><b>Outlet {{$notif->outlet_name}}</b> pada <b>{{$notif->kantorcabang->kantor_cabang_name}}</b> mengalami tenggat waktu pembayaran pada tanggal <b>{{$notif->outlet_deadline_tanggal}} 
                                    @if ($notif->outlet_deadline_bulan > 0)
                                        {{ DateTime::createFromFormat('!m', $notif->outlet_deadline_bulan)->format('F') }}
                                    @else
                                        {{ $notif->outlet_deadline_bulan }}
                                    @endif
                                     {{$notif->outlet_deadline_tahun}}</b>.</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @foreach ($atmnotif as $notif)
                    <div class="row py-3">
                        <div class="col-md-2">
                            <div class="notif-icon">
                                <img src="img/doorbell@2x.png" alt="Doorbell" width="40" height="40">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="notif-description mb-3">
                                <a href="/overview-cabang/overview-atm/{{$notif->id}}"style="color:inherit; text-decoration:none;">

                                <h5>Jatuh Tempo</h5>
                                <p><b>ATM {{$notif->atm_name}}</b> pada <b>{{$notif->kantorcabang->kantor_cabang_name}}</b> mengalami tenggat waktu pembayaran pada tanggal <b>{{$notif->atm_deadline_tanggal}} @if ($notif->atm_deadline_bulan > 0)
                                    {{ DateTime::createFromFormat('!m', $notif->atm_deadline_bulan)->format('F') }}
                                @else
                                    {{ $notif->atm_deadline_bulan }}
                                @endif
                                {{$notif->atm_deadline_tahun}}</b>.</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-scripts')
<script>
    var acc = document.getElementsByClassName("accordions");
    var i;
    
    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        this.classList.toggle("active-acc");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
          panel.style.maxHeight = null;
        } else {
          panel.style.maxHeight = panel.scrollHeight + "px";
        } 
      });
    }
</script>
@endsection