
@extends('layouts.app')

@section('title','Gallerie')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush


  @section('content')

  <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">nouveau gallerie</span></a>
                @include('layouts.partial.msg')
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Gallerie</h4>
                    </div>
                    <div class="card-content table-responsive">
                        <table id="table" class="table"  cellspacing="0" width="100%">
                            <thead class="text-primary">
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Photo</th>
                            <th>Rang</th>
                            <th>Evenement id </th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($galleries as $key=>$gallerie)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $gallerie->titre }}</td>
                                        <td>{{ $gallerie->description }}</td>
                                        <td><img class="img-responsive img-thumbnail" src="{{ asset('Image/'.$gallerie->image) }}" style="height: 100px; width: 100px" alt=""></td>
                                        <td>{{ $gallerie->rang }}</td>
                                        <td>{{ $gallerie->evenement_id }}</td>
                                        <td>
                                            <a href="{{ route('admin.galleries.edit', $gallerie->id) }}" class="btn btn-info btn-sm"><i class="material-icons">edit</i></a>

                                            <form id="delete-form-{{ $gallerie->id }}" action="{{ route('admin.galleries.destroy', $gallerie->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $gallerie->id }}').submit();
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



