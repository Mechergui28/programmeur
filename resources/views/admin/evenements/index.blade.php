
@extends('layouts.app')

@section('title','evenement')

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
                <a href="{{ route('admin.evenements.create') }}" class="btn btn-primary">nouveau evenement</span></a>
                @include('layouts.partial.msg')
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">evenement</h4>
                    </div>
                    <div class="card-content table-responsive">
                        <table id="table" class="table"  cellspacing="0" width="100%">
                            <thead class="text-primary">
                            <th>ID</th>
                            <th>titre</th>
                            <th>enonce</th>
                            <th>image</th>

                            <th>type </th>
                            <th>avecinscription </th>
                            <th>aveclimite </th>
                            <th>limite </th>
                            <th>etatinscription</th>
                            <th>public</th>
                            <th>etat</th>
                            <th>fichier</th>
                            <th>motcle</th>
                            <th>comite</th>
                            <th>programme</th>
                            <th>datedebut</th>
                            <th>datefin</th>
                            <th>user_id</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($evenements as $key=>$evenement)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $evenement->titre}}</td>
                                        <td>{{ $evenement->enonce}}</td>
                                        <td><img class="img-responsive img-thumbnail" src="{{asset('public/'.$evenement->image)}}" style="height: 100px; width: 100px" alt=""></td>

                                        <td>{{ $evenement->type}}</td>
                                        <td>
                                            <input data-id="{{$evenement->id}}" id="avecinscription" class="avecinscription toggle-class " type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="public" data-off="close" {{ $evenement->avecinscription ? 'checked' : '' }}>
                                         </td>
                                         <td>
                                            <input data-id="{{$evenement->id}}" id="aveclimite" class="aveclimite toggle-class " type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="public" data-off="close" {{ $evenement->aveclimite ? 'checked' : '' }}>
                                         </td>
                                        <td>{{ $evenement->limite}}</td>
                                         <td>
                                            <input data-id="{{$evenement->id}}" id="etatinscription" class="etatinscription toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="public" data-off="close" {{ $evenement->etatinscription ? 'checked' : '' }}>
                                         </td>
                                         <td>
                                            <input data-id="{{$evenement->id}}" id="public" class="public toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="public" data-off="close" {{ $evenement->public ? 'checked' : '' }}>
                                         </td>
                                         <td>
                                            <input data-id="{{$evenement->id}}" id="etat" class="etat toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="public" data-off="close" {{ $evenement->etat ? 'checked' : '' }}>
                                         </td>
                                        <td><a href="{{ route('admin.Download',$evenement->fichier) }}">{{$evenement->fichier}}</a> </td>
                                        <td>{{ $evenement->motcle}}</td>
                                        <td>{{ $evenement->comite}}</td>
                                        <td>{{ $evenement->programme}}</td>
                                        <td>{{ $evenement->datedebut}}</td>
                                        <td>{{ $evenement->datefin}}</td>
                                        <td>{{ $evenement->user->name}}</td>

                                        <td>
                                            <a href="{{ route('admin.evenements.edit', $evenement->id) }}" class="btn btn-info btn-sm"><i class="material-icons">edit</i></a>

                                            <form id="delete-form-{{ $evenement->id }}" action="{{ route('admin.evenements.destroy', $evenement->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $evenement->id }}').submit();
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
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
            {{-- <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> --}}
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
    $('.avecinscription').change(function() {
        var avecinscription = $(this).prop('checked') == true ? 1 : 0;
        var id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{ route('admin.eventavecinscription') }}",
            data: {'avecinscription': avecinscription, 'id': id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })
                  </script>
                   <script>
                    $(function() {
     $('.aveclimite').change(function() {
         var aveclimite = $(this).prop('checked') == true ? 1 : 0;
         var id = $(this).data('id');

         $.ajax({
             type: "GET",
             dataType: "json",
             url: "{{ route('admin.eventaveclimite') }}",
             data: {'aveclimite': aveclimite, 'id': id},
             success: function(data){
               console.log(data.success)
             }
         });
     })
   })
                   </script>
                   <script>
                    $(function() {
     $('.etatinscription').change(function() {
         var etatinscription = $(this).prop('checked') == true ? 1 : 0;
         var id = $(this).data('id');

         $.ajax({
             type: "GET",
             dataType: "json",
             url: "{{ route('admin.eventetatinscription') }}",
             data: {'etatinscription': etatinscription, 'id': id},
             success: function(data){
               console.log(data.success)
             }
         });
     })
   })
                   </script>
                    <script>
                        $(function() {
         $('.etat').change(function() {
             var etat = $(this).prop('checked') == true ? 1 : 0;
             var id = $(this).data('id');

             $.ajax({
                 type: "GET",
                 dataType: "json",
                 url: "{{ route('admin.eventetat') }}",
                 data: {'etat': etat, 'id': id},
                 success: function(data){
                   console.log(data.success)
                 }
             });
         })
       })
                       </script>
                       <script>
                        $(function() {
         $('.public').change(function() {
             var public = $(this).prop('checked') == true ? 1 : 0;
             var id = $(this).data('id');

             $.ajax({
                 type: "GET",
                 dataType: "json",
                 url: "{{ route('admin.eventpublic') }}",
                 data: {'public': public, 'id': id},
                 success: function(data){
                   console.log(data.success)
                 }
             });
         })
       })
                       </script>


            @endpush




