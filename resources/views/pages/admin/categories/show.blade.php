@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <h1 class="h1">{{$category->name}}</h1>
        </div>
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
                              <button class="btn btn-primary">
                                  {{__('Edit')}}
                              </button>
                          </td>
                          <td>
                              <button class="btn btn-danger">
                                  {{__('Delete')}}
                              </button>
                          </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
            {{$subcategories->links()}}
            <div class="row">
                <div class="col-1">
                    <button class="btn btn-primary" data-bs-target="#category-create" data-bs-toggle="modal">
                        {{__('Add')}}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <x-modal.index id="subcategory-create">
        <x-slot name="title">
            {{__('Create new subcategory')}}
        </x-slot>
        <x-slot name="body">
            <form action="{{route('admin.subcategories.store')}}" id="create-subcategory" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name" class="col-form-label">{{__('Name')}}</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <input type="hidden" name="category_id" value="{{$category->id}}">
            </form>
        </x-slot>
        <x-slot name="footer">
            <button type="submit" form="create-subcategory" class="btn btn-primary">{{__('Create')}}</button>
        </x-slot>
    </x-modal.index>
@endsection
