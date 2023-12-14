
@extends('layouts.app')

@section('title','Formation')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush


  @section('content')


  <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('admin.formations.create') }}" class="btn btn-primary">nouveau formations</span></a>
                @include('layouts.partial.msg')
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">formations</h4>
                    </div>
                    <div class="card-content table-responsive">
                        <table id="table" class="table"  cellspacing="0" width="100%">
                            <thead class="text-primary">
                            <th>ID</th>
                            <th>titre</th>
                            <th>description</th>
                            <th>utilisateur</th>
                            <th>prix</th>
                            <th>photo</th>
                            <th>motcle</th>
                            <th>inscription</th>
                            <th>public</th>
                            <th>Etat inscription </th>
                            <th>etat </th>
                            <th>contenue </th>
                            <th>durée </th>
                            <th>prérequie </th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($formations as $key=>$formations)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $formations->titre}}</td>
                                        <td>{{ $formations->description}}</td>
                                        <td>{{ $formations->user->name}}</td>
                                        <td>{{ $formations->prix}}</td>
                                        <td><img class="img-responsive img-thumbnail" src="{{asset('public/'.$formations->image)}}" style="height: 100px; width: 100px" alt=""></td>
                                        <td>{{ $formations->motcle}}</td>
                                        <td>
                                            <input data-id="{{$formations->id}}" id="avecinscription{{$formations->id}}" class="avecinscription toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="public" data-off="close" {{ $formations->avecinscription ? 'checked' : '' }}>
                                         </td>
                                        <td>
                                            <input data-id="{{$formations->id}}" id="public" class=" public toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="public" data-off="close" {{ $formations->public ? 'checked' : '' }}>
                                         </td>
                                         <td>
                                            <input data-id="{{$formations->id}}" id="etatinscription" class="etatinscription toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="public" data-off="close" {{ $formations->etatinscription ? 'checked' : '' }}>
                                         </td>
                                         <td>
                                            <input data-id="{{$formations->id}}" id="etat" class="etat toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="public" data-off="close" {{ $formations->etat ? 'checked' : '' }}>
                                         </td>
                                        <td>{{ $formations->contenu}}</td>

                                        <td>{{ $formations->dure}}</td>
                                        <td>{{ $formations->prerequis}}</td>

                                        <td>
                                            <a href="{{ route('admin.formations.edit', $formations->id) }}" class="btn btn-info btn-sm"><i class="material-icons">edit</i></a>

                                            <form id="delete-form-{{ $formations->id }}" action="{{ route('admin.formations.destroy', $formations->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $formations->id }}').submit();
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
                {{-- <script>
                    $(document).ready(function() {
                        $('#table').DataTable();
                    } );
                </script> --}}
                <script>
                        $(function() {
                            $('.public').change(function() {
                        var public = $(this).prop('checked') == true ? 1 : 0;
                        var id = $(this).data('id');

                        $.ajax({
                            type: "GET",
                            dataType: "json",
                    url: "{{ route('admin.changestatus') }}",
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
     $('.avecinscription').change(function() {
         var avecinscription = $(this).prop('checked') == true ? 1 : 0;
         var id = $(this).data('id');

         $.ajax({
             type: "GET",
             dataType: "json",
             url: "{{ route('admin.inscription') }}",
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
     $('.etatinscription').change(function() {
         var etatinscription = $(this).prop('checked') == true ? 1 : 0;
         var id = $(this).data('id');

         $.ajax({
             type: "GET",
             dataType: "json",
             url: "{{ route('admin.etatinscription') }}",
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
                 url: "{{ route('admin.etat') }}",
                 data: {'etat': etat, 'id': id},
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
/*
    $(".per_phy").click(function() {
      var peb = $('#step_5_associe_count').val();
    var de = peb.toString();
      $('#personne_physique'+de).each(function(){
      $('#personne_physique'+ de + ' div.form-group').removeClass('has-error');
        });
    */
 </script>
            @endpush






