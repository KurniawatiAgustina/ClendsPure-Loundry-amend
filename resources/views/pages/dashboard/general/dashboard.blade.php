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

        <div class="grid w-full grid-cols-1 gap-5 mt-4 lg:grid-cols-3">
            <div
                class="flex flex-col  items-center justify-center p-4 bg-customprimary-500 border border-gray-200 rounded-lg shadow-md sm:flex-row sm:p-6 dark:border-gray-700 hover:shadow-lg transition-shadow duration-300">
                <span class="text-white text-6xl md:mr-3 mr-0 ">
                    <span class="iconify" data-icon="mdi:user" data-inline="false"></span>
                </span>
                <div class="w-full text-center sm:text-left">
                    <h3 class="text-xl font-bold text-white ">Pengguna</h3>
                    <p class="text-xl font-bold leading-none text-white sm:text-2xl">
                        32</p>
                </div>
            </div>

            <div
                class="flex flex-col  items-center justify-center p-4 bg-customprimary-500 border border-gray-200 rounded-lg shadow-md sm:flex-row sm:p-6 dark:border-gray-700 hover:shadow-lg transition-shadow duration-300">
                <span class="text-white text-6xl md:mr-3 mr-0 ">
                    <span class="iconify" data-icon="mdi:handshake" data-inline="false"></span>
                </span>
                <div class="w-full text-center sm:text-left">
                    <h3 class="text-xl font-bold text-white ">Mitra</h3>
                    <p class="text-xl font-bold leading-none text-white sm:text-2xl">
                        44</p>
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
                        23</p>
                </div>
            </div>
        </div>

        <div class="grid w-full grid-cols-1 gap-y-5 lg:gap-x-5 mt-5 lg:grid-cols-3">
            <div
                class="flex flex-col col-span-2 items-center justify-center p-4 bg-customprimary-500 border border-gray-200 rounded-lg shadow-md sm:flex-row sm:p-6 dark:border-gray-700 hover:shadow-lg transition-shadow duration-300">
                <span class="text-white text-6xl md:mr-3 mr-0 ">
                    <span class="iconify" data-icon="iconoir:wallet-solid" data-inline="false"></span>
                </span>
                <div class="w-full text-center sm:text-left">
                    <h3 class="text-xl font-bold text-white ">Total Pemasukan</h3>
                    <p class="text-xl font-bold leading-none text-white sm:text-2xl">
                        Rp{{ number_format(230000, 0, ',', '.') }}</p>
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
                        Rp{{ number_format(40000, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>

        {{-- CHART --}}
        <div class="grid w-full grid-cols-1 gap-5  mt-8 h-full lg:grid-cols-3">
            <div class="bg-white border dark:border-gray-500 dark:bg-gray-800 shadow-md rounded-lg p-6 w-full  mx-auto col-span-2">
                <div class="flex justify-between items-center mb-3">
                    <h3 class="text-xl dark:text-white font-bold">Grafik Pemasukan</h3>
                    <div class="flex space-x-2 items-center">
                        <select class="text-sm border-gray-300 rounded px-2 py-1  focus:ring-customprimary-500 focus:border-customprimary-500">
                            <option>Tahun</option>
                        </select>
                        <select class="text-sm border-gray-300 rounded px-2 py-1 focus:ring-customprimary-500 focus:border-customprimary-500">
                            <option>2024</option>
                        </select>
                    </div>
                </div>
                <h4 class="text-xl font-bold text-customprimary-600">Rp 5.000.000</h4>
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
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov',
                        'Des'
                    ],
                    datasets: [{
                        label: 'Saldo Masuk',
                        data: [3, 4, 5, 3.5, 6, 7, 5, 6.5, 4.5, 5.5, 3.5, 4],
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
                    labels: ['LB Ambarukmo', 'LB Bantul', 'LB Ambarukmo', 'LB Bantul', 'LB Ambarukmo',
                        'Outlet Lainnya'
                    ],
                    datasets: [{
                        label: 'Jumlah Outlet',
                        data: [23, 15, 20, 10, 12, 25],
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
