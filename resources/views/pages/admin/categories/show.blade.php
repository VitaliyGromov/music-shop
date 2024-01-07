@extends('layouts.app')

@section('content')
    <div class="container">
        <x-categories.page-header :category="$category"/>
    </div>
@endsection
