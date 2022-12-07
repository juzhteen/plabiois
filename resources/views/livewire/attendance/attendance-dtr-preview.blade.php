<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}" />

    <script src="{{ asset('js/alpine.min.js') }}" defer></script>
    <script src="{{ asset('js/init-alpine.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <style>
        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }

            #print {
                display: none;
            }
        }
    </style>

</head>

<body>
    <div class="flex bg-gray-50 dark:bg-gray-900 flex-col">
        <div class="mx-auto px-0 border border-gray-300 mt-4 rounded-lg">
            <h2 class="my-3 text-md font-semibold text-gray-700 dark:text-gray-200 ml-8">
                DTR | {{ $employee->resident->name }} |
                {{ \Carbon\Carbon::createFromDate($year, $month)->format('F Y') }}
            </h2>
            <div class="overflow-x-auto relative">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-1 px-8 text-xs">
                                Date
                            </th>
                            <th scope="col" class="py-1 px-8 text-xs">
                                Time in
                            </th>
                            <th scope="col" class="py-1 px-8 text-xs">
                                Time out
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @php
                            $dates = [];
                            for ($i = 1; $i < cal_days_in_month(CAL_GREGORIAN, $month, $year) + 1; ++$i) {
                                $dates[] = \Carbon\Carbon::createFromDate($year, $month, $i)->format('d');
                            }
                        @endphp

                        @foreach ($dates as $date)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="py-1 px-8 font-medium text-gray-900 whitespace-nowrap dark:text-white text-xs">
                                    {{ $date }}
                                </th>
                                @foreach ($employee_dtr_records as $record)
                                    @php
                                        if ($record->time_in) {
                                            $day_from_attendance = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $record->time_in)->day;
                                        }
                                        if ($record->time_out) {
                                            $day_from_attendance = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $record->time_out)->day;
                                        }
                                    @endphp
                                    @if (in_array($day_from_attendance, $dates) && $date == $day_from_attendance)
                                        @if ($record->time_in)
                                            @php
                                                if($record->time_in){
                                                    $time_in = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $record->time_in);
                                                }
                                            @endphp
                                            <td class="py-1 px-8 text-xs">
                                                {{ $time_in->format('h:i A') }}
                                            </td>
                                        @else
                                            <td class="py-1 px-8 text-xs">
                                                x
                                            </td>
                                        @endif
                                        @if ($record->time_out)
                                            @php
                                                if($record->time_out){
                                                    $time_out = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $record->time_out);
                                                }
                                            @endphp
                                            <td class="py-1 px-8 text-xs">
                                                {{ $time_out->format('h:i A') }}
                                            </td>
                                        @else
                                            <td class="py-1 px-8 text-xs">
                                                x
                                            </td>
                                        @endif
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <div class="mt-8 mb-8 flex justify-center items-center">
            <button id="print" onclick="window.print()"
                class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">Print
                this page</button>
        </div>
    </div>
</body>

</html>
