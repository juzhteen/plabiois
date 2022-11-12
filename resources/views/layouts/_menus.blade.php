<div class="py-4 text-gray-500 dark:text-gray-400">
    <a class="text-lg font-bold text-white dark:text-gray-200 flex justify-center mr-10" href="{{ route('dashboard') }}">
        {{ config('app.name') }}
    </a>
    <ul class="mt-6">
        <li class="relative px-6 py-3">
            {!! request()->routeIs('residents')
                ? '<span class="absolute inset-y-0 left-0 w-1 bg-white rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>'
                : '' !!}
            <a data-turbolinks-action="replace"
                class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 hover:text-white dark:hover:text-gray-200 dark:text-gray-100"
                href="{{ route('residents') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-8 h-8 p-1 bg-blue-900 rounded-full">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                </svg>

                <span class="ml-4">{{ __('Residents') }}</span>
            </a>
        </li>
        <li class="relative px-6 py-3">
            {!! request()->routeIs('employees')
                ? '<span class="absolute inset-y-0 left-0 w-1 bg-white rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>'
                : '' !!}
            <a data-turbolinks-action="replace"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 text-white hover:text-white dark:hover:text-gray-200"
                href="{{ route('employees') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-8 h-8 p-1 bg-blue-900 rounded-full">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                </svg>
                <span class="ml-4">Employees</span>
            </a>
        </li>
        <li class="relative px-6 py-3">
            {!! request()->routeIs('employee-types')
                ? '<span class="absolute inset-y-0 left-0 w-1 bg-white rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>'
                : '' !!}
            <a data-turbolinks-action="replace"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 text-white hover:text-white dark:hover:text-gray-200"
                href="{{ route('employee-types') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-8 h-8 p-1 bg-blue-900 rounded-full">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
                <span class="ml-4">Employee types</span>
            </a>
        </li>
        <li class="relative px-6 py-3">
            {!! request()->routeIs('attendance')
                ? '<span class="absolute inset-y-0 left-0 w-1 bg-white rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>'
                : '' !!}
            <a target="_blank" data-turbolinks-action="replace"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 text-white hover:text-white dark:hover:text-gray-200"
                href="{{ route('attendance') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-8 h-8 p-1 bg-blue-900 rounded-full">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                </svg>
                <span class="ml-4">Attendance</span>
            </a>
        </li>
        <li class="relative px-6 py-3">
            {!! request()->routeIs('requests')
                ? '<span class="absolute inset-y-0 left-0 w-1 bg-white rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>'
                : '' !!}
            <a data-turbolinks-action="replace"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 text-white hover:text-white dark:hover:text-gray-200"
                href="{{ route('requests') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-8 h-8 p-1 bg-blue-900 rounded-full">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                </svg>
                <span class="ml-4">Requests</span>
                <span class="ml-4 rounded-full bg-red-500 text-white w-5 h-5 text-center">
                    @php
                        $new_requests = App\Models\Request::where('accepted', false)
                            ->where('completed', false)
                            ->get()
                            ->count();
                        echo $new_requests;
                    @endphp
                </span>
            </a>
        </li>
        <li class="relative px-6 py-3">
            {!! request()->routeIs('documents')
                ? '<span class="absolute inset-y-0 left-0 w-1 bg-white rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>'
                : '' !!}
            <a data-turbolinks-action="replace"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 text-white hover:text-white dark:hover:text-gray-200"
                href="{{ route('documents') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-8 h-8 p-1 bg-blue-900 rounded-full">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                </svg>
                <span class="ml-4">Documents</span>
            </a>
        </li>
        @if (Auth::user()->admin_type == 'superadmin')
            <li class="relative px-6 py-3">
                {!! request()->routeIs('users')
                    ? '<span class="absolute inset-y-0 left-0 w-1 bg-white rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>'
                    : '' !!}
                <a data-turbolinks-action="replace"
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 text-white hover:text-white dark:hover:text-gray-200"
                    href="{{ route('users') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 p-1 bg-blue-900 rounded-full">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="ml-4">Users</span>
                </a>
            </li>
        @endif
    </ul>
</div>
