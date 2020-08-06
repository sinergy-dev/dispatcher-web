@extends('layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
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
				<div class="d-inline-flex align-items-center">
					<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-plus"></i> Add Engineer</button>
					<h3 class="ml-3" style="margin-bottom: 0px !important">Engineer List</h3>
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
						<div class="mb-3">
							<label for="client">Candidate Engineer</label>
							<select class="custom-select d-block w-100" id="candidateEngineerList"></select>
						</div>

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
				<button type="button" class="btn btn-secondary" id="resetBtn" onclick="resetBtn()">Reset</button>
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

		fillDataEng("engineer/getEngineerList?","GET")

		$("#jobSearch").on('change',function(){
			if($("#jobSearch").val() != ""){
				console.log($("#jobSearch").val());
				fillDataEng("engineer/getEngineerList/search?search=" + $("#jobSearch").val(),"GET")
			} else {
				fillDataEng("engineer/getEngineerList?","GET")
				// $(".resultSearch").hide()
			}
		})

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

		$("#candidateEngineerList").select2({
			theme: 'bootstrap4',
			ajax: {
				url: "{{env('API_LINK_CUSTOM')}}/partner/getNewPartnerSelectedList",
				dataType: 'json',
			}
		})

		$("#candidateEngineerList").change(function(){
		  $.ajax({
            type:"GET",
            url:"{{env('API_LINK_CUSTOM')}}/partner/getDetailPartnerList",
            data:{
            	id_candidate:$("#candidateEngineerList").val(),
            },
            success: function (result){
            	console.log(result)
            	if (result.partner != null) {

            		$("#name_eng").val(result.partner.name);
	            	$("#number_eng").val(result.partner.phone);
	            	$("#email_eng").val(result.partner.email);
	            	$("#adress_eng").val(result.partner.address);
	            	$("#account_name").val(result.partner.candidate_account_name);
	            	$("#account_number").val(result.partner.candidate_account_number);
	            	// console.log(result.partner.location[0].id_area)
	            	$("#inputJobLocation").prop("disabled", false)
	            	$("#inputJobArea").prop("disabled", false)
	            	var locationSelect 	= $('#inputJobLocation');
	            	var areaSelect 		= $('#inputJobArea');
	            	var regionSelect	= $('#inputJobRegion');

	            	var option = new Option(result.partner.location[0].location_engineer[0].location_name, result.partner.location[0].location_engineer[0].id, true, true);
					locationSelect.append(option).trigger('change');

					var option2 = new Option(result.partner.location[0].location_engineer[0].long_location_area, true, true, true);
					areaSelect.append(option2).trigger('change');

					var option3 = new Option(result.partner.location[0].location_engineer[0].long_location_region, result.partner.location[0].location_engineer[0].id, true, true);
					regionSelect.append(option3).trigger('change');	

					$("#saveBtn").attr("onclick","saveBtn("+ result.partner.id +")")

            	}
            	
            }
          })
		})

	})

	function fillDataEng(url,method){
		$.ajax({
			type:method,
			url:"{{env('API_LINK_CUSTOM')}}/" + url + "&per_page=" + $("#jobShowCount").text().split(" ")[1],
			success: function (result) {
				var n = 25

				$('#tbody-engineer').empty();

	            var table = "";

	            $no=1;

	            $.each(result["data"], function(key, value){
	              table = table + '<tr>';
		          table = table + '<td>' + $no++ + '</td>';
		          table = table + '<td>' + value.name + '</td>';
		          table = table + '<td>' + value.phone + '</td>';
		          table = table + '<td>' + value.email + '</td>';
		          table = table + '<td>' + value.address.substring(0,20) + "..." + '</td>';
		          if (value.location_engineer == null || value.payment_acc_engineer == null) {
		          	table = table + '<td>' + '' + '</td>';
		          	table = table + '<td>' + '' + '</td>';
		          }else{
		          	table = table + '<td>' + value.location_engineer.long_location + '</td>';
		          	table = table + '<td>' + value.payment_acc_engineer.account_name + ' - ' + value.payment_acc_engineer.account_number + '</td>';
		          }
		          table = table + '<td>' + '<button class="btn btn-sm btn-primary" onclick="Detail('+ value.id +')">Detail</button>' + '</td>';
	              table = table + '</tr>';
	            });

	            $('#tbody-engineer').append(table);

				$("#jobPaginateHolder").empty("")
				var previous = "",next = "", first,second,third,first_active = "",second_active = "",third_active = ""
				var first_onclick = "onclick=fillDataEng('" + url + "&page=" + (result["current_page"] - 1) + "','" + method + "')"
				var second_onclick = "onclick=fillDataEng('" + url + "&page=" + (result["current_page"]) + "','" + method + "')"
				var third_onclick = "onclick=fillDataEng('" + url + "&page=" + (result["current_page"] + 1) + "','" + method + "')"
				
				if(result["current_page"] == 1){
					previous = "disabled"
					first = result["current_page"],first_active = "active"
					second = result["current_page"] + 1 
					third = result["current_page"] + 2

					var first_onclick = "onclick=fillDataEng('" + url + "&page=" + (result["current_page"]) + "','" + method + "')"
					var second_onclick = "onclick=fillDataEng('" + url + "&page=" + (result["current_page"] + 1) + "','" + method + "')"
					var third_onclick = "onclick=fillDataEng('" + url + "&page=" + (result["current_page"] + 2) + "','" + method + "')"
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

					var first_onclick = "onclick=fillDataEng('" + url + "&page=" + (result["current_page"] - 2) + "','" + method + "')"
					var second_onclick = "onclick=fillDataEng('" + url + "&page=" + (result["current_page"] - 1) + "','" + method + "')"
					var third_onclick = "onclick=fillDataEng('" + url + "&page=" + (result["current_page"]) + "','" + method + "')"
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

	function Detail(id){
		console.log(id);
		var btn_detail = id;
		$('.btn-next').click(function() {
	        this.value = btn_detail;
	    });

		$.ajax({
			type:"GET",
			url:"{{env('API_LINK_CUSTOM')}}/engineer/getEngineerList",
			success: function(result){
				$.each(result['data'], function(key, value){
					if (value.id == btn_detail) {
						$("#id_user_detail").val(btn_detail);
						$("#name_eng_detail").html("<li class='fa fa-user fa-large'></li>&nbsp&nbsp" + value.name);
						$("#nik_eng_detail").html("<li class='fa fa-id-card fa-large'></li>&nbsp&nbsp" + value.nik);
						$("#place_of_birth_eng_detail").html("<li class='fa fa-bed fa-large'></li>&nbsp&nbsp" + value.pleace_of_birth);
						$("#date_of_birth_eng_detail").html("<li class='fa fa-calendar fa-large'></li>&nbsp&nbsp" + moment(value.date_of_birth).format("DD MMMM YYYY") );
						$("#phone_eng_detail").html("<li class='fa fa-phone fa-large'></li> &nbsp&nbsp" + value.phone);
						$("#email_eng_detail").html("<li class='fa fa-envelope fa-large'></li> &nbsp&nbsp" + value.email);
						$("#address_eng_detail").html("<li class='fa fa-home fa-large'></li> &nbsp&nbsp" + value.address);
						if (value.location_engineer == null || value.account_name == null) {
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
	}

	function saveBtn(id){
		Swal.fire({
			title: 'Are you sure?',
			text: "Please Fill the form with correctly data",
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
					// headers: {
					//     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					// },
					url: "{{env('API_LINK_CUSTOM')}}/engineer/postNewEngineer",
					type:"POST",
					data:{
						_token: "{{ csrf_token() }}",
						id_type:1,
						name_eng:$("#name_eng").val(),
						email_eng:$("#email_eng").val(),
						phone_eng:$("#number_eng").val(),
						adress_eng:$("#adress_eng").val(),
						// id_location:$("#inputJobLocation").select2("data")[0].id,
						id_location:$("#inputJobLocation").select2().val(),
						account_name:$("#account_name").val(),
						account_number:$("#account_number").val(),
						id_candidate:id,
						history_user:0,
						history_status:9,
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
								location.reload();
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

	function changeJobShowCount(n){
		$("#jobShowCount").text("Show " + n)
		var active_10 = (n == 10) ? 'active' : ''
		var active_25 = (n == 25) ? 'active' : ''
		var active_50 = (n == 50) ? 'active' : ''
		var append = ""
		append = append + '<span class="dropdown-item ' + active_10 + '" onclick="changeJobShowCount(10)">10 List</span>'
		append = append + '<span class="dropdown-item ' + active_25 + '" onclick="changeJobShowCount(25)">25 List</span>'
		append = append + '<span class="dropdown-item ' + active_50 + '" onclick="changeJobShowCount(50)">50 List</span>'
		$("#jobShowCountList").empty()
		$("#jobShowCountList").append(append)
		if($("#jobSearch").val() != ""){
			fillDataJob("dashboard/getJobListAndSumary/search?search=" + $("#jobSearch").val(),"POST")
		}else {
			fillDataJob("dashboard/getJobListAndSumary/paginate?","GET")
		}
	}

	function resetBtn(){
		$('#inputJobArea').val(null).trigger('change');
		$('#inputJobLocation').val(null).trigger('change');
		$('#inputJobRegion').val(null).trigger('change');
		$('#candidateEngineerList').val(null).trigger('change');
		$("#name_eng").val("");
    	$("#number_eng").val("");
    	$("#email_eng").val("");
    	$("#adress_eng").val("");
    	$("#account_name").val("");
    	$("#account_number").val("");
    	$("#inputJobLocation").prop('disabled',true);
    	$("#inputJobArea").prop('disabled', true);
    	$("#saveBtn").attr("onclick","saveBtn()")

	}


</script>

@endsection
