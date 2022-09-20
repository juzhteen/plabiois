<div wire:model="openQr"
    class="fixed inset-0 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center transition ease-in-out duration-500 @if ($openQr) opacity-100 @else opacity-0 @endif"
    style="z-index: @if (!$openQr) -999 @else 30 @endif ;">
    <!-- Modal -->
    <div class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl transition ease-in-out duration-500 @if ($openQr) opacity-100 transform translate-y-0 @else opacity-100 transform translate-y-1/2 @endif"
        role="dialog" id="modal">
        <form>
            <div class="mt-4 mb-6">
                <!-- Modal title -->
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                    Download or send QR
                </p>

                <div class="visible-print text-center border-2 border-gray-300 flex justify-center">
                    <img src="data:image/png;base64,
                        {{ base64_encode(
                            QrCode::size(200)
                                ->style('round')
                                ->eye('circle')
                                ->margin(5)
                                ->errorCorrection('L')
                                ->format("png")
                                ->generate(". $emp_code ."))
                        }}
                    ">
               </div>   
              
            </div>
            <footer
                class="flex flex-col items-center justify-end px-5 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                <a href="{{ asset('qrcodes/'. $emp_code .'.png') }}" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white sm:px-4 sm:py-2 sm:w-auto transition-colors duration-150 bg-green-400 border border-transparent rounded-md active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green" download>
                    Download QR
                </a>
                <button wire:click.prevent="closeQrModal()"
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Close
                </button>
            </footer>
        </form>
    </div>
</div>