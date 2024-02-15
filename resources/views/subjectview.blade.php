@include('components.sidebar')
@include('components.formAdd')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('sources/Icon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/repository.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>StudySphere</title>
</head>
<body>
    
    @yield('sidebar')

    <section class="home">
        
        <div class="subjectHeader">
            <h1>{{ $subject->subject }}</h1>
            <div class="user">
                <span>Hi, <b>{{ Auth::user()->firstname }}</b></span>
            </div>            
        </div>

        <div class="subjectContent">

            <div class="userDocuments">
                
                <div class="materials">
                    <!-- This is where we will display Tasks and todo list made by the user -->
                    <div class="header">
                        <h2>Materials</h2>
                        <i class='bx bx-plus' onclick="popup()"></i>
                    </div>
                    
                    <div class="container">

                    </div>
                </div>

                <div class="files">
                    <!-- This is where we will display Documents and other files made by the user -->
                    <div class="header">
                        <h2>Documents</h2>
                        <i class='bx bxs-file-plus'></i>
                    </div>
                    

                    <div class="container">

                    </div>
                </div>

            </div>

        </div>

        @yield('formAdd')

    </section>

    <script src="{{ asset('js/adddocument.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html>