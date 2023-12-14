@extends('layouts.admin')

@section('header')
@push('css')
<link href="{{URL::to('css/style.css') }}" rel="stylesheet">

@endpush
@endsection

@section('content')
<section id="event" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
    <h2>Evénement disponible</h2>
    {{-- <h2>Les évenements disponible.</h2> --}}
    {{-- <a href="#" class="btn-get-started">Get Started</a> --}}
    </div>
</section>
<main id="main" data-aos="fade-in">



    <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            @foreach ($events as $event )

            <div class="course-item">
              <img src="{{asset('public/'.$event->image) }}" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4><a style="text-decoration: none; color:white;" href="{{url('showevent/'.$event->id)}}"  style="color: white;">{{$event->titre}}</a> </h4>
                  {{-- <p class="price">$169</p> --}}
                </div>

                <h3>
                    @if ($event->etat =='1')
                    <p>
                      Inscription  ouvert
                    </p>
                    @else
                    <p > Inscription fermé</p>
                    @endif
                </h3>
                <p>{{$event->enonce}}</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
                    <span>limite</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    {{$event->limite}}

                  </div>
                </div>
              </div>
            </div>
            @endforeach


          </div>
          <div class="course-info d-flex justify-content-between align-items-center" >

            <p class="pagination-a" style="height: 10rem;">{!! $events->links() !!}</p>
          </div>

        </div>

      </div>
    </section>

  </main>
@endsection

