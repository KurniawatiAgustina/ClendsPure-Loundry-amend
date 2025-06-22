<div class="fixed inset-0 z-50 flex items-center hidden justify-center overflow-y-auto"
    id="detail-customer-modal{{ $data->id }}">
    <div class="relative w-full px-2 max-w-md md:max-w-4xl mx-auto my-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
            <!-- Modal header -->
            <div class="relative flex items-center px-5 py-8 border-b rounded-t dark:border-gray-700">
                <div class="absolute left-1/2 transform -translate-x-1/2 text-center ">
                    <h3 class="text-xl font-semibold dark:text-white">
                        Detail Order
                    </h3>
                </div>

                <button type="button"
                    class="ml-auto text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white"
                    data-modal-toggle="detail-customer-modal{{ $data->id }}">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{ route('dashboard.order.update', ['id' => $data->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div
                    class="p-6 space-y-6 max-h-96 overflow-y-auto [&::-webkit-scrollbar]:w-1 [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-x-8 gap-y-4">
                        <div>
                            <label for="nama"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Customer</label>
                            <input type="text" id="nama" name="nama" disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                                value="{{ $data->customer->name }}" required />
                        </div>
                        <div>
                            <label for="phone"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                                Customer</label>
                            <input type="text" id="phone" name="phone" disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                                value="{{ $data->customer->phone }}" required />
                        </div>
                        <div>
                            <label for="address"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                                Customer</label>
                            <input type="text" id="address" name="address" disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                                value="{{ $data->customer->address }}" required />
                        </div>
                        <div>
                            <label for="role"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cabang</label>
                            <input type="text" id="role" name="role" disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                                value="{{ $data->branch->name }}" required />
                        </div>
                        <div>
                            <label for="alamat"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                            <input type="text" id="alamat" name="alamat" disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                                value="{{ $data->category }}" required />
                        </div>
                        <div>
                            <label for="role"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Metode
                                Pembayaran</label>
                            <input type="text" id="role" name="role" disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                                value="{{ $data->payment_method == 'Cash' ? 'Cash' : 'Transfer - ' . $data->paymentMethod->bank_name . ' - ' . $data->paymentMethod->account_name . ' - ' . $data->paymentMethod->account_number }}"
                                required />
                        </div>
                        <div>
                            <label for="no_hp"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Harga</label>
                            <input type="text" id="no_hp" name="no_hp" disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                                value="{{ $data->total_price }}" required />
                        </div>
                        <div>
                            <label for="role"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                            <input type="text" id="role" name="role" disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                                value="{{ $data->status }}" required />
                        </div>
                        <div>
                            <label for="note"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan</label>
                            <input type="text" id="note" name="note" disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                                value="{{ $data->note ?? '' }}" required />
                        </div>
                        <div class="grid grid-cols-1 gap-x-4">
                            <label for="role"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Detail</label>
                            <div class="border rounded-lg border-gray-300 dark:border-gray-600">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead
                                        class="sticky top-0 z-10 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 border-gray-50 dark:border-gray-700 rounded-tl-lg">
                                                Layanan
                                            </th>
                                            <th scope="col" class="px-6 py-3 border-gray-50 dark:border-gray-700">
                                                Jumlah
                                            </th>
                                            <th scope="col" class="px-6 py-3 border-gray-50 dark:border-gray-700">
                                                Subtotal
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data->details as $item)
                                            <tr
                                                class="bg-white {{ $loop->last ? '' : 'border-b' }} dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white {{ $loop->last ? 'rounded-bl-lg' : '' }}">
                                                    {{-- {{ $item->is_promo == '1' && $item->service_promotion ? $item->service->name . ' - ' . $item->service_promotion->name . ' (' . $item->service_promotion->discount_percentage . '%)' : $item->service->name }} --}}
                                                    {{ $item->service->name ?? '' }} {{ $item->service_promotion->name ?? '' }}
                                                </th>
                                                <td class="px-6 py-4">{{ $item->quantity }}</td>
                                                <td class="px-6 py-4">
                                                    {{ 'Rp ' . number_format($item->subtotal, 0, ',', '.') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div
                    class="items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-700 flex justify-end space-x-2">
                    <button type="button"
                        class="@if (auth()->user()->role == 'Customer' || auth()->user()->role == 'Owner') hidden @endif ubah-catatan-btn inline-flex items-center px-3 py-2 text-xs font-medium text-center text-blue-600 border border-blue-600 rounded-lg hover:text-white hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 dark:text-white dark:border-none dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900"
                        data-modal-toggle="ubah-catatan-modal{{ $data->id }}" data-modal-target="ubah-catatan-modal{{ $data->id }}">
                        Ubah Catatan
                    </button>
                    <button type="button" onclick="location.href='{{ route('dashboard.order.notification', $data->id) }}'"
                        class="@if (auth()->user()->role == 'Customer' || auth()->user()->role == 'Owner') hidden @endif close-btn inline-flex items-center px-3 py-2.5 text-xs font-medium text-center text-green-600 border border-green-600 rounded-lg hover:text-white hover:bg-green-600 focus:ring-4 focus:ring-green-300 dark:text-white dark:border-none dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">
                        Notif Selesai
                    </button>
                    <button type="button" onclick="location.href='{{ route('dashboard.order.send-invoice', $data->id) }}'"
                        class="@if (auth()->user()->role == 'Customer' || auth()->user()->role == 'Owner') hidden @endif close-btn inline-flex items-center px-3 py-2.5 text-xs font-medium text-center text-green-600 border border-green-600 rounded-lg hover:text-white hover:bg-green-600 focus:ring-4 focus:ring-green-300 dark:text-white dark:border-none dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">
                        Kirim Nota Whatsapp
                    </button>
                    <a href="{{ route('dashboard.order.invoice', $data->id) }}" style="text-decoration: none">
                        <button type="button"
                            class="close-btn inline-flex items-center px-3 py-2.5 text-xs font-medium text-center text-green-600 border border-green-600 rounded-lg hover:text-white hover:bg-green-600 focus:ring-4 focus:ring-green-300 dark:text-white dark:border-none dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">
                            Download Nota
                        </button>
                    </a>
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown{{ $data->id }}"
                        class="@if (auth()->user()->role == 'Customer' || auth()->user()->role == 'Owner') hidden @endif inline-flex items-center px-4 py-2 text-xs font-medium text-center text-customprimary-500 border border-customprimary-500 rounded-lg hover:text-white hover:bg-customprimary-500 focus:ring-4 focus:ring-custompurple-200 dark:text-white dark:border-none dark:bg-customprimary-600 dark:hover:bg-customprimary-700 dark:focus:ring-customprimary-800"
                        type="button">Ubah Status <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <div id="dropdown{{ $data->id }}"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownDefaultButton">
                            <li @if ($data->status == 'New') class="hidden" @endif>
                                <a href="{{ route('dashboard.order.change-status', ['id' => $data->id, 'status' => 'New']) }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">New</a>
                            </li>
                            <li @if ($data->status == 'Processing') class="hidden" @endif>
                                <a href="{{ route('dashboard.order.change-status', ['id' => $data->id, 'status' => 'Processing']) }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Processing</a>
                            </li>
                            <li @if ($data->status == 'Delivered') class="hidden" @endif>
                                <a href="{{ route('dashboard.order.change-status', ['id' => $data->id, 'status' => 'Delivered']) }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delivered</a>
                            </li>
                            <li @if ($data->status == 'Cancelled') class="hidden" @endif>
                                <a href="{{ route('dashboard.order.change-status', ['id' => $data->id, 'status' => 'Cancelled']) }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Cancelled</a>
                            </li>
                        </ul>
                    </div>
                    <button type="button" id="close-btn"
                        data-modal-toggle="detail-customer-modal{{ $data->id }}"
                        class="close-btn inline-flex items-center px-3 py-2.5 text-xs font-medium text-center text-red-600 border border-red-600 rounded-lg hover:text-white hover:bg-red-600 focus:ring-4 focus:ring-red-300 dark:text-white dark:border-none dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Tutup
                    </button>
                    <button type="submit" id="submit-btn"
                        class="submit-btn hidden inline-flex items-center px-3 py-2.5 text-xs font-medium text-center text-customprimary-500 border border-customprimary-500 rounded-lg hover:text-white hover:bg-customprimary-500 focus:ring-4 focus:ring-customblue-200 dark:text-white dark:border-none dark:bg-customprimary-400 dark:hover:bg-customprimary-500 dark:focus:ring-customprimary-600">
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Submit
                    </button>
                    <button type="button" id="cancel-btn" data-modal-id="detail-customer-modal{{ $data->id }}"
                        class="cancel-btn hidden inline-flex items-center px-3 py-2.5 text-xs font-medium text-center text-red-600 border border-red-600 rounded-lg hover:text-white hover:bg-red-600 focus:ring-4 focus:ring-red-300 dark:text-white dark:border-none dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Change Note -->
<div class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto hidden"
    id="ubah-catatan-modal{{ $data->id }}">
    <div class="relative w-full max-w-md mx-auto px-4">
        <div class="bg-white rounded-lg shadow dark:bg-gray-800">
            <div class="flex items-center justify-between px-5 py-3 border-b dark:border-gray-700">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Ubah Catatan</h3>
                <button type="button" data-modal-toggle="ubah-catatan-modal{{ $data->id }}"
                    class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
                    &times;
                </button>
            </div>
            <form action="{{ route('dashboard.order.change-note', ['id' => $data->id]) }}" method="POST" class="p-6 space-y-4">
                @csrf
                <div>
                    <textarea id="note_input_{{ $data->id }}" name="note"
                        class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        rows="4">{{ $data->note ?? '' }}</textarea>
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button"
                        class="cancel-ubah-btn inline-flex px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700"
                        data-modal-toggle="ubah-catatan-modal{{ $data->id }}">
                        Cancel
                    </button>
                    <button type="submit"
                        class="submit-ubah-btn inline-flex px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
