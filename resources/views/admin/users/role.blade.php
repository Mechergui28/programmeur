@extends('layouts.app')

@section('title','Role')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush

@section('content')
        <div class="py-12 w-full" style="overflow: hidden;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">

                <div class="flex flex-col p-2  bg-slate-100" style="margin-left: 2rem; margin-top:6rem;">
                    <table class="table">
                        <tbody>
                            <tr>
                            <th>
                                <h5><b>Nom d'utilisateur</b></h5>
                            </th>
                            <th>
                                <p>{{ $user->name }}</p>
                            </th>
                            </tr>
                            <tr>
                                <th>
                                    <h5><b> Email</b></h5>
                                </th>
                                <th>
                                    <p>{{ $user->email }}</p>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-6 p-2 bg-slate-100">
                    <h2 class="text-2xl font-semibold" style="margin: 2rem; ">Rôles</h2>
                    <div class="flex space-x-2 mt-4 p-2">
                        @if ($user->roles)
                            <table class="table" style="margin: 2rem;">
                                <tbody>
                                    @foreach ($user->roles as $user_role)

                                    <tr>
                                    <th>
                                        <h5>{{ $user_role->name }}</h5>
                                    </th>
                                    <th>
                                        <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST"
                                    action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id]) }}"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                        <button class="btn btn-danger btn-sm"><i class="material-icons">delete</i></button>
                                    </form>
                                    </th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>


                        @endif
                    </div>
                    <div class="max-w-xl mt-6">
                        <form method="POST" action="{{ route('admin.users.roles', $user->id) }}" style="display: flex; flex-direction:row; margin:2rem;">
                            @csrf
                            <div class="sm:col-span-6" class="form-group">
                                <label for="role" class="block text-sm font-medium text-gray-700">RôleS</label>
                                <select id="role" name="role" autocomplete="role-name" class="form-control"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                    <button type="submit"
                    class="btn btn-sm btn-secondary" style="margin-top: 2rem; margin-left: 2rem;"><i class="material-icons">admin_panel_settings</i></button>
                    </form>
                    </div>
                </div>
               {{--  <div class="mt-6 p-2 bg-slate-100">
                    <h2 class="text-2xl font-semibold">Permissions</h2>
                    <div class="flex space-x-2 mt-4 p-2">
                        @if ($user->permissions)
                            @foreach ($user->permissions as $user_permission)
                                <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST"
                                    action="{{ route('admin.users.permissions.revoke', [$user->id, $user_permission->id]) }}"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">{{ $user_permission->name }}</button>
                                </form>
                            @endforeach
                        @endif
                    </div>
                    <div class="max-w-xl mt-6">
                        <form method="POST" action="{{ route('admin.users.permissions', $user->id) }}">
                            @csrf
                            <div class="sm:col-span-6">
                                <label for="permission"
                                    class="block text-sm font-medium text-gray-700">Permission</label>
                                <select id="permission" name="permission" autocomplete="permission-name"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach ($permissions as $permission)
                                        <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                    </div>
                    <div class="sm:col-span-6 pt-5">
                        <button type="submit"
                            class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Assign</button>
                    </div>
                    </form>

                </div> --}}
            </div>

        </div>
    </div>
    </div>
@endsection
