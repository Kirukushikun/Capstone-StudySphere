@include('components.navbar')
@include('components.footer')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('sources/Icon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>StudySphere</title>
</head>
<body>

    @yield('navbar')

    <div class="home">
        <div class="container1">
            <div class="content">
                <div class="details">
                    <h1>Welcome to StudySphere - Where Learning Soars!</h1>
                    <p>StudySphere is your dedicated space for academic excellence. Here, we've curated the finest online study tools to elevate your learning experience.
                    <br /><br />
                    Embark on a journey with StudySphere, where learning is not just a task but a rewarding adventure.</p>
                    <button>JOIN US</button>
                </div>
                <div class="image">
                    <img src="{{ asset('sources/Sql-Body.png') }}" alt="Image Unavailable" />    
                </div>                
            </div>
        </div>

        <div class="container2">
            <div class="content">
                <div class="details">
                    <h1>Top Picks for Your Studies</h1>
                    <p>At StudySphere, we've sifted through countless learning tools to bring you our top recommendations. Discover the highest-rated features for your studies with just a few clicks. Your academic success is our priority!</p>
                    <button>GET STARTED</button>
                </div>
                <div class="image">Image</div> 
            </div>
        </div>

        <div class="container3">
            <div class="content">
                <div class="details">
                    <h2>Features</h2>
                    <p>Our platform is not just a tool; it's your passport to a world of academic excellence.</p>
                    <br />
                    <ul>
                        <li>Personalized Study Hubs</li>
                        <li>Interactive Learning Hub</li>
                        <li>Effortless Progress Tracking</li>
                        <li>Innovative Learning Tools</li>
                    </ul>
                </div>
                <div class="image">Image</div> 
            </div>
        </div>
    </div>

    @yield('footer')

</body>
</html>