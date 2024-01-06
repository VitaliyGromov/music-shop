<x-modal.index id="category-edit-{{$category->id}}">
    <x-slot name="title">
        {{__('Update category')}} {{$category->name}} {{$category->lastname}}
    </x-slot>
    <x-slot name="body">
        <form action="{{route('admin.categories.update', $category->id)}}" id="update-category-{{$category->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name" class="col-form-label">{{__('Name')}}</label>
                <input type="text" name="name" class="form-control" value="{{$category->name}}" id="name">
            </div>
        </form>
    </x-slot>
    <x-slot name="footer">
        <button type="submit" form="update-category-{{$category->id}}" class="btn btn-primary">{{__('Update')}}</button>
    </x-slot>
</x-modal.index>
