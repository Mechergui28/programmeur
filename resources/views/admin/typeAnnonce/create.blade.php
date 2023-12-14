@extends('layouts.app')

@section('title','ajout type annonce')

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
                        <h4 class="title">Ajouter nouveau type annonce </h4>
                    </div>
                    <div class="card-content">
                        <form  action="{{route('admin.typeAnnonce.store')}}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">nom</label>
                                        <input type="text" class="form-control" name="nom">
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

                            <a href="{{ route('admin.typeAnnonce.index') }}" class="btn btn-danger">retour</a>
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
