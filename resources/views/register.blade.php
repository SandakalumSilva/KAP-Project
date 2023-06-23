@extends('app.layout')

@section('title')
Register
@endsection

@section('content')

<style>
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

    .formOverflow{
      max-height: 700px;
      overflow-y: scroll;
    }


    

</style>

<section class="vh-100  " style="background-color: #2196f3;">
    <div class="container h-100 ">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-9">
  
          <h1 class="font-weight-bold mb-4">Register as a Seller</h1>
  
          <div class="card " style="border-radius: 15px;">
            <div class="card-body formOverflow">
              <form id="formRegistration" >
                @csrf
               
              <div class="row align-items-center pt-4 pb-3">
                <div class="col-md-3 ps-5">
  
                  <h6 class="mb-0">Owner name</h6>
  
                </div>
                <div class="col-md-9 pe-5">
  
                  <input type="text" name="ownerName" class="form-control form-control-lg" />
  
                </div>
              </div>

              <hr class="mx-n3">
  
              <div class="row align-items-center py-3">
                <div class="col-md-3 ps-5">
  
                  <h6 class="mb-0">Shop name</h6>
  
                </div>
                <div class="col-md-9 pe-5">
  
                  <input type="text" name="shopName" class="form-control form-control-lg" placeholder="LK Aqua Plants" />
  
                </div>
              </div>
  
              <hr class="mx-n3">
  
              <div class="row align-items-center py-3">
                <div class="col-md-3 ps-5">
  
                  <h6 class="mb-0">Email address</h6>
  
                </div>
                <div class="col-md-9 pe-5">
  
                  <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="example@example.com" />
  
                </div>
              </div>

              <hr class="mx-n3">
  
              <div class="row align-items-center py-3">
                <div class="col-md-3 ps-5">
  
                  <h6 class="mb-0">Password</h6>
  
                </div>
                <div class="col-md-9 pe-5">
  
                  <input type="password" name="password" class="form-control form-control-lg" placeholder="*******" />
  
                </div>
              </div>

              <hr class="mx-n3">
  
              <div class="row align-items-center py-3">
                <div class="col-md-3 ps-5">
  
                  <h6 class="mb-0">Password Confirm</h6>
  
                </div>
                <div class="col-md-9 pe-5">
  
                  <input type="password" name="password_confirmation" class="form-control form-control-lg" placeholder="*******" />
  
                </div>
              </div>

              <hr class="mx-n3">
  
              <div class="row align-items-center py-3">
                <div class="col-md-3 ps-5">
  
                  <h6 class="mb-0">Mobile Number</h6>
  
                </div>
                <div class="col-md-9 pe-5">
  
                  <input type="number" name="mobile" class="form-control form-control-lg" placeholder="+9471000000" />
  
                </div>
              </div>
  
              

              <hr class="mx-n3">
  
              <div class="row align-items-center py-3">
                <div class="col-md-3 ps-5">
  
                  <h6 class="mb-0">Shop Address</h6>
  
                </div>
                <div class="col-md-9 pe-5">
  
                  <textarea class="form-control" name="shopAddress" rows="3" placeholder="77/1, Colombo, Sri Lanka."></textarea>
  
                </div>
              </div>
  
              <hr class="mx-n3">
  
              <div class="row align-items-center py-3">
                <div class="col-md-3 ps-5">
  
                  <h6 class="mb-0">Logo</h6>
  
                </div>
                <div class="col-md-9 pe-5">
  
                  <input name="logo" class="form-control form-control-lg" id="formFileLg" type="file" />
                  
  
                </div>
              </div>

              <hr class="mx-n3">
  
              <div class="row align-items-center py-3">
                <div class="col-md-3 ps-5">
  
                  <h6 class="mb-0">Cover Image</h6>
  
                </div>
                <div class="col-md-9 pe-5">
  
                  <input name="coverImage" class="form-control form-control-lg" id="formFileLg" type="file" />
                  
  
                </div>
              </div>

              <hr class="mx-n3">
  
              <div class="row align-items-center py-3">
                <div class="col-md-3 ps-5">
  
                  <h6 class="mb-0">Payment Methods</h6>
  
                </div>
                <div class="col-md-9 pe-5">
  
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="payment[]" value="Cash On Delevery">
                    <label class="form-check-label" for="inlineCheckbox1">Cash On Delevery</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="payment[]" value="Bank Deposit">
                    <label class="form-check-label" for="inlineCheckbox2">Bank Deposit</label>
                  </div>    
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="payment[]" value="Helapay">
                    <label class="form-check-label" for="inlineCheckbox2">Helapay</label>
                  </div>   
                           
  
                </div>
              </div>

              <hr class="mx-n3">
  
              <div class="row align-items-center py-3">
                <div class="col-md-3 ps-5">
  
                  {{-- <h6 class="mb-0">Payment Methods</h6> --}}
  
                </div>
                <div class="col-md-9 pe-5">  
                   
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="conditions" value="option1">
                    <label class="form-check-label" for="inlineCheckbox1">Accept the <a href="#" data-toggle="modal" data-target="#exampleModalLong">Terms and Conditions</a> </label>
                  </div>             
  
                </div>
              </div>
              
  
              <hr class="mx-n3">
  
              <div class="form-row">
                <div class="col-lg-3"></div>

                <div class="col-lg-6">
                    <button type="submit" id="btncheck"  class="btn1 mt-3 mb-5">Register</button>
                </div>
              
            </div>
            </form>
  
            </div>
          </div>
  
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
      <div class="modal-body ">
       Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam ratione, 
       ducimus omnis repellendus provident fuga illum nihil ipsam molestias molestiae, 
       sint libero eos iste eum ut? Porro laborum placeat labore!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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


<div id="success_msg1" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h3>Registration Success!</h3>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>



</div>


<script>

$("#formRegistration").on('submit', function (e) {
  e.preventDefault();
  var email = $('#email').val();
  // alert(email);
  $.ajax({
    type: "POST",
    url: "/user-registration",
    data: new FormData(this),
    dataType: "json",
    processData: false,
    contentType: false,
    cache: false,
    success: function (response) {
      if(response.status==200){
        
        $('#success_msg1').modal('show');
        setTimeout(function(){ window.location = '/login'; }, 5000);
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