<x-mail::message>
Hello, {{$user->name}} {{$user->lastname}}. Your password is {{$password}}


<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
