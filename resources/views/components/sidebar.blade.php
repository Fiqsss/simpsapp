<div class="sidebar text-white shadow-lg">
    {{-- header --}}
    <div class="header d-flex justify-content-between p-3 align-items-center">
        <a class="text-decoration-none text-white" href="/">
            <div class="d-flex justify-content-center align-items-center h-0">
                <img class="me-2" src="{{ asset('assets/img/components/Handbag.png') }}" alt="">
                <p class="m-0">SIMS Web App</p>
            </div>
        </a>
        <button class="btn"><i class="fas fa-bars w-75 text-white "></i></button>
    </div>
    {{-- body --}}
    <div class="body text-start">
        <a class="btn text-white text-start px-3 my-3 w-100" href="/produk"><img class="me-2"
                src="{{ asset('assets/img/components/Package.png') }}" alt=""> Produk</a>
        <a class="btn text-white text-start px-3 my-3 w-100" href="/profile"><img class="me-2"
                src="{{ asset('assets/img/components/User.png') }}" alt=""> Profil</a>
        <a class="btn text-white text-start px-3 my-3 w-100" href="/logout"><img class="me-2"
                src="{{ asset('assets/img/components/SignOut.png') }}" alt=""> Logout</a>
    </div>
</div>
