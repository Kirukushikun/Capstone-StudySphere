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
                    <img src="{{ asset('sources/iverson.jpg') }}" alt="">
                </div>
                <div class="founderDetails">
                    <h2>Founder/Developer</h2>
                    <h1>Iverson Craig G. Guno</h1>
                    <p>He was born on October 31, 2003, in Concepcion, Tarlac, and is currently a student at Dominican College of Tarlac, pursuing a Bachelor's degree in Information Technology. An enthusiastic individual with a deep passion for programming, especially in the field of Web Development, he brings to the table a unique combination of creativity and technical expertise. Eager to learn and driven to deepen his knowledge in the Tech Industry, he is on a continuous journey of growth and exploration.</p>
                </div>
            </div>                        
        </div>

        <div class="background2">

            <div class="aboutContainers" id="aboutSubContent3">

                <div class="cofounderDetails">
                    <h2>Co-Founder/Graphic Designer</h2>
                    <h1>Ishi T. Robles</h1>
                    <p>An architecture student at Tarlac State University. Her innate talent for visual expression shines through in every stroke of the digital canvas, as she effortlessly combines architectural precision with artistic flair. With a keen eye for detail and a relentless pursuit of excellence, She infuses our website with a sense of wonder and imagination. Her dedication to her craft and unwavering passion for creativity make her an invaluable asset to our team. We are privileged to have her on board, enriching our website with her extraordinary talent and passion for the arts.</p>
                </div>

                <div class="cofounderImage">
                    <img src="{{ asset('sources/ishi.jpg') }}" alt="">
                </div>
            </div>                        
        </div>

    </div>

    @yield('footer')

</body>
</html>