@section('navbar')
<nav class="navbar">
    <img src="{{ asset('sources/LogoBG.png') }}" alt="" id="logo" />
    <h1>STUDYSPHERE</h1>
    <div class="links">
        <a href="/">Home</a>
        <a href="/studymaterial">Study Materials</a>
        <a href="/about">About</a>
        <a href="/contact">Contact</a>                
    </div>

    <div class="userStatus">
        @auth
            <div class="user">
                <span>Welcome, <b>{{ Auth::user()->firstname }}</b></span>
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


</nav>
@endsection