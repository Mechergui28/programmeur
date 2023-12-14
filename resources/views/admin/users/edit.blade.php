@extends('layouts.app')

@section('title','Modifier profil')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="card-title">Modifier Profil</h4>
                        <p class="card-category"></p>
                    </div>
                    <div class="card-body">
                         <form method="POST" action="{{ route('admin.users.update', $user->id) }}" >
                            @csrf
                            @method('PUT')
        <div class="row">
        <div class="col-md-3">
        <div class="form-group">
        <label class="bmd-label-floating">Nom</label>
        <input type="text" name="name" value="{{$user->name}}" class="form-control">
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
        <label class="bmd-label-floating">Email </label>
        <input type="email" name="email" value="{{$user->email}}" class="form-control">
        </div>
        </div>
        </div>

        <div class="row">
        <div class="col-md-6">
        <div class="form-group">
        <label class="bmd-label-floating"> Mot de passe</label>
        <input type="password" name="password" value="{{$user->password}}"  class="form-control" >
        </div>
        </div>
        </div>

        <button type="submit" class="btn btn-primary pull-right">Modifier Profil</button>
        <div class="clearfix"></div>
        </form>
        </div>
        </div>
        </div>
        <div class="col-md-4">
        <div class="card card-profile">
        <div class="card-avatar">
        <a href="javascript:;">
        <img class="img" src=" {{$user->avatar}}" alt="{{$user->name}}"/>
        </a>
        </div>
        <div class="card-body">
        <h6 class="card-category text-gray">{{ Auth::user()->name }}</h6>
        <h4 class="card-title">{{ Auth::user()->name }}</h4>
        {{-- <p class="card-description">
        Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
        </p> --}}
        {{-- <a href="javascript:;" class="btn btn-primary btn-round">Follow</a> --}}
        </div>
        </div>
        </div>
        </div>
        </div>
    </div>

@endsection




