<x-mail::message>
Hello, {{$user->name}} {{$user->lastname}}. Your password is {{$password}}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
