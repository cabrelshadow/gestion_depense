@extends('layouts.app')
@section('title')

   @section('content')
<style>
.divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
</style>
<div class="container-fluid">
    <h1 class="text-center p-3">s'inscrire</h1>
</div>
<section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="images/login2.png"
            class="img-fluid" alt="Phone image">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
            <div id="show_success"></div>
          <form method="POST" id="register_form" action="#">
              @csrf
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="text" id="name" class="form-control form-control-lg" name="name"/>
                <label class="form-label" for="form1Example13">nom </label>
                <div class="invalid-feedback"></div>
              </div>
            <div class="form-outline mb-4">
              <input type="email" id="email" class="form-control form-control-lg" name="email"/>
              <label class="form-label" for="form1Example13">Email address</label>
              <div class="invalid-feedback"></div>
            </div>
  
            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" id="password" class="form-control form-control-lg" name="password"/>
              <label class="form-label" for=""> Password</label>
              <div class="invalid-feedback"></div>
            </div>
            <div class="form-outline mb-4">
                <input type="password" id="cpassword" class="form-control form-control-lg" name="cpassword"/>
                <label class="form-label" for=""> Confirm Password</label>
                <div class="invalid-feedback"></div>
              </div>
  
            <div class="d-flex justify-content-around align-items-center mb-4">
              <!-- Checkbox -->
              <button type="submit" class="btn btn-primary btn-lg btn-block" id="register_btn">Enregistrer</button>
        
            </div>
  
            <!-- Submit button -->
         
  
            <div class="divider d-flex align-items-center my-4">
              <div class="text-dark"> vous avez  deja un  compte?  <a href="/" class="text-decoration-none">se connecter</a></div>
            </div>
  
  
          </form>
        </div>
      </div>
    </div>
  </section>
       
   @endsection  
@endsection
<script src="{{asset('js/function.js')}}">	</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(function(){
            $("#register_form").submit(function(e){
            e.preventDefault();
            $("#register_btn").val('please waite');
            $.ajax({
              url: '{{ route('auth.register') }}',
              method:'POST',
              data: $(this).serialize(),
             dataType: 'json',
              success: function(res){
              if(res.status ==400){
                  showError('name',res.messages.name);
                  showError('email',res.messages.email);
                  showError('password',res.messages.password);
                  showError('cpassword',res.messages.cpassword);
                  $("#register_btn").val('inscription');
              }else if(res.status==200){
                  $("#show_success").html(showMassage('success',res.messages));
                  $('#register_form')[0].reset();
                  removeValidationClasses("#register_form");
                 
                  $("#register_btn").val('inscription');
              }
              }
            });
              

            });
        });
    </script>
