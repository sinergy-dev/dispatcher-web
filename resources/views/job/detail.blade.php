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
	.btn-outline-warning-custom:hover span {display:none}
	.btn-outline-warning-custom:hover:before {
		content:"Accept";
		color:#212529;
		background-color:#38c172;
		border-color:#38c172;
	}
	.btn-outline-warning-custom:hover {
		color: #212529;
		background-color: #38c172;
		border-color: #38c172;
	}

	.img_req{
		cursor: zoom-in;
	}

	.modal{
		overflow: auto !important;
	}

	.scrolly{
	  /*background-color: #eaeaea;*/
	  /*display: block;*/
	  height: 500px;
	  overflow-y: scroll;
	  scroll-behavior: smooth;
	  /*text-align: center;*/
	  margin-bottom: 10px;
	}

	.textChat::-webkit-scrollbar {
	  width:1px;
	}

	.textChat::-webkit-scrollbar * {
	  background:transparent;
	}

	.scrolly::-webkit-scrollbar {
	  width:1px;
	}
	.scrolly::-webkit-scrollbar * {
	  background:transparent;
	}

	.float-right{
		float: right!important;
		padding: 5px;
		max-width: 300px;
		text-align: left;
	}

	.float-left{
		float: left!important;
		padding: 5px;
		max-width: 300px;
		text-align: left;
	}

	.pull-left{
		float: left!important;
	}

	.bubleChat {
		/*padding: 5px;*/
		/*max-width: 300px;*/
		max-width: 100%;
		/*border:solid 1px black;*/
		margin: 2.5px;
		/*padding: 5px;*/
	}

	.bubleChatItem {
		border-radius: 7.5px;
		max-width: 300px;
		padding: 5px;
	}

	.bubleChatModerator{
		background-color: yellow!important;
		border:solid 1px black;
	}

	.bubleChatEngineer{
		background-color: lightblue!important;
		border:solid 1px black;
	}

	.bubleChatDate {
		background-color: #eee !important;
		font-size: 10px;
		padding-top: 2.5px;
		padding-bottom: 2.5px;
		border: none;
	}

	.bubleSub{
		margin-top:auto;
		margin-bottom:10px;
		padding-left:5px
	}

	.mycustom{
		border:solid 2px black;
		/*border-radius: 1px;*/
	}

	/*    .mycustom input[type=text] {
	border: none;
	width: 100%;
	padding-right: 123px;

	}*/

	.mycustom textarea {
	border: none;
	width: 100%;
	padding-right: 90px;

	}

	.mycustom .input-group-prepend {
	position: absolute;
	right: 4px;
	top: 4px;
	bottom: 4px;z-index:9;
	}

	.boxChat{
		width:100%;
		height:500px;
		max-height:100%;
	}

	.dot-flashing {
	  position: relative;
	  width: 6px;
      height: 6px;
	  border-radius: 5px;
	  background-color: #9880ff;
	  color: #9880ff;
	  animation: dotFlashing 1s infinite linear alternate;
	  animation-delay: .5s;
	}

	.dot-flashing::before, .dot-flashing::after {
	  content: '';
	  display: inline-block;
	  position: absolute;
	  top: 0;
	}

	.dot-flashing::before {
	  left: -11px;
	  width: 6px;
	  height: 6px;
	  border-radius: 5px;
	  background-color: #9880ff;
	  color: #9880ff;
	  animation: dotFlashing 1s infinite alternate;
	  animation-delay: 0s;
	}

	.dot-flashing::after {
	  left: 11px;
	  width: 6px;
      height: 6px;
	  border-radius: 5px;
	  background-color: #9880ff;
	  color: #9880ff;
	  animation: dotFlashing 1s infinite alternate;
	  animation-delay: 1s;
	}

	@keyframes dotFlashing {
	  0% {
	    background-color: #9880ff;
	  }
	  50%,
	  100% {
	    background-color: #ebe6ff;
	  }
	}

	.button {
	    border: none;
	    margin-top: 40px;
	    margin-left: 40px;
	    position: relative;
	    box-shadow: 0 2px 5px rgba(0,0,0,0.4);
	}

	.button:before {
	    content: attr(data-count);
	    width: 18px;
	    height: 18px;
	    line-height: 18px;
	    text-align: center;
	    display: block;
	    border-radius: 50%;
	    background: rgb(67, 151, 232);
	    border: 1px solid #FFF;
	    box-shadow: 0 1px 3px rgba(0,0,0,0.4);
	    color: #FFF;
	    position: absolute;
	    top: -7px;
	    left: -7px;
	}

	.button.badge-top-right:before {
	    left: auto;
	    right: -7px;
	}

	/*input{
		font-family: 'FontAwesome';
	}*/
	
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
									<div class="d-inline-block">
										<span id="statusShowSummary"></span>
										<span class="d-inline-block" id="priorityShowSummary"></span>
									</div>
									<!-- <span class="badge badge-secondary" id="statusShowSummary">On Progress</span> -->
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
									<button href="#" class="btn btn-secondary flex-row-reverse ml-auto mt-1" id="jobSumaryDetailReview" onclick="reviewJob()" disabled>Review Job</button>
									<button href="#" class="btn btn-primary flex-row-reverse ml-auto mt-1" id="jobSumaryDetailFinish" onclick="finishJob()" disabled>Finish Jobs</button>
									<button href="#" class="btn btn-success flex-row-reverse ml-auto mt-1" id="jobSumaryDetailPay" onclick="payJob()" disabled>Pay Jobs</button>
									<button href="#" data-count="1" class="btn btn-danger flex-row-reverse ml-auto mt-1" id="jobChatEngineer" onclick="showChatEngineer()">Chat with Engineer</button>
								</div>
							</div>
							<div class="row" id="jobSumaryDetailProgressHolder">
								<div class="col-md-12">
									<h5 style="margin-top: 8px">Progress</h5>
									<ul class="list-group list-group-flush" id="jobSumaryDetailProgress">
										<!-- <li class="list-group-item">05 February - 16:28 [Alam] - Moderator Open Job</li>
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
										<li class="list-group-item">05 February - 16:28 [Alam] - Teddy Confirm payment has beed recived</li> -->
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
				<button class="btn btn-primary mr-auto" onclick="reviewJobReport()">Show report</button>
				<button class="btn btn-secondary" onclick="reviewJob('done')">Mark As Reviewed</button>
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
				<button class="btn btn-secondary mr-auto" onclick="reviewJobBast()">Show BAST</button>
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
			<!-- <form method="POST" action="{{env('API_LINK_CUSTOM_PUBLIC')}}/job/postPayedByModeratorInvoice" enctype="multipart/form-data" id="invoiceForm"> -->
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
					<div class="tab" style="display: none;">
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
			<!-- </form> -->
		</div>
	</div>
</div>

