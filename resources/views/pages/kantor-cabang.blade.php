@extends('pages.layout')

@section('content')

@include('pages.breadcrumb')
<div class="row mt-5">
    <div class="col-md-8">
        <div class="row mt-4">
            <div class="col-md-4">
                <form action="">
                    <div class="form-group">
                        <input type="text" class="form-control search-input" placeholder="Search ...">
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <h3 class="list-cabang-title mt-1">List Kantor Cabang</h3>
            </div>
        </div>
        <hr size="2"/>

        <div class="row">
            @foreach ($kantorcabang as $o)
            <div class="col-md-12 mb-4">
                <div class="cabang">
                    <div class="list">
                        <h3>Kantor Cabang</h3>
                        <h4>{{$o->kantor_cabang_name}}</h4>
                    </div>
                    <div class="list list-middle">
                        <h3>Jumlah Outlet</h3>
                        <h4>{{$o->outlet->count()}} Outlet</h4>
                    </div>
                    <div class="list">
                        <h3>Jumlah ATM</h3>
                        <h4>{{$o->atm->count()}} Mesin</h4>
                    </div>
                    <div class="item">
                        <a href="/overview-cabang/{{$o->id}}">
                            <img src="/img/next-page20@2x.png" class="mt-3" alt="Next" width="40" height="40">
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
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
                                <h5>Jatuh Tempo</h5>
                                <p><b>Outlet {{$notif->outlet_name}}</b> pada <b>{{$notif->kantorcabang->kantor_cabang_name}}</b> mengalami tenggat waktu pembayaran pada tanggal <b>{{$notif->outlet_deadline_tanggal}} 
                                    @if ($notif->outlet_deadline_bulan > 0)
                                        {{ DateTime::createFromFormat('!m', $notif->outlet_deadline_bulan)->format('F') }}
                                    @else
                                        {{ $notif->outlet_deadline_bulan }}
                                    @endif
                                     {{$notif->outlet_deadline_tahun}}</b>.</p>
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