@extends('layouts.dashboard')
@section('content')
    <div class="px-4 pt-4 bg-white block sm:flex items-center justify-between lg:mt-1.5 dark:bg-gray-800">
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
                                <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">Kasir</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Kasir Penjualan</h1>
            </div>
        </div>
    </div>
    <div class="dark:bg-gray-800 bg-white">
        <div class="flex gap-4 px-4 pb-4">
            <div class="basis-[65%] border rounded-lg border-gray-300 dark:border-gray-600 flex flex-col h-[34rem]">
                <!-- Section Table -->
                <div class="overflow-x-auto flex-1 no-scrollbar">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead
                            class="sticky top-0 z-10 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 border-gray-50 dark:border-gray-700 rounded-tl-lg">
                                    Layanan
                                </th>
                                <th scope="col" class="px-6 py-3 border-gray-50 dark:border-gray-700">
                                    Jumlah
                                </th>
                                <th scope="col" class="px-6 py-3 border-gray-50 dark:border-gray-700">
                                    Harga Satuan
                                </th>
                                <th scope="col" class="px-6 py-3 border-gray-50 dark:border-gray-700 rounded-tr-lg">
                                    Total Harga
                                </th>
                                <th scope="col" class="px-6 py-3 border-gray-50 dark:border-gray-700 rounded-tr-lg">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody id="cartTableBody">
                        </tbody>
                    </table>
                </div>
                <!-- Form tambah produk yang menempel di bawah -->
                <div class="border rounded-b-lg dark:border-gray-700 border-gray-200 bg-gray-50 dark:bg-gray-700">
                    <div class="flex mx-2 my-1 gap-2">
                        <select id="productSelect"
                            class="basis-[75%] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500">
                            <option disabled selected>-- Pilih Layanan --</option>
                            @foreach ($items as $item)
                                <option value="{{ $item->id }}" data-is-promo="{{ $item->is_promo }}" data-price="{{ $item->price }}">{{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        <input type="number" id="jumlah" placeholder="Jumlah" value="1"
                            class="basis-[20%] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500" />
                        <button type="button" id="btnAddProduct"
                            class="basis-[5%] text-white bg-customprimary-700 hover:bg-customprimary-800 focus:ring-4 focus:ring-customprimary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-customprimary-600 dark:hover:bg-customprimary-700 focus:outline-none dark:focus:ring-customprimary-800">+</button>
                    </div>
                </div>
            </div>

            <div class="basis-[35%] border rounded-lg border-gray-300 dark:border-gray-600 h-full">
                <div class="mx-3 my-2">
                    <div class="mb-2">
                        <label for="customer_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Customer</label>
                        <input type="text" id="customer_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500" />
                    </div>
                    <div class="mb-2">
                        <label for="customer_phone"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Telepon</label>
                        <input type="text" id="customer_phone"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500" />
                    </div>
                    <div class="mb-2">
                        <label for="customer_address"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                        <input type="text" id="customer_address"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500" />
                    </div>
                </div>
                <hr class="border-gray-200 dark:border-gray-600 mx-3">
                <div class="mx-3 my-2">
                    <div class="mb-2">
                        <label for="total-harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
                            Harga</label>
                        <input type="text" id="total-harga" readonly
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500" />
                    </div>
                    <div class="mb-2">
                        <label for="bayar"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bayar</label>
                        <input type="text" id="bayar"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500" />
                    </div>
                    <div class="mb-2">
                        <label for="kembali"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kembalian</label>
                        <input type="text" id="kembali" readonly
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500" />
                    </div>
                    <button type="button" id="btnSave"
                        class="w-full text-white bg-customprimary-700 hover:bg-customprimary-800 focus:ring-4 focus:ring-customprimary-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-customprimary-600 dark:hover:bg-customprimary-700 focus:outline-none dark:focus:ring-customprimary-800">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('#productSelect').select2({
            theme: 'tailwindcss-3',
        });
        $('#productSelect').on('select2:open', function () {
            console.log('Select2 opened');
            $('.select2-search__field').focus();
        });

        const rawItems = @json($items);

        const itemsData = {};
        rawItems.forEach(item => {
            itemsData[item.id] = {
                id: item.id,
                name: item.name,
                price: item.price,
                is_promo: item.is_promo
            };
        });

        $(document).ready(function() {
            $('#btnAddProduct').on('click', function() {
                const productId = $('#productSelect').val();
                const quantity = parseInt($('#jumlah').val(), 10);

                if (!productId || productId === "-- Pilih Produk --") {
                    alert("Silahkan pilih produk.");
                    return;
                }
                if (!quantity || quantity < 1) {
                    alert("Jumlah produk tidak valid.");
                    return;
                }

                const productInfo = itemsData[productId];
                if (!productInfo) {
                    alert("Data produk tidak ditemukan.");
                    return;
                }

                const productName = productInfo.name;
                const unitPrice = productInfo.price;
                const totalPrice = unitPrice * quantity;

                const newRow = `
                    <tr data-product-id="${productId}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        ${productName}
                        </th>
                        <td class="px-6 py-4">${quantity}</td>
                        <td class="px-6 py-4">Rp ${unitPrice.toLocaleString('id-ID')}</td>
                        <td class="px-6 py-4">Rp ${totalPrice.toLocaleString('id-ID')}</td>
                        <td class="px-6 py-4">
                        <button type="button" class="font-medium text-red-600 dark:text-red-500 btn-delete">Hapus</button>
                        </td>
                    </tr>
                    `;

                $('#cartTableBody').append(newRow);

                $('#productSelect').val("").trigger('change');
                $('#jumlah').val(1);

                updateTotalPayment();
            });

            $('#cartTableBody').on('click', '.btn-delete', function() {
                $(this).closest('tr').remove();
                updateTotalPayment();
            });

            function updateTotalPayment() {
                let grandTotal = 0;
                $('#cartTableBody tr').each(function() {
                    const totalText = $(this).find('td:nth-child(4)').text();
                    const numericVal = parseInt(totalText.replace('Rp ', '').replace(/\./g, ''), 10);
                    grandTotal += numericVal;
                });
                $('#total-harga').val("Rp " + grandTotal.toLocaleString('id-ID'));
            }

            function formatRupiah(number) {
                return "Rp " + number.toLocaleString('id-ID');
            }

            function unformatRupiah(formatted) {
                return parseInt(formatted.replace(/Rp\s?/, '').replace(/\./g, ''), 10) || 0;
            }

            $("#bayar").on('input', function() {
                let rawBayar = $(this).val();
                let cleanedBayar = rawBayar.replace(/[^0-9]/g, '');
                let bayar = parseInt(cleanedBayar, 10) || 0;

                let rawTotal = $("#total-harga").val();
                let cleanedTotal = rawTotal.replace(/[^0-9]/g, '');
                let total = parseInt(cleanedTotal, 10) || 0;

                let change = bayar - total;
                if (change < 0) {
                    change = 0;
                }
                $("#kembali").val(formatRupiah(change));
            });

            $("#bayar").on('blur', function() {
                let rawBayar = $(this).val();
                let cleanedBayar = rawBayar.replace(/[^0-9]/g, '');
                if (cleanedBayar !== '') {
                    let bayar = parseInt(cleanedBayar, 10);
                    $(this).val(formatRupiah(bayar));
                }
            });

            $('#btnSave').on('click', function() {
                let items = [];
                $('#cartTableBody tr').each(function() {
                    let productId    = $(this).data('product-id');
                    let quantityText = $(this).find('td:nth-child(2)').text();
                    let quantity     = parseInt(quantityText, 10) || 0;
                    items.push({
                        product_id: Number(productId),
                        quantity: quantity
                    });
                });

                let total = unformatRupiah($('#total-harga').val());
                let payment_amount = unformatRupiah($('#bayar').val());
                let change_amount = unformatRupiah($('#kembali').val());

                if (payment_amount < total) {
                    const Toast2 = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast2.fire({
                        icon: "error",
                        title: "Jumlah bayar masih kurang!"
                    });
                    return;
                }

                const dataPayload = {
                    items: items,
                    total: total,
                    payment_amount: payment_amount,
                    change_amount: change_amount,
                };

                console.log(dataPayload);
                $.ajax({
                    type: 'POST',
                    url: '{{ route('dashboard.order.store') }}',
                    data: dataPayload,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log('Transaksi berhasil disimpan!', response);
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "success",
                            title: "Transaksi berhasil disimpan!"
                        });
                    },
                    error: function(xhr) {
                        console.error('Gagal menyimpan transaksi:', xhr.responseText);
                    }
                });
            });
        });
    </script>
@endpush
@push('styles')
    <style>
        .select2-container--tailwindcss-3 .select2-results__option--highlighted {
            background-color: #ff9000 !important;
        }

        .select2-container--tailwindcss-3.select2-container--focus .select2-selection--single {
            border-color: #ff9000 !important;
            --tw-ring-color: #ff9000 !important;
        }
        .select2-container--tailwindcss-3.select2-container--open .select2-dropdown--above {
            height: 200px !important;
            overflow-y: hidden !important;
        }
        .select2-dropdown .select2-results .select2-results__options{
            scrollbar-width: none !important;
        }
        /* .select2-dropdown {
            display: flex !important;
            flex-direction: column !important;
        }

        .select2-dropdown .select2-search {
            order: 2 !important;
        }

        .select2-dropdown .select2-results {
            order: 1 !important;
        } */
    </style>
@endpush
