<x-mail::message>
    # Welcome!

    Hi {{ $user->name }}
    <br />
    Welcome to Embaracamp, your account has been created successfully, Now you can choose your best match camp!
    <x-mail::button :url="'/sign-in'">
        Button Text
    </x-mail::button>

    Thanks,<br />
    {{ config('app.name') }}
</x-mail::message>
