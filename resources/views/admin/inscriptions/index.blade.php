
@extends('layouts.app')
@role(['admin','manager'])

@section('title','Inscription')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush
  @section('content')
  <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('admin.inscriptions.create') }}" class="btn btn-primary">nouveau inscription</span></a>
                @include('layouts.partial.msg')
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">inscription</h4>
                    </div>
                    <div class="card-content table-responsive">
                        <table id="table" class="table"  cellspacing="0" width="100%">
                            <thead class="text-primary">
                            <th>ID</th>
                            <th>Etat</th>
                            <th>Evenement</th>
                            <th>utilisateur</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($evenementInscription as $key=>$evenementInscription)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $evenementInscription->etat}}</td>
                                        <td>{{ $evenementInscription->evenement->titre}}</td>
                                        <td>{{ $evenementInscription->user->name}}</td>
                                        <td>
                                            <a href="{{ route('admin.inscriptions.edit', $evenementInscription->id) }}" class="btn btn-info btn-sm"><i class="material-icons">edit</i></a>
                                            <form id="delete-form-{{ $evenementInscription->id }}" action="{{ route('admin.inscriptions.destroy', $evenementInscription->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $evenementInscription->id }}').submit();
                                            }else {
                                                event.preventDefault();
                                                    }"><i class="material-icons">delete</i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection
    @endrole
@role('user')

@section('title','Inscription')

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
                        <h4 class="title">inscription</h4>
                    </div>
                    <div class="card-content table-responsive">
                        <table id="table" class="table"  cellspacing="0" width="100%">
                            <thead class="text-primary">
                            <th>ID</th>
                            <th>Etat</th>
                            <th>Evenement</th>
                            <th>utilisateur</th>
                            </thead>
                            <tbody>
                                @foreach($evenementInscription as $key=>$evenementInscription)
                                    @can('view' ,$evenementInscription)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $evenementInscription->etat}}</td>
                                        <td>{{ $evenementInscription->evenement->titre}}</td>
                                        <td>{{ $evenementInscription->user->name}}</td>

                                    </tr>
                                    @endcan
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection
    @endrole
            @push('scripts')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
            {{-- <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> --}}
            <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
            <script>
    $(document).ready(function() {
    var table = $('#table').DataTable( {
     responsive: true
     } );
    new $.fn.dataTable.FixedHeader( table );
    } );
 </script>
            @endpush






