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
                    {{__('No characteristics')}}
                </x-slot>
                <x-slot name="button">
                    <button class="btn btn-primary">
                        {{__('Add characteristic')}}
                    </button>
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
            <div id="carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($product->getMedia('products') as $media)
                        <div class="carousel-item active">
                            <img class="img-fluid" src="{{$media->getUrl()}}" alt="First slide" width="500" height="500">
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        @endif
    </div>
@endsection
