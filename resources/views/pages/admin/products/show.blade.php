@extends('layouts.app')

@section('content')
    <div class="container">
        <p class="h1">
            {{$product->name}}
        </p>
        <div class="bg-secondary text-white w-25 p-2 rounded-3">
            <p class="h4">
                Brand: {{$product->brand->name}}
            </p>
            <p class="h4">
                Category: {{$product->subcategory->category->name}}
            </p>
            <p class="h4">
                Subcategory: {{$product->subcategory->name}}
            </p>
        </div>
        <p class="h2 mt-3">
            {{__('Characteristics')}}
        </p>
        @if($product->subcategory->category->characteristics->isEmpty())
            <x-common.empty-items>
                <x-slot name="title">
                    {{__('Product`s category has no characteristics')}}
                </x-slot>
                <x-slot name="button">
                    <a class="btn btn-primary" href="{{route('admin.categories.show', $product->subcategory->category->id)}}">
                        {{__('Go to category page')}}
                    </a>
                </x-slot>
            </x-common.empty-items>
        @else
            <table class="table">
                <tbody>
                @foreach($product->subcategory->category->characteristics as $characteristic)
                    <tr>
                        <td>
                            {{$characteristic->name}}
                        </td>
                        <td>
                            None
                        </td>
                        <td>
                            <button class="btn btn-primary">
                                Edit
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
        <p class="h2 mt-3">
            {{__('Photos')}}
        </p>
        @if($product->getMedia('products')->isEmpty())
            <x-common.empty-items>
                <x-slot name="title">
                    {{__('No photos yet')}}
                </x-slot>
                <x-slot name="button">
                    <div></div>
                </x-slot>
            </x-common.empty-items>
        @else
            <x-common.carousel>
                @foreach($product->getMedia('products') as $media)
                    <div class="carousel-item active">
                        <img class="img-fluid" src="{{$media->getUrl()}}" alt="First slide" width="500" height="500">
                    </div>
                @endforeach
            </x-common.carousel>
        @endif
    </div>
@endsection
