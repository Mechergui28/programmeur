
@extends('layouts.app')

@section('title','show')

@push('css')
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"> --}}
@endpush
@section('extra-script')
    <script>
        function toggleReplyComment(id)
        {
            let element = document.getElementById('replyComment-' + id);
            element.classList.toggle('d-none');
        }
    </script>
@endsection
  @section('content')
  <div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title text-info">{{ $forums->sujet }}</h4>
            <p>{{ $forums->enonce }}</p>
            <img class="img-responsive img-thumbnail" src="{{ asset('public/'.$forums->first()->image) }}" style="height: 100px; width: 100px" alt="img">

            <div class="d-flex flex-column">
            <small>Posté le {{ $forums->created_at->format('d/m/Y') }} par <span class="badge badge-primary">{{ $forums->user->first()->name }}</span></small>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
            @can('update', $forums)
                <a href="{{ route('admin.forums.edit', $forums->id) }}" class="btn btn-info">Editer ce forums</a>
                @endcan
                @can('delete', $forums)
                <form action="{{ route('admin.forums.destroy', $forums) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-light">Supprimer</button>
                </form>
            @endcan

            </div>
        </div>
    </div>
    @forelse ($forums->comments as $comment)
    <h3>Commentaires</h3>
            <div class="card mb-2 @if($forums->solution === $comment->id) border-success @endif">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                    {{-- {{ $comment->content }} --}}
                    {!! html_entity_decode($comment->content) !!}
                        <div class="d-flex flex-column">
                        {{-- <img class="img-responsive img-thumbnail" src="{{ asset('public/'.$comment->image) }}" style="height: 100px; width: 100px" alt="img"> --}}
                        <small>Posté le {{ $comment->created_at->format('d/m/Y') }} par <span class="badge badge-primary">{{ $comment->user->name }}</span></small>
                        <p>solution ?  <span class="badge badge-primary">{{ $comment->evaluation }}</span>
                        <form action="{{ route('admin.comment.solution', $comment->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <button type="submit" class="btn btn-success" style="margin-left:60%">Marquer comme solution</button>

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
            {{-- <h3>reponse</h3> --}}
            @foreach ($comment->comments as $replyComment)

                <div class="card mb-2 ml-5">
                <div class="card-body">
                    {{ $replyComment->content }}
                    <div class="d-flex flex-column">
                    <small>Posté le {{ $comment->created_at->format('d/m/Y') }} par <span class="badge badge-primary">{{ $comment->user->name }}</span></small>
                    <br>
                    </div>


                </div>
            </div>

            @endforeach
            {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reply">
                Répondre
              </button><br> --}}

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
                <div class="form-group">
                    <label for="content">Votre commentaire</label>
                    <textarea class="form-control " name="content" id="content" rows="2"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-12">
                            <label class="control-label">image</label>
                            <input type="file" name="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                    <button type="submit" class="btn btn-primary">commenter</button>
                  </div>
            </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

        @empty
            <div class="alert alert-info">Aucun commentaire pour ce forums</div>
        @endforelse

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Soumettre mon commentaire
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">commentaire</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('admin.comments.store',$forums) }}" method="POST"  class="mt-3" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="content">Votre commentaire</label>
                    <textarea class="form-control " name="content" id="content" rows="3"></textarea>
                </div>

                <div class="row">
                    <div class="col-md-12">
                            <label class="control-label">image</label>
                            <input type="file" name="image">
                    </div>
                </div>
                {{-- <button type="submit" class="btn btn-primary">Soumettre mon commentaire</button> --}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                    <button type="submit" class="btn btn-primary">commenter</button>
                  </div>
            </form>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
          <button type="submit" class="btn btn-primary">commenter</button>
        </div> --}}
      </div>
    </div>
  </div>

    @endsection
            @push('scripts')

            {{-- <script src="{{ asset('js/appli.js') }}" sync></script> --}}

            @endpush






