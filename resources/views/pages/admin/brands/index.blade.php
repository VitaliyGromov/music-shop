@extends('layouts.app')

@section('content')
    <div class="container">
        @if($brands->isEmpty())
            <x-empty-items>
                <x-slot name="title">
                    {{__('Пока не добавлено ни одного бренда')}}
                </x-slot>
                <x-slot name="button">
                    <button class="btn btn-primary" data-bs-target="#brand-create" data-bs-toggle="modal">
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
                                <form action="{{route('admin.brands.destroy', $brand->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">
                                        {{__('Delete')}}
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <x-modal.index id="brand-edit-{{$brand->id}}">
                            <x-slot name="title">
                                {{__('Update brand')}} {{$brand->name}}
                            </x-slot>
                            <x-slot name="body">
                                <form action="{{route('admin.brands.update', $brand->id)}}" id="update-brand-{{$brand->id}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name" class="col-form-label">{{__('Name')}}</label>
                                        <input type="text" name="name" class="form-control" value="{{$brand->name}}" id="name">
                                    </div>
                                </form>
                            </x-slot>
                            <x-slot name="footer">
                                <button type="submit" form="update-brand-{{$brand->id}}" class="btn btn-primary">{{__('Update')}}</button>
                            </x-slot>
                        </x-modal.index>
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
    <x-modal.index id="brand-create">
        <x-slot name="title">
            {{__('Create new brand')}}
        </x-slot>
        <x-slot name="body">
            <form action="{{route('admin.brands.store')}}" id="create-brand" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name" class="col-form-label">{{__('Name')}}</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
            </form>
        </x-slot>
        <x-slot name="footer">
            <button type="submit" form="create-brand" class="btn btn-primary">{{__('Create')}}</button>
        </x-slot>
    </x-modal.index>
@endsection
