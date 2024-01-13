<x-mail::message>
    Hello, {{$user->name}} {{$user->lastname}}. Your account was deactivated <br>
    If you sure, that it is mistake, please, contact us.

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
