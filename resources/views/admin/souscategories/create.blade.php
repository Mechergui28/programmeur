@extends('layouts.admin')
@section('header')
@push('css')
<link href="{{URL::to('css/admin.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endpush
@endsection
@section('content')
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{ route('admin.souscategories.index') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Retour</a>
                </div>
                <div class="flex flex-col">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                        <form method="POST" action="{{ route('admin.souscategories.store') }}">
                            @csrf
                          <div class="sm:col-span-6">
                            <label for="nom" class="block text-sm font-medium text-gray-700"> nom </label>
                            <div class="mt-1">
                              <input type="text" id="nom" name="nom" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('nom') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror


                          <div class="sm:col-span-6">
                                <label for="categorie_id"
                                    class="block text-sm font-medium text-gray-700">categorie</label>
                                <select id="categorie_id" name="categorie_id" autocomplete="categorie_id-name"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach ($categories as $categorie)
                                        <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                          <div class="sm:col-span-6 pt-5">
                            <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Ajouter</button>
                          </div>
                        </form>
                      </div>

                </div>

            </div>
        </div>
    </div>
@endsection
