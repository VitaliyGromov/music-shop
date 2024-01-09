@props(['route' => '', 'modalId' => ''])

<button class="btn btn-danger" data-bs-target="#delete-{{$modalId}}" data-bs-toggle="modal">
    {{__('Delete')}}
</button>

<x-modal.index id="delete-{{$modalId}}">
    <x-slot name="title">
        {{__('Delete')}}
    </x-slot>
    <x-slot name="body">
        Are you sure?
    </x-slot>
    <x-slot name="footer">
        <form action="{{$route}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">
                {{__('Delete')}}
            </button>
        </form>
    </x-slot>
</x-modal.index>
