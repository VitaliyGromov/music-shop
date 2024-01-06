<x-modal.index id="user-create">
    <x-slot name="title">
        {{__('Create new user')}}
    </x-slot>
    <x-slot name="body">
        <form action="{{route('admin.users.store')}}" id="create-user" method="POST">
            @csrf
            <div class="form-group">
                <label for="name" class="col-form-label">{{__('Name')}}</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="form-group">
                <label for="lastname" class="col-form-label">{{__('Lastname')}}</label>
                <input type="text" name="lastname" class="form-control" id="lastname">
            </div>
            <div class="form-group">
                <label for="lastname" class="col-form-label">{{__('Middlename')}}</label>
                <input type="text" name="middlename" class="form-control" id="lastname">
            </div>
            <div class="form-group">
                <label for="email" class="col-form-label">{{__('Email')}}</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label for="role" class="col-form-label">{{__('Role')}}</label>
                <select id="role" name="role_id" class="form-control">
                    @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
        </form>
    </x-slot>
    <x-slot name="footer">
        <button type="submit" form="create-user" class="btn btn-primary">{{__('Create')}}</button>
    </x-slot>
</x-modal.index>
