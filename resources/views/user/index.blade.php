@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <a href="{{ route('admin.user.create') }}" class="btn btn-success">Create User</a>
                <div class="col-lg-8 col-md-8 center-table">
                    <table class="table table-bordered table-responsive-md table-responsive-lg"
                           style="border-collapse: collapse">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Job</th>
                            <th scope="col">Role</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->employee }}</td>
                                <td>{{ $user->role->name }}</td>
                                <td>
                                    <div class="input-group">
                                        @can('user.update')
                                            <a href="{{route('admin.user.edit', $user)}}">
                                                <svg class="c-icon c-icon-lg">
                                                    <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-cog')}}"></use>
                                                </svg>
                                            </a>
                                        @endcan
                                        @if(!$user->deleted_at)
                                            @can('user.delete')
                                                <form method="post" action="{{route('admin.user.destroy', $user)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-borderless">
                                                        <svg class="c-icon c-icon-lg">
                                                            <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-delete')}}"></use>
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endcan
                                        @else
                                            @can('user.restore')
                                                <a href="{{route('admin.user.restore', $user)}}">
                                                    <svg class="c-icon c-icon-lg">
                                                        <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-recycle')}}"></use>
                                                    </svg>
                                                </a>
                                            @endcan
                                        @endif
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
@endsection