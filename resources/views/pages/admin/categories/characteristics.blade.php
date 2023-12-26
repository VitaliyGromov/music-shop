@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <h1 class="h1">{{$category->name}}</h1>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="btn btn-secondary me-3" href="{{route('admin.subcategories.index', $category->id)}}">{{__('Subcategories')}}</a>
            <a class="btn btn-secondary" href="{{route('admin.characteristics.index', $category->id)}}">{{__('Characteristics')}}</a>
        </nav>
        @if($category->characteristics->isEmpty())
            <x-empty-items>
                <x-slot name="title">
                    {{__('Пока не добавлено ни одной характеристики для категории')}} {{$category->name}}
                </x-slot>
                <x-slot name="button">
                    <button class="btn btn-primary" data-bs-target="#characteristic-create" data-bs-toggle="modal">
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
                    @foreach($category->characteristics as $characteristic)
                        <tr>
                            <th>{{$characteristic->id}}</th>
                            <td>{{$characteristic->name}}</td>
                            <td>
                                <button class="btn btn-primary">
                                    {{__('Edit')}}
                                </button>
                            </td>
                            <td>
                                <form action="{{route('admin.characteristics.destroy', $characteristic->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">
                                        {{__('Delete')}}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$characteristics->links()}}
                <div class="row">
                    <div class="col-1">
                        <button class="btn btn-primary" data-bs-target="#characteristic-create" data-bs-toggle="modal">
                            {{__('Add')}}
                        </button>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <x-modal.index id="characteristic-create">
        <x-slot name="title">
            {{__('Create new characteristic')}}
        </x-slot>
        <x-slot name="body">
            <form action="{{route('admin.characteristics.store')}}" id="create-characteristic" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name" class="col-form-label">{{__('Name')}}</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <input type="hidden" name="category_id" value="{{$category->id}}">
            </form>
        </x-slot>
        <x-slot name="footer">
            <button type="submit" form="create-characteristic" class="btn btn-primary">{{__('Create')}}</button>
        </x-slot>
    </x-modal.index>
@endsection
