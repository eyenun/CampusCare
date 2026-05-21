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

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf
            <div>
                <label class="block mb-2 font-medium text-slate-700">
                    Email
                </label>
                <input
                type="email"
                name="email"
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
        name="password"
        placeholder="Masukkan password"
        class="w-full border border-slate-300 rounded-xl p-4 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 transition text-white py-4 rounded-xl font-semibold shadow-lg">
        Login
    </button>
</form>

    </div>

</div>

</body>
</html>
