<x-modal.index id="brand-edit-{{$brand->id}}">
    <x-slot name="title">
        {{__('Update brand')}} {{$brand->name}}
    </x-slot>
    <x-slot name="body">
        <form action="{{route('admin.brands.update', $brand->id)}}" id="update-brand-{{$brand->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name" class="col-form-label">{{__('Name')}}</label>
                <input type="text" name="name" class="form-control" value="{{$brand->name}}" id="name">
            </div>
        </form>
    </x-slot>
    <x-slot name="footer">
        <button type="submit" form="update-brand-{{$brand->id}}" class="btn btn-primary">{{__('Update')}}</button>
    </x-slot>
</x-modal.index>
