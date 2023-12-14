@extends('layouts.app')

@section('title','Edit inscription')

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
                        <h4 class="title">Ajouter nouveau inscription</h4>
                    </div>
                    <div class="card-content">
                        <form  action="{{ route('admin.inscriptionformations.update',$inscriptions->id) }}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">etat</label>
                                        <select class="form-control" name="etat">
                                <option selected>etat</option>
                                <option value="accepter" {{($inscriptions->etat === 'accepter') ? 'Selected' : ''}}>accepter</option>
                                <option value="refuser" {{($inscriptions->etat === 'refuser') ? 'Selected' : ''}}>refuser</option>
                            </select>                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="control-label">evenement </label>
                                <select class="form-control"  name="formation_id" autocomplete="type">
                                @foreach ($formation as $formation)
                                    <option value="{{ $formation->id }}">{{ $formation->titre }}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="row" style="display: none;">
                                <input class="form-check-input" type="text" name="user_id" value="{{ auth()->user()->id}}" >
                            </div>


                            <a href="{{ route('admin.inscriptionformations.index') }}" class="btn btn-danger">retour</a>
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
