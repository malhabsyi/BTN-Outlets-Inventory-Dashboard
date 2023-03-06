@include('pages.header')

<div class="container-fluid">
    <div class="row">
        @include('pages.sidebar')
        
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-light">
            @yield('content')
        </main>
    </div>
</div>

@include('pages.footer')

