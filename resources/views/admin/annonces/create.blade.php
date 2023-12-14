@extends('layouts.app')

@section('title','annonce ajout')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.partial.msg')
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Ajouter nouveau annonce</h4>
                    </div>
                    <div class="card-content">
                        <form  action="{{ route('admin.annonces.store') }}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">annonce</label>
                                        <input type="text" class="form-control" name="annonce">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">specification</label>
                                        <input type="text" class="form-control" name="specification">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">titre</label>
                                        <input type="text" class="form-control" name="titre">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                        <label class="control-label">fichier</label>
                                        <input type="file" name="fichier">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                        <label class="control-label">image</label>
                                        <input type="file" name="image">
                                </div>
                            </div>

                              <div class="row">
                                <label class="control-label">type  annonce </label>
                            <select class="form-control"  name="type" autocomplete="type">
                                <option value="1">création_application</option>
                                <option value="2">recrutement</option>

                            </select>
                              </div>
                                {{-- <div class="row" style="display: none;">
                                    <label class="control-label">user</label>
                                    <input class="form-check-input" name="user_id" type="text" >{{auth()->user()->id}}</label>
                                </div> --}}
                                <div class="row">
                                    <label class="control-label">user</label>
                                    <select class="form-control"  name="user_id" autocomplete="type">
                                        @foreach ($user as $user )
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                </select>
                                </div>
                                <div class="row">
                                    <label class="control-label">categorie  annonce </label>
                                    <select class="form-control"  name="type_annonce" >
                                    @foreach ($typeannonces as $typeannonce)
                                        <option value="{{ $typeannonce->id }}">{{ $typeannonce->nom }}</option>
                                    @endforeach
                                </select>
                                </div>




                            <a href="{{ route('admin.annonces.index') }}" class="btn btn-danger">retour</a>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    @push('scripts')
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#table').DataTable();
            } );
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    @endpush
