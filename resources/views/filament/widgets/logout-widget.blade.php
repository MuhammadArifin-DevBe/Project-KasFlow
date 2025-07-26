<div class="flex items-center justify-between bg-white dark:bg-gray-800 shadow rounded-xl p-6">
    <div class="flex items-center gap-4">
        {{-- Foto Profil (Inisial) --}}
        <div class="w-12 h-12 bg-black text-white rounded-full flex items-center justify-center text-lg font-bold">
            {{ strtoupper(Str::limit(auth()->user()->name, 1, '')) }}
        </div>


        {{-- Teks Selamat Datang --}}
        <div>
            <div class="text-sm text-gray-500 dark:text-gray-400">Welcome</div>
            <div class="text-lg font-semibold text-gray-900 dark:text-white">{{ auth()->user()->name }}</div>
        </div>
    </div>

    {{-- Tombol Logout --}}
    <form method="POST" action="{{ route('filament.admin.auth.logout') }}">
        @csrf
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-800 dark:text-white rounded-md transition">
            <x-heroicon-o-arrow-left-on-rectangle class="w-5 h-5 mr-2" />
            Sign out
        </button>
    </form>
</div>