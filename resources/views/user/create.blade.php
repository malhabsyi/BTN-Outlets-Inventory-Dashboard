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
            <div class="container-user">
                <div class="form-group">
                    <div class="d-flex ">
                        <div class="w-25 align-self-center">
                            <b class="nama-user7">Nama User</b>
                        </div>
                        <div class="">
                            <input type="text" class="email-child1" placeholder="Nama User" name="user_name" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-flex">
                        <div class="w-25 align-self-center">
                            <b class="nama-user7">Email</b>
                        </div>
                        <div class="">
                            <input type="email" class="email-child1" placeholder="email@example.com" name="user_email" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-flex">
                        <div class="w-25 align-self-center">
                            <b class="nama-user7">Password</b>
                        </div>
                        <div>
                            <input type="password" placeholder="*************" class="email-child1" name="password" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-flex">
                        <div class="w-25 align-self-center">
                            <b class="nama-user7">No Telp</b>
                        </div>
                        <div>
                            <input type="text" class="email-child1" id="notelpuser" placeholder="628 *********" name="user_telp" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-flex">
                        <div class="w-25 align-self-center">
                            <b class="nama-user7">Kantor Cabang</b>
                        </div>
                        <div>
                            <select id="kantor_cabang" name="kantor_cabang_id" class="email-child1" required>
                                <option value="">Pilih Kantor Cabang</option>
                                @foreach($kantorcabang as $kc)
                                <option value="{{ $kc->id }}">{{ $kc->kantor_cabang_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-flex">
                        <div class="w-25 align-self-center">
                            <b class="nama-user7">Role</b>
                        </div>
                        <div>
                            <select name="role" class="email-child1" required>
                                @foreach($role as $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="confirm4">
                <div class="confirm-item"></div>
                <button type="submit" class="confirm-item" value="submit">Confirm</button>
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