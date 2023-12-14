@extends('layouts.app')

@section('title','Type annonce')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('admin.typeAnnonce.create') }}" class="btn btn-primary">nouveau type annonce</span></a>
                @include('layouts.partial.msg')
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">type annonce </h4>
                    </div>
                    <div class="card-content table-responsive">
                        <table id="table" class="table"  cellspacing="0" width="100%">
                            <thead class="text-primary">
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($typeannonces as $key=>$typeannonce)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $typeannonce->nom }}</td>
                                        <td>{{ $typeannonce->description }}</td>

                                        <td>
                                            <a href="{{ route('admin.typeAnnonce.edit', $typeannonce->id) }}" class="btn btn-info btn-sm"><i class="material-icons">edit</i></a>

                                            <form id="delete-form-{{ $typeannonce->id }}" action="{{ route('admin.typeAnnonce.destroy', $typeannonce->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $typeannonce->id }}').submit();
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
    @push('scripts')
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


