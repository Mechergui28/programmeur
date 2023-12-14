@extends('layouts.app')

@section('title','Edit formation')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"  />
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
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
                        <h4 class="title">Ajouter nouveau formation</h4>
                    </div>
                    <div class="card-content">
                        <form  action="{{ route('admin.formations.update',$formations->id) }}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">titre</label>
                                        <input type="text" class="form-control" name="titre" value="{{$formations->titre}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">description</label>
                                        <input type="text" class="form-control" name="description" value="{{$formations->description}}">
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
                                        <label class="control-label">motcle</label>
                                        <input type="text" class="form-control" name="motcle"  value="{{$formations->motcle}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="control-label">prérequis</label>
                                    <input type="text" class="form-control" name="prerequis" value="{{$formations->prerequis}}">
                            </div>
                            <div class="col-md-12">
                                <label class="control-label">durée</label>
                                <input type="text" class="form-control" name="dure" value="{{$formations->dure}}">
                        </div>
                        <div class="col-md-12">
                            <label class="control-label">contenu</label>
                            <input type="text" class="form-control" name="contenu" value="{{$formations->contenu}}">
                    </div>
                            </div>
                                <div class="row" style="display: none;">
                                    <label class="control-label">user</label>
                                    <input class="form-check-input" type="text" >{{ auth()->user()->name}}</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                            <label class="control-label">avecinscription</label>
                                    <input data-id="{{$formations->id}}" id="avecinscription" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="public" data-off="close" {{ $formations->avecinscription ? 'checked' : '' }}>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                            <label class="control-label">public</label>
                                    <input data-id="{{$formations->id}}" id="public" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="public" data-off="close" {{ $formations->public ? 'checked' : '' }}>

                                    </div>
                                </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                                <label class="control-label">etatinscription</label>
                                    <input data-id="{{$formations->id}}" id="etatinscription" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="public" data-off="close" {{ $formations->etatinscription ? 'checked' : '' }}>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                                <label class="control-label">etat</label>
                                <input data-id="{{$formations->id}}" id="etat" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="public" data-off="close" {{ $formations->etat ? 'checked' : '' }}>

                                        </div>
                                    </div>




                            <a href="{{ route('admin.formations.index') }}" class="btn btn-danger">retour</a>
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
