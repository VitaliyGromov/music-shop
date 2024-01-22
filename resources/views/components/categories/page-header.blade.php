<div class="row mb-3">
    <h1 class="h1">{{$category->name}}</h1>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="btn btn-secondary me-3" href="{{route('admin.subcategories.index', $category->id)}}">{{__('Subcategories')}}</a>
</nav>
