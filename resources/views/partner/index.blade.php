@extends('layouts.app')

@section('content')
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
					<h3 class="ml-3" style="margin-bottom: 0px !important">Partner Candidates List</h3>
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
					<table class="table table-striped" id="datatable-partner">
					  <thead>
					    <tr>
					      <th scope="col">No</th>
					      <th scope="col">Name</th>
					      <th scope="col">Phone</th>
					      <th scope="col">Email</th>
					      <th scope="col">Address</th>
					      <th scope="col">Status</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody id="tbody-partner">
					  	<tr>
					  		<td>1</td>
					  		<td>Mawar Eva</td>
					  		<td>XXXXXXXX90</td>
					  		<td>Mawar@gmail.com</td>
					  		<td>Jl. Cempaka RT.2/RW.6, Kb. Jeruk, Kec. Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11530</td>
					  		<td><span class="badge badge-primary">Basic</span></td>
					  		<td><button class="btn btn-secondary btn-primary">Show</button></td>
					  	</tr>
					  	<tr>
					  		<td>1</td>
					  		<td>Adipati Dolken</td>
					  		<td>XXXXXXXX15</td>
					  		<td>Dodot@gmail.com</td>
					  		<td>Jl. Cempaka RT.2/RW.6, Kb. Jeruk, Kec. Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11530</td>
					  		<td><span class="badge badge-warning">Advanced</span></td>
					  		<td><a href="{{url('partner/detail/')}}"><button class="btn btn-secondary btn-primary">Show</button></a></td>
					  	</tr>
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
<script type="text/javascript">
fillDataPartner("partner/getNewPartnerList?","GET");

$("#jobSearch").on('change',function(){
	if($("#jobSearch").val() != ""){
		console.log($("#jobSearch").val());
		fillDataPartner("partner/getPartnerList/search?search=" + $("#jobSearch").val(),"GET")
	} else {
		fillDataPartner("partner/getEngineerList?","GET")
		// $(".resultSearch").hide()
	}
})


function fillDataPartner(url,method){
	$.ajax({
		type:method,
		url:"{{env('API_LINK_CUSTOM')}}/" + url + "&per_page=" + $("#jobShowCount").text().split(" ")[1],
		// url:"{{env('API_LINK_CUSTOM')}}/partner/getNewPartnerList",
		success: function (result) {
			var n = 25

			$('#tbody-partner').empty();

            var table = "";

            $no=1;

            $.each(result["data"], function(key, value){
              table = table + '<tr>';
	          table = table + '<td>' + $no++ + '</td>';
	          table = table + '<td>' + value.name + '</td>';
	          table = table + '<td>' + value.phone + '</td>';
	          table = table + '<td>' + value.email + '</td>';
	          table = table + '<td>' + value.address + '</td>';
	          if (value.status == "On Progress") {
	          	var badgeStatus = "badge-secondary";
	          }else if (value.status == "OK Basic") {
	          	var badgeStatus = "badge-danger";
	          }else if (value.status == "OK Advance") {
	          	var badgeStatus = "badge-warning";
	          }else if (value.status == "OK Interview") {
	          	var badgeStatus = "badge-default";
	          }else if (value.status == "OK Agreement") {
	          	var badgeStatus = "badge-primary";
	          }else if (value.status == "OK Partner") {
	          	var badgeStatus = "badge-success";
	          }else{
	          	var badgeStatus = "badge-danger";
	          }
	          table = table + '<td> <span class="badge '+ badgeStatus +'">' + value.status + '</span> </td>';
	          if (value.status == "On Progress"){
	          	var statusPartner = ""
	          } else if (value.status == "OK Basic"){
	          	var statusPartner = "#advance"
	          } else if (value.status == "OK Agreement" || value.status == "OK Partner"){
	          	var statusPartner = "#agreement"
	          } else {
	          	var statusPartner = "#interview"
	          }
	          table = table + '<td>' + '<a class="partnerDetail" href="{{url("/partner/detail")}}/'+ value.id + statusPartner + '"><button class="btn btn-secondary ml-auto">Show' + '</button></a></td>';
              table = table + '</tr>';              
            });
            

            $('#tbody-partner').append(table);

			$("#jobPaginateHolder").empty("")
			var previous = "",next = "", first,second,third,first_active = "",second_active = "",third_active = ""
			var first_onclick = "onclick=fillDataPartner('" + url + "&page=" + (result["current_page"] - 1) + "','" + method + "')"
			var second_onclick = "onclick=fillDataPartner('" + url + "&page=" + (result["current_page"]) + "','" + method + "')"
			var third_onclick = "onclick=fillDataPartner('" + url + "&page=" + (result["current_page"] + 1) + "','" + method + "')"
			
			if(result["current_page"] == 1){
				previous = "disabled"
				first = result["current_page"],first_active = "active"
				second = result["current_page"] + 1 
				third = result["current_page"] + 2

				var first_onclick = "onclick=fillDataPartner('" + url + "&page=" + (result["current_page"]) + "','" + method + "')"
				var second_onclick = "onclick=fillDataPartner('" + url + "&page=" + (result["current_page"] + 1) + "','" + method + "')"
				var third_onclick = "onclick=fillDataPartner('" + url + "&page=" + (result["current_page"] + 2) + "','" + method + "')"
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

				var first_onclick = "onclick=fillDataPartner('" + url + "&page=" + (result["current_page"] - 2) + "','" + method + "')"
				var second_onclick = "onclick=fillDataPartner('" + url + "&page=" + (result["current_page"] - 1) + "','" + method + "')"
				var third_onclick = "onclick=fillDataPartner('" + url + "&page=" + (result["current_page"]) + "','" + method + "')"
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
			fillDataPartner("partner/getPartnerList/search?search=" + $("#jobSearch").val(),"GET")
		}else {
			fillDataPartner("partner/getEngineerList?","GET")
		}
	}
</script>

@endsection