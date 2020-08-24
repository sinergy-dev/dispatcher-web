@extends('layouts.app')
@section('style')
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<style type="text/css">
	.hided{
		display: none;
	}

	.showed{
		display: block;
	}

	.daterangepicker {
	      z-index: 1600!important; /* has to be larger than 1050 */
    }
	.nav-tabs .nav-link.active {
	    color: #0d1a26;
	    background-color: white;
	    border-color: #dee2e6 #dee2e6 #f8fafc;
	}
	.card{
		border-top: none;
	}

	.ul-basic ul li {
	  cursor: text;
      position: relative;
      padding: 6px 8px 6px 8px;
      list-style-type: none;
      background: #eee;
      transition: 0.2s;
      
      /* make the list items unselectable */
   /*   -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;*/
    }

    .ul-basic ul{ 
      margin: 0;
      padding: 0;
    }

    /* Set all odd list items to a different color (zebra-stripes) */
    .ul-basic ul li:nth-child(odd) {
      background: #f9f9f9;
    }

    /* Darker background-color on hover */
    .ul-basic ul li:hover {
      background: #ddd;
    }

    .files-attach{
    	cursor: pointer;
    }

	.ul-basic span{
	  display: inline-block;
	  position: relative;
	  width: 40%;
	  padding-right: 10px; /* Ensures colon does not overlay the text */
	}

	.ul-basic span::after {
	  content: ":";
	  position: absolute;
	  right: 10px;
	}

	.ul-basic ul li ul.listCategory{
	 list-style-type: circle;
	}

	.zoom-effect{
		position: relative;
	}

	.zoom{
		transition: transform .2s; 
	}

	.zoom:hover{
		cursor: zoom-in;
	}

	.zoom:active {
	  transform:scale(1.25);
	  border: 1px solid;
	  border-color: #3490dc;
	  border-radius: 3px;
	  box-shadow: 5px 5px #3490dc;
	  /* To bring top */
	  position: relative;
	  z-index: 9999!important; /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
	}

</style>
@endsection
@section('content')
<main role="main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
				  <li class="nav-item">
				    <a class="nav-link" id="basic-tab" data-toggle="tab" href="#" role="tab" aria-controls="home" aria-selected="false">Basic Information</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" id="advanced-tab" data-toggle="tab" href="#advance" role="tab" aria-controls="profile" aria-selected="false">Advanced information</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" id="interview-tab" data-toggle="tab" href="#interview" role="tab" aria-controls="contact" aria-selected="false">Interview information</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" id="agreement-tab" data-toggle="tab" href="#agreement" role="tab" aria-controls="contact" aria-selected="false">Agreement information</a>
				  </li>
				</ul>
				<div class="card">
					<div class="card-body">
						<div class="card-title border-bottom row">
							<div class="col-md-6">
								<h5>Registrant Partner</h5>
							</div>
							<div class="col-md-6">
								<h5 id="informationTitle" style="float: right;"><span class="badge badge-info">Basic Information</span></h5> 
							</div>							
						</div>
						
						
						<div class="card-text">
							<div class="row">
								<div class="col-md-6">
									<strong class="d-inline-block text-primary" id="jobSumaryDetailCustomer">Disclaimer</strong>
									<p class="mb-2" id="DisclaimerIndo" style="text-align: justify;">
										This is the bla bla blabla bla bla bla bla
									</p>
									<p class="mb-2" id="DisclaimerEnglish" style="text-align: justify;">
										This is the bla bla blabla bla bla bla bla
									</p>
									<div class="ul-basic" id="basic-information">
										<!-- <ul>
											<li>Name : Budiarta</li>
											<li>NIK  : 567543500001</li>
											<li>Phone : XXXXXX99</li>
											<li>Email : budiharta@gmail.com</li>
											<li>Address : Inlingua Building, Jalan Puri Indah Raya Kav A3/2, No.33-35, RT.1/RW.8, Kembangan Sel., Kec. Kembangan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11610</li>
										</ul> -->
									</div>
								</div>
								<div class="col-md-6">
									<p>
										<span id="jobSumaryDetailAddress" style="float: right;">Jakarta, 16 Juli 2020 </span><br>
									</p>
									<h5 id="filesTitleAttach">Attachment Files</h5>
									<div class="" id="filesContentAttach">
									</div><br>
									<h5 id="controlModerator">Control Moderator</h5>
									<div id="boxSubmitPartner">
									</div>
								</div>
							</div>
							<!-- <div class="row">
								<div class="col-md-6">
									
								</div>
								<div class="col-md-6">
									
								</div>
							</div>
							<div class="row" style="margin-top: 10px;">
								<div class="col-md-6">
										
								</div>
								<div class="col-md-6" id="controlModerator">
									
								</div>
							</div> -->
							<div class="row">
								<div class="col-md-12">
									<h5 style="margin-top: 8px">Progress</h5>
									<ul class="list-group list-group-flush" id="PartnerDetailProgress">
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<div class="modal fade" id="setScheduleModal" tabindex="-1" role="dialog" aria-labelledby="setScheduleModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Set Schedule For Partner Interview</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body card-body d-flex flex-column">
				<!-- <div class="ml-1">
					<div class="ul-basic" id="setScheduleForm">
						<div class="form-group">
					        <div class="row">
					            <div class="col-md-8">
					                <div class="input-group date" id="datetimepicker12">
					                	<input type="text" class="form-control">
					                </div>
					            </div>
					        </div>
					    </div>
					</div>
				</div> -->
				<div class="row">
			        <div class='col-sm-6'>
			            <div class="form-group">
			                <div class='input-group date''>
			                    <!-- <input type='text' class="form-control" />
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span> -->
			                    <input type="text" id="datetimepicker1">
			                    <div id="z"></div>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn btn-primary ml-auto" id="">Show More</a>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript">
