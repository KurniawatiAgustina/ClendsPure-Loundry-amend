@props(['icon' => null, 'routeName' => null, 'title' => null])
<li>
    <a href="{{ route(str_replace('*', '', $routeName)) }}"
        class="text-base rounded-lg flex items-center p-2 group hover:bg-customprimary-500 hover:text-white hover:font-semibold transition duration-75 pl-11 dark:text-gray-200 dark:hover:bg-gray-700
    {{ request()->routeIs($routeName) ? 'bg-gray-100 text-customprimary-500 dark:bg-gray-700 font-semibold' : 'text-gray-500 font-normal' }}">
        {{ $title }}
    </a>
</li>
