@extends('layouts.dashboard')
@section('content')
    <div class="p-4 pb-10 bg-white lg:mt-1.5 dark:bg-gray-800 shadow">
        <div class=" block sm:flex items-center justify-between   ">
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
                                    Home
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
                                    <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500"
                                        aria-current="page">Dashboard</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div
            class="bg-white border dark:border-gray-500 dark:bg-gray-800 shadow-md rounded-lg p-6 w-full  mx-auto col-span-2">
            <div class="flex justify-between items-center">
                <h3 class="text-xl dark:text-white font-bold">Filter Grafik Laporan</h3>
                <form action="" method="get">
                    @csrf
                    <div class="flex space-x-2 items-center">
                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input id="datepicker-autohide" datepicker datepicker-autohide type="text" name="start_date" value="{{ request('start_date') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                                placeholder="Select date">
                        </div>
                        <div class="dark:text-white">s/d</div>
                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input id="datepicker-autohide" datepicker datepicker-autohide type="text" name="end_date" value="{{ request('end_date') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                                placeholder="Select date">
                        </div>
                        <div class="relative max-w-sm hidden">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input id="datepicker-autohide" datepicker datepicker-autohide type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                                placeholder="Select date">
                        </div>
                        <button type="submit"
                            class="text-white bg-customprimary-500 hover:bg-customprimary-700 focus:ring-4 focus:outline-none focus:ring-customprimary-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-customprimary-600 dark:hover:bg-customprimary-700 dark:focus:ring-customprimary-800">
                            <svg class="w-5 h-5 text-gray-800 text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                    d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                            </svg>

                            <span class="sr-only">Icon description</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="grid w-full grid-cols-1 gap-5 mt-4 lg:grid-cols-3">
            <div
                class="flex flex-col  items-center justify-center p-4 bg-customprimary-500 border border-gray-200 rounded-lg shadow-md sm:flex-row sm:p-6 dark:border-gray-700 hover:shadow-lg transition-shadow duration-300">
                <span class="text-white text-6xl md:mr-3 mr-0 ">
                    <span class="iconify" data-icon="mdi:user" data-inline="false"></span>
                </span>
                <div class="w-full text-center sm:text-left">
                    <h3 class="text-xl font-bold text-white ">Pengguna</h3>
                    <p class="text-xl font-bold leading-none text-white sm:text-2xl">
                        {{ $data->userCount }} </p>
                </div>
            </div>

            <div
                class="flex flex-col  items-center justify-center p-4 bg-customprimary-500 border border-gray-200 rounded-lg shadow-md sm:flex-row sm:p-6 dark:border-gray-700 hover:shadow-lg transition-shadow duration-300">
                <span class="text-white text-6xl md:mr-3 mr-0 ">
                    <span class="iconify" data-icon="mdi:handshake" data-inline="false"></span>
                </span>
                <div class="w-full text-center sm:text-left">
                    <h3 class="text-xl font-bold text-white ">Cabang</h3>
                    <p class="text-xl font-bold leading-none text-white sm:text-2xl">
                        {{ $data->branchCount }}</p>
                </div>
            </div>

            <div
                class="flex flex-col  items-center justify-center p-4 bg-customprimary-500 border border-gray-200 rounded-lg shadow-md sm:flex-row sm:p-6 dark:border-gray-700 hover:shadow-lg transition-shadow duration-300">
                <span class="text-white text-6xl md:mr-3 mr-0 ">
                    <span class="iconify" data-icon="raphael:customer" data-inline="false"></span>
                </span>
                <div class="w-full text-center sm:text-left">
                    <h3 class="text-xl font-bold text-white ">Customer</h3>
                    <p class="text-xl font-bold leading-none text-white sm:text-2xl">
                        {{ $data->customerCount }}</p>
                </div>
            </div>
        </div>

        <div class="grid w-full grid-cols-1 gap-y-5 lg:gap-x-5 mt-5 lg:grid-cols-3">
            <div
                class="flex flex-col items-center justify-center p-4 bg-customprimary-500 border border-gray-200 rounded-lg shadow-md sm:flex-row sm:p-6 dark:border-gray-700 hover:shadow-lg transition-shadow duration-300">
                <span class="text-white text-6xl md:mr-3 mr-0 ">
                    <span class="iconify" data-icon="iconoir:wallet-solid" data-inline="false"></span>
                </span>
                <div class="w-full text-center sm:text-left">
                    <h3 class="text-xl font-bold text-white ">Total Pemasukan</h3>
                    <p class="text-xl font-bold leading-none text-white sm:text-2xl">
                        Rp {{ number_format($data->sumIncome, 0, ',', '.') }}</p>
                </div>
            </div>

            <div
                class="flex flex-col  items-center justify-center p-4 bg-customprimary-500 border border-gray-200 rounded-lg shadow-md sm:flex-row sm:p-6 dark:border-gray-700 hover:shadow-lg transition-shadow duration-300">
                <span class="text-white text-6xl md:mr-3 mr-0 ">
                    <span class="iconify" data-icon="clarity:clipboard-solid" data-inline="false"></span>
                </span>
                <div class="w-full text-center sm:text-left">
                    <h3 class="text-xl font-bold text-white ">Total Transaksi</h3>
                    <p class="text-xl font-bold leading-none text-white sm:text-2xl">
                        {{ $data->transactionCount }}</p>
                </div>
            </div>
        </div>

        {{-- <div
            class="bg-white border mt-8 dark:border-gray-500 dark:bg-gray-800 shadow-md rounded-lg p-6 w-full  mx-auto col-span-2">
            <div class="flex justify-between items-center">
                <h3 class="text-xl dark:text-white font-bold">Filter Grafik Laporan</h3>
                <div class="flex space-x-2 items-center">
                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input id="datepicker-autohide" datepicker datepicker-autohide type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                            placeholder="Select date">
                    </div>
                    <div class="dark:text-white">s/d</div>
                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input id="datepicker-autohide" datepicker datepicker-autohide type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                            placeholder="Select date">
                    </div>
                    <div class="relative max-w-sm hidden">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input id="datepicker-autohide" datepicker datepicker-autohide type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                            placeholder="Select date">
                    </div>
                    <button type="button"
                        class="text-white bg-customprimary-500 hover:bg-customprimary-700 focus:ring-4 focus:outline-none focus:ring-customprimary-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-customprimary-600 dark:hover:bg-customprimary-700 dark:focus:ring-customprimary-800">
                        <svg class="w-5 h-5 text-gray-800 text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                        </svg>

                        <span class="sr-only">Icon description</span>
                    </button>
                </div>
            </div>
        </div> --}}

        {{-- CHART --}}
        <div class="grid w-full grid-cols-1 gap-5  mt-8 h-full lg:grid-cols-3">
            <div
                class="bg-white border dark:border-gray-500 dark:bg-gray-800 shadow-md rounded-lg p-6 w-full  mx-auto col-span-2">
                <div class="flex justify-between items-center mb-3">
                    @if ($data->startDate && $data->endDate)
                        <h3 class="text-xl dark:text-white font-bold">Grafik Pemasukan {{ $data->startDate }} s/d {{ $data->endDate }}</h3>
                    @else
                        <h3 class="text-xl dark:text-white font-bold">Grafik Pemasukan Bulan Ini</h3>
                    @endif
                </div>
                <h4 class="text-xl font-bold text-customprimary-600">Rp {{ number_format($data->sumIncomeThisMonth, 0, ',', '.') }}</h4>
                <p class="text-sm dark:text-white text-gray-500 mb-4">Saldo masuk</p>
                <div>
                    <canvas id="incomeChart" class="w-full h-60 dark:bg-gray-800"></canvas>
                </div>
            </div>

            <div class="bg-white border dark:border-gray-500 shadow-md dark:bg-gray-800 rounded-lg p-6 w-full   mx-auto">
                <h3 class="text-xl mb-3 dark:text-white font-bold ">Top 5 Layanan</h3>
                <canvas id="topTransaksiChart" class="w-full h-60 dark:bg-gray-800" style="height: 100%"></canvas>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const incomeChartCtx = document.getElementById('incomeChart').getContext('2d');
            const topTransaksiChartCtx = document.getElementById('topTransaksiChart').getContext('2d');

            new Chart(incomeChartCtx, {
                type: 'line',
                data: {
                    labels: @json($data->chartDataKey),
                    datasets: [{
                        label: 'Uang Masuk',
                        data: @json($data->chartDataValue),
                        borderColor: '#ff9000',
                        backgroundColor: '#ffd756',
                        tension: 0.4,
                        fill: true,
                        borderWidth: 2,
                        pointRadius: 3,
                        pointBackgroundColor: '#ff9000',
                        pointBorderColor: 'white'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: true
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                drawBorder: false,
                                color: 'rgba(0, 0, 0, 0.1)'
                            },
                            ticks: {
                                stepSize: 1
                            }
                        }
                    }
                }
            });

            new Chart(topTransaksiChartCtx, {
                type: 'bar',
                data: {
                    labels: @json($data->topServicesKey),
                    datasets: [{
                        label: 'Jumlah Terjual',
                        data: @json($data->topServicesValue),
                        backgroundColor: '#ff9000',
                        borderRadius: 4,
                        barThickness: 20,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: true
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                drawBorder: false,
                                color: 'rgba(0, 0, 0, 0.1)'
                            },
                            ticks: {
                                stepSize: 5
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection
