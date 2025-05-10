@extends('layouts.dashboard')
@section('content')
    <div class="px-4 pt-4 bg-white block sm:flex items-center justify-between lg:mt-1.5 dark:bg-gray-800">
        <div class="w-full pb-1">
            <div class="pb-4">
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
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Buat Pesanan Baru</h1>
            </div>
        </div>
    </div>
    <div class="dark:bg-gray-800 bg-white">
        <div class="gap-4 px-4 pb-4">
            <form action="{{ route('dashboard.online-order.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="customer_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                    <input type="text" id="customer_name" name="customer_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                        />
                </div>
                <div class="mb-3">
                    <label for="customer_phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Telephone</label>
                    <input type="text" id="customer_phone" name="customer_phone"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                        />
                </div>
                <div class="mb-3">
                    <label for="customer_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                    <input type="text" id="customer_address" name="customer_address"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                        />
                </div>
                <div class="mb-3">
                    <label for="branch_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Cabang</label>
                    <select name="branch_id" id="branch_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500">
                        <option value="" selected disabled>-- Pilih Cabang --</option>
                        @foreach ($branches as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div id="orderItemsContainer">
                    <div class="mb-3 gap-x-1">
                        <div class="">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Layanan</label>
                            <select id="productSelect"
                            class="productSelect bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500">
                                <option disabled selected>-- Pilih Layanan --</option>
                                @foreach ($items as $item)
                                    <option value="{{ $loop->index }}" data-id="{{ $item->id }}" data-is-promo="{{ $item->is_promo }}" data-price="{{ $item->price }}">{{ $item->name }} - {{ 'Rp ' . number_format($item->price, 0, ',', '.') }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="hidden" name="details[0][product_id]">
                            <input type="hidden" name="details[0][service_promotions_id]">
                            <input type="hidden" name="details[0][is_promo]">
                        </div>
                        <div class="">
                            <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                            <input type="text" id="quantity" name="details[0][quantity]"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                                />
                        </div>
                        <div class="">
                            <label for="subtotal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subtotal</label>
                            <input type="text" id="subtotal" name="details[0][subtotal]" readonly
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                                />
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="button"
                        class="inline-flex items-center justify-center w-full px-4 py-2 text-xs font-medium text-customprimary-500 border border-customprimary-500 rounded-lg hover:text-white hover:bg-customprimary-500 focus:ring-4 focus:ring-custompurple-200 dark:text-white dark:border-none dark:bg-customprimary-600 dark:hover:bg-customprimary-700 dark:focus:ring-customprimary-800">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-2">
                        <path fill="currentColor" d="M11 13H5v-2h6V5h2v6h6v2h-6v6h-2z"/>
                        </svg>
                        Tambah
                    </button>
                </div>
                <div class="mb-3">
                    <label for="total_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Harga</label>
                    <input type="text" id="total_price" name="total_price" readonly
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                        />
                </div>
                <div class="mb-3">
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Layanan</label>
                    <select name="category" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500">
                        <option value="" selected disabled>-- Pilih Jenis Layanan --</option>
                        <option value="AntarJemput">AntarJemput</option>
                        <option value="AntarSaja">AntarSaja</option>
                        <option value="JemputSaja">JemputSaja</option>
                        <option value="Mandiri">Mandiri</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="payment_method_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Opsi Pembayaran</label>
                    <input type="hidden" name="payment_method" value="">
                    <select name="payment_method_id" id="payment_method_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500">
                        <option value="" selected disabled>-- Pilih Pembayaran --</option>
                        <option value="" data-type="Cash">Cash</option>
                        @foreach ($paymentMethodsAvailable as $item)
                            <option value="{{ $item->id }}" data-type="Transfer">{{ $item->bank_name }}({{ $item->account_name }}) - {{ $item->account_number }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <button type="submit"
                        class="inline-flex items-center justify-center w-full px-4 py-2 text-xs font-medium text-customprimary-500 border border-customprimary-500 rounded-lg hover:text-white hover:bg-customprimary-500 focus:ring-4 focus:ring-custompurple-200 dark:text-white dark:border-none dark:bg-customprimary-600 dark:hover:bg-customprimary-700 dark:focus:ring-customprimary-800">
                        Pesan Sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
$(document).ready(function() {
  // Tambah baris baru dengan index yang konsisten
  $('button:contains("Tambah")').on('click', function() {
  const $container = $('#orderItemsContainer');
  const $first     = $container.find('.mb-3.gap-x-1').first();
  const idx        = $container.find('.mb-3.gap-x-1').length;
  const $clone     = $first.clone();

  // reset selects & inputs
  $clone.find('select.productSelect').val(null);
  $clone.find('input, select').each(function() {
    // match details[<any index>][<field>]
    const m = this.name.match(/details\[\d+\]\[(.+)\]/);
    if (m) {
      const field = m[1];
      this.name  = `details[${idx}][${field}]`;
    }
    $(this).val('');
  });

  $container.append($clone);
  updateTotalHarga();
});

  // Handle promo vs non-promo per baris
  $('#orderItemsContainer').on('change', 'select.productSelect', function() {
    const $opt    = $(this).find('option:selected');
    const isPromo = $opt.data('is-promo') ? 1 : 0;
    const dataId  = $opt.data('id') || '';
    const $grp    = $(this).closest('.mb-3.gap-x-1');

    $grp.find('input[name^="details"][name$="[is_promo]"]').val(isPromo);
    if (isPromo) {
      $grp.find('input[name^="details"][name$="[service_promotions_id]"]').val(dataId);
      $grp.find('input[name^="details"][name$="[product_id]"]').val('');
    } else {
      $grp.find('input[name^="details"][name$="[product_id]"]').val(dataId);
      $grp.find('input[name^="details"][name$="[service_promotions_id]"]').val('');
    }
  });

  $('#orderItemsContainer').on('input change', 'select.productSelect, input[name^="details"][name$="[quantity]"]', function() {
    const $row     = $(this).closest('.mb-3.gap-x-1');
    const price    = Number($row.find('select.productSelect option:selected').data('price')) || 0;
    const qty      = parseInt($row.find('input[name^="details"][name$="[quantity]"]').val(), 10) || 0;
    const subtotal = price * qty;
    $row.find('input[name^="details"][name$="[subtotal]"]')
        .val(subtotal);
    updateTotalHarga();
  });

  function updateTotalHarga() {
    let total = 0;
    $('#orderItemsContainer input[name^="details"][name$="[subtotal]"]').each(function() {
      const raw = $(this).val().replace(/[^0-9]/g, '');
      total += parseInt(raw, 10) || 0;
    });
    $('#total_price').val(total);
  }

  updateTotalHarga();

  $('select#payment_method_id').on('change', function() {
    const type = $(this).find('option:selected').data('type') || '';
    $('input[name="payment_method"]').val(type);
  });
});
</script>

@endpush
