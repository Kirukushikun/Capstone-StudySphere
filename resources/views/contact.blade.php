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
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>StudySphere</title>
</head>
<body>

    @yield('navbar')
    
    <div class="ContactContent">

        <div class="mainContent">
            <div class="subContent1">
                <h1>Contact Us</h1>
                <p>Reach out to us! We're eager to hear from you. Whether you have questions or feedback, drop us a message, and we'll respond promptly to assist you.</p>
            </div>

            <div class="subContent2">
                <form action="{{route('submit')}}" method="POST" class="form">
                    @csrf
                    <div class="fullname">
                        <div class="firstname">
                            <label htmlFor="fName">First Name:</label>
                            <input type="text" class="inputs" name="fName" id="fName"/>
                        </div>
                        
                        <div class="lastname">
                            <label htmlFor="lName">Last Name:</label>
                            <input type="text" class="inputs" name="lName" id="lName" />
                        </div>
                    </div>

                    <div class="email">
                        <label htmlFor="email">Email:</label>
                        <input type="email" class="inputs" id="email" name="email" />
                    </div>

                    <div class="feedback">
                        <label htmlFor="textarea">What can we help you with?</label>
                        <textarea name="textarea" class="inputs" id="textarea" cols="25" rows="7" ></textarea>                                  
                    </div>
                    
                    <input type="submit" id="submit" placeholder="SUBMIT" />


                </form>
            </div>                    
        </div>                
    </div>


    @yield('footer')

</body>
</html>