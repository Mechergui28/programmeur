@extends('layouts.admin')

@section('header')
@push('css')
<link href="{{URL::to('css/style.css') }}" rel="stylesheet">

@endpush
@endsection

@section('content')
<section id="annonce" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
    <h2> Annonce disponble<br></h2>
    {{-- <a href="#" class="btn-get-started">Get Started</a> --}}
    </div>
</section>

<main id="main" data-aos="fade-in">


    <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            @foreach ($annonces as $annonce)

            <div class="member">
              <a href="{{url('showannonce/'.$annonce->id)}}"> <img src="{{asset('public/'.$annonce->image)}}" class="img-fluid" alt=""></a>
              <div class="member-content">
                <h4>{{$annonce->annonce}}</h4>
                <span>{{$annonce->titre}}</span>
                <p>
                    {{$annonce->specification}}
                </p>

              </div>
            </div>
            @endforeach

          </div>

          {!! $annonces->links() !!}




        </div>

      </div>
    </section><!-- End Trainers Section -->

  </main>
@endsection
