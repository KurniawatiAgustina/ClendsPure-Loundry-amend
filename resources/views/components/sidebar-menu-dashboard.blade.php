@props(['icon' => null, 'routeName' => null, 'title' => null, 'navbar' => null])

<li>
    <a href="{{ route(str_replace('*', '', $routeName)) }}"
        class="flex items-center p-2 text-base rounded-lg hover:bg-customprimary-500 hover:text-white hover:font-semibold group dark:hover:bg-gray-700
        {{ request()->routeIs($routeName) ? 'bg-gray-100 text-customprimary-500 dark:text-white dark:bg-gray-700 font-semibold' : 'text-gray-500 dark:text-gray-200 font-normal' }}">
        <span class="iconify" data-icon="{{ $icon }}" data-inline="false" style="width: 24px; height: 24px;"></span>
        <span class="ml-3" sidebar-toggle-item>{{ $title }}</span>
    </a>
</li>
