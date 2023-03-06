<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="../css/global.css" />
    <link rel="stylesheet" href="../css/KantorCabang.css" />

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Baloo Bhai:wght@400&display=swap" />
</head>

<body>
    <div class="kantor-cabang10">
        <div class="dashboard-container">
            <div class="dashboard5">
                <b class="informasi-mengenai-kantor1">Informasi Mengenai Kantor Cabang pada Kantor Wilayah III</b><b
                    class="kantor-cabang11">Kantor Cabang</b>
            </div>


            <div class="list-outlet2">
                <hr style="margin-top: 55px;">
                <form action="/KantorCabang" metod="get">
                    @foreach ($kantorcabang as $o)
                    <table class="outlet-12">

                        <thead>
                            <th>Kantor Cabang</th>
                            <th style="border-right: 1px  solid var(--color-tan);
                                border-left: 1px solid var(--color-tan);">Jumlah Outlet</th>
                            <th>Jumlah ATM</th>
                            <th></th>


                        </thead>

                        <tbody>
                            <tr>
                                <td class="kc-mulyosari18">{{$o->kantor_cabang_name}}</td>
                                <td class="mesin" style="border-right: 1px solid var(--color-tan);
                                border-left: 1px solid var(--color-tan);">{{$o->outlet->count()}}</td>
                                <td class="milik-perusahaan5">{{$o->atm->count()}} </td>
                                <td></td>

                                <td><a href="/overview-kantorcabang/{{$o->id}}"><img style="width:40px;" alt=""
                                            src="img/next-page20@2x.png" /></a></td>
                            </tr>

                        </tbody>
                    </table>
                    @endforeach
                </form>

                <!-- <div class="outlet-42">
                    <div class="outlet-1-child3"></div>
                    <img class="next-page-icon21" alt="" src="img/next-page20@2x.png" />
                    <div class="outlet-1-child4"></div>
                    <div class="outlet-1-child5"></div>
                    <b class="nama-outlet10">Nama Outlet</b><b class="jumlah-mesin4">Jumlah Mesin</b><b
                        class="status16">Status</b><b class="kc-mulyosari18">KC Mulyosari</b><b class="mesin">3
                        Mesin</b><b class="milik-perusahaan5">Milik Perusahaan</b>
                </div> -->

                <!-- <table class="outlet-22">
                    <thead>
                        <th class="nama-outlet10">Nama Outlet</th>
                        <th class="jumlah-mesin4">Jumlah Mesin</th>
                        <th class="status16">Status</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="kc-mulyosari18">KC Mulyosari</td>
                            <td class="mesin">3</td>
                            <td class="milik-perusahaan5">Milik Perusahaan</td>
                            <td><img class="next-page-icon20" alt="" src="img/next-page20@2x.png" id="nextPageIcon" />
                            </td>
                        </tr>

                    </tbody>

                </table>

                <table class="outlet-32">
                    <thead>
                        <th class="nama-outlet10">Nama Outlet</th>
                        <th class="jumlah-mesin4">Jumlah Mesin</th>
                        <th class="status16">Status</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="kc-mulyosari18">KC Mulyosari</td>
                            <td class="mesin">3</td>
                            <td class="milik-perusahaan5">Milik Perusahaan</td>
                            <td><img class="next-page-icon20" alt="" src="img/next-page20@2x.png" id="nextPageIcon" />
                            </td>
                        </tr>
                       
                    </tbody>
                    
                </table>

                <table class="outlet-42">
                    <thead>
                        <th class="nama-outlet10">Nama Outlet</th>
                        <th class="jumlah-mesin4">Jumlah Mesin</th>
                        <th class="status16">Status</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="kc-mulyosari18">KC Mulyosari</td>
                            <td class="mesin">3</td>
                            <td class="milik-perusahaan5">Milik Perusahaan</td>
                            <td><img class="next-page-icon20" alt="" src="img/next-page20@2x.png" id="nextPageIcon" />
                            </td>
                        </tr>
                       
                    </tbody>
                    
                </table>

                <table class="outlet-52">
                    <thead>
                        <th class="nama-outlet10">Nama Outlet</th>
                        <th class="jumlah-mesin4">Jumlah Mesin</th>
                        <th class="status16">Status</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="kc-mulyosari18">KC Mulyosari</td>
                            <td class="mesin">3</td>
                            <td class="milik-perusahaan5">Milik Perusahaan</td>
                            <td><img class="next-page-icon20" alt="" src="img/next-page20@2x.png" id="nextPageIcon" />
                            </td>
                        </tr>
                       
                    </tbody>
                    
                </table> -->

                <!-- <div class="outlet-12">
                    <div class="outlet-1-child3"></div>
                    <img class="next-page-icon20" alt="" src="img/next-page20@2x.png" id="nextPageIcon" />
                    <div class="outlet-1-child4"></div>
                    <div class="outlet-1-child5"></div>
                    <b class="nama-outlet10">Nama Outlet</b><b class="jumlah-mesin4">Jumlah Mesin</b><b
                        class="status16">Status</b><b class="kc-mulyosari18">KC Mulyosari</b><b class="mesin">3
                        Mesin</b><b class="milik-perusahaan5">Milik Perusahaan</b>
                </div> -->

                <!-- <div class="outlet-32">
                    <div class="outlet-1-child3"></div>
                    <img class="next-page-icon21" alt="" src="img/next-page20@2x.png" />
                    <div class="outlet-1-child4"></div>
                    <div class="outlet-1-child5"></div>
                    <b class="nama-outlet10">Nama Outlet</b><b class="jumlah-mesin4">Jumlah Mesin</b><b
                        class="status16">Status</b><b class="kc-mulyosari18">KC Mulyosari</b><b class="mesin">3
                        Mesin</b><b class="milik-perusahaan5">Milik Perusahaan</b>
                </div>
                <div class="outlet-42">
                    <div class="outlet-1-child3"></div>
                    <img class="next-page-icon21" alt="" src="img/next-page20@2x.png" />
                    <div class="outlet-1-child4"></div>
                    <div class="outlet-1-child5"></div>
                    <b class="nama-outlet10">Nama Outlet</b><b class="jumlah-mesin4">Jumlah Mesin</b><b
                        class="status16">Status</b><b class="kc-mulyosari18">KC Mulyosari</b><b class="mesin">3
                        Mesin</b><b class="milik-perusahaan5">Milik Perusahaan</b>
                </div>
                <div class="outlet-52">
                    <div class="outlet-1-child3"></div>
                    <img class="next-page-icon21" alt="" src="img/next-page24@2x.png" />
                    <div class="outlet-1-child4"></div>
                    <div class="outlet-1-child5"></div>
                    <b class="nama-outlet10">Nama Outlet</b><b class="jumlah-mesin4">Jumlah Mesin</b><b
                        class="status16">Status</b><b class="kc-mulyosari18">KC Mulyosari</b><b class="mesin">3
                        Mesin</b><b class="milik-perusahaan5">Milik Perusahaan</b>
                </div> -->

                <div class="list-outlet-inner"></div>
                <div class="list-kantor-cabang">List Kantor Cabang</div>
            </div>
            <div class="search">
                <!-- <div class="search-child"></div> -->
                <input type="text" class="search-child" placeholder="Search..">
                <img class="search-icon" alt="" src="../img/search@2x.png" />

                <!-- <div class="search1">Search..</div> -->
            </div>
        </div>
        <div class="hello5">
            <div class="hello-child3"></div>
            <b class="hello-ananda-segaf5">Hello, {{ auth()->user()->frist_name}}</b><img class="customer-icon5" alt=""
                src="img/customer@2x.png" />
        </div>
        <div class="notification10">
            <div class="notification-child3"></div>
            <img class="iconlylightfilter5" alt="" src="img/iconlylightfilter.svg" />
            <div class="notification11">Notification</div>

            <a href="">
                <div class="g115">
                    <div class="g1-child13"></div>
                    <div class="rectangle-parent17">
                        <div class="group-child23"></div>
                        <img class="doorbell-icon15" alt="" src="img/doorbell@2x.png" />
                    </div>
                    <a href="">
                        <div class="jatuh-tempo15">Jatuh Tempo</div>
                        <div class="outlet-kc-mulyosari-container15">
                            <b>Outlet KC Mulyosari</b><span> pada </span><b>Kantor Cabang Mulyosari</b><span> mengalami
                                tenggat
                                waktu pembayaran pada tanggal </span><b>28 Februari 2023.</b>
                        </div>
                    </a>
                </div>
                <div class="g116">
                    <div class="g1-child13"></div>
                    <div class="rectangle-parent17">
                        <div class="group-child23"></div>
                        <img class="doorbell-icon15" alt="" src="img/doorbell@2x.png" />
                    </div>
                    <a href="">
                        <div class="jatuh-tempo15">Jatuh Tempo</div>
                        <div class="outlet-kc-mulyosari-container15">
                            <b>Outlet KC Mulyosari</b><span> pada </span><b>Kantor Cabang Mulyosari</b><span> mengalami
                                tenggat
                                waktu pembayaran pada tanggal </span><b>28 Februari 2023.</b>
                        </div>
                    </a>
                </div>

                <div class="g117">
                    <div class="g1-child13"></div>
                    <div class="rectangle-parent17">
                        <div class="group-child23"></div>
                        <img class="doorbell-icon15" alt="" src="img/doorbell@2x.png" />
                    </div>
                    <a href="">
                        <div class="jatuh-tempo15">Jatuh Tempo</div>
                        <div class="outlet-kc-mulyosari-container15">
                            <b>Outlet KC Mulyosari</b><span> pada </span><b>Kantor Cabang Mulyosari</b><span> mengalami
                                tenggat
                                waktu pembayaran pada tanggal </span><b>28 Februari 2023.</b>
                        </div>
                    </a>
                </div>
        </div>
        <div class="tab-super-admin5">
            <div class="samping5">
                <div class="back-rect-15"></div>
                <a href="/Overview" style="color:#d0d2da">
                    <div class="overview12">
                        <div class="overview-child3"></div>
                        <div class="overview-parent3">
                            <b class="overview13">Overview</b><img class="iconlybolddocument5" alt=""
                                src="img/iconlybolddocument.svg" />
                        </div>
                </a>
            </div>
            <a href="/User" style="color:#d0d2da">
                <div class="outlet17">
                    <div class="overview-child3"></div>
                    <div class="user13">
                        <b class="user14">User</b><img class="iconlyboldprofile5" alt=""
                            src="img/iconlyboldprofile.svg" />
                    </div>
                </div>
            </a>
            <div class="outlet18">
                <div class="outlet-child11"></div>
                <div class="kantor-cabang-parent3">
                    <b class="user14">Kantor Cabang</b><img class="home-icon5" alt="" src="img/home@2x.png" />
                </div>
            </div>

            <a href="/LoginPage" style="color:#d0d2da">
                <div class="log-out10">
                    <div class="overview-child3"></div>
                    <div class="log-out-wrapper3"><b class="log-out11">Log out</b></div>
                    <img class="iconlyboldlogout5" alt="" src="img/iconlyboldlogout.svg" />
                </div>
            </a>
            <div class="samping-child3"></div>
            <img class="logo-btn-15" alt="" src="img/logo-btn-1@2x.png" />
        </div>
    </div>
    </div>

    <!-- <script>
    var nextPageIcon = document.getElementById("nextPageIcon");
    if (nextPageIcon) {
        nextPageIcon.addEventListener("click", function(e) {
            window.location.href = "./OverviewKantorCabang5.html";
        });
    }
    </script> -->
</body>

</html>