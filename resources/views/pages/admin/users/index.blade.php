@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Middlename</th>
                    <th scope="col">email</th>
                    <th scope="col">active</th>
                    <th scope="col">Role</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->lastname}}</td>
                            <td>{{$user->middlename ?? '-'}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->active ? 'active' : 'disabled'}}</td>
                            <td>{{$user->getRoleNames()->first()}}</td>
                            <td>
                                <button class="btn btn-primary">
                                    {{__('Edit')}}
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-danger">
                                    {{__('Delete')}}
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-1">
                    <button class="btn btn-primary">
                        {{__('Add')}}
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
