@extends('layouts.app')

@section('title',' Ajout gallerie')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.partial.msg')
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Ajouter nouveau Gallerie</h4>
                    </div>
                    <div class="card-content">
                        <form  action="{{ route('admin.galleries.store') }}" method="POST"  enctype="multipart/form-data">
                            @csrf
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
                                    <div class="form-group label-floating">
                                        <label class="control-label">description</label>
                                        <input type="text" class="form-control" name="description">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">rang</label>
                                        <input type="text" class="form-control" name="rang">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="control-label">évenement</label>
                                <select class="form-control" id="evenement_id" name="evenement_id" autocomplete="evenement_id-name">
                                @foreach ($evenements as $evenement)
                                    <option value="{{ $evenement->id }}">{{ $evenement->titre }}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                        <label class="control-label">Image</label>
                                        <input type="file" name="image">
                                </div>
                            </div>




                            <a href="{{ route('admin.roles.index') }}" class="btn btn-danger">retour</a>
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
    @endpush
