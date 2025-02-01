<div class="fixed inset-0 z-50 flex items-center hidden justify-center overflow-y-auto" id="detail-customer-modal{{ $data->id }}">
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
            <form action="{{ route('dashboard.order.update', ['id' => 1 ]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-6 space-y-6 max-h-96 overflow-y-auto [&::-webkit-scrollbar]:w-1 [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-4">
                        <div>
                            <label for="nama"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Customer</label>
                            <input type="text" id="nama" name="nama" disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                                value="{{ $data->nama }}" required />
                        </div>
                        <div>
                            <label for="role"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                            <input type="text" id="role" name="role" disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                                value="{{ $data->provinsi }}" required />
                        </div>
                        <div>
                            <label for="alamat"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                            <input type="text" id="alamat" name="alamat" disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                                value="{{ $data->alamat }}" required />
                        </div>
                        <div>
                            <label for="role"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">kabupaten</label>
                            <input type="text" id="role" name="role" disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                                value="{{ $data->kabupaten }}" required />
                        </div>
                        <div>
                            <label for="no_hp"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No HP</label>
                            <input type="text" id="no_hp" name="no_hp" disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                                value="{{ $data->no_hp }}" required />
                        </div>
                        <div>
                            <label for="role"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                            <input type="text" id="role" name="role" disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                                value="{{ $data->kecamatan }}" required />
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div
                    class="items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-700 flex justify-end space-x-2">
                    <button type="button" id="edit-btn" data-modal-id="detail-customer-modal{{ $data->id }}"
                        class="inline-flex items-center px-3 py-2.5 text-xs font-medium text-center text-customprimary-700 border border-customprimary-700 rounded-lg hover:text-white hover:bg-customprimary-700 focus:ring-4 focus:ring-customblue-200 dark:text-white dark:border-none dark:bg-customprimary-600 dark:hover:bg-customprimary-700 dark:focus:ring-customprimary-800">
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
                        class="inline-flex items-center px-3 py-2.5 text-xs font-medium text-center text-red-600 border border-red-600 rounded-lg hover:text-white hover:bg-red-600 focus:ring-4 focus:ring-red-300 dark:text-white dark:border-none dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Tutup
                    </button>
                    <button type="submit" id="submit-btn"
                        class="hidden inline-flex items-center px-3 py-2.5 text-xs font-medium text-center text-customprimary-500 border border-customprimary-500 rounded-lg hover:text-white hover:bg-customprimary-500 focus:ring-4 focus:ring-customblue-200 dark:text-white dark:border-none dark:bg-customprimary-400 dark:hover:bg-customprimary-500 dark:focus:ring-customprimary-600">
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7" />
                        </svg>
                        Submit
                    </button>
                    <button type="button" id="cancel-btn" data-modal-id="detail-customer-modal{{ $data->id }}"
                        class="hidden inline-flex items-center px-3 py-2.5 text-xs font-medium text-center text-red-600 border border-red-600 rounded-lg hover:text-white hover:bg-red-600 focus:ring-4 focus:ring-red-300 dark:text-white dark:border-none dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
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
