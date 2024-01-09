@extends('layouts.app')

@section('content')
    <div class="container">
        @if($users->isEmpty())
            <x-common.empty-items>
                <x-slot name="title">
                    {{__('no users added yet')}}
                </x-slot>
                <x-slot name="button">
                    <button class="btn btn-primary" data-bs-target="#user-create" data-bs-toggle="modal">
                        {{__('Add')}}
                    </button>
                </x-slot>
            </x-common.empty-items>
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
                                <x-common.delete-form route="{{route('admin.users.destroy', $user->id)}}" modalId="{{$user->id}}"/>
                            </td>
                        </tr>
                        <x-users.edit :user="$user"/>
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
    <x-users.create/>
@endsection
