@extends('layouts.app')

@section('title','Ajout event')

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
                        <h4 class="title">Ajouter nouveau evenement</h4>
                    </div>
                    <div class="card-content">
                        <form  action="{{ route('admin.evenements.store') }}" method="POST"  enctype="multipart/form-data">
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
                                        <label class="control-label">enonce</label>
                                        <input type="text" class="form-control" name="enonce">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                        <label class="control-label">image</label>
                                        <input type="file" class="form-group " name="image">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                        <label class="control-label">fichier</label>
                                        <input type="file" class="form-group " name="fichier">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                        <label class="control-label">motcle</label>
                                        <input type="text" class="form-control" name="motcle">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                        <label class="control-label">comite</label>
                                        <input type="text" class="form-control" name="comite">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                        <label class="control-label">programme</label>
                                        <input type="text" class="form-control" name="programme">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                        <label class="control-label">nombre</label>
                                        <input type="text" class="form-control" name="limite">
                                </div>
                            </div>
                            <div class="row">
                                <label class="control-label">type d'evénement </label>
                            <select class="form-control"  name="type" autocomplete="type">
                                <option value="compétition">compétition</option>
                                <option value="simple">simple</option>

                            </select>
                              </div>
                            <div class="row">
                                <div class="col-md-12">
                                        <label class="control-label">date début</label>
                                        <input type="date" class="form-control" name="datedebut">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                        <label class="control-label">date fin</label>
                                        <input type="date" class="form-control" name="datefin">
                                </div>
                            </div>

                                <div class="row" style="display: none;">
                                    <label class="control-label">user</label>
                                    <input class="form-check-input" type="text" >{{ auth()->user()->name}}</label>
                                </div>
                            <a href="{{ route('admin.evenements.index') }}" class="btn btn-danger">retour</a>
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
        <script>
            $(function() {
              $('.toggle-class').change(function() {
                  var status = $(this).prop('checked') == true ? 1 : 0;
                  var user_id = $(this).data('id');

                  $.ajax({
                      type: "GET",
                      dataType: "json",
                      url: "{{ route('admin.changestatus') }}",
                      data: {'status': status, 'user_id': user_id},
                      success: function(data){
                        console.log(data.success)
                      }
                  });
              })
            })
          </script>
        @endpush
