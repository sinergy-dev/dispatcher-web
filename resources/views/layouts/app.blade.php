 <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js" defer></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    

    <style type="text/css">
        .nav-item.active {
            border-bottom: 3px solid #dee2e6 !important;
            font-weight: 600 !important;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('home')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('job/index')}}">Job List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('engineer/index')}}">Engineer</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                           
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} - {{ Auth::user()->user_type}}<span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                             <!-- <li class="nav-item dropdown">
                                <a class="nav-link" href="messages"><i class="fa fa-bell"></i> <span class="sr-only">(current)</span></a>
                            </li> -->
                            <li class="nav-item dropdown">
                                <span class="badge badge-pill badge-primary" style="float:right;margin-bottom:-10px;">1</span> <!-- your badge -->
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" style="min-width: 15rem" aria-labelledby="navbarDropdown">
                                    <span class="dropdown-item dropdown-header" id="notificationCount">15 Notifications</span>
                                    <div class="dropdown-divider"></div>
                                    <div id="notificationContent">
                                        <a href="#" class="dropdown-item">
                                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                                            <span class="float-right text-muted text-sm">3 mins</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                                            <span class="float-right text-muted text-sm">3 mins</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                                            <span class="float-right text-muted text-sm">3 mins</span>
                                        </a>
                                    </div>
                                </div>
                            </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

        @if(Route::is('job.idex'))
            @yield('content')
        @else
        <main class="py-4">
            @yield('content')
        </main>
        @endif
        
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $("li.nav-item").has('a[href="' + location.protocol + '//' + location.host + location.pathname + '"]').addClass('active')
            @yield('script')
        })
    </script>
    @auth
    <script src="https://www.gstatic.com/firebasejs/7.15.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.15.0/firebase-database.js"></script>
    <script type="text/javascript">
        var firebaseConfig = {
            apiKey: "{{env('FIREBASE_APIKEY')}}",
            authDomain: "{{env('FIREBASE_AUTHDOMAIN')}}",
            databaseURL: "{{env('FIREBASE_DATABASEURL')}}",
            projectId: "{{env('FIREBASE_PROJECTID')}}",
            storageBucket: "{{env('FIREBASE_STOREBUCKET')}}",
            messagingSenderId: "{{env('FIREBASE_MESSAGINGSENDERID')}}",
            appId: "{{env('FIREBASE_APPID')}}",
        };
        firebase.initializeApp(firebaseConfig);

        firebase.database().ref('notification/web-notification').on('value', function(snapshot) {
            snapshot_dump = snapshot.val()
            snapshot_dump.forEach(function(data,index){
                if(data.showed == false && data.to == "{{Auth::user()->email}}"){
                    sendNotification(data.title,data.message)
                    // setNotification(index,data)
                }
            })
        });

        function sendNotification(title,message) {
            if (Notification.permission !== 'granted')
                Notification.requestPermission();
            else {
                var notification = new Notification(title, {
                    icon: 'https://image.flaticon.com/icons/svg/25/25643.svg',
                    body: message,
                });
                notification.onclick = function() {
                    window.open('http://stackoverflow.com/a/13328397/1269037');
                };
            }
        }

        function addNotification(){

        }

        function initNotification(){

        }

        // function setNotification(key,data){
        //     console.log('updated')
        // // function setNotification(){
        //     firebase.database().ref('notification/web-notification/' + 2).set({
        //         to: data.to,
        //         from: data.from,
        //         title: data.title,
        //         message: data.message,
        //         status: data.status,
        //         date_time : data.date_time,
        //         showed : true
        //     });

        // }

    </script>
    @endauth

</body>
</html>
