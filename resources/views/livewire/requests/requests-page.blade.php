<div>
    @include('livewire.requests.request-delete-modal')
    @include('livewire.requests.request-accept-modal')
    @include('livewire.requests.request-complete-modal')
    <!-- Cards -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                  </svg>
            </div>
            <div>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    @if($requests->count() == 1)
                        1 request
                    @else
                        {{ $requests->count() }} requests
                    @endif
                </p>
            </div>
        </div>
    </div>

    @include('livewire.includes.search', ["fields" => [
        "residents.name" => "Name",
        "forms.form_name" => "Form"
    ]])

<div class="flex justify-between shadow-xs p-3 rounded-lg mb-5 mt-10">
    <div class="w-full flex justify-between align-center">
        <div class="flex">
            <div class="w-96 relative inset-y-0 flex items-center pl-2 mr-5">
                <label class="dark:text-white mr-5 w-40">Select date</label>
                <input wire:model.debounce.2000ms="request_date"
                class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-200 border-blue-500 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input"
                type="date" aria-label="Select date" />
                <a wire:click="reset_date" class="cursor-pointer ml-5">Clear</a>
            </div>
        </div>
    </div>
</div>

    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xl">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="bg-blue-100 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">
                            <span class="flex flex-col">
                                Resident profile
                                <div class="flex flex-row">@include('livewire.includes.order-by', ["field" => 'residents.name'])</div>
                            </span>
                        </th>
                        <th class="px-4 py-3">
                            <span class="flex flex-col">
                                Form
                                <div class="flex flex-row">@include('livewire.includes.order-by', ["field" => 'forms.form_name'])</div>
                              </span>
                        </th>
                        <th class="px-4 py-3">
                            <span class="flex flex-col">
                                Request date
                                <div class="flex flex-row">@include('livewire.includes.order-by', ["field" => 'request_date'])</div>
                              </span>
                        </th>
                        <th class="px-4 py-3">
                            <span class="flex flex-col">
                                Expiration date
                                <div class="flex flex-row">@include('livewire.includes.order-by', ["field" => 'expiration_date'])</div>
                            </span>
                        </th>
                        <th class="px-4 py-3">
                            <span class="flex flex-col">
                                Accepted
                                <div class="flex flex-row">@include('livewire.includes.order-by', ["field" => 'accepted'])</div>
                            </span>
                        </th>
                        <th class="px-4 py-3">
                            <span class="flex flex-col">
                                Completed
                                <div class="flex flex-row">@include('livewire.includes.order-by', ["field" => 'completed'])</div>
                            </span>
                        </th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @if($requests->count())
                        @foreach($requests as $request)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <b>{{ $request->resident->name }}</b>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $request->form->form_name }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $request->request_date }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $request->expiration_date }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $request->accepted ? "Yes" : "No" }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $request->completed ? "Yes" : "No" }}
                            </td>
                            <td class="px-4 py-2 flex items-center">
                                @if($request->accepted && !$request->completed)
                                <a href="/requests/{{ $request->request_id }}/preview" target="_blank" class="mx-1 inline-flex mt-4 mb-4 px-2 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-400 border border-transparent rounded-md active:bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:shadow-outline-purple">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                                      </svg>
                                    </a>
                                @endif
                                @if(!$request->accepted)
                                <button
                                    wire:click.prevent="openAccept({{ $request->request_id }})"
                                    class="mx-1 inline-flex items-center mt-4 mb-4 px-2 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-400 border border-transparent rounded-md active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-purple">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                      </svg>
                                </button>
                                @endif
                                @if($request->accepted && !$request->completed)
                                <button
                                    wire:click.prevent="openComplete({{ $request->request_id }})"
                                    class="mx-1 inline-flex items-center mt-4 mb-4 px-2 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-400 border border-transparent rounded-md active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                      </svg>
                                      &nbsp;&nbsp;Mark as completed
                                </button>
                                @endif
                                <button wire:click.prevent="openDelete({{ $request->request_id }})"
                                    class="mx-1 inline-flex mt-4 mb-4 px-2 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-400 border border-transparent rounded-md active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                              </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
