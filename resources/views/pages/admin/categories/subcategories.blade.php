@extends('layouts.app')

@section('content')
    <div class="container">
        <x-categories.page-header :category="$category"/>
        @if($category->subcategories->isEmpty())
            <x-common.empty-items>
                <x-slot name="title">
                    {{__('no subcategories added yet for category ')}} {{$category->name}}
                </x-slot>
                <x-slot name="button">
                    <button class="btn btn-primary" data-bs-target="#subcategory-create" data-bs-toggle="modal">
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
                    @foreach($category->subcategories as $subcategory)
                        <tr>
                            <th>{{$subcategory->id}}</th>
                            <td>{{$subcategory->name}}</td>
                            <td>
                                <button class="btn btn-primary" data-bs-target="#subcategory-edit-{{$subcategory->id}}" data-bs-toggle="modal">
                                    {{__('Edit')}}
                                </button>
                            </td>
                            <td>
                                <x-common.delete-form route="{{{route('admin.subcategories.destroy', $subcategory->id)}}}"/>
                            </td>
                        </tr>
                        <x-subcategories.edit :category="$category" :subcategory="$subcategory"/>
                    @endforeach
                    </tbody>
                </table>
                {{$subcategories->links()}}
                <div class="row">
                    <div class="col-1">
                        <button class="btn btn-primary" data-bs-target="#subcategory-create" data-bs-toggle="modal">
                            {{__('Add')}}
                        </button>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <x-subcategories.create :category="$category"/>
@endsection
