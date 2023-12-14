@extends('layouts.admin')

@section('header')
@push('css')
<link href="{{URL::to('css/style.css') }}" rel="stylesheet">

@endpush
@endsection

@section('content')
<section id="annonce" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
    <h2>Annonce détail<br></h2>
    {{-- <h2>C'est une application web formant un réseau pour les développeurs .</h2> --}}
    {{-- <a href="#" class="btn-get-started">Get Started</a> --}}
    </div>
</section>
<main id="main">


    <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="course-details">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-8">
            <img src="{{asset('public/'.$annonce->image) }}" class="img-fluid" style="height:300px;
            width:350px;" alt="">
            <h3>{{$annonce->annonce}}</h3>
            <div class="course-info d-flex justify-content-between align-items-left">
                <h5> <b>Specification : </b>{{$annonce->specification}}</h5>
            </div>
            <div class="course-info d-flex justify-content-between align-items-left">
                <h5> <b>Type : </b>{{$annonce->TypeAnnonce->first()->nom}}</h5>
                <p><a href="{{ route('admin.download',$annonce->fichier) }}"  style="color: teal; text-decoration:none; height:3rem; width:3rem;"><i  class="fa fa-file fa-2x"></i></a></p>
              </p>
              </div>


          </div>
          <div class="col-lg-4">

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5><strong> Titre </strong></h5>
              <p>{{$annonce->titre}}</p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5><strong> Date  </strong></h5>
              <p>{{$annonce->created_at}}</p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5> <strong>  Public </strong></h5>
              @if ($annonce->public=='1')
              <p>oui</p>
                @else
              <p>non</p>

              @endif
            </div>
            @if ($annonce->public=='1')
            <div class="course-info d-flex justify-content-between align-items-center">
              <h5> <strong> Inscription  </strong></h5>
            {{-- <p><a href="{{route('admin.evenements.inscription',$annonce->id)}}">inscription</a></p> --}}
            <button type="button" class="get-started-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Postuler
              </button>
            </div>
            @endif
<!-- Button trigger modal -->

          </div>
        </div>

      </div>
    </section><!-- End Cource Details Section -->

    <!-- ======= Cource Details Tabs Section ======= -->
    {{-- <section id="cource-details-tabs" class="cource-details-tabs">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">programme</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">limite</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Pariatur explicabo vel</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Nostrum qui quasi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Iusto ut expedita aut</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>programme</h3>
                    <p class="fst-italic">{{$annonce->programme}}</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/course-details-tab-1.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>limite</h3>
                    <p class="fst-italic">{{$annonce->limite}}</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/course-details-tab-2.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Impedit facilis occaecati odio neque aperiam sit</h3>
                    <p class="fst-italic">Eos voluptatibus quo. Odio similique illum id quidem non enim fuga. Qui natus non sunt dicta dolor et. In asperiores velit quaerat perferendis aut</p>
                    <p>Iure officiis odit rerum. Harum sequi eum illum corrupti culpa veritatis quisquam. Neque necessitatibus illo rerum eum ut. Commodi ipsam minima molestiae sed laboriosam a iste odio. Earum odit nesciunt fugiat sit ullam. Soluta et harum voluptatem optio quae</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/course-details-tab-3.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Fuga dolores inventore laboriosam ut est accusamus laboriosam dolore</h3>
                    <p class="fst-italic">Totam aperiam accusamus. Repellat consequuntur iure voluptas iure porro quis delectus</p>
                    <p>Eaque consequuntur consequuntur libero expedita in voluptas. Nostrum ipsam necessitatibus aliquam fugiat debitis quis velit. Eum ex maxime error in consequatur corporis atque. Eligendi asperiores sed qui veritatis aperiam quia a laborum inventore</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/course-details-tab-4.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-5">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Est eveniet ipsam sindera pad rone matrelat sando reda</h3>
                    <p class="fst-italic">Omnis blanditiis saepe eos autem qui sunt debitis porro quia.</p>
                    <p>Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae ut non quam ut quod eius qui. Ipsum quia odit vero atque qui quibusdam amet. Occaecati sed est sint aut vitae molestiae voluptate vel</p>
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

    </section><!-- End Cource Details Tabs Section --> --}}

  </main>
<!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Postulation</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form  action="{{ route('admin.postulations.store') }}" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Postulations</label>
                            <input type="text" class="form-control" name="postulations">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                            <label class="control-label">Fichier</label>
                            <input type="file" name="fichier">
                    </div>
                </div>



                <div class="row" style="display: none;">
                    <input class="form-check-input" type="text" name="user_id" value="{{ Auth::user()?->id ? Auth::user()->id : '' }}" >
                </div>

                <div class="row" style="display: none;">
                    <div class="col-md-12">
                            <label class="control-label">Annonce</label>
                            <input type="text" name="annonce_id" value="{{ $annonce->id }}">
                    </div>
                </div>
                    {{-- <div class="row">
                        <label class="control-label"> annonce </label>
                        <select class="form-control"  name="annonce_id" autocomplete="type">
                            <option value="{{ $annonce->id }}">{{ $annonce->annonce }}</option>
                    </select>
                    </div> --}}


        </div>
        <div class="modal-footer">
            <a class="btn btn-light">Retour</a>
            <button type="submit" class="get-started-btn">Envoyé</button>
        </form>
        </div>
      </div>
    </div>
  </div>
@endsection
