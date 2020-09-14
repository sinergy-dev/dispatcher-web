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
					<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#categoryModal"><i class="fas fa-plus"></i> Add Category</button>
					<button type="button" class="btn btn-secondary  ml-3" data-toggle="modal" data-target="#categoryMainModal"><i class="fas fa-plus"></i> Add Main Category</button>
					<h3 class="ml-3" style="margin-bottom: 0px !important">Category List</h3>
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
					      <th scope="col">Category Name</th>
					      <th scope="col">Category Description</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody id="tbody-category">
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

<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Create New Category</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="needs-validation" novalidate="">
					<div>
						<div class="mb-3">
							<label for="client">Main Category</label>
							<select class="custom-select d-block w-100" id="MainCatList" required></select>
						</div>

						<div class="mb-3">
							<label for="client">Category Name</label>
							<input type="text" class="form-control" name="name_cat" id="name_cat" required>
							<div class="invalid-feedback">
								Please Fill a Name Category.
							</div>
						</div>

						<div class="mb-3">
							<label for="client">Category description</label>
							<textarea class="form-control" id="desc_cat" name="desc_cat" required>
								
							</textarea>
							<div class="invalid-feedback">
								Please Fill an Description.
							</div>
						</div>

						<div class="mb-3">
							<label for="client">Category Image</label>
							<div>
								<img id="blah" src="https://i7.uihere.com/icons/29/97/150/category-thin-all-e67f9226f579106012a6436ff6980d27.png" alt="your image" style="width: 300px;height: 300px;object-fit: cover;align-content: center;margin: auto;display: block;"  />
							</div>
							<div>
								<input type='file' id="imgCat" style="margin: auto;display: block;" required />
							</div>
							<div class="invalid-feedback">
								Please Fill an Image.
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

