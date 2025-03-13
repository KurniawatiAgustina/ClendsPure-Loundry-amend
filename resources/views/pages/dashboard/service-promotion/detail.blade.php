<div class="fixed inset-0 z-50 flex items-center hidden justify-center overflow-y-auto" id="detail-customer-modal{{ $data->id }}">
    <div class="relative w-full px-2 max-w-md md:max-w-4xl mx-auto my-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
            <!-- Modal header -->
            <div class="relative flex items-center px-5 py-8 border-b rounded-t dark:border-gray-700">
                <div class="absolute left-1/2 transform -translate-x-1/2 text-center ">
                    <h3 class="text-xl font-semibold dark:text-white">
                         Detail Promo Layanan
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
           <form action="{{ route('dashboard.service-promotion.update', ['id' => $data->id ]) }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="p-6 space-y-6 max-h-96 overflow-y-auto [&::-webkit-scrollbar]:w-1 [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-4">
                        @if (auth()->user()->role == 'Owner')
                            <div>
                                <label for="branch_id"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cabang</label>
                                <select name="branch_id" id="branch_id" class="block w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring-customprimary-500 focus:border-customprimary-500"
                                required>
                                    <option value="" disabled @if (!$data->branch_id) selected @endif>-- Pilih Cabang --</option>
                                    @foreach ($cabangs as $cabang)
                                        <option value="{{ $cabang->id }}" @if ($data->branch_id == $cabang->id) selected @endif>{{ $cabang->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @else
                            <input type="hidden" name="branch_id" value="{{ auth()->user()->branch_id }}">
                        @endif
                        <div>
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Promo</label>
                            <input type="text" id="name" name="name" disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                                value="{{ $data->name }}" required />
                        </div>
                        <div>
                            <label for="service_id"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Layanan</label>
                            <select name="service_id" id="service_id" class="block w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring-customprimary-500 focus:border-customprimary-500"
                            required>
                                <option value="" disabled @if (!$data->service_id) selected @endif>-- Pilih Layanan --</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}" @if ($service->id == $data->service_id) selected @endif>{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="discount_percetage"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Persentase Diskon(%)</label>
                            <input type="number" id="discount_percetage" name="discount_percetage" disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                                value="{{ $data->discount_percentage }}" required />
                        </div>
                        <div>
                            <label for="min_quantity"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Minimal Jumlah Pembelian</label>
                            <input type="number" id="min_quantity" name="min_quantity" disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                                value="{{ $data->min_quantity }}" required />
                        </div>
                        <div>
                            <label for="start_date"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Mulai</label>
                            <input type="date" id="start_date" name="start_date" disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                                value="{{ $data->start_date ? \Carbon\Carbon::parse($data->start_date)->format('Y-m-d') : '' }}" required />
                        </div>
                        <div>
                            <label for="end_date"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Berakhir</label>
                            <input type="date" id="end_date" name="end_date" disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                                value="{{ $data->end_date ? \Carbon\Carbon::parse($data->end_date)->format('Y-m-d') : '' }}" required />
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div
                    class="items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-700 flex justify-end space-x-2">
                    <button type="button" id="edit-btn" data-modal-id="detail-customer-modal{{ $data->id }}"
                        class="edit-btn inline-flex items-center px-3 py-2.5 text-xs font-medium text-center text-customprimary-700 border border-customprimary-700 rounded-lg hover:text-white hover:bg-customprimary-700 focus:ring-4 focus:ring-customblue-200 dark:text-white dark:border-none dark:bg-customprimary-600 dark:hover:bg-customprimary-700 dark:focus:ring-customprimary-800">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                            </path>
                            <path fill-rule="evenodd"
                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Edit
                    </button>
                    <button type="button" id="close-btn" data-modal-toggle="detail-customer-modal{{ $data->id }}"
                        class="close-btn inline-flex items-center px-3 py-2.5 text-xs font-medium text-center text-red-600 border border-red-600 rounded-lg hover:text-white hover:bg-red-600 focus:ring-4 focus:ring-red-300 dark:text-white dark:border-none dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Tutup
                    </button>
                    <button type="submit" id="submit-btn"
                        class="submit-btn hidden inline-flex items-center px-3 py-2.5 text-xs font-medium text-center text-customprimary-500 border border-customprimary-500 rounded-lg hover:text-white hover:bg-customprimary-500 focus:ring-4 focus:ring-customblue-200 dark:text-white dark:border-none dark:bg-customprimary-400 dark:hover:bg-customprimary-500 dark:focus:ring-customprimary-600">
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7" />
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