<div class="modal fade" id="reviewRequestModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalRequestTitle">Review Request Item Engineer</h5>
			</div>
			<div class="modal-body">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12" id="headerTitle">
								
							</div>

							<div class="col-md-12" id="itemRequestTitle">
							</div>

							<div class="col-md-12" id="documentationTitle">
							</div>

							<div class="col-md-12" id="InvoiceTitle">
							</div>

							<div class="col-md-12" id="priceTitle">
							</div>

							<div class="col-md-12" id="dateTitle">
							</div>

							<div class="col-md-12" id="historyTitle"></div>
							<div class="col-md-12" id="historyChat">
							</div>

							<div class="col-md-12" class="mycustom" id="updateChat" style="display: none">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer" id="modal-footer-request">
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="chatWithEngineer" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">
					<div class="form-inline">
						<span class="mr-3">Chat to Engineer</span>
						<!-- <span class="mr-3">Typing</span> -->
						<!-- <div class="dot-flashing mt-2"></div> -->
					</div>
				</h5>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12" id="chatBoxEngineer">
					</div>

					<div class="col-md-12" id="updateChatEngineer">
						<div class="input-group">
						 	<input id="textChatEngineer" type="text" class="form-control" placeholder="Update Message" aria-label="Update Message" aria-describedby="basic-addon2">
						    <div class="input-group-append">
							    <button class="btn btn-outline-secondary" onclick="updateChatEngineer()" id="submitChat" type="button">
							    	<i class="fas fa-paper-plane"></i>
							    </button>
						    </div>
					    </div>
					</div>
				</div>
			</div>
			<div class="modal-footer" id="chatWithEngineerFooter">
				<button class="btn btn-danger" onclick="closeChatEngineer()" id="closeChatModerator">Close</button>
				<button class="btn btn-default" onclick="cancelChatModerator()">Cancel</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"> 
      <div class="modal-header">
      	<h5 class="modal-title">Detail Documentation item</h5>
      	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>             
      <div class="modal-body">
        <img src="" class="imagepreview" style="width: 100%;" >
      </div>
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
<script src='https://cdnjs.cloudflare.com/ajax/libs/autosize.js/3.0.15/autosize.min.js'></script>

