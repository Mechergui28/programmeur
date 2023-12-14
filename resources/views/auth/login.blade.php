<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Se connecter</title>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" />

</head>
<body>
    <body>
        <div class="container">
         <div class="forms-container">
          <div class="signin-signup">
           <form action="{{route('login')}}" class="sign-in-form" method="POST">
            @csrf
            <h2 class="title">Se Connecter</h2>
            <div class="input-field">
             <i class="fas fa-user"></i>
             <input type="text" placeholder="Username" name="email" />
            </div>
            <div class="input-field">
             <i class="fas fa-lock"></i>
             <input type="password" placeholder="Password" name="password"/>
            </div>
            <input class="btn solid" type="submit" value="Connecter" />
            <p class="social-text">Se Conneter avec</p>
            <div class="social-media">
             <a href="{{route('login.facebook')}}" class="social-icon">
              <i class="fab fa-facebook-f"></i>
             </a>
             <a href="{{route('login.github')}}" class="social-icon">
              <i class="fab fa-github"></i>
             </a>
             <a href="{{route('login.google')}}" class="social-icon">
              <i class="fab fa-google"></i>
             </a>
            </div>
           </form>
           <form action="{{ route('register') }}" class="sign-up-form" method="POST">
            @csrf
            <h2 class="title">Créez un compte</h2>
            <div class="input-field">
             <i class="fas fa-user"></i>
             <input type="text" placeholder="Username" name="name" required autofocus>
            </div>
            <div class="input-field">
             <i class="fas fa-envelope"></i>
             <input type="email" placeholder="Email" name="email"/>
            </div>
            <div class="input-field">
             <i class="fas fa-lock"></i>
             <input type="password" placeholder="Password" name="password" />
            </div>
            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="confirme Password" name="password_confirmation" />
               </div>
               <input type="text"  name="avatar" value="{{Gravatar::get('programmeur@programmeur.com')}}" hidden/>
            <input type="submit" class="btn" value="Inscrire" />
            <p class="social-text">Se Conneter avec</p>
            <div class="social-media">
             <a href="{{route('login.facebook')}}" class="social-icon">
              <i class="fab fa-facebook-f"></i>
             </a>
             <a href="{{route('login.github')}}" class="social-icon">
              <i class="fab fa-github"></i>
             </a>
             <a href="{{route('login.google')}}" class="social-icon">
              <i class="fab fa-google"></i>
             </a>

            </div>
           </form>
          </div>
         </div>

         <div class="panels-container">
          <div class="panel left-panel">
           <div class="content">
            <h3>Vous n'avez pas de compte ?</h3>
            <p>
                Inscrivez-vous ici
            </p>
            <button class="btn transparent" id="sign-up-btn">Créer un compte</button>
           </div>
           <img src="{{ asset('css/img/auth.png') }}" class="image" alt="">
          </div>
          <div class="panel right-panel">
           <div class="content">
            <h3>vous avez déjà un compte </h3>
            <p>
             Cliquez ici
            </p>
            <button class="btn transparent" id="sign-in-btn">Se Connecter</button>
           </div>
           <img src="{{ asset('css/img/auth2.png') }}" class="image" alt="">

          </div>
         </div>
        </div>
    <script src="{{ asset('js/login.js') }}"></script>

       </body>
       </html>
