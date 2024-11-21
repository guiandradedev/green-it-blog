<x-guest-layout>
    <div class="flex items-center justify-center bg-gray-100 dark:bg-gray-900 mx-auto">
        <!-- Card Container -->
        <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-lg shadow-md p-8">

            <h2 class="text-2xl font-bold text-gray-800 dark:text-white text-center mb-6">
                {{ __('Bem vindo de-volta!') }}
            </h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="p-4 block mt-1 w-full dark:bg-gray-700 dark:border-gray-600" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Senha')" />
                    <x-text-input id="password" class="p-4 block mt-1 w-full dark:bg-gray-700 dark:border-gray-600" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Lembrar') }}
                        </span>
                    </label>
                    
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline dark:text-indigo-400">
                            {{ __('Esqueceu sua senha?') }}
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <div>
                    <x-primary-button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-md">
                        {{ __('Entrar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
