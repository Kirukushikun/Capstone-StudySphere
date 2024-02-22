@section('navbar')
<nav class="navbar">
    <img src="{{ asset('sources/LogoBG.png') }}" alt="" id="logo" />
    <h1>STUDYSPHERE</h1>
    <div class="links">
        <a href="/">Home</a>
        <a href="/dashboard">Study Materials</a>
        <a href="/about">About</a>
        <a href="/contact">Contact</a>                
    </div>

    <div class="userStatus">
        @auth
            <div class="user">
                <span><b>{{ Auth::user()->firstname }}</b></span>
            </div>
            <div class="logout">
                <a href="{{ route('logout') }}">Log Out</a>
            </div>
        @else
            <div class="login">
                <a href="{{ route('login') }}">Login</a>
            </div>
        @endauth
    </div>

    <div class="menubar">
        <i class='bx bx-menu' onclick="collapseActive()"></i>
    </div>

    <div class="menuLinks">
        <div class="menubar2">
            <h2>StudySphere</h2>
            <i class='bx bx-menu' onclick="collapse()"></i>
        </div>

        <div class="links2">
            <a href="/">Home</a>
            <a href="/dashboard">Study Materials</a>
            <a href="/about">About</a>
            <a href="/contact">Contact</a> 
        </div>

        <div class="userStatus2">
            @auth
                <div class="logout">
                    <a href="{{ route('logout') }}">Log Out</a>
                </div>
            @else
                <div class="login">
                    <a href="{{ route('login') }}">Login</a>
                </div>
            @endauth
        </div>
    </div>
</nav>
@endsection