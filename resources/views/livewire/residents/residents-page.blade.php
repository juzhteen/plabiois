<div>
  @include('livewire.residents.resident-edit-modal')
  @include('livewire.residents.resident-delete-modal')
    <!-- Cards -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
      <!-- Card -->
      <div class="flex items-center p-4 bg-gray-800 text-white rounded-lg shadow-xs dark:bg-gray-800 cursor-pointer" wire:click.prevent="toggleEdit()">
        <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
            ></path>
          </svg>
        </div>
        <div>
          Add new resident
        </div>
      </div>
      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
          </svg>
        </div>
        <div>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            {{ $residents->count() }} residents
          </p>
        </div>
      </div>
    </div>
  
    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">Name</th>
              <th class="px-4 py-3">Age</th>
              <th class="px-4 py-3">Gender</th>
              <th class="px-4 py-3">Civil Status</th>
              <th class="px-4 py-3">Religion</th>
              <th class="px-4 py-3">Weight</th>
              <th class="px-4 py-3">Height</th>
              <th class="px-4 py-3">Purok</th>
              <th class="px-4 py-3">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @if ($residents->count())
              @foreach ($residents as $resident)
                <tr class="text-gray-700 dark:text-gray-400">
                  <td class="px-4 py-3">
                    {{ $resident->name }}
                  </td>
                  <td class="px-4 py-3 text-sm">
                    {{ $resident->age }}
                  </td>
                  <td class="px-4 py-3 text-sm">
                    {{ $resident->gender }}
                  </td>
                  <td class="px-4 py-3 text-sm">
                    {{ $resident->civil_status }}
                  </td>
                  <td class="px-4 py-3 text-sm">
                    {{ $resident->religion }}
                  </td>
                  <td class="px-4 py-3 text-sm">
                    {{ $resident->weight }}
                  </td>
                  <td class="px-4 py-3 text-sm">
                    {{ $resident->height }}
                  </td>
                  <td class="px-4 py-3 text-sm">
                    {{ $resident->purok }}
                  </td>
                  <td class="px-4 py-2">
                    <button wire:click.prevent="edit({{ $resident->resident_id }})"
                        class="mt-4 mb-4 px-2 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-400 border border-transparent rounded-md active:bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:shadow-outline-purple">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </button>
                    <button wire:click.prevent="openDelete({{ $resident->resident_id }})"
                        class="mt-4 mb-4 px-2 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-400 border border-transparent rounded-md active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">
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