@extends('pages.layout')

@section('content')

@include('pages.breadcrumb')
<head>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
</head>
<div class="row mt-5">
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                <div class="overview ">
                    <div class="summary b-right">
                        <div class="p-3">
                            <div class="summary-icon">
                                <img src="/img/cabang.png" width="30" height="30" alt="Kantor Cabang">
                            </div>
                        </div>
                        <div class="summary-item">
                            <h4 class="mt-1">Kantor Cabang</h4>
                            <h3>{{ $nkantorcabang }} Kantor</h3>
                        </div>
                    </div>

                    <div class="summary b-right">
                        <div class="p-3">
                            <div class="summary-icon">
                                <img src="/img/atm.png" width="30" height="30" alt="Kantor Cabang">
                            </div>
                        </div>
                        <div class="summary-item">
                            <h4 class="mt-1">ATM</h4>
                            <h3>{{ $natmbiasa }} ATM</h3>
                        </div>
                    </div>

                    <div class="summary b-right">
                        <div class="p-3">
                            <div class="summary-icon">
                                <img src="/img/crm.png" width="30" height="30" alt="Kantor Cabang">
                            </div>
                        </div>
                        <div class="summary-item">
                            <h4 class="mt-1">CRM</h4>
                            <h3>{{ $natmcrm }} CRM</h3>
                        </div>
                    </div>

                    <div class="summary">
                        <div class="p-3">
                            <div class="summary-icon">
                                <img src="/img/mkk.png" width="30" height="30" alt="Kantor Cabang">
                            </div>
                        </div>
                        <div class="summary-item">
                            <h4 class="mt-1">MKK</h4>
                            <h3>{{ $natmmkk }} MKK</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-md-6">
                <div class="card-overview p-5">
                    <h3>Status Outlet</h3>
                    <p>Informasi Mengenai Status Outlet</p>
                    <div class="summary-card">
                        <div class="py-3">
                            <div class="card-icon">
                                <img src="/img/crm.png" width="30" height="30" alt="Kantor Cabang">
                            </div>
                        </div>
                        <div class="card-item px-3">
                            <h4 class="mt-1">Total Outlet</h4>
                            <h3>{{ $noutlet }}</h3>
                        </div>
                    </div>
                    <div class="py-3">
                        <div class="progress-legend py-2">
                            <div>Sewa</div>
                            <div>{{ $persensewaoutlet }}%</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" style="width:{{$persensewaoutlet}}%" aria-valuenow="{{$persensewaoutlet}}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="pb-5">
                        <div class="progress-legend py-2">
                            <div>Milik Perusahaan</div>
                            <div>{{ $persenmilikoutlet }}%</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" style="width:{{$persenmilikoutlet}}%" aria-valuenow="{{$persenmilikoutlet}}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-md-6">
                <div class="card-overview p-5">
                    <h3>Status Sewa</h3>
                    <p>Informasi Mengenai Status Sewa</p>
                    <div>
                    <div class="status-overview" style="margin-top:80px">
                        <div class="py-4">
                            <div class="status">
                                <div class="py-1" style="padding-right:15px">
                                    <div class="legend-1"></div>
                                </div>
                                <div>
                                    <div>Dekat Jatuh Tempo</div>
                                    <div>{{ $persenbelumdibayar }}%</div>
                                </div>
                            </div>
                            <div class="status py-2">
                                <div class="py-1" style="padding-right:15px">
                                    <div class="bullet-legend-dua"></div>
                                </div>
                                <div>
                                    <div>Belum Jatuh Tempo</div>
                                    <div>{{ $persensudahdibayar }}%</div>
                                </div>
                            </div>
                        </div>
                        <div class="circle-wrap">
                                
                                <canvas id="pieChart" width="400" height="400"></canvas>
                    
                                <script>
                                var ctx = document.getElementById('pieChart').getContext('2d');
                                var pieChart = new Chart(ctx, {
                                    type: 'pie',
                                    data: {
                                    datasets: [{
                                        data: [
                                        {{ $persenbelumdibayar }},
                                        {{ $persensudahdibayar }},
                    
                                        ],
                                        backgroundColor: [
                                        "#F7464A",
                                        "#227ded",
                                        ],
                                    }]
                                    },
                                    options: {
                                        cutoutPercentage: 80
                                    }
                                });
                                </script>
                                
                                
                        </div>
                    </div>
                    </div>
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
                    @php $count = 0 @endphp
                    @foreach ($outletnotif as $notif)
                        @if ($count < 3)
                    <a href="/overview-cabang/overview-outlet/{{$notif->id}}"style="color:inherit; text-decoration:none;">

                    
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
                    </a>
                    @php $count++ @endphp
                    @else
                        @break
                    @endif
                    @endforeach

                    @php $count = 0 @endphp
                    @foreach ($atmnotif as $notif)
                    @if ($count < 3)
                    <a href="/overview-cabang/overview-atm/{{$notif->id}}"style="color:inherit; text-decoration:none;">

                    
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
                    </a>
                    @php $count++ @endphp
                    @else
                        @break
                    @endif
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>
@endsection