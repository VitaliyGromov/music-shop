@extends('layouts.app')

@section('content')
    <div class="container">
        @if($users->isEmpty())
            <x-empty-items>
                <x-slot name="title">
                    {{__('Пока не добавлено ни одного пользователя')}}
                </x-slot>
                <x-slot name="button">
                    <button class="btn btn-primary" data-bs-target="#user-create" data-bs-toggle="modal">
                        {{__('Add')}}
                    </button>
                </x-slot>
            </x-empty-items>
        @else
            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">{{__('id')}}</th>
                        <th scope="col">{{__('Name')}}</th>
                        <th scope="col">{{__('Lastname')}}</th>
                        <th scope="col">{{__('Middlename')}}</th>
                        <th scope="col">{{__('email')}}</th>
                        <th scope="col">{{__('active')}}</th>
                        <th scope="col">{{__('Role')}}</th>
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
                                <button class="btn btn-primary" data-bs-target="#user-edit-{{$user->id}}" data-bs-toggle="modal">
                                    {{__('Edit')}}
                                </button>
                            </td>
                            <td>
                                <form action="{{route('admin.users.destroy', $user->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">
                                        {{__('Delete')}}
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <x-modal.index id="user-edit-{{$user->id}}">
                            <x-slot name="title">
                                {{__('Update user')}} {{$user->name}} {{$user->lastname}}
                            </x-slot>
                            <x-slot name="body">
                                <form action="{{route('admin.users.update', $user->id)}}" id="update-user-{{$user->id}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name" class="col-form-label">{{__('Name')}}</label>
                                        <input type="text" name="name" class="form-control" value="{{$user->name}}" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname" class="col-form-label">{{__('Lastname')}}</label>
                                        <input type="text" name="lastname" class="form-control" value="{{$user->lastname}}" id="lastname">
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname" class="col-form-label">{{__('Middlename')}}</label>
                                        <input type="text" name="middlename" class="form-control" value="{{$user->middlename}}" id="lastname">
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-form-label">{{__('Email')}}</label>
                                        <input type="email" name="email" class="form-control" value="{{$user->email}}" id="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="role" class="col-form-label">{{__('Role')}}</label>
                                        <select id="role" name="role_id" class="form-control">
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-check mt-2">
                                        <label for="active" class="form-check-label">{{__('Active')}}</label>
                                        <input class="form-check-input" type="checkbox" name="active" value="" id="active" @if($user->active) checked @endif>
                                    </div>
                                </form>
                            </x-slot>
                            <x-slot name="footer">
                                <button type="submit" form="update-user-{{$user->id}}" class="btn btn-primary">{{__('Update')}}</button>
                            </x-slot>
                        </x-modal.index>
                    @endforeach
                    </tbody>
                </table>
                {{$users->links()}}
                <div class="row">
                    <div class="col-1">
                        <button class="btn btn-primary" data-bs-target="#user-create" data-bs-toggle="modal">
                            {{__('Add')}}
                        </button>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <x-modal.index id="user-create">
        <x-slot name="title">
            {{__('Create new user')}}
        </x-slot>
        <x-slot name="body">
            <form action="{{route('admin.users.store')}}" id="create-user" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name" class="col-form-label">{{__('Name')}}</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-form-label">{{__('Lastname')}}</label>
                    <input type="text" name="lastname" class="form-control" id="lastname">
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-form-label">{{__('Middlename')}}</label>
                    <input type="text" name="middlename" class="form-control" id="lastname">
                </div>
                <div class="form-group">
                    <label for="email" class="col-form-label">{{__('Email')}}</label>
                    <input type="email" name="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="role" class="col-form-label">{{__('Role')}}</label>
                    <select id="role" name="role_id" class="form-control">
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </x-slot>
        <x-slot name="footer">
            <button type="submit" form="create-user" class="btn btn-primary">{{__('Create')}}</button>
        </x-slot>
    </x-modal.index>
@endsection
