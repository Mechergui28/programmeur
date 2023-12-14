<section id="testimonials" class="testimonials">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <a style="text-decoration: none;" href="{{route('showallformation')}}"><p>Les formations récents</p></a>


      </div>


      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper-wrapper">
        @foreach ($formation as $formation)

                <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="testimonial-item">
                <img src="{{asset('public/'.$formation->image)}}" class="testimonial-img" alt="">

                <h3>{{$formation->titre}}</h3>
                <h4 ><a href="{{ url('showformation/'.$formation->id) }}"> Voir  Formation</a></h4>
                <p>
                  <i class=""></i>
                  {{$formation->description}}
                  <i class=""></i>
                </p>
              </div>
            </div>

          </div><!-- End testimonial item -->
          @endforeach


        </div>


      </div>

      <div class="swiper-pagination"></div>

    </div>
  </section>
