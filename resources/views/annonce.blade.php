
    <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <a style="text-decoration: none;" href="{{route('showallannonce')}}"><p>Les annonces récents </p></a>


              </div>
          <div class="row" data-aos="zoom-in" data-aos-delay="100">
                @foreach ($annonce as $annonce)
                <div class="col-6 col-md-4 d-flex align-items-stretch">

              {{-- <div class="member">

                <div class="member-content">
                  <p


                  </p>

                </div>
              </div> --}}
              <div class="flip-container">
                <div class="flip-inner-container">
                  <div class="flip-front">
                    <div class="profile-image">
                        <img  src="{{ asset('public/'.$annonce->image) }}"  class="img-fluid" alt="">
                    </div>
                    <h4><a style="text-decoration: none; color:#6d071a;" href="{{url('showannonce/'.$annonce->id)}}">{{$annonce->annonce}}</a></h4>

                          <h6 style="color: teal;">{{$annonce->titre}}</h6>
                  </div>
                  <div class="flip-back">
                    <h4 style="color: teal;">{{$annonce->titre}}</h4>
                    <a class="btn btn_hire" style="text-decoration: none; " href="{{url('showannonce/'.$annonce->id)}}">{{$annonce->annonce}}</a>
                  </div>
                </div>
              </div>
            </div>

              @endforeach

          </div>
        </div>
      </section><!-- End Trainers Section -->
