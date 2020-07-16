@extends('layouts.app')
@section('style')
<style type="text/css">
  .container2{
    width: 600px;
      margin: 100px auto; 
  }
  .progressbar {
    counter-reset: step;
  }
  .progressbar li {
      list-style-type: none;
      width: 20%;
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

  input {
    border: 0;
    outline: 0;
    background: transparent;
    border-bottom: 1px solid black;
  }
  input:focus {
    border-color: green
  }

  .btnCenter{
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    margin: 10px auto;
    position: relative;
    text-align:center;
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

/*  .img-hover-zoom--colorize:hover{
    background-color: white!important;
  }

  .img-hover-zoom--colorize img {
    transition: transform .5s, filter 1.5s ease-in-out;
    filter: grayscale(100%);
  }

  .img-hover-zoom--colorize:hover img {
    filter: grayscale(0);
    transform: scale(2.1);
    display: none;
  }*/

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
</style>
@endsection
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<link href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css" rel="stylesheet" />
<div class="container">
  <div id="tabA">
    <ul class="progressbar">
      <li class="active">Basic Information</li>
      <li>Validation</li>
      <li>Advanced Information</li>
      <li>Interview schedule</li>
      <li>Result</li>
    </ul>
  </div>

  <div id="tabB" style="padding-top: 100px;display: none;">
      <div class="col-md-12">
         <img src="{{env('API_LINK_CUSTOM2')}}\storage\image\user_photo\freelance-profile-2.png" width="150px" height="150px" class="center-in img-p">
        <div style="text-align: center;color: #b3a7db;font-size: 20px" class="center-in div-p">Sinergy Freelance</div>

        <p class="center-in text-p" style="width: 500px;text-align: center;">Sinergy Freelance is a mobile app that can be used to freelancer for searching the job, do the job, and get payment. But first, you have to join partner to become a Sinergy Freelancer.</p>

        <input id="input-pName" placeholder="Type your name here...." class="center-in" style="display: none;width: 400px">

        <input id="input-pEmail" placeholder="Type your name here...." class="center-in" style="display: none;width: 400px">

        <input id="input-pPhone" placeholder="Type your name here...." class="center-in" style="display: none;width: 400px">

        <input id="input-pAddress" placeholder="Type your name here...." class="center-in" style="display: none;width: 400px">

        <div class="btnCenter">
          <button id="prevBtn" style="margin: 10px;display: none" class="btn btn-primary btn-secondary" onclick="nextPrev(-1)">Prev</button>
          <button id="nextBtn" style="margin: 10px" class="btn btn-primary btn-secondary" onclick="nextPrev(1)">Show me</button>
          <a style="margin-right: -125px;margin-top: 15px;display: none;" onclick="hasJoined()" id="hasJoined">Sudah pernah join</a>  
        </div>

      </div>
  </div>

  <div id="tabC" style="padding-top: 100px;display: none;">
      <div class="col-md-12">

        <div style="text-align: center;color: #b3a7db;font-size: 20px" class="center-in div-p">Masukkan Kode</div>

        <input type="" name="" class="form-control center-in" style="width: 500px">

        <div class="btnCenter">
          <button style="margin: 10px;" class="btn btn-light btn-secondary" onclick="kodeUnik('cancel')">Cancel</button>
          <button style="margin: 10px" class="btn btn-primary btn-secondary" onclick="kodeUnik('submit')">Submit</button>
        </div>
      </div>
  </div>

  <div id="tabD" style="padding-top: 100px;">
    <div class="col-md-12">
      <h1 class="text-p center-in" style="width: 500px;text-align: center;">Hello Sinergy, Thank's for join us and congratulations to you who passed in first stage of our requirement.</h1>

      <input id="input-pEducation" placeholder="Type your name here...." class="center-in" style="display: none;width: 400px">

      <div id="input-pjobCategory" style="display: none;margin-top: 10px">
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

      <div class="image-upload" id="input-pFiles" style="display: none;">
        <label for="file-input" class="btnCenter">
          <img id="imgFiles" class="imgFiles" src="https://cdn.onlinewebfonts.com/svg/img_106837.png"/>
          <div style="display: none;border: 2px solid black;width: 500px;height: 50px" id="outputFiles"></div>
        </label>
        <form id="fileinfo" enctype="multipart/form-data" method="post" name="fileinfo">
          <input class="btnCenter" name="file_input" id="file-input" alt="Engineer On Demand" type="file" />
        </form>
      </div>
      

      <div class="btnCenter">
        <button id="prevBtnAdvanced" style="margin: 10px;display: none" class="btn btn-primary btn-secondary" onclick="nextPrevAdvanced(-1)">Prev</button>
        <button id="nextBtnAdvanced" style="margin: 10px" class="btn btn-primary btn-secondary" onclick="nextPrevAdvanced(1)">Got Next Step</button>
      </div>
    </div>
  </div>    
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script type="text/javascript">

  // function readURL(input) {
  //   if (input.files && input.files[0]) {
  //     var reader = new FileReader();
      
  //     reader.onload = function(e) {
  //       $('#imgFiles').attr('src', e.target.result);
  //       $('#imgFiles').addClass('imgFiles');
  //     }
      
  //     reader.readAsDataURL(input.files[0]); 
  //   }
  // }


  // $("#file-input").change(function() {
  //   readURL(this);
  // });
  
  var currentTab = 0;
  // $.ajax({
  //     url: "{{url('guestState')}}",
  //     type:"GET",
  //     success: function(result){
  //       currentTab = parseInt(result);
  //       console.log(currentTab);
  //     }
  // })

  function nextPrev(n){
    currentTab = currentTab + n;
    // console.log(currentTab);

    if (currentTab == 0) {
      $("#prevBtn").css("display","none");
      $(".img-p").css("display","block")
      $(".div-p").css("display","block")
      $(".text-p").html("Sinergy Freelance is a mobile app that can be used to freelancer for searching the job, do the job, and get payment. But first, you have to join partner to become a Sinergy Freelancer.")
      $("#nextBtn").html("Show Me")
      $("#input-pName").css("display","none")
      $("#input-pAddress").css("display","none")
      $("#input-pPhone").css("display","none")
      $("#input-pEmail").css("display","none")
      $("#hasJoined").css("display","block")
    }
    else if (currentTab == 1) {
      $("#prevBtn").css("display","block");
      // $("#input-p").attr("class","center-in input-pName")
      $("#input-pName").val(localStorage.getItem("names"));
      $(".text-p").html("<h3 class='center-in' style=''> 1. So, What should we call you? </h3>")
      $(".img-p").css("display","none")
      $(".div-p").css("display","none")
      $("#prevBtn").css("display","block");
      $("#input-pName").css("display","block")
      $("#input-pAddress").css("display","none")
      $("#input-pPhone").css("display","none")
      $("#input-pEmail").css("display","none")
      $("#hasJoined").css("display","none")
      $("#nextBtn").html("Next")
      document.getElementById("input-pName").placeholder = "Type name here..";
      if ($("#input-pName").val().length > 0) {
        $("#nextBtn").prop("disabled",false)
      }else{
        $("#nextBtn").prop("disabled",true)
      }
      
      $("#input-pName").keyup(function(){
        var textLength = $(this).val();
        if (textLength.length > 0) {
          $("#nextBtn").prop("disabled",false)
        }else{
          $("#nextBtn").prop("disabled",true)
        }
      });
    } else if (currentTab == 2) {
      localStorage.setItem("names", $("#input-pName").val())
      // $("#input-p").attr("class","center-in input-pEmail")
      $("#prevBtn").css("display","block");
      $("#input-pEmail").val(localStorage.getItem("email"));
      $(".text-p").html("<h3 class='center-in' style=''> 2. Nice, Now what's your Email? </h3>")
      $(".img-p").css("display","none")
      $(".div-p").css("display","none")
      $("#nextBtn").html("Next")
      $("#input-pEmail").css("display","block")
      $("#input-pName").css("display","none")
      $("#input-pPhone").css("display","none")
      $("#input-pAddress").css("display","none")
      $("#hasJoined").css("display","none")
      if ($("#input-pEmail").val().length > 0) {
        $("#nextBtn").prop("disabled",false)
      }else{
        $("#nextBtn").prop("disabled",true)
      }
      $("#input-pEmail").keyup(function(){
        var textLength = $(this).val();
        if (textLength.length > 0) {
          $("#nextBtn").prop("disabled",false)
        }else{
          $("#nextBtn").prop("disabled",true)
        }
      });
      document.getElementById("input-pEmail").placeholder = "Type your email here..";
    } else if(currentTab == 3){
      localStorage.setItem("email", $("#input-pEmail").val())
      $("#input-pPhone").val(localStorage.getItem("phone"));
      $(".text-p").html("<h3 class='center-in' style=''> 3. And, your phone number please </h3>")
      $(".img-p").css("display","none")
      $(".div-p").css("display","none")
      $("#prevBtn").css("display","block");
      $("#nextBtn").html("Next")
      $("#input-pPhone").css("display","block")
      $("#input-pEmail").css("display","none")
      $("#input-pName").css("display","none")
      $("#input-pAddress").css("display","none")
      $("#hasJoined").css("display","none")
      if ($("#input-pPhone").val().length > 0) {
        $("#nextBtn").prop("disabled",false)
      }else{
        $("#nextBtn").prop("disabled",true)
      }
      $("#input-pPhone").keyup(function(){
        var textLength = $(this).val();
        if (textLength.length > 0) {
          $("#nextBtn").prop("disabled",false)
        }else{
          $("#nextBtn").prop("disabled",true)
        }
      });
      document.getElementById("input-pPhone").placeholder = "Type your phone number here..";
    } else if (currentTab == 4) {
      localStorage.setItem("phone", $("#input-pPhone").val())
      $("#input-pAddress").val(localStorage.getItem("address"));
      $(".text-p").html("<h3 class='center-in' style=''> 4. Great,finally can you tell us where do you live? </h3>")
      $(".img-p").css("display","none")
      $(".div-p").css("display","none")
      $("#prevBtn").css("display","block");
      $("#nextBtn").html("Submit")
      $("#input-pAddress").css("display","block")
      $("#input-pPhone").css("display","none")
      $("#input-pEmail").css("display","none")
      $("#input-pName").css("display","none")
      $("#hasJoined").css("display","none")
      if ($("#input-pAddress").val().length > 0) {
        $("#nextBtn").prop("disabled",false)
      }else{
        $("#nextBtn").prop("disabled",true)
      }
      $("#input-pAddress").keyup(function(){
        var textLength = $(this).val();
        if (textLength.length > 0) {
          $("#nextBtn").prop("disabled",false)
        }else{
          $("#nextBtn").prop("disabled",true)
        }
      });

      document.getElementById("input-pAddress").placeholder = "Type your address here..";
    } else if (currentTab == 5) {
      localStorage.setItem("address", $("#input-pAddress").val())
      $(".text-p").html("<h2 class='center-in' style=''> Now you can relax, we'll be in touch soon! Thank You for joining partner with us. </h2>")
      $(".img-p").css("display","none")
      $(".div-p").css("display","none")
      $("#input-pAddress").css("display","none")
      $("#input-pPhone").css("display","none")
      $("#input-pEmail").css("display","none")
      $("#input-pName").css("display","none")
      $("#hasJoined").css("display","none")
      $("#prevBtn").css("display","none")
      $("#nextBtn").css("display","none")
      $("#hasJoined").css("display","none")
      // localStorage.clear();
      console.log($("#input-pAddress").val())
      console.log($("#input-pPhone").val())
      console.log($("#input-pEmail").val())
      console.log($("#input-pName").val())
      $.ajax({
        type:method,
        // url:
        success:function(){
        }
      })
      localStorage.clear();
    } 
  }

  function nextPrevAdvanced(n){
    currentTab = currentTab + n;
    console.log(currentTab)

    if (currentTab == 1) {
      $(".text-p").html("<h2 class='center-in' style=''>1.Ok, Last can you tell us you lastest education?</h2>")
      $("#input-pEducation").val(localStorage.getItem("education"));
      $("#tabA").css("display","none")
      $("#tabB").css("display","none")
      $("#tabC").css("display","none")
      $("#input-pEducation").css("display","block")
      $("#input-pjobCategory").css("display","none")
      $("#input-pLocation").css("display","none")
      $("#prevBtnAdvanced").css("display","block")
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
      
      document.getElementById("input-pEducation").placeholder = "Type your lastest Education here..";
    }else if (currentTab == 2) {
      initialJobCategory();
      function initialJobCategory(){
        $.ajax({
          type:"GET",
          url:"{{env('API_LINK_CUSTOM')}}/dashboard/getJobCategory",
          success:function(result){
            $("#jobCategoryList").empty("")
            $.each(result.job_category, function( index, value ) {
              var append = "";
              append = append + '<div class="img__wrap radio" data-value="'+ value.id +'">'
              append = append + '<img class="img__img" src="'+ value.category_image_url +'"/>'
              append = append + '<div class="img__description_layer">'
              append = append + '<p class="img__description">'+ value.category_name +'</p>'
              append = append + '</div>'
              append = append + '</div>'

              $("#jobCategoryList").append(append)
            })

          }
        })

        if (localStorage.getItem('category') !== null) {
          $(".radio[data-value='"+localStorage.getItem("category")+"']").attr("data-value",localStorage.getItem("category")).addClass('active')
          $("#nextBtnAdvanced").prop("disabled",false)
        }else{
          $("#nextBtnAdvanced").prop("disabled",true)
        }
      }

      $(".radio-group").on("click",".radio",function(){
          $(this).parent().find('.radio').removeClass('active');
          $(this).addClass('active');
          var val = $(this).attr('data-value');
          localStorage.setItem("category", $(this).attr('data-value'));

          console.log(localStorage.getItem('category'))         
      })
          
      localStorage.setItem("education", $("#input-pEducation").val())
      $(".text-p").html("<h2 class='center-in' style=''>2.Now, select your job category?</h2>")
      $("#tabA").css("display","none")
      $("#tabB").css("display","none")
      $("#tabC").css("display","none")
      $("#nextBtnAdvanced").html("Next")
      $("#prevBtnAdvanced").css("display","block")
      $("#input-pEducation").css("display","none")
      $("#input-pjobCategory").css("display","block")
      $("#input-pLocation").css("display","none")
      $("#hasJoined").css("display","none")
      $("#input-pFiles").css("display","none");
      document.getElementById("input-pEducation").placeholder = "Type your lastest Education here..";
    }else if (currentTab == 3) {
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
          url: "{{env('API_LINK_CUSTOM')}}/job/createJob/getParameterLocationAll",
          dataType: 'json',
        }
      });

      $("#inputJobRegion").on('select2:select', function (e) {
        if ($("#inputJobLocation").val() !== "") {
          $("#nextBtnAdvanced").prop("disabled",false)
        }else{
          $("#nextBtnAdvanced").prop("disabled",true)
        }
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

      $(".text-p").html("<h2 class='center-in' style=''>3.Now, please choose your current Area Coverage?</h2>")
      $("#tabA").css("display","none")
      $("#tabB").css("display","none")
      $("#tabC").css("display","none")
      $("#nextBtnAdvanced").html("Next")
      $("#prevBtnAdvanced").css("display","block")
      $("#input-pEducation").css("display","none")
      $("#input-pjobCategory").css("display","none")
      $("#input-pLocation").css("display","block")
      $("#input-pFiles").css("display","none");
      $("#hasJoined").css("display","none")
      $("#nextBtnAdvanced").prop("disabled",true)
      
      document.getElementById("input-pEducation").placeholder = "Type your lastest Education here..";
      $("#nextBtnAdvanced").attr("onclick","nextPrevAdvanced(1)");
    }else if (currentTab == 4) {
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
          var match = ['application/pdf', 'application/msword', 'application/vnd.ms-office', 'image/jpeg', 'image/png', 'image/jpg'];
          if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) || (fileType == match[3]) || (fileType == match[4]) || (fileType == match[5]))){
              alert('Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.');
              $("#file").val('');
              return false;
          }
          var fd = new FormData();
          fd.append('invoice',file);
          console.log(fileName)
      });

      if ($("#file-input").val() !== "") {
        $("#nextBtnAdvanced").prop("disabled",false)
      }else{
        $("#nextBtnAdvanced").prop("disabled",true)
      }
      
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
    // console.log($("#input-pFiles").val())
    console.log($("#input-pEducation").val())
    console.log(localStorage.getItem("category"));
    console.log($("#inputJobLocation").val())
    var fd = new FormData();
    var files = $('#file-input')[0].files[0];
    fd.append('file',files);
    // var file_data = $('#file-input').prop('files')[0];   
    // var form_data = new FormData();                  
    // form_data.append('file', file_data);
    console.log(fd);
    $.ajax({
      type:"POST",
      url:"{{env('API_LINK_CUSTOM')}}/job/postPayedByModeratorInvoice",
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

  function hasJoined(){
    $("#tabA").css("display","none")
    $("#tabB").css("display","none")
    $("#tabC").css("display","block")
  }

  function kodeUnik(){
    $("#tabA").css("display","block")
    $("#tabB").css("display","block")
    $("#tabC").css("display","none")
  }    
</script>
@endsection
