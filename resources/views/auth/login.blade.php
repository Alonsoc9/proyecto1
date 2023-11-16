<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <a href="auth/google" class="btn-google m-b-20">
            <img src="{{asset('assets/login/images/icons/icon-google.png')}}" alt="GOOGLE">
            Google
        </a>

    </x-authentication-card>
</x-guest-layout>
