<<<<<<< HEAD
<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 min-h-screen flex justify-center items-center px-4">

<div class="w-full max-w-5xl bg-white rounded-3xl shadow-2xl overflow-hidden grid grid-cols-1 md:grid-cols-2">

    {{-- Left Side --}}
    <div class="bg-blue-600 text-white p-12 flex flex-col justify-center">

        <h1 class="text-5xl font-bold mb-6">
            CampusCare
        </h1>

        <p class="text-blue-100 text-lg leading-relaxed">
            Sistem pelaporan fasilitas kampus modern untuk membantu mahasiswa melaporkan kerusakan fasilitas secara cepat dan efisien.
        </p>

    </div>

    {{-- Right Side --}}
    <div class="p-12">

        <div class="mb-10">

            <h2 class="text-4xl font-bold text-slate-800 mb-2">
                Welcome Back
            </h2>

            <p class="text-slate-500">
                Login ke akun anda
            </p>

        </div>

        <form class="space-y-6">

            <div>

                <label class="block mb-2 font-medium text-slate-700">
                    Email
                </label>

                <input
                    type="email"
                    placeholder="Masukkan email"
                    class="w-full border border-slate-300 rounded-xl p-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >

            </div>

            <div>

                <label class="block mb-2 font-medium text-slate-700">
                    Password
                </label>

                <input
                    type="password"
                    placeholder="Masukkan password"
                    class="w-full border border-slate-300 rounded-xl p-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >

            </div>

            <button
                class="w-full bg-blue-600 hover:bg-blue-700 transition text-white py-4 rounded-xl font-semibold shadow-lg">

                Login

            </button>

        </form>

    </div>

</div>

</body>
</html>
>>>>>>> 1b3c415bc463075f2b32986037924370c25be7c8
