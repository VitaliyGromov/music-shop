@extends('layouts.app')

@section('content')
    <div class="container">
        @if($products->isEmpty())
            <x-empty-items>
                <x-slot name="title">
                    {{__('no products added yet')}}
                </x-slot>
                <x-slot name="button">
                    <button class="btn btn-primary">
                        {{__('Add')}}
                    </button>
                </x-slot>
            </x-empty-items>
        @else
            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                    <tr>
                        <td>
                            {{__('id')}}
                        </td>
                        <td>
                            {{__('name')}}
                        </td>
                        <td>
                            {{__('description')}}
                        </td>
                    </tr>
                    </thead>
                </table>
            </div>
        @endif
    </div>
@endsection
