<x-modal.index id="user-edit-{{$user->id}}">
    <x-slot name="title">
        {{__('Update user')}} {{$user->name}} {{$user->lastname}}
    </x-slot>
    <x-slot name="body">
        <form action="{{route('admin.users.update', $user->id)}}" id="update-user-{{$user->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name" class="col-form-label">{{__('Name')}}</label>
                <input type="text" name="name" class="form-control" value="{{$user->name}}" id="name">
            </div>
            <div class="form-group">
                <label for="lastname" class="col-form-label">{{__('Lastname')}}</label>
                <input type="text" name="lastname" class="form-control" value="{{$user->lastname}}" id="lastname">
            </div>
            <div class="form-group">
                <label for="lastname" class="col-form-label">{{__('Middlename')}}</label>
                <input type="text" name="middlename" class="form-control" value="{{$user->middlename}}" id="lastname">
            </div>
            <div class="form-group">
                <label for="email" class="col-form-label">{{__('Email')}}</label>
                <input type="email" name="email" class="form-control" value="{{$user->email}}" id="email">
            </div>
            <div class="form-group">
                <label for="role_шв" class="col-form-label">{{__('Role')}}</label>
                <x-common.selects.roles/>
            </div>
            <div class="form-check mt-2">
                <label for="active" class="form-check-label">{{__('Active')}}</label>
                <input class="form-check-input" type="checkbox" name="active" value="" id="active" @if($user->active) checked @endif>
            </div>
        </form>
    </x-slot>
    <x-slot name="footer">
        <button type="submit" form="update-user-{{$user->id}}" class="btn btn-primary">{{__('Update')}}</button>
    </x-slot>
</x-modal.index>
