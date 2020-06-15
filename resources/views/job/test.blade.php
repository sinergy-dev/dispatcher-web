<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>
<body onload="initFirebase()">
	<h1>Hahahaha</h1>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://www.gstatic.com/firebasejs/7.15.0/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/7.15.0/firebase-analytics.js"></script>
	<script src="https://www.gstatic.com/firebasejs/7.15.0/firebase-database.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			
		})

		var firebaseConfig = {
			apiKey: "{{env('FIREBASE_APIKEY')}}",
			authDomain: "{{env('FIREBASE_AUTHDOMAIN')}}",
			databaseURL: "{{env('FIREBASE_DATABASEURL')}}",
			projectId: "{{env('FIREBASE_PROJECTID')}}",
			storageBucket: "{{env('FIREBASE_STOREBUCKET')}}",
			messagingSenderId: "{{env('FIREBASE_MESSAGINGSENDERID')}}",
			appId: "{{env('FIREBASE_APPID')}}",
		};
		// Initialize Firebase
		firebase.initializeApp(firebaseConfig);

		console.log(firebase)

		// var snapshot_dump;

		firebase.database().ref('notification/web-notification').on('value', function(snapshot) {
			snapshot_dump = snapshot.val()
			snapshot_dump.forEach(function(data,index){
				if(data.status == "unread"){
					console.log(data.date_time)
					sendNotification(data.title,data.message)

				}
			})
			// console.log(snapshot.val());

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


		function initFirebase(){
			console.log('init')
			// testFirebase()
		}

		// function testFirebase(){
		// 	var firebaseConfig = {
		// 		apiKey: "{{env('FIREBASE_APIKEY')}}",
		// 		authDomain: "{{env('FIREBASE_AUTHDOMAIN')}}",
		// 		databaseURL: "{{env('FIREBASE_DATABASEURL')}}",
		// 		projectId: "{{env('FIREBASE_PROJECTID')}}",
		// 		storageBucket: "{{env('FIREBASE_STOREBUCKET')}}",
		// 		messagingSenderId: "{{env('FIREBASE_MESSAGINGSENDERID')}}",
		// 		appId: "{{env('FIREBASE_APPID')}}",
		// 	};
		// 	// Initialize Firebase
		// 	firebase.initializeApp(firebaseConfig);

		// 	firebase.database().ref('page/chart').on('value', function(snapshot) {
		// 		console.log(snapshot);
		// 		// updateLastest(snapshot.val())
		// 	});
		// }

		function notifyMe() {
			if (Notification.permission !== 'granted')
				Notification.requestPermission();
			else {
				var notification = new Notification('Notification title', {
					icon: 'https://image.flaticon.com/icons/svg/25/25643.svg',
					body: 'Hey there! You\'ve been notified!',
				});
				notification.onclick = function() {
					window.open('http://stackoverflow.com/a/13328397/1269037');
				};
			}
		}
	</script>
</body>
</html>