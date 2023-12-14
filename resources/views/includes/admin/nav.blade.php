<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      {{-- <h1 class="logo me-auto"><a href="{{route('welcome')}}">programmeur</a></h1> --}}
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="{{route('welcome')}}" class="logo me-auto ">
        <img src="{{asset('/Image/logooo.png')}}" alt="" class="img-fluid"></a>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a style="text-decoration:none;" class="active" href="{{route('welcome')}}">Acceuil</a></li>
          {{-- <li><a href="#">About</a></li> --}}
          <li><a style="text-decoration:none;" href="{{route('showallformation')}}">Formations</a></li>
          <li><a style="text-decoration:none;" href="{{route('showallevent')}}">Evènements</a></li>
          <li><a style="text-decoration:none;" href="{{route('showallannonce')}}">Annonces</a></li>
          <li><a style="text-decoration:none;" href="{{route('showallforum')}}">Forum</a></li>
          <li><a style="text-decoration:none;" href="{{route('contact')}}">Contact</a></li>
            @role('admin')
          <li><a style="text-decoration:none;" href="{{route ('admin.index')}}">Admin</a></li>
            @endrole
            @role('manager')
            <li><a style="text-decoration:none;" href="{{route ('admin.index')}}">manager</a></li>
            @endrole
            @role('user')
            <li><a style="text-decoration:none;" href="{{route ('admin.index')}}">Dashbord</a></li>
            @endrole
            {{-- @auth

            <li class="dropdown"><a href="#"><span>notification{{Auth::user()->unreadNotifications->count()}}</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    @foreach (Auth::user()->unreadNotifications as $notification)
                  <li><a href="#" style="color:rgb(0, 0, 0)">votre demande de postulation est {{json_encode($notification->data['etat'],true)}}</a></li>
                  @endforeach

                </ul>
            </li>
            @endauth --}}

          {{-- <li><a href="pricing.html">Pricing</a></li> --}}

          {{-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> --}}
          {{-- <li><a href="#">Contact</a></li> --}}
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      @guest
      <a style="text-decoration:none;" href="{{route('login')}}" class="get-started-btn">Se Connecter</a>

      @endguest
      @auth
      <a style="text-decoration:none;"  href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="get-started-btn">
        Déconnecter
    </a>
    <form style="text-decoration:none;" id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none">
        @csrf
    </form>
      @endauth
    </div>
  </header><!-- End Header -->

