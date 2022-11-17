<div>
  @include('livewire.residents.resident-edit-modal')
  @include('livewire.residents.resident-delete-modal')
    <!-- Cards -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
      <!-- Card -->
      {{-- <div class="flex items-center p-4 bg-green-500 text-white font-bold rounded-lg shadow-xs dark:bg-gray-800 cursor-pointer" wire:click.prevent="toggleEdit()">
        <div class="p-3 mr-4 text-green-700 bg-white rounded-full dark:text-orange-100 dark:bg-green-500">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
          </svg>          
        </div>
        <div>
          ADD NEW RESIDENT
        </div>
      </div> --}}
      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
          </svg>          
        </div>
        <div>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            @if($total_residents == 1)
              1 resident
            @else
              {{ $total_residents }} residents
            @endif
          </p>
        </div>
      </div>
    </div>

    @include('livewire.includes.search', ["fields" => [
      "name" => "Name",
      "age" => "Age",
      "gender" => "Gender",
      "civil_status" => "Civil status",
      "religion" => "Religion",
      "weight" => "Weight",
      "height" => "Height",
      "purok" => "Purok",
      "email_address" => "Email address",
      "phone_number" => "Phone number"
    ]])
  
    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-md">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr class="bg-blue-100 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700  dark:text-gray-40">
              <th class="px-4 py-2">
                <span class="flex flex-col">
                    Name
                    <div class="flex flex-row">@include('livewire.includes.order-by', ["field" => 'name'])</div>
                </span>
              </th>
              <th class="px-4 py-3">
                <span class="flex flex-col">
                  Age
                  <div class="flex flex-row">@include('livewire.includes.order-by', ["field" => 'age'])</div>
                </span>
              </th>
              <th class="px-4 py-3">
                <span class="flex flex-col">
                  Gender
                  <div class="flex flex-row">@include('livewire.includes.order-by', ["field" => 'gender'])</div>
                </span>
              </th>
              <th class="px-4 py-3">
                <span class="flex flex-col">
                  Civil status
                  <div class="flex flex-row">@include('livewire.includes.order-by', ["field" => 'civil_status'])</div>
                </span>
              </th>
              <th class="px-4 py-3">
                <span class="flex flex-col">
                  Religion
                  <div class="flex flex-row">@include('livewire.includes.order-by', ["field" => 'religion'])</div>
                </span>
              </th>
              <th class="px-4 py-3">
                <span class="flex flex-col">
                  Weight
                  <div class="flex flex-row">@include('livewire.includes.order-by', ["field" => 'weight'])</div>
                </span>
              </th>
              <th class="px-4 py-3">
                <span class="flex flex-col">
                  Height
                  <div class="flex flex-row">@include('livewire.includes.order-by', ["field" => 'height'])</div>
                </span>
              </th>
              <th class="px-4 py-3">
                <span class="flex flex-col">
                  Purok
                  <div class="flex flex-row">@include('livewire.includes.order-by', ["field" => 'purok'])</div>
                </span>
              </th>
              <th class="px-4 py-3">
                <span class="flex flex-col">
                  Email address
                  <div class="flex flex-row">@include('livewire.includes.order-by', ["field" => 'email_address'])</div>
                </span>
              </th>
              <th class="px-4 py-3">
                <span class="flex flex-col">
                  Phone number
                </span>
              </th>
              <th class="px-4 py-3">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @if ($residents->count())
              @foreach ($residents as $resident)
                <tr class="text-gray-700 dark:text-gray-400">
                  <td class="px-4 py-3 font-bold text-sm">
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
                    {{ $resident->weight }} kg
                  </td>
                  <td class="px-4 py-3 text-sm">
                    {{ $resident->height }} cm
                  </td>
                  <td class="px-4 py-3 text-sm">
                    Purok {{ $resident->purok }}
                  </td>
                  <td class="px-4 py-3 text-sm">
                    {{ $resident->email_address }}
                  </td>
                  <td class="px-4 py-3 text-sm">
                    {{ $resident->phone_number }}
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
    <br>
    {{ $residents->links() }}
  </div>
</div>