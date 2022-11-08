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

    <div class="flex bg-gray-50 dark:bg-gray-900">

        <div class="container max-w-2xl mx-auto px-0 py-8">

            <div class="flex justify-between items-center px-5">
                <div class="logo">
                    <img src="{{ asset('img/plabio-logo.png') }}" alt="PLabio logo" width="100px">
                </div>
                <div class="heading text-center">
                    <p>Republic of the Philippines</p>
                    <p>BARMM</p>
                    <p>Province of Maguindanao</p>
                    <p>Municipality of Northern Kabuntalan</p>
                    <p>Barangay Paulino Labio</p>
                    <p>OFFICE OF THE BARANGAY CHAIRMAN</p>
                </div>
                <div class="logo">
                    <img src="{{ asset('img/kabuntalan-logo.png') }}" alt="Kabuntalan logo" width="95px">
                </div>
            </div>
            <div class="mt-14">
                <h3 class="mb-8 text-center font-bold text-lg">Attendance for
                    {{ \Carbon\Carbon::createFromDate($year, $month, $day)->format('F d, Y') }}</h3>
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="bg-blue-100 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">
                                <span class="flex flex-col">
                                    Name
                                </span>
                            </th>
                            <th class="px-4 py-3">
                                <span class="flex flex-col">
                                    Time in
                                </span>
                            </th>
                            <th class="px-4 py-3">
                                <span class="flex flex-col">
                                    Time out
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @if ($employee_dtr_records->count())
                            @foreach ($employee_dtr_records as $record)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm">
                                        {{ $record->employee->resident->name }}
                                    </td>
                                    @if ($record->time_in)
                                        @php
                                            $time_in = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $record->time_in);
                                        @endphp
                                        <td class="py-1 px-8 text-sm">
                                            {{ $time_in->format('h:i A') }}
                                        </td>
                                    @endif
                                    @if ($record->time_out)
                                        @php
                                            $time_out = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $record->time_out);
                                        @endphp
                                        <td class="py-1 px-8 text-sm">
                                            {{ $time_out->format('h:i A') }}
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="mt-8 flex justify-center items-center">
                <button id="print" onclick="window.print()"
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">Print
                    this page</button>
            </div>
        </div>

    </div>

</body>

</html>
