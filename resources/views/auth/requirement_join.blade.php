@extends('layouts.app')
@section('style')
<style type="text/css">
  .step {
   text-align: center;
  }

  .step .col-md-2 {
      background-color: #fff;
      border: 1px solid #C0C0C0;
      border-right: none;
  }

  .step .col-md-2:last-child {
      border: 1px solid #C0C0C0;
  }

  .step .col-md-2:first-child {
      border-radius: 5px 0 0 5px;
  }

  .step .col-md-2:last-child {
      border-radius: 0 5px 5px 0;
  }

  .step .col-md-2:hover {
      color: #F58723;
      cursor: pointer;
  }

  .hided{
    display: none;
  }

  .showed{
    display: block;
  }

  .progressbar {
    counter-reset: step;
  }
  .progressbar li {
      list-style-type: none;
      width: 25%;
      float: left;
      font-size: 12px;
      position: relative;
      text-align: center;
      text-transform: uppercase;
      color: #7d7d7d;
  }
  .progressbar li:before {
      width: 30px;
      height: 30px;
      content: counter(step);
      counter-increment: step;
      line-height: 30px;
      border: 2px solid #7d7d7d;
      display: block;
      text-align: center;
      margin: 0 auto 10px auto;
      border-radius: 50%;
      background-color: white;
  }
  .progressbar li:after {
      width: 100%;
      height: 2px;
      content: '';
      position: absolute;
      background-color: #7d7d7d;
      top: 15px;
      left: -50%;
      z-index: -1;
  }
  .progressbar li:first-child:after {
      content: none;
  }
  .progressbar li.active {
      color: green;
  }
  .progressbar li.active:before {
      border-color: #55b776;
  }
  .progressbar li.active + li:after {
      background-color: #55b776;
  }
  .center-in{
    display: block;margin: auto;position: relative;
  }

  table{
    margin: 0 auto;
  }

  input {
    border: 0;
    outline: 0;
    background: transparent;
    border-bottom: 1px solid black;
  }

  input:focus {
    border-color: green
  }

  .textArea-pAdress{
    border: 0;
    outline: 0;
    background: transparent;
    border-bottom: 1px solid black;
    resize: none;
    overflow: hidden;
    /*height: 60px;*/
  }

  .btnCenter{
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    margin: 10px auto;
    position: relative;
  }

  #hasJoined:hover{
      color: #545b62;
      cursor: pointer;
      text-decoration: underline;
  }

  .square-job{
    position: relative;
    background-color: white;
    width: 50px;
    height: 50px;
    display:flex;
    align-items:center;
    justify-content:center;
  } 
  .img__wrap {
    margin: 10px;
    position: relative;
    height: 50px;
    width: 50px;
  }

  .img__img{
    width: 50px;
    height: 50px;
  }

  .img__description_layer {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(242, 203, 28, 1);
    color: #fff;
    visibility: hidden;
    opacity: 0;
    display: flex;
    align-items: center;
    justify-content: center;

    /* transition effect. not necessary */
    transition: opacity .2s, visibility .2s;
  }

  .img__wrap:hover .img__description_layer {
    cursor: pointer;
    visibility: visible;
    opacity: 1;
  }

  .img__description {
    display: block;
    margin: auto;
    align-content: center;
    font-size: 8px;
    text-align: center;
    transition: .2s;
    transform: translateY(1em);
  }

  .img__wrap:hover .img__description {
    transform: translateY(0);
  }

  .active > img{
    border: 2px solid rgba(242, 203, 28, 1);
  }

  .image-upload > input{
    /*display: none;*/
  }

  .imgFiles{
    margin: 10px;
    width: 200px;
    height: 200px;
    object-fit: cover;
    margin-left: 30px
  }

  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  /* Firefox */
  input[type=number] {
    -moz-appearance: textfield;
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
    width: 30%;
    padding-right: 10px; /* Ensures colon does not overlay the text */
  }

  .ul-basic span::after {
    content: ":";
    position: absolute;
    right: 10px;
  }

  .overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
  }
  .overlay:target {
    visibility: visible;
    opacity: 1;
  }

  .popup {
    margin: 70px auto;
    padding: 20px;
    background: #fff;
    border-radius: 5px;
    width: 30%;
    position: relative;
    transition: all 5s ease-in-out;
  }

  .popup h2 {
    margin-top: 0;
    color: #333;
    font-family: Tahoma, Arial, sans-serif;
  }
  .popup .close {
    position: absolute;
    top: 20px;
    right: 30px;
    transition: all 200ms;
    font-size: 30px;
    font-weight: bold;
    text-decoration: none;
    color: #333;
  }
  .popup .close:hover {
    color: #06D85F;
  }
  .popup .content {
    max-height: 30%;
    overflow: auto;
  }

  @media screen and (max-width: 700px){
    .box{
      width: 70%;
    }
    .popup{
      width: 70%;
    }
  }

  .input-center{
    display: inline-block;
    float: none;
    margin: 0 auto;
  }

  .ui-datepicker{ left: 50% !important; margin-left: -25.5em !important;}

</style>
@endsection
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<link href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" />

