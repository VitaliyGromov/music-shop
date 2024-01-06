<x-modal.index id="subcategory-create">
    <x-slot name="title">
        {{__('Create new subcategory')}}
    </x-slot>
    <x-slot name="body">
        <form action="{{route('admin.subcategories.store')}}" id="create-subcategory" method="POST">
            @csrf
            <div class="form-group">
                <label for="name" class="col-form-label">{{__('Name')}}</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <input type="hidden" name="category_id" value="{{$category->id}}">
        </form>
    </x-slot>
    <x-slot name="footer">
        <button type="submit" form="create-subcategory" class="btn btn-primary">{{__('Create')}}</button>
    </x-slot>
</x-modal.index>
