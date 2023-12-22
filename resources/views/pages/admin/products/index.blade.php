@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <x-empty-items>
                <x-slot name="title">
                    {{__('Пока не добавлено ни одного товара')}}
                </x-slot>
                <x-slot name="button">
                    <button class="btn btn-primary">
                        {{__('Add')}}
                    </button>
                </x-slot>
            </x-empty-items>
        </div>
    </div>
@endsection