function init_basic(id_candidate){
	$("#controlModerator").show();
 	$.ajax({
		type:"GET",
		url:"{{env('API_LINK_CUSTOM')}}/partner/getDetailPartnerList",
		data:{
			id_candidate:id_candidate
		},
		success: function(result){
			// $.each(result.partner,function(index,value){
			$("#informationTitle").html('<span class="badge badge-info">'+result.partner.status+'</span>')

			var append = ""
		  	append = append + '<ul>'
		  	append = append + '<li> <span>Name</span> '+result.partner.name+'</li>'
		  	append = append + '<li> <span>Nik</span>'+result.partner.ktp_nik+'</li>'
		  	append = append + '<li> <span>Phone</span>'+result.partner.phone+'</li>'
		  	append = append + '<li> <span>Email</span>'+result.partner.email+'</li>'
		  	append = append + '<li> <span>Address</span>'+result.partner.address+'</li>'
			append = append + '</ul>'		

		  	$("#basic-information").html(append)

		  	$("#filesTitleAttach").html('Attachment Files')

		  	var append2 = ""
		  	append2 = append2 +	'<b>Kartu Tanda Penduduk</b>'
		  	append2 = append2 + '<div class="zoom-effect">'
			append2 = append2 + '<img src="{{env("API_LINK_CUSTOM_PUBLIC")}}/'+ result.partner.ktp_files +'" style="width:323px;height:204px;object-fit: cover;" class="zoom"><p style="color:red;font-family"><i>*note: tahan gambar lama untuk zoom</i></p>'
			append2 = append2 + '</div>'

			$("#previewKtp").attr("onclick","previewKtp()")

		  	$("#filesContentAttach").html(append2)

		  	$("#boxSubmitPartner").empty("")
		  	$("#DisclaimerEnglish").html("Di dalam tahap basic information, calon engineer akan di seleksi berdasarkan backgroud life melalui upload KTP dan alamat tempat tinggal. Dengan ini kita bisa mengetahui domisili dari engineer tersebut dan area dimana dia akan bekerja.")
		  	$("#DisclaimerIndo").html("<i> In the basic information stage, prospective engineers will be selected based on backgroud life through uploaded KTP and residential addresses. With this we can find out the domicile of the engineer and the area where he will work.</i>")
		  	$.each(result.partner_progress,function(index,value){
		  		if (index === 0) {
		  			var button = "";
					button = button + '<button id="partnerSubmitAccept" class="btn btn-outline-success ml-auto"><span>Accept</span></button>'
					button = button + '<button id="partnerSubmitReject" class="btn btn-danger btn-outline-danger ml-auto"><span>Reject</span></button>'
					
					$("#boxSubmitPartner").append(button)
					$("#boxSubmitPartner > button").css("margin","10px")

		  			if(value.history_status != "1"){
			  			$("#partnerSubmitAccept").attr("disabled",true);
						$("#partnerSubmitReject").attr("disabled",true);
						$("#partnerSubmitAccept").html("Accept");
						console.log("hilang")
					}

					$("#partnerSubmitAccept").attr("onclick","submitPartnerProgressAccept("+ result.partner.id + ',' + value.history_status+")")
			  		$("#partnerSubmitReject").attr("onclick","submitPartnerProgressReject("+ result.partner.id + ',' + value.history_status +")")
		  		}
			})
		
		  	
			// });
		}
	})
}

