<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="../css/global.css" />
    <link rel="stylesheet" href="../css/OverviewKantorCabang.css" />

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Baloo Bhai:wght@400&display=swap" />
</head>

<body>
    <div class="overview-kantor-cabang-5">
        <div class="dashboard-group">
            <div class="dashboard3">
                <b class="overview-kantor-cabang6">Overview Kantor Cabang {{$kantorcabang->kantor_cabang_name}}</b><b
                    class="overview-kantor-cabang7">Overview Kantor Cabang</b>
            </div>
            <div class="overview-outlet3">
                <div class="overview-outlet-child1"></div>
                <a href="/edit-kantorcabang/{{$kantorcabang->id}}"><div class="edit3">Edit</div></a>

               
                <table class="nama-outlet9">
                    <thead>
                        <th class="kantor-cabang6">Kantor Cabang</th>

                    </thead>

                    <tbody>
                        <tr>
                            <td class="kantor-cabang-mulyosari3">{{$kantorcabang->kantor_cabang_name}}</td>
                        </tr>
                    </tbody>

                </table>
             

                <table class="alamat6">

                    <thead>
                        <th class="kantor-cabang6">Alamat</th>

                    </thead>
                    <tbody>
                        <td class="kantor-cabang-mulyosari3">{{$kantorcabang->kantor_cabang_location}}</td>
                    </tbody>

                </table>

                <table class="jumlah-mesin3">
                    <thead>
                        <th class="kantor-cabang6">Jumlah Outlet</th>
                    </thead>

                    <tbody>
                        <td class="kantor-cabang-mulyosari3">{{ $kantorcabang->outlet->count() }} Outlet</td>
                    </tbody>

                </table>

                <table class="status15">
                    <thead>
                        <th class="kantor-cabang6">Jumlah ATM</th>
                    </thead>

                    <tbody>
                        <td class="kantor-cabang-mulyosari3">{{$kantorcabang->atm->count()}} ATM</td>
                    </tbody>

                </table>
                <table class="catatan6">
                    <thead>
                        <th class="kantor-cabang6">Catatan</th>
                    </thead>

                    <tbody>
                        <td class="catatan-child1">{{$kantorcabang->kantor_cabang_note}}</td>
                    </tbody>

                </table>
              
                <!-- <div class="nama-outlet9">
                    <div class="kantor-cabang-mulyosari3">Kantor Cabang Mulyosari</div>
                    <b class="kantor-cabang6">Kantor Cabang</b>
                </div>
                <div class="alamat6">
                    <div class="kantor-cabang-mulyosari3">
                        <p class="jalan-raya-mulyosari3">
                            Jalan Raya Mulyosari No.82-82A, Kalisari, Kec. Mulyorejo,
                        </p>
                        <p class="kota-sby-jawa3">Kota SBY, Jawa Timur 60112</p>
                    </div>
                    <b class="kantor-cabang6">Alamat</b>
                </div>
                <div class="jumlah-mesin3">
                    <div class="kantor-cabang-mulyosari3">3 Outlet</div>
                    <b class="kantor-cabang6">Jumlah Outlet</b>
                </div>

                <div class="status15">
                    <div class="kantor-cabang-mulyosari3">3 ATM</div>
                    <b class="kantor-cabang6">Jumlah ATM</b>
                </div>
                <div class="catatan6">
                    <div class="catatan-child1"></div>
                    <div class="keadaan-kantor-cabang-container3">
                        <p class="jalan-raya-mulyosari3">
                            Keadaan kantor cabang kurang bersih, Pelayanan perlu
                            ditingkatkan kembali, dan Sticker
                        </p>
                        <p class="kota-sby-jawa3">masih ada yang kurang.</p>
                    </div>
                    <b class="catatan7">Catatan</b>
                </div> 
               
            </div>
            <div class="list-aset3">
                <b class="list-outlet-kc3">List Outlet KC Mulyosari</b><img class="line-icon" alt="" />
                <div class="aset-21" id="aset2Container">
                    <img class="next-page-icon18" alt="" src="img/next-page@2x.png" />
                </div>
            </div>
            <div class="list-aset4">
                <b class="list-outlet-kc3">List ATM KC Mulyosari</b><img class="line-icon" alt="" />
                <div class="aset-21" id="aset2Container1">
                    <img class="next-page-icon18" alt="" src="img/next-page@2x.png" />
                </div>
            </div>
            <div class="done8" id="doneContainer">
                <button class="done-child2">Done</button>
                <!-- <b class="done9">Done</b> -->
                <div class="frame-photo-parent1">
                    <div class="frame-photo3"></div>
                    <img class="outlet-btn-1-13" alt="" src="../img/outlet-btn-1-1@2x.png" />
                </div>
            </div>
        </div>
        <div class="hello3">
            <div class="hello-child1"></div>
            <b class="hello-ananda-segaf3">Hello, {{ auth()->user()->user_name}}</b><img class="customer-icon3" alt=""
                src="../img/customer@2x.png" />
        </div>
        <div class="notification6">
            <div class="notification-child1"></div>
            <img class="iconlylightfilter3" alt="" src="../img/iconlylightfilter.svg" />
            <div class="notification7">Notification</div>
            <div class="g19">
                <div class="g1-child7"></div>
                <div class="rectangle-parent7">
                    <div class="group-child9"></div>
                    <img class="doorbell-icon9" alt="" src="../img/doorbell@2x.png" />
                </div>
                <a href="">
                <div class="jatuh-tempo9">Jatuh Tempo</div>
                <div class="outlet-kc-mulyosari-container9">
                    <b>Outlet KC Mulyosari</b><span> pada </span><b>Kantor Cabang Mulyosari</b><span> mengalami tenggat
                        waktu pembayaran pada tanggal </span><b>28 Februari 2023.</b>
                </div>
                </a>
            </div>
            <div class="g110">
                <div class="g1-child7"></div>
                <div class="rectangle-parent7">
                    <div class="group-child9"></div>
                    <img class="doorbell-icon9" alt="" src="../img/doorbell@2x.png" />
                </div>
                <a href="">
                <div class="jatuh-tempo9">Jatuh Tempo</div>
                <div class="outlet-kc-mulyosari-container9">
                    <b>Outlet KC Mulyosari</b><span> pada </span><b>Kantor Cabang Mulyosari</b><span> mengalami tenggat
                        waktu pembayaran pada tanggal </span><b>28 Februari 2023.</b>
                </div>
                </a>
            </div>
            <div class="g111">
                <div class="g1-child7"></div>
                <div class="rectangle-parent7">
                    <div class="group-child9"></div>
                    <img class="doorbell-icon9" alt="" src="../img/doorbell@2x.png" />
                </div>
                <a href="">
                <div class="jatuh-tempo9">Jatuh Tempo</div>
                <div class="outlet-kc-mulyosari-container9">
                    <b>Outlet KC Mulyosari</b><span> pada </span><b>Kantor Cabang Mulyosari</b><span> mengalami tenggat
                        waktu pembayaran pada tanggal </span><b>28 Februari 2023.</b>
                </div>
                </a>
            </div>
        </div>
        <div class="tab-super-admin3">
            <div class="samping3">
                <div class="back-rect-13"></div>

                <a href="/Overview" style="color:#d0d2da">
                    <div class="overview6">
                        <div class="overview-child1"></div>
                        <div class="overview-parent1">
                            <b class="overview7">Overview</b><img class="iconlybolddocument3" alt=""
                                src="../img/iconlybolddocument.svg" />
                        </div>
                    </div>
                </a>

                <a href="/User" style="color:#d0d2da">
                    <div class="outlet10">
                        <div class="overview-child1"></div>
                        <div class="user6">
                            <b class="user7">User</b><img class="iconlyboldprofile3" alt=""
                                src="../img/iconlyboldprofile.svg" />
                        </div>
                    </div>
                </a>

                <div class="outlet11">
                    <div class="outlet-child5"></div>
                    <div class="kantor-cabang-parent1">
                        <b class="user7">Kantor Cabang</b><img class="home-icon3" alt="" src="../img/home@2x.png" />
                    </div>
                </div>

                <a href="/LoginPage" style="color:#d0d2da">
                    <div class="log-out6">
                        <div class="overview-child1"></div>
                        <div class="log-out-wrapper1"><b class="log-out7">Log out</b></div>
                        <img class="iconlyboldlogout3" alt="" src="../img/iconlyboldlogout.svg" />
                    </div>
                </a>

                <div class="samping-child1"></div>
                <img class="logo-btn-13" alt="" src="../img/logo-btn-1@2x.png" />
            </div>
        </div>
    </div>

    <!-- <script>
    var aset2Container = document.getElementById("aset2Container");
    if (aset2Container) {
        aset2Container.addEventListener("click", function(e) {
            window.location.href = "./OverviewKantorCabang7.html";
        });
    }

    var aset2Container1 = document.getElementById("aset2Container1");
    if (aset2Container1) {
        aset2Container1.addEventListener("click", function(e) {
            window.location.href = "./OverviewKantorCabang6.html";
        });
    }

    var doneContainer = document.getElementById("doneContainer");
    if (doneContainer) {
        doneContainer.addEventListener("click", function(e) {
            window.location.href = "./KantorCabang.html";
        });
    }
    </script> -->
</body>

</html>