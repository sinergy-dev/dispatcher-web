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
            <div class="col-md-12">
                <h3 class="pb-3 mb-4 border-bottom">
                    Top Engineer
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <img class="card-img-top" src="https://adminlte.io/themes/dev/AdminLTE/dist/img/avatar.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Arkhab Maulana</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img class="card-img-top" src="https://adminlte.io/themes/dev/AdminLTE/dist/img/avatar2.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Bima Aldi Pratama</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img class="card-img-top" src="https://adminlte.io/themes/dev/AdminLTE/dist/img/avatar3.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Dandy Purba C</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img class="card-img-top" src="https://adminlte.io/themes/dev/AdminLTE/dist/img/avatar5.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Nauval Rizky F</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script type="text/javascript" src="https://getbootstrap.com/docs/4.1/assets/js/vendor/holder.min.js"></script>
@endsection
