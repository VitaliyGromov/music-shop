@props(['route' => ''])

<form action="{{$route}}" method="POST">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger" type="submit">
        {{__('Delete')}}
    </button>
</form>
