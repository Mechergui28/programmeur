@extends('layouts.app')

@section('title','Edit postulation')

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
                        <h4 class="title">Modifier postulation</h4>
                    </div>
                    <div class="card-content">
                        <form  action="{{ route('admin.postulations.update',$postulations->id) }}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">postulation</label>
                                        <input type="text" class="form-control" name="postulations" value="{{$postulations->postulations}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">reponse</label>
                                        <input type="text" class="form-control" name="reponse" value="{{$postulations->reponse}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">remarque</label>
                                        <input type="text" class="form-control" name="remarque" value="{{$postulations->remarque}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">note</label>
                                        <input type="text" class="form-control" name="note" value="{{$postulations->note}}">
                                    </div>
                                </div>

<br><div class="row">
    <div class="col-md-12">
        <div class="form-group label-floating">
            <label class="control-label">etat</label>
            <select class="form-control" name="etat">
                                <option selected>etat</option>
                                <option value="acceptée" {{($postulations->etat === 'acceptée') ? 'Selected' : ''}}>acceptée</option>
                                <option value="consultée" {{($postulations->etat === 'consultée') ? 'Selected' : ''}}>consultée</option>
                                <option value="rejectée" {{($postulations->etat === 'rejectée') ? 'Selected' : ''}}>rejectée</option>
                                <option value="candidatPossible" {{($postulations->etat === 'candidatPossible') ? 'Selected' : ''}}>candidatPossible</option>
          </select>
          </div>
    </div>
</div>





                            <a href="{{ route('admin.postulations.index') }}" class="btn btn-danger">retour</a>
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
