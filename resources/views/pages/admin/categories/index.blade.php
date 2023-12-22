@extends('layouts.app')

@section('content')
    <div class="container">
        @if($categories->isEmpty())
            <x-empty-items>
                <x-slot name="title">
                    {{__('Пока не добавлено ни одной категории')}}
                </x-slot>
                <x-slot name="button">
                    <button class="btn btn-primary" data-bs-target="#category-create" data-bs-toggle="modal">
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
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <th scope="row">
                                <a href="{{route('admin.categories.show', $category->id)}}">{{$category->id}}</a>
                            </th>
                            <td>{{$category->name}}</td>
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
                                <form action="{{route('admin.categories.update', $category->id)}}" id="update-category-{{$category->id}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name" class="col-form-label">{{__('Name')}}</label>
                                        <input type="text" name="name" class="form-control" value="{{$category->name}}" id="name">
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
        @endif
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
            </form>
        </x-slot>
        <x-slot name="footer">
            <button type="submit" form="create-category" class="btn btn-primary">{{__('Create')}}</button>
        </x-slot>
    </x-modal.index>
@endsection
