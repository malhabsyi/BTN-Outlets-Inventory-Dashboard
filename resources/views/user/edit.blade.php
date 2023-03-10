@extends('pages.layout')

@section('content')

@include('pages.breadcrumb')
<head>
  <link rel="stylesheet" href="../css/UserUpdateUser.css" />
</head>
    <div class="user-update-user">
        <div class="dashboard-parent1">


            <form action="/update-user/{{$user->id}}" method="post">
                @csrf
                @method('put')
                <div class="nama-user2">
                    <div class="first-name1">
                        <!-- <div class="last-name-item"></div>
                    <b class="elang1">Elang</b> -->
                        <input type="text" class="email-item" placeholder="" name="user_name" value="{{$user->user_name}}">
                    </div>
                    <b class="nama-user3">Nama User</b>
                </div>
                <div class="email3">
                    <div class="email4">
                        <!-- <div class="email-item"></div>
                    <b class="elang1">elangalhabsyi@btn.com</b> -->
                        <input type="email" class="email-item" placeholder="" name="user_email"   value="{{$user->user_email}}">
                    </div>
                    <b class="nama-user3">Email</b>
                </div>
                <div class="password5">
                    <div class="password6">
                        <!-- <div class="email-item"></div>
                    <b class="elang1">*************</b> -->
                        <input type="text" class="email-item" placeholder="" name="password"   value="{{$password}}">
                    </div>
                    <b class="nama-user3">Password</b>
                </div>
                <div class="re-enter-password1">
                    <div class="password8">
                        <!-- <div class="email-item"></div>
                    <b class="elang1">102752732364</b> -->
                        <input type="text" class="email-item" placeholder="" name="user_telp" value="{{$user->user_telp}}">
                    </div>
                    <b class="nip1">No Telp</b>
                </div>
                <div class="kantor-cabang16">
                    <div class="password9">
                    <select id="kantor_cabang" name="kantor_cabang_id" class="email-item" required>
                                    <option value="">Pilih Kantor Cabang</option>
                                    @foreach($kantorcabang as $kc)
                                        <option value="{{ $kc->id }}">{{ $kc->kantor_cabang_name }}</option>
                                    @endforeach
                        </select>
                    </div>
                    <b class="nama-user3">Kantor Cabang</b>
                </div>
                <div class="role2">
                    <div class="check-user1">
                        <div class="check-user-inner" id="rectangle6"></div>
                        <!-- <div class="check-user-child1"></div> -->
                        <input type="text" class="email-item" name="role" value="{{ $user->role }}" readonly/>
                    </div>
                    <b class="nama-user3">Role</b>
                </div>
                <div class="delete3" id="deleteContainer">
                    <div class="rectangle-parent23">
                        <button class="group-child29"  type="submit" name="submit">Confrim</button>
                        <!-- <b class="delete4">Delete</b> -->
                    </div>
                </div>
                </form>

                <div class="delete5" id="deleteContainer1">
                    <div class="rectangle-parent23">
                        <form action="/delete-user/{{$user->id}}" method="POST">    
                            @csrf
                            <button class="group-child30" type="submit" name="delete">Delete</button>
                        </form>
                    </div>
                </div>
          
            
            <a href="/akun"><img class="go-back-icon1" alt="" src="../img/go-back@2x.png" id="goBackImage" /></a>
        </div>
    </div>

    <div id="checkBoxContainer" class="popup-overlay" style="display: none">
        <div class="check-box">
            <div class="check">
                <div class="check-child"></div>
                <div class="check-item"></div>
            </div>
        </div>
    </div>

    <!-- <script>
    var rectangle6 = document.getElementById("rectangle6");
    if (rectangle6) {
        rectangle6.addEventListener("click", function() {
            var popup = document.getElementById("checkBoxContainer");
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

    var rectangle8 = document.getElementById("rectangle8");
    if (rectangle8) {
        rectangle8.addEventListener("click", function() {
            var popup = document.getElementById("checkBoxContainer");
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

    var deleteContainer = document.getElementById("deleteContainer");
    if (deleteContainer) {
        deleteContainer.addEventListener("click", function(e) {
            window.location.href = "./UserDeleteUser.html";
        });
    }

    var deleteContainer1 = document.getElementById("deleteContainer1");
    if (deleteContainer1) {
        deleteContainer1.addEventListener("click", function(e) {
            window.location.href = "./UserAfterCreate.html";
        });
    }

    var goBackImage = document.getElementById("goBackImage");
    if (goBackImage) {
        goBackImage.addEventListener("click", function(e) {
            window.location.href = "./UserAfterCreate.html";
        });
    }
    </script> -->

@endsection