<x-mail::message>
    # Register Camp: {{ $checkout->Camp->title }}

    Hi {{ $checkout->User->name }}
    <br>
    Terima kasih sudah mendaftar <b>{{ $checkout->Camp->title }}</b> yoyoyo konbanwa
    <x-mail::button :url="'/pages'">
        Balik Woyy
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