function init_advanced(id_candidate){
	$("#controlModerator").show();
	$.ajax({
		type:"GET",
		url:"{{env('API_LINK_CUSTOM')}}/partner/getDetailPartnerList",
		data:{
			id_candidate:id_candidate
		},
		success: function(result){
			// $.each(result.partner,function(index,value){
				$("#informationTitle").html('<span class="badge badge-info">'+result.partner.status+'</span>')

				var append = ""
			  	append = append + '<ul>'
			  	if (result.partner.latest_education == null) {
			  		append = append + '<li> <span>Lastest Education</span>'+ ' - ' +' </li>'
			  	}else{
			  		append = append + '<li> <span>Lastest Education</span>'+ result.partner.latest_education +' </li>'
			  	}
			  	append = append + '<li> <span>Job Category picked</span>'
			  	append = append + '<ul>'
			  	
			  	if (result.partner.category.length == 0) {
			  		append = append + ' - '
			  	}else{
			  		$.each(result.partner.category, function(key, value){
			  			append = append + '<li>' + value.job_engineer.category_name + '</li>'
			  		})
			  	}
			  
			  	append = append + '</ul>'
			  	append = append + '</li>'
				append = append + '</ul>'		

			  	$("#basic-information").html(append)

			  	$("#filesTitleAttach").html('Attachment Portofolio')

			  	var append2 = ""
			  	append2 = append2 + '<div>'
			  	if (result.partner.portofolio_file == null) {
			  		append2 = append2 + '<span> - </span>'
			  	}else{
			  		append2 = append2 +	'<a href="{{env("API_LINK_CUSTOM_PUBLIC")}}/'+ result.partner.portofolio_file +'" target="_blank"><i class="fa fa-file fa-4x" aria-hidden="true"></i>'
			  	}
				append2 = append2 + '</a></div>'

				$("#previewKtp").attr("onclick","previewKtp()")

			  	$("#filesContentAttach").html(append2)

			  	$("#boxSubmitPartner").empty("")
			  	$("#DisclaimerEnglish").html("Selanjutnya dalam tahap advance information, calon engineer akan di saring melalui latar belakang pendidikan, kategori pekerjaan dan portofolio yang telah di upload, berserta lokasi area yang dia pilih untuk pekerjaanya. Dengan demikian kita dapat menyeleksi engineer dengan kebutuhan kemampuan yang tepat dan lokasi yang akurat.")
		  		$("#DisclaimerIndo").html("<i> Furthermore, in the advanced information stage, the prospective engineer will be filtered through his educational background, job categories and uploaded portfolios, along with the location of the area he has chosen for his work. Thus we can select engineers with the need for the right capabilities and accurate location.</i>")
			  	$.each(result.partner_progress,function(index,value){
			  		if (index === 0) {
			  			var button = "";
						button = button + '<button id="partnerSubmitAccept" class="btn btn-outline-success ml-auto"><span>Accept</span></button>'
						button = button + '<button id="partnerSubmitReject" class="btn btn-danger btn-outline-danger ml-auto"><span>Reject</span></button>'
						
						$("#boxSubmitPartner").append(button)
						$("#boxSubmitPartner > button").css("margin","10px")

			  			if(value.history_status == "3"){
				  			$("#partnerSubmitAccept").attr("disabled",false);
							$("#partnerSubmitReject").attr("disabled",false);
							$("#partnerSubmitAccept").html("Accept");
							console.log("hilang")
						}else{
							$("#partnerSubmitAccept").attr("disabled",true);
							$("#partnerSubmitReject").attr("disabled",true);
						}

						$("#partnerSubmitAccept").attr("onclick","submitPartnerProgressAccept("+ result.partner.id + ',' + value.history_status+")")
		  				$("#partnerSubmitReject").attr("onclick","submitPartnerProgressReject("+ result.partner.id + ',' + value.history_status +")")
			  		}
				})
			// });
		}
	})
}

