@props([ 'icon' => null, 'parentPattern' => null, 'title' => null, 'activeRoutes' => []])
@php
    $patterns = array_merge([$parentPattern], $activeRoutes);
    $isActive = false;
    foreach ($patterns as $pattern) {
        if (request()->routeIs($pattern)) {
            $isActive = true;
            break;
        }
    }
@endphp
<li>
    <button type="button"
        class="flex items-center w-full p-2 text-base transition duration-75 rounded-lg group
               hover:bg-customprimary-500 hover:text-white hover:font-semibold dark:hover:bg-gray-700
               {{ $isActive
                   ? 'bg-gray-100 text-customprimary-500 dark:text-white dark:bg-gray-700 font-semibold'
                   : 'text-gray-500 dark:text-gray-200 font-normal' }}"
        aria-controls="{{ Str::slug($title, '-') }}" data-collapse-toggle="{{ Str::slug($title, '-') }}">
        @if ($icon)
            <span class="iconify" data-icon="{{ $icon }}" data-inline="false" style="width:24px;height:24px"></span>
        @endif
        <span class="flex-1 ml-3 text-left whitespace-nowrap">{{ $title }}</span>
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1
                     0 111.414 1.414l-4 4a1 1 0 01-1.414
                     0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
    </button>

    <ul id="{{ Str::slug($title, '-') }}" class="space-y-2 py-2 {{ $isActive ? 'block' : 'hidden' }}">
        {{ $slot }}
    </ul>
</li>
