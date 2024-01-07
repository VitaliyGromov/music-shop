@extends('layouts.app')

@section('content')
    <div class="container">
        @if($brands->isEmpty())
            <x-common.empty-items>
                <x-slot name="title">
                    {{__('no brands added yet')}}
                </x-slot>
                <x-slot name="button">
                    <button class="btn btn-primary" data-bs-target="#brand-create" data-bs-toggle="modal">
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
                    @foreach($brands as $brand)
                        <tr>
                            <th scope="row">{{$brand->id}}</th>
                            <td>{{$brand->name}}</td>
                            <td>
                                <button class="btn btn-primary" data-bs-target="#brand-edit-{{$brand->id}}" data-bs-toggle="modal">
                                    {{__('Edit')}}
                                </button>
                            </td>
                            <td>
                                <x-common.delete-form route="{{route('admin.brands.destroy', $brand->id)}}"/>
                            </td>
                        </tr>
                        <x-brands.edit :brand="$brand"/>
                    @endforeach
                    </tbody>
                </table>
                {{$brands->links()}}
                <div class="row">
                    <div class="col-1">
                        <button class="btn btn-primary" data-bs-target="#brand-create" data-bs-toggle="modal">
                            {{__('Add')}}
                        </button>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <x-brands.create/>
@endsection
