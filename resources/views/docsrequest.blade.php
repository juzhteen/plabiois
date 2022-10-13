@extends('main')
@section('content')
<div class="max-w-full mx-auto">

    <section class="text-gray-600 body-font" x-data="{ doc: 1 }">
        <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
            <div class="lg:w-3/5 md:w-1/2 md:pr-16 p-10">
                <h1 class="title-font font-medium text-2xl text-gray-900">Click on the document you want to request and
                    fill in the required fields.</h1>
                <div class="grid grid-cols-1 mt-4 mr-7">
                    <a @click="doc = 1" class="cursor-pointer border border-gray-500 p-2 rounded-md mt-5 font-bold"
                        :class="doc == 1 ? 'bg-gray-700 text-white' : ''">Baragay
                        Certification</a>
                    <a @click="doc = 2" class="cursor-pointer border border-gray-500 p-2 rounded-md mt-5 font-bold"
                        :class="doc == 2 ? 'bg-gray-700 text-white' : ''">Baragay
                        Clearance</a>
                    <a @click="doc = 3" class="cursor-pointer border border-gray-500 p-2 rounded-md mt-5 font-bold"
                        :class="doc == 3 ? 'bg-gray-700 text-white' : ''">Case
                        Invitation</a>
                    <a @click="doc = 4" class="cursor-pointer border border-gray-500 p-2 rounded-md mt-5 font-bold"
                        :class="doc == 4 ? 'bg-gray-700 text-white' : ''">Certificate of
                        Indigency</a>
                    <a @click="doc = 5" class="cursor-pointer border border-gray-500 p-2 rounded-md mt-5 font-bold"
                        :class="doc == 5 ? 'bg-gray-700 text-white' : ''">Certificate of Low
                        Income</a>
                </div>
            </div>
            <div class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg flex flex-col md:ml-auto w-full mt-10 md:mt-0 p-10">

                <template x-if="doc == 1">
                    <div>
                        <h2 class="text-gray-900 text-lg font-bold title-font mb-5">Baragay Certification</h2>
                        <div class="relative mb-4">
                            <label for="full-name" class="leading-7 text-sm text-gray-600">Full Name</label>
                            <input type="text" id="full-name" name="full-name"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="years" class="leading-7 text-sm text-gray-600">Number of years of
                                residency</label>
                            <input type="number" id="number" name="email"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="years" class="leading-7 text-sm text-gray-600">Occupation</label>
                            <input type="text" id="number" name="email"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="years" class="leading-7 text-sm text-gray-600">Purpose</label>
                            <input type="text" id="number" name="email"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <button
                            class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg font-bold">Submit</button>
                    </div>
                </template>
                <template x-if="doc == 2">
                    <div>
                        <h2 class="text-gray-900 text-lg font-bold title-font mb-5">Baragay Clearance</h2>
                        <div class="relative mb-4">
                            <label for="full-name" class="leading-7 text-sm text-gray-600">Full Name</label>
                            <input type="text" id="full-name" name="full-name"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="email" class="leading-7 text-sm text-gray-600">Date of birth</label>
                            <input type="date" id="email" name="email"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                          <label for="email" class="leading-7 text-sm text-gray-600">Purpose</label>
                          <input type="text" id="email" name="email"
                              class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                      </div>
                        <button
                            class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg font-bold">Submit</button>
                       
                    </div>
                </template>
                <template x-if="doc == 3">
                    <div>
                        <h2 class="text-gray-900 text-lg font-bold title-font mb-5">Case Invitation</h2>
                        <div class="relative mb-4">
                            <label for="full-name" class="leading-7 text-sm text-gray-600">Complainant/s</label><br>
                            <small>Separate with comma(,)</small>
                            <input type="text" id="full-name" name="full-name"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="email" class="leading-7 text-sm text-gray-600">Respondent/s</label><br>
                            <small>Separate with comma(,)</small>
                            <input type="text" id="email" name="email"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                          <label for="email" class="leading-7 text-sm text-gray-600">Date</label><br>
                          <input type="date" id="email" name="email"
                              class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                      </div>
                        <button
                            class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg font-bold">Submit</button>
                    </div>
                </template>
                <template x-if="doc == 4">
                    <div>
                        <h2 class="text-gray-900 text-lg font-bold title-font mb-5">Certificate of Indigency</h2>
                        <div class="relative mb-4">
                            <label for="full-name" class="leading-7 text-sm text-gray-600">Full Name</label>
                            <input type="text" id="full-name" name="full-name"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="email" class="leading-7 text-sm text-gray-600">Birthdate</label>
                            <input type="date" id="email" name="email"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <button
                            class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Submit</button>
                    </div>
                </template>
                <template x-if="doc == 5">
                    <div>
                        <h2 class="text-gray-900 text-lg font-bold title-font mb-5">Certificate of Low Income</h2>
                        <div class="relative mb-4">
                            <label for="full-name" class="leading-7 text-sm text-gray-600">Full Name</label>
                            <input type="text" id="full-name" name="full-name"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="full-name" class="leading-7 text-sm text-gray-600">Mother's Name</label>
                            <input type="text" id="full-name" name="full-name"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="email" class="leading-7 text-sm text-gray-600">Birthdate</label>
                            <input type="date" id="email" name="email"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="email" class="leading-7 text-sm text-gray-600">Income</label>
                            <input type="number" id="email" name="email"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <button
                            class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Submit</button>
                    </div>
                </template>
            </div>
        </div>
    </section>

</div>
@stop
