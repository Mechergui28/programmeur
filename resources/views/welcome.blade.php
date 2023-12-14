@extends('layouts.admin')
@section('content')

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center mt-3">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
    <h2>Bienvenue sur notre<br>réseau de développeurs</h2>
    {{-- <h2>C'est une application web formant un réseau pour les développeurs .</h2> --}}
    {{-- <a href="#" class="btn-get-started">Get Started</a> --}}
    </div>
</section>
    <!-- End Hero -->
  <main id="main">
""
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="{{ asset('css/img/index10.png') }}" class="img-fluid" alt="">

          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>L'objectif du projet est de créer un site Web en tant que réseau pour connecter .</h3>

            <ul>
              <li><i class="bi bi-check-circle"></i> Contenant un espace forum
                permettant ces développeurs à discuter entre deux différents sujets  .</li>
              <li><i class="bi bi-check-circle"></i> Des annonces de recrutement ou création d'une application.</li>
              <li><i class="bi bi-check-circle"></i> Offre l'opportunité de s'inscrire à des formations ou différents événement</li>
              <li><i class="bi bi-check-circle"></i> Offre l'opportunité de discuter en privé </li>

            </ul>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Popular Courses Section ======= -->
    <section id="counts" class="counts section-bg">
        <div class="container">

          <div class="row counters">

            <div class="col-lg-3 col-6 text-center">
              <span data-purecounter-start="0" data-purecounter-end="{{$event->count()}}" data-purecounter-duration="1" class="purecounter">{{$event->count()}}</span>
              <p>Evénements</p>
            </div>

            <div class="col-lg-3 col-6 text-center">
              <span data-purecounter-start="0" data-purecounter-end="{{$annonces->count()}}" data-purecounter-duration="1" class="purecounter">{{$annonces->count()}}</span>
              <p>Annonces</p>
            </div>

            <div class="col-lg-3 col-6 text-center">
              <span data-purecounter-start="0" data-purecounter-end="{{$formations->count()}}" data-purecounter-duration="1" class="purecounter">{{$formations->count()}}</span>
              <p>Formations</p>
            </div>



            <div class="col-lg-3 col-6 text-center">
              <span data-purecounter-start="0" data-purecounter-end="{{$user->count()}}" data-purecounter-duration="1" class="purecounter">{{$user->count()}}</span>
              <p>Utilisateurs</p>
            </div>

          </div>

        </div>
      </section>

    @include('evenement')

    @include('formation')
    @include('annonce')

  </main><!-- End #main -->
  @endsection
