@extends('layouts.app')

@section('title','edit event')

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
                        <h4 class="title">Modifier énénement</h4>
                    </div>
                    <div class="card-content">
                        <form  action="{{ route('admin.evenements.update',$evenements->id) }}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">titre</label>
                                        <input type="text" class="form-control" name="titre" value="{{$evenements->titre}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">enonce</label>
                                        <input type="text" class="form-control" name="enonce" value="{{$evenements->enonce}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                        <label class="control-label">image</label>
                                        <input type="file" class="form-group " name="image" value="{{$evenements->image}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                        <label class="control-label">fichier</label>
                                        <input type="file" class="form-group " name="fichier" value="{{$evenements->fichier}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                        <label class="control-label">motcle</label>
                                        <input type="text" class="form-control" name="motcle" value="{{$evenements->motcle}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="control-label">comite</label>
                                    <input type="text" class="form-control" name="comite" value="{{$evenements->comite}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="control-label">programme</label>
                                    <input type="text" class="form-control" name="programme" value="{{$evenements->programme}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                        <label class="control-label">nombre</label>
                                        <input type="text" class="form-control" name="limite" value="{{$evenements->limite}}">
                                </div>
                            </div>
                            <div class="row">
                                <label class="control-label">type  annonce </label>
                            <select class="form-control"  name="type" autocomplete="type" value="{{$evenements->type}}">
                                <option value="1">compétition</option>
                                <option value="2">simple</option>

                            </select>
                              </div>
                            <div class="row">
                                <div class="col-md-12">
                                        <label class="control-label">date début</label>
                                        <input type="date" class="form-control" name="datedebut" value="{{$evenements->datedebut}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                        <label class="control-label">date fin</label>
                                        <input type="date" class="form-control" name="datefin" value="{{$evenements->datefin}}">
                                </div>
                            </div>
                            <div class="row" style="display: none;">
                                <label class="control-label">user</label>
                                <input class="form-check-input" type="text" name="user_id" value="{{ auth()->user()->id}}" ></label>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
    {{-- <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> --}}
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
                  var avecinscription = $(this).prop('checked') == true ? 1 : 0;
                  var id = $(this).data('id');

                  $.ajax({
                      type: "GET",
                      dataType: "json",
                      url: "{{ route('admin.changestatus') }}",
                      data: {'avecinscription': avecinscription, 'id': id},
                      success: function(data){
                        console.log(data.success)
                      }
                  });
              })
            })
          </script>
        @endpush
