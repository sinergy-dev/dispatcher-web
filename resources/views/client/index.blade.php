@extends('layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
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
			<div class="col-md-8">
				<div class="d-inline-flex  align-items-center">
					<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-plus"></i> Add Client</button>
					<h3 class="ml-3" style="margin-bottom: 0px !important">Client List</h3>
				</div>
			</div>
			<div class="col-md-4">
				<div class="d-inline-flex pb-3 border-bottom">
					<div class="btn-group" role="group">
						<button id="jobShowCount" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Show 10</button>
						<div class="dropdown-menu" id="jobShowCountList">
							<span class="dropdown-item active pointer" onclick="changeJobShowCount(10)">10 List</span>
							<span class="dropdown-item pointer" onclick="changeJobShowCount(25)">25 List</span>
							<span class="dropdown-item pointer" onclick="changeJobShowCount(50)">50 List</span>
						</div>
					</div>
					<div class="ml-2 input-group">
						<input type="text" id="jobSearch" class="form-control" placeholder="Search">
						<div class="input-group-append">
							<button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row resultSearch" style="display: none;">
			<div class="col-md-6 mb-2 mt-1">
				<p class="mb-0 resultSearchCount">12 result</p>
			</div>
			<div class="col-md-6 text-right mb-2 mt-1">
				<p class="mb-0 resultSearchKeyword">Search for : BPJS Kesehatan</p>
			</div>
		</div>
		<div class="row">
			<!-- <div class="col-md-6" id="jobHolder"> -->
			<div class="col-md-12">
					<table class="table table-striped" id="datatable-client">
					  <thead>
					    <tr>
					      <th scope="col">No</th>
					      <th scope="col">Client</th>
					      <th scope="col">Headquarter</th>
					      <th scope="col">Address</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody id="tbody-client">
					  </tbody>
					</table>
				</div>
				<div class="col-md-12" id="paginationJob">
					<nav aria-label="Page navigation example" class="ml-auto">
						<ul class="pagination justify-content-end" id="jobPaginateHolder">
							<li class="page-item"><a class="page-link" href="#">Previous</a></li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item"><a class="page-link" href="#">Next</a></li>
						</ul>
					</nav>
				</div>
			<div class="col-md-6" id="jobSumaryHolder" style="display: none">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body d-flex flex-column align-items-start">
							<h5 class="card-title border-bottom">Job Sumary</h5>
							<div class="card-text">
								<strong class="d-inline-block text-primary" id="jobSumaryHolderCustomer">PT. Sinergy Informasi Pratama</strong>
								<h2 class="mb-2" id="jobSumaryHolderTitle">
									Create Internal Software
								</h2>
								<h5>Job Description</h5>
								<p id="jobSumaryHolderDescription">
								</p>
								<h5>Job Requirement</h5>
								<p id="jobSumaryHolderRequirement">
								</p>
								<p>
									<span id="jobSumaryHolderAddress"><i class="fas fa-building"></i> Head Quarter - PT. Sinergy Informasi Pratama </span><br>
									<span id="jobSumaryHolderLocation"><i class="fas fa-map-marker"></i> Kembangan - Jakarta Barat - Jakarta </span><br>
									<span id="jobSumaryHolderLevel"><i class="fas fa-signal"></i> Level 3 </span><br>
									<span id="jobSumaryHolderDuration"><i class="fas fa-calendar-alt"></i> 1 Desember - 21 Desember 2020 </span><br>
								</p>
							</div>
							<a href="#" class="btn btn-primary ml-auto" id="jobSumaryHolderButton">Show More</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Create New Client</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="needs-validation" novalidate="">
					<div>
						<input type="" name="id_type" id="id_type" value="1" hidden>
						<div class="mb-3">
							<label for="client">Client Legal Name</label>
							<input type="text" class="form-control" name="name_client" id="name_client" required>
							<div class="invalid-feedback">
								Please Fill a Name Client.
							</div>
						</div>

						<div class="row">
							<div class="col-md-4 mb-3">
								<label for="country">Region</label>
								<select class="custom-select d-block w-100" id="inputJobRegion" required="" style="width: 100%">
									<option value="">Choose...</option>
								</select>
							</div>
							<div class="col-md-4 mb-3">
								<label for="state">Area</label>
								<select class="custom-select d-block w-100" id="inputJobArea" required="" style="width: 100%" disabled>
									<option value="">Choose...</option>
								</select>
							</div>
							<div class="col-md-4 mb-3">
								<label for="zip">Location</label>
								<select class="custom-select d-block w-100" id="inputJobLocation" required="" style="width: 100%" disabled>
									<option value="">Choose...</option>
								</select>
							</div>
						</div>

						<div class="mb-3">
							<label for="client">PIC Name</label>
							<input type="text" class="form-control" name="pic_name_client" id="pic_name_client" required>
							<div class="invalid-feedback">
								Please Fill a PIC Name Client.
							</div>
						</div>

						<div class="mb-3">
							<label for="client">PIC Contact</label>
							<input type="Number" class="form-control" name="pic_contact_client" id="pic_contact_client" required>
							<div class="invalid-feedback">
								Please Fill a Number PIC Client.
							</div>
						</div>

						<div class="mb-3">
							<label for="client">PIC Email</label>
							<input type="text" class="form-control" name="pic_email_client" id="pic_email_client" required>
							<div class="invalid-feedback">
								Please Fill a PIC Email Client.
							</div>
						</div>

						<div class="mb-3">
							<label for="client">Address</label>
							<textarea class="form-control" id="adress_client" name="adress_client">
								
							</textarea>
							<div class="invalid-feedback">
								Please Fill an Address Client.
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary btn-save" id="saveBtn" onclick="saveBtn()">Save</button>
			</div>
		</div>
	</div>
</div>
<!--datatable-->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script type="text/javascript" src="https://getbootstrap.com/docs/4.1/assets/js/vendor/holder.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
	// Jquery Dependency

	$(document).ready(function(){

		fillDataClient("client/getClientList?","GET")

		$("#jobSearch").on('change',function(){
			if($("#jobSearch").val() != ""){
				console.log($("#jobSearch").val());
				fillDataClient("client/getClientList/search?search=" + $("#jobSearch").val(),"GET")
			} else {
				fillDataClient("client/getClientList?","GET")
				// $(".resultSearch").hide()
			}
		})

		$("#inputJobClient").select2({
			theme: 'bootstrap4',
			ajax: {
				url: "{{env('API_LINK_CUSTOM_PUBLIC')}}/job/createJob/getParameterClientAll",
				dataType: 'json',
			}
		});

		$("#inputJobRegion").select2({
			theme: 'bootstrap4',
			ajax: {
				url: "{{env('API_LINK_CUSTOM_PUBLIC')}}/job/createJob/getParameterLocationAll",
				dataType: 'json',
			}
		});

		$("#inputJobRegion").on('select2:select', function (e) {
			var id_region = e.params.data.id;
			$("#inputJobArea").prop("disabled", false)
			$("#inputJobArea").select2({
				theme: 'bootstrap4',
				ajax: {
					url: "{{env('API_LINK_CUSTOM_PUBLIC')}}/job/createJob/getParameterLocationAll?level=2&region=" + id_region,
					dataType: 'json',
				}
			});
		})

		$("#inputJobArea").on('select2:select', function (e) {
			var id_area = e.params.data.id;
			$("#inputJobLocation").prop("disabled", false)
			$("#inputJobLocation").select2({
				theme: 'bootstrap4',
				ajax: {
					url: "{{env('API_LINK_CUSTOM_PUBLIC')}}/job/createJob/getParameterLocationAll?level=3&area=" + id_area,
					dataType: 'json',
				}
			});
		})

		$("#inputJobPic").select2({
			theme: 'bootstrap4',
			ajax: {
				url: "{{env('API_LINK_CUSTOM_PUBLIC')}}/job/createJob/getParameterPicAll",
				dataType: 'json',
			}
		})

		$("#inputJobLevel").select2({
			theme: 'bootstrap4',
			ajax: {
				url: "{{env('API_LINK_CUSTOM_PUBLIC')}}/job/createJob/getParameterLevelAll",
				dataType: 'json',
			}
		})

		$("#inputJobCategory").select2({
			theme: 'bootstrap4',
			ajax: {
				url: "{{env('API_LINK_CUSTOM_PUBLIC')}}/job/createJob/getParameterCategoryAll",
				dataType: 'json',
			}
		})

		$("#inputJobRangeDate").daterangepicker({
			"locale": {
				"format": "DD/MM/YYYY"
			}
		})

		$("input[data-type='currency']").on({
				keyup: function() {
					formatCurrency($(this));
				},
				blur: function() { 
					formatCurrency($(this), "blur");
				}
		});

		$('input[type=radio][name=paymentMethod]').change(function() {
			if (this.value == 'base') {
				$("#basePaymentInput").show()
				$("#rangePaymentInput").hide()
			}
			else if (this.value == 'range') {
				$("#rangePaymentInput").show()
				$("#basePaymentInput").hide()

			}
		});

	})

	function fillDataClient(url,method){
		$.ajax({
			type:method,
			url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/" + url + "&per_page=" + $("#jobShowCount").text().split(" ")[1],
			success: function (result) {
				var n = 25

				$('#tbody-client').empty();

	            var table = "";

	            $no=1;

	            $.each(result['data'], function(key, value){
	              table = table + '<tr>';
		          table = table + '<td>' + $no++ + '</td>';
		          if ( value.customer_name == null) {
		          	table = table + '<td>' + ' -' + '</td>';
		          }else{
		          	table = table + '<td>' + value.customer_name + '</td>';
		          }
		          table = table + '<td>' + value.customer_name + '</td>';
		          if (value.location_client ==  null) {
		          	table = table + '<td>' + '' + '</td>';
		          }else{
		          	table = table + '<td>' + value.location_client.location_name + '</td>';
		          }
		          table = table + '<td>' + value.address + '</td>';
		          table = table + '<td>' + '<button class="btn btn-sm btn-primary">Detail</button>' + '</td>';
	              table = table + '</tr>';
	            });

	            $('#tbody-client').append(table);

				$("#jobPaginateHolder").empty("")
				var previous = "",next = "", first,second,third,first_active = "",second_active = "",third_active = ""
				var first_onclick = "onclick=fillDataClient('" + url + "&page=" + (result["current_page"] - 1) + "','" + method + "')"
				var second_onclick = "onclick=fillDataClient('" + url + "&page=" + (result["current_page"]) + "','" + method + "')"
				var third_onclick = "onclick=fillDataClient('" + url + "&page=" + (result["current_page"] + 1) + "','" + method + "')"
				
				if(result["current_page"] == 1){
					previous = "disabled"
					first = result["current_page"],first_active = "active"
					second = result["current_page"] + 1 
					third = result["current_page"] + 2

					var first_onclick = "onclick=fillDataClient('" + url + "&page=" + (result["current_page"]) + "','" + method + "')"
					var second_onclick = "onclick=fillDataClient('" + url + "&page=" + (result["current_page"] + 1) + "','" + method + "')"
					var third_onclick = "onclick=fillDataClient('" + url + "&page=" + (result["current_page"] + 2) + "','" + method + "')"
					var previous_onclick = ""

					if(result["last_page"] == 1){
						next = "disabled"
						var next_onclick = ""
					} else {
						var next_onclick = second_onclick
					}
				} else if (result["current_page"] == result["last_page"]){
					previous = ""
					next = "disabled"
					if(result["last_page"] == 2){
						first = result["current_page"] - 1
						second = result["current_page"], second_active = "active"
						third = result["current_page"]
					} else {
						first = result["current_page"] - 2
						second = result["current_page"] - 1
						third = result["current_page"],third_active = "active"
					}

					var first_onclick = "onclick=fillDataClient('" + url + "&page=" + (result["current_page"] - 2) + "','" + method + "')"
					var second_onclick = "onclick=fillDataClient('" + url + "&page=" + (result["current_page"] - 1) + "','" + method + "')"
					var third_onclick = "onclick=fillDataClient('" + url + "&page=" + (result["current_page"]) + "','" + method + "')"
					var previous_onclick = second_onclick
					var next_onclick = ""

				} else {
					next = ""
					previous = ""
					first = result["current_page"] - 1
					second = result["current_page"],second_active = "active"
					third = result["current_page"] + 1
					var previous_onclick = first_onclick
					var next_onclick = third_onclick

				}
				var append = ""
				append = append + '<li class="page-item ' + previous + '" ' + previous_onclick + '><span class="page-link">Previous</span></li>'
				append = append + '<li class="page-item ' + first_active + '" ' + first_onclick + '><span class="page-link">' + first + '</span></li>'
				if(result["last_page"] > 1){
					append = append + '<li class="page-item ' + second_active + '" ' + second_onclick + '><span class="page-link">' + second + '</span></li>'
				}
				if(result["last_page"] > 2){
					append = append + '<li class="page-item ' + third_active + '" ' + third_onclick + '><span class="page-link">' + third + '</span></li>'
				}
				append = append + '<li class="page-item ' + next + '" ' + next_onclick + '><span class="page-link">Next</span></li>'
				
				$("#jobPaginateHolder").append(append)
				if($("#jobSearch").val() != ""){
					if(result['total'] == 0){
						$(".resultSearchCount").empty("").text("Not found")
						$("#paginationJob").hide()
					} else {
						$(".resultSearchCount").empty("").text(result["total"] + " results")
					}
					$(".resultSearchKeyword").empty("").text("Search for : " + url.split("=")[1])
					$(".resultSearch").show()
				} else {
					$(".resultSearch").hide()
				}

			}
		})
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

				$("#jobSumaryHolderCustomer").html(result.job.customer.customer_name)
				$("#jobSumaryHolderTitle").html(result.job.job_name)
				$("#jobSumaryHolderDescription").html(result.job.job_description.replace(/(?:\r\n|\r|\n)/g, '<br>'))
				$("#jobSumaryHolderRequirement").html(result.job.job_requrment.replace(/(?:\r\n|\r|\n)/g, '<br>'))
				$("#jobSumaryHolderAddress").html('<i class="fas fa-building"></i> ' + result.job.job_location)
				$("#jobSumaryHolderLocation").html('<i class="fas fa-map-marker"></i> ' + result.job.location.long_location)
				$("#jobSumaryHolderLevel").html('<i class="fas fa-signal"></i> ' + result.job.level.level_name + " - " + result.job.level.level_description)
				$("#jobSumaryHolderDuration").html('<i class="fas fa-calendar-alt"></i> ' + moment(result.job.date_start).format("DD MMMM") + " - " + moment(result.job.date_end))
				
				$("#jobSumaryHolderButton").attr('href','{{url("job/detail/")}}/' + result.job.id)

				$("#jobSumaryHolder").show()
			}
		});
	}

	function showAddPIC(){
		$("#pic").attr("disabled","true")
		$("#addPICField").show()

	}

	function finalize(){
		var splited = $("#inputJobRangeDate").val().split(' - ');
		$.ajax({
			url: "{{env('API_LINK_CUSTOM_PUBLIC')}}/job/createJob/getParameterFinalize",
			data: {
				id_location:$("#inputJobLocation").select2("data")[0].id,
				id_pic:$("#inputJobPic").select2("data")[0].id,
				id_category:$("#inputJobCategory").select2("data")[0].id
			},
			success: function(result){
				$("#finaliseClient").html($("#inputJobClient").select2("data")[0].text)
				$("#finaliseLocation").html(result.location)
				$("#finalisePic").html(result.pic)
				$("#finalisePicEmail").html(result.pic_email)
				$("#finaliseJobTitle").html($("#inputJobTitle").val())
				$("#finaliseJobCategory").html('<i class="fas fa-hard-hat"></i> ' + result.category)
				$("#finaliseJobLevel").html('<i class="fas fa-signal"></i> ' + $("#inputJobLevel").select2('data')[0].text)
				$("#finaliseJobDuration").html(moment(splited[0],"DD/MM/YYYY").format("DD MMMM") + " - " + moment(splited[1],"DD/MM/YYYY").format("DD MMMM YYYY"))
				$("#finaliseJobDescription").html("<h4>Job Description</h4>" + $("#inputJobDescription").val())
				$("#finaliseJobRequirement").html("<h4>Job Requirement</h4>" + $("#inputJobRequirement").val())
				$("#finaliseJobAddress").html('<h4>Job Address</h4>' + $("#inputJobAddress").val())
				$("#finaliseJobPrice").html($("#inputJobPriceBase").val())
			}
		})
	}

	function saveBtn(){
		Swal.fire({
			title: 'Are you sure?',
			text: "to publish this job",
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
					headers: {
					    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url: "{{env('API_LINK_CUSTOM_PUBLIC')}}/client/postNewClient",
					type:"POST",
					data:{
						_token: "{{ csrf_token() }}",
						customer_name:$("#name_client").val(),
						id_location:$("#inputJobLocation").select2("data")[0].id,
						pic_name:$("#pic_name_client").val(),
						phone:$("#pic_contact_client").val(),
						email:$("#pic_email_client").val(),
						address:$("#adress_client").val(),
					},
					success: function(result){
						Swal.showLoading()
						Swal.fire(
							'Published!',
							'Client has been Added.',
							'success'
						).then((result) => {
							if (result.value) {
								$("#exampleModalCenter").modal('toggle')
							}
						})
					}
				})
			}
		});
	}


</script>

@endsection