<script type="text/javascript">
	// Jquery Dependency
	var first = true
	var user = "moderator"

	$(document).ready(function(){
		$(document).on("keypress", "#textChat", function(e){
		if(e.which == 13){
				var inputVal = $(this).val();
				if ($("#textChat").val() != "") {
					updateChat($("#textChat").next().children().attr('onclick').split("(")[1].split(")")[0])
				}
				
				// alert("You've entered: " + inputVal);
			}
		});

		$(document).on("keypress", "#textChatEngineer", function(e){
		if(e.which == 13){
				var inputVal = $(this).val();
				if ($("#textChatEngineer").val() != "") {
					updateChatEngineer()
				}
			}
		});
		// var first = true
		var id_job = window.location.href.split("/")[5].replace('#','').split("h")[0]
		console.log(id_job)
		$.ajax({
			type:"GET",
			url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/job/getJobProgress",
			data:{
				id_job:id_job
			},
			success: function(result){
				$("#jobSumaryDetailCustomer").html(result.job.customer.customer_name)
				$("#jobSumaryDetailTitle").html(result.job.job_name)
				if(result.job.job_status == "Open"){
					$("#statusShowSummary").html('<span class="ml-auto badge badge-danger">Open</span>')
				} else if(result.job.job_status == "Ready"){
					$("#statusShowSummary").html('<span class="ml-auto badge badge-warning">Ready</span>')
				} else if(result.job.job_status == "Progress"){
					$("#statusShowSummary").html('<span class="ml-auto badge badge-primary">Progress</span>')
				} else if(result.job.job_status == "Done"){
					$("#statusShowSummary").html('<span class="ml-auto badge badge-success">Done</span>')
				}

				if (result.job.job_priority == "critical") {
					$("#priorityShowSummary").html('<h4><span class="badge badge-danger">Critical</span></h4>')
				}else if (result.job.job_priority == "major") {
					$("#priorityShowSummary").html('<h4><span class="badge badge-warning">Major</span></h4>')
				}else if (result.job.job_priority == "minor") {
					$("#priorityShowSummary").html('<h4><span class="badge badge-success">Minor</span></h4>')
				}
				$("#jobSumaryDetailLocation").html('<i class="fas fa-map-marker"></i> ' + result.job.location.long_location)
				$("#jobSumaryDetailAddress").html('<i class="fas fa-building"></i> ' + result.job.job_location)
				$("#jobSumaryDetailLevel").html('<i class="fas fa-signal"></i> ' + result.job.level.level_name + " - " + result.job.level.level_description)
				$("#jobSumaryDetailDuration").html('<i class="fas fa-calendar-alt"></i> ' + moment(result.job.date_start).format("DD MMMM") + " - " + moment(result.job.date_end).format("DD MMMM"))
				$("#jobSumaryDetailDescription").html(result.job.job_description.replace(/(?:\r\n|\r|\n)/g, '<br>'))
				$("#jobSumaryDetailRequirement").html(result.job.job_requrment.replace(/(?:\r\n|\r|\n)/g, '<br>'))
				var append = ""
				$("#jobSumaryDetailProgress").html("")
				if (result.job.latest_history.history.history_activity.id >= 3) {
					$("#jobChatEngineer").prop("disabled",false)
				}
				$.each(result.progress,function(index,value){
					if(index == 0){
						if(value['id_activity'] == "6"){
							$("#jobSumaryDetailReview").attr("disabled", false);
						} else if(value['id_activity'] == "7"){
							$("#jobSumaryDetailFinish").attr("disabled", false);
						} else if(value['id_activity'] == "8"){
							$("#jobSumaryDetailPay").attr("disabled", false);
						}
						if (value['id_activity'] == "5") {
							if (value.request_item == null && value.request_support == null) {
								append = append + '<li class="active list-group-item" id="history' + value['id'] + '">' + moment(value['date_time']).format('DD MMMM - HH:mm') + " [" + value['user']['name'] + "] - " + value['detail_activity'] + "</li>"
							}else{
								if (value.request_item != null) {
									if (value.request_item.status_item == "Requested") {
										append = append + '<li class="active list-group-item d-inline-flex" id="history' + value['id'] + '">' + moment(value['date_time']).format('DD MMMM - HH:mm') + " [" + value['user']['name'] + "] - " + value['detail_activity'] + '<button class="btn btn-secondary ml-auto btn-sm" onclick="reviewRequestItem(' + value['id'] + ')">Review</button></li>'								
									}else if (value.request_item.status_item == "Done") {
										append = append + '<li class="active list-group-item d-inline-flex" id="history' + value['id'] + '">' + moment(value['date_time']).format('DD MMMM - HH:mm') + " [" + value['user']['name'] + "] - " + value['detail_activity'] + " (Done)" + '<button class="btn btn-outline-warning ml-auto btn-sm disabled" onclick="reviewRequestItem(' + value['id'] + ')">Process <i class="fa fa-check"></i></button></li>'
									}else if (value.request_item.status_item == "success") {
										append = append + '<li class="active list-group-item d-inline-flex" id="history' + value['id'] + '">' + moment(value['date_time']).format('DD MMMM - HH:mm') + " [" + value['user']['name'] + "] - " + value['detail_activity'] + " (Done)" + '<button class="btn btn-outline-success ml-auto btn-sm disabled" onclick="reviewRequestItem(' + value['id'] + ')">Done <i class="fa fa-check"></i></button></li>'
									}else if (value.request_item.status_item == "Rejected") {
										append = append + '<li class="active list-group-item d-inline-flex" id="history' + value['id'] + '">' + moment(value['date_time']).format('DD MMMM - HH:mm') + " [" + value['user']['name'] + "] - " + value['detail_activity'] + " (Rejected)" + '<button class="btn btn-outline-danger ml-auto btn-sm disabled" onclick="reviewRequestItem(' + value['id'] + ')">Reject <i class="fa fa-times"></i></button></li>'
									}
								}else{
									if (value.request_support.status == "Open") {
										append = append + '<li class="active list-group-item d-inline-flex" id="history' + value['id'] + '">' + moment(value['date_time']).format('DD MMMM - HH:mm') + " [" + value['user']['name'] + "] - " + value['detail_activity'] + '<button class="btn btn-secondary ml-auto btn-sm" onclick="reviewRequestSupport(' + value.request_support['id'] + ')">Review</button></li>'
									}else if (value.request_support.status == "Progress") {
										append = append + '<li class="active list-group-item d-inline-flex" id="history' + value['id'] + '">' + moment(value['date_time']).format('DD MMMM - HH:mm') + " [" + value['user']['name'] + "] - " + value['detail_activity'] + " (Approved)" + '<button class="btn btn-warning ml-auto btn-sm" onclick="reviewRequestSupport(' + value.request_support['id'] + ')">Progress</button></li>'
									}else if (value.request_support.status == "Done") {
										append = append + '<li class="active list-group-item d-inline-flex" id="history' + value['id'] + '">' + moment(value['date_time']).format('DD MMMM - HH:mm') + " [" + value['user']['name'] + "] - " + value['detail_activity'] + " (Done)" + '<button class="btn btn-success ml-auto btn-sm" onclick="reviewRequestSupport(' + value.request_support['id'] + ')">Done <i class="fa fa-check"></i></button></li>'
									}else if (value.request_support.status == "Reject") {
										append = append + '<li class="active list-group-item d-inline-flex" id="history' + value['id'] + '">' + moment(value['date_time']).format('DD MMMM - HH:mm') + " [" + value['user']['name'] + "] - " + value['detail_activity'] + " (Rejected)" + '<button class="btn btn-danger ml-auto btn-sm" onclick="reviewRequestSupport(' + valuevalue.request_support['id'] + ')">Reject <i class="fa fa-times"></i></button></li>'
									}
								}
								

							}							
						
						} else{
							append = append + '<li class="active list-group-item" id="history' + value['id'] + '">' + moment(value['date_time']).format('DD MMMM - HH:mm') + " [" + value['user']['name'] + "] - " + value['detail_activity'] + "</li>"
						}
					} else {
						if (value['id_activity'] == "5" ) {
							if (value.request_item == null && value.request_support == null) {
								append = append + '<li class="list-group-item" id="history' + value['id'] + '">' + moment(value['date_time']).format('DD MMMM - HH:mm') + " [" + value['user']['name'] + "] - " + value['detail_activity'] + "</li>"
							}else{
								if (value.request_item != null) {
									if (value.request_item.status_item == "Requested") {
										append = append + '<li class=" list-group-item d-inline-flex" id="history' + value['id'] + '">' + moment(value['date_time']).format('DD MMMM - HH:mm') + " [" + value['user']['name'] + "] - " + value['detail_activity'] + '<button class="btn btn-secondary ml-auto btn-sm" onclick="reviewRequestItem(' + value['id'] + ')">Review</button></li>'
									}else if (value.request_item.status_item == "Done") {
										append = append + '<li class=" list-group-item d-inline-flex" id="history' + value['id'] + '">' + moment(value['date_time']).format('DD MMMM - HH:mm') + " [" + value['user']['name'] + "] - " + value['detail_activity'] + " (Process)" + '<button class="btn btn-outline-warning ml-auto btn-sm disabled" onclick="reviewRequestItem(' + value['id'] + ')">Process <i class="fa fa-check"></i></button></li>'
									}else if (value.request_item.status_item == "Success") {
										append = append + '<li class=" list-group-item d-inline-flex" id="history' + value['id'] + '">' + moment(value['date_time']).format('DD MMMM - HH:mm') + " [" + value['user']['name'] + "] - " + value['detail_activity'] + " (Done)" + '<button class="btn btn-outline-success ml-auto btn-sm disabled" onclick="reviewRequestItem(' + value['id'] + ')">Done <i class="fa fa-check"></i></button></li>'
									}else if (value.request_item.status_item == "Rejected") {
										append = append + '<li class=" list-group-item d-inline-flex" id="history' + value['id'] + '">' + moment(value['date_time']).format('DD MMMM - HH:mm') + " [" + value['user']['name'] + "] - " + value['detail_activity'] + " (Rejected)" + '<button class="btn btn-outline-danger ml-auto btn-sm disabled" onclick="reviewRequestItem(' + value['id'] + ')">Rejected <i class="fa fa-times"></i></button></li>'
									}
								}else{
									if (value.request_support.status == "Open") {
										append = append + '<li class="list-group-item d-inline-flex" id="history' + value['id'] + '">' + moment(value['date_time']).format('DD MMMM - HH:mm') + " [" + value['user']['name'] + "] - " + value['detail_activity'] + '<button class="btn btn-secondary ml-auto btn-sm" onclick="reviewRequestSupport(' + value.request_support['id'] + ')">Review</button></li>'
									}else if (value.request_support.status == "Progress") {
										append = append + '<li class="list-group-item d-inline-flex" id="history' + value['id'] + '">' + moment(value['date_time']).format('DD MMMM - HH:mm') + " [" + value['user']['name'] + "] - " + value['detail_activity'] + " (Approved)" + '<button class="btn btn-warning ml-auto btn-sm" onclick="reviewRequestSupport(' + value.request_support['id'] + ')">Progress</button></li>'
									}else if (value.request_support.status == "Done") {
										append = append + '<li class="list-group-item d-inline-flex" id="history' + value['id'] + '">' + moment(value['date_time']).format('DD MMMM - HH:mm') + " [" + value['user']['name'] + "] - " + value['detail_activity'] + " (Done)" + '<button class="btn btn-outline-success ml-auto btn-sm disabled" onclick="reviewRequestSupport(' + value.request_support['id'] + ')">Done <i class="fa fa-check"></i></button></li>'
									}else if (value.request_support.status == "Reject") {
										append = append + '<li class="list-group-item d-inline-flex" id="history' + value['id'] + '">' + moment(value['date_time']).format('DD MMMM - HH:mm') + " [" + value['user']['name'] + "] - " + value['detail_activity'] + " (Rejected)" + '<button class="btn btn-outline-danger ml-auto btn-sm disabled" onclick="reviewRequestSupport(' + value.request_support['id'] + ')">Rejected <i class="fa fa-times"></i></button></li>'
									}
								}
							}
							
						}else{
							append = append + '<li class="list-group-item" id="history' + value['id'] + '">' + moment(value['date_time']).format('DD MMMM - HH:mm') + " [" + value['user']['name'] + "] - " + value['detail_activity'] + "</li>"
						}
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
			url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/job/getJopApplyer",
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
							var statusButton = 'btn-outline-warning-custom'
							var tmp = "'" + value['user']['name'] + "'"
							var onclick = 'updateApplyer(' + value['user']['id'] + ',' + tmp + ')'
							var statusDisable = ''

						}
						console.log(value['user']['name'])

						append = append + '<div class="col-md-6" style="margin-bottom: 10px;">'
						append = append + 	'<div class="card">'
						append = append + 		'<div class="card-body">'
						append = append + 			'<div class="mb-0">'
						append = append + 				'<strong class="text-default">Level 1</strong>'
						append = append + 				'<h3 class="text-dark">' + value['user']['name'] + '</h3>'
						append = append + 			'</div>'
						// append = append + 			'<div class="mb-0">'
						// append = append + 				value['user']['email']
						// append = append + 			'</div>'
						append = append + 			'<div class="mb-0">'
						append = append + 				'<i class="fa fa-phone" aria-hidden="true"></i> ' + value['user']['phone'] + '<br>'
						append = append + 				'<i class="fa fa fa-envelope" aria-hidden="true"></i> ' + value['user']['email']
						append = append + 				'<button type="button" class="btn-apply-job btn  btn-sm ' + statusButton + ' float-right" onclick="' + onclick + '" ' + statusDisable + '>' + statusText + '</button>' 
						append = append + 			'</div>'
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


	function reviewRequestItem(id){
		$.ajax({
			type:"GET",
			url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/job/getStatusRequestItem",
			data:{
				id_history:id,
			},
			success: function(result){
				$.each(result, function(key, value){
					$("#headerTitle").empty("")
					var append8 = ""
					append8 = append8 + '<div id="status_item">'
					append8 = append8 + '</div>'
					append8 = append8 + '<div class="form-group" id="name_eng_req">'
					append8 = append8 + '</div>'
					append8 = append8 + '<hr> '

					$("#headerTitle").append(append8);

					var append5 = ""

					if (value.status_item == "Requested") {
						$("#status_item").html("<span class='badge badge-warning' style='color: blue;float: right;margin-top: -5px;margin-right:-5px'>"+value.status_item+"</span>");

						var onclickReject = "onclick=btnAcceptReqItem('reject',"+id+")"

						var onclickApprove = "onclick=btnAcceptReqItem('approve',"+id+")"

						var onclickCancel  = "onclick=cancel()"

						$("#modal-footer-request").html("<button class='btn btn-default' id='btnRequestApproval1' "+onclickCancel+">Cancel</button><button class='btn btn-primary' id='btnRequestApproval1' "+onclickApprove+">Approve</button><button class='btn btn-danger' id='btnRequestApproval2' "+onclickReject+">Reject</button>");
					}else if (value.status_item == "Done") {

						$("#status_item").html("<span class='badge badge-warning' style='color: white;float: right;margin-top: -5px;margin-right:-5px'>Process</span>");

						$("#modal-footer-request").html("");
					}else if (value.status_item == "Success") {

						$("#status_item").html("<span class='badge badge-success' style='color: white;float: right;margin-top: -5px;margin-right:-5px'>Success</span>");

						$("#modal-footer-request").html("");

						append5 = append5 + '<label><b>Documentation Success</b></label><br>'
						append5 = append5 + '<img style="width:323px;height:204px;object-fit: cover;" id="img_req_success" class="img_req">'
						append5 = append5 + '<hr>'
						append5 = append5 + '<label><b>Note</b></label>'
						append5 = append5 + '<h6 id="note_success_req"></h6>'
						append5 = append5 + '<hr>'

						// $("#img_req_success").attr("src", "{{env('API_LINK_CUSTOM_PUBLIC')}}/"+value.documentation_success);
					}else{

						$("#status_item").html("<span class='badge badge-danger' style='color: white;float: right;margin-top: -5px;margin-right:-5px'>"+value.status_item+"</span>");

						$("#modal-footer-request").html("");
					}


					$("#itemRequestTitle").empty("")

					var append = ""
					append = append + '<label><b>Item Request</b></label>'
					append = append + '<h6 id="item_req"></h6>'
					append = append + '<label><b>Purpose Item</b></label>'
					append = append + '<p><i id="item_function"></i></p>'
					append = append + '<hr>'

					$("#itemRequestTitle").append(append);


					$("#documentationTitle").empty("")

					var append1 = ""
					append1 = append1 + '<label><b>Documentation item</b></label><br>'
					append1 = append1 + '<img style="width:323px;height:204px;object-fit: cover;" id="img_req" class="img_req">'
					append1 = append1 + '<hr>'

					$("#documentationTitle").append(append1)

					$("#InvoiceTitle").empty("")

					// var append2 = ""
					// append2 = append2 + '<label><b>Invoice item</b></label>'
					// append2 = append2 + '<h6 id="alamat_req">Alamat harga beli</h6>'
					// append2 = append2 + '<hr>'

					// $("#InvoiceTitle").append(append2)

					$("#priceTitle").empty("")

					$("#dateTitle").html("")


					var append3 = ""
					append3 = append3 + '<label><b>Price Item</b></label>'
					append3 = append3 + '<h6 id="price_req">Rp. 7.500.000,00</h6>'
					append3 = append3 + '<hr>'

					$("#dateTitle").append(append3)

					var append4 = ""
					append4 = append4 + '<label><b>Date Request</b></label>'
					append4 = append4 + '<h6 id="date_req">29 Juni 2020</h6>'
					append4 = append4 + '<hr>'

					$("#dateTitle").append(append4)
					$("#dateTitle").append(append5)

					$("#name_eng_req").html("<label><b>Engineer Name Request</b></label><h6>"+ value.engineer.name  +"</h6>");
					$("#item_req").html(value.name_item);
					$("#item_function").html(value.function_item);
					$("#img_req").attr("src", "{{env('API_LINK_CUSTOM_PUBLIC')}}/"+value.documentation_item);
					if (value.documentation_success !== '-') {
						$("#img_req_success").attr("src", "{{env('API_LINK_CUSTOM_PUBLIC')}}/"+value.documentation_success);
						$("#note_success_req").text(value.note_success)
						// your code here
					}
					$("#alamat_req").html(value.invoice_item);
					var number_string = value.price_item.toString(),
                    split   = number_string.split(','),
                    sisa    = split[0].length % 3,
                    rupiah  = split[0].substr(0, sisa),
                    ribuan  = split[0].substr(sisa).match(/\d{1,3}/gi);
                        
                    if (ribuan) {
                        separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                    }
                    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
					$("#price_req").html("Rp. " + rupiah);
					$("#date_req").html(moment(value.date_add).format("DD MMMM YYYY - HH:mm"));
					$("#historyChat").css("display","none")
					$("#updateChat").css("display","none")


					$("#img_req" ).click(function() {
						$('.imagepreview').attr('src', "{{env('API_LINK_CUSTOM_PUBLIC')}}/"+value.documentation_item);
						$('#imagemodal').modal('show');  
					})
					// img.onclick = function(){
					//   // modalImg.src = this.src;
					// 	$('.imagepreview').attr('src', "{{env('API_LINK_CUSTOM_PUBLIC')}}/"+value.documentation_item);
					// 	$('#imagemodal').modal('show');   
					// }
				})
			}
		})

		$("#modalRequestTitle").html('Review Request Item Engineer');
		$("#reviewRequestModal").modal('toggle');
	
	}

	function reviewRequestSupport(id){
		var first = true
		$.ajax({
			type:"GET",
			url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/job/getJobSupportEach",
			data:{
				id_support:id,
			},
			success: function(result){
				if (result.job_support.status == "Open") {
					$("#updateChat").css("display","none")
					$("#status_item").html("<span class='badge badge-warning' style='color: blue;float: right;margin-top: -5px;margin-right:-5px'>"+result.job_support.status+"</span>");

					var onclickReject = "onclick=btnAcceptReqSupport('reject',"+id+")"

					var onclickApprove = "onclick=btnAcceptReqSupport('approve',"+id+")"

					var onclickCancel  = "onclick=cancel()"

					$("#modal-footer-request").html("<button class='btn btn-default' id='btnRequestApproval1' "+onclickCancel+">Cancel</button><button class='btn btn-primary' id='btnRequestApproval1' "+onclickApprove+">Approve</button><button class='btn btn-danger' id='btnRequestApproval2' "+onclickReject+">Reject</button>");

					$("#headerTitle").empty("")
					var append8 = ""
					append8 = append8 + '<div id="status_item">'
					append8 = append8 + '</div>'
					append8 = append8 + '<div class="form-group" id="name_eng_req">'
					append8 = append8 + '</div>'
					append8 = append8 + '<hr> '

					$("#headerTitle").append(append);


					$("#itemRequestTitle").empty("")

					var append = ""
					append = append + '<label><b>Problem Support</b></label>'
					append = append + '<h6 id="item_req"></h6>'
					append = append + '<p><i id="problem_support"></i></p>'
					append = append + '<hr>'

					append = append + '<label><b>Reason Support</b></label>'
					append = append + '<h6 id="item_req"></h6>'
					append = append + '<p><i id="reason_support"></i></p>'
					append = append + '<hr>'

					$("#itemRequestTitle").append(append);


					$("#documentationTitle").empty("")

					var append1 = ""
					append1 = append1 + '<label><b>Documentation item</b></label><br>'
					append1 = append1 + '<img style="width:323px;height:204px;object-fit: cover;" id="img_req" class="img_req">'
					append1 = append1 + '<hr>'

					$("#documentationTitle").append(append1)

					var append4 = ""
					append4 = append4 + '<label><b>Date Request</b></label>'
					append4 = append4 + '<h6 id="date_req">29 Juni 2020</h6>'
					append4 = append4 + '<hr>'

					$("#dateTitle").append(append4)

					$("#name_eng_req").html("<label><b>Engineer Name Request</b></label><h6>"+ result.job_support.job.latest_history.user_name  +"</h6>");
					
					
				}else if (result.job_support.status == "Progress") {
					$("#headerTitle").empty("")
					var append7 = ""
					append7 = append7 + '<div class="row">'
					append7 = append7 + '<div class="col-md-6">'
					append7 = append7 + '<span class="">Maintenance Router</span><br>'	
					append7 = append7 + '<span class="">BPJS Kesehatan</span>'
					append7 = append7 + '</div>'

					append7 = append7 + '<div class="col-md-6 text-right">'
					append7 = append7 + '<span class="" id="date_req">2 August</span><br>'
					append7 = append7 + '<span class="badge badge-warning" style="color: green;">'+ result.job_support.status +'</span>'
					append7 = append7 + '</div>'
					append7 = append7 + '</div>'
					append7 = append7 + '<hr>'
	
					
					$("#headerTitle").append(append7)

					$("#itemRequestTitle").empty("")

					var append = ""
					append = append + '<div class="row">'
					append = append + '<div class="col-md-6">'
					append = append + '<label><b>Problem Support</b></label>'	
					append = append + '<p><i id="problem_support"></i></p>'
					append = append + '</div>'
							
					append = append + '<div class="col-md-6">'
					append = append + '<label><b>Reason Support</b></label>'
					append = append + '<p><i id="reason_support"></i></p>'
					append = append + '</div>'
					append = append + '</div>'
					append = append + '<hr>'

					$("#itemRequestTitle").append(append);

					$("#documentationTitle").empty("")

					var append1 = ""
					append1 = append1 + '<label><b>Evidence</b></label><br>'
					append1 = append1 + '<img style="width:323px;height:204px;object-fit: cover;" id="img_req" class="img_req">'
					append1 = append1 + '<hr>'

					$("#documentationTitle").append(append1)


					$("#historyTitle").empty("")

					var append6 = ""

					append6 = append6 + '<label><b>History Progress</b></label>'

					$("#historyTitle").append(append6)

					$("#historyChat").empty()

					$("#historyChat").css("display","block")

					var append5 = ""
					var checker = result.job_support_chat[0].from
					// var checkerTime = moment(result.job_support_chat[0].time,"X").format("YYYY-MM-DD")
					var checkerTime = "2020-01-01"
					var marginCustom = ""
					$.each(result.job_support_chat,function(key,value){
						var time = moment(value.time,"X")
						if(checker != value.from){
							checker = value.from
							marginCustom = "margin-top:5px"
						} else {
							marginCustom = ""
						}
						if(checkerTime != time.format("YYYY-MM-DD")){
							checkerTime = time.format("YYYY-MM-DD")
							append5 = append5 + '<div class="bubleChat d-block text-center" style="' + marginCustom + '"><div class="bubleChatItem bubleChatDate d-inline-flex"><span>'
							append5 = append5 + time.format("D MMMM")
							append5 = append5 + '</span>'
							append5 = append5 + '</div></div>'
						} else {

						}
						if(value.from == "moderator"){
							append5 = append5 + '<div class="bubleChat d-block text-right" style="' + marginCustom + '"><div class="bubleChatItem bubleChatModerator d-inline-flex text-left"><span>'
							append5 = append5 + value.message
							append5 = append5 + '</span><sub class="bubleSub">'
							append5 = append5 + time.format("HH:mm")
							append5 = append5 + '</sub></div></div>'
						} else {
							append5 = append5 + '<div class="bubleChat d-block" style="' + marginCustom + '"><div class="bubleChatItem bubleChatEngineer d-inline-flex text-left"><span>'
							append5 = append5 + value.message
							append5 = append5 + '</span><sub class="bubleSub">'
							append5 = append5 + time.format("HH:mm")
							append5 = append5 + '</sub></div></div>'
						}
					})

					
					$("#historyChat").append(append5)

			        firebase.database().ref('job_support/' + result.job_support.id + '/chat').on('value', function(snapshot) {
			            snapshot_dump = snapshot.val()
			            // console.log(Object.entries(snapshot_dump)[0][1].from)
			            console.log(Object.entries(snapshot_dump).length - 1)
			            var value = snapshot_dump[snapshot_dump.length - 1]
			            var value = Object.entries(snapshot_dump)
			            value = value[value.length - 1][1]
						var temp = ""
						if(value.from == "moderator"){
							temp = temp + '<div class="bubleChat d-block text-right"><div class="bubleChatItem bubleChatModerator d-inline-flex text-left"><span>'
						} else {
							temp = temp + '<div class="bubleChat d-block"><div class="bubleChatItem bubleChatEngineer d-inline-flex text-left"><span>'
						}
						temp = temp + value.message
						temp = temp + '</span><sub class="bubleSub">'
						temp = temp + moment(value.time,"X").format("HH:mm")
						temp = temp + '</sub></div></div>'
						if(!first){
							$("#historyChat").append(temp)
						} else {
							first = false
						}
						document.getElementById('historyChat').scrollTop = document.getElementById('historyChat').scrollHeight
						$("#textChat").val("");
						$("#textChat").attr("placeholder","Update");
			        });

					$("#historyChat").addClass("scrolly")

					$("#updateChat").css("display","block")
					$("#updateChat").empty("")
					var updateChat = ""
					updateChat = updateChat + '<div class="input-group">'
					updateChat = updateChat + '<input id="textChat" type="text" class="form-control" placeholder="Update Message" aria-label="Update Message" aria-describedby="basic-addon2">'
				    updateChat = updateChat + '<div class="input-group-append">'
				    updateChat = updateChat + '<button class="btn btn-outline-secondary" onclick="updateChat(' + result.job_support.id + ')" id="submitChat" type="button"><i class="fas fa-paper-plane"></i></button>'
				    updateChat = updateChat + '</div>'
				    updateChat = updateChat + '</div>'			    
					$("#updateChat").append(updateChat)

					$("#submitChat").prop("disabled",true)

			        $("#textChat").keyup(function(){
			        	if ($("#textChat").val() == "") {
				        	$("#submitChat").prop("disabled",true)
				        }else{
				        	$("#submitChat").prop("disabled",false)
				        }
			        })

					var onclickApprove = "onclick=btnAcceptReqSupport('done',"+id+")"
					var onclickCancel  = "onclick=cancel()"

					$("#modal-footer-request").empty()
					$("#modal-footer-request").append("<button class='btn btn-default' id='btnRequestApproval1' "+onclickCancel+">Cancel</button>")
					$("#modal-footer-request").append("<button class='btn btn-primary' id='btnRequestApproval1' "+onclickApprove+" disabled>Vidcall</button>")
					$("#modal-footer-request").append("<button class='btn btn-danger' id='btnRequestApproval1' "+onclickApprove+" disabled>Remote</button>")
					$("#modal-footer-request").append("<button class='btn btn-success' id='btnRequestApproval1' "+onclickApprove+">Finish</button>");
				
				}else if (result.job_support.status == "Done") {
					$("#headerTitle").empty("")
					var append7 = ""
					append7 = append7 + '<div class="row">'
					append7 = append7 + '<div class="col-md-6">'
					append7 = append7 + '<span class="">Maintenance Router</span><br>'	
					append7 = append7 + '<span class="">BPJS Kesehatan</span>'
					append7 = append7 + '</div>'

					append7 = append7 + '<div class="col-md-6 text-right">'
					append7 = append7 + '<span class="" id="date_req">2 August</span><br>'
					append7 = append7 + '<span class="badge badge-success">'+ result.job_support.status +'</span>'
					append7 = append7 + '</div>'
					append7 = append7 + '</div>'
					append7 = append7 + '<hr>'
	
					
					$("#headerTitle").append(append7)

					$("#itemRequestTitle").empty("")

					var append = ""
					append = append + '<div class="row">'
					append = append + '<div class="col-md-6">'
					append = append + '<label><b>Problem Support</b></label>'	
					append = append + '<p><i id="problem_support"></i></p>'
					append = append + '</div>'
							
					append = append + '<div class="col-md-6">'
					append = append + '<label><b>Reason Support</b></label>'
					append = append + '<p><i id="reason_support"></i></p>'
					append = append + '</div>'
					append = append + '</div>'
					append = append + '<hr>'

					$("#itemRequestTitle").append(append);

					$("#documentationTitle").empty("")

					var append1 = ""
					append1 = append1 + '<label><b>Evidence</b></label><br>'
					append1 = append1 + '<img style="width:323px;height:204px;object-fit: cover;" id="img_req" class="img_req">'
					append1 = append1 + '<hr>'

					$("#documentationTitle").append(append1)


					$("#historyTitle").empty("")

					var append6 = ""

					append6 = append6 + '<label><b>History Progress</b></label>'

					$("#historyTitle").append(append6)

					$("#historyChat").css("display","block")
					$("#historyChat").empty("")

					var append5 = ""
					$.each(result.job_support_chat,function(key,value){
						var time = moment(value.time,"X")
						if(checker != value.from){
							checker = value.from
							marginCustom = "margin-top:5px"
						} else {
							marginCustom = ""
						}
						if(checkerTime != time.format("YYYY-MM-DD")){
							checkerTime = time.format("YYYY-MM-DD")
							append5 = append5 + '<div class="bubleChat d-block text-center" style="' + marginCustom + '"><div class="bubleChatItem bubleChatDate d-inline-flex"><span>'
							append5 = append5 + time.format("D MMMM")
							append5 = append5 + '</span>'
							append5 = append5 + '</div></div>'
						} else {

						}
						if(value.from == "moderator"){
							append5 = append5 + '<div class="bubleChat d-block text-right" style="' + marginCustom + '"><div class="bubleChatItem bubleChatModerator d-inline-flex text-left"><span>'
							append5 = append5 + value.message
							append5 = append5 + '</span><sub class="bubleSub">'
							append5 = append5 + time.format("HH:mm")
							append5 = append5 + '</sub></div></div>'
						} else {
							append5 = append5 + '<div class="bubleChat d-block" style="' + marginCustom + '"><div class="bubleChatItem bubleChatEngineer d-inline-flex text-left"><span>'
							append5 = append5 + value.message
							append5 = append5 + '</span><sub class="bubleSub">'
							append5 = append5 + time.format("HH:mm")
							append5 = append5 + '</sub></div></div>'
						}
					})

					
					$("#historyChat").append(append5)

					$("#historyChat").addClass("scrolly")

					// $("#updateChat").css("display","block")
					// $("#updateChat").empty("")

					$("#updateChat").css("display","block")
					$("#updateChat").empty("")
					var updateChat = ""
					updateChat = updateChat + '<div class="input-group">'
					updateChat = updateChat + '<input id="textChat" type="text" disabled class="form-control" placeholder="Update Message" aria-label="Update Message" aria-describedby="basic-addon2">'
				    updateChat = updateChat + '<div class="input-group-append">'
				    updateChat = updateChat + '<button class="btn btn-outline-secondary" disabled onclick="updateChat(' + result.job_support.id + ')" type="button"><i class="fas fa-paper-plane"></i></button>'
				    updateChat = updateChat + '</div>'
				    updateChat = updateChat + '</div>'			    
					$("#updateChat").append(updateChat)

					$("#modal-footer-request").html("");
				}else{
					$("#status_item").html("<span class='badge badge-danger' style='color: white;float: right;margin-top: -5px;margin-right:-5px'>"+result.job_support.status+"</span>");

					$("#modal-footer-request").html("");
				}

				$("#img_req").attr("src", "{{env('API_LINK_CUSTOM_PUBLIC')}}/"+result.job_support.picture_support);
				$("#date_req").html(moment(result.job_support.date_add).format("DD MMMM YYYY"));
				$("#problem_support").html(result.job_support.problem_support);
				$("#reason_support").html(result.job_support.reason_support);

				$("#img_req" ).click(function() {
					$('.imagepreview').attr('src', "{{env('API_LINK_CUSTOM_PUBLIC')}}/"+ result.job_support.picture_support);
					$('#imagemodal').modal('show');  
				})
			}
		})
		$("#modalRequestTitle").html('Review Request Support Engineer');
		$("#reviewRequestModal").modal('toggle');
	
	}

	var modal = document.getElementById("modaImage");
	var modalImg = document.getElementById("imagepreview");
	var img = document.getElementById("img_req");

	function btnAcceptReqItem(status,id_history){
		
		if (status == 'approve') {
			console.log('approve ya');
			Swal.fire({
				title: 'Are you sure?',
				text: "to approve this request Job",
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
						url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/job/postStatusRequestItem",
						data:{
							id_history:id_history,
							status:status,
						},
						success:function(){
							Swal.showLoading()
							Swal.fire(
								'Accepted!',
								'Request Item has been accepted',
								'success'
							).then((result) => {
								if (result.value) {
									location.reload()
								}
							})
						}
					})

				}
			})
			
		}else{
			Swal.fire({
				title: 'Are you sure?',
				text: "to reject this request Job",
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
						url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/job/postStatusRequestItem",
						data:{
							id_history:id_history,
							status:status,
						},
						success:function(){
							Swal.showLoading()
							Swal.fire(
								'Rejected!',
								'Request Item has been rejected',
								'error'
							).then((result) => {
								if (result.value) {
									location.reload()
								}
							})
						}
					})

				}
			})
			
			console.log('reject ih');
		
		}
	}

	function btnAcceptReqSupport(status,id_support){
		if (status == 'approve') {
			console.log('approve ya');
			Swal.fire({
				title: 'Are you sure?',
				text: "to approve this request Job",
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
						url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/job/postStatusRequestSupport",
						data:{
							id_support:id_support,
							status:status,
							id_moderator:"{{Auth::user()->id}}",
						},
						success:function(){
							Swal.showLoading()
							Swal.fire(
								'Accepted!',
								'Request Support has been accepted',
								'success'
							).then((result) => {
								if (result.value) {
									location.reload()
								}
							})
						}
					})

				}
			})
			
		}else if (status == 'reject'){
			
			Swal.fire({
				title: 'Are you sure?',
				text: "to reject this request Job",
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
						url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/job/postStatusRequestSupport",
						data:{
							id_support:id_support,
							status:status,
						},
						success:function(){
							Swal.showLoading()
							Swal.fire(
								'Rejected!',
								'Request Support has been rejected',
								'error'
							).then((result) => {
								if (result.value) {
									location.reload()
								}
							})
						}
					})

				}
			})
			
		}else{

			Swal.fire({
				title: 'Are you sure?',
				text: "to finish this progress",
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
						url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/job/postStatusRequestSupport",
						data:{
							id_support:id_support,
							status:status,
							// id_history:id_history,x
						},
						success:function(){
							Swal.showLoading()
							Swal.fire(
								'Finished!',
								'Request Support has been finished',
								'success'
							).then((result) => {
								if (result.value) {
									location.reload()
								}
							})
						}
					})

				}
			})
		}
	}

	function updateChat(id_support){
		firebase.database().ref('job_support/' + id_support + '/chat/').push().set({
                from: user,
                message: $("#textChat").val(),
                time: parseInt(moment().format("X"))
            });
		// console.log("ooooooo");
		var textChat = $("#textChat").val();
		// $("#historyChat").append('<div class="bubleChat d-block text-right"><div class="bubleChatItem bubleChatModerator d-inline-flex text-left"><span>'+ textChat +'</span><sub class="bubleSub">17.00</sub></div></div>')
		// $("#textChat").val("");
		// $("#textChat").attr("placeholder","Update");
	}

	function cancel(){
		$('#reviewRequestModal').modal('hide');
	}

	function cancelChatModerator(){
		$('#chatWithEngineer').modal('hide');
	}

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
					text: "It's sending and creating LoA...",
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
					url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/job/postApplyerUpdate",
					data:{
						id_engineer:id_engineer,
						id_job:window.location.href.split("/")[5].replace('#','').split("h")[0],
						id_moderator:"{{Auth::user()->id}}"
					},
					success: function (result){
						$.ajax({
							type:"GET",
							url:"{{env('WEB_LINK_CUSTOM_PUBLIC')}}/job/detail/createLetterAndQR",
							data:{
								id_job:window.location.href.split("/")[5].replace('#','').split("h")[0],
								moderator:"{{Auth::user()->name}}",
								moderator_phone:"{{Auth::user()->phone}}"
							},
							success:function(){
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
					}
				})
				// $.ajax({
				// 	type:"GET",
				// 	url:"{{url('/job/detail/createLetterAndQR')}}"
				// })
			}
		})
	}

	function payJob(){
		$.ajax({
			type:"GET",
			url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/job/getJobOpen",
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
			url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/job/postPayedByModeratorFirst",
			data:{
				id_job:window.location.href.split("/")[5].replace('#','').split("h")[0],
				id_moderator:"{{Auth::user()->id}}",
				nominal:$("#payJobPrice").val().replace("$","").replace(",","").replace("/\.00/g","")
			},
			success: function(result){
				$("#payJobInfoName").val(result.account[0].user.name)
				$("#payJobInfoBank").val(result.account[0].account_name)
				$("#payJobInfoAccount").val(result.account[0].account_number)
				$("#payJobInfoID").val(result.id)
				$("#payJobInfoModerator").val("{{Auth::user()->id}}")
			}
		})
	}

	function payJobSecond(){
		$.ajax({
			type:"POST",
			url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/job/postPayedByModeratorSecond",
			data:{
				id_job:window.location.href.split("/")[5].replace('#','').split("h")[0],
				id_moderator:"{{Auth::user()->id}}",
				nominal:$("#payJobPrice").val().replace("$","").replace(",","").replace("/\.00/g","")
			},
			success: function(result){
			// 	$("#payJobInfoName").val(result.account[0].user.name)
			// 	$("#payJobInfoBank").val(result.account[0].account_name)
			// 	$("#payJobInfoAccount").val(result.account[0].account_number)
				console.log(result.id)
				$("#payJobInfoID").val(result.id)
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
			url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/job/postPayedByModeratorInvoice",
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
				url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/job/postFinishedByModerator",
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

							$("#finishJobModal").modal('toggle')
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
			Swal.fire({
				title: 'Are you sure?',
				text: "Submit this and you'll create BAST",
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
						url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/job/getJobBast",
						data:{
							id_job:window.location.href.split("/")[5].replace('#','').split("h")[0],
							id_moderator:"{{Auth::user()->id}}"
						}, 
						success: function(result){
							$.ajax({
								type:"POST",
								url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/job/postReviewedByModerator",
								data:{
									id_job:window.location.href.split("/")[5].replace('#','').split("h")[0],
									id_moderator:"{{Auth::user()->id}}"
								}, 
								success: function(result){
									Swal.fire(
										'Reviewed!',
										'Job has been Reviewed.',
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
						}
					})
					
				}
			})
		} else {
			$("#reviewJobModal").modal('toggle')
		}
	}

	function reviewJobReport(){
		window.open("{{env('API_LINK_CUSTOM_PUBLIC')}}/job/getJobReportPDF?id_job=" + window.location.href.split("/")[5].replace('#','').split("h")[0], '_blank');
		// console.log('reviewJobReport');
	}

	function reviewJobBast(){
		window.open("{{env('API_LINK_CUSTOM_PUBLIC')}}/job/getJobBastPDF?id_job=" + window.location.href.split("/")[5].replace('#','').split("h")[0], '_blank');
		// console.log('reviewJobReport');
	}

	function showSumary(id){
		$.ajax({
			type:"GET",
			url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/job/getJobOpen",
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
	// 		url: "{{env('API_LINK_CUSTOM_PUBLIC')}}/job/createJob/getParameterFinalize",
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
				// var files = $('#payJobInfoInvoice')[0].files[0];
				fd.append('invoice',$('#payJobInfoInvoice')[0].files[0]);
				fd.append('id_payment',$("#payJobInfoID").val());
				fd.append('id_job',window.location.href.split("/")[5].replace('#','').split("h")[0]);
				fd.append('id_moderator',"{{Auth::user()->id}}");

				console.log(fd);

				$.ajax({
					type:"POST",
					url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/job/postPayedByModeratorInvoice",
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

	function showChatEngineer(){
		var id_job = window.location.href.split("/")[5].replace('#','').split("h")[0]
		var first = true
		$("#chatBoxEngineer").empty()
		$.ajax({
			type:"GET",
			url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/job/getChatModeratorEach",
			data:{
				id_job:id_job,
			},
			success: function(result){
				if(result.chat_moderator === null){
					$("#closeChatModerator").attr('disabled',true)
				} else {
					if (result.chat_moderator.status == "Open") {
						$("#closeChatModerator").attr('disabled',false)
						var append = ""
						var checker = result.chat[0].from
						var checkerTime = "2020-01-01"
						var marginCustom = ""
						$.each(result.chat,function(key,value){
							var time = moment(value.time,"X")
							if(checker != value.from){
								checker = value.from
								marginCustom = "margin-top:5px"
							} else {
								marginCustom = ""
							}
							if(checkerTime != time.format("YYYY-MM-DD")){
								checkerTime = time.format("YYYY-MM-DD")
								append = append + '<div class="bubleChat d-block text-center" style="' + marginCustom + '"><div class="bubleChatItem bubleChatDate d-inline-flex"><span>'
								append = append + time.format("D MMMM")
								append = append + '</span>'
								append = append + '</div></div>'
							}

							if(value.from == "moderator"){
								append = append + '<div class="bubleChat d-block text-right" style="' + marginCustom + '"><div class="bubleChatItem bubleChatModerator d-inline-flex text-left"><span>'
								append = append + value.message
								append = append + '</span><sub class="bubleSub">'
								append = append + time.format("HH:mm")
								append = append + '</sub></div></div>'
							} else {
								append = append + '<div class="bubleChat d-block" style="' + marginCustom + '"><div class="bubleChatItem bubleChatEngineer d-inline-flex text-left"><span>'
								append = append + value.message
								append = append + '</span><sub class="bubleSub">'
								append = append + time.format("HH:mm")
								append = append + '</sub></div></div>'
							}
						})

						$("#chatBoxEngineer").addClass("scrolly")
						$("#chatBoxEngineer").append(append)

						firebase.database().ref('chat_moderator/' + result.chat_moderator.id + '/chat').on('value', function(snapshot) {
				            snapshot_dump = snapshot.val()
				            console.log(Object.entries(snapshot_dump).length - 1)
				            var value = snapshot_dump[snapshot_dump.length - 1]
				            var value = Object.entries(snapshot_dump)
				            value = value[value.length - 1][1]
				            console.log("value" + value)
							var temp = ""
							if(value.from == "moderator"){
								temp = temp + '<div class="bubleChat d-block text-right"><div class="bubleChatItem bubleChatModerator d-inline-flex text-left"><span>'
							} else {
								temp = temp + '<div class="bubleChat d-block"><div class="bubleChatItem bubleChatEngineer d-inline-flex text-left"><span>'
							}
							temp = temp + value.message
							temp = temp + '</span><sub class="bubleSub">'
							temp = temp + moment(value.time,"X").format("HH:mm")
							temp = temp + '</sub></div></div>'
							if(!first){
								$("#chatBoxEngineer").append(temp)
							} else {
								first = false
							}
							document.getElementById('chatBoxEngineer').scrollTop = document.getElementById('chatBoxEngineer').scrollHeight
							$("#textChatEngineer").val()
							$("#textChatEngineer").val("");
							$("#textChatEngineer").attr("placeholder","Update");
				        });
					} else if (result.chat_moderator.status == "Close") {
						$("#closeChatModerator").attr('disabled',true)
					}
				}

				$("#chatBoxEngineer").addClass("boxChat");
				$("#chatWithEngineer").modal('show');
			}
		})
	}

	function updateChatEngineer(){
		var id_job = window.location.href.split("/")[5].replace('#','').split("h")[0]
		// console.log($("#textChatEngineer").val())
		if($("#chatBoxEngineer .bubleChat").length == 0){
			$.ajax({
				type:"POST",
				url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/job/postChatModerator",
				data:{
					id_job:id_job,
				},
				success: function(result){
					firebase.database().ref('chat_moderator/' + result + '/').set({
		                id_job:id_job,
		                status: "Open",
		                message:$("#textChatEngineer").val(),
		            });
					firebase.database().ref('chat_moderator/' + result + '/chat/').push().set({
		                fromID: "{{Auth::user()->id}}",
		                fromType: "moderator",
		                from: "moderator",
		                message: $("#textChatEngineer").val(),
		                time: parseInt(moment().format("X"))
		            });

					showChatEngineer()
					// if ($('#chatWithEngineer').attr('class') == "modal fade show") {
					// 	showChatEngineer()
					// }
		            
		            // var textChat = $("#textChat").val();
				}
			})
		} else {
			$.ajax({
				type:"POST",
				url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/job/postChatModerator",
				data:{
					id_job:id_job,
					message:$("#textChatEngineer").val(),
				},
				success: function(result){
					firebase.database().ref('chat_moderator/' + result + '/chat/').push().set({
		                fromID: "{{Auth::user()->id}}",
		                fromType: "moderator",
		                from: "moderator",
		                message: $("#textChatEngineer").val(),
		                time: parseInt(moment().format("X"))
		            });


				}
			})
		}
	}

	function closeChatEngineer(){
		var id_job = window.location.href.split("/")[5].replace('#','').split("h")[0]
		$.ajax({
			type:"POST",
			url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/job/postChatModerator",
			data:{
				id_job:id_job,
				close_chat:"Close"
			},
			success: function(result){
				firebase.database().ref('chat_moderator/' + result + '/').update({
	                id_job:id_job,
	                status: "Close"
	            });
				firebase.database().ref('chat_moderator/' + result + '/chat/').push().set({
	                fromID: "{{Auth::user()->id}}",
	                fromType: "moderator",
	                from: "moderator",
	                message: "Chat Close",
	                time: parseInt(moment().format("X"))
	            });
			}
		})
	}

</script>

@endsection
