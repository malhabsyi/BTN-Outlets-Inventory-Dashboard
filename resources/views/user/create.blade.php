@extends('pages.layout')

@section('content')

@include('pages.breadcrumb')
<head>
  <link rel="stylesheet" href="../css/UserCreateUser.css" />
</head>

    <div class="user-create-user">
        <div class="dashboard-parent3" id="frameContainer">

            <form action="{{ route('registrasi') }}" method="post">
            @csrf
                <div class="nama-user6">
                    <div class="first-name3">
                        <!-- <div class="last-name-child1"></div>
            <b class="emailexamplecom">First Name</b> -->
                        <input type="text" class="email-child1" placeholder="Nama User" name="user_name" required>
                    </div>
                    <b class="nama-user7">Nama User</b>
                </div>
                <div class="email9">
                    <div class="email10">
                        <!-- <div class="email-child1"></div>
            <b class="emailexamplecom">email@example.com</b> -->
                        <input type="email" class="email-child1" placeholder="email@example.com" name="user_email" required>
                    </div>
                    <b class="nama-user7">Email</b>
                </div>
                
                <div class="password15">
                    <div class="password16">
                        <!-- <div class="email-child1"></div>
            <b class="emailexamplecom">*************</b> -->
                        <input type="password" placeholder="*************" class="email-child1" name="password" required>
                    </div>
                    <b class="nama-user7">Password</b>
                </div>
                <div class="re-enter-password3">
                    <div class="password18">
                        <!-- <div class="email-child1"></div>
            <b class="emailexamplecom">102752732364</b> -->
                        <input type="text" class="email-child1" id="notelpuser" placeholder="628 *********" name="user_telp" required>
                    </div>
                    <b class="nama-user7">No Telp</b>
                </div>
                <div class="kantor-cabang22">
                    <div class="password19">
                        <!-- <div class="email-child1"></div>
                        <b class="masukkan-kantor-cabang">Masukkan Kantor Cabang</b> -->
                        <select id="kantor_cabang" name="kantor_cabang_id" class="email-child1" required>
                                    <option value="">Pilih Kantor Cabang</option>
                                    @foreach($kantorcabang as $kc)
                                        <option value="{{ $kc->id }}">{{ $kc->kantor_cabang_name }}</option>
                                    @endforeach
                        </select>
                    </div>
                    <b class="nama-user7">Kantor Cabang</b>
                </div>
                <div class="role6">
                    <label class="role7">Role</label>
                    <select name="role" class="email-child1" required>
                        @foreach($role as $value)
                            <option value="{{ $value }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="confirm4">
                    <div class="confirm-item"></div>
                    <button type="submit" class="confirm-item" value="submit">Confirm</button>
                    <!-- <b class="confirm5"></b> -->
                </div>
                <a href="/akun"><img class="go-back-icon3" alt="" src="img/go-back@2x.png" /></a>
        </div>
        </form>
    </div>

    <div id="checkBoxContainer" class="popup-overlay" style="display: none">
        <div class="check-box">
            <div class="check">
                <div class="check-child"></div>
                <div class="check-item"></div>
            </div>
        </div>
    </div>


@endsection