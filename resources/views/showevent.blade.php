@extends('layouts.admin')

@section('header')
@push('css')
<link href="{{URL::to('css/style.css') }}" rel="stylesheet">

@endpush
@endsection

@section('content')
<section id="event" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
    <h2>Evénement détail</h2>
    {{-- <h2>Vous trouverez les détails du formation.</h2> --}}
    {{-- <a href="#" class="btn-get-started">Get Started</a> --}}
    </div>
</section>
<main id="main">


    <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="course-details">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-8">
            <img src="{{asset('public/'.$events->image) }}" class="img-fluid" style="height:350px;
            width:450px;" alt="">
            <h3>{{$events->titre}}</h3>
            <p>{{$events->enonce}}</p>
          </div>
          <div class="col-lg-4">

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5> <strong>  Type  </strong></h5>
              <p>{{$events->type}}</p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5> <strong> Date début  </strong></h5>
              <p>{{$events->datedebut}}</p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5> <strong> Date fin </strong></h5>
              <p>{{$events->datefin}}</p>
            </div>
            <div class="course-info d-flex justify-content-between align-items-center">
              <h5><strong> Inscription </strong> </h5>
            {{-- <p><a href="{{route('admin.evenements.inscription',$events->id)}}">inscription</a></p> --}}
            @if($events->avecinscription =='1' & $events->etat=='1')
            <button type="button" class="get-started-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                cliquez ici
              </button>
              @else
              <p>L'inscription est fermée</p>
              @endif
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
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Programme</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">limite</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Comité</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Etat</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-5">programme</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-6">Fichier</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Programme</h3>
                    <p class="fst-italic">{{$events->programme}}</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/course-details-tab-1.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Limite</h3>
                    <p class="fst-italic">{{$events->limite}}</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/course-details-tab-2.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Comité</h3>
                    <p class="fst-italic">{{$events->comite}}</p>

     </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/course-details-tab-3.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row">

                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Etat</h3>
                    @if($events->etat =='1')
                    <p class="fst-italic">Ouvert</p>
                    @else
                    <p class="fst-italic" >Fermé</p>
                    @endif
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/course-details-tab-4.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-5">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Programme</h3>
                    <p class="fst-italic">{{$events->programme}}</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/course-details-tab-5.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-6">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>fichier</h3>
                   <a href="{{ route('admin.Download',$events->fichier) }}" style="color: gray; text-decoration:none; height:3rem; width:3rem;"><i  class="fa fa-file fa-3x"></i></a></p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/course-details-tab-5.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>

    </section><!-- End Cource Details Tabs Section -->

  </main>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Insciption</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form  action="{{ route('admin.evenements.inscriptionstore') }}" method="POST"  enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <label class="control-label"> Voulez vous s'incrire  </label>
                    <select class="form-control"  name="evenement_id" autocomplete="type">
                        <option value="{{ $events->id }}">{{ $events->titre }}</option>
                </select>
                </div>
                    <div class="row" style="display: none;">
                        <input class="form-check-input" type="text" name="user_id" value="{{ Auth::user()?->id ? Auth::user()->id : '' }}" >
                    </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="get-started-btn-2" data-bs-dismiss="modal">Retour</button>
          {{-- <a href="{{ route('admin.evenements.index') }}" class="btn btn-danger">retour</a> --}}

          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
          <button type="submit" class="get-started-btn ">Enregistrer</button>
        </div>
    </form>

      </div>
    </div>
  </div>

@endsection

