@extends('layouts.admin')

@section('header')
@push('css')
<link href="{{URL::to('css/style.css') }}" rel="stylesheet">

@endpush
@endsection

@section('content')
<section id="forum" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
    <h1>Forums <br></h1>
    <h2>Les Forums disponible.</h2>
    {{-- <a href="#" class="btn-get-started">Get Started</a> --}}
    </div>
</section>
@section('header')
@push('css')
<link href="{{URL::to('css/style.css') }}" rel="stylesheet">

@endpush
@endsection
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.partial.msg')
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Modifier forum</h4>
                    </div>
                    <div class="card-content">
                        <form  action="{{ route('admin.forums.update',$forums->id) }}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Sujet</label>
                                        <input type="text" class="form-control" name="sujet" value="{{$forums->sujet}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Enonce</label>
                                        <input type="text" class="form-control" name="enonce" value="{{$forums->enonce}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                        <label class="control-label">Image</label>
                                        <input type="file" name="image">
                                </div>
                            </div>


                                <div class="row" style="display: none;">
                                    <label class="control-label">Utilisateurs</label>
                                    <input class="form-check-input" type="text" >{{ auth()->user()->id}}</label>
                                </div>
                                <div class="row" >
                                    <label class="control-label">Public</label>
                                <input data-id="{{$forums->id}}" id="public" class="toggle-class " type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="public" data-off="close" {{ $forums->public ? 'checked' : '' }}>
                                </div>
                                <div class="row">
                                    <label class="control-label">Categorie</label>
                                    <select class="form-control"  name="categorie_id" autocomplete="categorie">
                                        @foreach ($categories as $categorie )
                                        <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                        @endforeach
                                     </select>
                                </div>
                            <a href="{{ route('admin.forums.index') }}" class="btn btn-light">retour</a>
                            <button type="submit" class="get-started-btn">Enregistrer</button>
                        </form>
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
                $('#table').DataTable();
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    @endpush
