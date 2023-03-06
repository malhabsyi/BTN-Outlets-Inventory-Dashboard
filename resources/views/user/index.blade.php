@extends('pages.layout')

@section('content')

@include('pages.breadcrumb')
<head>
  <link rel="stylesheet" href="../css/User.css" />
</head>

    <div class="user30">
        <div class="dashboard-parent5">
            <a href="{{ route('registrasi-form') }}">
                <div class="create-user5">
                    <button class="create-user-inner"></button>
                    <b class="create-user6">Create User</b><img class="add-icon2" alt="" src="img/add@2x.png" />
                </div>
            </a>
            <div class="list-user2">
                <div class="list-user-item"></div>
                <b class="list-user3">List User</b>
            </div>

           

                <table cellpadding="15" class="rectangle-parent29">

                    <thead style="background-color:#F2F2F2;">
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Kantor Cabang</th>
                        <th>No Telepon</th>
                        <th></th>
                    </thead>

                    <tbody style="background-color:#ebf3ff;">
                        @php $no = 1; 
                        @endphp
                        @foreach ($user as $p)

                        <tr class="user-1-item">
                            <td>{{$no++}}</td>
                            <td>{{$p->user_name}}</td>
                            <td>{{$p->kantorcabang->kantor_cabang_name}}</td>
                            <td>{{$p->user_telp}}</td>


                            <td><a href="/edit-user/{{$p->id}}"><img class="next-page-icon31"
                                        src="img/next-page25@2x.png" alt=""></a></td>


                        </tr>

                        @endforeach
                    </tbody>

                </table>
                


                <!-- <div class="user-11">
                <div class="user-1-item"></div>
                <b class="b23">1</b><b class="elang-alhabsyi5">Elang Alhabsyi</b><b class="kc-mulyosari30">KC
                    Mulyosari</b><b class="b24">081238743207</b><img class="next-page-icon31" alt=""
                    src="img/next-page25@2x.png" id="nextPageIcon" />
            </div> 
            
            <div class="rectangle-parent29">
                <div class="group-child35"></div>
                <div class="no2">No</div>
                <div class="nama1">Nama</div>
                <div class="kantor-cabang27">Kantor Cabang</div>
                <div class="nomor-telepon1">Nomor Telepon</div>
            </div> -->
                <!-- <div class="user-11">
                <div class="user-1-item"></div>
                <b class="b23">1</b><b class="elang-alhabsyi5">Elang Alhabsyi</b><b class="kc-mulyosari30">KC
                    Mulyosari</b><b class="b24">081238743207</b><img class="next-page-icon31" alt=""
                    src="img/next-page25@2x.png" id="nextPageIcon" />
            </div>
            <div class="user-21">
                <div class="user-1-item"></div>
                <b class="b23">2</b><b class="elang-alhabsyi5">Elang Alhabsyi</b><b class="kc-mulyosari30">KC
                    Mulyosari</b><b class="b24">081238743207</b><img class="next-page-icon32" alt=""
                    src="img/next-page25@2x.png" />
            </div>
            <div class="user-31">
                <div class="user-1-item"></div>
                <b class="b23">3</b><b class="elang-alhabsyi5">Elang Alhabsyi</b><b class="kc-mulyosari30">KC
                    Mulyosari</b><b class="b24">081238743207</b><img class="next-page-icon32" alt=""
                    src="img/next-page25@2x.png" />
            </div>
            <div class="user-41">
                <div class="user-1-item"></div>
                <b class="b23">4</b><b class="elang-alhabsyi5">Elang Alhabsyi</b><b class="kc-mulyosari30">KC
                    Mulyosari</b><b class="b24">081238743207</b><img class="next-page-icon32" alt=""
                    src="img/next-page25@2x.png" />
            </div>
            <div class="user-51">
                <div class="user-1-item"></div>
                <b class="b23">5</b><b class="elang-alhabsyi5">Elang Alhabsyi</b><b class="kc-mulyosari30">KC
                    Mulyosari</b><b class="b24">081238743207</b><img class="next-page-icon32" alt=""
                    src="img/next-page25@2x.png" />
            </div> -->
                <div class="filter2" id="filterContainer">
                    <div class="filter-item"></div>
                    <img class="sort-down-icon1" alt="" src="img/sort-down@2x.png" />
                    <div class="filter3">Filter</div>
                </div>
                <div class="search4">
                    <div class="filter-item"></div>
                    <input type="text" class="filter-item" placeholder="Search..">
                    <img class="search-icon2" alt="" src="img/search@2x.png" />
                    <!-- <div class="filter3">Search..</div> -->
                </div>
            </div>
                
       

    
            <div class="col-md-4" id="notif-akun">
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
                                        <p><b>Outlet {{$notif->outlet_name}}</b> pada <b>{{$notif->kantorcabang->kantor_cabang_name}}</b> mengalami tenggat waktu pembayaran pada tanggal {{$notif->outlet_deadline_tanggal}}<b>{{$notif->outlet_deadline_bulan}} {{$notif->outlet_deadline_tahun}}</b>.</p>
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
                                        <p><b>ATM {{$notif->atm_name}}</b> pada <b>{{$notif->kantorcabang->kantor_cabang_name}}</b> mengalami tenggat waktu pembayaran pada tanggal {{$notif->atm_deadline_tanggal}}<b>{{$notif->atm_deadline_bulan}} {{$notif->atm_deadline_tahun}}</b>.</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
    <script>
    var popupdoneContainer = document.getElementById("popupdoneContainer");
    if (popupdoneContainer) {
        popupdoneContainer.addEventListener("click", function(e) {
            window.location.href = "./User.html";
        });
    }

    var nextPageIcon = document.getElementById("nextPageIcon");
    if (nextPageIcon) {
        nextPageIcon.addEventListener("click", function(e) {
            window.location.href = "./UserUpdateUser.html";
        });
    }

    var filterContainer = document.getElementById("filterContainer");
    if (filterContainer) {
        filterContainer.addEventListener("click", function() {
            var popup = document.getElementById("filterKantorCabang");
            if (!popup) return;
            var popupStyle = popup.style;
            if (popupStyle) {
                popupStyle.display = "flex";
                popupStyle.zIndex = 100;
                popupStyle.backgroundColor = "rgba(113, 113, 113, 0.3)";
                popupStyle.alignItems = "center";
                popupStyle.justifyContent = "center";
            }
            popup.setAttribute("closable", "");

            var onClick =
                popup.onClick ||
                function(e) {
                    if (e.target === popup && popup.hasAttribute("closable")) {
                        popupStyle.display = "none";
                    }
                };
            popup.addEventListener("click", onClick);
        });
    }
    </script>
@endsection