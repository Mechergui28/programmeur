@extends('layouts.admine')

@section('header')

@endsection
@section('content')
@push('css')
<link href="{{URL::to('css/style.css') }}" rel="stylesheet">

@endpush
<section>
    <header>
        <a href ="#" class="logo"><img src="images/logo.png">
        </a>
       <ul>
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a href="admin.html">About</a>
            </li>
            <li>
                <a href="{{route ('admin.index')}}">Admin</a>

            </li>
            <li>
                <a href="{{ route('login') }}">Se connecter</a>
            </li>

        </ul>
    </header>
    <div class="content">
        <div class="textBox">
        <h2>Bienvenue sur notre réseau de <span>développeurs</span> </h2>
        <p> C'est une application web formant un réseau pour les développeurs contenant un espace forum permettant ces développeurs à discuter entre eux différents sujets.
            Ainsi que des annonces de recrutement  ou création d'une application .Donc des projets qu'ils intéressent seront publiés.
            </p>
            <a href="#">learn more</a>
        </div>

    <div class="imgBox">
        <img src="images/dev.png" class="image">
    </div>
</div>
<ul class="thumb">
    <li><img src="images/formation.png"></li>
    <li><img src="images/chats.png"></li>
    <li><img src="images/forum.png"></li>
</ul>
</section>

<div class="containerC">
  <div class="card">
    <div class="box">
      <div class="content">
        <h2>Forum</h2>
        <p>Un espace forum permettant ces développeurs à discuter entre eux différents sujets.
        </p>
          <a href="{{route('forum.index')}}">voir</a>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="box">
      <div class="content">
        <h2>Formation</h2>
        <p>Cette Partie offre l'opportunité de s'inscrire à des formations</p>
            <a href="#">read more</a>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="box">
      <div class="content">
        <h2>Annonce</h2>
        <p> Des annonces de recrutement  ou création d'une application </p>
           <a href="#">read more</a>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="box">
      <div class="content">
        <h2>Chats</h2>
        <p>Cette partie offre l'opportunité de s'inscrire à des formations  </p>
           <a href="#">read more</a>

      </div>
    </div>
  </div>
  <div class="card">
    <div class="box">
      <div class="content">
        <h2>Evenement</h2>
        <p>Cette partieoffre l'opportunité de s'inscrire à desdifférentes événements </p>
           <a href="#">read more</a>
      </div>
    </div>
  </div>
</div>



  @endsection
