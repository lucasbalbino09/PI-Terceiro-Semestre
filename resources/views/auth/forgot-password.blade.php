<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Você esqueceu sua senha ? Não tem problema. Basta confirmar seu email que sua senha será resetada Automaticamente.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="userEmail" :value="old('userEmail')" required autofocus />
            <x-input-error :messages="$errors->get('userEmail')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Alterar senha') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
