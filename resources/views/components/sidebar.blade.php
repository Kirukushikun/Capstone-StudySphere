@section('sidebar')
<nav class="sidebar">
    <header>
        <div class="image-text">

            <span class="image">
                <img src="{{ asset('sources/Logo.png') }}" alt="#">
            </span>

            <div class="text header-text">
                <span class="name">
                    <h3>StudySphere</h3>
                </span>
            </div>
        </div>

        <i class='bx bx-chevron-left toggle'></i>
    </header>

    <div class="menu-bar">
        <div class="menu">
            <ul class="menu-links">
                <li class="nav-link">
                    <a href="/dashboard">
                        <i class='bx bx-home icon' ></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="/taskmanager">
                        <i class='bx bx-task icon' ></i>
                        <span class="text nav-text">Task Manager</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="/calendar">
                        <i class='bx bx-calendar icon' ></i>
                        <span class="text nav-text">Calendar</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="/quizzes">
                        <i class='bx bx-bulb icon' ></i>
                        <span class="text nav-text">Quiz Section</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="/repository">
                        <i class='bx bx-folder icon' ></i>
                        <span class="text nav-text"> Repository</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="bottom-content">
            <li class="nav-link">
                <a href="/logout">
                    <i class='bx bx-log-out icon' ></i>
                    <span class="text nav-text"> Log Out</span>
                </a>
            </li>

            <li class="mode">
                <div class="moon-sun">
                    <i class='bx bx-moon icon moon' ></i>
                    <i class='bx bx-sun icon sun' ></i>
                </div>
                <span class="mode-text text">Dark Mode</span>
                
                <div class="toggle-switch">
                    <span class="switch">
                    </span>
                </div>
            </li>
        </div>

    </div>
</nav>
@endsection