function init_interview(id_candidate){
	$("#controlModerator").show();
	$.ajax({
		type:"GET",
		url:"{{env('API_LINK_CUSTOM')}}/partner/getDetailPartnerList",
		data:{
			id_candidate:id_candidate
		},
		success: function(result){
				$("#informationTitle").html('<span class="badge badge-success">Interview Information</span>')

			  	var append = ""
			  	append = append + '<ul>'
			  	if (result.partner.interview == null) {
			  		append = append + '<li><span> Schedule date</span> - </li>'
				  	append = append + '<li><span> Schedule time</span> Until Finish </li>'
				  	append = append + '<li><span> Media </span> <a href="#"> - </a></li>'
			  	}else{
			  		append = append + '<li><span> Schedule date</span>'+ moment(result.partner.interview.interview_date).format('dddd, MMMM Do YYYY')+' </li>'
				  	append = append + '<li><span> Schedule time</span>'+ moment(result.partner.interview.interview_date).format('h:mm:ss')+' WIB - Finish </li>'
				  	append = append + '<li><span> Media </span><label style="color:blue">'+ result.partner.interview.interview_link +'<label></li>'
			  	}
			  	
			  	append = append + '<li><span>Interviewer </span> Moderator</li>'
			  	append = append + '<li> Result'
			  	append = append + '<ul>'
			  	append = append + '<li>'
			  	if (result.partner.interview == null) {
			  		append = append + ' - '
			  	}else{
			  		if (result.partner.interview.interview_result == null) {
			  			append = append + ' - '
			  		}else{
			  			append = append + result.partner.interview.interview_result
			  		}
			  	}
			  	append = append + '</li>'
			  	append = append + '</ul>'
			  	append = append + '</li>'
				append = append + '</ul>'	

				$("#basic-information").html(append)

				$("#filesTitleAttach").html("<span>Set Schedule Interview Partner </span>");

				$("#filesContentAttach").empty("")
				var appends = ""
				// appends = appends + '<div class="ul-basic">'
				// appends = appends + '<ul>'
				// appends = appends +	'<li><span id="partnerName"><i class="fas fa-user"></i> Name </span>'+ result.partner.name +'</li>'	
				// appends = appends + '<li><span id="partnerPhone"><i class="fas fa-phone"></i> Phone</span>'+ result.partner.phone +'</li>'
				// if (result.partner.candidate_account_name == null) {
				// 	appends = appends + '<li><span id="partnerAddress"><i class="fa fa-credit-card" aria-hidden="true"></i> Account Name</span> - </li>'
				// 	appends = appends + '<li><span id="partnerAccName"><i class="fa fa-university" aria-hidden="true"></i> Account Number</span> - </li>'
				// }else{
				// 	appends = appends + '<li><span id="partnerAddress"><i class="fa fa-credit-card" aria-hidden="true"></i> Account Name</span>'+ result.partner.candidate_account_name +'</li>'
				// 	appends = appends + '<li><span id="partnerAccName"><i class="fa fa-university" aria-hidden="true"></i> Account Number</span>'+ result.partner.candidate_account_number +'</li>'
				// }
				
				// appends = appends + '<li><span id="partnerAccNumber"><i class="fas fa-building"></i>  Address</span>'+ result.partner.address +'</li>'
				// appends = appends + '</ul>'
				// appends = appends + '</div>'	

				appends = appends + '<br>'

				appends = appends + '<span><strong class="d-inline-block text-primary">Set Interview Schedule</strong> <i class="fa fa-chevron-circle-right" id="toggle-schedule"></i></span><br><br>'

				appends = appends + '<div id="box-dateTime">'

				appends = appends + '<span>Schedule date & time :</span>'
				appends = appends + '<input class="form-control" type="text" id="datetimepicker1"><br>'

				// appends = appends + '<span>Media Interview</span>'
				// appends = appends + '<input class="form-control type="text" id="input-Media"/><br>'

				// appends = appends + '<span>Media link</span>'
				// appends = appends + '<input class="form-control type="text" id="input-Interviewer"/>'

				appends = appends + '</div>'

				appends = appends + '<br><span><strong class="d-inline-block text-primary">Set Interview Result</strong> <i class="fa fa-chevron-circle-right" id="toggle-result"></i></span><br><br>'

				appends = appends + '<div id="box-result" class="hided">'

				appends = appends + '<span>Interview Result</span>'
				appends = appends + '<textarea id="textAreaResult" class="form-control type="text></textarea>'

				appends = appends + '</div>'

				$("#filesContentAttach").append(appends);

			  	$('#datetimepicker1').daterangepicker({
			  		"alwaysShowCalendars": true,
					"singleDatePicker": true,
					"timePicker": true,
					"startDate": new Date(),
					locale: {
					    format: 'YYYY-MM-DD HH:mm'
					  },
					}, function(start, end, label) {
					console.log('New date range selected: ' + start.format('YYYY-MM-DD HH:mm:ss') +')');
				});

			  	$( "#toggle-schedule" ).click(function() {
			  		console.log("clicked")
			  		$( "#box-dateTime" ).toggle(function() {
					    $( this ).addClass( "hided" );
					}, function() {
					    $( this ).removeClass( "showed" );
					});
			  	})
				
				$( "#toggle-result" ).click(function() {
			  		console.log("clicked")
			  		$( "#box-result" ).toggle(function() {
					    $( this ).addClass( "hided" );
					}, function() {
					    $( this ).removeClass( "showed" );
					});
			  	})
				

			  	$("#boxSubmitPartner").empty("")
			  	$("#DisclaimerEnglish").html("Interview dilakukan sebagai tahap akhir dari evaluasi engineer. Evaluasi terdiri dari validasi pemahaman materi, validasi category, validasi pendidikan terakhir, validasi persiapan perangkat, validasi lokasi hingga validasi personal. Jadi engginer yang nantinya akan join diharapkan memiliki standart yang sudah sesuai dengan category yang dia pilih sebelumnya.")
		  		$("#DisclaimerIndo").html("<i>  The interview is conducted as the final stage of the engineer evaluation. Evaluation consists of material understanding validation, category validation, latest education validation, device preparation validation, location validation to personal validation. So the engineer who will join is expected to have a standard that is in accordance with the category he previously selected.</i>")
			  	$.each(result.partner_progress,function(index,value){
			  		if (index === 0) {
			  			var button = "";
						button = button + '<button id="partnerSetSchedule" class="btn btn-outline-success ml-auto"><span>Set Schedule</span></button>'
						button = button + '<button id="partnerSetResult" class="btn btn-outline-warning ml-auto"><span>Result</span></button>'
						button = button + '<button id="partnerSetAgree" class="btn btn-outline-secondary ml-auto"><span>Agreement</span></button>'
						button = button + '<button id="partnerSubmitReject" class="btn btn-danger btn-outline-danger ml-auto"><span>Reject</span></button>'
						
						$("#boxSubmitPartner").append(button)
						$("#boxSubmitPartner > button").css("margin","10px")

			  			if(value.history_status == "4"){
				  			$("#partnerSetSchedule").attr("disabled",false);
							$("#partnerSubmitReject").attr("disabled",true);
							$("#partnerSetSchedule").attr("onclick","submitPartnerSetSchedule("+ result.partner.id + ")")
							$("#partnerSetAgree").attr("disabled",true);
							$("#partnerSetResult").attr("disabled",true);
						}else if(value.history_status == "5"){
							$("#partnerSetResult").attr("disabled",true);
							$("#partnerSetSchedule").html("Start Room");
							$("#partnerSetSchedule").attr("onclick","submitPartnerStartRoom("+ result.partner.id + ',' + '"' +result.partner.interview.interview_link + '"' + ")");
				  			$("#partnerSetAgree").attr("disabled",true);
						}else if(value.history_status == "6"){
								$("#partnerSetAgree").attr("disabled",false);
								$("#partnerSetSchedule").attr("disabled",true);
								$("#partnerSubmitReject").attr("disabled",false);
							if (result.partner.interview.interview_result == null) {
								$("#box-result").addClass("showed");
					  			$("#partnerSetResult").attr("disabled",false);
								$("#partnerSetResult").attr("onclick","submitPartnerSetResult("+ result.partner.id +")");
							}else{
								$("#box-result").addClass("hided");
					  			$("#partnerSetResult").attr("disabled",true);
							}
						}else{
							$("#partnerSetSchedule").attr("disabled",true);
				  			$("#partnerSetResult").attr("disabled",true);
				  			$("#partnerSetAgree").attr("disabled",true);
							$("#partnerSubmitReject").attr("disabled",true);
						}
						$("#partnerSubmitAccept").attr("onclick","submitPartnerProgressAccept("+ result.partner.id + ',' + value.history_status+")")
		  				$("#partnerSubmitReject").attr("onclick","submitPartnerProgressReject("+ result.partner.id + ',' + value.history_status +")")
		  				$("#partnerSetAgree").attr("onclick","submitPartnerAgreement("+ result.partner.id + ',' + value.history_status +")")
		  				
		  				$( "#dataTable tbody" ).on( "click", "tr", function() {
						  console.log( $( this ).text() );
						});

			  		}
				})

				$("#partnerSetSchedule").click(function(id){
					
  					// var words = ($("#datetimepicker1").val().split(/(\s+|\(|\)|\!)/)).filter(function(n) {return n.trim()});

					
				})
			$.each(result.partner_progress,function(index,value){
				if (value.history_status == 5) {
					$("#box-dateTime").addClass( "hided");
				}
			})
		}
	})
}

