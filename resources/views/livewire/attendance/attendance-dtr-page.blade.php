<div>
    <!-- Cards -->
    {{-- <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
            ></path>
          </svg>
        </div>
        <div>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            @if ($total_employees == 1)
              1 employee
            @else
              {{ $total_employees }} employees
            @endif
          </p>
        </div>
      </div>
    </div> --}}

    {{-- @include('livewire.includes.search', ["fields" => [
      "residents.name" => "Name",
      "employee_types.position" => "Position",
    ]]) --}}

    <div class="flex justify-between items-center shadow-xs p-3 rounded-lg mb-5 mt-10">
        <div class="flex w-full items-center">
            <label class="dark:text-white mr-5">Select date</label>
            <input wire:model.debounce.2000ms="attendance_month_year"
                class="pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-200 border-blue-500 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input"
                type="month" aria-label="Select date" />
            <a wire:click="close_dtr"
                class="font-bold px-4 py-2 text-sm leading-5 text-white transition-colors duration-150 bg-yellow-600 border border-transparent rounded-lg active:bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:shadow-outline-yellow ml-2 cursor-pointer">Set</a>
            <span class="ml-2 font-bold w-full">
                {{ \Carbon\Carbon::createFromDate($year_query, $month_query)->format('F Y') }}
            </span>
        </div>
        <div class="">
            <a href="{{ route('attendance') }}"
                class="font-bold px-4 py-2 text-sm leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                BACK
            </a>
        </div>
    </div>

    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-md">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="bg-blue-100 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">
                            <span class="flex flex-col">
                                Resident profile
                                {{-- <div class="flex flex-row">@include('livewire.includes.order-by', ["field" => 'residents.name'])</div> --}}
                            </span>
                        </th>
                        <th class="px-4 py-3">Employee Code</th>
                        <th class="px-4 py-3">
                            <span class="flex flex-col">
                                Position
                                {{-- <div class="flex flex-row">@include('livewire.includes.order-by', ["field" => 'employee_types.position'])</div> --}}
                            </span>
                        </th>

                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @if ($employees->count())
                        @foreach ($employees as $employee)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 font-bold text-sm">
                                    {{ $employee->resident->name }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $employee->employee_code }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $employee->employee_type->position }}
                                </td>
                                <td class="px-4 py-3">
                                    @if ($openDtr && $employee->employee_id == $current_dtr)
                                        <button wire:click.prevent="close_dtr()"
                                            class="mt-4 mb-4 ml-1 px-2 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-gray-400 border border-transparent rounded-md active:bg-gray-600 hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 15l7-7 7 7" />
                                            </svg>
                                        </button>
                                    @else
                                        <button wire:click.prevent="show_dtr({{ $employee->employee_id }})"
                                            class="ml-1 px-2 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-gray-400 border border-transparent rounded-md active:bg-gray-600 hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            @if ($employee->employee_id == $current_dtr)
                                <tr class="flex flex-col py-3">
                                    <td class="px-4 py-3 flex flex-row flex-wrap -mr-40" colspan="4">
                                        @php
                                            $dates = [];
                                            
                                            for ($i = 1; $i < cal_days_in_month(CAL_GREGORIAN, $month_query, $year_query) + 1; ++$i) {
                                                $dates[] = \Carbon\Carbon::createFromDate($year_query, $month_query, $i)->format('d');
                                            }
                                            
                                        @endphp
                                        @foreach ($dates as $date)
                                            <span
                                                class="p-3 m-1 border border-gray-300 justify-center items-center text-center rounded-lg">
                                                <b>{{ $date }}</b>
                                                <span class="flex flex-col">
                                                    @if ($employee_dtr_record)
                                                        @foreach ($employee_dtr_record as $record)
                                                            @php
                                                                $day_from_attendance = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $record->time_in)->day;
                                                            @endphp
                                                            @if (in_array($day_from_attendance, $dates) && $date == $day_from_attendance)
                                                                @if ($record->time_in)
                                                                    @php
                                                                        if($record->time_in){
                                                                            $time_in = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $record->time_in);
                                                                        }
                                                                        
                                                                    @endphp
                                                                    <span
                                                                        class="bg-green-100 text-sm p-2 rounded-md mb-2 font-medium mt-2">
                                                                        {{ $time_in->format('h:i A') }}
                                                                    </span>
                                                                @endif
                                                                @if ($record->time_out)
                                                                    @php
                                                                        $time_out = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $record->time_out);
                                                                    @endphp
                                                                    <span
                                                                        class="bg-red-100 text-sm p-2 rounded-md font-medium">
                                                                        {{ $time_out->format('h:i A') }}
                                                                    </span>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </span>
                                            </span>
                                        @endforeach

                                    <td class="px-4 py-3">
                                        <a target="_blank"
                                            href="{{ route('attendance-dtr-print', [
                                                'employee_id' => $current_dtr,
                                                'year' => $year_query,
                                                'month' => $month_query,
                                            ]) }}"
                                            class="font-bold px-4 py-2 text-sm leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                                            PRINT
                                        </a>
                                    </td>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <br>
    {{ $employees->links() }}
</div>
</div>
