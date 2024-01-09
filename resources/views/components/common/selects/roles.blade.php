@php
    use Spatie\Permission\Models\Role;
    $roles = Role::where('name', '!=', 'User')->get();
@endphp

<select id="role_id" name="role_id" class="form-control">
    @foreach($roles as $role)
        <option value="{{$role->id}}">{{$role->name}}</option>
    @endforeach
</select>
