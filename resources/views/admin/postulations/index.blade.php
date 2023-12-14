
@extends('layouts.app')

@section('title','Postulation')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush

  @section('content')
  @role('admin')
  <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('admin.postulations.create') }}" class="btn btn-primary">nouveau postulations</span></a>
                @include('layouts.partial.msg')
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">postulations</h4>
                    </div>
                    <div class="card-content table-responsive">
                        <table id="table" class="table"  cellspacing="0" width="100%">
                            <thead class="text-primary">
                            <th>ID</th>
                            <th>postulations</th>
                            <th>fichier</th>
                            <th>reponse</th>
                            <th>remarque</th>
                            <th>note</th>
                            <th>etat</th>
                            <th>utilisateur</th>
                            <th>annonce</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($postulations as $key=>$postulations)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $postulations->postulations}}</td>
                                        <td><a href="{{ route('admin.Downloadfile',$postulations->fichier) }}">{{$postulations->fichier}}</a> </td>
                                        <td>{{ $postulations->reponse}}</td>
                                        <td>{{ $postulations->remarque}}</td>
                                        <td>{{ $postulations->note}}</td>
                                        <td>{{ $postulations->etat }}</td>
                                        <td>{{ $postulations->user->name }}</td>
                                        <td>{{ $postulations->annonce->annonce }}</td>
                                        <td>
                                            <a href="{{ route('admin.postulations.edit', $postulations->id) }}" class="btn btn-info btn-sm"><i class="material-icons">edit</i></a>

                                            <form id="delete-form-{{ $postulations->id }}" action="{{ route('admin.postulations.destroy', $postulations->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $postulations->id }}').submit();
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
@endrole
@role('user')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('admin.postulations.create') }}" class="btn btn-primary">nouveau postulations</span></a>
                @include('layouts.partial.msg')
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">postulations</h4>
                    </div>
                    <div class="card-content table-responsive">
                        <table id="table" class="table"  cellspacing="0" width="100%">
                            <thead class="text-primary">
                            <th>ID</th>
                            <th>Postulations</th>
                            {{-- <th>Fichier</th> --}}
                            <th>Reponse</th>
                            <th>Remarque</th>
                            <th>Note</th>
                            <th>Etat</th>
                            <th>Utilisateur</th>
                            <th>Annonce</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($postulations as $key=>$postulation)
                            @can('view',$postulation)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $postulation->postulations}}</td>
                                        {{-- <td><a href="{{ route('admin.Downloadfile',$postulation->fichier) }}">{{$postulation->fichier}}</a> </td> --}}
                                        <td>{{ $postulation->reponse}}</td>
                                        <td>{{ $postulation->remarque}}</td>
                                        <td>{{ $postulation->note}}</td>
                                        <td>{{ $postulation->etat }}</td>
                                        <td>{{ $postulation->user->name }}</td>
                                        <td>{{ $postulation->annonce->annonce }}</td>
                                        <td>
                                            {{-- <a href="{{ route('admin.postulations.edit', $postulation->id) }}" class="btn btn-info btn-sm"><i class="material-icons">edit</i></a> --}}

                                            <form id="delete-form-{{ $postulation->id }}" action="{{ route('admin.postulations.destroy', $postulation->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $postulation->id }}').submit();
                                            }else {
                                                event.preventDefault();
                                                    }"><i class="material-icons">delete</i></button>
                                        </td>
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
@endrole
    @endsection
            @push('scripts')
                <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>

                <script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
                <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" ></script>
                <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap.min.js" ></script>
                <script src="https://cdn.datatables.net/fixedheader/3.2.4/js/dataTables.fixedHeader.min.js" ></script>
                <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js" ></script>
                <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap.min.js" ></script>



<script>
    $(function() {
        $('#public').change(function() {
    var public = $(this).prop('checked') == true ? 1 : 0;
    var id = $(this).data('id');

    $.ajax({
        type: "GET",
        dataType: "json",
url: "{{ route('admin.changepublic') }}",
data: {'public': public, 'id': id},
success: function(data){
console.log(data.success)
}
});
})
})
</script>
<script>
                $(function() {
                    $('#typee').change(function() {
                var typee = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
            url: "{{ route('admin.changetype') }}",
            data: {'typee': typee, 'id': id},
            success: function(data){
            console.log(data.success)
            }
            });
            })
        })
</script>
                <script>
                    $(document).ready(function() {
                    var table = $('#table').DataTable( {
                        responsive: true
                    } );

                    new $.fn.dataTable.FixedHeader( table );
                             } );
                 </script>

            @endpush






