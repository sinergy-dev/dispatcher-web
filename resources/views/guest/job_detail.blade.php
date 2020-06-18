@extends('layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap4-select2-theme@1.0.3/src/css/bootstrap4-select2-theme.css" rel="stylesheet" /> -->
<link href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<style type="text/css">
	.step {
		display: none;
	}
	.step.active {
		display: inline;
	}
	.step.finish {
		background-color: #4CAF50;
	}.
</style>
<main role="main">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10" id="jobSumaryHolder">
				<div class="card">
					<div class="row">
						<div class="col-md-7">
							<div class="card-body d-flex flex-column align-items-start">
								<h5 class="card-title border-bottom">Job Sumary</h5>
								<div class="card-text">
									<strong class="d-inline-block text-primary" id="jobSumaryHolderCustomer">{{$data['customer']}}</strong>
									<h2 class="mb-2" id="jobSumaryHolderTitle">
										{{$data['job_name']}}
									</h2>
									<h5>Job Description</h5>
									<p id="jobSumaryHolderDescription">
										{!! $data['job_description'] !!}
									</p>
									<h5>Job Requirement</h5>
									<p id="jobSumaryHolderRequirement">
										{!! $data['job_requrment'] !!}
									</p>
									<p>
										<span id="jobSumaryHolderAddress"><i class="fas fa-building"></i> {{$data['job_location']}}</span><br>
										<span id="jobSumaryHolderLocation"><i class="fas fa-map-marker"></i> {{$data['job_long_location']}}</span><br>
										<span id="jobSumaryHolderLevel"><i class="fas fa-signal"></i> {{$data['job_level']}}</span><br>
										<span id="jobSumaryHolderDuration"><i class="fas fa-calendar-alt"></i> {{$data['job_range']}}</span><br>
									</p>
								</div>
							</div>
						</div>
						<div class="col-md-5">
							<div style="text-align: center;" class="card-body d-flex flex-column justify-content-center">
								<h5 class="card-title border-bottom">Engineer Assign</h5>
								<div class="card-text">
									<img class="mb-2" style="width: 150px;height: 220px;" src="{{$data['engineer_photo']}}">
									<h2 class="mb-2" id="jobSumaryHolderTitle">
										{{$data['engineer_name']}}
									</h2>
									<h5 class="mb-2">NIK : {{$data['engineer_nik']}}</h5>
									<p style="text-align: left" id="jobSumaryHolderDescription">
										<b>Address :</b>  <br>
										{{$data['engineer_addres']}}
									</p>
									<p style="text-align: left" id="jobSumaryHolderDescription">
										<b>Pleace, Date of Birth :</b>  <br>
										{{$data['engineer_place_of_birth']}}, {{$data['engineer_date_of_birth']}}
									</p>
									<p style="text-align: left" id="jobSumaryHolderDescription">
										<b>Contact :</b>  <br>
										Phone : {{$data['engineer_phone']}}<br>
										Email : {{$data['engineer_email']}}
									</p>
									<hr>
									<p style="text-align: left" id="jobSumaryHolderDescription">
										<b>Engineer Level :</b>  <br>
										{{$data['engineer_level']}}
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script type="text/javascript" src="https://getbootstrap.com/docs/4.1/assets/js/vendor/holder.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@endsection
