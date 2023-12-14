@extends('layouts.admin')

@section('header')
@push('css')
<link href="{{URL::to('css/style.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
@endpush
@endsection

@section('content')

<section id="forum" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
    <h2>Forums <br></h2>
    {{-- <h2>Les Forums disponible.</h2> --}}
    {{-- <a href="#" class="btn-get-started">Get Started</a> --}}
    </div>
</section>
<div class="container" style="margin-top: 8rem;">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title text-info  text-center">{{ $forums->sujet }}</h4>
            <div class="text-center">
                <img class="img-fluid " src="{{ asset('public/'.$forums->image) }}"  style="height: 300px; width: 700px"alt="img">
            </div>
            {{-- {{dd(asset('public/'.$forums->first()->image))}} --}}
            <p>{{ $forums->enonce }}</p>


            <div class="d-flex flex-column">
            <small>Posté le {{ $forums->created_at->format('d/m/Y') }} par <span style="color: teal;"><b>{{ $forums->user->first()->name }}</b></span></small>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
            @can('update', $forums)
                <a href="{{ route('admin.forums.edit', $forums->id) }}" class="get-started-btn">Editer ce forums</a>
                @endcan
                @can('delete', $forums)
                <form action="{{ route('admin.forums.destroy', $forums->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="get-started-btn-2">Supprimer</button>
                </form>
            @endcan

            </div>
        </div>
    </div>

    @forelse ($forums->comments as $comment)
    <h3 style="margin-top: 2rem;">Commentaires</h3>

            <div class="card mb-2  @if($forums->solution === $comment->id) border-success @endif" >
                <div class="card-body">
                    <div>
                    {{-- {{!! html_entity_decode   !! }} --}}

                        <div class="d-flex flex-column " style="margin-top: 1rem;" >
                            {!! html_entity_decode($comment->content) !!}
                        {{-- <img class="img-responsive img-thumbnail" src="{{ asset('media/'.$comment->image) }}" style="height: 100px; width: 150px" alt="img"> --}}
                        <small> Posté le {{ $comment->created_at->format('d/m/Y') }} par {{ $comment->user->name }}</small>
                        <p>solution :
                @if( $comment->evaluation == 'oui')
                <i class="fa fa-check" ></i>
                @else
                Non
                @endif
                 <form action="{{ route('admin.comment.solution', $comment->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <button type="submit" class="get-started-btn-3" > Marquer comme résolu</button>

                </form>

                    </p>

                        </div>
                    </div>
                    <div>
                        @auth
                            @if (!$forums->evaluation && auth()->user()->id === $forums->user_id)
                                <solution-button forums-id="{{ $forums->id }}" comment-id="{{ $comment->id }}"></solution-button>
                            @else
                                @if ($forums->evaluation === $comment->id)
                                    <span class="badge badge-success">Marqué comme solution</span>
                                @endif
                            @endif
                        @endauth
                    </div>
                </div>
            </div>


{{--
<div class="modal fade" id="reply" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Répondre</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.comments.storeReply', $comment) }}" method="POST" class="mb-3 ml-5 d-none" id="replyComment-{{ $comment->id }}">
                @csrf
                <div id="ckeditor" >

                    <textarea class="form-control " name="content" id="content" rows="2"></textarea>


                </div>
                    <button type="submit" class="btn btn-primary">commenter</button>
                  </div>
            </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div> --}}
  </div>

        @empty
            <div class="alert alert-info">Aucun commentaire pour ce forums</div>
        @endforelse
        <div class="card" style="margin-top:1rem;">
        <form action="{{route('admin.comments.store',$forums) }}" method="POST"  class="mt-3" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <textarea  id="editor" class="form-control " name="content"  ></textarea>
            </div>
            <button type="submit" class="get-started-btn"><i class="fas fa-paper-plane"></i>
            </button>
          </div>

        </form>

        </div>
    </div>

    <!-- Button trigger modal -->


      <!-- Modal -->


      <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ),{
                ckfinder: {
                    uploadUrl: '{{route('admin.upload').'?_token='.csrf_token()}}',
        }
            })
            .catch( error => {
                console.error( error );
            } );
    </script>

  @endsection

