@extends('pages.layout')

@section('content')

@include('pages.breadcrumb')
<div class="row mt-5">
    <div class="col-md-8">
        <div class="overview-cabang">
            <div class="image-cabang-frame p-4">
                <img src="../uploads/kantorcabang/{{$kantorcabang->kantor_cabang_image}}" alt="Foto Cabang">
            </div>

            <div class="py-5">
                <div class="item-detail first-item ">
                    <div>
                        <h5>Kantor Cabang</h5>
                        <p>{{$kantorcabang->kantor_cabang_name}}</p>
                    </div>
                    <a href="/edit-kantor-cabang/{{$kantorcabang->id}}" class="item-link">Edit</a>

                </div>
                <div class="item-detail mb-4">
                    <h5>Kode Cabang</h5>
                    <p>2</p>
                </div>
                <div class="item-detail mb-4">
                    <h5>Alamat</h5>
                    <p>{{$kantorcabang->kantor_cabang_location}}</p>
                </div>
                <div class="item-detail mb-4">
                    <h5>Kepala Kantor Cabang</h5>
                    <p>{{$kantorcabang->kantor_cabang_sbh}}</p>
                </div>
                <div class="item-detail mb-4">
                    <h5>Jumlah Outlet</h5>
                    <p>{{$kantorcabang->outlet->count()}} Outlet</p>
                </div>
                <div class="item-detail mb-4">
                    <h5>Jumlah ATM</h5>
                    <p>{{$kantorcabang->atm->count()}} ATM</p>
                </div>

                <textarea cols="30" rows="5" class="form-control" readonly>{{$kantorcabang->kantor_cabang_note}}
                </textarea>
            </div>
        </div>

        <div class="row my-3">
            <div class="p-1">
                <button class="accordions" style="border-bottom 1px solid #cdcdcd">List Outlet {{$kantorcabang->kantor_cabang_name}}</button>
                <div class="panels">

                    <div class="row">
                        <a href="/create-outlet" class="text-end my-4">Tambah Outlet</a>
                    </div>

                    @foreach ($kantorcabang->outlet as $index1 => $outlet)
                    <div class="col-md-12 my-2">
                        <div class="list-accordion no-flex">
                            <div class="row">
                                <div class="col-sm mt-2">
                                    <div class="list-item">
                                        <h3>Nama Outlet</h3>
                                        <h4>{{$outlet->outlet_name}}</h4>
                                    </div>
                                </div>
                                <div class="col-sm mt-2">
                                    <div class="list-item list-middle">
                                        <h3>Jumlah ATM</h3>

                                        <h4>{{ $a = \App\Models\Atm::where('outlet_id', $outlet->id)->count() }} Buah</h4>
                                    </div>
                                </div>
                                <div class="col-sm mt-2">
                                    <div class="list-item">
                                        <h3>Status</h3>
                                        <h4>{{$outlet->outlet_status}}</h4>
                                    </div>

                                </div>
                                <div class="col-1 mt-2">
                                    <div class="item">
                                        <a href="/overview-cabang/overview-outlet/{{$outlet->id}}">
                                            <img src="/img/next-page20@2x.png" alt="Next" width="40" height="40">
                                        </a>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                    @endforeach
                </div>

                <button class="accordions">List ATM/CRM {{$kantorcabang->kantor_cabang_name}}</button>
                <div class="panels">
                    <div class="row">
                        <a href="/create-atm" class="text-end my-4">Tambah ATM/CRM</a>
                    </div>
                    @foreach ($kantorcabang->atm as $index => $atm)
                    <div class="col-md-12 my-2">
                        <div class="list-accordion no-flex">
                            <div class="row">
                                <div class="col-sm mt-2">
                                    <div class="list-item">
                                        <h3>Nama</h3>
                                        <h4>{{$atm->atm_name}}</h4>
                                    </div>
                                </div>

                                <div class="col-sm mt-2">
                                    <div class="list-item list-middle">
                                        <h3>Jatuh Tempo</h3>
                                        <h4>{{$atmdeadline[$index]}}</h4>
                                    </div>
                                </div>

                                <div class="col-sm mt-2">
                                    <div class="list-item">
                                        <h3>Status</h3>
                                        <h4>{{$atm->atm_status}}</h4>
                                    </div>
                                </div>

                                <div class="col-1 mt-2">
                                    <div class="item">
                                        <a href="overview-atm/{{$atm->id}}">
                                            <img src="/img/next-page20@2x.png" alt="Next" width="40" height="40">
                                        </a>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row my-4">
            <div class="col-md-2">
                <a href="/kantor-cabang" class="btn-go-back">
                    <img src="../img/go-back@2x.png" alt="Button Go Back" width="60" height="60">
                </a>
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
                                <img src="../img/doorbell@2x.png" alt="Doorbell" width="40" height="40">
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
                                <a href="/overview-cabang/overview-outlet/{{$notif->id}}"style="color:inherit; text-decoration:none;">

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