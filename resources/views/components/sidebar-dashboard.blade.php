@php
    $url = explode('/', request()->url());
    $page_slug = $url[count($url) - 2];
@endphp

<aside id="sidebar"
    class="fixed top-0 overflow-y-auto scrollbar-hide left-0 z-20 flex flex-col flex-shrink-0 hidden w-64 h-full pt-16 font-normal duration-75 lg:flex transition-width"
    aria-label="Sidebar">
    <div
        class="relative overflow-y-auto scrollbar-hide flex flex-col flex-1 min-h-0 pt-0 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto scrollbar-hide">
            <div class="flex-1 px-3 space-y-1 bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                <ul class="pb-2 space-y-2">
                    {{ $slot }}
                </ul>
            </div>

            <div class="flex-shrink-0 px-2 py-4 bg-customcustomprimary-500 dark:bg-gray-800">
                <a href=""
                    class="flex items-center p-2 pl-4 text-base font-normal rounded-lg text-gray-500 hover:text-customprimary-500 focus:text-gray-500 hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700">
                    <span class="iconify" data-icon="majesticons:door-exit" style="width: 24px; height: 24px;"></span>
                    <span class="ml-3">Keluar</span>
                </a>
            </div>
        </div>
    </div>
</aside>

<div class="fixed inset-0 z-10 hidden bg-gray-900/50 dark:bg-gray-900/90" id="sidebarBackdrop"></div>
