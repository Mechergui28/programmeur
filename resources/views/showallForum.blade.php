@extends('layouts.admin')

@section('header')
@push('css')
<link href="{{URL::to('css/style.css') }}" rel="stylesheet">

@endpush
@endsection

@section('content')
<section id="forum" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
    {{-- <h1>Forums <br></h1> --}}
    <h2>Les Forums disponible.</h2>
    {{-- <a href="#" class="btn-get-started">Get Started</a> --}}
    </div>
</section>

<main id="main" data-aos="fade-in">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />
    <section id="course-details" class="course-details mt-5">

    <div class="main-body p-0" style="height: 50rem;">
        <div class="inner-wrapper">
            <div class="inner-sidebar mx-2">
                <button type="button" class="get-started-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Nouveau forum
                  </button>

            </div>

            <div class="inner-main">

                <div class="inner-main-body p-2 p-sm-3 collapse forum-content show">
                    @foreach ($forums as $forum)

                    <div class="card mb-2">
                        <div class="card-body p-2 p-sm-3">
                            <div class="media forum-item">
                                <a href="#" data-toggle="collapse" data-target=".forum-content"><img src="{{$forum->user->avatar}}" class="mr-3 rounded-circle" width="50" alt="avatar" /></a>
                                <div class="media-body ">
                                    <h6><a href="{{ route('showforum', $forum->id) }}" data-toggle="collapse" data-target=".forum-content" class="text-body">{{$forum->sujet}}</a></h6>
                                    <p class="text-secondary">
                                        {{$forum->enonce}}
                                    </p>
                                    <p class="text-muted">publié par {{$forum->user->name}} le <span class="text-secondary font-weight-bold">{{$forum->created_at}}</span></p>
                                </div>
                                <div class="text-muted small text-center align-self-center">
                                    <span><i class="far fa-comment ml-2"></i> {{$forum->comments_count}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {!! $forums->links() !!}


                </div>

            </div>
        </div>


    </div>
    </section>



  </main>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Nouveau forum</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form  action="{{ route('admin.forums.store') }}" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label">sujet</label>
                            <input type="text" class="form-control" name="sujet">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label">enonce</label>
                            <input type="text" class="form-control" name="enonce">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                            <label class="control-label">image</label>
                            <input type="file" name="image">
                    </div>
                </div>

                    <div class="row">
                        <label class="control-label">categorie</label>
                        <select class="form-control"  name="categorie_id" autocomplete="categorie">
                            @foreach ($categories as $categorie )
                            <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                            @endforeach
                         </select>
                    </div>

                    <div class="row" style="display: none;">
                        <div class="col-md-12">
                                <label class="control-label">utilisateur</label>
                                <input type="text" name="user_id" value="{{ auth()->user()->id}}">
                        </div>
                    </div >

                <a href="{{ route('showallforum') }}" class="get-started-btn">Retour</a>
                <button type="submit" class="get-started-btn-2">Enregistrer</button>
                    </div>

            </form>

      </div>
    </div>
  </div>
@endsection













