@extends('layouts.app')

@section('content')
    <div class="container">
        @if($products->isEmpty())
            <x-common.empty-items>
                <x-slot name="title">
                    {{__('no products added yet')}}
                </x-slot>
                <x-slot name="button">
                    <button class="btn btn-primary" data-bs-target="#product-create" data-bs-toggle="modal">
                        {{__('Add')}}
                    </button>
                </x-slot>
            </x-common.empty-items>
        @else
            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                    <tr>
                        <td>{{__('id')}}</td>
                        <td>{{__('name')}}</td>
                        <td>{{__('description')}}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    </thead>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>
                                <button class="btn btn-primary">{{__('Edit')}}</button>
                            </td>
                            <td>
                                <button class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            {{$products->links()}}
            <button class="btn btn-primary" data-bs-target="#product-create" data-bs-toggle="modal">
                {{__('Add')}}
            </button>
        @endif
    </div>
    <x-products.create/>
@endsection
