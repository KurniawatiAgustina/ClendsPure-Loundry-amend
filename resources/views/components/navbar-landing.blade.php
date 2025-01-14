<nav class="fixed z-40 w-full bg-customprimary-500 dark:bg-gray-800 dark:border-gray-700">
    <div class="flex flex-wrap items-center justify-between px-3 py-4 lg:px-24">
        <a href="{{ url('/') }}" class="flex ml-2 md:mr-24">
            <img src="{{ asset('static/images/logo.png') }}" class="h-10 mr-3" alt="FlowBite Logo" />
            <span
                class="self-center text-xl font-bold sm:text-2xl whitespace-nowrap text-white dark:text-white">LaundryBlues</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:bg-white hover:text-customprimary-500 focus:outline-none focus:ring-2 focus:ring-customprimary-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-transparent md:flex-row md:space-x-2 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="{{ route('home') }}"
                        class="block py-2 px-3 text-white rounded-md md:px-4 md:py-2 {{ request()->routeIs('home*') ? 'bg-blue-700 md:bg-white md:text-customprimary-500' : 'hover:bg-gray-100 md:hover:bg-white md:hover:text-blue-700 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent' }}"
                        aria-current="page">Beranda</a>
                </li>
                <li>
                    <a href="{{ route('profile') }}"
                        class="block py-2 px-3 text-white rounded-md md:px-4 md:py-2 {{ request()->routeIs('profile*') ? 'bg-blue-700 md:bg-white md:text-customprimary-500' : 'hover:bg-gray-100 md:hover:bg-white md:hover:text-blue-700 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent' }}">Profil</a>
                </li>
                <li>
                    <a href="{{ route('contact') }}"
                        class="block py-2 px-3 text-white rounded-md md:px-4 md:py-2 {{ request()->routeIs('contact*') ? 'bg-blue-700 md:bg-white md:text-customprimary-500' : 'hover:bg-gray-100 md:hover:bg-white md:hover:text-blue-700 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent' }}">Hubungi
                        Kami</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