function init_agreement(id_candidate){
	$.ajax({
		type:"GET",
		url:"{{env('API_LINK_CUSTOM')}}/partner/getDetailPartnerList",
		data:{
			id_candidate:id_candidate
		},
		success: function(result){
				$("#informationTitle").html('<span class="badge badge-success">Agreement Information</span>')

				$("#basic-information").empty("")

				$("#filesTitleAttach").html("<span>Information of Partner Agreement </span>");

				$("#filesContentAttach").empty("")
				var appends = ""
				appends = appends + '<div class="ul-basic">'
				appends = appends + '<ul>'
				// appends = appends +	'<li><span id="partnerName"><i class="fas fa-user"></i> Name </span>'+ result.partner.name +'</li>'	
				// appends = appends + '<li><span id="partnerPhone"><i class="fas fa-phone"></i> Phone</span>'+ result.partner.phone +'</li>'
				if (result.partner.candidate_account_name == null) {
					appends = appends + '<li><span id="partnerAddress"><i class="fa fa-credit-card" aria-hidden="true"></i> Bank Name</span> - </li>'
					appends = appends + '<li><span id="partnerAccName"><i class="fa fa-university" aria-hidden="true"></i> Account Number</span> - </li>'
					appends = appends + '<li><span id="partnerAccAlias"><i class="fa fa-user" aria-hidden="true"></i> Account Alias</span> - </li>'
				}else{
					appends = appends + '<li><span id="partnerAddress"><i class="fa fa-credit-card" aria-hidden="true"></i> Bank Name</span>'+ result.partner.candidate_account_name +'</li>'
					appends = appends + '<li><span id="partnerAccName"><i class="fa fa-university" aria-hidden="true"></i> Account Number</span>'+ result.partner.candidate_account_number +'</li>'
					appends = appends + '<li><span id="partnerAccAlias"><i class="fa fa-user" aria-hidden="true"></i> Account Alias</span>'+ result.partner.candidate_account_alias  +'</li>'
				}
				
				// appends = appends + '<li><span id="partnerAccNumber"><i class="fas fa-building"></i>  Address</span>'+ result.partner.address +'</li>'
				appends = appends + '</ul>'
				appends = appends + '</div>'	

				$("#filesContentAttach").append(appends);

				$("#controlModerator").hide();

			  	$("#boxSubmitPartner").empty("")

			  	$("#DisclaimerEnglish").html("kosong")
		  		$("#DisclaimerIndo").html("<i>empty</i>")

		}
	})
}

