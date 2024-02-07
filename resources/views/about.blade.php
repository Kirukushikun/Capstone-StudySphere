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
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>StudySphere</title>
</head>
<body>

    @yield('navbar')
    
    <div class="MainContent">

        <div class="aboutContainers" id="aboutSubContent1">
                <h1>Meet StudySphere!</h1>
                <p>Welcome to StudySphere, your dedicated online platform designed to elevate your educational journey. At StudySphere, we believe that every student deserves the tools and support necessary to thrive academically. Our mission is to provide a seamless and comprehensive environment where learning becomes an empowering experience.</p>                            
        </div>

        <div class="background1">
            <div class="aboutContainers" id="aboutSubContent2">
                <div class="founderImage">
                    Image
                </div>
                <div class="founderDetails">
                    <h2>Founder/Developer</h2>
                    <h1>Iverson Craig G. Guno</h1>
                    <p>He was born on October 31, 2003, in Concepcion, Capas, Tarlac, and is currently a student at Dominican College of Tarlac, pursuing a Bachelor's degree in Information Technology. An enthusiastic individual with a deep passion for programming, especially in the field of Web Development, he brings to the table a unique combination of creativity and technical expertise. Eager to learn and driven to deepen his knowledge in the Tech Industry, he is on a continuous journey of growth and exploration.</p>
                </div>
            </div>                        
        </div>

    </div>

    @yield('footer')

</body>
</html>