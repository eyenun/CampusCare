<<<<<<< HEAD
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
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
    <title>Register</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 min-h-screen flex justify-center items-center px-4">

<div class="w-full max-w-5xl bg-white rounded-3xl shadow-2xl overflow-hidden grid grid-cols-1 md:grid-cols-2">

    {{-- Left Side --}}
    <div class="bg-slate-900 text-white p-12 flex flex-col justify-center">

        <h1 class="text-5xl font-bold mb-6">
            CampusCare
        </h1>

        <p class="text-slate-300 text-lg leading-relaxed">
            Buat akun baru untuk mulai menggunakan sistem pelaporan fasilitas kampus.
        </p>

    </div>

    {{-- Right Side --}}
    <div class="p-12">

        <div class="mb-10">

            <h2 class="text-4xl font-bold text-slate-800 mb-2">
                Create Account
            </h2>

            <p class="text-slate-500">
                Registrasi akun baru
            </p>

        </div>

        <form class="space-y-6">

            <div>

                <label class="block mb-2 font-medium text-slate-700">
                    Nama
                </label>

                <input
                    type="text"
                    placeholder="Masukkan nama"
                    class="w-full border border-slate-300 rounded-xl p-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >

            </div>

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
                class="w-full bg-slate-900 hover:bg-slate-800 transition text-white py-4 rounded-xl font-semibold shadow-lg">

                Register

            </button>

        </form>

    </div>

</div>

</body>
</html>
>>>>>>> 1b3c415bc463075f2b32986037924370c25be7c8