function submitPartnerProgressAccept(id,status){
	if (status == 1) {
		Swal.fire({
	        title: 'Are you sure?',
	        text: "to Accept Join Partner Basic Step!",
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
	          fd.append('status','OK Basic');
	          fd.append('id_candidate',id);
	          fd.append('history_user',0);
	          fd.append('history_status',2);

	          $.ajax({
	            type:"POST",
	            url:"{{env('API_LINK_CUSTOM')}}/join/postSubmitPartner",
	            data:fd,
	            contentType: false,
	            processData: false,
	            success: function (result){
	              Swal.showLoading()
	              localStorage.clear();
	              Swal.fire(
	                'Thank You!',
	                'You`ve Accepted Join Partner Basic Step!.',
	                'success'
	              ).then((result) => {
	                if (result.value) {
	                  location.reload()
	                }
	              })
	            }
	          })
	        }
	      });
	}else if (status == 3) {
	  	Swal.fire({
	        title: 'Are you sure?',
	        text: "to Accept Join Partner Advance Step!",
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
	          fd.append('status','OK Advance');
	          fd.append('id_candidate',id);
	          fd.append('history_user',0);
	          fd.append('history_status',4);

	          $.ajax({
	            type:"POST",
	            url:"{{env('API_LINK_CUSTOM')}}/join/postSubmitPartner",
	            data:fd,
	            contentType: false,
	            processData: false,
	            success: function (result){
	              Swal.showLoading()
	              localStorage.clear();
	              Swal.fire(
	                'Thank You!',
	                'You`ve Accepted Join Partner Advance Step!',
	                'success'
	              ).then((result) => {
	                if (result.value) {
	                  // location.reload()
	                  window.location.reload("https://172.16.1.200:8080/partner/detail/"+ id +"#interview")
	                }
	              })
	            }
	          })
	        }
	      });
	}
}

