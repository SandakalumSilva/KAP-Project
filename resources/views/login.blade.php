@extends('app.layout')

@section('title')
Login
@endsection

@section('content')

<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body{
        background: #2196f3
    }
    .row{
        background: white;
        border-radius:30px;
        box-shadow: 12px 12px 22px rgb(24, 24, 24);
    }
    img{
        border-top-left-radius: 30px;
        border-bottom-left-radius: 30px;
    }
    .btn1{
         border: none;
         outline: none;
         height:50px;
         width:100%;
         background-color: black;
         color:white;
         border-radius: 4px;
         font-weight: bold;
    }
    .btn1:hover
    {
        background: white;
        border: 1px solid;
        color:black;
    }

</style>

<section class="Form my-4 mx-5">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-5">
                <img src="/assets/glass_bottle_aquarium_plants_2.jpg" alt="" class="img-fluid">
            </div>
            <div class="col-lg-7 px-5 pt-5">
                <h1 class="font-weight-bold py-3" >LK AQUA PLANTS</h1>
                <h4>Sign into your account</h4>
                <form  id="loginForm">
                    @csrf
                    <div class="form-row">
                        <div class="col-lg-7">
                            <input type="email" name="email" placeholder="Email Address" class="form-control my-3 p-4">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-7">
                            <input type="password" name="password" placeholder="password" class="form-control my-3 p-4">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-7">
                            <button type="submit" name="loginSubmit" class="btn1 mt-3 mb-5">Login</button>
                        </div>
                    </div>
                    <a href="#">Forgot Password</a>
                    <p>Don't have an account? <a href="#" data-toggle="modal" data-target="#exampleModalLong">Register Here</a> </p>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Terms and Conditions</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam ratione, 
         ducimus omnis repellendus provident fuga illum nihil ipsam molestias molestiae, 
         sint libero eos iste eum ut? Porro laborum placeat labore!
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="/register" class="btn btn-primary">Register</a> 
        </div>
      </div>
    </div>
  </div>

  <div id="success_msg" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <ul id="error_msg"></ul>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
  </div>

  <script>

$('#loginForm').on('submit', function (e) {
    e.preventDefault();
    
    $.ajax({
    type: "POST",
    url: "/user-login",
    data: new FormData(this),
    dataType: "json",
    processData: false,
    contentType: false,
    cache: false,
    success: function (response) {
        if(response.status==200){
            window.location = '/sellerdashboard';
      }else{
        $.each(response.validate, function (key, err_values) { 
            $('#error_msg').append('<li class="alert alert-danger">'+err_values+'</li>');
        });
        $('#success_msg').modal('show');
      }
    }
});
});


  </script>

@endsection