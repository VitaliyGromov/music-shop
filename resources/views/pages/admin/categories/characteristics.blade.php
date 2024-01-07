@extends('layouts.app')

@section('content')
    <div class="container">
        <x-categories.page-header :category="$category"/>
        @if($category->characteristics->isEmpty())
            <x-common.empty-items>
                <x-slot name="title">
                    {{__('no characteristics added yet for category ')}} {{$category->name}}
                </x-slot>
                <x-slot name="button">
                    <button class="btn btn-primary" data-bs-target="#characteristic-create" data-bs-toggle="modal">
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
                                <x-characteristics.edit :characteristic="$characteristic" :category="$category"/>
                                <button class="btn btn-primary" data-bs-target="#characteristic-edit-{{$characteristic->id}}" data-bs-toggle="modal">
                                    {{__('Edit')}}
                                </button>
                            </td>
                            <td>
                                <x-common.delete-form route="{{route('admin.characteristics.destroy', $characteristic->id)}}"/>
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
    <x-characteristics.create :category="$category"/>
@endsection
