<div class="row">
    <div class="col-md-10">
        <h3 class="breadcrumb-title pt-5">{{ $breadcrumb['page-title'] }}</h3>
        <span class="breadcrumb-sub-title">{{ $breadcrumb['sub-title'] }}</span>
    </div>
    <div class="col-md-2">
        <div class="profile-bar pt-5">
            <a href="#" >
                <img src="{{$userlogin->user_image}}" width="40" height="40" alt="Profile Picture">
                <span class="px-2">Hello, {{$userlogin->user_name}}</span>
            </a>
        </div>
    </div>
</div>