function submitPartnerProgressReject(id,status){
	if (status == 1) {
		Swal.fire({
	        title: 'Are you sure?',
	        text: "to Reject Next Step!",
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
	          fd.append('status','Reject');
	          fd.append('id_candidate',id);
	          fd.append('history_user',0);
	          fd.append('history_status',2);

	          $.ajax({
	            type:"POST",
	            url:"{{env('API_LINK_CUSTOM')}}/join/postSubmitPartner",
	            data:fd,
	            contentType: false,
	            processData: false,
	            success: function (result){
	              Swal.showLoading()
	              localStorage.clear();
	              Swal.fire(
	                'Thank You!',
	                'You`ve Rejected Join Partner Next Step!.',
	                'error'
	              ).then((result) => {
	                if (result.value) {
	                  location.reload()
	                }
	              })
	            }
	          })
	        }
	      });
	}else if (status == 3) {
		Swal.fire({
	        title: 'Are you sure?',
	        text: "to Reject Next Step!",
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
	          fd.append('status','Reject');
	          fd.append('id_candidate',id);
	          fd.append('history_user',0);
	          fd.append('history_status',2);

	          $.ajax({
	            type:"POST",
	            url:"{{env('API_LINK_CUSTOM')}}/join/postSubmitPartner",
	            data:fd,
	            contentType: false,
	            processData: false,
	            success: function (result){
	              Swal.showLoading()
	              localStorage.clear();
	              Swal.fire(
	                'Thank You!',
	                'You`ve Rejected Join Partner Next Step!.',
	                'error'
	              ).then((result) => {
	                if (result.value) {
	                  location.reload()
	                }
	              })
	            }
	          })
	        }
	      });
	}
}

function submitPartnerSetSchedule(id){
	console.log($("#datetimepicker1").val())
	console.log($("#input-Interviewer").val())
	console.log($("#input-Media").val())
	Swal.fire({
        title: 'Send Now?',
        text: "Please fill your information correctly before submit!",
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
          fd.append('id_candidate',id);
          fd.append('history_user',0);
          fd.append('history_status',5);
          fd.append('interview_date',$("#datetimepicker1").val())
          fd.append('interview_media',$("#input-Media").val())
          fd.append('interview_link',$("#input-Interviewer").val())
          fd.append('status_interview',"not started")

          $.ajax({
            type:"POST",
            url:"{{env('API_LINK_CUSTOM')}}/join/postScheduleInterview",
            data:fd,
            contentType: false,
            processData: false,
            success: function (result){
              Swal.showLoading()
              localStorage.clear();
              Swal.fire(
                'Thank You!',
                'You`ve Sent infromation to Partner Join Interview!.',
                'success'
              ).then((result) => {
                if (result.value) {
                  location.reload()
                }
              })
            }
          })
        }
      });
}

function submitPartnerStartRoom(id,link){
	Swal.fire({
        title: 'Start Room Now?',
        text: "You`ll direct to Interviewes Room!",
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
          fd.append('id_candidate',id);
          fd.append('history_user',0);
          fd.append('history_status',6);
          fd.append('status','OK Advance');
          fd.append('status_interview','started');

          $.ajax({
            type:"POST",
            url:"{{env('API_LINK_CUSTOM')}}/join/postStartInterview",
            data:fd,
            contentType: false,
            processData: false,
            success: function (result){
              location.reload();
              window.open(link, '_blank');
              // window.location.replace(link);
            }
          })
        }
      });
}

function submitPartnerSetResult(id){
	Swal.fire({
        title: 'Are You Sure?',
        text: "Submit the result of interview!",
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
          fd.append('id_candidate',id);
          fd.append('interview_result', $("#textAreaResult").val());

          $.ajax({
            type:"POST",
            url:"{{env('API_LINK_CUSTOM')}}/join/postResultInterview",
            data:fd,
            contentType: false,
            processData: false,
            success: function (result){
            	location.reload();
            }
          })
        }
      });
}

