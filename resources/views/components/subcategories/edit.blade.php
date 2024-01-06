<x-modal.index id="subcategory-edit-{{$subcategory->id}}">
    <x-slot name="title">
        {{__('Update subcategory')}} {{$subcategory->name}}
    </x-slot>
    <x-slot name="body">
        <form action="{{route('admin.subcategories.update', $subcategory->id)}}" id="update-subcategory-{{$subcategory->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name" class="col-form-label">{{__('Name')}}</label>
                <input type="text" name="name" class="form-control" value="{{$subcategory->name}}" id="name">
                <input type="hidden" name="category_id" value="{{$category->id}}">
            </div>
        </form>
    </x-slot>
    <x-slot name="footer">
        <button type="submit" form="update-subcategory-{{$subcategory->id}}" class="btn btn-primary">{{__('Update')}}</button>
    </x-slot>
</x-modal.index>
