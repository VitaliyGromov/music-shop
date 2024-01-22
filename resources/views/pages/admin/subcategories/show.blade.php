@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>
            {{$subcategory->name}}
        </h1>
        @if($subcategory->characteristics->isEmpty())
            <x-common.empty-items>
                <x-slot name="title">
                    {{__('No characteristic added yet')}}
                </x-slot>
                <x-slot name="button">
                    <button class="btn btn-primary" data-bs-target="#category-create" data-bs-toggle="modal">
                        {{__('Add')}}
                    </button>
                </x-slot>
            </x-common.empty-items>
        @else
            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">{{__('Name')}}</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subcategory->characteristics as $characteristic)
                        <tr>
                            <td>{{$characteristic->name}}</td>
                            <td>
                                <button class="btn btn-primary" data-bs-target="#category-edit-{{$category->id}}" data-bs-toggle="modal">
                                    {{__('Edit')}}
                                </button>
                            </td>
                            <td>
                                <x-common.delete-form route="{{route('admin.categories.destroy', $category->id)}}" modalId="{{$category->id}}"/>
                            </td>
                        </tr>
                        <x-categories.edit :category="$category"/>
                    @endforeach
                    </tbody>
                </table>
                {{$characteristic->links()}}
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
@endsection
