@extends('layouts.app')

@section('content')
    <div class="container">
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
                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td>{{$category->name}}</td>
                        <td>{{$category->lastname}}</td>
                        <td>{{$category->middlename ?? '-'}}</td>
                        <td>{{$category->email}}</td>
                        <td>{{$category->active ? 'active' : 'disabled'}}</td>
                        <td>{{$category->getRoleNames()->first()}}</td>
                        <td>
                            <button class="btn btn-primary" data-bs-target="#category-edit-{{$category->id}}" data-bs-toggle="modal">
                                {{__('Edit')}}
                            </button>
                        </td>
                        <td>
                            <form action="{{route('admin.categories.destroy', $category->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">
                                    {{__('Delete')}}
                                </button>
                            </form>
                        </td>
                    </tr>
                    <x-modal.index id="category-edit-{{$category->id}}">
                        <x-slot name="title">
                            {{__('Update category')}} {{$category->name}} {{$category->lastname}}
                        </x-slot>
                        <x-slot name="body">
                            <form action="{{route('admin.categorys.update', $category->id)}}" id="update-category-{{$category->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name" class="col-form-label">{{__('Name')}}</label>
                                    <input type="text" name="name" class="form-control" value="{{$category->name}}" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-form-label">{{__('Lastname')}}</label>
                                    <input type="text" name="lastname" class="form-control" value="{{$category->lastname}}" id="lastname">
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-form-label">{{__('Middlename')}}</label>
                                    <input type="text" name="middlename" class="form-control" value="{{$category->middlename}}" id="lastname">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-form-label">{{__('Email')}}</label>
                                    <input type="email" name="email" class="form-control" value="{{$category->email}}" id="email">
                                </div>
                                <div class="form-check mt-2">
                                    <label for="active" class="form-check-label">{{__('Active')}}</label>
                                    <input class="form-check-input" type="checkbox" name="active" value="" id="active" @if($category->active) checked @endif>
                                </div>
                            </form>
                        </x-slot>
                        <x-slot name="footer">
                            <button type="submit" form="update-category-{{$category->id}}" class="btn btn-primary">{{__('Update')}}</button>
                        </x-slot>
                    </x-modal.index>
                @endforeach
                </tbody>
            </table>
            {{$categories->links()}}
            <div class="row">
                <div class="col-1">
                    <button class="btn btn-primary" data-bs-target="#category-create" data-bs-toggle="modal">
                        {{__('Add')}}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <x-modal.index id="category-create">
        <x-slot name="title">
            {{__('Create new category')}}
        </x-slot>
        <x-slot name="body">
            <form action="{{route('admin.categories.store')}}" id="create-category" method="POST">
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
            </form>
        </x-slot>
        <x-slot name="footer">
            <button type="submit" form="create-category" class="btn btn-primary">{{__('Create')}}</button>
        </x-slot>
    </x-modal.index>
@endsection
