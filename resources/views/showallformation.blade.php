@extends('layouts.admin')

@section('header')
@push('css')
<link href="{{URL::to('css/style.css') }}" rel="stylesheet">

@endpush
@endsection

@section('content')
<section id="training" class="d-flex justify-content-center align-items-center ">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
    <h2>Formations disponible<br></h2>
    {{-- <a href="#" class="btn-get-started">Get Started</a> --}}
    </div>
</section>
<main id="main">


    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container" data-aos="fade-up">

        <div class="row">
            @foreach ($formations as $formation)

          <div class="col-md-4 d-flex align-items-stretch">
            <div class="card">
              <div class="card-img">
               <a href="{{ url('showformation/'.$formation->id) }}"> <img src="{{ asset('public/'.$formation->image) }}"  alt="..."></a>
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="{{ url('showformation/'.$formation->id) }}">{{$formation->titre}}</a></h5>
                <h5 class="card-title">{{$formation->prix}}</h5>

                <p class="fst-italic text-center">{{$formation->created_at}}</p>
                <p class="card-text">{{$formation->description}}</p>
              </div>
            </div>
          </div>
          @endforeach

        </div>
        <div class="course-info d-flex justify-content-between align-items-center" >

            <p class="pagination-a" style="height: 10rem;"> {!! $formations->links() !!}</p>
          </div>

      </div>
    </section><!-- End Events Section -->

  </main><!-- End #main -->

@endsection
