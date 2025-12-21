<aside class="fixed inset-y-0 left-0 z-50 w-64 bg-white dark:bg-slate-850 shadow-xl rounded-2xl flex flex-col h-screen">

    <hr class="border-t border-gray-200 dark:border-gray-700" />

    <div class="flex-1 overflow-y-auto px-2">
        <ul class="flex flex-col pl-0 mb-0">
            <li class="mt-0.5 w-full">
                <a href="{{ route('dashboard') }}"
                    class="py-2.7 my-0 mx-2 flex items-center rounded-lg px-4 font-semibold transition-colors
                    {{ request()->routeIs('dashboard')
                        ? 'bg-blue-500/13 text-blue-500 dark:text-white'
                        : 'text-slate-700 dark:text-white dark:opacity-80' }}">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg">
                        <i
                            class="ni ni-tv-2 {{ request()->routeIs('dashboard') ? 'text-blue-500' : 'text-slate-400' }}"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a href="{{ route('paket.wisata.index') }}"
                    class="py-2.7 my-0 mx-2 flex items-center rounded-lg px-4 font-semibold transition-colors
                    {{ request()->routeIs('paket.wisata.*')
                        ? 'bg-blue-500/13 text-blue-500 dark:text-white'
                        : 'text-slate-700 dark:text-white dark:opacity-80' }}">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg">
                        <i
                            class="ni ni-map-big {{ request()->routeIs('paket.wisata.*') ? 'text-blue-500' : 'text-slate-400' }}"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Paket Wisata</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a href="{{ route('hotel.index') }}"
                    class="py-2.7 my-0 mx-2 flex items-center rounded-lg px-4 font-semibold transition-colors
                    {{ request()->routeIs('hotel.*')
                        ? 'bg-blue-500/13 text-blue-500 dark:text-white'
                        : 'text-slate-700 dark:text-white dark:opacity-80' }}">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg">
                        <i
                            class="ni ni-building {{ request()->routeIs('hotel.*') ? 'text-blue-500' : 'text-slate-400' }}"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Hotel</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a href="{{ route('bobot.kriteria.index') }}"
                    class="py-2.7 my-0 mx-2 flex items-center rounded-lg px-4 font-semibold transition-colors
                    {{ request()->routeIs('bobot.kriteria.*')
                        ? 'bg-blue-500/13 text-blue-500 dark:text-white'
                        : 'text-slate-700 dark:text-white dark:opacity-80' }}">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg">
                        <i
                            class="ni ni-settings-gear-65 {{ request()->routeIs('bobot.kriteria.*') ? 'text-blue-500' : 'text-slate-400' }}"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Bobot Kriteria</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a href="{{ route('proses.index') }}"
                    class="py-2.7 my-0 mx-2 flex items-center rounded-lg px-4 font-semibold transition-colors
                    {{ request()->routeIs('proses.*')
                        ? 'bg-blue-500/13 text-blue-500 dark:text-white'
                        : 'text-slate-700 dark:text-white dark:opacity-80' }}">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg">
                        <i
                            class="ni ni-chart-bar-32 {{ request()->routeIs('proses.*') ? 'text-blue-500' : 'text-slate-400' }}"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Proses MOORA</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a href="{{ route('hasil.rekomendasi.index') }}"
                    class="py-2.7 my-0 mx-2 flex items-center rounded-lg px-4 font-semibold transition-colors
                    {{ request()->routeIs('hasil.rekomendasi.*')
                        ? 'bg-blue-500/13 text-blue-500 dark:text-white'
                        : 'text-slate-700 dark:text-white dark:opacity-80' }}">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg">
                        <i
                            class="ni ni-trophy {{ request()->routeIs('hasil.rekomendasi.*') ? 'text-blue-500' : 'text-slate-400' }}"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Hasil dan Rekomendasi</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
