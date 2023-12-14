@extends('layouts.app')

@section('title','Dashbord')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
<div class="col-3 col-md-6 col-sm-6">
    <div class="card card-stats">
        <div class="card-header" data-background-color="green">
            <i class="material-icons">supervisor_account</i>
        </div>
        <div class="card-content">
            <p class="category">Utilisateur</p>
            <h3 class="title">{{ $user }}</h3>
        </div>
        <div class="card-footer">
            <div class="stats">
                <i class="material-icons">date_range</i> <a href="{{ route('admin.users.index') }}">détails</a>
            </div>
        </div>
    </div>
</div>
<div class="col-3 col-md-6 col-sm-6">
    <div class="card card-stats">
        <div class="card-header" data-background-color="blue">
            <i class="material-icons"> fact_check</i>
        </div>
        <div class="card-content">
            <p class="category">Formations</p>
            <h3 class="title">{{ $formation }}</h3>
        </div>
        <div class="card-footer">
            <div class="stats">
                <i class="material-icons">update</i> {{ date('Y-m-d H:i:s') }}
            </div>
        </div>
    </div>
</div>
<div class="col-3 col-md-6 col-sm-6">
    <div class="card card-stats">
        <div class="card-header" data-background-color="blue">
            <i class="material-icons">chrome_reader_mode</i>
        </div>
        <div class="card-content">
            <p class="category">Annonces</p>
            <h3 class="title">{{ $annonce }}</h3>
        </div>
        <div class="card-footer">
            <div class="stats">
                <i class="material-icons">update</i> {{ date('Y-m-d H:i:s') }}
            </div>
        </div>
    </div>
</div>
    <div class="col-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="blue">
                <i class="material-icons">celebration</i>
            </div>
            <div class="card-content">
                <p class="category">Evénement</p>
                <h3 class="title">{{ $events }}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">update</i> {{ date('Y-m-d H:i:s') }}
                </div>
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
