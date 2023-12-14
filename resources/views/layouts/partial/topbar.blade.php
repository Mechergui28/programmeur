<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"> Hello, {{ Auth::user()->name }} </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">

                <li>
                    <a href="{{ route('admin.users.edit', Auth::user()->id) }}" >
                        <i class="material-icons" href="{{ route('admin.users.edit', Auth::user()->id) }}" >person</i>
                        <p class="hidden-lg hidden-md">Profil</p>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">notifications</i>
                    <span class="notification">{{Auth::user()->unreadNotifications->count()}}</span>
                    <div class="ripple-container"></div></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        @foreach (Auth::user()->unreadNotifications as $notification)
                        @if($notification->type == 'App\Notifications\EtatPostulationNotification')
                    <a class="dropdown-item"  href="{{route('admin.postulations.index')}}">nouvelle réponse apropos posulation{{json_encode($notification->data['etat'],true)}} {{$notification->markAsRead()}}<br>  </a>
                        @elseif ($notification->type == 'App\Notifications\inscriptionNotification')
                    <a class="dropdown-item"  href="{{route('admin.inscriptions.index')}}">nouvelle réponse apropos votre inscription  {{json_encode($notification->data['inscri'],true)}} {{$notification->markAsRead()}}<br>  </a>
                        @else
                    <a class="dropdown-item"  href="{{route('admin.gagnants.index')}}">nouvelle réponse apropos {{json_encode($notification->data['event'],true)}} {{$notification->markAsRead()}}<br>  </a>
                        @endif
                    @endforeach

                    </div>
                    </li>
                {{-- <span>
                    <img src="{{asset('/users/images/avatar.png') }}" class="rounded-circle" style="vertical-align: middle;
                    width: 50px;
                    height: 50px;
                    border-radius: 50%;" alt=""/>
                </span> --}}

                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="material-icons">exit_to_app</i>
                        Déconnexion
                    </a>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

