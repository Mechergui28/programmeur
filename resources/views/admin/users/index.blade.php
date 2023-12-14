@extends('layouts.app')

@section('title','Utilisateur')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush

@section('content')
@role('admin')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.partial.msg')
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Users</h4>
                    </div>
                    <div class="card-content table-responsive">
                        <table id="table" class="table"  cellspacing="0" width="100%">
                            <thead class="text-primary">
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($users  as $users )

                                    <tr>
                                        <td>{{ $users->name }}</td>
                                        <td>{{ $users->email }}</td>
                                        <td>
                                          <a href="{{ route('admin.users.show', $users->id) }}" class="px-4 py-2 btn  btn-secondary btn-sm"><i class="material-icons">admin_panel_settings</i></a>
                                    @can('update',$users)

                                            <a href="{{ route('admin.users.edit', $users->id) }}" class="btn btn-info btn-sm"><i class="material-icons">edit</i></a>
                                    @endcan

                                            <form id="delete-form-{{ $users->id }}" action="{{ route('admin.users.destroy', $users->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $users->id }}').submit();
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
@endrole
@role('user')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.partial.msg')
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">users</h4>
                    </div>
                    <div class="card-content table-responsive">
                        <table id="table" class="table"  cellspacing="0" width="100%">
                            <thead class="text-primary">
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($users  as $users )
                                @can('view',$users)

                                    <tr>
                                        <td>{{ $users->name }}</td>
                                        <td>{{ $users->email }}</td>

                                        <td>
                                          <a href="{{ route('admin.users.show', $users->id) }}" class="px-4 py-2 btn  btn-secondary btn-sm"><i class="material-icons">admin_panel_settings</i></a>
                                    @can('update',$users)

                                            <a href="{{ route('admin.users.edit', $users->id) }}" class="btn btn-info btn-sm"><i class="material-icons">edit</i></a>
                                    @endcan

                                            <form id="delete-form-{{ $users->id }}" action="{{ route('admin.users.destroy', $users->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $users->id }}').submit();
                                            }else {
                                                event.preventDefault();
                                                    }"><i class="material-icons">delete</i></button>
                                        </td>
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
@endrole
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



    {{-- <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Name</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Email</th>
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        {{ $user->name }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        {{ $user->email }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex justify-end">
                                                        <div class="flex space-x-2">
                                                            <a href="{{ route('admin.users.show', Auth::user()->id) }}"
                                                                class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">users</a>
                                                            <form
                                                                class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md"
                                                                method="POST"
                                                                action="{{ route('admin.users.destroy', Auth::user()->id) }}"
                                                                onsubmit="return confirm('Are you sure?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
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
    </div>
@endsection --}}
