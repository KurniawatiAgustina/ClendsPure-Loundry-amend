@extends('layouts.dashboard')
@section('content')
    <div
        class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
        <div class="w-full mb-1">
            <div class="mb-4">
                <nav class="flex mb-5" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="#"
                                class="inline-flex items-center text-gray-700 hover:text-customprimary-600 dark:text-gray-300 dark:hover:text-white">
                                <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                    </path>
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">Pengguna</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Data Pengguna</h1>
            </div>
            <div class="flex">
                <div class="items-center hidden mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
                    <form action="#" method="GET" class="hidden lg:block">
                        <label for="customer-search" class="sr-only">Search</label>
                        <div class="relative lg:w-96">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" name="search" id="customer-search"
                                class="bg-white border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                                placeholder="Cari">
                        </div>
                    </form>
                </div>
                <div class="flex items-center ml-4 space-x-2 sm:space-x-3">
                    <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                        <button type="button" data-modal-target="add-customer-modal" data-modal-toggle="add-customer-modal"
                            class="inline-flex items-center justify-center w-auto px-3 py-2 text-xs font-medium text-center text-customprimary-700 rounded-lg border border-customprimary-700 hover:text-white hover:bg-customprimary-700 focus:ring-4 focus:ring-customprimary-300 sm:w-auto dark:text-white dark:bg-customprimary-600 dark:hover:bg-customprimary-700 dark:focus:ring-customprimary-800">
                            <svg class="w-5 h-5 md:mr-2 mr-0" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="hidden sm:inline">Tambah</span>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col shadow">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow">
                    <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                        <thead class="bg-customprimary-500 dark:bg-gray-700 rounded-md">
                            <tr>
                                <th scope="col"
                                    class="p-4 text-sm font-medium text-center text-white uppercase dark:text-gray-400">
                                    #
                                </th>
                                <th scope="col"
                                    class="p-4 text-sm font-medium text-left text-white uppercase dark:text-gray-400">
                                    Nama
                                </th>
                                <th scope="col"
                                    class="p-4 text-sm font-medium text-left text-white uppercase dark:text-gray-400">
                                    Email
                                </th>
                                <th scope="col"
                                    class="p-4 text-sm font-medium text-left text-white uppercase dark:text-gray-400">
                                    Jenis Pengguna
                                </th>
                                <th scope="col"
                                    class="p-4 text-sm font-medium text-left text-white uppercase dark:text-gray-400">
                                    Cabang
                                </th>
                                <th scope="col"
                                    class="p-4 text-sm font-medium text-left text-white uppercase dark:text-gray-400">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @foreach ($users as $data)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="p-4 text-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center justify-center">
                                            {{ $loop->iteration }}
                                        </div>
                                    </td>
                                    <td class="p-4 text-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $data->name }}
                                    </td>
                                    <td class="p-4 text-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $data->email }}
                                    </td>
                                    <td class="p-4 text-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $data->role }}
                                    </td>
                                    <td class="p-4 text-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $data->branch->name ?? '-' }}
                                    </td>
                                    <td class="p-4 space-x-2 whitespace-nowrap">
                                        <button type="button" data-modal-target="detail-customer-modal{{ $data->id }}"
                                            data-modal-toggle="detail-customer-modal{{ $data->id }}"
                                            class="inline-flex items-center px-4 py-2 text-xs font-medium text-center text-customprimary-500 border border-customprimary-500 rounded-lg hover:text-white hover:bg-customprimary-500 focus:ring-4 focus:ring-custompurple-200 dark:text-white dark:border-none dark:bg-customprimary-600 dark:hover:bg-customprimary-700 dark:focus:ring-customprimary-800">
                                            <svg class="w-4 h-4 mr-2" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-width="2"
                                                    d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                                <path stroke="currentColor" stroke-width="2"
                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                            Detail
                                        </button>

                                        <button type="button" data-modal-target="delete-customer-modal{{ $data->id }}"
                                            data-modal-toggle="delete-customer-modal{{ $data->id }}"
                                            class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-red-600 border border-red-600 rounded-lg hover:text-white hover:bg-red-600 focus:ring-4 focus:ring-red-300 dark:text-white dark:border-none dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div
            class="sticky bottom-0 right-0 items-center w-full p-4 bg-white border-t border-gray-200 sm:flex sm:justify-between dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center mb-4 sm:mb-0">
                <span class="text-xs font-normal text-gray-900 dark:text-white">Menampilkan <span
                    class="font-semibold text-gray-900 dark:text-white"> {{ $users->firstItem() }}-{{ $users->lastItem() }}</span> dari <span
                    class="font-semibold text-gray-900 dark:text-white">{{ $users->total() }}</span></span>
            </div>
            <div class="flex items-center space-x-3">
                <a @if (1 !== $users->currentPage()) href="{{ $users->previousPageUrl() }}" @endif
                    class="@if (1 === $users->currentPage()) cursor-not-allowed @endif inline-flex items-center justify-center flex-1 px-3 py-2 text-xs font-medium text-center text-customprimary-700 border border-customprimary-700 rounded-lg hover:text-white hover:bg-customprimary-700 focus:ring-4 focus:ring-customprimary-300 dark:bg-customprimary-600 dark:hover:bg-customprimary-700 dark:focus:ring-customprimary-800 dark:text-white">
                    <svg class="w-5 h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Sebelumnya
                </a>
                <a @if ($users->lastPage() !== $users->currentPage()) href="{{ $users->nextPageUrl() }}" @endif
                    class="@if ($users->lastPage() === $users->currentPage()) cursor-not-allowed @endif inline-flex items-center justify-center flex-1 px-3 py-2 text-xs font-medium text-center text-customprimary-700 border border-customprimary-700 rounded-lg hover:text-white hover:bg-customprimary-700 focus:ring-4 focus:ring-customprimary-300 dark:bg-customprimary-600 dark:hover:bg-customprimary-700 dark:focus:ring-customprimary-800 dark:text-white">
                    Berikutnya
                    <svg class="w-5 h-5 ml-1 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    @include('pages.dashboard.user.add-form')

    @foreach ($users as $data)
        @include('pages.dashboard.user.detail', ['data' => $data])
        @include('pages.dashboard.general.delete', ['data' => $data, 'url' => route('dashboard.user.destroy', ['id' => $data->id])])
    @endforeach
@endsection
