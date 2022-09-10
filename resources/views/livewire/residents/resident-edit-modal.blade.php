<div class="fixed inset-0 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center transition ease-in-out duration-500 @if ($openEdit) opacity-100 @else opacity-100 @endif"
    style="z-index: @if (!$openEdit) -999 @else 30 @endif ;">
    <!-- Modal -->
    <div class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl transition ease-in-out duration-500 @if ($openEdit) opacity-100 transform translate-y-0 @else opacity-100 transform translate-y-1/2 @endif"
        role="dialog" id="modal">

        <form>
            <div class="mt-4 mb-6">
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    @php
                        if($resident_id){
                        echo "EDIT RESIDENT RECORD";
                        }else{
                        echo "ADD RESIDENT RECORD";
                        }
                    @endphp
                </h2>

                <label class="block text-sm mt-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        Name
                    </span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Name" type="text" wire:model="name" id="name" required/>
                </label>

                <label class="block text-sm mt-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        Age
                    </span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Age" type="number" wire:model="age" id="age" required />
                </label>

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Gender
                    </span>
                    <select
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" wire:model="gender" id="sex" required>
                        <option value="">Please select gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="I prefer not to say">I prefer not to say</option>
                    </select>
                </label>

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Civil status
                    </span>
                    <select
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" wire:model="civil_status" id="civil_status" required>
                        <option value="">Please select civil status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Separated">Separated</option>
                    </select>
                </label>

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Religion
                    </span>
                    <select
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" wire:model="religion" id="religion" required>
                        <option value="">Please select religion</option>
                        <option value="Roman Catholic">Roman Catholic</option>
                        <option value="Islam">Islam</option>
                        <option value="Evangelicals (PCEC)">Evangelicals (PCEC)</option>
                        <option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
                        <option value="Non-Roman Catholic and Protestant (NCCP)">Non-Roman Catholic and Protestant (NCCP)</option>
                        <option value="Aglipayan">Aglipayan</option>
                        <option value="Seventh-day Adventist">Seventh-day Adventist</option>
                        <option value="Bible Baptist Church">Bible Baptist Church</option>
                        <option value="United Church of Christ in the Philippines">United Church of Christ in the Philippines</option>
                        <option value="Jehovah's Witnesses">Jehovah's Witnesses</option>
                    </select>
                </label>

                <label class="block text-sm mt-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        Weight in KG
                    </span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Weight" type="number" wire:model="weight" id="weight" />
                </label>

                <label class="block text-sm mt-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        Height in CM
                    </span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Height" type="number" wire:model="height" id="height" />
                </label>

                <label class="block text-sm mt-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        Purok #
                    </span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Purok" type="number" wire:model="purok" id="purok" />
                </label>

            </div>
            <footer
                class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                <button wire:click.prevent="closeEditModal()"
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Cancel
                </button>
                <button
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"
                    wire:click.prevent="store()" type="button">
                    Save
                </button>
            </footer>
        </form>
    </div>
</div>
