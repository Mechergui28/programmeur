@extends('layouts.app')

@section('title','Ajout forum')

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
                        <h4 class="title">Ajouter nouveau forum</h4>
                    </div>
                    <div class="card-content">
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

                            <a href="{{ route('admin.forums.index') }}" class="btn btn-danger">retour</a>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>

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
