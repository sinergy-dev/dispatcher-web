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
	}
	.text-warning2 {
		color: #ffc94a;
	}
	.btn-outline-warning:hover span {display:none}
	.btn-outline-warning:hover:before {
		content:"Accept";
		color:#212529;
		background-color:#38c172;
		border-color:#38c172;
	}
	.btn-outline-warning:hover {
		color: #212529;
		background-color: #38c172;
		border-color: #38c172;
	}
</style>
<main role="main">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="card flex-md-row mb-4 shadow-sm h-md-250">
					<div class="card-body d-flex flex-column align-items-start">
						<strong class="d-inline-block mb-2 text-default">Total Jobs</strong>
						<h3 class="mb-0">
							<a class="text-dark" href="#">100</a>
						</h3>
						<a href="#">See All</a> 
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card flex-md-row mb-4 shadow-sm h-md-250">
					<div class="card-body d-flex flex-column align-items-start">
						<strong class="d-inline-block mb-2 text-primary">Jobs picked</strong>
						<h3 class="mb-0">
							<a class="text-dark" href="#">40</a>
						</h3>
						<!-- <div class="mb-1 text-muted">Nov 12</div>
						<p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>-->
						<a href="#">See All</a> 
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card flex-md-row mb-4 shadow-sm h-md-250">
					<div class="card-body d-flex flex-column align-items-start">
						<strong class="d-inline-block mb-2 text-success">Job done</strong>
						<h3 class="mb-0">
							<a class="text-dark" href="#">40</a>
						</h3>
						<a href="#">See All</a> 
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card flex-md-row mb-4 shadow-sm h-md-250">
					<div class="card-body d-flex flex-column align-items-start">
						<strong class="d-inline-block mb-2 text-danger">Job On Progress</strong>
						<h3 class="mb-0">
							<a class="text-dark" href="#">20</a>
						</h3>
						<!-- <div class="mb-1 text-muted">Nov 12</div>
						<p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>-->
						<a href="#">See All</a> 
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title border-bottom">Job Detail</h5>
						<div class="card-text">
							<div class="row">
								<div class="col-md-6 d-flex flex-column align-items-start">
									<strong class="d-inline-block text-primary" id="jobSumaryDetailCustomer">PT. Sinergy Informasi Pratama</strong>
									<h2 class="mb-2" id="jobSumaryDetailTitle">
										Create Internal Software
									</h2>
									<span class="badge badge-secondary">On Progress</span>
								</div>
								<div class="col-md-6">
									<p>
										<span id="jobSumaryDetailAddress"><i class="fas fa-building"></i> Head Quarter - PT. Sinergy Informasi Pratama </span><br>
										<span id="jobSumaryDetailLocation"><i class="fas fa-map-marker"></i> Kembangan - Jakarta Barat - Jakarta </span><br>
										<span id="jobSumaryDetailLevel"><i class="fas fa-signal"></i> Level 3 </span><br>
										<span id="jobSumaryDetailDuration"><i class="fas fa-calendar-alt"></i> 1 Desember - 21 Desember 2020 </span><br>
									</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<h5>Job Description</h5>
									<p id="jobSumaryDetailDescription">
										- Developing a highly concurent and distrubed system<br>
										- Performance Optimazitation and problem diagnosis<br>
										- Designing/Developint for high-availability<br>
										- Designing/Developing and testing new features<br>
										- Estimating the effort requeired to develop and implement<br>
										- Help define coding standrads and develpo process<br>
										- Willing to learn & adapt different technologies<br>
										- Create internal software<br>
									</p>
								</div>
								<div class="col-md-6">
									<h5>Job Requirement</h5>
									<p id="jobSumaryDetailRequirement">
										- Developing a highly concurent and distrubed system<br>
										- Performance Optimazitation and problem diagnosis<br>
										- Designing/Developint for high-availability<br>
										- Designing/Developing and testing new features<br>
										- Estimating the effort requeired to develop and implement<br>
										- Help define coding standrads and develpo process<br>
										- Willing to learn & adapt different technologies<br>
										- Create internal software<br>
									</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-8">
									<h5>Apply Engineer</h5>
									<div class="row" id="jobSumaryDetailApplyer"></div>
								</div>
								<div class="col-md-4">
									<h5>Controll Jobs</h5>
									<button href="#" class="btn btn-secondary flex-row-reverse ml-auto" id="jobSumaryDetailReview" onclick="reviewJob()" disabled>Review Job</button>
									<button href="#" class="btn btn-primary flex-row-reverse ml-auto" id="jobSumaryDetailFinish" onclick="finishJob()" disabled>Finish Jobs</button>
									<button href="#" class="btn btn-success flex-row-reverse ml-auto" id="jobSumaryDetailPay" onclick="payJob()" disabled>Pay Jobs</button>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<h5 style="margin-top: 8px">Progress</h5>
									<ul class="list-group list-group-flush" id="jobSumaryDetailProgress">
										<li class="list-group-item">05 February - 16:28 [Alam] - Moderator Open Job</li>
										<li class="list-group-item">05 February - 16:28 [Alam] - Teddy Apply job</li>
										<li class="list-group-item">05 February - 16:28 [Alam] - Moderator accept Teddy Apply</li>
										<li class="list-group-item">05 February - 16:28 [Alam] - Teddy Start Job</li>
										<li class="list-group-item">05 February - 16:28 [Alam] - Update Day 1 - Pengerjaan berjalan dengan lancar d...</li>
										<li class="list-group-item">05 February - 16:28 [Alam] - Update Day 2 - Downtime telah dilaksanakan didampi...</li>
										<li class="list-group-item">05 February - 16:28 [Alam] - Update Day 3 - Pekerjaan telah di evealuasi pribad...</li>
										<li class="list-group-item">05 February - 16:28 [Alam] - Finish jobs and send report</li>
										<li class="list-group-item">05 February - 16:28 [Alam] - Jobs has been reviewed</li>
										<li class="list-group-item">05 February - 16:28 [Alam] - Jobs has beed confirm by customer</li>
										<li class="list-group-item">05 February - 16:28 [Alam] - Moderator make payment for teddy job</li>
										<li class="list-group-item">05 February - 16:28 [Alam] - Teddy Confirm payment has beed recived</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- <div class="card-footer">
							<a href="#" class="btn btn-secondary flex-row-reverse ml-auto" id="jobSumaryDetailReview" onclick="reviewJob()">Review Job</a>
							<a href="#" class="btn btn-primary flex-row-reverse ml-auto" id="jobSumaryDetailFinish" onclick="finishJob()">Finish Jobs</a>
							<a href="#" class="btn btn-success flex-row-reverse ml-auto" id="jobSumaryDetailPay" onclick="payJob()">Pay Jobs</a>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<div class="modal fade" id="reviewJobModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Review Job</h5>
			</div>
			<div class="modal-body">
				<div class="form-check">
					<input type="checkbox" class="form-check-input">
					<label class="form-check-label">Menjalankan prosedur yang sudah di berikan sebelumnya</label>
				</div>
				<div class="form-check">
					<input type="checkbox" class="form-check-input">
					<label class="form-check-label">Memastikan apa yang sudah ada pada permintaan</label>
				</div>
				<div class="form-check">
					<input type="checkbox" class="form-check-input">
					<label class="form-check-label">Memeriksa hasil pekerjaan bersama customer</label>
				</div>
				<div class="form-check">
					<input type="checkbox" class="form-check-input">
					<label class="form-check-label">Mendapat persetujuan untuk melakukan pemasangan</label>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" onclick="reviewJob('done')">Mark As Review</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="finishJobModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Finish Job</h5>
			</div>
			<div class="modal-body">
				<div class="form-check">
					<input type="checkbox" class="form-check-input">
					<label class="form-check-label">Customer telah memastikan bahwa pekerjaan selesai</label>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" onclick="finishJob('done')">Mark As Finish</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="payJobModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Pay Job</h5>
			</div>
			<form method="POST" action="{{env('API_LINK_CUSTOM')}}/job/postPayedByModeratorInvoice" enctype="multipart/form-data" id="invoiceForm">
				<div class="modal-body">
					<div class="tab" style="display: none">
						<h5>Adjust Final Price</h5>
						<input type="text" data-type="currency" id="payJobPrice">
					</div>
					<div class="tab" style="display: none">
						<h5>Payment Info</h5>
						<div class="mb-3">
							<label for="jobTitle">Name Reciver</label>
							<input type="text" class="form-control" id="payJobInfoName" value="Rama Agastya" readonly="">
						</div>
						<div class="mb-3">
							<label for="jobTitle">Bank Account</label>
							<input type="text" class="form-control" id="payJobInfoBank" value="Bank Central Asia Tbk." readonly="">
						</div>
						<div class="mb-3">
							<label for="jobTitle">No. Account</label>
							<input type="text" class="form-control" id="payJobInfoAccount" value="1290386910" readonly="">
						</div>
					</div>
					<div class="tab" style="display: none">
				 		<h5>Upload Payment Info</h5>
						<div class="mb-3">
							<label for="jobTitle">Invoice Info</label>
							<div class="custom-file">
								<input type="hidden" class="custom-file-input" name="id_payment" id="payJobInfoID">
								<input type="hidden" class="custom-file-input" name="id_moderator" id="payJobInfoModerator">
								<input type="file" class="custom-file-input" name="invoice" id="payJobInfoInvoice" required>
								<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
								<!-- <div class="invalid-feedback">Example invalid custom file feedback</div> -->
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="mr-auto">
						<span class="step" style="display: none;">1. Adjust Final Price</span>
						<span class="step" style="display: none;">2. Payment Info</span>
						<span class="step" style="display: none;">3. Upload Payment</span>
					</div>
					<button type="button" class="btn btn-secondary" id="prevBtn" onclick="nextPrev(-1)">Back</button>
					<button type="button" class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)">Next</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script type="text/javascript" src="https://getbootstrap.com/docs/4.1/assets/js/vendor/holder.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script type="text/javascript">
	// Jquery Dependency

	$(document).ready(function(){
		var id_job = window.location.href.split("/")[5].replace('#','').split("h")[0]
		$.ajax({
			type:"GET",
			url:"{{env('API_LINK_CUSTOM')}}/job/getJobProgress",
			data:{
				id_job:id_job
			},
			success: function(result){
				$("#jobSumaryDetailCustomer").html(result.job.customer.customer_name)
				$("#jobSumaryDetailTitle").html(result.job.job_name)
				$("#jobSumaryDetailLocation").html('<i class="fas fa-map-marker"></i> ' + result.job.location.long_location)
				$("#jobSumaryDetailAddress").html('<i class="fas fa-building"></i> ' + result.job.job_location)
				$("#jobSumaryDetailLevel").html('<i class="fas fa-signal"></i> ' + result.job.level.level_name + " - " + result.job.level.level_description)
				$("#jobSumaryDetailDuration").html('<i class="fas fa-calendar-alt"></i> ' + moment(result.job.date_start).format("DD MMMM") + " - " + moment(result.job.date_end))
				$("#jobSumaryDetailDescription").html(result.job.job_description.replace(/(?:\r\n|\r|\n)/g, '<br>'))
				$("#jobSumaryDetailRequirement").html(result.job.job_requrment.replace(/(?:\r\n|\r|\n)/g, '<br>'))
				var append = ""
				$("#jobSumaryDetailProgress").html("")
				$.each(result.progress,function(index,value){
					if(index == 0){
						// console.log(value['id_activity'])
						if(value['id_activity'] == "6"){
							$("#jobSumaryDetailReview").attr("disabled", false);
						} else if(value['id_activity'] == "7"){
							$("#jobSumaryDetailFinish").attr("disabled", false);
						} else if(value['id_activity'] == "8"){
							$("#jobSumaryDetailPay").attr("disabled", false);
						}
						append = append + '<li class="active list-group-item" id="history' + value['id'] + '">' + moment(value['date_time']).format('DD MMMM - HH:mm') + " [" + value['user']['name'] + "] - " + value['detail_activity'] + "</li>"
					} else {
						append = append + '<li class="list-group-item" id="history' + value['id'] + '">' + moment(value['date_time']).format('DD MMMM - HH:mm') + " [" + value['user']['name'] + "] - " + value['detail_activity'] + "</li>"
					}
				});
				$("#jobSumaryDetailProgress").append(append)
				// $("#jobSumaryDetailButton").html()
			}
		})

		$('.btn-outline-warning').on('click',function(){
			console.log('click')
			// $(this).text("Accept")
		});

		$.ajax({
			type:"GET",
			url:"{{env('API_LINK_CUSTOM')}}/job/getJopApplyer",
			data:{
				id_job:id_job
			},
			success: function (result){
				if(result.applyer.length == 0){
					console.log('empty')
					console.log(result.applyer.length)
				} else {
					var append = ""
					var append2 = ""

					$.each(result.applyer, function(index,value){
						if(value['status'] == "Accept"){
							var statusText = '<span>' + value['status'] + '</span>'
							var statusButton = 'btn-outline-success'
							var onclick = ''
							var statusDisable = 'disabled'
						} else if (value['status'] == "Reject"){
							var statusText = '<span>' + value['status'] + '</span>'
							var statusButton = 'btn-outline-danger'
							var onclick = ''
							var statusDisable = 'disabled'
						} else {
							var statusText = '<span>' + value['status'] + '</span>'
							var statusButton = 'btn-outline-warning'
							var tmp = "'" + value['user']['name'] + "'"
							var onclick = 'updateApplyer(' + value['user']['id'] + ',' + tmp + ')'
							var statusDisable = ''

						}
						console.log(value['user']['name'])

						append = append + '<div class="col-md-6" style="margin-bottom: 10px;">'
						append = append + 	'<div class="card">'
						append = append + 		'<div class="card-body">'
						append = append + 			'<strong class="text-default">Level 1</strong>'
						append = append + 			'<h3 class="mb-0">'
						append = append + 				'<a class="text-dark" href="#">' + value['user']['name'] + '</a>'
						append = append + 			'</h3>'
						append = append + 			'<button type="button" class="btn-apply-job btn  btn-sm ' + statusButton + ' float-right" onclick="' + onclick + '" ' + statusDisable + '>' + statusText + '</button>' 
						// append = append + 			'<span class="text-' + statusText + '">' + value['status'] + '</span> '
						append = append + 		'</div>'
						append = append + 	'</div>'
						append = append + '</div>'
					})
					// $("#jobSumaryDetailApplyer").append(append)
					$("#jobSumaryDetailApplyer").append(append)
				}
			}
		})

		$("#payJobInfoInvoice").on('change',function(){
			$("#nextBtn").attr('onclick','payJobFinal()');
		})

		$("input[data-type='currency']").on({
			keyup: function() {
				formatCurrency($(this));
			},
			blur: function() { 
				formatCurrency($(this), "blur");
			}
		});

	})

	function updateApplyer(id_engineer,name_engineer){
		Swal.fire({
			title: 'Are you sure?',
			text: "to assign this job to " + name_engineer,
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes',
			cancelButtonText: 'No',
		}).then((result) => {
			if (result.value) {
				Swal.fire({
					title: 'Please Wait..!',
					text: "It's sending..",
					allowOutsideClick: false,
					allowEscapeKey: false,
					allowEnterKey: false,
					customClass: {
						popup: 'border-radius-0',
					},
					onOpen: () => {
						Swal.showLoading()
					}
				})
				$.ajax({
					type:"POST",
					url:"{{env('API_LINK_CUSTOM')}}/job/postApplyerUpdate",
					data:{
						id_engineer:id_engineer,
						id_job:window.location.href.split("/")[5].replace('#','').split("h")[0],
						id_moderator:"{{Auth::user()->id}}"
					},
					success: function (result){
						Swal.showLoading()
						Swal.fire(
							'Assigned!',
							'Job has been Assigned to ' + name_engineer + ' and letter assignment can be access by engineer',
							'success'
						).then((result) => {
							if (result.value) {
								location.reload()
							}
						})
					}
				})
				$.ajax({
					type:"GET",
					url:"{{url('/job/detail/createLetterAndQR')}}"
				})
			}
		})
	}

	function payJob(){
		$.ajax({
			type:"GET",
			url:"{{env('API_LINK_CUSTOM')}}/job/getJobOpen",
			data:{
				id_job:window.location.href.split("/")[5].replace('#','').split("h")[0]
			},
			success: function(result){
				$("#payJobPrice").val(result.job.job_price)
				var currentTab = 0;
				showTab(currentTab);
				$("#payJobModal").modal('toggle')
			}
		})

		
		// alert('pay')
	}

	function payJobFirst(){
		$.ajax({
			type:"POST",
			url:"{{env('API_LINK_CUSTOM')}}/job/postPayedByModeratorFirst",
			data:{
				id_job:window.location.href.split("/")[5].replace('#','').split("h")[0],
				id_moderator:"{{Auth::user()->id}}",
				nominal:$("#payJobPrice").val().replace("$","").replace(",","").replace(".","")
			},
			success: function(result){
				$("#payJobInfoName").val(result.account[0].user.name)
				$("#payJobInfoBank").val(result.account[0].account_name)
				$("#payJobInfoAccount").val(result.account[0].account_number)
				$("#payJobInfoID").val(result)
				$("#payJobInfoModerator").val("{{Auth::user()->id}}")
			}
		})
	}

	function payJobSecond(){
		$.ajax({
			type:"POST",
			url:"{{env('API_LINK_CUSTOM')}}/job/postPayedByModeratorSecond",
			data:{
				id_job:window.location.href.split("/")[5].replace('#','').split("h")[0],
				id_moderator:"{{Auth::user()->id}}",
				nominal:$("#payJobPrice").val().replace("$","").replace(",","").replace(".","")
			},
			success: function(result){
			// 	$("#payJobInfoName").val(result.account[0].user.name)
			// 	$("#payJobInfoBank").val(result.account[0].account_name)
			// 	$("#payJobInfoAccount").val(result.account[0].account_number)
				$("#payJobInfoID").val(result)
			// 	$("#payJobInfoModerator").val("{{Auth::user()->id}}")
			}
		})
	}

	function payJobFinal2(){
		var fd = new FormData();
        var files = $('#payJobInfoInvoice')[0].files[0];
        fd.append('invoice',files);

		$.ajax({
			type:"POST",
			url:"{{env('API_LINK_CUSTOM')}}/job/postPayedByModeratorInvoice",
			data:fd,
			contentType: false,
            processData: false,
		})
	}

	function finishJob(status = "not yet"){
		$("#finishJobModal").modal('toggle')
		if(status == "done"){
			$.ajax({
				type:"POST",
				url:"{{env('API_LINK_CUSTOM')}}/job/postFinishedByModerator",
				data:{
					id_job:window.location.href.split("/")[5].replace('#','').split("h")[0],
					id_moderator:"{{Auth::user()->id}}",
				}, 
				success: function(result){
					// Swal.showLoading()
					Swal.fire(
						'Complete!',
						'Job has been Full Complete',
						'success'
					).then((result) => {
						if (result.value) {
							location.reload(); 

							// $("#payJobModal").modal('toggle')
						}
					})
				}
			})
		} else {
			$("#finishJobModal").modal('toggle')
		}
	}

	function reviewJob(status = "not yet"){
		if(status == "done"){
			$.ajax({
				type:"POST",
				url:"{{env('API_LINK_CUSTOM')}}/job/postReviewedByModerator",
				data:{
					id_job:window.location.href.split("/")[5].replace('#','').split("h")[0],
					id_moderator:"{{Auth::user()->id}}"
				}, 
				success: function(result){
					Swal.fire(
						'Reviewed!',
						'Job has been Reviewd.',
						'success'
					).then((result) => {
						if (result.value) {
							$("#reviewJobModal").modal('toggle')
							location.reload(); 
							
							// $("#payJobModal").modal('toggle')
						}
					})
				}
			})
		} else {
			$("#reviewJobModal").modal('toggle')
		}
	}

	function showSumary(id){
		$.ajax({
			type:"GET",
			url:"{{env('API_LINK_CUSTOM')}}/job/getJobOpen",
			data:{
				id_job:id
			},
			success: function(result){
				console.log(result.job.customer.customer_name)

				$("#jobSumaryDetailCustomer").html(result.job.customer.customer_name)
				$("#jobSumaryDetailTitle").html(result.job.job_name)
				$("#jobSumaryDetailDescription").html(result.job.job_description.replace(/(?:\r\n|\r|\n)/g, '<br>'))
				$("#jobSumaryDetailRequirement").html(result.job.job_requrment.replace(/(?:\r\n|\r|\n)/g, '<br>'))
				$("#jobSumaryDetailAddress").html('<i class="fas fa-building"></i> ' + result.job.job_location)
				$("#jobSumaryDetailLocation").html('<i class="fas fa-map-marker"></i> ' + result.job.location.long_location)
				$("#jobSumaryDetailLevel").html('<i class="fas fa-signal"></i> ' + result.job.level.level_name + " - " + result.job.level.level_description)
				$("#jobSumaryDetailDuration").html('<i class="fas fa-calendar-alt"></i> ' + moment(result.job.date_start).format("DD MMMM") + " - " + moment(result.job.date_end))
				
				$("#jobSumaryDetailButton").attr('href','{{url("job/detail/")}}/' + result.job.id)

				$("#jobSumaryDetail").show()
			}
		});
	}

	function showAddPIC(){
		$("#pic").attr("disabled","true")
		$("#addPICField").show()

	}

	// function finalize(){
	// 	var splited = $("#inputJobRangeDate").val().split(' - ');
	// 	$.ajax({
	// 		url: "{{env('API_LINK_CUSTOM')}}/job/createJob/getParameterFinalize",
	// 		data: {
	// 			id_location:$("#inputJobLocation").select2("data")[0].id,
	// 			id_pic:$("#inputJobPic").select2("data")[0].id,
	// 			id_category:$("#inputJobCategory").select2("data")[0].id
	// 		},
	// 		success: function(result){
	// 			$("#finaliseClient").html($("#inputJobClient").select2("data")[0].text)
	// 			$("#finaliseLocation").html(result.location)
	// 			$("#finalisePic").html(result.pic)
	// 			$("#finalisePicEmail").html(result.pic_email)
	// 			$("#finaliseJobTitle").html($("#inputJobTitle").val())
	// 			$("#finaliseJobCategory").html('<i class="fas fa-hard-hat"></i> ' + result.category)
	// 			$("#finaliseJobLevel").html('<i class="fas fa-signal"></i> ' + $("#inputJobLevel").select2('data')[0].text)
	// 			$("#finaliseJobDuration").html(moment(splited[0],"DD/MM/YYYY").format("DD MMMM") + " - " + moment(splited[1],"DD/MM/YYYY").format("DD MMMM YYYY"))
	// 			$("#finaliseJobDescription").html("<h4>Job Description</h4>" + $("#inputJobDescription").val())
	// 			$("#finaliseJobRequirement").html("<h4>Job Requirement</h4>" + $("#inputJobRequirement").val())
	// 			$("#finaliseJobAddress").html('<h4>Job Address</h4>' + $("#inputJobAddress").val())
	// 			$("#finaliseJobPrice").html($("#inputJobPriceBase").val())
	// 		}
	// 	})
	// }

	function payJobFinal(){
		Swal.fire({
			title: 'Are you sure?',
			text: "to finish this job",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes',
			cancelButtonText: 'No',
		}).then((result) => {
			if (result.value) {
				Swal.fire({
					title: 'Please Wait..!',
					text: "It's sending..",
					allowOutsideClick: false,
					allowEscapeKey: false,
					allowEnterKey: false,
					customClass: {
						popup: 'border-radius-0',
					},
					onOpen: () => {
						Swal.showLoading()
					}
				})
				var fd = new FormData();
				var files = $('#payJobInfoInvoice')[0].files[0];
				fd.append('invoice',files);
				fd.append('id_payment',$("#payJobInfoID").val());
				fd.append('id_job',window.location.href.split("/")[5].replace('#','').split("h")[0]);
				fd.append('id_moderator',"{{Auth::user()->id}}");
				

				$.ajax({
					type:"POST",
					url:"{{env('API_LINK_CUSTOM')}}/job/postPayedByModeratorInvoice",
					data:fd,
					contentType: false,
					processData: false,
					success: function (result){
						Swal.showLoading()
						Swal.fire(
							'Paid!',
							'Job has been Paid.',
							'success'
						).then((result) => {
							if (result.value) {
								location.reload()
								$("#payJobModal").modal('toggle')
							}
						})
					}
				})
			}
		})
	}

	var currentTab = 0;

	function showTab(n) {
		var x = document.getElementsByClassName("tab");
		var y = document.getElementsByClassName("step");
		x[n].style.display = "inline";
		y[n].style.display = "inline";
		if (n == 0) {
			document.getElementById("prevBtn").style.display = "none";
		} else {
			document.getElementById("prevBtn").style.display = "inline";
		}
		if (n == (x.length - 1)) {
			// finalize()
			document.getElementById("nextBtn").innerHTML = "Done";
			$(".modal-dialog").addClass("modal-lg");
			payJobSecond()
			// $("#nextBtn").attr('onclick','payJobFinal()');
			// $("#nextBtn").attr('type','submit');
		} else if (n == 1){
			payJobFirst()
		} else {
			$("#nextBtn").attr('onclick','nextPrev(1)');
			$("#nextBtn").attr('type','button');
			$(".modal-dialog").removeClass("modal-lg");
			document.getElementById("nextBtn").innerHTML = "Next";
		}
	}

	function nextPrev(n) {
		var x = document.getElementsByClassName("tab");
		var y = document.getElementsByClassName("step");
		// if (n == 1 && !validateForm()) return false;
		x[currentTab].style.display = "none";
		y[currentTab].style.display = "none";
		currentTab = currentTab + n;
		if (currentTab >= x.length) {
			$("#exampleModalCenter").modal('hide');
			x[n].style.display = "none";
			currentTab = 0;
			// document.getElementById("regForm").submit();
			// return false;
		}
		showTab(currentTab);
	}

	function formatNumber(n) {
		return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
	}


	function formatCurrency(input, blur) {
		var input_val = input.val();
		if (input_val === "") { return; }
		var original_len = input_val.length;
		var caret_pos = input.prop("selectionStart");
		if (input_val.indexOf(".") >= 0) {
			var decimal_pos = input_val.indexOf(".");
			var left_side = input_val.substring(0, decimal_pos);
			var right_side = input_val.substring(decimal_pos);
			left_side = formatNumber(left_side);
			right_side = formatNumber(right_side);
			if (blur === "blur") {
				right_side += "00";
			}
			right_side = right_side.substring(0, 2);
			input_val = "$" + left_side + "." + right_side;
		} else {
			input_val = formatNumber(input_val);
			input_val = "$" + input_val;
			if (blur === "blur") {
				input_val += ".00";
			}
		}
		
		input.val(input_val);

		var updated_len = input_val.length;
		caret_pos = updated_len - original_len + caret_pos;
		input[0].setSelectionRange(caret_pos, caret_pos);
	}

</script>

@endsection
