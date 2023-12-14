
@extends('layouts.app')

@section('title','Annonce')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush


  @section('content')



  <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('admin.annonces.create') }}" class="btn btn-primary">nouveau annonces</span></a>
                @include('layouts.partial.msg')
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Annonces</h4>
                    </div>
                    <div class="card-content table-responsive">
                        <table id="table" class="table"  cellspacing="0" width="100%">
                            <thead class="text-primary">
                            <th>ID</th>
                            <th>Annonce</th>
                            <th>Specification</th>
                            <th>type</th>
                            <th>public</th>
                            <th>fichier</th>
                            <th>photo</th>
                            <th>titre</th>
                            <th>User  id </th>
                            <th>catégorie annonce</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($annonces as $key=>$annonces)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $annonces->annonce}}</td>
                                        <td>{{ $annonces->specification}}</td>
                                         <td>
                                            <input data-id="{{$annonces->id}}" id="type" class="type toggle-class " type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="création " data-off="recrutement" {{ $annonces->typee ? 'checked' : '' }}>

                                         </td>
                                         <td>
                                            <input data-id="{{$annonces->id}}" id="public" class="public toggle-class " type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="public" data-off="close" {{ $annonces->public ? 'checked' : '' }}>
                                         </td>
                                        <td><a href="{{ route('admin.download',$annonces->fichier) }}">{{$annonces->fichier}}</a> </td>
                                        <td><img class="img-responsive img-thumbnail" src="{{ asset('public/'.$annonces->image) }}" style="height: 100px; width: 100px" alt=""></td>
                                        <td>{{ $annonces->titre}}</td>
                                        <td>{{ $annonces->user->name}}</td>
                                        <td>{{ $annonces->typeannonce->nom}}</td>
                                        <td>
                                            <a href="{{ route('admin.annonces.edit', $annonces->id) }}" class="btn btn-info btn-sm"><i class="material-icons">edit</i></a>

                                            <form id="delete-form-{{ $annonces->id }}" action="{{ route('admin.annonces.destroy', $annonces->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $annonces->id }}').submit();
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
                <script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
                <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" ></script>
                <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap.min.js" ></script>
                <script src="https://cdn.datatables.net/fixedheader/3.2.4/js/dataTables.fixedHeader.min.js" ></script>
                <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js" ></script>
                <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap.min.js" ></script>
                <script>
                    $(document).ready(function() {
                    var table = $('#table').DataTable( {
                        responsive: true
                    } );

                    new $.fn.dataTable.FixedHeader( table );
                             } );
                 </script>


<script>
    $(function() {
        $('.public').change(function() {
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
                    $('.type').change(function() {
                var type = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
            url: "{{ route('admin.changetype') }}",
            data: {'type': type, 'id': id},
            success: function(data){
            console.log(data.success)
            }
            });
            })
        })
</script>


            @endpush






