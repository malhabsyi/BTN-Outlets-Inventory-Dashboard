@extends('pages.layout')

@section('content')

@include('pages.breadcrumb')
<div class="row mt-5">
    <div class="col-md-8">
        <div class="overview-cabang">
            <div class="image-cabang-frame p-4">
                <img src="/uploads/outlet/{{$outlet->outlet_image}}" alt="Foto Cabang">
            </div>

            <div class="py-5">
                
                <div class="item-detail first-item mb-3">
                    <div>
                        <h5>Nama Outlet</h5>
                        <p>{{$outlet->outlet_name}}</p>
                    </div>
                    <a href="/edit-outlet/{{$outlet->id}}" class="item-link">Edit</a>
                </div>
                <div class="item-detail mb-4">
                    <h5>Kode Outlet</h5>
                    <p>{{$outlet->outlet_number}}</p>
                </div>
                <div class="item-detail mb-4">
                    <h5>Kantor Cabang</h5>
                    <p>{{$outlet->kantorcabang->kantor_cabang_name}}</p>
                </div>
                <div class="item-detail mb-4">
                    <h5>Sub Branch Head</h5>
                    <p>{{$outlet->outlet_sbh}}</p>
                </div>
                <div class="item-detail mb-4">
                    <h5>Alamat</h5>
                    <p>{{$outlet->outlet_location}}</p>
                </div>
            
                <div class="item-detail mb-4">
                    <h5>Status</h5>
                    <p>{{$outlet->outlet_status}}</p>
                </div>
                <div class="item-detail mb-4">
                    <h5>Jatuh Tempo</h5>
                    <p>{{$outlet->outlet_deadline_tanggal." - ".$outlet->outlet_deadline_bulan." - ".$outlet->outlet_deadline_tahun}}</p>
                </div>
                <div class="item-detail mb-4">
                    <h5>Jumlah ATM</h5>
                    <p>{{$countatm}} ATM</p>
                </div>

                <textarea cols="30" rows="5" class="form-control">{{$outlet->outlet_note}}
                </textarea>
            </div>
        </div>

        <div class="row my-3">
            <div class="p-1">
                <button class="accordions" style="border-bottom 1px solid #cdcdcd">List ATM/CRM {{$outlet->outlet_name}}</button>
                <div class="panels">

                    <div class="row">
                        <a href="/create-atm" class="text-end my-4">Tambah ATM/CRM</a>
                    </div>
                    @foreach($atm as $o)
                    <div class="col-md-12 my-2">
                        <div class="list-accordion no-flex">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="list-item">
                                        <h3>Nama</h3>
                                        <h4>{{$o->atm_name}}</h4>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="list-item list-middle">
                                        <h3>Jatuh Tempo</h3>
                                        <h4>{{$outlet->outlet_deadline_tanggal." - ".$outlet->outlet_deadline_bulan." - ".$outlet->outlet_deadline_tahun}}</h4>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="list-item">
                                        <h3>Status</h3>
                                        <h4>{{$outlet->outlet_status}}</h4>
                                    </div>
                                </div>
                                <div class="col-1 mt-2">
                                    <div class="item">
                                        <a href="/overview-cabang/overview-atm/{{$o->id}}">
                                            <img src="/img/next-page20@2x.png" alt="Next" width="40" height="40">
                                        </a>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                    @endforeach
                </div>

                <button class="accordions">List Item Outlet {{$outlet->outlet_name}}</button>
                <div class="panels">
                    <div class="row">
                        <a href="/create-item-outlet/{{$outlet->id}}" class="text-end my-4">Tambah Item</a>
                    </div>

                    @foreach($itemoutlet as $item)
                    <div class="col-md-12 my-2">
                        <div class="list-accordion-item-outlet">
                            <div class="item-outlet-box">
                                <img src="img/outletbtn.png" alt="Outlet" width="50" height="50">
                                <div class="list-item-outlet list-middle" style="width:50%">
                                    <h3>Nama Item</h3>
                                    <h4>{{$item->itemoutlet_name}}</h4>
                                </div>
                                <div class="list-item-outlet" style="width:50%">
                                    <a href="/indikator-penilaian-outlet/{{$item->id}}" style="color:inherit; text-decoration:none;">
                                        <h3>Indikator Penilaian</h3>
                                        <h4>{{$item->penilaianitemoutlet->count()}} Buah</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="list-item-outlet">
                                <a href="/edit-item-outlet/{{$item->id}}">
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
                <button class="btn-confirm">Done</button>
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