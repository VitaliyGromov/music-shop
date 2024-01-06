<x-modal.index id="category-create">
    <x-slot name="title">
        {{__('Create new category')}}
    </x-slot>
    <x-slot name="body">
        <form action="{{route('admin.categories.store')}}" id="create-category" method="POST">
            @csrf
            <div class="form-group">
                <label for="name" class="col-form-label">{{__('Name')}}</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
        </form>
    </x-slot>
    <x-slot name="footer">
        <button type="submit" form="create-category" class="btn btn-primary">{{__('Create')}}</button>
    </x-slot>
</x-modal.index>
