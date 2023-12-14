@extends('layouts.admin')

@section('header')
@push('css')
<link href="{{URL::to('css/style.css') }}" rel="stylesheet">
@endpush
@endsection

@section('content')
  <!-- ======= Breadcrumbs ======= -->


<section id="training" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
    <h2>Formations détail<br></h2>

    {{-- <a href="#" class="btn-get-started">Get Started</a> --}}
    </div>

</section>
<div class="breadcrumbs">
    <div class="container">
        {{-- {{dd($formationpartie)}} --}}
      <h2>{{$formationpartie->formation->titre}}</h2>
      <p>{{$formationpartie->description}} </p>
    </div>
  </div><section id="course-details" class="course-details">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-8">

            <iframe src="{{asset('Video/'.$formationpartie->video) }}" height="400" width="600"   title="Iframe Example"></iframe>
          <h3>{{$formationpartie->formation->titre}}</h3>
          <p>
            {{$formationpartie->description}}
          </p>
        </div>
        <div class="col-lg-4">

          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Nombre d'heure</h5>
            <p><a href="#"> 50 h</a></p>
          </div>

          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Prix</h5>
            <p>{{$formationpartie->formation->prix}}</p>
          </div>

          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Contenu du formation</h5>
            <p>19 sections • 66 sessions • Durée totale: 4 h 39 min</p>
          </div>

          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Fichier</h5>
            <p><a href="{{ route('admin.formationdownload',$formationpartie->fichier) }}"  style="color: teal; text-decoration:none; height:3rem; width:3rem;"><i  class="fa fa-file fa-2x "></a></i></p>
          </div>

        </div>
      </div>

    </div>


  </section><!-- End Cource Details Section -->
    <!-- ======= Cource Details Tabs Section ======= -->
    <section id="cource-details-tabs" class="cource-details-tabs">
        <div class="container" data-aos="fade-up">

          <div class="row">
            <div class="col-lg-3">
              <ul class="nav nav-tabs flex-column">
                <li class="nav-item">
                  <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Cette formation comprend :</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Contenu du formation</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Prérequis</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Description</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Fichier</a>
                </li>
              </ul>
            </div>
            <div class="col-lg-9 mt-4 mt-lg-0">
              <div class="tab-content">
                <div class="tab-pane active show" id="tab-1">
                  <div class="row">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      <h3>Cette formation comprend :</h3>
                      <p class="fst-italic"> Vidéo à la demande de 4,5 heures</p>
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                        <img src="{{asset('public/'.$formationpartie->formation->image) }} "class="img-fluid">

                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab-2">
                  <div class="row">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      <h3>Contenu du formation</h3>
                      <p class="fst-italic">19 sections • 66 sessions • Durée totale: 4 h 39 min</p>
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab-3">
                  <div class="row">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      <h3>Prérequis</h3>
                      <p class="fst-italic">Savoir créer des variables, des boucles, des structures conditionnelles.</p>
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab-4">
                  <div class="row">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      <h3>Description</h3>
                      <p class="fst-italic"> {{$formationpartie->description}}</p>
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab-5">
                  <div class="row">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      <h3> Fichier</h3>
                      <p><a href="{{ route('admin.formationdownload',$formationpartie->fichier) }}"  style="color: teal; text-decoration:none; height:3rem; width:3rem;"><i class="fa fa-file fa-2x "></i></a></p>                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </section><!-- End Cource Details Tabs Section -->



</main>
@endsection
