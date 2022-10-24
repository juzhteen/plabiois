<div class="max-w-full mx-auto">

    <section class="text-gray-600 body-font">
        @if($request_sent_successfully)
            <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
                <h1 class="title-font font-medium text-2xl text-gray-900">We have received your request! You will be notified via email or text when your requested document is ready for pickup.</h1>
            </div>
        @else
        <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
            <div class="lg:w-3/5 md:w-1/2 md:pr-16 p-10">
                <h1 class="title-font font-medium text-2xl text-gray-900">Click on the document you want to request and
                    fill in the required fields.</h1>
                <div class="grid grid-cols-1 mt-4 mr-7">
                    <a class="cursor-pointer border border-gray-500 p-2 rounded-md mt-5 font-bold @if($form_name == 'Barangay Certification') bg-gray-700 text-white @endif" wire:click="$set('form_name', 'Barangay Certification')">Barangay Certification</a>
                    <a class="cursor-pointer border border-gray-500 p-2 rounded-md mt-5 font-bold @if($form_name == 'Barangay Clearance') bg-gray-700 text-white @endif" wire:click="$set('form_name', 'Barangay Clearance')">Barangay Clearance</a>
                    <a class="cursor-pointer border border-gray-500 p-2 rounded-md mt-5 font-bold @if($form_name == 'Case Invitation') bg-gray-700 text-white @endif" wire:click="$set('form_name', 'Case Invitation')">Case Invitation</a>
                    <a class="cursor-pointer border border-gray-500 p-2 rounded-md mt-5 font-bold @if($form_name == 'Certificate of Indigency') bg-gray-700 text-white @endif" wire:click="$set('form_name', 'Certificate of Indigency')">Certificate of Indigency</a>
                    <a class="cursor-pointer border border-gray-500 p-2 rounded-md mt-5 font-bold @if($form_name == 'Certificate of Low Income') bg-gray-700 text-white @endif" wire:click="$set('form_name', 'Certificate of Low Income')">Certificate of Low Income</a>
                </div>
            </div>
            <div class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg flex flex-col md:ml-auto w-full mt-10 md:mt-0 p-10">
                @if($form_name == 'Barangay Certification')
                <div>
                    <div>
                          <h2 class="text-gray-900 text-lg font-bold title-font mb-5">Barangay Certification</h2>
                          <input type="hidden" wire:model="form_id">
                          <div class="relative mb-4">
                              <label for="full-name" class="leading-7 text-sm text-gray-600">Resident profile</label>
                              <input
                            class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            placeholder="Search for the resident profile" type="text" wire:model="residentQuery" id="residentQuery" required/>
                                  @if(!empty($residentQueryResult) && ($residentQuery != "" ))
                                    <ul class="shadow-md absolute z-10 top-17 w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                        @foreach ($residentQueryResult as $resident)
                                            <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600 cursor-pointer"
                                            wire:click.prevent="setResidentProfile({{ $resident }})"
                                            >{{ $resident->name }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                          </div>
                          <div class="relative mb-4">
                              <label for="years_of_residency" class="leading-7 text-sm text-gray-600">Number of years of
                                  residency</label>
                              <input type="number" id="years_of_residency" wire:model="years_of_residency"
                                  class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" placeholder="Years of residency">
                          </div>
                          <div class="relative mb-4">
                              <label for="occupation" class="leading-7 text-sm text-gray-600">Occupation</label>
                              <input type="text" id="occupation" wire:model="occupation"
                                  class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" placeholder="Occupation">
                          </div>
                          <div class="relative mb-4">
                              <label for="purpose" class="leading-7 text-sm text-gray-600">Purpose</label>
                              <input type="text" id="purpose" wire:model="purpose"
                                  class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" placeholder="Purpose">
                          </div>
                          <button wire:click.prevent="send_request" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg font-bold">Submit</button>
                    </div>
                </div>
                @endif
                @if($form_name == 'Barangay Clearance')
                <div>
                    <div>
                        <h2 class="text-gray-900 text-lg font-bold title-font mb-5">Barangay Clearance</h2>
                        <input type="hidden" wire:model="form_id">
                        <div class="relative mb-4">
                            <label for="full-name" class="leading-7 text-sm text-gray-600">Resident profile</label>
                            <input
                          class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                          placeholder="Search for the resident profile" type="text" wire:model="residentQuery" id="residentQuery" required/>
                                @if(!empty($residentQueryResult) && ($residentQuery != "" ))
                                  <ul class="shadow-md absolute z-10 top-17 w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                      @foreach ($residentQueryResult as $resident)
                                          <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600 cursor-pointer"
                                          wire:click.prevent="setResidentProfile({{ $resident }})"
                                          >{{ $resident->name }}</li>
                                      @endforeach
                                  </ul>
                              @endif
                        </div>
                        <div class="relative mb-4">
                            <label for="date-of-birth" class="leading-7 text-sm text-gray-600">Date of birth</label>
                            <input type="date" id="date-of-birth" wire:model="date_of_birth"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                          <label for="purpose" class="leading-7 text-sm text-gray-600">Purpose</label>
                          <input type="text" id="purpose" wire:model="purpose"
                              class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                      </div>
                      <button wire:click.prevent="send_request" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg font-bold">Submit</button>
                       
                    </div>
                </div>
                @endif
                @if($form_name == 'Certificate of Low Income')
                    <div>
                        <div>
                            <h2 class="text-gray-900 text-lg font-bold title-font mb-5">Certificate of Low Income</h2>
                            <input type="hidden" wire:model="form_id">
                            <div class="relative mb-4">
                                <label for="full-name" class="leading-7 text-sm text-gray-600">Resident profile</label>
                                <input
                            class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            placeholder="Search for the resident profile" type="text" wire:model="residentQuery" id="residentQuery" required/>
                                    @if(!empty($residentQueryResult) && ($residentQuery != "" ))
                                    <ul class="shadow-md absolute z-10 top-17 w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                        @foreach ($residentQueryResult as $resident)
                                            <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600 cursor-pointer"
                                            wire:click.prevent="setResidentProfile({{ $resident }})"
                                            >{{ $resident->name }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="relative mb-4">
                                <label for="mother-name" class="leading-7 text-sm text-gray-600">Mother's Name</label>
                                <input type="text" id="mother-name" wire:model="mother_name"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            <div class="relative mb-4">
                                <label for="date-of-birth" class="leading-7 text-sm text-gray-600">Date of birth</label>
                                <input type="date" id="date-of-birth" wire:model="date_of_birth"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            <div class="relative mb-4">
                                <label for="income" class="leading-7 text-sm text-gray-600">Income</label>
                                <input type="number" id="income" wire:model="income"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            <button wire:click.prevent="send_request" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg font-bold">Submit</button>
                        </div>
                    </div>
                @endif
                @if($form_name == 'Case Invitation')
                    <div>
                        <div>
                            <h2 class="text-gray-900 text-lg font-bold title-font mb-5">Case Invitation</h2>
                            <input type="hidden" wire:model="form_id">
                            <div class="relative mb-4">
                                <label for="full-name" class="leading-7 text-sm text-gray-600">Resident profile of main complainant</label>
                                <input
                            class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            placeholder="Search for the resident profile" type="text" wire:model="residentQuery" id="residentQuery" required/>
                                    @if(!empty($residentQueryResult) && ($residentQuery != "" ))
                                    <ul class="shadow-md absolute z-10 top-17 w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                        @foreach ($residentQueryResult as $resident)
                                            <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600 cursor-pointer"
                                            wire:click.prevent="setResidentProfile({{ $resident }})"
                                            >{{ $resident->name }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="relative mb-4">
                                <label for="complainants" class="leading-7 text-sm text-gray-600">Other complainant/s</label><br>
                                <small>Separate with comma(,)</small>
                                <input type="text" id="complainants" wire:model="complainants"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            <div class="relative mb-4">
                                <label for="respondents" class="leading-7 text-sm text-gray-600">Respondent/s</label><br>
                                <small>Separate with comma(,)</small>
                                <input type="text" id="respondents" wire:model="respondents"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            <div class="relative mb-4">
                              <label for="invitation-date" class="leading-7 text-sm text-gray-600">Date</label><br>
                              <input type="date" id="invitation-date" wire:model="invitation_date"
                                  class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          </div>
                          <button wire:click.prevent="send_request" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg font-bold">Submit</button>
                        </div>
                    </div>
                @endif
                @if($form_name == 'Certificate of Indigency')
                    <div>
                        <div>
                            <h2 class="text-gray-900 text-lg font-bold title-font mb-5">Certificate of Indigency</h2>
                            <input type="hidden" wire:model="form_id">
                            <div class="relative mb-4">
                                <label for="full-name" class="leading-7 text-sm text-gray-600">Resident profile</label>
                                <input
                            class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            placeholder="Search for the resident profile" type="text" wire:model="residentQuery" id="residentQuery" required/>
                                    @if(!empty($residentQueryResult) && ($residentQuery != "" ))
                                    <ul class="shadow-md absolute z-10 top-17 w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                        @foreach ($residentQueryResult as $resident)
                                            <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600 cursor-pointer"
                                            wire:click.prevent="setResidentProfile({{ $resident }})"
                                            >{{ $resident->name }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="relative mb-4">
                                <label for="date-of-birth" class="leading-7 text-sm text-gray-600">Birthdate</label>
                                <input type="date" id="date-of-birth" wire:model="date_of_birth"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            <button wire:click.prevent="send_request" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg font-bold">Submit</button>
                        </div>
                    </div>
                @endif
 
            </div>
        </div>
        @endif
    </section>

</div>
