<section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <a style="text-decoration:none;" href="{{route('showallevent')}}">
            <p>Les événements récents </p>
        </a>

      </div>
      <div class="row" data-aos="zoom-in" data-aos-delay="100">
        <div class="col-4 col-md-6 d-flex align-items-stretch">
          @foreach ($events as $event)
          <div class="course-item" >
            <img src="{{asset('public/'.$event->image)}}"    class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-center align-items-center mb-3">
                <h4 ><a href="{{ url('showevent/'.$event->id) }}" style="color: white; text-decoration:none;">{{ $event->titre }}</a></h4>
                <p class="price"></p>
              </div>
              <table >
                <tr>
                    <td>
                        <span class="text-wrap text-capitalize mx-1">Date début:</span>
                </td><td>
                    <span style="color: #008080;"> {{$event->datedebut}}</span></td></tr>
                <tr><td><span class="text-wrap text-capitalize mx-1">Date fin:</span></td><td><span style="color: #008080;">{{$event->datefin}}</span></td></tr>



              </table>
              <p>{{ $event->programme }}</p>
              <div class="trainer d-flex justify-content-between align-items-center">
                <div class="trainer-profile d-flex align-items-center">

                  </i>Nombre :{{$event->limite}}
                </div>
                <div class="trainer-rank d-flex align-items-center">

                  {{-- <a href="{{ url('showevent/'.$event->id) }}">inscrire</a> --}}
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>

        <!-- End Course Item-->





      </div>

    </div>
  </section>
