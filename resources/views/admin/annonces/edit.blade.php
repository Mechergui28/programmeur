@extends('layouts.app')

@section('title','annonce edit')

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
                        <h4 class="title">Modifier annonce</h4>
                    </div>
                    <div class="card-content">
                        <form  action="{{ route('admin.annonces.update',$annonces->id) }}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">annonce</label>
                                        <input type="text" class="form-control" name="annonce" value="{{$annonces->annonce}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">specification</label>
                                        <input type="text" class="form-control" name="specification" value="{{$annonces->specification}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">titre</label>
                                        <input type="text" class="form-control" name="titre" value="{{$annonces->titre}}">
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

<br>
                                <div class="row" style="display: none;">
                                    <label class="control-label">user</label>
                                    <input class="form-check-input" type="text" >{{ auth()->user()->name}}</label>
                                </div>
                                <div class="row">
                                    <label class="control-label">type  annonce </label>
                                    <select class="form-control" id="evenement_id" name="type" autocomplete="type">
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
