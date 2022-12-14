<div>
  @include('livewire.employee-types.employee-types-edit-modal')
  @include('livewire.employee-types.employee-types-delete-modal')
    <!-- Cards -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
      <!-- Card -->
      {{-- <div class="flex items-center p-4 bg-green-500 text-white rounded-lg shadow-xs dark:bg-green-800 cursor-pointer font-bold" wire:click.prevent="toggleEdit()">
        <div class="p-3 mr-4 text-green-500 bg-white rounded-full dark:text-green-100 dark:bg-green-500">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
          </svg>
        </div>
        <div>
          ADD NEW POSITION
        </div>
      </div> --}}
      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
          </svg>
        </div>
        <div>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            @if($total_positions == 1)
              1 employee type or position
            @else
              {{ $total_positions}} employee types or positions
            @endif
          </p>
        </div>
      </div>
    </div>

    @include('livewire.includes.search', ["fields" => [
      "position" => "Position"
    ]])
  
    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-md">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr class="bg-blue-100 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">
                <span class="flex flex-col">
                  Position
                  <div class="flex flex-row">@include('livewire.includes.order-by', ["field" => 'position'])</div>
                </span>
              </th>
              <th class="px-4 py-3">Employees</th>
              <th class="px-4 py-3">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @if ($employee_types->count())
              @foreach ($employee_types as $type)
                <tr class="text-gray-700 dark:text-gray-400">
                  <td class="px-4 py-3 text-sm">
                    {{ $type->position }}
                  </td>
                  <td class="px-4 py-3 text-sm flex flex-col">
                    @if($type->employees->count())
                      @foreach($type->employees as $employee)
                      <span class="py-2 px-5 rounded-full text-md text-black bg-gray-100 hover:bg-gray-200 hover:drop-shadow-md duration-300 mb-2 w-max-content">
                          @if($employee->resident)
                            @php
                                $resident = $employee->resident;
                                echo $resident->name;
                            @endphp
                          @endif
                      </span>
                      @endforeach
                    @endif
                  </td>
                  <td class="px-4 py-2">
                    <button wire:click.prevent="edit({{ $type->employee_type_id }})"
                        class="mt-4 mb-4 px-2 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-400 border border-transparent rounded-md active:bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:shadow-outline-purple">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </button>
                    <button wire:click.prevent="openDelete({{ $type->employee_type_id }})"
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
    <br>
    {{ $employee_types->links() }}
  </div>
</div>