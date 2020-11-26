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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
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

    <link rel="icon" href="{{env('API_LINK_CUSTOM_PUBLIC')}}\image\eod_logo_2.png" sizes="32x32" type="image/png">
    <!-- <link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png"> -->
    

    <style type="text/css">
        .nav-item.active {
            border-bottom: 3px solid #dee2e6 !important;
            font-weight: 600 !important;
        }
        .text-muted2 {
            color:#b2b7bb;
        }

        .float-left{
            float: left;
        }

        .float-right{
            float: right;
        }

        .padding-footer{
            padding:0rem 1.5rem;
        }

        div.padding-footer span:hover{
            /*background-color: #b2b7bb;*/
            cursor: pointer;
            color: #3490dc!important;
        }

        .notificationContent{
            /*overflow:auto;
            width: 80%;*/
            overflow:auto;
        }

        .header{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index:99;
            margin-bottom: -25px;
        }

        .content{
            z-index: 1;
            margin-top: 50px;
        }

        .pointer{
            cursor: pointer;
        }
    </style>
    @yield('style')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm header">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{env('API_LINK_CUSTOM_PUBLIC')}}\image\eod_logo_2.png" width="30" height="30" class="d-inline-block align-top" alt="">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav nav ml-auto">
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('home')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('job/index')}}">Job List</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{url('engineer/index')}}">Engineer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('client/index')}}">Client</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('region/index')}}">Region</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('candidate/index')}}">New Partner</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Setting<span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{url('setting/category/index')}}">Category</a>
                                <a class="dropdown-item" href="{{url('client/index')}}">Client</a>
                                <a class="dropdown-item" href="{{url('engineer/index')}}">Engineer</a>
                                <a class="dropdown-item" href="{{url('region/index')}}">Region</a>

                            </div>
                        </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if(!Route::is('loa.show'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                   <!--  <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li> -->
                                @endif
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/partner') }}">{{ __('Join Partner') }}</a>
                            </li>
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
                                <span class="badge badge-pill badge-primary" style="float:right;margin-bottom:-10px;"></span> 
                                <!-- your badge -->
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right notificationContent" style="min-width: 15rem" aria-labelledby="navbarDropdown">
                                    <span class="dropdown-item dropdown-header" id="notificationCount"></span>
                                    <div class="dropdown-divider" style="margin-bottom: .25rem !important"></div>
                                    <div id="notificationContent"></div>
                                    
                                    <div class="notificationFooter padding-footer" style="display: none;margin-top: .5rem;margin-bottom: .5rem;">
                                        <span class="btn-view" onclick="btnView()">View All</span>
                                        <span class="float-right btn-read" onclick="btnRead()">
                                            Read All
                                        </span>
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
        @elseif(Route::is('partner'))
        <main class="content py-4">
            @yield('content')
        </main>
        @else
        <main class="py-4 content">
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

        ///////////////////////////////
        firebase.database().ref('notification/web-notif').orderByChild('timestamp').limitToLast(10).once('value', function(snapshot) {
            snapshot_dump = snapshot.val()
            // snapshot_dump = snapshot_dump
            var append = ""
            var count = 0

            // console.log(typeof(snapshot.val()));

            var keys = Object.keys(snapshot_dump);
            keys = keys.reverse()
            for (var i = 0; i < keys.length; i++) {
                // console.log(snapshot_dump[keys[i]])
                if(snapshot_dump[keys[i]].status == "unread"){
                    // append = append + "<li>" + index + " <span href='" + "{{url('job/detail')}}/" + snapshot_dump[index].job + "#history" + snapshot_dump[index].history + "' style='cursor: pointer;color:red;' onclick='readNotification(" + index + ")'>" + snapshot_dump[index].status + "</span> - " + snapshot_dump[index].showed + "</li>"
                    append = append + makeNotificationHolder(snapshot_dump[keys[i]],keys[i],"unread")
                } else {
                    // append = append + "<li>" + index + " <span href='" + "{{url('job/detail')}}/" + snapshot_dump[index].job + "#history" + snapshot_dump[index].history + "' style='cursor: pointer;color:blue;' onclick='readNotification(" + index + ")'>" + snapshot_dump[index].status + "</span> - " + snapshot_dump[index].showed + "</li>"
                    append = append + makeNotificationHolder(snapshot_dump[keys[i]],keys[i],"read")
                }


                // Show notif to Browser Notification
                if(snapshot_dump[keys[i]].showed == "false"){
                    showNotificationBrowser(snapshot_dump[keys[i]],keys[i])
                }

                count++
            }
            
            // for (const index in snapshot_dump) {
                
            //     // Append notif to list
            //     if(snapshot_dump[index].status == "unread"){
            //         // append = append + "<li>" + index + " <span href='" + "{{url('job/detail')}}/" + snapshot_dump[index].job + "#history" + snapshot_dump[index].history + "' style='cursor: pointer;color:red;' onclick='readNotification(" + index + ")'>" + snapshot_dump[index].status + "</span> - " + snapshot_dump[index].showed + "</li>"
            //         append = append + makeNotificationHolder(snapshot_dump[index],index,"unread")
            //     } else {
            //         // append = append + "<li>" + index + " <span href='" + "{{url('job/detail')}}/" + snapshot_dump[index].job + "#history" + snapshot_dump[index].history + "' style='cursor: pointer;color:blue;' onclick='readNotification(" + index + ")'>" + snapshot_dump[index].status + "</span> - " + snapshot_dump[index].showed + "</li>"
            //         append = append + makeNotificationHolder(snapshot_dump[index],index,"read")
            //     }


            //     // Show notif to Browser Notification
            //     if(snapshot_dump[index].showed == "false"){
            //         showNotificationBrowser(snapshot_dump[index],index)
            //     }

            //     count++
            // }
            // console.log(count)
            $("#notificationContent").append(append)
            $(".notificationFooter").css("display","block")
            // $("#notification").append(append)
        });

        firebase.database().ref('notification/web-notif').orderByChild('timestamp').on('value', function(snapshot) {
            snapshot_dump = snapshot.val()
            var count = 0
            for (const index in snapshot_dump) {
                if(snapshot_dump[index].status == "unread"){
                    // console.log(index)
                    count++
                }
            }

            if(count != 0){
                $("#notificationCount").text( count + " Unread notification")
            } else {
                $("#notificationCount").text("Nothing new in here")
            }
        });

        var start = true;

        firebase.database().ref('notification/web-notif').orderByChild('timestamp').limitToLast(1).on('child_added', function(snapshot) {
            if(!start){
                // Remove first notification
                // $("#notificationContent hr:last-child").remove()
                // $("#notificationContent a:last-child").remove()

                $("#notificationContent").children().last().remove()
                $("#notificationContent").children().last().remove()



                // Show latests notification to Browser Notification
                if(snapshot.val().showed == "false"){
                    showNotificationBrowser(snapshot.val(),snapshot.key)
                }

                // Add latests notification
                $("#notificationContent").prepend(makeNotificationHolder(snapshot.val(),snapshot.key,"unread")) 
            } else {
                start = false
            }
        })

        function showNotificationBrowser(data,index){
            var url = ""
            if (data.history == "On Progress") {
                url =  "{{url('candidate/detail')}}/" + data.job 
            } else if(data.history == "OK Advance"){
                url = "{{url('candidate/detail')}}/" + data.job + "#interview"
            } else if(data.history == "OK interview"){
                url = "{{url('candidate/detail')}}/" + data.job + "#interview"
            } else if(data.history == "OK Agreement"){
                url = "{{url('engineer/index')}}/"
                // append = append + '<span class="dropdown-item pointer " style="padding-bottom:0px !important" onclick="readNotification(' + index + ',' + "'" + "{{url('engineer/index')}}/" + "'" + ')">'
            } else if(data.history == "OK Partner"){
                url = "{{url('engineer/index')}}/"
                // append = append + '<span class="dropdown-item pointer " style="padding-bottom:0px !important" onclick="readNotification(' + index + ',' + "'" + "{{url('candidate/detail')}}/" + data.job + "#agreement" + "'" + ')">'
            } else{
                url = "{{url('job/detail')}}/" + data.job + "#history" + data.history
                // append = append + '<span class="dropdown-item pointer" style="padding-bottom:0px !important" onclick="readNotification(' + index + ',' + "'" + "{{url('job/detail')}}/" + data.job + "#history" + data.history + "'" + ')">'
            }

            var notification = new Notification(data.title, {
                icon: '{{env("API_LINK_CUSTOM_PUBLIC")}}/image/eod_logo_2.png',
                body: data.message,
            });
            notification.onclick = function() {
                window.open(url);
                // window.open("{{env('WEB_LINK_CUSTOM_PUBLIC')}}" + data.job);
            };

            firebase.database().ref('notification/web-notif/' + index).set({
                to: data.to,
                from: data.from,
                title: data.title,
                message: data.message,
                status: data.status,
                date_time : data.date_time,
                showed : "true",
                history : data.history,
                job : data.job
            });
        }

        function readNotification(index,url){
            firebase.database().ref('notification/web-notif/' + index).once('value').then(function(snapshot) {
                // console.log(snapshot.val())
                var data = snapshot.val()
                firebase.database().ref('notification/web-notif/' + index).set({
                    to: data.to,
                    from: data.from,
                    title: data.title,
                    message: data.message,
                    status: "read",
                    date_time : data.date_time,
                    job : data.job,
                    history : data.history,
                    showed : "true"
                });
                // window.location.href = "{{url('job/detail')}}/" + data.job + "#history" + data.history
                // window.location.href = "{{url('job/detail')}}/" + data.job + "#history" + data.history
                // window.open("{{url('job/detail')}}/" + data.job + "#history" + data.history)
                window.open(url)
            })
            // firebase.database().ref('notification/web-notif/' + index).once('value').then(function(snapshot) {
            //     // console.log(snapshot.val())
            //     var data = snapshot.val()
            //     firebase.database().ref('notification/web-notif/' + index).set({
            //         to: snapshot_dump[index].to,
            //         from: snapshot_dump[index].from,
            //         title: snapshot_dump[index].title,
            //         message: snapshot_dump[index].message,
            //         status: "read",
            //         date_time : snapshot_dump[index].date_time,
            //         job : snapshot_dump[index].job,
            //         history : snapshot_dump[index].history,
            //         showed : "true"
            //     });
            //     window.location.href = url
            // })

        }

        function makeNotificationHolder(data,index,status){
            var append = ""
            if (data.history == "On Progress") {
                append = append + '<span class="dropdown-item pointer " style="padding-bottom:0px !important" onclick="readNotification(' + index + ',' + "'" + "{{url('candidate/detail')}}/" + data.job + "'" + ')">'
            } else if(data.history == "OK Advance"){
                append = append + '<span class="dropdown-item pointer " style="padding-bottom:0px !important" onclick="readNotification(' + index + ',' + "'" + "{{url('candidate/detail')}}/" + data.job + "#interview" + "'" + ')">'
            } else if(data.history == "OK interview"){
                append = append + '<span class="dropdown-item pointer " style="padding-bottom:0px !important" onclick="readNotification(' + index + ',' + "'" + "{{url('candidate/detail')}}/" + data.job + "#interview" + "'" + ')">'
            } else if(data.history == "OK Agreement"){
                append = append + '<span class="dropdown-item pointer " style="padding-bottom:0px !important" onclick="readNotification(' + index + ',' + "'" + "{{url('engineer/index')}}/" + "'" + ')">'
            } else if(data.history == "OK Partner"){
                append = append + '<span class="dropdown-item pointer " style="padding-bottom:0px !important" onclick="readNotification(' + index + ',' + "'" + "{{url('candidate/detail')}}/" + data.job + "#agreement" + "'" + ')">'
            } else{
                append = append + '<span class="dropdown-item pointer" style="padding-bottom:0px !important" onclick="readNotification(' + index + ',' + "'" + "{{url('job/detail')}}/" + data.job + "#history" + data.history + "'" + ')">'
            }

            if(status == "unread"){
                append = append + '<i class="text-primary fas fa-envelope mr-2"></i>' + data.title + '<span class="float-right text-sm text-primary""></span>'
            } else {
                append = append + '<i class="text-muted fas fa-envelope mr-2"></i>' + data.title + '<span class="float-right text-sm text-primary""></span>'
            }
            
            append = append + '</span>'
            append = append + '<hr style="margin-bottom:.25rem;margin-top:.25rem">'

            return append
        }

        function btnView(){
             // window.open("{{url('job/notification_all')}}","_blank");
             window.open("{{url('job/notification_all')}}");
        }

        function btnRead(){
            firebase.database().ref('notification/web-notif').on('value', function(snapshot) {
                snapshot_dump = snapshot.val()
                // $("#notificationContent").empty()
                snapshot_dump.forEach(function(data,index){
                    if(data.status == "unread"){
                            firebase.database().ref('notification/web-notif/' + index).once('value').then(function(snapshot) {
                            // console.log(snapshot.val())
                            var data = snapshot.val()
                            firebase.database().ref('notification/web-notif/' + index).set({
                                to: data.to,
                                from: data.from,
                                title: data.title,
                                message: data.message,
                                status: "read",
                                date_time : data.date_time,
                                job : data.job,
                                history : data.history,
                                showed : "true"
                            });
                        })
                    }                        
                })
            });
        }

        ///////////////////////////////

         

        // $(".notificationContent").scrollTop($(".notificationContent")[0].scrollHeight); 

        // $(".notificationContent").scroll(function() {
        //     if($(".notificationContent").scrollTop() == 0) {
        //            // ajax call get data from server and append to the div
        //            function scrollNotification(data,index){

        //                 var append = ""
        //                 // console.log(snapshot_dump[index].job)
        //                 append = append + '<a href="' + "{{url('job/detail')}}/" + snapshot_dump[index].job + "#history" + snapshot_dump[index].history + '" class="dropdown-item" onclick="readNotification(' + index + ')">'
        //                 append = append + '   <i class="fas fa-envelope mr-2"></i>' + snapshot_dump[index].title + '<span class="float-right text-sm text-primary"><i class="fas fa-circle"></i></span>'
        //                 // append = append + '   <span class="float-right text-muted text-sm">3 mins</span>'
        //                 append = append + '</a>'
        //                 append = append + '<hr>'
        //                 $("#notificationContent").append(append)

        //            }
        //     }
        // }); 

    </script>
    @endauth
    @yield('script2')

</body>
</html>
