<x-mail::message>
    # Pembayaran Success

    Hi {{ $checkout->User->name }},
    <br>
    Pembayaran sudah berhasil, gassken {{ $checkout->Camp->title }} sekarang.

    <x-mail::button :url="'users/dashboard'">
        Back to Dashbord
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
