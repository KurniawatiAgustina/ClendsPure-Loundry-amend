<div class="fixed inset-0 z-50 flex items-center hidden justify-center overflow-y-auto" id="add-customer-modal">
    <div class="relative w-full px-2 max-w-md md:max-w-4xl mx-auto my-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
            <div class="relative flex items-center px-5 py-8 border-b rounded-t dark:border-gray-700">
                <div class="absolute left-1/2 transform -translate-x-1/2 text-center ">
                    <h3 class="text-xl font-semibold dark:text-white">
                        Tambah Order Baru
                    </h3>
                </div>
                <button type="button"
                    class="ml-auto text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white"
                    data-modal-toggle="add-customer-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <form action="{{ route('dashboard.branch.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-6 space-y-6 max-h-96 overflow-y-auto [&::-webkit-scrollbar]:w-1 [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label for="nama"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                            <input type="text" name="nama" id="nama"
                                class="block w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring-customprimary-500 focus:border-customprimary-500"
                                required placeholder="Masukkan nama customer ">
                        </div>
                        <div>
                            <label for="alamat"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Provinsi</label>
                            <input type="text" name="alamat" id="alamat"
                                class="block w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring-customprimary-500 focus:border-customprimary-500"
                                required placeholder="Masukkan provinsi ">
                        </div>
                        <div>
                            <label for="no_hp"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Alamat
                            </label>
                            <input type="text" name="no_hp" id="no_hp"
                                class="block w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring-customprimary-500 focus:border-customprimary-500"
                                required placeholder="Masukkan alamat customer">
                        </div>
                        <div>
                            <label for="no_hp"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kabupaten
                            </label>
                            <input type="text" name="no_hp" id="no_hp"
                                class="block w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring-customprimary-500 focus:border-customprimary-500"
                                required placeholder="Masukkan kabupaten">
                        </div>
                        <div>
                            <label for="no_hp"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nomor Telepon
                            </label>
                            <input type="text" name="no_hp" id="no_hp"
                                class="block w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring-customprimary-500 focus:border-customprimary-500"
                                required placeholder="Masukkan nomor telepon">
                        </div>
                        <div>
                            <label for="no_hp"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kecamatan
                            </label>
                            <input type="text" name="no_hp" id="no_hp"
                                class="block w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring-customprimary-500 focus:border-customprimary-500"
                                required placeholder="Masukkan kecamatan">
                        </div>
                    </div>
                </div>
                <div
                    class="items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-700 flex justify-end space-x-2">
                    <button type="submit" id="submit-button"
                        class="inline-flex items-center px-3 py-2.5 text-xs font-medium text-center text-customprimary-500 border border-customprimary-500 rounded-lg hover:text-white hover:bg-customprimary-500 focus:ring-4 focus:ring-customblue-200 dark:text-white dark:border-none dark:bg-customprimary-600 dark:hover:bg-customprimary-700 dark:focus:ring-customprimary-900">
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7" />
                        </svg>
                        Submit
                    </button>

                    <button type="button" data-modal-toggle="add-customer-modal"
                        class="inline-flex items-center px-3 py-2.5 text-xs font-medium text-center text-red-600 border border-red-600 rounded-lg hover:text-white hover:bg-red-600 focus:ring-4 focus:ring-red-300 dark:text-white dark:border-none dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
