@extends('layouts.app')

@section('title','Gagnant')

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
                        <h4 class="title">Ajouter nouveau gagnant</h4>
                    </div>
                    <div class="card-content">
                        <form  action="{{ route('admin.gagnants.store') }}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <label class="control-label">user </label>
                                <select class="form-control"  name="user_id" autocomplete="type">
                                    @foreach ($user as $user )
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach

                            </select>
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
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">prix</label>
                                        <input type="text" class="form-control" name="prix">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="control-label" for="evenement_id">Evénement </label>
                                <select class="form-control"  name="evenement_id" autocomplete="evenement">
                                @foreach ($event as $event)
                                    <option value="{{ $event->id }}">{{ $event->titre }}</option>
                                @endforeach
                            </select>
                            </div>
                         <a href="{{ route('admin.gagnants.index') }}" class="btn btn-danger">retour</a>
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