<div class="container">
  <!-- <div class="row"> -->
    <div id="tabA">
    <!--   <div id="div1" class="col-md-2">
          <span class="fas fa-cloud-download"></span>
          <p>Download Application</p>
      </div> -->
      <ul class="progressbar">
        <li class="active">Candidate Information</li>
        <li id="validation">Validation</li>
        <!-- <li id="advanced">Advanced Information</li> -->
        <li id="interview">Interview schedule</li>
        <li id="result">Result</li>
      </ul>
    </div>
  <!-- </div> -->

  <div id="tabB" class="row" style="padding-top:50px;display: none"> 
      <div class="col-md-12">
          <img src="{{env('API_LINK_CUSTOM_PUBLIC')}}\image\freelance-profile-2.png" width="150px" height="150px" class="center-in img-p">
          <div style="text-align: center;color: #b3a7db;font-size: 20px" class="center-in div-p">Engineer On Demand</div>

          <p class="center-in text-p" style="width: 500px;text-align: center;">Engineer On Demand (EOD) is a mobile app that can be used by the freelancer to search job, do the job, and get paid. But first, you have to join to become a Partner.</p> 
        
          <div class="form-group">
            <input id="input-pName" class="center-in" placeholder="Type your name here...." style="display: none;width: 400px">

            <input id="input-pEmail" placeholder="Type your name here...." class="center-in" style="display: none;width: 400px">

            <input id="input-pDateBirth" type="text" placeholder="Input your date of birth...." class="center-in" style="display: none;width: 300px">

            <input id="input-pPhone" type="number" placeholder="Type your name here...." class="center-in" style="display: none;width: 400px">

            <textarea id="input-pAddress" class="center-in textArea-pAdress" style="display: none;width: 400px;"></textarea>

         <!--    <input id="input-pEducation" placeholder="Type your name here...." class="center-in" style="display: none;width: 400px"> -->
          </div>

          <div class="row btnCenter" id="input-pEducation" style="display: none;">
            <div class="col-md-4 mb-3">
              <div style="border: 2px solid blue;padding: 5px;height: : 30px;border-radius: 10px; border: 2px solid #6c757d;">
                <select class="custom-select d-block w-100" id="inputEducation" required="" style="width: 100%;">
                  <option value="">Choose...</option>
                </select>
              </div>
            </div>
          </div>

          <div id="input-pLocation" style="display: none;">
            <div class="row">
                <div class="col-md-4 mb-3">
                  <label for="country">Region</label>
                  <div style="border: 2px solid blue;padding: 5px;height: : 30px;border-radius: 10px; border: 2px solid #6c757d;">
                    <select class="custom-select d-block w-100" id="inputJobRegion" required="" style="width: 100%;">
                      <option value="">Choose...</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="state">Area</label>
                  <div style="border: 2px solid blue;padding: 5px;height: : 30px;border-radius: 10px;border: 2px solid #6c757d;">
                    <select class="custom-select d-block w-100" id="inputJobArea" required="" style="width: 100%" disabled>
                      <option value="">Choose...</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="zip">Location</label>
                  <div style="border: 2px solid blue;padding: 5px;height: : 30px;border-radius: 10px;border: 2px solid #6c757d;">
                    <select class="custom-select d-block w-100" id="inputJobLocation" required="" style="width: 100%" disabled>
                      <option value="">Choose...</option>
                    </select>
                  </div>
                </div>
            </div>
          </div>

       <!--    <div class="image-upload" id="input-pFiles" style="display: none;">
            <label for="file-input" class="btnCenter">
              <img id="imgFiles" class="imgFiles" src="https://cdn.onlinewebfonts.com/svg/img_106837.png"/>
              <div style="display: none;border: 2px solid black;width: 500px;height: 50px" id="outputFiles"></div>
              
            </label>
            <form id="fileinfo" enctype="multipart/form-data" method="post" name="fileinfo" class="form-group">
              <input class="btnCenter" name="file_input" id="file-input" alt="Engineer On Demand" type="file" />
              <small id="emailHelp" class="form-text text-muted">Just allow pdf format file.</small>
            </form>
          </div> -->
          <div class="image-upload" id="input-pFiles" style="display: none;">
            <label for="file-input" class="btnCenter">
              <img id="imgFiles" class="imgFiles" src="https://cdn.onlinewebfonts.com/svg/img_106837.png"/>
              <div style="display: none;border: 2px solid black;width: 500px;height: 50px" id="outputFiles"></div>
              
            </label>
            <form id="fileinfo" enctype="multipart/form-data" method="post" name="fileinfo" class="form-group">
              <input name="file_input" class="btnCenter" id="file-input" alt="Engineer On Demand" type="file" />          
            </form>
            <small id="emailHelp" class="form-text-file text-muted btnCenter">PDF file Only (up to 2MB).</small>
          </div>
      </div>
      <div id="input-pjobCategory" style="display: none;">
        <div class="btnCenter radio-group" id="jobCategoryList">
          
        </div>       
      </div>
      <div class="btnCenter">
        <div class="form-group col-md-4">
          <input id="input-pNik" type="text"  maxlength="16" placeholder="Type your name here...." style="margin-right:50px;display: none">
          <small id="emailHelp" class="form-text text-muted" style="display: none">input NIK (must 16 digit).</small>
        </div>
        <div class="form-group col-md-6">
            <input name="file_inputKtp" id="file-inputKtp" alt="Engineer On Demand" type="file" style="display: none;" />
            <small id="emailHelp" class="form-text text-muted" style="display: none">Scan KTP. Image file Only (up to 2MB).</small>
        </div>
      </div>
      <div class="col-md-12">
        <div class="btnCenter">
          <button id="prevBtnBasic" style="margin: 10px;display: none" class="btn btn-primary btn-secondary" onclick="nextPrevBasic(-1)">Prev</button>
          <button id="nextBtnBasic" style="margin: 10px" class="btn btn-primary btn-secondary" onclick="nextPrevBasic(1)">Registration</button>
        </div>
        <div class="btnCenter">
            <a onclick="hasJoined()" id="hasJoined" style="margin-top: -10px;color:#216bff">Already registered?</a>  
        </div>
      </div>
      
  </div>

  <div id="tabC" style="padding-top: 100px;display: none;">
      <div class="col-md-12">

        <div style="text-align: center;color: #b3a7db;font-size: 20px" class="center-in div-p">Entry identifier code</div>

        <input type="" name="" id="input-pIdentifier" placeholder="Please entry your identifier code. ." class="form-control center-in" style=";width: 300px;text-align: center;">

        <div class="btnCenter">
          <button style="margin: 10px;" class="btn btn-light btn-secondary" onclick="kodeUnik('cancel')">Cancel</button>
          <button style="margin: 10px" class="btn btn-primary btn-secondary" onclick="kodeUnik('submit')">Submit</button>
        </div>
      </div>
  </div>

  <div id="tabD" style="padding-top: 100px;display: none;">
    <div class="col-md-12">
      <h1 class="text-p center-in" style="width: 600px;text-align: center;">Thank's for join us and congratulations to you who passed in first stage registration.</h1>

      <input id="input-pEducation" placeholder="Type your name here...." class="center-in" style="display: none;width: 400px">

      <div id="input-pjobCategory" style="display: none;">
        <div class="row btnCenter radio-group" id="jobCategoryList">
          
        </div>       
      </div>

      <div id="input-pLocation" class="center-in" style="display: none;margin: 20px">
        <div class="row">
          <div class="col-md-4 mb-3">
            <label for="country">Region</label>
            <div style="border: 2px solid blue;padding: 5px;height: : 30px;border-radius: 10px; border: 2px solid #6c757d;">
              <select class="custom-select d-block w-100" id="inputJobRegion" required="" style="width: 100%;">
                <option value="">Choose...</option>
              </select>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="state">Area</label>
            <div style="border: 2px solid blue;padding: 5px;height: : 30px;border-radius: 10px;border: 2px solid #6c757d;">
              <select class="custom-select d-block w-100" id="inputJobArea" required="" style="width: 100%" disabled>
                <option value="">Choose...</option>
              </select>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="zip">Location</label>
            <div style="border: 2px solid blue;padding: 5px;height: : 30px;border-radius: 10px;border: 2px solid #6c757d;">
              <select class="custom-select d-block w-100" id="inputJobLocation" required="" style="width: 100%" disabled>
                <option value="">Choose...</option>
              </select>
            </div>
          </div>
       </div>
      </div>

      <div class="btnCenter">
        <button id="prevBtnAdvanced" style="margin: 10px;display: none" class="btn btn-primary btn-secondary" onclick="nextPrevAdvanced(-1)">Prev</button>
        <button id="nextBtnAdvanced" style="margin: 10px" class="btn btn-primary btn-secondary" onclick="nextPrevAdvanced(1)">Next Step</button>
      </div>
    </div>
  </div>  

  <div id="tabE" style="padding-top: 100px;display: none;">
    <div class="col-md-12">
      <h4 class="text-p center-in" style="width: 1000px;text-align: center;">Hi Dicky Kopral, Thank you for your passion. We have reviewed your portfolio and we will have an interview session with the following information. Please prepare yourself and good luck!</h4>
      <br><br>
      <table class="table" style="width: 280px;" id="table-partner">
        
      </table>
    </div>
  </div>

  <div id="tabF" style="padding-top: 100px;display: none">
    <div class="col-md-12">
      <h4 class="text-p center-in" style="width: 1000px;text-align: center;">By checking this checkbox, you are accepting the Company Partner Agreement and Privacy Policy.</h4><br>
      <div class="radio" id="input-radio-a" style="display: flex;justify-content: center;flex-wrap: wrap;margin: 10px auto;position: relative;">
        <label><input type="checkbox" name="optradio" class="optradio" value="accept"><i> I accept the terms and conditions </i></label>
        
      </div>
      
      <div style="display: flex;justify-content: center;flex-wrap: wrap;margin: 10px auto;position: relative;" id="input-account">
        <div class="row" style="display: none;background-color: white!important;padding: 10px!important" id="box-account">
          <div class="col-md-4">
            <label><b>Bank Name</b></label>
            <input type="text" class="form-control" id="account_name" style="width: 200px" name="" placeholder="ex: BANK NEGARA INDONESIA">
          </div>
          <div class="col-md-4">
            <label><b>Account Number</b></label>
            <input type="number" class="form-control" id="account_number" style="width: 200px" name="" placeholder="ex: 34567521XXX">
          </div>
          <div class="col-md-4">
            <label><b>Your Alias</b></label>
            <input type="text" class="form-control" id="account_alias" style="width: 200px" name="" placeholder="ex: Emilia Winan">
          </div>
          <div class="col-md-12">
            <small>*Please input your banking account information for the job payment transactions</small>
          </div>
        </div>      
      </div>
   <!--    <div class="radio"  id="input-radio-b" style="display: flex;justify-content: center;flex-wrap: wrap;margin: 10px auto;position: relative;">
        <label><input type="checkbox" value="reject" class="optradio" name="optradio"><i> I am totally disagree </i></label>
      </div> -->
      <div class="btnCenter">
        <button style="margin: 10px" id="agreeBtnPartner" class="btn btn-primary btn-secondary" disabled>Submit</button>
      </div>
    </div>
  </div> 

  <div id="popup1" class="overlay">
    <div class="popup">
      <h2>Here i am</h2>
      <a class="close" href="#">&times;</a>
      <div class="content">
        Thank to pop me out of that button, but now i'm done so you can close this window.
      </div>
    </div>
  </div>

</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>

