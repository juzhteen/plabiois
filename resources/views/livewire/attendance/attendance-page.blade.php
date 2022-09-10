<div>

    <div class="grid grid-cols-2 gap-4">
        <div class="p-5 shadow-lg">
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
            <div class="qr-scanner-controls mt-4">
                <button type="button"
                    class="qr-scanner-start px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">Open QR scanner</button>
                <button type="button"
                    class="qr-scanner-stop px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">Close QR scanner</button>
            </div>
        </div>
        <div>
            <div id="video-container" class="mt-4">
                <video class="attendance-qr-scanner"></video>
            </div>
        </div>
    </div>

    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xl mt-8">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Employee</th>
                        <th class="px-4 py-3">Timein</th>
                        <th class="px-4 py-3">Timeout</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @if($attendances->count())
                        @foreach($attendances as $attendance)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 font-bold">
                                    {{ $attendance->employee->resident->name }}
                                </td>
                                <td class="px-4 py-3">
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

</div>
