<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" href="/assets/stylee.css">
      <link rel="icon" href="/assets/img/siteicon.png">
      <script src="https://kit.fontawesome.com/ea43235a44.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
   </head>
   <title>Proticketing - Login</title>
   <body>
      <div class="sides">
         <div class="left">
            <div class="card_1 l-form">
            <form method="POST" action="{{ route('login') }}">
            @csrf
            <h1 class="form__title">Sign In</h1>
               <div class="form__div">
                  <input type="email"id="user" placeholder=" " class="form__input" name="email" value="{{ old('email') }}" required="email" autocomplete="email" autofocus>
                  <label for="" class="form__label">Email</label>
                   @error('email')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                  @enderror
               </div>
               <div class="form__div">
                  <input type="password" id="user" placeholder=" "class="form__input @error('password') is-invalid @enderror"  name="password" required="password" autocomplete="current-password " data-type="password" >
                  <label for="" class="form__label">Password</label>
               </div>

               <input type="submit" class="form__button" value="Login">
               <nav class="cl-effect-4" style="margin-top:-20px ; margin-left: 20px;">
                  @if (Route::has('password.request'))
                     <a href="{{ route('password.request') }}">Forgot Password?</a>
                  @endif
               </nav>
            </form>
         </div>
         </div>

         <div class="right">
            <div class="login-bg"> 
               <img class="" src="./assets/img/login-bg.svg" alt="bg-image">
            </div>
         </div>

      </div>
         
         
   </body>
</html>