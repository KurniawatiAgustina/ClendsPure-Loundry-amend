<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="#">
    <meta name="author" content="#">
    <meta name="generator" content="Laravel">

    <style>
        .custom-sidebar-collapsed .self-center,
        .custom-sidebar-collapsed ul span,
        .custom-sidebar-collapsed ul button {
            display: none;
        }

        .custom-sidebar-collapsed .h-6 {
            margin-right: 0;
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .truncate-text {
            max-width: 300px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        .truncate-text-xl {
            max-width: 600px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
    </style>

    <title>CledsPure - Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="canonical" href="{{ request()->fullUrl() }}">

    @if (isset($page->params['robots']))
        <meta name="robots" content="{{ $page->params['robots'] }}">
    @endif

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/datepicker.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@iconify/iconify@3.1.0/dist/iconify.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="icon" type="image/png" href="/favicon.ico">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content="title">
    <meta name="twitter:description" content="description">
    <meta name="twitter:image" content="#">
    <!-- Facebook -->
    <meta property="og:url" content="#">
    <meta property="og:title" content="title">
    <meta property="og:description" content="description">
    <meta property="og:type" content="website">
    <meta property="og:image" content="#">
    <meta property="og:image:type" content="image/png">

    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }

        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('profile_photo_preview');
                output.src = reader.result;
                output.classList.remove('hidden');
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeOpenIcon = document.getElementById('eyeOpenIcon');
            const eyeClosedIcon = document.getElementById('eyeClosedIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeOpenIcon.style.display = 'block';
                eyeClosedIcon.style.display = 'none';
            } else {
                passwordInput.type = 'password';
                eyeOpenIcon.style.display = 'none';
                eyeClosedIcon.style.display = 'block';
            }
        }

        function toggleRegisterPasswordVisibility() {
            const registerPasswordInput = document.getElementById('registerPassword');
            const eyeRegisterOpenIcon = document.getElementById('eyeRegisterOpenIcon');
            const eyeRegisterClosedIcon = document.getElementById('eyeRegisterClosedIcon');

            if (registerPasswordInput.type === 'password') {
                registerPasswordInput.type = 'text';
                eyeRegisterOpenIcon.style.display = 'block';
                eyeRegisterClosedIcon.style.display = 'none';
            } else {
                registerPasswordInput.type = 'password';
                eyeRegisterOpenIcon.style.display = 'none';
                eyeRegisterClosedIcon.style.display = 'block';
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('edit-btn').addEventListener('click', function() {
                console.log('edit button clicked');
                const modalId = this.getAttribute('data-modal-id');
                const inputs = document.querySelectorAll(`#${modalId} input, #${modalId} select, #${modalId} textarea`);

                inputs.forEach(input => {
                    input.disabled = false;
                    input.classList.remove('bg-gray-50');
                });

                const checkboxes = document.querySelectorAll(`#${modalId} input[type="checkbox"]`);
                checkboxes.forEach(checkbox => {
                    checkbox.disabled = false;
                });

                const listItems = document.querySelectorAll(`#${modalId} li`);
                listItems.forEach(listItem => {
                    listItem.classList.remove('bg-gray-50');
                    listItem.classList.add('bg-white', 'cursor-pointer', 'transition', 'transform',
                        'hover:scale-105', 'hover:shadow-lg');
                });

                const labels = document.querySelectorAll(`#${modalId} label`);
                labels.forEach(label => {
                    label.classList.add('cursor-pointer');
                });

                document.getElementById('submit-btn').classList.remove('hidden');
                document.getElementById('cancel-btn').classList.remove('hidden');
                document.getElementById('close-btn').classList.add('hidden');
                this.classList.add('hidden');

                const imgDiv = document.querySelector(`#${modalId} .img-action-div`);
                imgDiv.classList.remove('hidden');
            });

            document.getElementById('cancel-btn').addEventListener('click', function() {
                const modalId = this.getAttribute('data-modal-id');
                const inputs = document.querySelectorAll(`#${modalId} input, #${modalId} select, #${modalId} textarea`);

                inputs.forEach(input => {
                    input.disabled = true;
                    input.classList.add('bg-gray-50');
                });

                const checkboxes = document.querySelectorAll(`#${modalId} input[type="checkbox"]`);
                checkboxes.forEach(checkbox => {
                    checkbox.disabled = true;
                });

                const listItems = document.querySelectorAll(`#${modalId} li`);
                listItems.forEach(listItem => {
                    listItem.classList.add('bg-gray-50');
                    listItem.classList.remove('bg-white', 'cursor-pointer', 'transition',
                        'transform', 'hover:scale-105', 'hover:shadow-lg');
                });

                const labels = document.querySelectorAll(`#${modalId} label`);
                labels.forEach(label => {
                    label.classList.remove('cursor-pointer');
                });

                document.getElementById('submit-btn').classList.add('hidden');
                document.getElementById('cancel-btn').classList.add('hidden');
                document.getElementById('close-btn').classList.remove('hidden');
                document.getElementById('edit-btn').classList.remove('hidden');

                const imgDiv = document.querySelector(`#${modalId} .img-action-div`);
                imgDiv.classList.add('hidden');
            });
        });
    </script>
</head>
@php
    $whiteBg = isset($params['white_bg']) && $params['white_bg'];
@endphp

<body class="{{ $whiteBg ? 'bg-white dark:bg-gray-900' : 'bg-gray-50 dark:bg-gray-800' }} scrollbar-hide">
    <x-navbar-dashboard />
    <div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
        @if (auth()->user()->role == 'Owner')
            <x-sidebar.owner-sidebar />
        @else
            <x-sidebar.admin-sidebar />
        @endif
        <div id="main-content"
            class="relative w-full h-full overflow-y-auto scrollbar-hide bg-gray-50 lg:ml-64 dark:bg-gray-900">
            <main>
                @yield('content')
            </main>
            <x-footer-dashboard />
        </div>
    </div>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/datepicker.min.js"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    @include('sweetalert::alert')
</body>

</html>
