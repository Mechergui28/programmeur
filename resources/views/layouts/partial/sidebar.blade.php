{{-- <div class="sidebar" data-color="purple" data-image="{{ asset('backend/img/sidebar-1.jpg') }}">

    <div class="logo">
        <a href="{{route('welcome')}}" class="simple-text">
           programmeur
        </a>
    </div>
    <div class="sidebar-wrapper">

        <ul class="nav">
            <li class="{{ Request::is('admin/dashboard*') ? 'active': '' }}">
                <a  href="">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/commande*') ? 'active': '' }}">
                <a class="" href="{{route ('admin.users.index')}}">
                    <i class="material-icons">group</i>
                    <p>users</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/role*') ? 'active': '' }}">
                <a href="{{route ('admin.roles.index')}}">
                    <i class="material-icons">manage_accounts</i>
                    <p>Role</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/permission*') ? 'active': '' }}">
                <a href="{{route('admin.permissions.index')}}">
                    <i class="material-icons">engineering</i>
                    <p>Permission</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/gallerie*') ? 'active': '' }}">
                <a href="{{route ('admin.galleries.index')}}">
                    <i class="material-icons">collections_bookmark</i>
                    <p>Gallerie</p>
                </a>
            </li>
            <li >
                <div class="dropdown mx-auto">
                <a  href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration:none; color:#2e2e2e;;">
                    <ul class="nav">
                        <li style="margin-left:3rem;">
                    <i class="material-icons">chrome_reader_mode</i>
                    <p> Annonces</p>
                        </li>
                    </ul>
                </a>


                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" class="d-flex flex-row" style="display: flex; flex-direction:column; margin-left:5.2rem; padding:.5rem">
                      <a  href="{{route ('admin.annonces.index')}}" class="dropdown-item" style="text-decoration:none; color:#2e2e2e;;"> List Annonces</a>
                      <a href="{{route ('admin.postulations.index')}}" class="dropdown-item" style="text-decoration:none; color:#2e2e2e;;" >List Postulations</a>
                      <a href="{{route ('admin.typeAnnonce.index')}}" class="dropdown-item" style="text-decoration:none; color:#2e2e2e;;">
                        Categorie annonce
                    </a>
                    </div>
                  </div>

            </li>
            <li >
                <div class="dropdown mx-auto">
                <a  href="#" role="button" id="dropdownMenuLinkForum" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration:none; color:#2e2e2e;">
                    <ul class="nav">
                        <li style="margin-left:3rem;">
                    <i class="material-icons">forum</i>
                    <p>Forum</p>
                        </li>
                    </ul>
                </a>


                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkForum" class="d-flex flex-row" style="display: flex; flex-direction:column; margin-left:5.2rem; padding:.5rem">
                      <a  href="{{route('admin.forums.index')}}" class="dropdown-item" style="text-decoration:none; color:#2e2e2e;"> List Forums</a>
                      <a  href="{{route ('admin.categories.index')}}" class="dropdown-item" style="text-decoration:none; color:#2e2e2e;" >Categories Forum</a>
                    </div>
                  </div>

            </li>
            <li >
                <div class="dropdown mx-auto">
                <a  href="#" role="button" id="dropdownMenuLinkFormation" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration:none; color:#2e2e2e;">
                    <ul class="nav">
                        <li style="margin-left:3rem;">
                            <i class="material-icons">school</i>
                            <p>Formation</p>
                        </li>
                    </ul>
                </a>


                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkFormation" class="d-flex flex-row" style="display: flex; flex-direction:column; margin-left:5.2rem; padding:.5rem">
                      <a  href="{{route ('admin.formations.index')}}" class="dropdown-item" style="text-decoration:none; color:#2e2e2e;"> List Formations</a>
                      <a  href="{{route ('admin.formationpartie.index')}}" class="dropdown-item" style="text-decoration:none; color:#2e2e2e;" >Parties Formations</a>
                      <a  href="{{route ('admin.inscriptionformations.index')}}" class="dropdown-item" style="text-decoration:none; color:#2e2e2e;" >Inscription</a>

                    </div>
                  </div>

            </li>
            <li >
                <div class="dropdown mx-auto">
                <a  href="#" role="button" id="dropdownMenuLinkEvent" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration:none; color:#2e2e2e;">
                    <ul class="nav">
                        <li style="margin-left:3rem;">
                            <i class="material-icons">celebration</i>
                            <p>Evenement</p>
                        </li>
                    </ul>
                </a>


                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkEvent" class="d-flex flex-row" style="display: flex; flex-direction:column; margin-left:5.2rem; padding:.5rem">
                      <a   href="{{route ('admin.evenements.index')}}" class="dropdown-item" style="text-decoration:none; color:#2e2e2e;"> List Evenement</a>
                      <a   href="{{route ('admin.inscriptions.index')}}" class="dropdown-item" style="text-decoration:none; color:#2e2e2e;" >Inscription Evenement</a>
                      <a  href="{{route ('admin.gagnants.index')}}" class="dropdown-item" style="text-decoration:none; color:#2e2e2e;" >Gagant Evenement</a>

                    </div>
                  </div>

            </li>
            <li class="{{ Request::is('admin/chat*') ? 'active': '' }}">
                <a href="{{route ('chatify')}}">
                    <i class="material-icons">chat</i>
                    <p>chat</p>
                </a>
            </li>
    </div>
</div> --}}
@role('admin')
<div class="sidebar close" style="background-color: teal">

    <div class="logo-details">
      <span class="logo_name">PROGRAMMEUR</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="{{route ('admin.index')}}">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Dashboard</a></li>
        </ul>
      </li>
      <li>
        <a href="{{route ('welcome')}}">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Acceuil</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Acceuil</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-user' ></i>
            <span class="link_name">Utilisateurs</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Utilisateurs</a></li>
          <li><a href="{{route ('admin.users.index')}}">Utilisateurs</a></li>
          <li><a href="{{route ('admin.roles.index')}}">Rôle</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Annonces</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Annonces</a></li>
          <li><a href="{{route ('admin.annonces.index')}}">Annonces</a></li>
          <li><a href="{{route ('admin.postulations.index')}}">Postulations</a></li>
          <li><a href="{{route ('admin.typeAnnonce.index')}}">Type annonces</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-comment' ></i>
            <span class="link_name">Forum</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Forum</a></li>
          {{-- <li><a href="{{route('admin.forums.index')}}">Forum</a></li> --}}
          <li><a href="{{route ('admin.categories.index')}}">Categorie Forum</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-news' ></i>
            <span class="link_name">Formations</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Formations</a></li>
          <li><a href="{{route ('admin.formations.index')}}">Formations</a></li>
          <li><a href="{{route ('admin.formationpartie.index')}}">Formation partie</a></li>
          <li><a href="{{route ('admin.inscriptionformations.index')}}">Inscription</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-calendar' ></i>
            <span class="link_name">Evenement</span>
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Evenement</a></li>
          <li><a href="{{route ('admin.evenements.index')}}">Evenement</a></li>
          <li><a href="{{route ('admin.galleries.index')}}">Gallerie</a></li>
          <li><a href="{{route ('admin.gagnants.index')}}">Gagnant</a></li>
          <li><a href="{{route ('admin.inscriptions.index')}}">Inscription</a></li>
        </ul>
      </li>
      <li>

      </li>
         <div class="profile-details" style="background: teal;">
      <div class="name-job" style="background: teal;">
        <div class="profile_name" style="background: teal;">{{Auth::user()->name}}</div>
      </div>
    </div>
  </li>
    </ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
     </div>
  </section>
  @endrole
  @role('manager')
