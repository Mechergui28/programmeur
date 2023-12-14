
@extends('layouts.app')

@section('title',' Formation partie')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush


  @section('content')
  <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('admin.formationpartie.create') }}" class="btn btn-primary">nouveau formations</span></a>
                @include('layouts.partial.msg')
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">formations</h4>
                    </div>
                    <div class="card-content table-responsive">
                        <table id="table" class="table"  cellspacing="0" width="100%">
                            <thead class="text-primary">
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Rang</th>
                            <th>Video</th>
                            <th>Fichier</th>
                            <th>Formation</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($formationpartie as $key=>$formationpartie)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $formationpartie->titre}}</td>
                                        <td>{{ $formationpartie->description}}</td>
                                        <td>{{ $formationpartie->rang}}</td>
                                        <td>
                                            <video class="img-responsive img-thumbnail" style="height: 100px; width: 100px">
                                                <source src="{{ asset('Video/'.$formationpartie->video)}}" type="video/mp4">
                                              </video>
                                        </td>
                                        <td><a href="{{ route('admin.formationdownload',$formationpartie->fichier) }}">{{$formationpartie->fichier}}</a> </td>

                                        <td>{{ $formationpartie->formation_id}}</td>
                                        <td>
                                            <a href="{{ route('admin.formationpartie.edit', $formationpartie->id) }}" class="btn btn-info btn-sm"><i class="material-icons">edit</i></a>

                                            <form id="delete-form-{{ $formationpartie->id }}" action="{{ route('admin.formationpartie.destroy', $formationpartie->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $formationpartie->id }}').submit();
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
                            $('#public').change(function() {
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
     $('#avecinscription').change(function() {
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
     $('#etatinscription').change(function() {
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
         $('#etat').change(function() {
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
 </script>
            @endpush






