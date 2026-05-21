<aside class="w-72 bg-slate-900 text-white min-h-screen shadow-2xl">

    {{-- Logo --}}
    <div class="px-8 py-7 border-b border-slate-700">

        <h1 class="text-3xl font-bold text-blue-400">
            CampusCare
        </h1>

        <p class="text-slate-400 text-sm mt-2">
            Dashboard Management
        </p>

    </div>

    {{-- Navigation --}}
    <nav class="mt-6 px-4 space-y-2">

        {{-- Dashboard --}}
        <a href="/"
           class="flex items-center px-5 py-4 rounded-xl transition duration-300
           {{ request()->is('/') ? 'bg-blue-600 text-white shadow-lg' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

            Dashboard

        </a>

        {{-- Laporan --}}
        <a href="/laporan"
           class="flex items-center px-5 py-4 rounded-xl transition duration-300
           {{ request()->is('laporan') ? 'bg-blue-600 text-white shadow-lg' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

            Laporan

        </a>

        {{-- Login --}}
        <a href="auth.login"
           class="flex items-center px-5 py-4 rounded-xl transition duration-300
           {{ request()->is('login') ? 'bg-blue-600 text-white shadow-lg' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

            Login

        </a>

    </nav>

</aside>