function submitPartnerAgreement(id){
	Swal.fire({
        title: 'Are You Sure?',
        text: "Complete this !",
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
          fd.append('id_candidate',id);
          fd.append('history_user',0);
          fd.append('history_status',7);
          fd.append('status','OK Interview');

          $.ajax({
            type:"POST",
            url:"{{env('API_LINK_CUSTOM')}}/join/postAgreementInterview",
            data:fd,
            contentType: false,
            processData: false,
            success: function (result){
            	// window.location.href = "{{url('engineer/index')}}"
            	location.reload();
            }
          })
        }
      });
}

function fillProgress(id_candidate){
	$.ajax({
		type:"GET",
		url:"{{env('API_LINK_CUSTOM')}}/partner/getDetailPartnerList",
		data:{
			id_candidate:id_candidate
		},
		success: function(result){
			$("#PartnerDetailProgress").empty("")
			$.each(result.partner_progress,function(index,value){
				var append = ""
				if(index == 0){
				  	append = append + '<li class="active list-group-item d-inline-flex">'
				  	append = append +  moment(value.history_date).format('DD MMMM - HH:mm')
				  	if (value.history_user == 0) {
				  		append = append + ' [Moderator] - '
				  	}else{
				  		append = append + " [" + value.engineer[0].name + "] - "
				  	}
				  	append = append + value.history_detail
				  	append = append + '</li>'
			  	}else{
			  		append = append + '<li class="list-group-item">'
				  	append = append +  moment(value.history_date).format('DD MMMM - HH:mm')
				  	if (value.history_user == 0) {
				  		append = append + ' [Moderator] - '
				  	}else{
				  		append = append + " [" + value.engineer[0].name + "] - "
				  	}
				  	append = append + value.history_detail
				  	append = append + '</li>'
			  	}

			  	$("#PartnerDetailProgress").append(append)
			});
		}
	})
}

$(document).ready(function(){
	var id_candidate = window.location.href.split("/")[5].replace('#','').split("h")[0];
	// console.log(id_candidate)

	var positionTab = "";

	if (window.location.href.split("/")[5].split("#")[1] === undefined) {
		init_basic(window.location.href.split("/")[5].replace('#','').split("h")[0])
		$("#basic-tab").addClass("active")
	} else if (window.location.href.split("/")[5].split("#")[1] == "advance") {
		init_advanced(id_candidate)
		init_advanced(window.location.href.split("/")[5].replace('#','').split("h")[0])
		$("#advanced-tab").addClass("active")
	} else if(window.location.href.split("/")[5].split("#")[1] == "interview"){
		init_interview(id_candidate)
		init_interview(window.location.href.split("/")[5].replace('#','').split("h")[0])
		$("#interview-tab").addClass("active")
	} else if (window.location.href.split("/")[5].split("#")[1] == "agreement") {
		init_agreement(id_candidate)
		init_agreement(window.location.href.split("/")[5].replace('#','').split("h")[0])
		$("#agreement-tab").addClass("active")
	}

	// init_basic(id_candidate)	
	fillProgress(id_candidate)
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
	  var currId = $(e.target).attr("id");
	  $('#lastTab').html(currId);
	  
	  if (currId == "basic-tab") {
	 	init_basic(window.location.href.split("/")[5].replace('#','').split("h")[0])
	  }
	  if (currId == "advanced-tab") {
	  	init_advanced(id_candidate)
	  	init_advanced(window.location.href.split("/")[5].replace('#','').split("h")[0])

	  }else if(currId == "interview-tab"){
	  	init_interview(id_candidate)
	  	init_interview(window.location.href.split("/")[5].replace('#','').split("h")[0])
	  }else if (currId == "agreement-tab") {
	  	init_agreement(id_candidate)
	  	init_agreement(window.location.href.split("/")[5].replace('#','').split("h")[0])
	  }

	  // localStorage.setItem('activeTab', $(e.target).attr('href'));
	  });
	  // var activeTab = localStorage.getItem('activeTab');
	  // if(activeTab){
	  //      $('#myTab a[href="' + activeTab + '"]').tab('show');
	  // }

	fillProgress(window.location.href.split("/")[5].replace('#','').split("h")[0]);
})

</script>
@endsection