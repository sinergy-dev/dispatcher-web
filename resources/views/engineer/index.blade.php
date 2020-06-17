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
			<div class="col-md-7">

				<div class="pb-3 mb-4 border-bottom">
					<h3>Engineer List</h3>
				</div>
			</div>
			<div class="col-md-2">
				<div class="pb-3 mb-4 border-bottom">
					<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-plus"></i> Create Engineer</button>
				</div>
			</div>
			<div class="col-md-3">
				<div class="pb-3 mb-4 border-bottom">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search">
						<div class="input-group-append">
							<button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- <div class="col-md-6" id="jobHolder"> -->
			<div class="col-md-12">
					<table class="table table-striped" id="datatable-engineer">
					  <thead>
					    <tr>
					      <th scope="col">No</th>
					      <th scope="col">Name</th>
					      <th scope="col">Phone</th>
					      <th scope="col">Email</th>
					      <th scope="col">Address</th>
					      <th scope="col">Coverage Area</th>
					      <th scope="col">Account Name - Number</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody id="tbody-engineer">
					  </tbody>
					</table>
				</div>
				<div class="col-md-12">
					<nav aria-label="Page navigation example" class="ml-auto">
						<ul class="pagination justify-content-end">
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
				<h5 class="modal-title" id="exampleModalLongTitle">Create New Engineer</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="needs-validation" novalidate="">
					<div>
						<input type="" name="id_type" id="id_type" value="1" hidden>
						<div class="mb-3">
							<label for="client">Name</label>
							<input type="text" class="form-control" name="name_eng" id="name_eng" required>
							<div class="invalid-feedback">
								Please Fill a Name Engineer.
							</div>
						</div>

						<div class="mb-3">
							<label for="client">Phone</label>
							<input type="Number" class="form-control" name="number_eng" id="number_eng" required>
							<div class="invalid-feedback">
								Please Fill a Number Phone Engineer.
							</div>
						</div>

						<div class="mb-3">
							<label for="client">Email</label>
							<input type="Email" class="form-control" name="email_eng" id="email_eng" required>
							<div class="invalid-feedback">
								Please Fill an Email Engineer.
							</div>
						</div>

						<div class="mb-3">
							<label for="client">Address</label>
							<textarea class="form-control" id="adress_eng" name="adress_eng">
								
							</textarea>
							<div class="invalid-feedback">
								Please Fill an Address Engineer.
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
							<label for="client">Account Name</label>
							<input type="text" class="form-control" name="account_name" id="account_name" required>
							<div class="invalid-feedback">
								Please Fill an Account Name.
							</div>
						</div>

						<div class="mb-3">
							<label for="client">Account Number</label>
							<input type="number" class="form-control" name="account_number" id="account_number" required>
							<div class="invalid-feedback">
								Please Fill an Account Number.
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

