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
    <h1 class="text-center p-5" >Mot de Passe Oublier</h1>
</div>
<section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="images/login1.png"
            class="img-fluid" alt="Phone image">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <form method="POST" id="forgot_form">
              @csrf
            <!-- Email input -->
             <div class="mb-3 text-secondary">
               entrez votre adress email et on va vous envoyer lien de renitialisation
             </div>
            <div class="form-outline mb-4">
              <input type="email" id="email" class="form-control form-control-lg" name="email"/>
              <label class="form-label" for="form1Example13">Email address</label>
              <div class="invalid-feedback"></div>
            </div>
  
            <!-- Password input -->
      
            <div class="d-flex justify-content-around align-items-center mb-4">
              <!-- Checkbox -->
              <button type="submit" class="btn btn-primary btn-lg btn-block" id="forgot_btn">renitialiser maintenent</button>

            </div>
            <div class="divider d-flex align-items-center my-4">
              <div class="text-dark">retour a la page de connexion<a href="/" class="text-decoration-none">se connecter</a></div>
            </div>
  
            <!-- Submit button -->
         
  
          
  
          </form>
        </div>
      </div>
    </div>
  </section>
       
   @endsection  
@endsection
@section('script')
    
@endsection