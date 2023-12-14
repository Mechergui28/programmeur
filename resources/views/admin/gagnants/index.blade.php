
@extends('layouts.app')

@role(['admin','manager'])
@section('title','gagnant')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush
  @section('content')
  <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('admin.gagnants.create') }}" class="btn btn-primary">nouveau gagnant</span></a>
                @include('layouts.partial.msg')
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">gagnants</h4>
                    </div>
                    <div class="card-content table-responsive">
                        <table id="table" class="table"  cellspacing="0" width="100%">
                            <thead class="text-primary">
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Rang</th>
                            <th>Prix</th>
                            <th>Evénement</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($gagnants as $key=>$gagnant)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $gagnant->user->name}}</td>
                                        <td>{{ $gagnant->rang}}</td>

                                        <td>{{ $gagnant->prix}}</td>
                                        <td>{{ $gagnant->evenement->titre}}</td>
                                        <td>
                                            <a href="{{ route('admin.gagnants.edit', $gagnant->id) }}" class="btn btn-info btn-sm"><i class="material-icons">edit</i></a>

                                            <form id="delete-form-{{ $gagnant->id }}" action="{{ route('admin.gagnants.destroy', $gagnant->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $gagnant->id }}').submit();
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
@section('title','gagnant')

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
                        <h4 class="title">gagnants</h4>
                    </div>
                    <div class="card-content table-responsive">
                        <table id="table" class="table"  cellspacing="0" width="100%">
                            <thead class="text-primary">
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Rang</th>
                            <th>Prix</th>
                            <th>Evénement</th>
                            </thead>
                            <tbody>
                                @foreach($gagnants as $key=>$gagnant)
                                @can('view' ,$gagnant)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $gagnant->user->name}}</td>
                                        <td>{{ $gagnant->rang}}</td>
                                        <td>{{ $gagnant->prix}}</td>
                                        <td>{{ $gagnant->evenement->titre}}</td>
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