<div class="sidebar close" style="background-color: teal">
    <div class="logo-details">

      <span class="logo_name">PROGRAMMEUR</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="{{route ('welcome')}}">
              <i class='bx bx-grid-alt' ></i>
              <span class="link_name">Acceuil</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="#">Acceuil</a></li>
            </ul>
          </li>

      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Annonces</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Annonces</a></li>
          <li><a href="{{route ('admin.annonces.index')}}">Annonces</a></li>
          <li><a href="{{route ('admin.postulations.index')}}">Postulations</a></li>
          <li><a href="{{route ('admin.typeAnnonce.index')}}">Type annonces</a></li>
        </ul>
      </li>
         <div class="profile-details" style="background: teal;">
      <div class="name-job" style="background: teal;">
        <div class="profile_name" style="background: teal;">{{Auth::user()->name}}</div>
      </div>
    </div>
  </li>
    </ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
     </div>
  </section>
  @endrole
  @role('user')
<div class="sidebar close" style="background-color: teal">
    <div class="logo-details">

      <span class="logo_name">PROGRAMMEUR</span>
    </div>
    <ul class="nav-links">

        <li>
            <a href="{{route ('admin.index')}}">
              <i class='bx bx-grid-alt' ></i>
              <span class="link_name">Dashboard</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="#">Dashboard</a></li>
            </ul>
          </li>
          <li>
            <a href="{{route ('welcome')}}">
              <i class='bx bx-grid-alt' ></i>
              <span class="link_name">Acceuil</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="#">Acceuil</a></li>
            </ul>
          </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Annonces</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Annonces</a></li>
          {{-- <li><a href="{{route ('admin.annonces.index')}}">Annonces</a></li> --}}
          <li><a href="{{route ('admin.postulations.index')}}">Postulations</a></li>
          {{-- <li><a href="{{route ('admin.typeAnnonce.index')}}">Type annonces</a></li> --}}
        </ul>
      </li>
         <div class="profile-details" style="background: teal;">
      <div class="name-job" style="background: teal;">
        <div class="profile_name" style="background: teal;">{{Auth::user()->name}}</div>
      </div>
    </div>
  </li>
  <li>
    <div class="iocn-link">
      <a href="#">
        <i class='bx bx-calendar' ></i>
        <span class="link_name">Evenement</span>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
      </a>
      <i class='bx bxs-chevron-down arrow' ></i>
    </div>
    <ul class="sub-menu">
      <li><a class="link_name" href="#">Evenement</a></li>
      <li><a href="{{route ('admin.gagnants.index')}}">Gagnant</a></li>
      <li><a href="{{route ('admin.inscriptions.index')}}">Inscription</a></li>
    </ul>
  </li>
    </ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
     </div>
  </section>
  @endrole
