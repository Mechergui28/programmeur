

@extends('layouts.app')

@section('title','Edit type annonce')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.partial.msg')
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Modifier type annonce</h4>
                        </div>
                        <div class="card-content">
                            <form method="POST" action="{{ route('admin.typeAnnonce.update',$typeannonces->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">nom</label>
                                            <input type="text" class="form-control" value="{{ $typeannonces->nom }}" name="nom">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">nom</label>
                                            <input type="text" class="form-control" value="{{ $typeannonces->description }}" name="description">
                                        </div>
                                    </div>
                                </div>

                                <a href="{{ route('admin.typeAnnonce.index') }}" class="btn btn-danger">Retour</a>
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

@endpush

