<h1 class="text-center font-bold mt-10 text-xl mb-10">CERTIFICATE OF INDIGENCY</h1>
<p class="mb-4">TO WHOM IT MAY CONCERN:</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that <u>{{ $request->resident->name }}</u>, <u>{{ $request->resident->age }}</u> years of age, was born on <u>{{ date("F jS, Y", strtotime($form_fields->request_date_of_birth)) }}</u>, and a bonafide resident of Barangay Paulino, Labio, Northern Kabuntalan, Maguindanao.</p>
<p class="mt-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify further that the above-named person belongs to an indigent family of this Barangay.</p>
<p class="mt-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This certification is being issued for whatever legal purposes that may serve him/her best.</p>
<p class="mt-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Issued this {{ now()->day }} of {{ now()->format('F') }}, {{ now()->year }} at the Office of the Barangay Chairman, Barangay Paulino Labio, Northern Kabuntalan, Maguindanao.</p>
<p class="text-right mt-40 underline">NOEL P. CORPUZ</p>
<p class="text-right">Punong Barangay</p>