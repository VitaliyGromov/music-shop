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
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{$product->getFirstMediaUrl('products')}}" alt="First slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
@endsection
