<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="../css/global.css" />
    <link rel="stylesheet" href="../css/LoginPage.css" />

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Baloo Bhai:wght@400&display=swap" />

</head>

<body>
    <div class="login-page">
        <div class="rectangle-parent40">
            <div class="group-child50"></div>
            <div class="warna-atas"></div>
        </div>
        <img class="pngtreeofficer-fnancial-audit" alt=""
            src="img/pngtreeofficer-fnancial-audit-business-analysis-7259411-1@2x.png" />
        <div class="sign-in-form">
            <div class="sign-in-form-child"></div>
            <div class="hello-admin">Hello Admin!</div>

            <form action="/login" method="post">
                <div class="sign-in">Sign in</div>
                @csrf
                <div class="username">
                    <div class="enter-your-username" style="margin-left: 25px;">ID</div>
                    <!-- <div class="username-child"></div> -->
                    <input type="text" class="username-child" placeholder="Masukkan ID" id="user_name"
                        name="user_name">
                    <!-- <div class="username-or-email">Masukkan NIP</div> -->
                </div>
                <div class="password20">
                    <div class="enter-your-username" style="margin-left: 25px;">Password</div>
                    <!-- <div class="password-child10"></div> -->
                    <input type="password" name="password" id="id_password" class="password-child10"
                        placeholder="Masukkan Password" id="password" name="password">
                    <i class="far fa-eye" id="akariconseyeopen" style=" cursor: pointer;"></i>
                    <!-- <div class="username-or-email">Masukkan Password</div> -->
                </div>
          

            <!-- <img class="akar-iconseye-open" alt="" src="img/akariconseyeopen.svg" /> -->
            <div class="tombol-sign-in">
                <button class="tombol-sign-in-child"></button>
                <div class="sign-in1" value="Sign in">Sign in</div>

            </div>
            </form>
        </div>
        <div class="login-page-inner">
            <div class="btn-outlet-wrapper">
                <b class="btn-outlet">BTN Outlet</b>
            </div>
        </div>
        <div class="login-page-child">
            <div class="kantor-wilayah-iii-surabaya-wrapper">
                <div class="kantor-wilayah-iii">Kantor Wilayah III Surabaya</div>
            </div>
        </div>
        <div class="alamat-kantor">
            <div class="jl-pemuda-no50-container">
                <p class="jl-pemuda-no50">
                    Jl. Pemuda No.50, Embong Kaliasin, Kec. Genteng,
                </p>
                <p class="kota-surabaya-jawa">Kota Surabaya, Jawa Timur 60271</p>
            </div>
            <div class="kantor-wilayah-iii1">
                Kantor Wilayah III Bank Tabungan Negara
            </div>
        </div>
        <img class="logo-btn-113" alt="" src="img/logo-btn-113@2x.png" />
    </div>

    <script>
    const akariconseyeopen = document.querySelector('#akariconseyeopen');
    const password = document.querySelector('#id_password');

    akariconseyeopen.addEventListener('click', function(e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });
    </script>
</body>

</html>