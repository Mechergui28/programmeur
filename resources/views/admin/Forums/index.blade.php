
@extends('layouts.app')

@section('title','Forum')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush


  @section('content')


  <div class="container">
    <div class="list-group">
        <a href="{{ route('admin.forums.create') }}" class="btn btn-primary">nouveau forums</span></a>

        @foreach ($forums as $forums)
        <div class="list-group-item mb-2">
            <h4><a href="{{ route('admin.forums.show', $forums->id) }}">{{ $forums->sujet }}</a></h4>
            <p>{{ $forums->enonce }}</p>
            <img class="img-responsive img-thumbnail" src="{{ asset('public/'.$forums->image) }}" style="height: 100px; width: 100px" alt="img">

            <div class="d-flex flex-column">
            <small>Posté le {{ $forums->created_at->format('d/m/Y') }} par <span class="badge badge-primary">{{ $forums->user->name }}</span></small>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-3">
        {{-- {{ $forums->links() }} --}}
    </div>
</div>
  {{-- <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('admin.forums.create') }}" class="btn btn-primary">nouveau forums</span></a>
                @include('layouts.partial.msg')
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">forums</h4>
                    </div>
                    <div class="card-content table-responsive">
                        <table id="table" class="table"  cellspacing="0" width="100%">
                            <thead class="text-primary">
                            <th>ID</th>
                            <th>Sujet</th>
                            <th>Enoncé</th>
                            <th>Image</th>
                            <th>public</th>
                            <th>Utilisateur</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($forums as $key=>$forums)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $forums->sujet}}</td>
                                        <td>{{ $forums->enonce}}</td>
                                        <td><img class="img-responsive img-thumbnail" src="{{ pulic_path('public/'.$forums->image) }}" style="height: 100px; width: 100px" alt="img"></td>
                                         <td>
                                            <input data-id="{{$forums->id}}" id="public" class="toggle-class " type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="public" data-off="close" {{ $forums->public ? 'checked' : '' }}>
                                         </td>
                                        <td>{{ $forums->user->name}}</td>
                                        <td>
                                            <a href="{{ route('admin.forums.edit', $forums->id) }}" class="btn btn-info btn-sm"><i class="material-icons">edit</i></a>

                                            <form id="delete-form-{{ $forums->id }}" action="{{ route('admin.forums.destroy', $forums->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $forums->id }}').submit();
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
</div> --}}
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
        $('#public').change(function() {
    var public = $(this).prop('checked') == true ? 1 : 0;
    var id = $(this).data('id');

    $.ajax({
        type: "GET",
        dataType: "json",
url: "{{ route('admin.changepublicforum') }}",
data: {'public': public, 'id': id},
success: function(data){
console.log(data.success)
}
});
})
})
</script>

            @endpush