<div class="modal fade" id="categoryMainModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Create New Main Category</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="needs-validation" novalidate="">
					<div>
						<div class="mb-3">
							<label for="client">Category Main Name</label>
							<input type="text" class="form-control" id="name_cat_main" required>
							<div class="invalid-feedback">
								Please Fill a Name Main Category.
							</div>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" id="resetBtn" onclick="resetBtnMain()">Reset</button>
				<button type="button" class="btn btn-primary btn-save" id="saveBtn" onclick="saveBtnMain()">Save</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="DetailModal" tabindex="-1" role="dialog" aria-labelledby="DetailModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Detail Category</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="needs-validation" novalidate="">
					<div>
						<div>
						<div class="mb-3">
							<label for="client">Main Category</label>
							<select class="custom-select d-block w-100" id="MainCatListEdit" required></select>
						</div>

						<div class="mb-3">
							<label for="client">Category Name</label>
							<input type="text" class="form-control" id="name_cat_edit" required>
							<div class="invalid-feedback">
								Please Fill a Name Category.
							</div>
						</div>

						<div class="mb-3">
							<label for="client">Category description</label>
							<textarea class="form-control" id="desc_cat_edit" required>
								
							</textarea>
							<div class="invalid-feedback">
								Please Fill an Description.
							</div>
						</div>

						<div class="mb-3">
							<label for="client">Category Image</label>
							<div>
								<img id="blahEdit" alt="your image" style="width: 300px;height: 300px;object-fit: cover;align-content: center;margin: auto;display: block;"  />
							</div>
							<div>
								<input type='file' id="imgCatEdit" style="margin: auto;display: block;" required />
							</div>
							<div class="invalid-feedback">
								Please Fill an Image.
							</div>
						</div>
					</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-primary" id="btn-update">Update</button>
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
	function readURL(input) {
		  if (input.files && input.files[0]) {
	    var reader = new FileReader();
	    
	    reader.onload = function(e) {
	      $('#blah').attr('src', e.target.result);
	    }
	    
	    reader.readAsDataURL(input.files[0]); // convert to base64 string
	  }
	}

	$("#imgCat").change(function() {
	  readURL(this);
	});

	$(document).ready(function(){

		fillDataCat("dashboard/getJobCategoryPaging?","GET")

		$("#jobSearch").on('change',function(){
			if($("#jobSearch").val() != ""){
				console.log($("#jobSearch").val());
				fillDataCat("dashboard/getJobCategory/search?search=" + $("#jobSearch").val(),"GET")
			} else {
				fillDataCat("dashboard/getJobCategoryPaging?","GET")
				// $(".resultSearch").hide()
			}
		})

		$.ajax({
			url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/dashboard/getJobCategoryMain",
			type:"GET",
			success:function(result){
				var arr = result.results;
				var selectOption = [];
				var otherOption;
				$.each(arr,function(key,value){
					if (value.text != "Others") {
						selectOption.push(value)
					}else{
						otherOption = value
					}
				})
				selectOption.push(otherOption)
				$("#MainCatList").select2({
					theme: 'bootstrap4',
					data:selectOption
				})

				$("#MainCatListEdit").select2({
					theme: 'bootstrap4',
					data:selectOption
				})
			}
		})
		

		

	})

	function fillDataCat(url,method){
		$.ajax({
			type:method,
			url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/" + url + "&per_page=" + $("#jobShowCount").text().split(" ")[1],
			success: function (result) {
				var n = 25

				$('#tbody-category').empty();

	            var table = "";

	            $no=1;

	            $.each(result['data'], function(key, value){
	              table = table + '<tr>';
		          table = table + '<td>' + value.category_name + '</td>';
		          table = table + '<td>' + value.category_description + '</td>';
		          table = table + '<td>' + '<button class="btn btn-sm btn-primary" onclick="Detail('+ value.id +')">Detail</button>' + '</td>';
	              table = table + '</tr>';
	            });

	            $('#tbody-category').append(table);

				$("#jobPaginateHolder").empty("")
				var previous = "",next = "", first,second,third,first_active = "",second_active = "",third_active = ""
				var first_onclick = "onclick=fillDataCat('" + url + "&page=" + (result["current_page"] - 1) + "','" + method + "')"
				var second_onclick = "onclick=fillDataCat('" + url + "&page=" + (result["current_page"]) + "','" + method + "')"
				var third_onclick = "onclick=fillDataCat('" + url + "&page=" + (result["current_page"] + 1) + "','" + method + "')"
				
				if(result["current_page"] == 1){
					previous = "disabled"
					first = result["current_page"],first_active = "active"
					second = result["current_page"] + 1 
					third = result["current_page"] + 2

					var first_onclick = "onclick=fillDataCat('" + url + "&page=" + (result["current_page"]) + "','" + method + "')"
					var second_onclick = "onclick=fillDataCat('" + url + "&page=" + (result["current_page"] + 1) + "','" + method + "')"
					var third_onclick = "onclick=fillDataCat('" + url + "&page=" + (result["current_page"] + 2) + "','" + method + "')"
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

					var first_onclick = "onclick=fillDataCat('" + url + "&page=" + (result["current_page"] - 2) + "','" + method + "')"
					var second_onclick = "onclick=fillDataCat('" + url + "&page=" + (result["current_page"] - 1) + "','" + method + "')"
					var third_onclick = "onclick=fillDataCat('" + url + "&page=" + (result["current_page"]) + "','" + method + "')"
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
		$.ajax({
			type:"GET",
			url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/dashboard/getJobCategory",
			success: function(result){
				$.each(result['job_category'], function(key, value){
					if (value.id == id) {
						$("#name_cat_edit").val(value.category_name);
						$("#desc_cat_edit").val(value.category_description);
						$("#blahEdit").attr("src",value.category_image_url)
						var mainCategory 	= $('#MainCatListEdit');
						var option = new Option(value.category_main_name, value.id_category_main, true, true);
						mainCategory.append(option).trigger('change');
						
					}
					
				})
				$("#btn-update").attr('onclick','updateBtn('+id+')');
			},
		});

       $("#DetailModal").modal("show");
	}

	function saveBtn(){
		if ($("#name_cat").val() == "" || $("#desc_cat").val() == "" || $("#MainCatList").select2().val() == "" || $('#imgCat').val() == "" ) {
			Swal.fire({
			  title: "Warning!",
			  text: "Please Fill all input to progress this form!",
			  icon: "warning",
			  button: "OK!",
			});
		}else{
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

					var fd = new FormData();
			        var image_cat = $('#imgCat')[0].files[0];
			        fd.append('category_name',$("#name_cat").val());
			        fd.append('category_description',$("#desc_cat").val());
			        fd.append('id_category_main',$("#MainCatList").select2().val());
			        fd.append('cat_image',image_cat);
					$.ajax({
						headers: {
				           Accept:"application/json"
				        },
						// headers: {
						//     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						// },
						url: "{{env('API_LINK_CUSTOM_PUBLIC')}}/setting/category/postCategory",
						type:"POST",
						data:fd,
						contentType: false,
	            		processData: false,
						success: function(result){
							Swal.showLoading()
							Swal.fire(
								'Published!',
								'New Category has been Added.',
								'success'
							).then((result) => {
								if (result.value) {
									$("#categoryModal").modal('toggle')
									location.reload();
								}
							})
						}
					})
				}
			});
		}
		
	}

	function saveBtnMain(){
		if ($("#name_cat_main").val() == "") {
			Swal.fire({
			  title: "Warning!",
			  text: "Please Fill input with main name category!",
			  icon: "warning",
			});
		}else{
			$.ajax({
				headers: {
		           Accept:"application/json"
		        },
				url: "{{env('API_LINK_CUSTOM_PUBLIC')}}/setting/category/postCategoryMain",
				type:"POST",
				data:{
					category_main_name:$("#name_cat_main").val(),
				},
				success: function(result){
					Swal.showLoading()
					Swal.fire(
						'Published!',
						'New Category Main has been Added.',
						'success'
					).then((result) => {
						if (result.value) {
							$("#categoryMainModal").modal('toggle')
							location.reload();
						}
					})
				}
			})
		}
		
	}

	$('#datatable-engineer').on('click', '.btn-delete-area', function(){
		alert("Are You Sure to delete area!");
	})

	function updateBtn(id){
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
				var fd = new FormData();
		        var image_cat = $('#imgCatEdit')[0].files[0];
		        fd.append('id',id);
		        fd.append('category_name',$("#name_cat_edit").val());
		        fd.append('category_description',$("#desc_cat_edit").val());
		        fd.append('id_category_main',$("#MainCatListEdit").select2().val());
		        fd.append('cat_image',image_cat);
				$.ajax({
					headers: {
			           Accept:"application/json"
			        },
					url: "{{env('API_LINK_CUSTOM_PUBLIC')}}/setting/category/postUpdateCategory",
					type:"POST",
					data:fd,
					contentType: false,
            		processData: false,
					success: function(result){
						Swal.showLoading()
						Swal.fire(
							'Published!',
							'Category has been update.',
							'success'
						).then((result) => {
							if (result.value) {
								$("#DetailModal").modal('toggle')
								location.reload();
							}
						})
					}
				})
			}
		});
	
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
		$("#name_cat").val("");
        $("#desc_cat").val("");
        $("#MainCatList").select2().val("");
        $("#imgCat").val("");
        $("#categoryModal").modal('toggle')
	}

	function resetBtnMain(){
		$("#name_cat_main").val("");
		$("#categoryMainModal").modal('toggle')
	}


</script>

@endsection