<script type="text/javascript">

  $( document ).ready(function() {
    $("#tabA").hide();
  });

  document.querySelector("#input-pNik").addEventListener("keypress", function (evt) {
      if (evt.which < 48 || evt.which > 57)
      {
          evt.preventDefault();
      }
  });

  $('#input-pDateBirth').datepicker({
    autoclose: true,
    todayHighlight:true,
    format: "yyyy-mm-dd",
    language: "id",
  });

  // $('#input-pNik').on( "change", function(){
  //   console.log("gggggg")
  // })

  // $('#input-pNik').change(function(){
  //   console.log("sdsdsd")
  //   if (this.value.length == 16) {
  //     $('#input-pNik').addClass('is-invalid')
  //   }
  // })

  if (window.location.href.split("/")[4] != null) {
    $.ajax({
          url: "{{env('API_LINK_CUSTOM_PUBLIC')}}/partner/getNewPartnerIdentifier",
          type:"POST",
          data:{
            identifier:window.location.href.split("/")[4],
          },
          success: function(result){
            if (result.status == "On Progress") {
              $(".progressbar li#validation").addClass("active");
              $("#tabA").show();
              $(".text-p").html("<h2 class='center-in' style=''> Now you can relax, we'll be in touch soon! Thank you for joining partner with us. </h2>")
              $("#input-pAddress").css("display","none")
              $("#input-pPhone").css("display","none")
              $("#input-pEmail").css("display","none")
              $("#input-pName").css("display","none")
              $("#input-pNik").css("display","none")
              $("#file-inputKtp").css("display","none");
              $("#hasJoined").css("display","none")
              $("#prevBtnBasic").css("display","none")
              $("#nextBtnBasic").css("display","none")
              $(".img-p").css("display","none")
              $(".div-p").css("display","none")
              $("#tabC").hide();
              $("#tabB").show();
            }else if (result.status == "OK Basic") {
              $(".progressbar li#validation").addClass("active");
              $(".progressbar li#advanced").addClass("active");
              $("#tabA").show();
              // $("#tabB").css("display","block")
              $("#tabC").hide();
              $("#tabD").show();
              if (result.latest_education != null) {
                $(".text-p").html("<h2 class='center-in' style=''> Now you can relax, we'll be in touch soon! Thank you for joining partner with us. </h2>")
                $("#input-pAddress").css("display","none")
                $("#input-pPhone").css("display","none")
                $("#input-pEmail").css("display","none")
                $("#input-pName").css("display","none")
                $("#input-pNik").css("display","none")
                $("#file-inputKtp").css("display","none");
                $("#hasJoined").css("display","none")
                $("#prevBtnAdvanced").css("display","none")
                $("#nextBtnAdvanced").css("display","none")
                $(".img-p").css("display","none")
                $(".div-p").css("display","none")
              }
            }else if (result.status == "OK Advance") {
              if (result.interview == null) {
                $(".progressbar li#validation").addClass("active");
                // $(".progressbar li#advanced").addClass("active");
                $("#tabA").show();
                $("#tabC").hide();
                $("#tabD").show();
                $(".text-p").html("<h2 class='center-in' style=''> Now you can relax, we'll be in touch soon! Thank you for joining partner with us. </h2>")
                $("#input-pAddress").css("display","none")
                $("#input-pPhone").css("display","none")
                $("#input-pEmail").css("display","none")
                $("#input-pName").css("display","none")
                $("#input-pNik").css("display","none")
                $("#file-inputKtp").css("display","none");
                $("#hasJoined").css("display","none")
                $("#prevBtnAdvanced").css("display","none")
                $("#nextBtnAdvanced").css("display","none")
                $(".img-p").css("display","none")
                $(".div-p").css("display","none")
              }else{
                console.log(result.interview.interview_media)
                console.log(result.interview.interview_link)
                $(".text-p").html("<h4>Hi "+ result.name +",Thank you for your passion. We have reviewed your portfolio and we will have an interview session with the following information. Please prepare yourself and good luck!</h4>")
                var append = ""
                append = append + '<tr>'
                append = append + '<th>Date</th>'
                append = append + '<td>'+ moment(result.interview.interview_date).format('dddd, MMMM Do YYYY') +'</td>'
                append = append + '</tr>'
                append = append + '<tr>'
                append = append + '<th>Time</th>'
                append = append + '<td>'+moment(result.interview.interview_date).format('h:mm:ss a') + " - Finish" +'</td>'
                append = append + '</tr>'
                append = append + '<tr>'
                append = append + '<th>Link</th>'
                if (result.interview.status == "started" || result.interview.status == "done") {
                  append = append + '<td><a target="_blank" href="'+ result.interview.interview_link + '">'+ result.interview.interview_link + '</a></td>'
                }else{
                  append = append + '<td>Room not started yet</td>'
                }
                append = append + '</tr>'
                $("#table-partner").append(append)                
                $(".progressbar li#validation").addClass("active");
                $(".progressbar li#advanced").addClass("active");
                $(".progressbar li#interview").addClass("active");
                $("#tabA").show();
                $("#tabC").hide();
                $("#tabE").show();

              }
            }else if (result.status == "OK Interview"){
              $("#tabA").show();
              $("#tabC").hide();
              $("#tabF").show();
              $(".progressbar li#validation").addClass("active");
              // $(".progressbar li#advanced").addClass("active");
              $(".progressbar li#interview").addClass("active");
              $(".progressbar li#result").addClass("active");
              $("input:checkbox").on('click', function() {
                // in the handler, 'this' refers to the box clicked on
                var $box = $(this);
                if ($box.is(":checked")) {

                  // the name of the box is retrieved using the .attr() method
                  // as it is assumed and expected to be immutable
                  var group = "input:checkbox[name='" + $box.attr("name") + "']";
                  // the checked state of the group/box on the other hand will change
                  // and the current value is retrieved using .prop() method
                  $(group).prop("checked", false);
                  $box.prop("checked", true);
                  console.log($('.optradio:checked').val())
                  if ($('.optradio:checked').val() == "accept") {
                    $( "#box-account" ).show("slow")
                    $("#account_name").change(function(){
                      localStorage.setItem("account_name", $("#account_name").val());
                      localStorage.getItem("account_name");
                    })

                    $("#account_number").change(function(){
                      localStorage.setItem("account_number",  $("#account_number").val());
                      localStorage.getItem("account_number");
                    })

                    $("#agreeBtnPartner").attr("onclick","submitAgreePartner("+ result.id + ',' + '"accept"' + ")")
                  }else{
                    $("#agreeBtnPartner").attr("onclick","submitAgreePartner("+ result.id + ',' + '"reject"' + ")")
                    $("#box-account").hide("slow");
                  }
                  $("#agreeBtnPartner").attr("disabled",false);
                } else {
                  $box.prop("checked", false);
                  $( "#box-account" ).hide("slow");
                  $("#agreeBtnPartner").attr("disabled",true);
                }
                
              }); 
            }else if (result.status == "OK Agreement") {
              $(".progressbar li#validation").addClass("active");
              // $(".progressbar li#advanced").addClass("active");
              $(".progressbar li#interview").addClass("active");
              $(".progressbar li#result").addClass("active");
              $("#tabA").show();
              $("#tabC").hide();
              $("#tabF").show();
              $(".text-p").html("<h2 class='center-in' style=''> Congratulation! Keep updated on your email for the user account information. </h2>")
              $(".img-p").css("display","none")
              $(".div-p").css("display","none")
              $("#input-radio-a").css("display","none")
              $("#input-radio-b").css("display","none")
              $("#input-account").css("display","none")
              $("#agreeBtnPartner").css("display","none")
            }else if (result.status == "OK Partner") {
              $(".text-p").html("<h4>Hi <b>" +result.name +"</b>, You`re now an EOD partner. You can pick the job based on your job category only from the EOD Mobile App and get paid. So, please download our mobile app in the Play Store or App Store. And the following information is your username and password for your EOD Mobile App.Thank you and good luck!</h4>")
                var append = ""
                append = append + '<tr>'
                append = append + '<th>Username</th>'
                append = append + '<td>'+ result.email +'</td>'
                append = append + '</tr>'
                append = append + '<tr>'
                append = append + '<th>Password</th>'
                append = append + '<td>sinergy</td>'
                append = append + '</tr>'
                append = append + '<tr>'
                append = append + '<th>App Store</th>'
                append = append + '<td><a href="#" target="_blank">https://www.apple.com/ios/app-store</a></td>'
                append = append + '</tr>'
                append = append + '<tr>'
                append = append + '<th>PlayStore</th>'
                append = append + '<td><a href="#" target="_blank">https://play.google.com/store?hl=en</a></td>'
                append = append + '</tr>'
                $("#table-partner").append(append)                
                $(".progressbar li#validation").addClass("active");
                // $(".progressbar li#advanced").addClass("active");
                $(".progressbar li#interview").addClass("active");
                $(".progressbar li#result").addClass("active");
                $("#tabA").show();
                $("#tabC").hide();
                $("#tabE").show();
            }
            console.log(result)
          }
    })
  }else{
    $("#tabB").show();
  }

  var currentTab = 0;
  
  // $.ajax({
  //     url: "{{url('guestState')}}",
  //     type:"GET",
  //     success: function(result){
  //       currentTab = parseInt(result);
  //       console.log(currentTab);
  //     }
  // })

  function nextPrevBasic(n){
    currentTab = currentTab + n;
    console.log(currentTab)
    if (currentTab == 1) {
      $("#tabA").show()
      $("#prevBtnBasic").css("display","none")
      $("#nextBtnBasic").css("display","block")
      $("#nextBtnBasic").html("Next")
      $("#input-pName").val(localStorage.getItem("names"));
      $(".text-p").html("<h3 class='center-in' style=''> 1. So, What should we call you? </h3>")
      $(".img-p").css("display","none")
      $(".div-p").css("display","none")
      $("#input-pName").css("display","block")
      $("#input-pEducation").css("display","none")
      $("#input-pAddress").css("display","none")
      $("#input-pPhone").css("display","none")
      $("#input-pEmail").css("display","none")
      $("#input-pDateBirth").css("display","none")
      $("#input-pNik").css("display","none")
      $("#file-inputKtp").css("display","none");
      $(".form-text").css("display","none");
      $("#hasJoined").css("display","none")
      document.getElementById("input-pName").placeholder = "Your First Name Last Name ex: Amanda Rawless";
      if ($("#input-pName").val().length > 0) {
        $("#nextBtnBasic").prop("disabled",false)
      }else{
        $("#nextBtnBasic").prop("disabled",true)
      }
      
      $("#input-pName").keyup(function(){
        var textLength = $(this).val();
        if (textLength.length > 0) {
          $("#nextBtnBasic").prop("disabled",false)
        }else{
          $("#nextBtnBasic").prop("disabled",true)
        }
      });
    }else if (currentTab == 2) {
      localStorage.setItem("names", $("#input-pName").val())
      // $("#input-p").attr("class","center-in input-pEmail")
      $("#prevBtnBasic").css("display","block");
      $("#input-pEmail").val(localStorage.getItem("email"));
      $(".text-p").html("<h3 class='center-in' style=''> 2. Nice, what's your Email? </h3>")
      $(".img-p").css("display","none")
      $(".div-p").css("display","none")
      $("#nextBtnBasic").html("Next")
      $("#input-pEmail").css("display","block")
      $("#input-pEducation").css("display","none")
      $("#input-pName").css("display","none")
      $("#input-pDateBirth").css("display","none")
      $("#input-pPhone").css("display","none")
      $("#input-pAddress").css("display","none")
      $("#input-pNik").css("display","none")
      $("#file-inputKtp").css("display","none");
      $(".form-text").css("display","none");
      $("#hasJoined").css("display","none")
      if ($("#input-pEmail").val().length > 0) {
        $("#nextBtnBasic").prop("disabled",false)
      }else{
        $("#nextBtnBasic").prop("disabled",true)
      }

      $("#input-pEmail").keyup(function(){
        var textLength = $(this).val();
        if (textLength.length > 0) {
          $("#nextBtnBasic").prop("disabled",false)
        }else{
          $("#nextBtnBasic").prop("disabled",true)
        }
      });
      document.getElementById("input-pEmail").placeholder = "Your email ex: email@adress.com";
    }else if (currentTab == 3) {
      localStorage.setItem("email", $("#input-pEmail").val())
      const email = localStorage.getItem("email");
      function validateEmail(email) {
        const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        return re.test(email);
      }
      if (validateEmail(email)) {
        $("#input-pPhone").val(localStorage.getItem("phone"));
        $(".text-p").html("<h3 class='center-in' style=''> 3. And, your phone number, please </h3>")
        $(".img-p").css("display","none")
        $(".div-p").css("display","none")
        $("#prevBtnBasic").css("display","block");
        $("#nextBtnBasic").html("Next")
        $("#input-pPhone").css("display","block")
        $("#input-pEducation").css("display","none")
        $("#input-pEmail").css("display","none")
        $("#input-pDateBirth").css("display","none")
        $("#input-pName").css("display","none")
        $("#input-pAddress").css("display","none")
        $("#input-pNik").css("display","none")
        $("#file-inputKtp").css("display","none");
        $(".form-text").css("display","none");
        $("#hasJoined").css("display","none")
        if ($("#input-pPhone").val().length > 0) {
          $("#nextBtnBasic").prop("disabled",false)
        }else{
          $("#nextBtnBasic").prop("disabled",true)
        }
        $("#input-pPhone").keyup(function(){
          var textLength = $(this).val();
          if (textLength.length > 0) {
            $("#nextBtnBasic").prop("disabled",false)
          }else{
            $("#nextBtnBasic").prop("disabled",true)
          }
        });
        document.getElementById("input-pPhone").placeholder = "Your phone ex: 0817865741XX";
      }else{
        currentTab = currentTab -1;
        alert('Your email address not valid!')
        $("#nextBtnBasic").prop("disabled",true)
      } 
    }else if (currentTab == 4) {
      localStorage.setItem("phone", $("#input-pPhone").val())
      $("#input-pAddress").val(localStorage.getItem("address"));
      $(".text-p").html("<h3 class='center-in' style=''> 4. Now, can you tell us where do you live? </h3>")
      $(".img-p").css("display","none")
      $(".div-p").css("display","none")
      $("#prevBtnBasic").css("display","block");
      $("#nextBtnBasic").html("Next")
      $("#input-pAddress").css("display","block")
      $("#input-pEducation").css("display","none")
      $("#input-pPhone").css("display","none")
      $("#input-pEmail").css("display","none")
      $("#input-pDateBirth").css("display","none")
      $("#input-pName").css("display","none")
      $("#input-pNik").css("display","none")
      $("#file-inputKtp").css("display","none");
      $(".form-text").css("display","none");
      $("#hasJoined").css("display","none")
      $("#nextBtnBasic").attr("onclick","nextPrevBasic(1)");
      if ($("#input-pAddress").val().length > 0) {
        $("#nextBtnBasic").prop("disabled",false)
      }else{
        $("#nextBtnBasic").prop("disabled",true)
      }
      $("#input-pAddress").keyup(function(){
        var textLength = $(this).val();
        if (textLength.length > 0) {
          $("#nextBtnBasic").prop("disabled",false)
        }else{
          $("#nextBtnBasic").prop("disabled",true)
        }
      });

      document.getElementById("input-pAddress").placeholder = "Your address ex: Jl. Kembangan, Jakarta Barat , RT.05 / RW.10,11610";
    }else if (currentTab == 5) {
      localStorage.setItem("address", $("#input-pAddress").val())
      $("#input-pDateBirth").val(localStorage.getItem("date_of_birth"));
      $(".text-p").html("<h3 class='center-in' style=''> 5. Next, what's your date of birth? </h3>")
      $(".img-p").css("display","none")
      $(".div-p").css("display","none")
      $("#prevBtnBasic").css("display","block");
      $("#nextBtnBasic").html("Next")

      $("#input-pDateBirth").css("display","block")
      $("#input-pEducation").css("display","none")
      $("#input-pAddress").css("display","none")
      $("#input-pPhone").css("display","none")
      $("#input-pEmail").css("display","none")
      $("#input-pName").css("display","none")
      $("#input-pNik").css("display","none")
      $("#file-inputKtp").css("display","none");
      $(".form-text").css("display","none");
      $("#hasJoined").css("display","none")
      $("#nextBtnBasic").attr("onclick","nextPrevBasic(1)");
      if ($("#input-pDateBirth").val() != 0) {
        $("#nextBtnBasic").prop("disabled",false)
      }else{
        $("#nextBtnBasic").prop("disabled",true)
      }
      $("#input-pDateBirth").change(function(){
        var textLength = $(this).val();
        if (textLength.length > 0) {
          $("#nextBtnBasic").prop("disabled",false)
        }else{
          $("#nextBtnBasic").prop("disabled",true)
        }
      });

      document.getElementById("input-pDateBirth").placeholder = "2000-04-14";
    }else if (currentTab == 6) {
      $("#input-pNik").val(localStorage.getItem("nik"));
      $("#input-pFilesKtp").val(localStorage.getItem("nik_files"));
      localStorage.setItem("date_of_birth", $("#input-pDateBirth").val())
      $(".img-p").css("display","none")
      $(".div-p").css("display","none")
      $(".text-p").html("<h3 class='center-in' style=''> 6. Finally, can you tell us your KTP data?</h3>")
      $("#input-pAddress").css("display","none")
      $("#input-pEducation").css("display","none")
      $("#input-pPhone").css("display","none")
      $("#input-pEmail").css("display","none")
      $("#input-pDateBirth").css("display","none")
      $("#input-pName").css("display","none")
      $("#input-pNik").css("display","block")
      $("#file-inputKtp").css("display","block");
      $(".form-text").css("display","block");
      $("#prevBtnBasic").css("display","block");
      
      // $("#nextBtnBasic").html("Submit")
      // $("#nextBtnBasic").attr("onclick","submitBasic()");
      $("#hasJoined").css("display","none")
      document.getElementById("input-pNik").placeholder = "Your NIK must be 16 digit";

      if ($("#file-inputKtp").val() == "") {
        $("#nextBtnBasic").prop("disabled",true)
      }else{
        $("#nextBtnBasic").prop("disabled",false)
      }

      $("#file-inputKtp").change(function() {
        var file = this.files[0];
        var fileType = file.type;
        var fileName = file.name;
        var fileSize = file.size;
        
        var match = ['image/png','image/jpg','image/jpeg'];
        if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) || (fileType == match[3]) || (fileType == match[4]) || (fileType == match[5]))){
            alert('Sorry, only Images files are allowed to upload.');
            $("#file-inputKtp").val('');
            return false;
        }else if (fileSize > 2000000) {
          alert('Sorry, the file size is up to 2MB');
          $("#file-inputKtp").val('');
        }

        if (fileName !== "") {
          $("#nextBtnBasic").prop("disabled",false)
          $("#input-FileName").val(fileName)
        }else{
          $("#nextBtnBasic").prop("disabled",true)
          $("#input-FileName").val()
        }
      })

      $("#input-pNik").keyup(function(){
        var textLength = $(this).val();
        if (textLength.length > 0 || $("#file-inputKtp").val() !== "") {
            $("#nextBtnBasic").prop("disabled",false)
        }else{
          $("#nextBtnBasic").prop("disabled",true)
        }
      });
    }else if (currentTab == 7) {
      localStorage.setItem("nik_files", $("#input-pFilesKtp").val())
      localStorage.setItem("nik", $("#input-pNik").val())
      $(".text-p").html("<h2 class='center-in' style=''>7. Ok, please tell us about your latest education?</h2>")
      // $("#inputEducation").val(localStorage.getItem("education"));
      $("#input-pNik").css("display","none")
      $("#file-inputKtp").css("display","none");
      $(".form-text").css("display","none");
      $("#tabC").css("display","none")
      $("#input-pEducation").show()
      $("#input-pjobCategory").css("display","none")
      $("#input-pLocation").css("display","none")
      // $("#nextBtnAdvanced").css("display","block")
      $("#input-pFiles").css("display","none");
      // $("#nextBtnAdvanced").html("Next")
      $("#hasJoined").css("display","none")

      var edu = [{
          id: 'S-3',
          text: 'S-3'
      },{
          id: 'S-2',
          text: 'S-2'
      },{
          id: 'Diploma 4',
          text: 'Diploma 4/S-1'
      },{
          id: 'Diploma 3',
          text: 'Diploma 3'
      },{
          id: 'Diploma 2',
          text: 'Diploma 2'
      }, {
          id: 'Diploma 1',
          text: 'Diploma 1'
      }, {
          id: 'SMA/SMK',
          text: 'SMA/SMK'
      }];      

      if ($("#inputEducation").val() != "") {
        $("#nextBtnBasic").prop("disabled",false)
      }else{
        $("#nextBtnBasic").prop("disabled",true)
      }

      var selval = localStorage.getItem("education");
       if(selval){
          $("#inputEducation").val(selval);
      }
      $("#inputEducation").select2({
        placeholder: "Choose...",
        theme:'bootstrap4',
        data: edu 
      })
      $("#inputEducation").on("change", function (evt) {
          var selval = $(evt.target).val();
          localStorage.setItem("education", selval);
          $("#nextBtnBasic").prop("disabled",false)
      })

      // var OldValue = localStorage.getItem("education");
      // if (OldValue !== "" && OldValue !== null) {
      //   $('#inputEducation').select2({
      //     placeholder: "Choose...",
      //     data: edu
      //   }).select2('val', OldValue);
      // }

      // $("#inputEducation").on("change", function() {
      //   var selected = $(this).val();
      //   localStorage.setItem("education", selected);
      //   $("#nextBtnBasic").prop("disabled",false)
      //   // if (textLength.length > 0) {
      //   //   $("#nextBtnBasic").prop("disabled",false)
      //   // }else{
      //   //   $("#nextBtnBasic").prop("disabled",true)
      //   // }
      // });
      
      // $("#inputEducation").change(function(evt){
      //   var selval = $(evt.target).val();
      //   localStorage.setItem("education", selval);
      //   var textLength = $(this).val();
      //   if (textLength.length > 0) {
      //     $("#nextBtnBasic").prop("disabled",false)
      //   }else{
      //     $("#nextBtnBasic").prop("disabled",true)
      //   }
      // });
      
      document.getElementById("input-pEducation").placeholder = "Type your latest Education here..";
    }else if (currentTab == 8) {
      localStorage.setItem("education", selval);
      if (JSON.parse(localStorage.getItem("category")) == null) {
        var localCat = []
      }else{
        var localCat = JSON.parse(localStorage.getItem("category"))
      }
      initialJobCategory();
      function initialJobCategory(){
        $.ajax({
          type:"GET",
          url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/dashboard/getJobCategory",
          success:function(result){
            $("#jobCategoryList").empty("")
            $.each(result.job_category, function( index, value ) {
              var append = "";
              append = append + '<div class="img__wrap radio-custom" data-value="'+ value.id +'">'
              append = append +   '<img class="img__img" src="'+ value.category_image_url +'"/>'
              append = append +   '<div class="img__description_layer">'
              append = append +     '<p class="img__description">'+ value.category_name +'</p>'
              append = append +   '</div>'
              append = append + '</div>'

              $("#jobCategoryList").append(append)

              $(".radio-group").on("click",".radio-custom[data-value='"+value.id+"']",function(){
                  console.log(value.id+""+"data-value")
                  var val = $(this).attr('data-value')
                  $(this).toggleClass('active')
                  if ($(this).hasClass("active")) {
                    if (localCat.length == 0) {
                      console.log(localCat.length)
                      localCat.push(val)
                      localStorage.setItem("category", JSON.stringify(localCat));
                    }else if(localCat.indexOf("'"+ val +"'") == -1){
                      localCat.push(val)
                      localStorage.setItem("category", JSON.stringify(localCat));
                    }
                    Swal.fire({
                      title: value.category_name,
                      text: value.category_description,
                      imageUrl: value.category_image_url,
                      imageWidth: 200,
                      imageHeight: 200,
                      imageAlt: 'Custom image',
                    })  
                  }
                  else{
                    localCat.splice(localCat.indexOf(val),1)
                    localStorage.setItem("category", JSON.stringify(localCat));
                  }
                  
                  //kalau sudah di next terus prev kalau nomor awal udah di pilih brrti udah aktive mangkanya nilainya true terus jadi double
                  
                  $("#nextBtnBasic").prop("disabled",false)                        
              })

            })

            $.each(JSON.parse(localStorage.getItem('category')),function(index,value){
              $(".radio-custom[data-value='"+ value +"']").addClass('active')

            })
          }
        })

        if (JSON.parse(localStorage.getItem('category')) !== null) {
          $("#nextBtnBasic").prop("disabled",false)
        }else{
          $("#nextBtnBasic").prop("disabled",true)
        }
      }
      // localStorage.setItem("education", $("#inputEducation").val())
      // var locationSelect  = $('#inputEducation');
      // var option = new Option(localStorage.setItem("education", $("#inputEducation").val()), localStorage.setItem("education", $("#inputEducation").val()), true, true);
      // locationSelect.append(option).trigger('change');

      $(".text-p").html("<h2 class='center-in' style=''>8. Now, select your job category?</h2><br><p></p>")
      // $("#tabB").css("display","none")
      $("#tabC").css("display","none")
      $("#nextBtnBasic").html("Next")
      $("#prevBtnBasic").css("display","block")
      $("#input-pEducation").css("display","none")
      $("#input-pjobCategory").css("display","block")
      $("#input-pLocation").css("display","none")
      $("#hasJoined").css("display","none")
      $("#input-pFiles").css("display","none");
      document.getElementById("input-pEducation").placeholder = "Type your latest Education here..";
    }else if (currentTab == 9) {
      if(localStorage.getItem('jobLocation')){
          $('#inputJobLocation').val(localStorage.getItem('jobLocation'));
      }
      if (localStorage.getItem('jobRegion')) {
        $('#inputJobRegion').val(localStorage.getItem('jobRegion'));
      }
      if (localStorage.getItem('jobArea')) {
          $('#inputJobArea').val(localStorage.getItem('jobArea'));
      }


      $("#inputJobRegion").select2({
        theme: 'bootstrap4',
        ajax: {
          url: "{{env('API_LINK_CUSTOM_PUBLIC')}}/job/createJob/getParameterLocationAll",
          dataType: 'json',
        }
      });

      $("#inputJobRegion").on('select2:select', function (e) {
        if ($("#inputJobRegion").val() !== "") {
          $("#nextBtnBasic").prop("disabled",false)
        }else{
          $("#nextBtnBasic").prop("disabled",true)
        }
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

      if ($("#inputJobRegion").val() !== "") {
        $("#nextBtnBasic").prop("disabled",false)
      }else{
        $("#nextBtnBasic").prop("disabled",true)
      }

      $(".text-p").html("<h2 class='center-in' style=''>9. Now, please choose your current Coverage Area?</h2>")
      // $("#tabA").css("display","none")
      // $("#tabB").css("display","none")
      $("#tabC").css("display","none")
      $("#nextBtnBasic").html("Next")
      $("#prevBtnBasic").css("display","block")
      $("#input-pEducation").css("display","none")
      $("#input-pjobCategory").css("display","none")
      $("#input-pLocation").css("display","block")
      $("#input-pFiles").css("display","none");
      $("#hasJoined").css("display","none")      
      document.getElementById("input-pEducation").placeholder = "Type your latest Education here..";
      $("#nextBtnBasic").attr("onclick","nextPrevBasic(1)");
    }else if (currentTab == 10) {
      $('#inputJobLocation').change(function() {
        localStorage.setItem('jobLocation', this.value);
      });
      $('#inputJobRegion').change(function() {
        localStorage.setItem('jobRegion', this.value);
      });
      $('#inputJobArea').change(function() {
        localStorage.setItem('jobArea', this.value);
      });

      $(".form-text-file").show()

      $("#file-input").change(function() {
          var file = this.files[0];
          var fileType = file.type;
          var fileName = file.name;
          var fileSize = file.size;
          var match = ['application/pdf'];
          if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) || (fileType == match[3]) || (fileType == match[4]) || (fileType == match[5]))){
              alert('Sorry, only PDF files are allowed to upload.');
              $("#file-input").val('');
              return false;
          }else if (fileSize > 2000000) {
            alert('Sorry, the file size is up to 2MB');
            $("#file-input").val('');
          }
          $("#nextBtnBasic").prop("disabled",false)
          
      });

      if ($("#file-input").val() == "") {
        $("#nextBtnBasic").prop("disabled",true)
      }else{
        $("#nextBtnBasic").prop("disabled",false)
      }
      
      $(".text-p").html("<h2 class='center-in' style=''>10. And, please input your portofolio.</h2>")
      $("#input-pFiles").css("display","block");
      $("#input-pEducation").css("display","none")
      $("#input-pjobCategory").css("display","none")
      $("#input-pLocation").css("display","none")
      // $("#nextBtnAdvanced").html("Submit")
      $("#nextBtnBasic").html("Submit")
      $("#nextBtnBasic").attr("onclick","submitBasic()");
      $("#prevBtnAdvanced").css("display","block")
    }

  }

  function submitBasic(){
    localStorage.setItem("nik", $("#input-pNik").val())
    localStorage.setItem("nik_files", $("#input-pFilesKtp").val())
    if ($("#input-pNik").val() == "") {
      alert('Please fill your NIK!')
    }else if ($("#input-pNik").val().length < 16 ) {
        alert('your NIk must be 16 digit')
    }else if ($("#file-inputKtp").val() == "") {
      alert('Please upload your KTP Scan!')
    }else{
      Swal.fire({
        title: 'Are you sure?',
        text: "to submit your form",
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
        var filesKtp = $('#file-inputKtp')[0].files[0];
        var files = $('#file-input')[0].files[0];
        // fd.append('file',files);
        fd.append('name',$("#input-pName").val());
        fd.append('phone',$("#input-pPhone").val());
        fd.append('email',$("#input-pEmail").val());
        fd.append('address',$("#input-pAddress").val());
        fd.append('ktp_nik',$("#input-pNik").val());
        fd.append('date_of_birth',$("#input-pDateBirth").val());
        fd.append('ktp_files',filesKtp);
        // fd.append('history_status',1);
        // fd.append('history_user',1);

        fd.append('latest_education',$("#input-pEducation").val());
        fd.append('portofolio_file',files);
        fd.append('id_area',$("#inputJobLocation").val());
        fd.append('id_category',[JSON.parse(localStorage.getItem("category"))]);
        fd.append('history_status',1);
        fd.append('history_user',1);

        $.ajax({
          type:"POST",
          url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/join/postBasicJoin",
          headers: {
            Accept:"application/json"
          },
          data:fd,
          contentType: false,
          processData: false,
          success: function (result){
            Swal.showLoading()
            localStorage.clear();
            Swal.fire(
              'Congrats!',
              'You`re Registered For Join Basic.',
              'success'
            ).then((result) => {
              if (result.value) {
                $(".progressbar li#validation").addClass("active");
                $(".img-p").css("display","none")
                $(".div-p").css("display","none")
                $("#input-pAddress").css("display","none")
                $("#input-pPhone").css("display","none")
                $("#input-pEmail").css("display","none")
                $("#input-pDateBirth").css("display","none")
                $("#input-pName").css("display","none")
                $("#input-pNik").css("display","none")
                $("#input-pFilesKtp").css("display","none");
                $("#hasJoined").css("display","none")
                $("#prevBtnBasic").css("display","none")
                $("#nextBtnBasic").css("display","none")
                // location.reload()
                
                $(".text-p").html("<h2 class='center-in' style=''> Now you can relax, we'll be in touch soon! Thank You for joining partner with us. </h2>")
                $(".img-p").css("display","none")
                $(".div-p").css("display","none")
                $("#input-pEducation").css("display","none")
                $("#input-pjobCategory").css("display","none")
                $("#input-pLocation").css("display","none")
                $("#input-pFiles").css("display","none");
              }
            })
          }
        })
      }
      }); 
      // localStorage.clear();
      console.log($("#input-pAddress").val())
      console.log($("#input-pPhone").val())
      console.log($("#input-pEmail").val())
      console.log($("#input-pName").val())
      console.log($("#input-pNik").val())
    }
  }

  function nextPrevAdvanced(n){
    currentTab = currentTab + n;
    console.log(currentTab)

    if (currentTab == 1) {
      $(".text-p").html("<h2 class='center-in' style=''>1.Ok, Can you tell us your latest education?</h2>")
      $("#input-pEducation").val(localStorage.getItem("education"));
      // $("#tabA").css("display","none")
      $(".progressbar li#validation").addClass("active");
      $(".progressbar li#advanced").addClass("active");
      $("#tabB").css("display","none")
      $("#tabC").css("display","none")
      $("#input-pEducation").css("display","block")
      $("#input-pjobCategory").css("display","none")
      $("#input-pLocation").css("display","none")
      // $("#prevBtnAdvanced").css("display","block")
      $("#nextBtnAdvanced").css("display","block")
      $("#input-pFiles").css("display","none");
      $("#nextBtnAdvanced").html("Next")
      $("#hasJoined").css("display","none")
      if ($("#input-pEducation").val().length > 0) {
        $("#nextBtnAdvanced").prop("disabled",false)
      }else{
        $("#nextBtnAdvanced").prop("disabled",true)
      }
      
      $("#input-pEducation").keyup(function(){
        var textLength = $(this).val();
        if (textLength.length > 0) {
          $("#nextBtnAdvanced").prop("disabled",false)
        }else{
          $("#nextBtnAdvanced").prop("disabled",true)
        }
      });
      
      document.getElementById("input-pEducation").placeholder = "Type your latest Education here..";
    }else if (currentTab == 2) {
      if (JSON.parse(localStorage.getItem("category")) == null) {
        var localCat = []
      }else{
        var localCat = JSON.parse(localStorage.getItem("category"))
      }

      console.log(localCat+" "+"localCat")
      $(".progressbar li#validation").addClass("active");
      $(".progressbar li#advanced").addClass("active");
      initialJobCategory();
      function initialJobCategory(){
        $.ajax({
          type:"GET",
          url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/dashboard/getJobCategory",
          success:function(result){
            $("#jobCategoryList").empty("")
            $.each(result.job_category, function( index, value ) {
              var append = "";
              append = append + '<div class="img__wrap radio-custom" data-value="'+ value.id +'">'
              append = append +   '<img class="img__img" src="'+ value.category_image_url +'"/>'
              append = append +   '<div class="img__description_layer">'
              append = append +     '<p class="img__description">'+ value.category_name +'</p>'
              append = append +   '</div>'
              append = append + '</div>'



              // $(".img__wrap[data-value='"+JSON.parse(localStorage.getItem("category"))+"']").attr("data-value",value.id).addClass('active')

              $("#jobCategoryList").append(append)
              

              $(".radio-group").on("click",".radio-custom[data-value='"+value.id+"']",function(){
                  console.log(value.id+""+"data-value")
                  var val = $(this).attr('data-value')
                  $(this).toggleClass('active')
                  // console.log(localCat)
                  if ($(this).hasClass("active")) {
                    if (localCat.length == 0) {
                      console.log(localCat.length)
                      localCat.push(val)
                      localStorage.setItem("category", JSON.stringify(localCat));
                      // if (localCat.length == 0) {
                      //   localCat.push(val)
                      //   localStorage.setItem("category", localCat);
                      // }else{
                      //   var localCat = [JSON.stringify(JSON.parse(localStorage.getItem("category")))];
                      //   localCat.push(val)
                      //   localStorage.setItem("category", cat);
                      // }
                    }else if(localCat.indexOf("'"+ val +"'") == -1){
                      localCat.push(val)
                      // localStorage.removeItem("category");
                      localStorage.setItem("category", JSON.stringify(localCat));
                      // localStorage.removeItem("category");
                    }
                    // else{
                    //   $(this).removeClass('active');
                    //   localCat.splice(localCat.indexOf(val),1)
                    //   localStorage.setItem("category", JSON.stringify(localCat));
                    // }
                  }
                  else{
                    // console.log(localCat)
                    // localCat = JSON.parse(localStorage.getItem("category"))
                    // cat.push(val)
                    // localStorage.setItem("category", JSON.stringify(cat));
                    localCat.splice(localCat.indexOf(val),1)
                    localStorage.setItem("category", JSON.stringify(localCat));
                    // localStorage.removeItem("category");
                  }
                  
                  //kalau sudah di next terus prev kalau nomor awal udah di pilih brrti udah aktive mangkanya nilainya true terus jadi double
                  


                  // $(this).parent().find('.radio').removeClass('active');
                  // $(this).addClass('active');
                  
                  // localStorage.setItem("category", cat)
                  
                  $("#nextBtnAdvanced").prop("disabled",false)
                  Swal.fire({
                    title: value.category_name,
                    text: value.category_description,
                    imageUrl: value.category_image_url,
                    imageWidth: 200,
                    imageHeight: 200,
                    imageAlt: 'Custom image',
                  })
                  // $(this).attr("href", "#popup1");
                  // console.log(JSON.parse(localStorage.getItem('category')))         
              })

            })

            $.each(JSON.parse(localStorage.getItem('category')),function(index,value){
              // console.log(value)
              $(".radio-custom[data-value='"+ value +"']").addClass('active')

            // $(".radio-custom[data-value='"+value+"']").addClass('active')

            })
          }
        })

        if (JSON.parse(localStorage.getItem('category')) !== null) {
          // $(".radio[data-value='"+localStorage.getItem("category")+"']").attr("data-value",value.id).addClass('active')
          $("#nextBtnAdvanced").prop("disabled",false)
        }else{
          $("#nextBtnAdvanced").prop("disabled",true)
        }
      }


      // $(".radio-custom[data-value='"+localStorage.getItem("category")+"']").attr("data-value",JSON.parse(localStorage.getItem("category"))).addClass('active')
          
      localStorage.setItem("education", $("#input-pEducation").val())
      $(".text-p").html("<h2 class='center-in' style=''>2.Now, select your job category?</h2>")
      // $("#tabA").css("display","none")
      $("#tabB").css("display","none")
      $("#tabC").css("display","none")
      $("#nextBtnAdvanced").html("Next")
      $("#prevBtnAdvanced").css("display","block")
      $("#input-pEducation").css("display","none")
      $("#input-pjobCategory").css("display","block")
      $("#input-pLocation").css("display","none")
      $("#hasJoined").css("display","none")
      $("#input-pFiles").css("display","none");
      document.getElementById("input-pEducation").placeholder = "Type your latest Education here..";
    }else if (currentTab == 3) {
      $(".progressbar li#validation").addClass("active");
      $(".progressbar li#advanced").addClass("active");
      if(localStorage.getItem('jobLocation')){
          $('#inputJobLocation').val(localStorage.getItem('jobLocation'));
      }
      if (localStorage.getItem('jobRegion')) {
        $('#inputJobRegion').val(localStorage.getItem('jobRegion'));
      }
      if (localStorage.getItem('jobArea')) {
          $('#inputJobArea').val(localStorage.getItem('jobArea'));
      }


      $("#inputJobRegion").select2({
        theme: 'bootstrap4',
        ajax: {
          url: "{{env('API_LINK_CUSTOM_PUBLIC')}}/job/createJob/getParameterLocationAll",
          dataType: 'json',
        }
      });

      $("#inputJobRegion").on('select2:select', function (e) {
        if ($("#inputJobRegion").val() !== "") {
          $("#nextBtnAdvanced").prop("disabled",false)
        }else{
          $("#nextBtnAdvanced").prop("disabled",true)
        }
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

      if ($("#inputJobRegion").val() !== null) {
        $("#nextBtnAdvanced").prop("disabled",false)
      }else{
        $("#nextBtnAdvanced").prop("disabled",true)
      }

      $(".text-p").html("<h2 class='center-in' style=''>3.Now, please choose your current Area Coverage?</h2>")
      // $("#tabA").css("display","none")
      $("#tabB").css("display","none")
      $("#tabC").css("display","none")
      $("#nextBtnAdvanced").html("Next")
      $("#prevBtnAdvanced").css("display","block")
      $("#input-pEducation").css("display","none")
      $("#input-pjobCategory").css("display","none")
      $("#input-pLocation").css("display","block")
      $("#input-pFiles").css("display","none");
      $("#hasJoined").css("display","none")      
      document.getElementById("input-pEducation").placeholder = "Type your latest Education here..";
      $("#nextBtnAdvanced").attr("onclick","nextPrevAdvanced(1)");
    }else if (currentTab == 4) {
      $(".progressbar li#validation").addClass("active");
      $(".progressbar li#advanced").addClass("active");
      $('#inputJobLocation').change(function() {
        localStorage.setItem('jobLocation', this.value);
      });
      $('#inputJobRegion').change(function() {
        localStorage.setItem('jobRegion', this.value);
      });
      $('#inputJobArea').change(function() {
        localStorage.setItem('jobArea', this.value);
      });

      $("#file-input").change(function() {
          var file = this.files[0];
          var fileType = file.type;
          var fileName = file.name;
          var match = ['application/pdf'];
          if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) || (fileType == match[3]) || (fileType == match[4]) || (fileType == match[5]))){
              alert('Sorry, only PDF files is allowed to upload.');
              $("#file-input").val('');
              return false;
          }
      });
      
      $(".text-p").html("<h2 class='center-in' style=''>4.And, please input your portofolio.</h2>")
      $("#input-pFiles").css("display","block");
      $("#input-pEducation").css("display","none")
      $("#input-pjobCategory").css("display","none")
      $("#input-pLocation").css("display","none")
      $("#nextBtnAdvanced").html("Submit")
      $("#prevBtnAdvanced").css("display","block")
      $("#nextBtnAdvanced").attr("onclick","submitAdvanced()");
    }
  }

  function submitAdvanced(){
    if ($("#file-input").val() !== "") {
      Swal.fire({
        title: 'Are you sure?',
        text: "to submit your form",
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
          var files = $('#file-input')[0].files[0];
          // fd.append('file',files);
          fd.append('latest_education',$("#input-pEducation").val());
          fd.append('portofolio_file',files);
          fd.append('id_area',$("#inputJobLocation").val());
          fd.append('id_category',[JSON.parse(localStorage.getItem("category"))]);
          fd.append('history_status',3);
          fd.append('history_user',1);
          if ($("#input-pIdentifier").val() == "") {
            fd.append('identifier',window.location.href.split("/")[4]);
          }else{
            fd.append('identifier',$("#input-pIdentifier").val());
          }

          $.ajax({
            type:"POST",
            url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/join/postAdvancedJoin",
            data:fd,
            contentType: false,
            processData: false,
            success: function (result){
              Swal.showLoading()
              localStorage.clear();
              Swal.fire(
                'Congrats!',
                'You`re Registered for Advanced Join Stage.',
                'success'
              ).then((result) => {
                if (result.value) {
                  $(".progressbar li#validation").addClass("active");
                  $(".progressbar li#advanced").addClass("active");
                  $(".text-p").html("<h2 class='center-in' style=''> Now you can relax, we'll be in touch soon! Thank You for joining partner with us. </h2>")
                  $(".img-p").css("display","none")
                  $(".div-p").css("display","none")
                  $("#input-pEducation").css("display","none")
                  $("#input-pjobCategory").css("display","none")
                  $("#input-pLocation").css("display","none")
                  $("#input-pFiles").css("display","none");
                  $("#prevBtnAdvanced").css("display","none")
                  $("#nextBtnAdvanced").css("display","none")
                  
                  localStorage.clear();
                }
              })
            }
          })
        }
      }); 
      
      
    }else{
      alert('Please Upload File!')
    }
  }

  function hasJoined(){
    $("#tabA").css("display","none")
    $("#tabB").css("display","none")
    $("#tabC").css("display","block")
  }

  function kodeUnik(status){
    if (status == 'cancel') {
      $("#tabA").show();
      $("#tabB").show()
      $("#tabC").hide();
    }else{
      $.ajax({
          url: "{{env('API_LINK_CUSTOM_PUBLIC')}}/partner/getNewPartnerIdentifier",
          type:"POST",
          data:{
            identifier:($("#input-pIdentifier").val())
          },
          success: function(result){
            if (result.status == "On Progress") {
              $(".progressbar li#validation").addClass("active");
              $("#tabA").show();
              $(".text-p").html("<h2 class='center-in' style=''> Now you can relax, we'll be in touch soon! Thank you for joining partner with us. </h2>")
              $("#input-pAddress").css("display","none")
              $("#input-pPhone").css("display","none")
              $("#input-pEmail").css("display","none")
              $("#input-pName").css("display","none")
              $("#input-pNik").css("display","none")
              $("#input-pFilesKtp").css("display","none");
              $("#hasJoined").css("display","none")
              $("#prevBtnBasic").css("display","none")
              $("#nextBtnBasic").css("display","none")
              $(".img-p").css("display","none")
              $(".div-p").css("display","none")
              $("#tabC").hide();
              $("#tabB").show();
            }else if (result.status == "OK Basic") {
              $(".progressbar li#validation").addClass("active");
              $(".progressbar li#advanced").addClass("active");
              $("#tabA").show();
              // $("#tabB").css("display","block")
              $("#tabC").hide();
              $("#tabD").show();
              if (result.latest_education != null) {
                $(".text-p").html("<h2 class='center-in' style=''> Now you can relax, we'll be in touch soon! Thank you for joining partner with us. </h2>")
                $("#input-pAddress").css("display","none")
                $("#input-pPhone").css("display","none")
                $("#input-pEmail").css("display","none")
                $("#input-pName").css("display","none")
                $("#input-pNik").css("display","none")
                $("#input-pFilesKtp").css("display","none");
                $("#hasJoined").css("display","none")
                $("#prevBtnAdvanced").css("display","none")
                $("#nextBtnAdvanced").css("display","none")
                $(".img-p").css("display","none")
                $(".div-p").css("display","none")
              }
            }else if (result.status == "OK Advance") {
              if (result.interview == null) {
                $(".progressbar li#validation").addClass("active");
                $(".progressbar li#advanced").addClass("active");
                $("#tabA").show();
                $("#tabC").hide();
                $("#tabD").show();
                $(".text-p").html("<h2 class='center-in' style=''> Now you can relax, we'll be in touch soon! Thank you for joining partner with us. </h2>")
                $("#input-pAddress").css("display","none")
                $("#input-pPhone").css("display","none")
                $("#input-pEmail").css("display","none")
                $("#input-pName").css("display","none")
                $("#input-pNik").css("display","none")
                $("#input-pFilesKtp").css("display","none");
                $("#hasJoined").css("display","none")
                $("#prevBtnAdvanced").css("display","none")
                $("#nextBtnAdvanced").css("display","none")
                $(".img-p").css("display","none")
                $(".div-p").css("display","none")
              }else{
                $(".text-p").html("<h4>Hi ("+ result.name +"), Thank you for your passion. We have reviewed your portofolio and we have some interview session. the following below is more information of your interview. So prepare yourself and good luck!</h4>")
                var append = ""
                append = append + '<tr>'
                append = append + '<th>Date</th>'
                append = append + '<td>'+ moment(result.interview.interview_date).format('dddd, MMMM Do YYYY') +'</td>'
                append = append + '</tr>'
                append = append + '<tr>'
                append = append + '<th>Time</th>'
                append = append + '<td>'+moment(result.interview.interview_date).format('h:mm:ss a') + " - Finish" +'</td>'
                append = append + '</tr>'
                append = append + '<tr>'
                append = append + '<th>Link</th>'
                if (result.interview.status == "started" || result.interview.status == "done") {
                  append = append + '<td><a href="'+ result.interview.interview_link + '">'+ result.interview.interview_link + '</a></td>'
                }else{
                  append = append + '<td>Room not started yet</td>'
                }
                append = append + '</tr>'
                $("#table-partner").append(append)                
                $(".progressbar li#validation").addClass("active");
                $(".progressbar li#advanced").addClass("active");
                $(".progressbar li#interview").addClass("active");
                $("#tabA").show();
                $("#tabC").hide();
                $("#tabE").show();

              }
            }else if (result.status == "OK Interview"){
              $("#tabA").show();
              $("#tabC").hide();
              $("#tabF").show();
              $(".progressbar li#validation").addClass("active");
              $(".progressbar li#advanced").addClass("active");
              $(".progressbar li#interview").addClass("active");
              $(".progressbar li#result").addClass("active");
              $("input:checkbox").on('click', function() {
                // in the handler, 'this' refers to the box clicked on
                var $box = $(this);
                if ($box.is(":checked")) {

                  // the name of the box is retrieved using the .attr() method
                  // as it is assumed and expected to be immutable
                  var group = "input:checkbox[name='" + $box.attr("name") + "']";
                  // the checked state of the group/box on the other hand will change
                  // and the current value is retrieved using .prop() method
                  $(group).prop("checked", false);
                  $box.prop("checked", true);
                  console.log($('.optradio:checked').val())
                  if ($('.optradio:checked').val() == "accept") {
                    $( "#box-account" ).toggle(function() {
                        $( this ).addClass( "hided" );
                    }, function() {
                        $( this ).removeClass( "showed" );
                    });
                    $("#account_name").change(function(){
                      localStorage.setItem("account_name", $("#account_name").val());
                      localStorage.getItem("account_name");
                    })

                    $("#account_number").change(function(){
                      localStorage.setItem("account_number",  $("#account_number").val());
                      localStorage.getItem("account_number");
                    })

                    $("#agreeBtnPartner").attr("onclick","submitAgreePartner("+ result.id + ',' + '"accept"' + ")")
                  }else{
                    $("#agreeBtnPartner").attr("onclick","submitAgreePartner("+ result.id + ',' + '"reject"' + ")")
                    $("#box-account").hide("slow");
                  }
                  $("#agreeBtnPartner").attr("disabled",false);
                } else {
                  $box.prop("checked", false);
                  $( "#box-account" ).hide("slow");
                  $("#agreeBtnPartner").attr("disabled",true);
                }
                
              }); 
            }else if (result.status == "OK Agreement") {
              $(".progressbar li#validation").addClass("active");
              $(".progressbar li#advanced").addClass("active");
              $(".progressbar li#interview").addClass("active");
              $(".progressbar li#result").addClass("active");
              $("#tabA").show();
              $("#tabC").hide();
              $("#tabF").show();
              $(".text-p").html("<h2 class='center-in' style=''> Congratulation! Keep Follow up on our website for your new account user information! </h2>")
              $(".img-p").css("display","none")
              $(".div-p").css("display","none")
              $("#input-radio-a").css("display","none")
              $("#input-radio-b").css("display","none")
              $("#input-account").css("display","none")
              $("#agreeBtnPartner").css("display","none")
            }else if (result.status == "OK Partner") {
              $(".text-p").html("<h4>Hi ("+ result.name +"), You`re now a partner of the company.You can pick the job based on your job category and get paid. But you can only pick the job from Sinergy Freelance App. So please download our mobile app in the play store or app store. And the following bellow is our username and password for your Sinergy Freelance App. Thank you and good luck!</h4>")
                var append = ""
                append = append + '<tr>'
                append = append + '<th>Username</th>'
                append = append + '<td>'+ result.email +'</td>'
                append = append + '</tr>'
                append = append + '<tr>'
                append = append + '<th>Password</th>'
                append = append + '<td>sinergy</td>'
                append = append + '</tr>'
                append = append + '<tr>'
                append = append + '<th>App Store</th>'
                append = append + '<td><a href="#" target="_blank">https://www.apple.com/ios/app-store</a></td>'
                append = append + '</tr>'
                append = append + '<tr>'
                append = append + '<th>PlayStore</th>'
                append = append + '<td><a href="#" target="_blank">https://play.google.com/store?hl=en</a></td>'
                append = append + '</tr>'
                $("#table-partner").append(append)                
                $(".progressbar li#validation").addClass("active");
                $(".progressbar li#advanced").addClass("active");
                $(".progressbar li#interview").addClass("active");
                $(".progressbar li#result").addClass("active");
                $("#tabA").show();
                $("#tabC").hide();
                $("#tabE").show();
            }
            console.log(result)
          }
      })
    }    
  
  }  

  function submitAgreePartner(id,status){
    var fd = new FormData();

    if (status == "accept") {
      Swal.fire({
          title: 'Are you sure?',
          text: "complete this!",
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

          fd.append('status','OK Agreement');
          fd.append('id_candidate',id);
          fd.append('history_user',1);
          fd.append('history_status',8);
          fd.append('account_name',$("#account_name").val());
          fd.append('account_number',$("#account_number").val());
          fd.append('account_alias',$("#account_alias").val());

          $.ajax({
              url: "{{env('API_LINK_CUSTOM_PUBLIC')}}/join/postPartnerAgreement",
              type:"POST",
              data:fd,
              contentType: false,
              processData: false,
              success: function(result){
                console.log(result)
                Swal.showLoading()
                localStorage.clear();
                Swal.fire(
                  'Thank You!',
                  'Please wait for your user account!.',
                  'success'
                ).then((result) => {
                  if (result.value) {
                    $(".text-p").html("<h2 class='center-in' style=''> Congratulation! Keep updated on your email for the user account information.</h2>")
                    $(".img-p").css("display","none")
                    $(".div-p").css("display","none")
                    $("#input-radio-a").css("display","none")
                    $("#input-radio-b").css("display","none")
                    $("#input-account").css("display","none")
                    $("#agreeBtnPartner").css("display","none")
                  }
                })
              }
          })

        }
      });
      
    }else{
      fd.append('status','Reject');
      fd.append('id_candidate',id);
      fd.append('history_user',1);
      fd.append('history_status',8);
      fd.append('account_name',$("#account_name").val());
      fd.append('account_number',$("#account_number").val());
      $.ajax({
          url: "{{env('API_LINK_CUSTOM_PUBLIC')}}/join/postPartnerAgreement",
          type:"POST",
          data:fd,
          success: function(result){
          }
      })
    }
    
  }
</script>
@endsection
