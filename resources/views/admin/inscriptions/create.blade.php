@extends('layouts.app')

@section('title','Ajout inscription')

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
                        <h4 class="title">Ajouter nouveau inscription</h4>
                    </div>
                    <div class="card-content">
                        <form  action="{{ route('admin.inscriptions.store') }}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">etat</label>
                                        <input type="text" class="form-control" name="etat">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="control-label">evenement </label>
                                <select class="form-control"  name="evenement_id" autocomplete="type">
                                @foreach ($event as $event)
                                    <option value="{{ $event->id }}">{{ $event->titre }}</option>
                                @endforeach
                            </select>
                            </div>
                                <div class="row" style="display: none;">
                                    <input class="form-check-input" type="text" name="user_id" value="{{ auth()->user()->id}}" >
                                </div>
                            <a href="{{ route('admin.inscriptions.index') }}" class="btn btn-danger">retour</a>
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
