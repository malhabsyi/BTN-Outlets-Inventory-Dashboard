@extends('pages.layout')

@section('content')

@include('pages.breadcrumb')
<div class="row mt-5">
    <div class="col-md-8">
        <div class="overview-profile">
            
            <div class="avatar-upload">
                
                <div class="avatar-preview">
                    <div id="imagePreview" style="background-image: url('/img/profile.png');">
                    </div>
                </div>
            </div>
           

            <div class="py-5">
                <div class="profile-detail mb-3">
             
                        <h5>Nama user</h5>
                        <p><input type="text" class="form-control" value="KC Mulyosari"> </p>
               
                </div>
                <div class="profile-detail mb-4">
                    <h5>Email</h5>
                    <p><input type="text" class="form-control" value="kcmulyosari@btn.com"></p>
                </div>
                <div class="profile-detail mb-4">
                    <h5>Password</h5>
                    <p><input type="password" class="form-control" value="password"></p>
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
