@extends('layouts.app')

@section('content')
<style type="text/css">
    .padding-top{
        padding-top: 10px;
    }
    .checked {
      color: orange;
    }
    #img-profil{
        /*max-height: 380px;*/
        height: 380px;
        /*background-repeat: no-repeat;*/
        object-fit: cover;
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
                <h3 class="pb-3 mb-4 border-bottom">
                    Top Engineer
                </h3>
            </div>
        </div>
        <div class="row" id="top_engineer">

        </div>
        <div class="row padding-top">
            <div class="col-md-12">
                <h3 class="pb-3 mb-4 border-bottom">
                    Chart
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="barChart" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="lineChart" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row padding-top">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="pieChart" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="doughnutChart" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script type="text/javascript" src="https://getbootstrap.com/docs/4.1/assets/js/vendor/holder.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript">
    getDashboard();

    function getDashboard(){
        $.ajax({
            type:"GET",
            url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/dashboard/getTopEngineer",
            success: function(result){
                $.each(result, function( index, value ) {
                    
                    var number_string = value.job_price.toString(),
                    split   = number_string.split(','),
                    sisa    = split[0].length % 3,
                    rupiah  = split[0].substr(0, sisa),
                    ribuan  = split[0].substr(sisa).match(/\d{1,3}/gi);
                        
                    if (ribuan) {
                        separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                    }
                    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;

                    console.log(value.name)
                    var append = "";
                    append = append + '<div class="col-md-3">';
                    append = append + '<div class="card">';
                    if(value.photo == ""){
                        append = append + '<img class="card-img-top" id="img-profil" src="{{env("API_LINK_CUSTOM_PUBLIC")}}/image/person.png" alt="Card image cap">';
                    } else {
                        append = append + '<img class="card-img-top" id="img-profil" src="{{env("API_LINK_CUSTOM_PUBLIC")}}/' + value.photo + '" alt="Card image cap">';
                    }
                    append = append + '<div class="card-body">'
                    append = append + '<h5 class="card-title" id="top_name">'+ value.name +'</h5><h6> Join : '+ moment(value['date_of_join']).format("DD MMMM YYYY") +'</h6><p class="card-text"><p> Achievement <br> ' + value.count + ' Job .</p>';
                    append = append + '<p>Engineer`s Fee : Rp.'+ rupiah +'</p>'
                    append = append + '<div class="ml-auto">'

                    for (var i = 0; i < 5; i++) {
                        if (value.count < 5) {
                            if (i < 3) {
                                append = append + '<span class="fa fa-star">'
                            }else{
                                append = append + '<span class="fa fa-star checked">'
                            }
                        }else if (value.count > 4 && value.count < 8) {
                            if (i < 2) {
                                append = append + '<span class="fa fa-star">'
                            }else{
                                append = append + '<span class="fa fa-star checked">'
                            }
                        }else if (value.count >= 8 ) {
                            if (i < 1) {
                                append = append + '<span class="fa fa-star">'
                            }else{
                                append = append + '<span class="fa fa-star checked">'
                            }
                        }
                        
                    }
                    
                    append = append +'</div>'
                    // append = append + '<a href="#" class="btn btn-primary">Go somewhere</a>';
                    append = append + '</div>';
                    append = append + '</div>';
                    append = append + '</div>';
                    append = append + '</div>';
                    $("#top_engineer").append(append);

                })
                
            }
        })
    }

    //chart 
    var ctx  = document.getElementById('barChart').getContext('2d');
    var ctx2 = document.getElementById('lineChart').getContext('2d');
    var ctx3 = document.getElementById('pieChart').getContext('2d');
    var ctx4 = document.getElementById('doughnutChart').getContext('2d');


    var barChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var lineChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1,
            }]
        },
    });

    var pieChart = new Chart(ctx3, {
        type: 'pie',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
            }]
        },

    });

    var doughnutChart = new Chart(ctx4, {
        type: 'doughnut',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
            }]
        },

    });
</script>
@endsection
