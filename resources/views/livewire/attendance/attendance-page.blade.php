<div>

    <style>
        .desktop-sidebar {
            display: none;
        }
    </style>

    <div class="flex gap-4 pb-10">
        <div class="p-5 shadow-md mr-20">
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Preferred camera
                </span>
                <select id="cam-list"
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    <option value="environment" selected>Environment Facing (default)</option>
                    <option value="user">User Facing</option>
                </select>
            </label>

            <div class="mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Attendance Type
                </span>
                <div class="mt-4">
                    <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                        <input type="radio" wire:model="attendance_type" value="time_in"
                            class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="accountType" value="personal" />
                        <span class="ml-2">Time in</span>
                    </label>
                    <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                        <input type="radio" wire:model="attendance_type" value="time_out"
                            class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="accountType" value="busines" />
                        <span class="ml-2">Time out</span>
                    </label>
                </div>
            </div>
            <div class="qr-scanner-controls mt-4 hidden">
                <button type="button"
                    class="qr-scanner-start px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">Open QR scanner</button>
                <button type="button"
                    class="qr-scanner-stop px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">Close QR scanner</button>
            </div>
            <br>
            <b>Last detected: </b>
            <span id="cam-qr-result"></span>
            <br>
        </div>
        <div>
            <div id="video-container" class="mt-4">
                <video class="attendance-qr-scanner"></video>
            </div>
        </div>
    </div>

    <div class="flex justify-between shadow-xs p-3 rounded-lg mb-5 mt-10">
        <div class="w-full flex justify-between align-center">
            <div class="flex">
                <div class="w-96 relative inset-y-0 flex items-center pl-2 mr-5">
                    <label class="dark:text-white mr-5 w-40">Select date</label>
                    <input wire:model.debounce.2000ms="attendance_date"
                    class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-200 border-blue-500 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input"
                    type="date" aria-label="Select date" />
                    <a wire:click="reset_date" class="cursor-pointer ml-5">Clear</a>
                </div>
            </div>
        </div>
        <div class="flex w-40 justify-self-end">
            <a href="{{ route('attendance-dtr') }}"
                class="font-bold px-4 py-2 text-sm leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                VIEW DTR
            </a>
        </div>
    </div>

    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-md mt-8 mb-8">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="bg-blue-100 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Employee</th>
                        <th class="px-4 py-3">Timein</th>
                        <th class="px-4 py-3">Timeout</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @if($attendances->count())
                        @foreach($attendances as $attendance)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 font-bold text-sm">
                                    {{ $attendance->employee->resident->name }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                  @php
                                      if($attendance->time_in){
                                        $time_in = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',  $attendance->time_in);
                                          echo $time_in->format('h:i A');
                                        }
                                  @endphp
                                </td>
                                <td class="px-4 py-3 text-sm">
                                  @php
                                      if($attendance->time_out){
                                        $time_out = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',  $attendance->time_out);
                                          echo $time_out->format('h:i A');
                                        }
                                  @endphp
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="flex">
        <td class="px-4 py-3">
            <a target="_blank" href="{{ route('today-attendance-dtr-print', [
              'year' => $year_query,
              'month' => $month_query,
              'day' => $day_query
            ]) }}"
              class="font-bold px-4 py-2 text-sm leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
              PRINT
          </a>
    </div>
    <br>
    {{-- {{ $attendances->links() }} --}}
</div>
