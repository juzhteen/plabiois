<div wire:model="openDelete"
    class="fixed inset-0 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center transition ease-in-out duration-500 @if ($openDelete) opacity-100 @else opacity-0 @endif"
    style="z-index: @if (!$openDelete) -999 @else 30 @endif ;">
    <!-- Modal -->
    <div class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl transition ease-in-out duration-500 @if ($openDelete) opacity-100 transform translate-y-0 @else opacity-100 transform translate-y-1/2 @endif"
        role="dialog" id="modal">
        <form>
            <div class="mt-4 mb-6">
                <!-- Modal title -->
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                    Continue deleting resident {{ $name }}?
                </p>
                <!-- Modal description -->

            </div>
            <footer
                class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                <button wire:click.prevent="closeDeleteModal()"
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Cancel
                </button>
                <button
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"
                    wire:click.prevent="delete()" type="button">
                    Delete
                </button>
            </footer>
        </form>
    </div>
</div>