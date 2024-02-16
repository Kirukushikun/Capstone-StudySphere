@include('components.sidebar')
@include('components.formAdd')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('sources/Icon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/quizzes.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
      integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="{{asset('css/calendar.css')}}" />
    <title>StudySphere</title>
</head>
<body>

    @yield('sidebar')

    <section class="home">

        <div class="container">
        <div class="left">
            <div class="calendar">
            <div class="month">
                <i class="fas fa-angle-left prev"></i>
                <div class="date">december 2015</div>
                <i class="fas fa-angle-right next"></i>
            </div>
            <div class="weekdays">
                <div>Sun</div>
                <div>Mon</div>
                <div>Tue</div>
                <div>Wed</div>
                <div>Thu</div>
                <div>Fri</div>
                <div>Sat</div>
            </div>
            <div class="days"></div>
            <div class="goto-today">
                <div class="goto">
                <input type="text" placeholder="mm/yyyy" class="date-input" />
                <button class="goto-btn">Go</button>
                </div>
                <button class="today-btn">Today</button>
            </div>
            </div>
        </div>
        <div class="right">
            <div class="today-date">
            <div class="event-day">wed</div>
            <div class="event-date">12th december 2022</div>
            </div>
            <div class="events"></div>
            <div class="add-event-wrapper">
            <div class="add-event-header">
                <div class="title">Add Event</div>
                <i class="fas fa-times close"></i>
            </div>
            <div class="add-event-body">
                <div class="add-event-input">
                <input type="text" placeholder="Event Name" class="event-name" />
                </div>
                <div class="add-event-input">
                <input
                    type="text"
                    placeholder="Event Time From"
                    class="event-time-from"
                />
                </div>
                <div class="add-event-input">
                <input
                    type="text"
                    placeholder="Event Time To"
                    class="event-time-to"
                />
                </div>
            </div>
            <div class="add-event-footer">
                <button class="add-event-btn">Add Event</button>
            </div>
            </div>
        </div>
        <button class="add-event">
            <i class="fas fa-plus"></i>
        </button>
        </div>

    </section>

    <script src="{{ asset('js/sideBar.js') }}"></script>
    <script src="{{ asset('js/calendar.js') }}"></script>

</body>
</html>