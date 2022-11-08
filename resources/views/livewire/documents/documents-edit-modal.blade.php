<div class="fixed inset-0 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center transition ease-in-out duration-500 @if ($openEdit) opacity-100 @else opacity-100 @endif"
    style="z-index: @if (!$openEdit) -999 @else 30 @endif ;">
    <!-- Modal -->
    <div class="resident-edit-modal w-full px-6 py-4 overflow-y-auto bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl transition ease-in-out duration-500 @if ($openEdit) opacity-100 transform translate-y-0 @else opacity-100 transform translate-y-1/2 @endif"
        role="dialog" id="modal">

        <form>
            <div class="mt-4 mb-6">
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    @if ($document_id)
                        Edit document {{ $title }}
                    @else
                        Add document
                    @endif
                </h2>

                <label class="block text-sm mt-4">
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Title" type="text" wire:model="title" id="title" />
                </label>

                <label class="block text-sm mt-4">
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Description" type="text" wire:model="description" id="description" />
                </label>

                <label class="block text-sm mt-4">
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="File" type="file" wire:model="file" id="file{{ $iteration }}" /><br>
                    @if($document_id)
                        <span class="text-red-500">Leave this field if you do not want to replace the uploaded file</span>
                    @endif
                </label>

            </div>
            <footer
                class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                <button wire:click.prevent="closeEditModal()"
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Cancel
                </button>
                @if ($document_id)
                    <button
                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"
                        wire:click.prevent="update()" type="button">
                        Save
                    </button>
                @else
                    <button
                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"
                        wire:click.prevent="store()" type="button">
                        Save
                    </button>
                @endif
            </footer>
        </form>
    </div>
</div>