<div class="modal fade" id="DetailModal" tabindex="-1" role="dialog" aria-labelledby="DetailModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Detail Engineer</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="needs-validation" novalidate="">
					<div class="tab">
						<div>
							<img id="photo_eng_detail" style="width: 100px;height: 100px;align-content: center;">
							<input type="" name="id_user_detail" id="id_user_detail" hidden>
							<hr>
							<label><h4><u>Profile</u></h4></label><br>

							<div class="form-group" id="name_eng_detail">
							</div>

							<div class="form-group" id="nik_eng_detail">
							</div>

							<div class="form-group" id="place_of_birth_eng_detail">
							</div>

							<div class="form-group" id="date_of_birth_eng_detail">
							</div>	

							<div class="form-group" id="phone_eng_detail">
							</div>

							<div class="form-group" id="email_eng_detail">
							</div>

							<div class="form-group" id="address_eng_detail">
							</div>

							<label><h5><u>About Jobs</u></h5></label>
							<div class="form-group" id="area_eng_detail">
							</div>

							<div class="form-group" id="acc_eng_detail">
							</div>
						</div>				

					</div>
					<div class="tab" style="display: none;">
						<div>
						<input type="" name="id_type" id="id_type" value="1" hidden>
						<div class="mb-3">
							<label for="client">Name</label>
							<input type="text" class="form-control" name="name_eng_update" id="name_eng_update" required>
							<div class="invalid-feedback">
								Please Fill a Name Engineer.
							</div>
						</div>

						<div class="mb-3">
							<label for="client">Phone</label>
							<input type="Number" class="form-control" name="number_eng_update" id="number_eng_update" required>
							<div class="invalid-feedback">
								Please Fill a Number Phone Engineer.
							</div>
						</div>

						<div class="mb-3">
							<label for="client">Email</label>
							<input type="Email" class="form-control" name="email_eng_update" id="email_eng_update" required>
							<div class="invalid-feedback">
								Please Fill an Email Engineer.
							</div>
						</div>

						<div class="mb-3">
							<label for="client">Address</label>
							<textarea class="form-control" id="adress_eng_update" name="adress_eng_update">
								
							</textarea>
							<div class="invalid-feedback">
								Please Fill an Address Engineer.
							</div>
						</div>

						<div class="mb-3">
							<label for="client">Current Coverage Area</label>
							<div id="current_area_eng_update" name="current_area_eng_update">
							</div>	
						</div>

						<u style="color: blue">Update Coverage Area</u>

						<div class="row">
							<div class="col-md-4 mb-3">
								<label for="country">Region</label>
								<select class="custom-select d-block w-100" id="inputJobRegion_update" style="width: 100%">
									<option value="">Choose...</option>
								</select>
							</div>
							<div class="col-md-4 mb-3">
								<label for="state">Area</label>
								<select class="custom-select d-block w-100" id="inputJobArea_update" style="width: 100%" disabled>
									<option value="">Choose...</option>
								</select>
							</div>
							<div class="col-md-4 mb-3">
								<label for="zip">Location</label>
								<select class="custom-select d-block w-100" id="inputJobLocation_update" style="width: 100%" disabled>
									<option value="">Choose...</option>
								</select>
							</div>
						</div>

						<div class="mb-3">
							<label for="client">Account Name</label>
							<input type="text" class="form-control" name="account_name_update" id="account_name_update" required>
							<div class="invalid-feedback">
								Please Fill an Account Name.
							</div>
						</div>

						<div class="mb-3">
							<label for="client">Account Number</label>
							<input type="number" class="form-control" name="account_number_update" id="account_number_update" required>
							<div class="invalid-feedback">
								Please Fill an Account Number.
							</div>
						</div>
					</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<div class="mr-auto">
					<span class="step" style="display: none;">1. Preview Engineer Data</span>
					<span class="step" style="display: none;">2. Update Engineer Data</span>
				</div>
				<button type="button" class="btn btn-secondary" id="prevBtn" onclick="nextPrev(-1)">Back</button>
				<button type="button" class="btn btn-primary btn-next" id="nextBtn" onclick="nextPrev(1)">Update</button>
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
		$('#datatable-engineer').DataTable();
		$.ajax({
			type:"GET",
			url:"{{env('API_LINK_CUSTOM')}}/engineer/getEngineerList",
			success: function(result){
            $('#tbody-engineer').empty();

            var table = "";

            $no=1;

            $.each(result, function(key, value){
              table = table + '<tr>';
	          table = table + '<td>' + $no++ + '</td>';
	          table = table + '<td>' + value.name + '</td>';
	          table = table + '<td>' + value.phone + '</td>';
	          table = table + '<td>' + value.email + '</td>';
	          table = table + '<td>' + value.address.substring(0,20) + "..." + '</td>';
	          if (value.location_engineer == null) {
	          	table = table + '<td>' + '' + '</td>';
	          	table = table + '<td>' + '' + '</td>';
	          }else{
	          	table = table + '<td>' + value.location_engineer.long_location + '</td>';
	          	table = table + '<td>' + value.payment_acc_engineer.account_name + ' - ' + value.payment_acc_engineer.account_number + '</td>';
	          }
	          table = table + '<td>' + '<button value="'+value.id+'" class="btn btn-sm btn-primary btn-detail">Detail</button>' + '</td>';
              table = table + '</tr>';
            });

            $('#tbody-engineer').append(table);
             
          }
		})

		$("#inputJobClient").select2({
			theme: 'bootstrap4',
			ajax: {
				url: "{{env('API_LINK_CUSTOM')}}/job/createJob/getParameterClientAll",
				dataType: 'json',
			}
		});

		$("#inputJobRegion").select2({
			theme: 'bootstrap4',
			ajax: {
				url: "{{env('API_LINK_CUSTOM')}}/job/createJob/getParameterLocationAll",
				dataType: 'json',
			}
		});

		$("#inputJobRegion").on('select2:select', function (e) {
			var id_region = e.params.data.id;
			$("#inputJobArea").prop("disabled", false)
			$("#inputJobArea").select2({
				theme: 'bootstrap4',
				ajax: {
					url: "{{env('API_LINK_CUSTOM')}}/job/createJob/getParameterLocationAll?level=2&region=" + id_region,
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
					url: "{{env('API_LINK_CUSTOM')}}/job/createJob/getParameterLocationAll?level=3&area=" + id_area,
					dataType: 'json',
				}
			});
		})

		$("#inputJobRegion_update").select2({
			theme: 'bootstrap4',
			ajax: {
				url: "{{env('API_LINK_CUSTOM')}}/job/createJob/getParameterLocationAll",
				dataType: 'json',
			}
		});

		$("#inputJobRegion_update").on('select2:select', function (e) {
			var id_region = e.params.data.id;
			$("#inputJobArea_update").prop("disabled", false)
			$("#inputJobArea_update").select2({
				theme: 'bootstrap4',
				ajax: {
					url: "{{env('API_LINK_CUSTOM')}}/job/createJob/getParameterLocationAll?level=2&region=" + id_region,
					dataType: 'json',
				}
			});
		})

		$("#inputJobArea_update").on('select2:select', function (e) {
			var id_area = e.params.data.id;
			$("#inputJobLocation_update").prop("disabled", false)
			$("#inputJobLocation_update").select2({
				theme: 'bootstrap4',
				ajax: {
					url: "{{env('API_LINK_CUSTOM')}}/job/createJob/getParameterLocationAll?level=3&area=" + id_area,
					dataType: 'json',
				}
			});
		})

		$("#inputJobPic").select2({
			theme: 'bootstrap4',
			ajax: {
				url: "{{env('API_LINK_CUSTOM')}}/job/createJob/getParameterPicAll",
				dataType: 'json',
			}
		})

		$("#inputJobLevel").select2({
			theme: 'bootstrap4',
			ajax: {
				url: "{{env('API_LINK_CUSTOM')}}/job/createJob/getParameterLevelAll",
				dataType: 'json',
			}
		})

		$("#inputJobCategory").select2({
			theme: 'bootstrap4',
			ajax: {
				url: "{{env('API_LINK_CUSTOM')}}/job/createJob/getParameterCategoryAll",
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

	$('#datatable-engineer').on('click', '.btn-detail', function(n){
		console.log(n);
		var btn_detail = this.value;
		$('.btn-next').click(function() {
	        this.value = btn_detail;
	        console.log($('.btn-next').val())
	    });

		$.ajax({
			type:"GET",
			url:"{{env('API_LINK_CUSTOM')}}/engineer/getEngineerList",
			success: function(result){
				$.each(result, function(key, value){
					if (value.id == btn_detail) {
						$("#id_user_detail").val(btn_detail);
						$("#name_eng_detail").html("<li class='fa fa-user fa-large'></li>&nbsp&nbsp" + value.name);
						$("#nik_eng_detail").html("<li class='fa fa-id-card fa-large'></li>&nbsp&nbsp" + value.nik);
						$("#place_of_birth_eng_detail").html("<li class='fa fa-bed fa-large'></li>&nbsp&nbsp" + value.pleace_of_birth);
						$("#date_of_birth_eng_detail").html("<li class='fa fa-calendar fa-large'></li>&nbsp&nbsp" + moment(value.date_of_birth).format("DD MMMM YYYY") );
						$("#phone_eng_detail").html("<li class='fa fa-phone fa-large'></li> &nbsp&nbsp" + value.phone);
						$("#email_eng_detail").html("<li class='fa fa-envelope fa-large'></li> &nbsp&nbsp" + value.email);
						$("#address_eng_detail").html("<li class='fa fa-home fa-large'></li> &nbsp&nbsp" + value.address);
						if (value.location_engineer == null) {
							$("#area_eng_detail").html("<li class='fa fa-map-marker fa-large'></li> &nbsp&nbsp(Coverage Area) <ul><li> - </li></ul>")

							$("#current_area_eng_update").html("<li class='fa fa-map-marker fa-large'></li> &nbsp&nbsp(Coverage Area) <ul><li> - </li></ul>")
						}else{
							$("#area_eng_detail").html("<li class='fa fa-map-marker fa-large'></li> &nbsp&nbsp(Coverage Area) <ul><li>" + value.location_engineer.long_location +"</li></ul>");

							$("#current_area_eng_update").html("<ul><li>" + value.location_engineer.long_location +" <i class='fa fa-check btn-delete-area' style='color:green'></i></li><li></ul>")
						}
						
						$("#photo_eng_detail").attr("src", "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTZDxOhYF6AqlmOslcgPXVO_81D4Cxou6d7lCyjwKsfcPSDJ7Ff&usqp=CAU");
						$("#acc_eng_detail").html("<li class='fa fa-university fa-large'></li> &nbsp&nbsp" + value.payment_acc_engineer.account_name + " - " + value.payment_acc_engineer.account_number);

						$("#name_eng_update").val(value.name)
						$("#number_eng_update").val(value.phone)
						$("#email_eng_update").val(value.email)
						$("#adress_eng_update").val(value.address)
						
						$("#account_name_update").val(value.payment_acc_engineer.account_name)
						$("#account_number_update").val(value.payment_acc_engineer.account_number)
					}
					
				})

			},
		});

       $("#DetailModal").modal("show");
       $("#prevBtn").prop('disabled', true);

    })

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
					url: "{{env('API_LINK_CUSTOM')}}/engineer/postNewEngineer",
					type:"POST",
					data:{
						_token: "{{ csrf_token() }}",
						id_type:$("#id_type").val(),
						name_eng:$("#name_eng").val(),
						email_eng:$("#email_eng").val(),
						phone_eng:$("#number_eng").val(),
						adress_eng:$("#adress_eng").val(),
						id_location:$("#inputJobLocation").select2("data")[0].id,
						account_name:$("#account_name").val(),
						account_number:$("#account_number").val(),
					},
					success: function(result){
						Swal.showLoading()
						Swal.fire(
							'Published!',
							'Engineer has been Added.',
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

	$('#datatable-engineer').on('click', '.btn-delete-area', function(){
		alert("Are You Sure to delete area!");
	})

	var currentTab = 0;

	function showTab(n) {
		var x = document.getElementsByClassName("tab");
		var y = document.getElementsByClassName("step");
		console.log(n);
		x[n].style.display = "inline";
		y[n].style.display = "inline";
		if (n == (x.length - 1)) {
			$("#prevBtn").prop('disabled', false);

			document.getElementById("nextBtn").innerHTML = "Save";
			$(".modal-dialog").addClass("modal-md");
			$("#nextBtn").attr('onclick','UpadateEngineer()');
		} else {
			$("#nextBtn").attr('onclick','nextPrev(1)');
			$("#prevBtn").prop('disabled', true);
			$(".modal-dialog").removeClass("modal-md");
			document.getElementById("nextBtn").innerHTML = "Update";
		}
	}

	function UpadateEngineer(){
		console.log("lohhh");
		console.log($("#inputJobLocation_update").select2().val());
		Swal.fire({
			title: 'Are you sure?',
			text: "to Update Data",
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
					url: "{{env('API_LINK_CUSTOM')}}/engineer/updateEngineerData",
					type:"POST",
					data:{
						_token: "{{ csrf_token() }}",
						id:$("#id_user_detail").val(),
						name_eng:$("#name_eng_update").val(),
						email_eng:$("#email_eng_update").val(),
						phone_eng:$("#number_eng_update").val(),
						adress_eng:$("#adress_eng_update").val(),
						id_location:$("#inputJobLocation_update").select2("data")[0].id,
						account_name:$("#account_name_update").val(),
						account_number:$("#account_number_update").val(),
					},
					success: function(result){
						Swal.showLoading()
						Swal.fire(
							'Published!',
							'Data has been Updated.',
							'success'
						).then((result) => {
							if (result.value) {
								$("#DetailModal").modal('toggle')
							}
						})
					}
				})
			}
		});
	}

	function nextPrev(n) {
		var x = document.getElementsByClassName("tab");
		var y = document.getElementsByClassName("step");
		// if (n == 1 && !validateForm()) return false;
		x[currentTab].style.display = "none";
		y[currentTab].style.display = "none";
		currentTab = currentTab + n;
		if (currentTab >= x.length) {
			$("#DetailModal").modal('hide');
			x[n].style.display = "none";
			currentTab = 0;
			// document.getElementById("regForm").submit();
			// return false;
		}
		showTab(currentTab);
	}


</script>

@endsection
