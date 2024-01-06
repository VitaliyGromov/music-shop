<x-modal.index id="brand-create">
    <x-slot name="title">
        {{__('Create new brand')}}
    </x-slot>
    <x-slot name="body">
        <form action="{{route('admin.brands.store')}}" id="create-brand" method="POST">
            @csrf
            <div class="form-group">
                <label for="name" class="col-form-label">{{__('Name')}}</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
        </form>
    </x-slot>
    <x-slot name="footer">
        <button type="submit" form="create-brand" class="btn btn-primary">{{__('Create')}}</button>
    </x-slot>
</x-modal.index>
