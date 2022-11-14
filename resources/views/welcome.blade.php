@extends('main')
@section('content')

    <section class="flex flex-col items-center justify-center bg-blue-100 p-32 text-center py-52"
        style="background-image: url({{ asset('img/banner-img.jpg') }}); background-size: cover; background-position: center center;">

        <div class="wrapper p-8 bg-white bg-opacity-25 rounded">
            <h1 class="text-4xl font-bold mb-2 text-gray-700 uppercase">
                Barangay Paulino Labio Web Portal</h1>

            <p class="text-gray-700 text-lg mb-8"></p>

            <div class="space-x-2">
                <a href="/requests/forms"
                    class="py-3 px-4 bg-blue-600 hover:bg-blue-800 font-bold text-white rounded-lg hover:shadow-xl transition duration-300">Request
                    document</a>
            </div>
        </div>

    </section>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto flex flex-wrap">
            <div class="flex flex-wrap -m-4">
                <div class="p-4 lg:w-1/2 md:w-full">
                    <div class="flex border-2 rounded-lg border-gray-200 border-opacity-50 p-8 sm:flex-row flex-col">
                        <div
                            class="w-16 h-16 sm:mr-8 sm:mb-0 mb-4 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0l2.77-.693a9 9 0 016.208.682l.108.054a9 9 0 006.086.71l3.114-.732a48.524 48.524 0 01-.005-10.499l-3.11.732a9 9 0 01-6.085-.711l-.108-.054a9 9 0 00-6.208-.682L3 4.5M3 15V4.5" />
                              </svg>
                              
                        </div>
                        <div class="flex-grow">
                            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Mission</h2>
                            <p class="leading-relaxed text-base">We desire to develop harmonious relationship in the community, strengthening faith, pursue better quality of life and sustain local resources for future generation.</p>
                        </div>
                    </div>
                </div>
                <div class="p-4 lg:w-1/2 md:w-full">
                    <div class="flex border-2 rounded-lg border-gray-200 border-opacity-50 p-8 sm:flex-row flex-col">
                        <div
                            class="w-16 h-16 sm:mr-8 sm:mb-0 mb-4 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                              </svg>
                              
                        </div>
                        <div class="flex-grow">
                            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Vision</h2>
                            <p class="leading-relaxed text-base">Barangay Paulino Labio a peaceful, progressive and sustainable local resources and environment with healthy citizens living a better quality of life.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
