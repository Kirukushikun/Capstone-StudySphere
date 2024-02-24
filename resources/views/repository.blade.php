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
            <h1>Resource Repository</h1>
            <div class="user">
                <span>Hi, <b>{{ Auth::user()->firstname }}</b></span>
            </div>            
        </div>

        <div class="subjectContent">

            <div class="addSubjects">
                <i class='bx bx-plus' onclick="popupSF()"></i>
            </div>

            <div class="userSubjects">

                @foreach($subjects as $subject)
                <div class="subject">

                    <div class="btns">
                        <button>
                            <i class='bx bx-pencil' onclick="location.href='{{ route('subject.edit', $subject->id) }}' "></i>
                        </button>
                        <form action="{{route('subject.delete', $subject->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                <i class='bx bx-trash' ></i>
                            </button>
                        </form>
                    </div>

                    <h2>{{ $subject->subject }}</h2>
                    <p>{{ $subject->description }}</p>

                    <div class="items">
                        <p>
                            @if($subject->items_count > 1)
                                {{$subject->items_count}} Items
                            @else
                                {{$subject->items_count}} Item
                            @endif
                        </p>

                        <div class="view">
                            <span><a href="{{ route('subjectview', ['id'=> $subject->id]) }}">View</a></span>
                        </div>
                    </div>

                </div>
                @endforeach

            </div>

        </div>

        @yield('addsubject')

    </section>
    <script>
        //ADD SUBJECT FORM
        function popupSF(){
            document.querySelector(".AddSubject").classList.add("Active");
        }function popdownSF(){
            document.querySelector(".AddSubject").classList.remove("Active");
        }
    </script>
    <script src="{{ asset('js/formAdd.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html>