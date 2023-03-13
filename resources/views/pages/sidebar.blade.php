<nav class="col-md-3 col-lg-2 d-md-block bg-white">
    <img class="logo my-5" alt="Logo BTPN" src="../img/logo-btn-1@2x.png" />
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column text-center">
            <li class="nav-item px-4">
                <a href="/" class="nav-link">
                    <div class="d-flex align-items-center nav-2 {{ Request::url() == url('/') ? 'active' : '' }}">
                        <img alt="Icon Overview" src="../img/iconlybolddocument.svg" width="24" height="24" class="mr-2" />
                        <span>Overview</span>
                    </div>
                </a>
            </li>
            <li class="nav-item px-4">
                <a href="/kantor-cabang" class="nav-link">
                    <div class="d-flex align-items-center nav-2 {{ Request::url() == url('/kantor-cabang') ? 'active' : '' }}">
                        <img alt="Icon Kantor Cabang" src="../img/home@2x.png" width="24" height="24" class="mr-2" />
                        <span>Kantor Cabang</span>
                    </div>
                </a>
            </li>
            @if($userlogin->role=='superadmin')
            <li class="nav-item px-4">
                <a href="/akun" class="nav-link">
                    <div class="d-flex align-items-center nav-2 {{ Request::url() == url('/akun') ? 'active' : '' }}">
                        <img alt="Icon User" src="../img/iconlyboldprofile.svg" width="24" height="24" class="mr-2" />
                        <span>User</span>
                    </div>
                </a>
            </li>
            @endif
            <li class="nav-item px-4 mt-4">
                <a href="#" class="nav-link mt-4" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <div class="d-flex align-items-center nav-2 {{ Request::url() == url('/') ? 'active' : '' }}">
                        <img alt="Icon Logout" src="../img/iconlyboldlogout.svg" width="24" height="24" class="mr-2" />
                        <span>Log Out</span>
                    </div>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>