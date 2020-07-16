@extends('layouts.app')
@section('content')
<style type="text/css">
	.cursor-pointer{
		cursor: pointer;
	}

	.list-group .list-group-item:hover{
		background-color: #cedeeb!important;
		color: black!important;
	}

	a {
    	text-decoration: none !important;
    	color: none!important;
	}
</style>
<link rel="stylesheet" type="text/css" href="{{asset('css/pagination-custom.css')}}">

<div class="container">
	<div class="card">
	  <div class="card-body">
	    <h5 class="card-title title-pagination">Recent Notification <i class="fa fa-bell" aria-hidden="true"></i></h5>
	    <ul class="list-group list-group-flush" id="list-content">
		</ul>
	  </div>
	  <div id="paginationList">
		</div>
	</div>
</div>
@endsection
@section('script2')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://bilalakil.github.io/bin/simplepagination/js/jquery.simplePagination.js"></script>
<script type="text/javascript">
	
    firebase.database().ref('notification/web-notif').orderByChild('timestamp').on('value', function(snapshot) {
        // firebase.database().ref('notification/web-notif').limitToLast(10).on('child_added', function(snapshot) {
        snapshot_dump = snapshot.val().reverse();
        // snapshot_dump = snapshot.val()
        var notificationCountAll = 0;
        var notificationCountReal = [];
        for (i = snapshot_dump.length - 1; i > -1; i--) {
            notificationCountReal.push(i)
        }
        $("#list-content").empty()
        snapshot_dump.forEach(function(data,index){
            if(notificationCountAll < 10){
                if(data.to == "{{Auth::user()->email}}"){
                    if(data.status == "unread"){
                        addListUnRead(data,notificationCountReal[index])
                    }else if(data.status == "read"){
                    	addListRead(data,notificationCountReal[index])
                    }
                }
            }
        })

        var items = $("#list-content li");

	    var numItems = items.length;
	    var perPage = 10;

	    // Only show the first 2 (or first `per_page`) items initially.
	    items.slice(perPage).hide();

    // Now setup the pagination using the `#pagination` div.
    	$("#paginationList").pagination({
        items: numItems,
        itemsOnPage: perPage,
        cssStyle: "light-theme",

        // This is the actual page changing functionality.
        onPageClick: function(pageNumber) {
            // We need to show and hide `tr`s appropriately.
	            var showFrom = perPage * (pageNumber - 1);
	            var showTo = showFrom + perPage;
	            if (pageNumber == 1) {
	            	$(".title-pagination").html("Recent Notification <i class='fa fa-bell' aria-hidden='true'></i>")
	            }else{
	            	$(".title-pagination").html("Earlier Notification <i class='fa fa-bell' style='color:grey' aria-hidden='true'></i>")
	            }
	            console.log(pageNumber);

	            // We'll first hide everything...
	            items.hide()                 // ... and then only show the appropriate rows.
	                 .slice(showFrom, showTo).show();
	        }
	    });

    });

    function addListUnRead(data,index){
        var append = ""
        append = append + '<a href="' + "{{url('job/detail')}}/" + data.job + "#history" + data.history + '" onclick="readNotification(' + index + ')"><li class="list-group-item cursor-pointer" style="background-color: #3490dc;color: white"><i class="fa fa-envelope" aria-hidden="true"></i> '+ data.title +'<span class="float-right" style="font-size: 12px;text-align: center;align-content: center;">'+ moment(data.date_time,"X").fromNow()+'</span></li></a>'
        $("#list-content").append(append)

    }

    function addListRead(data,index){
        var append = ""
        append = append + '<a href="' + "{{url('job/detail')}}/" + data.job + "#history" + data.history + '"><li class="list-group-item cursor-pointer"><i class="fa fa-envelope-open-text" aria-hidden="true"></i> '+ data.title+'<span class="float-right" style="font-size: 12px;text-align: center;align-content: center;">'+ moment(data.date_time,"X").fromNow() +'</span></li></a>'
        $("#list-content").append(append)

    } 



    // function sendNotification(title,message,data,index) {

    //     if (Notification.permission !== 'granted')
    //         Notification.requestPermission();
    //     else {
    //         var notification = new Notification(title, {
    //             icon: 'https://image.flaticon.com/icons/svg/25/25643.svg',
    //             body: message,
    //         });
    //         notification.onclick = function() {
    //             window.open('http://stackoverflow.com/a/13328397/1269037');
    //         };
    //     }
    // }

    

    function readNotification(index){
        // console.log(index)
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

    function setNotificationShowed(key,data){
        // console.log('updated')
        // function setNotification(){
        firebase.database().ref('notification/web-notif/' + key).set({
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

</script>
@endsection






