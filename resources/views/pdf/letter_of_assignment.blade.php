<!DOCTYPE html>
<html>
<head>
	<title>Letter of Assignment</title>
	<style type="text/css">
		body {
			line-height: 1.2;
			font-size: small;
			font-family: Arial, Helvetica, sans-serif;
		}
		@page { margin: 50px 25px; }
		header { position: fixed; top: -60px; left: 0px; right: 0px; height: 50px; }
		footer { position: fixed; bottom: -10px; left: 0px; right: 0px; height: 50px; }
		.table_cover {
			background-image:url({{$data['footer']}});
			background-repeat: no-repeat;
		}
	</style>
</head>
<body>
	<header></header>
	<footer >
		<table style="width: 100%" class="table_cover">
			<tr>
				<td colspan="4" style="font: 11px;">
					<b style="color: #7f0f7e">PT. Sinergy Informasi Pratama</b>
				</td>
			</tr>
			<tr>
				<td style="width: 12%;font: 9px;">
					<b>Central Office</b>
				</td>
				<td style="width: 68%;font: 9px;">
					: Jl. Puri Kencana Blok K6 No.2M-2L, Kembangan, Jakarta Barat 11610
				</td>
				<td style="width: 5%;font: 9px;">
					Tel
				</td>
				<td style="width: 15%;font: 9px;">
					: +62 21 583 55599
				</td>
			</tr>
			<tr>
				<td style="width: 12%;font: 9px;">
					<b>Operational Office</b>
				</td>
				<td style="width: 68%;font: 9px;">
					: Gedung Inlingua Jl. Puri indah Kav. A2/3 No. 33-35, Puri Indah, Jakarta Barat 11610
				</td>
				<td style="width: 5%;font: 9px;">
					Fax
				</td>
				<td style="width: 15%;font: 9px;">
					: +62 21 583 55188
				</td>
			</tr>
			<tr>
				<td style="width: 12%;font: 9px;">
					<b>Branch Office</b>
				</td>
				<td style="width: 68%;font: 9px;">
					: Gedung Bank Sumsel Babel Lt. 1, Jl. Gubernur H.A Bastari No.7, Jakabaring, Palembang
				</td>
				<td style="width: 5%;font: 9px;">
					Email
				</td>
				<td style="width: 15%;font: 9px;">
					: info@sinergy.co.id
				</td>
			</tr>
			<tr>
				<td style="width: 10%;font: 10px;" colspan="2">
					<span style="color:white">.</span>
				</td>
				<td style="width: 5%;font: 9px;">
					Web
				</td>
				<td style="width: 15%;font: 9px;">
					: www.sinergy.co.id
				</td>
			</tr>
		</table>
	</footer>
	<!-- <footer>footer on each page</footer> -->
	<h1 style="text-align: center;">Letter of Assignment</h1>
	<h3 style="text-align: center;"><u>No : {{$data['no_letter']}}</u></h3>

	<p>This letter we issue addressed to the customer to allow work to be carried out properly by personnel who have met the requirements and we appoint below</p>
	<hr>
	<p>Person = an engineer who is dispatched to the location and assigned to do the work</p>
	<table style="width: 100%;">
		<tr>
			<td style="width: 20%;text-align: center;">
				<img style="width: 100px;height: 150px;" src="{{$data['engineer_photo']}}">
			</td>
			<td style="width: 40%">
				<table>
					<tr>
						<td><b>Full Name</b></td>
						<td> : </td>
						<td>{{$data['engineer_name']}}</td>
					</tr>
					<tr>
						<td><b>NIK</b></td>
						<td> : </td>
						<td>{{$data['engineer_nik']}}</td>
					</tr>
					<tr>
						<td><b>Address</b></td>
						<td> : </td>
						<td>{{$data['engineer_addres']}}</td>
					</tr>
				</table>
			</td>
			<td style="width: 40%">
				<table>
					<tr>
						<td style="color: #fff">.</td>
						<td style="color: #fff">.</td>
						<td style="color: #fff">.</td>
					</tr>
					<tr>
						<td><b>Place, Date of Birth</b></td>
						<td> : </td>
						<td>{{$data['engineer_place_of_birth']}}, {{$data['engineer_date_of_birth']}}</td>
					</tr>
					<tr>
						<td><b>Phone Number</b></td>
						<td> : </td>
						<td>{{$data['engineer_phone']}}</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<hr>
	<p>With the work we can describe as follows : </p>
	<table>
		<tr>
			<td><b>Job Title</b></td>
			<td>:</td>
			<td>{{$data['job_title']}}</td>
		</tr>
		<tr>
			<td><b>Job Category</b></td>
			<td>:</td>
			<td>{{$data['job_category']}}</td>
		</tr>
		<tr>
			<td><b>Job Location</b></td>
			<td>:</td>
			<td>{{$data['job_location']}}</td>
		</tr>
		<tr>
			<td><b>Job Address</b></td>
			<td>:</td>
			<td>{{$data['job_address']}}</td>
		</tr>
	</table>
	<table style="width: 100%">
		<tr>
			<td style="width: 50%"><b>Job Desciption</b></td>
			<td style="width: 50%"><b>Job Requirment</b></td>
		</tr>
		<tr>
			<td style="vertical-align: top;">
				<ul>
					@foreach($data['job_description'] as $description)
					<li>{{$description}}</li>
					@endforeach
				</ul>
			</td>
			<td style="vertical-align: top;">
				<ul>
					@foreach($data['job_requirment'] as $requirment)
					<li>{{$requirment}}</li>
					@endforeach
				</ul>
			</td>
		</tr>
	</table>
	<table style="width: 100%" >
		<tr >
			<td style="width: 50%"><b>Customer</b></td>
			<td style="width: 50%"><b>PIC (Person In Charge)</b></td>
		</tr>
		<tr>
			<td style="padding-left: 10px">
				<b>{{$data['job_customer']}}</b>
				<br>{{$data['job_customer_address']}}
			</td>
			<td style="padding-left: 10px">
				<b>{{$data['job_pic']}}</b>
				<br>{{$data['job_pic_phone']}}
				<br>{{$data['job_pic_email']}}
			</td>
		</tr>
	</table>
	<hr>
	<p>Furthermore, by signing this letter, we hope that the work can start immediately so that it can produce satisfying results.</p>
	<table style="width: 100%" >
		<tr>
			<td style="width: 50%">
				<div style="text-align: center">
					<img style="width: 50" src="{{$data['qr_file']}}">
					<br><i>for detail information</i>
				</div>
			</td>
			<td style="text-align:center; width: 50%">
				Moderator Dispatcher
				<br>
				<br>
				<br>
				<b><u>{{$data['moderator']}}</u></b><br>
				<b>PT. Sinergy Informasi Pratama</b>
			</td>
		</tr>
	</table>
</body>
</html>