<x-modal.index id="characteristic-edit-{{$characteristic->id}}">
    <x-slot name="title">
        {{__('Create characteristic')}} {{$characteristic->name}}
    </x-slot>
    <x-slot name="body">
        <form action="{{route('admin.characteristics.update', $characteristic->id)}}" id="update-characteristic-{{$characteristic->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name" class="col-form-label">{{__('Name')}}</label>
                <input type="text" name="name" class="form-control" value="{{$characteristic->name}}" id="name">
            </div>
            <input type="hidden" name="category_id" value="{{$category->id}}">
        </form>
    </x-slot>
    <x-slot name="footer">
        <button type="submit" form="update-characteristic-{{$characteristic->id}}" class="btn btn-primary">{{__('Edit')}}</button>
    </x-slot>
</x-modal.index>
