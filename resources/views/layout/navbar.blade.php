<nav class="navbar navbar-expand-lg bg-light ">
    <div class="container-fluid mx-5">
        @auth
            <a class="navbar-brand" href="{{ route('dashboard') }}">Hallo {{ auth()->user()->nama }}</a>
        @endauth
        @guest
            <a class="navbar-brand">ATM</a>
        @endguest
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            @auth
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link  {{ Request::routeIs('dashboard') ? 'active' : '' }}" aria-current="page"
                            href="{{ route('dashboard') }}">Home</a>
                    </li>
                    <a class="nav-link {{ Request::routeIs('riwayat') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('riwayat') }}">Riwayat Transaksi</a>
                    <li>
                        <form action="logout">
                            @csrf
                            <button type="submit" class="btn btn-secondary">Logout</button>
                        </form>
                    </li>
                </ul>
            @endauth
            @guest
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('login') ? 'active' : '' }}" aria-current="page"
                            href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('register') ? 'active' : '' }}"
                            href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
            @endguest
        </div>
    </div>
</nav>
